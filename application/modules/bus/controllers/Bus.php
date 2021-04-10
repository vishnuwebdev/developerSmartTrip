<?php

class Bus extends MX_Controller {

	/**
	 * Initiate the required configuration to the class
	 * Loading the Request Models, Library
	 * Authorize for the access
	 * @param null
	 * @return null
	 */
	function __construct() {
		parent::__construct ();
		$this->load->Model (['BusModel','Common_Model']);
		$this->load->library ( array ('session',"form_validation") );
		// $this->load->helper ( array ('text','form','url' ) );
		$this->authorzie();
		$path = __DIR__."/../assets/cities.json";
		$this->cities = file_get_contents($path);
		
	}

	/** 
	 * Authorzie the Token 
	 * If not authorize then generate the new token and update the database
	 * @param null
	 * @return null
	*/
	private function authorzie(){
		$tbo_data = $this->Common_Model->get_table("*", "afapi_name", "tbo_live", "api_flight_active");
		$this->TokenId = $tbo_data->afapi_token;
		$this->ClientId = $tbo_data->afapi_client_id;
		$this->UserName = $tbo_data->afapi_user_name;
		$this->Password = $tbo_data->afapi_api_password;
		$this->EndUserIp = $tbo_data->afapi_ip;
		$this->url = $tbo_data->afapi_url;
		$this->auth_url = $tbo_data->afapi_auth_url;
		$this->bp_token_data_count = 1;
		$currentDate = date("d");
		if ($tbo_data->afapi_token_update != $currentDate) {
			$token_data = $this->genrateToken();
			if (isset($token_data) && $token_data->Status == "1") {
				$bp_rbo_auth_token = $token_data->TokenId;
				$data = [
					"afapi_token" => $bp_rbo_auth_token,
					"afapi_token_update" => $currentDate,
				];
				$this->TokenId = $bp_rbo_auth_token;
				$this->Common_Model->update_table("afapi_name", "tbo_live", "api_flight_active", $data);
			}
		}
	}

	/**
	 * Generating the new token 
	 * Curl module using for making request
	 * Active Bus Token session
	 * @param null
	 * @return Array Formated Genrate Token Api Response
	 */
	private function genrateToken(){
		$data = [
			"ClientId" => $this->ClientId,
			"UserName" => $this->UserName,
			"Password" => $this->Password,
			"EndUserIp" => $this->EndUserIp,
		];
		$requstString = json_encode($data);
		$curlResponse = curlPost($this->auth_url, $requstString);
		return $curlResponse->format;
	}

	public function index() {
		$this->load->view("bus/index.php");
	}

	/**
	 * Filter Cities by the type characters
	 * @method POST
	 * @param id type of characters
	 * @return json resonse 
	 */
	public function get_cities(){
		$typedKey = $this->input->post("id");
		$result = json_decode($this->cities, true);
		$filterCitites = [];
		foreach($result as $item ){
			if($this->FindString($item['CityName'], $typedKey)){
				array_push($filterCitites,$item);
			}
		}
		echo json_encode($filterCitites);
	}
	
	/**
	 * Filter method by the string 
	 * @source https://stackoverflow.com/questions/4366730/how-do-i-check-if-a-string-contains-a-specific-word
	 * @param string Source string
	 * @param string type character/string
	 * @return boolean
	 */
	private function FindString($string,$charcter){   
		$i = "i";
		if(preg_match("/{$charcter}/{$i}", $string)) {
			return true;
		}
		return false;
	}

	/**
	 * Search buses reqeust nodes
	 * @method GET
	 * @param sourceId
	 * @param destinationId
	 * @param departureDate
	 * @return render page
	 */
	public function search(){
		return $this->load->view("search/search");
		$request = (object) $this->input->get();
		$requestParams = [
			"DateOfJourney" => date("Y/m/d", strtotime($request->travel_date)),
			"OriginId" => $request->from_city,
			"DestinationId" => $request->to_city,
			"PreferredCurrency" => getCurrentCurrency()
		];
		$this->session->set_userdata('search_request',$requestParams);
		$requestString = $this->makeRequestString($requestParams);
		$curlResponse = curlPost(BUS_SEARCH_API, $requestString);
		return $this->handleSearchResponse($curlResponse->format);
	}

	/**
	 * Building the request format for the CURL Call
	 * @param Array Request parameters
	 * @return json_encoded data
	 */
	private function makeRequestString($params = []){
		$data = [
			"TokenId" => $this->TokenId,
			"EndUserIp" => $this->EndUserIp
		];
		$buidRequest = array_merge($data, $params);
		return json_encode($buidRequest);
	}

	/**
	 * Handling the Bus Search Response
	 * @param Search Respnose Object
	 * @return Mixed
	 */
	private function handleSearchResponse($response){
		if(isset($response) && isset($response->BusSearchResult)){
			$busResult = $response->BusSearchResult;
			if($busResult->ResponseStatus !== 1){
				return $this->failedSearchResponse();
			}
			return $this->loadBusSearchList($busResult);
		}
		return $this->failedSearchResponse();
	}


	/**
	 * Handling the Failed Search Response
	 * @param null
	 * @return Render View
	 */
	private function failedSeachResponse(){
		//Load the eampty search page
	}

	/**
	 * Handling the Bus Search List Records
	 * @param Object
	 * @return Mixed
	 */
	private function loadBusSearchList($result){
		if(isset($result->BusResults)){
			$searchData = [
				'traceId' => $result->TraceId,
				"boardingCity" => $result->Origin ,
				"droppingCity" => $result->Destination
			];
			$busData = [
				'search_result' => $result->BusResults,
				'search_data' => $searchData
			];
			$this->session->set_userdata("bus", $busData);
			return $this->load->view("search/search");
		}
		return $this->failedSeachResponse();
	}

	/**
	 * Loading Bus Card List
	 * @param Mixed
	 * @return Json
	 */
	public function loadCards($page = 1){
		$page = isset($_REQUEST['page']) ? ( int ) $_REQUEST['page'] : $page;
		$cardsData= [];
		$result = $_SESSION ['bus'] ['search_result'];
		$total = count($result); 
		$limit = PER_PAGE;
		$totalPages = ceil ( $total / $limit ); // calculate total pages
		$page = max ( $page, 1 ); // get 1 page when $_GET['page'] <= 0
		$page = min ( $page, $totalPages ); // get last page when $_GET['page'] > $totalPages
		$offset = (int) ($page - 1) * $limit;
		$cardsData = array_slice ( $result, $offset, $limit );
		$_SESSION ['showing'] = $page * $limit;
		$_SESSION ['total_pages'] = $totalPages;
		$hotels = $this->getFormatedHotels ( $cardsData );
		echo json_encode ( $hotels );
	}

	function getFormatedHotels($response) {
		$cards = array ();
		foreach ( $response as $key => $item ) {
			$cards['list'][] = $this->load->view("search/card", ['key'=>$key, "item"=> $item ],true);
		}
		$cards ['total'] = count($_SESSION ['bus'] ['search_result']);
		$cards['showing'] = $_SESSION ['showing'];
		$cards ['total_pages'] = $_SESSION ['total_pages'];
		return $cards;
	}


}

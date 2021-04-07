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
		$request = (object) $this->input->get();
		$requestParams = [
			"DateOfJourney" => date("Y/m/d", strtotime($request->travel_date)),
			"SourceId" => $request->from_city,
			"DestinationId" => $request->to_city,
			"PreferredCurrency" => getCurrentCurrency()
		];
		PrintArray($requestParams);
		$requestString = $this->makeRequestString($requestParams);
		PrintArray($requestString);
		$curlResponse = curlPost(BUS_SEARCH_API, $requestString);
		PrintArray($curlResponse->format);
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

}

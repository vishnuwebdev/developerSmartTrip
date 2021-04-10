<?php 
	$this->load->view('include/head');
 	$this->load->view('include/header');
	$result = $_SESSION ['bus']['search_result'];
	$searchData = $_SESSION ['bus'] ['search_data'];
	$currencyCode = getCurrentCurrency();
	$currencyCode = $result[0]->BusPrice->CurrencyCode;
	$price = busMaxMinPrice($result);
	if( $currencyCode == "USD" ){
		$js_currency_symbol = "$";
	}else if( $currencyCode == "AED" ){
		$js_currency_symbol = "AED";
	}else{
		 $js_currency_symbol = "₹";
	}
?>

	<?= $this->load->view("searchHeader",['searchData'=>$searchData]) ?>

	<!-- Flight Result Main -->
	<section class="flght-result-oneway htl-result-listing pt-2 pb-2 pt-md-3 pb-md-3">
		<div class="container-fluid">
			<div class="row">
				<?= $this->load->view("sidebar") ?>
				<div class="col-md-9">
					<div class="htl-result-right-list paul-htl-result-list">
						<div class="hotel-result-list-col bus_card_list">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Flight Result Main  end-->


	<!-- Modify Search Popup -->
	<div class="modal fade" id="modify-search">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Modify Search</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<?= $this->load->view("bus/search_form");?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


<!-------new end--------->
<?php $this->load->view('include/footer');?>
<script src="<?php echo site_url();?>assets/js/jquery_lazy_master/jquery.lazy.min.js"></script>
<script type="text/javascript">
    var isBusSearchSection = true;
	var totalRecords = "<?= count($result) ?>";
</script>
<?php $this->load->view('bus/js',['js_currency_symbol'=>$js_currency_symbol,"price"=>$price]);?> 
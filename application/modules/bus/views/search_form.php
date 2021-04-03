<form action="<?= site_url() ?>bus/search" method="get">
	<div class="row">
		<div class="col-md-6">
			<label for="">From</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="icofont-google-map"></i></span>
				</div>
				<input type="text" name="from_travel" id="from_travel" onkeyup="travel_suggest(this.value,0);" class="form-control from_travel" placeholder="From City">
			</div>
		</div>
		<div class="col-md-6">
			<label for="">To</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="icofont-google-map"></i>
					</span>
				</div>
				<input type="text" name="to_travel" id="to_travel" class="form-control to_travel" onkeyup="travel_suggest_to(this.value,0);"  placeholder="Travel City">
				<input type="hidden" class="" name="from_country" id="flight_from_country0">
				<input type="hidden" class="" name="to_country" id="flight_from_to_country0">
				<input type="hidden" name="from_city_code" id="flight_from_city0">
				<input type="hidden" name="to_city_code" id="flight_from_to_city0">		
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3 depart-flt">
			<label for="travel_date">Travel Date</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="icofont-ui-calendar"></i>
					</span>
				</div>
				<input placeholder="YYYY-MM-DD" type="text" name="travel_date" id="travel_date" class="form-control">
			</div>
		</div>
	</div>
	<div class="col-md-12">	
		<button id="bus-search" type="submit" class="btn btn-search" >Search</button>
	</div>
</form>
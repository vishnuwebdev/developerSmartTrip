<section class="search-result-info pt-3 pb-3">
	<div class="container-fluid">
		<div class="oneway-modify">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-8 border-right">
					<div class="one-flght-location">
						<small class="text-muted text-uppercase">Booking Bus Date</small>
						<h6 class="mb-0"><?= isset($_SESSION['search_request']['DateOfJourney']) ? $_SESSION['search_request']['DateOfJourney'] : null ?></h6>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-4 border-right">
					<div class="flght-depart">
						<small class="text-muted text-uppercase">Boarding City</small>
						<h6 class="mb-0"><i class="icofont-ui-calendar"></i> <?= $searchData['boardingCity'] ?></h6>
					</div>
				</div>
				<div class="col-md-2 col-sm-6 col-4 border-right">
					<div class="flght-depart">
						<small class="text-muted text-uppercase">Dropping City</small>
						<h6 class="mb-0"><i class="icofont-ui-calendar"></i> <?= $searchData['droppingCity'] ?></h6>
					</div>
				</div>
				<div class="col-md-2 col-sm-4 col-12">
					<div class="modify-btn text-center">
						<a href="javascript:void(0)" class="btn btn-search d-md-none" id="filter_btn">Filter</a>
						<button type="" class="btn btn-search" data-toggle="modal" data-target="#modify-search"> Modify Search</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
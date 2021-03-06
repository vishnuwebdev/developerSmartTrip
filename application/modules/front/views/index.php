<?php $this->load->view('include/head') ?>
<?php $this->load->view('include/header') ?>
<?php
	if ($this->session->flashdata ( 'flash_error' ) !== NULl) {
		$message = $this->session->flashdata('flash_error');
?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Error: </strong> <?= $message ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>

<section class="slider-search-wrap position-relative">
<?php $this->load->view('search_section') ?>
<div class="slider-wrap">
	<div class="owl-carousel homepage-carousel">
	<?php if(!empty($sliderimg))
		{ foreach($sliderimg as $slider_data){ ?>
	
		<div class="item">
			<img src="<?php echo site_url(); ?>admin/assets/img/slider/main/<?php echo $slider_data->sliimg_image ?>" alt="<?php echo $slider_data->sliimg_title; ?>">
		</div>
		
		<?php } } else{ ?>
		<div class="item">
			<img src="assets/images/slider-02.jpg" alt="slider-02">
		</div>
		<?php }?>
	</div>
</div>
<!-- slider section end from here -->
</section>




<!-- our facilities -->
<section class="our-facilities">
	<div class="container">
		<div class="facilit-col">
			<div class="row">
				<div class="col-md-6">
					<div class="our-facilitie-col">
						<i class="icofont-check-circled"></i>
						<span class="facility-text">Over a Million Flights Hotels & Packages.</span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="our-facilitie-col">
						<i class="icofont-check-circled"></i>
						<span class="facility-text">No Cancellation Fee to Change or Cancel Almost any Hotel Reservation.</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--/ our facilities end -->
<?php  if(!empty($package1)) { ?>
<!-- Today’s Popular Destinations -->
<section class="popular-destination pt-2 pb-2 pt-md-4 pb-md-4">
	<div class="container">
		<h2 class="heading-2"><?php echo $category1?></h2>
		<div class="pop-crasouel owl-carousel">
		
		<?php  foreach ($package1 as $Key => $pckg)
			{?>
		
			<div class="item">
				<div class="popl-dest">
					<div class="popl-dest-img">
						<a href="<?php echo site_url() ?>holiday/holidaydetail/<?php echo $pckg->holiday_slug; ?>" class="d-block">
							<img src="<?php echo site_url(); ?>/admin/assets/img/holiday/main/<?php echo $pckg->holiday_feature_image; ?>" alt="<?php echo $pckg->holiday_name; ?>">
						</a>
					</div>
					<div class="popl-dest-desc">
						<h4>
							<a href="<?php echo site_url() ?>holiday/holidaydetail/<?php echo $pckg->holiday_slug; ?>" class="d-block">
								<?php echo $pckg->holiday_name; ?>
							</a>
						</h4>
						<p><?php echo $pckg->holiday_short_description; ?></p>
					</div>
				
				</div>
			</div>
			
			
			<?php } ?>	
			
		
		</div>
	</div>
</section>
<!--./ Today’s Popular Destinations -->
<?php } ?>	
<?php if(!empty($blogs)){ ?>
<!---BLOG-->
<section class="today-top-packages pt-2 pb-2 pt-md-5 pb-md-5">
	<div class="container">
		<h2 class="heading-2">Blogs</h2>
		<div class="td-top-crasouel owl-carousel">
		
		<?php  foreach ($blogs as $Key => $blog_list)
			{?>		
			
			<div class="item">
				<a href="<?php echo site_url() ?>blog/blogdetail/<?php echo $blog_list->b_link; ?>" class="d-block">
					<div class="tdy-pckg">
						<div class="tdy-pckg-img">					
							<img src="/admin/assets/img/blog/<?php echo $blog_list->b_image; ?>" alt="<?php echo $blog_list->b_title; ?>">
						</div>
						<div class="tdy-pckg-desc">					
							<h5><?php echo $blog_list->b_title; ?></h5>
							<p class="mb-0">
							<?php echo $blog_list->b_meta_description; ?></span></p>					
						</div>
					</div>
				</a>
			</div>	
			
			<?php } ?>	
			
		
		</div>
	</div>
</section>
<!--------->
<?php } ?>	
<!-- Adventure  -->
<!--
<section class="adventure-col">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="adven-wrap">
					<div class="adven-topbar">
						<h4>Adventure</h4>
						<h3>Dare To Explore</h3>
					</div>
					<p class="">Exploring means learning. Bring new experiences from each journey. Meet different cultures, traditions and landscapes. Choose your next destination and start your trip.</p>
					<a href="<?php echo site_url(); ?>online/adventure" class="btn btn-search">See More</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="adven-img">
					<img src="assets/images/adventure-travel-bg.jpg" alt="adventure-travel">
				</div>
			</div>
		</div>
	</div>
</section>
-->
<!-- Adventure end -->

<!-- Today’s Top Packages -->
<!--
<section class="today-top-packages pt-2 pb-2 pt-md-5 pb-md-5">
	<div class="container">
		<h2 class="heading-2 text-center center-line"><?php echo $category2?></h2>
		<div class="td-top-crasouel owl-carousel">
		<?php if(!empty($package2))
			{ foreach ($package2 as $Key => $pckg)
			{?>
			<div class="item">
			<a href="<?php echo site_url() ?>holiday/holidaydetail/<?php echo $pckg->holiday_slug; ?>" class="d-block">
				<div class="tdy-pckg">
					<div class="tdy-pckg-img">					
						<img src="<?php echo site_url(); ?>/admin/assets/img/holiday/main/<?php echo $pckg->holiday_feature_image; ?>" alt="<?php echo $pckg->holiday_name; ?>">				
					</div>
					<div class="tdy-pckg-desc">					
						<h5><?php echo $pckg->holiday_name; ?></h5>
						<p class="mb-0"><?php echo $pckg->holiday_short_description; ?></span></p>					
					</div>
				</div>
				</a>
			</div>			
			<?php }}?>
			
		</div>
	</div>
</section>
-->


<!-- Today’s Top Packages end -->
<?php $this->load->view('include/footer') ?>
<?php $this->load->view('front/js') ?>

<script>
	function bp_child_age(value, sect){
  if(value == ""){
  $("#bp_for_child_dob_"+sect).fadeOut(300);
    } else {
  $("#bp_for_child_dob_"+sect).fadeIn(300);
  }
  //console.log(bp_age_div_data);
  var bp_age_div_data = "";     
  bp_age_div_data +='<div class="row">';
  for(var i = 1; i <= value; i++){
    bp_age_div_data +='<div class="col-sm-6">\
                            <label>Child '+i+' Age</label>\
                            <select name="age_'+sect+'_'+i+'" id="age_'+sect+'_'+i+'" class="form-control custom-select">\
                                <option value="1">1 Year</option>\
                                <option value="2">2 Years</option>\
                                <option value="3">3 Years</option>\
                                <option value="4">4 Years</option>\
                                <option value="5">5 Years</option>\
                                <option value="6">6 Years</option>\
                                <option value="7">7 Years</option>\
                                <option value="8">8 Years</option>\
                                <option value="9">9 Years</option>\
                                <option value="10">10 Years</option>\
                                <option value="11">11 Years</option>\
                                <option value="12">12 Years</option>\
                            </select>\
                        </div>';
                        }
    bp_age_div_data +='</div>';     
    $("#bp_for_child_dob_"+sect).html(bp_age_div_data);
  
  }
</script>



<script>

$("#option2").click(function(){
  $(".type_flight").val("Return");
  //type_flight
  //console.log('tgu');
});
$("#option1").click(function(){
  $(".type_flight").val("OneWay");
  //type_flight
  //console.log('tgu');
});




$("#roomsadd").click(function(){
	$(".hotelguestsdetails").toggle();
});

$(".searchenginehoteldone").click(function(){
	$(".hotelguestsdetails").hide();
});

$(".pop_select").change(function(){
  
	var child  =	parseInt($(".infent_select").val());  
	var infant = 	parseInt($(".child_select").val());  
  var adult  =	parseInt($(".adult_select").val());  
	var total=child+infant+adult;
	 $(".guest_num").text(total);
	
});

$(".class_selected").change(function(){	
		$(".room_num").text($(".class_selected option:selected").text());
})
</script>





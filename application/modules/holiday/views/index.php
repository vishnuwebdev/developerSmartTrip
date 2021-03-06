<?php $this->load->view('include/head') ?>
<?php $this->load->view('include/header') ?>

<?php $data['active_tab'] = "holiday";?>
<?php
       if(empty($this->uri->segment('1')))
		{
		  $active_tab = "flight";
		} else {
		  $active_tab = $this->uri->segment('1');
		}
		   		
?>
<!--
<section class="slider-search-wrap position-relative">
<?php //$this->load->view('search_section') ?>

</section>
-->
<section class="slider-search-wrap position-relative">
<div class="search-wrapper">
		<div class="container">
			<div class="search-tabbar">
				<div class="search-buttons-col pb-3">
					<ul class="nav nav-tabs ">
					  <li class="nav-item">
					    <a class="nav-link <?php if($active_tab=="flight") { echo "active";} ?>"  href="<?php echo site_url();?>">
					    	<i class="icofont-ui-flight"></i> <span>Flight</span>
					    </a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link <?php if($active_tab=="hotel") { echo "active";} ?>" href="<?php echo site_url();?>hotel">
					    	<i class="icofont-hotel"></i>
					    	<span>Hotel</span>
					    </a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link <?php if($active_tab=="holiday") { echo "active";} ?>" href="<?php echo site_url();?>holiday">
					    	<i class="icofont-beach-bed"></i>
					    	<span>Holiday</span>
					    </a>
					  </li>

					  <li class="nav-item">
					    <!--<a class="nav-link <?php if($active_tab=="holiday") { echo "active";} ?>" data-toggle="tab" href="#holiday-tab">
					    	<i class="icofont-beach-bed"></i>
					    	<span>Holiday</span>
					    </a>-->
						<a class="nav-link <?php if($active_tab=="visa") { echo "active";} ?>" href="<?php echo site_url();?>visa">
							<i class="icofont-visa-alt"></i>
					    	<span>Visa</span>
					    </a>
					  </li>
					</ul>
				</div>
				<div class="search-tabbar-wrap">
					<div class="tab-content">
					  	<div class="tab-pane <?php if($active_tab=="holiday") { echo "in active";} ?>" id="holiday-tab">
					  		<div class="search-bar-col flight-wrap-col holiday-wrap-col">
							
					  			<form action="<?php echo site_url();?>holiday/holiday_list" method="get">
					  				<div class="row">
					  					<div class="col-md-6">
				  							<div class="form-group">

				  								


<label for="keyword">Search Holiday Packages</label>
					  							<div class="input-group mb-3">
					  								<div class="input-group-prepend">
					  									<span class="input-group-text"><i class="icofont-google-map"></i></span>
													</div>
													<input type="text" name="keyword" id="keyword" class="form-control flight_from0" placeholder="City or Country Name">
												</div>









				  								
				  							</div>
				  						</div>
				  						<div class="col-md-12">	
				  							<button id="pckg-search"  type="submit" class="btn btn-search" >Search</button>
				  						</div>
				  					</div>
									</form>
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
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
	</div><!-- slider section end from here -->


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

<!-- Today’s Popular Destinations -->
<section class="popular-destination pt-2 pb-2 pt-md-4 pb-md-4">
	<div class="container">
		<h2 class="heading-2"><?php echo $category1?></h2>
		<div class="pop-crasouel owl-carousel">
		
		<?php if(!empty($package1))
			{ foreach ($package1 as $Key => $pckg)
			{?>
		
			<div class="item">
				<div class="popl-dest">
					<div class="popl-dest-img">
						<a href="<?php echo site_url() ?>holiday/holidaydetail/<?php echo $pckg->holiday_slug; ?>" class="d-block">
							<img src="<?php echo site_url(); ?>/admin/assets/img/holiday/main/<?php echo $pckg->holiday_feature_image; ?>" alt="<?php echo $pckg->holiday_name; ?>">
						</a>
					</div>
					<div class="popl-dest-desc">
					<a href="<?php echo site_url() ?>holiday/holidaydetail/<?php echo $pckg->holiday_slug; ?>" class="d-block">
						<h4>
							<?php echo $pckg->holiday_name; ?>
						</h4>
						<p><?php echo $pckg->holiday_short_description; ?></p>
						</a>
					</div>
				</div>
			</div>
			
			<?php } }?>	
			
		
		</div>
	</div>
</section><!--./ Today’s Popular Destinations -->

<!-- Adventure  -->
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
					<a href="#" class="btn btn-search">See More</a>
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
<!-- Adventure end -->

<!-- Today’s Top Packages -->
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
</section>

<!-- Today’s Top Packages end -->
<?php $this->load->view('include/footer') ?>

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
$(function(){
    $( "#bus-depart-date" ).datepicker({
       numberOfMonths: 1,
           dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
           "minDate": 0,
           showOn: 'both',
           buttonText: '',
           dateFormat: 'yy-mm-dd',
           
           onClose: function (selectedDate)
             {
               $("#bp_check_out_date").datepicker("option", "minDate", selectedDate);
             }
    });
});

function bus_sugges_from(inputString,id) {
    $( ".bus_from" ).autocomplete({
    autoFocus: true,	
    minLength : 2,
    source : function(request, response) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url();?>bus/fetch_city_to",
            dataType : "json",
            cache : false,
            data: {id: inputString,div_id:id},
            success: 
                function(data){
                    var all_l=[];
                    for(var i=0;i<data.length;i++)
                    {
                        var city_name=data[i].busodma_destination_name; 
                        var code=data[i].busodma_destination_code;
                        all_l.push({ "label": city_name, "value": city_name, "city_code":code  } );
                    }
                    response(all_l);
                }	
            });	  
        }, 
        select: function(event, ui) {   
            var bp_age_div_data = "";
            $('#source_code').val(ui.item.city_code);
            $.ajax({
            type: "POST",
            url: "<?php echo site_url();?>bus/bus_destination_fetch",
            dataType : "json",
            cache : false,
            data: {city_code:ui.item.city_code},
            success: 
                function(data){
                  //  console.log(data.Description.bp);
                  $('#destination').empty();    
                  
                        for(var i=0;i<data.length;i++)
                        {
                            console.log(data[i].CityId.bp);
                            bp_age_div_data +='<option value ="'+data[i].RedBusCityCode.bp+','+data[i].CityName.bp+'">'+data[i].CityName.bp+'</optio>';
                         }
        
                    $('#destination').append(bp_age_div_data);
                }	
            });	  
        },
    });    
}

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



  $( function() {
    var availableTags = <?php echo (($keyword)) ?>;
    $( "#keyword" ).autocomplete({
      source: availableTags,
      minLength:1,   
      delay:100,  
	  autoFocus:true

    });
  } );





</script>


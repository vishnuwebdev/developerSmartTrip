<?php 
	$this->load->view('include/head');
 	$this->load->view('include/header');
?>    
    <link rel="stylesheet" href="<?php echo site_url();?>assets/css/bus_seat.css">
    <section class="flght-result-oneway htl-result-listing pt-2 pb-2 pt-md-3 pb-md-3">
        <!-- <h2> Choose seats by clicking the corresponding seat in the layout below:</h2> -->
        <div id="holder"> 
            <ul  id="place">
            </ul>    
        </div>
        <!-- <div style="float:left;"> 
            <ul id="seatDescription">
                <li class="available_seat">Available Seat</li>
                <li class="booked_seat">Booked Seat</li>
                <li class="selectd_seat">Selected Seat</li>
            </ul>
            </div>
                <div style="clear:both;width:100%">
                <input type="button" id="btnShowNew" value="Show Selected Seats" />
                <input type="button" id="btnShow" value="Show All" />           
            </div>
        </div> -->
    <?php $this->load->view('include/footer');?>
	<script src="<?php echo site_url();?>assets/js/jquery_lazy_master/jquery.lazy.min.js"></script>
	<script type="text/javascript">
		var isLayoutSection = true;
	</script>
	<?php $this->load->view('bus/js'); ?>     

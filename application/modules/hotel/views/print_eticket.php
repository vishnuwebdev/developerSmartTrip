
<?php $this->load->view('include/head');
$this->load->view('include/header'); ?>
<section class="print-ticket-col pt-2 pb-2 pt-md-3 pb-md-3">
<div class="container">

	<div class="col-fly-com">

               <h3 class="review-title">Enter Ticket Details</h3>

               <div class="col-fly-inn">
			    <?php
        if ($this->session->flashdata('alert_register') !== NULl) {
            $bhanu_message = $this->session->flashdata('alert_register');
            ?>

            <div
                class="alert alert-sm alert-border-left <?php echo $bhanu_message['class']; ?>  light alert-dismissable">
                <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">×</button>
                <i class="fa fa-info pr10"></i> <strong> <?php echo $bhanu_message['message']; ?></strong>
            </div>

        <?php }?>
			   
		<form target="_blank" id="print_eticket" action="hotel/print_eticket" method="post">
                 <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                      <div class="form-group">

                        <label>Enter PNR:</label>

                        <input type="text" class="form-control pax_validation_field" id="ticket_pnr" placeholder="Enter Ticket PNR" name="ticket_pnr" required="">

                      </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                      <div class="form-group">

                        <label>Enter Email:</label>

                        <input type="email" class="form-control pax_validation_field" id="cust_mobile_no" name="cust_email" placeholder="Enter Email ID" required="">
                      </div>
                   </div>	
					
		</div>
		<button type="submit" class="btn btn-search">Submit</button>
					
	</form>
</div>
</div>
</div>
</section>
<?php $this->load->view('include/footer'); ?>
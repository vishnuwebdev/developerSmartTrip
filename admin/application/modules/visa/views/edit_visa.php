<?php $this->view('simple_layout/header'); ?>
<?php $this->view('simple_layout/leftSidebar'); ?>
<section id="content">
	<div class="page page-forms-validate">
		<div class="pageheader">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li><a href="<?php echo site_url();?>"><i class="fa fa-home"></i>
							<?php echo $this->lang->line ( "dashboard" );?></a></li>
					<li><a href="<?php echo site_url($this->uri->segment("1"));?>/visa_list"></i><?php echo $this->lang->line ( "visa" );?></a></li>
					<li><a></i><?php echo $this->lang->line ( "add" );?> <?php echo $this->lang->line ( "visa" );?></a></li>
				</ul>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<!-- col -->
			<div class="col-md-12">
				<!-- tile -->
				<section class="tile bp_shadow">
					<!-- tile header -->
					<div class="tile-header dvd dvd-btm">
						<h1 class="custom-font">
							<strong><?php echo $this->lang->line ( "edit" );?> <?php echo $this->lang->line ( "visa" );?> Type </strong>
						</h1>
					</div>
					<!-- /tile header -->
					<?php 
					$attributes = array('class' => 'form-horizontal','id'=>'add_visa'); 
					echo form_open_multipart('visa/update_visa',$attributes); 
					echo form_hidden('id',set_value('id', isset($result->id)? bp_hash($result->id) :'' ));
					?>
					<!-- tile body -->
					<div class="tile-body">
						<?php 
						echo form_error('myfield', '<div class="error">', '</div>');
						if(validation_errors()!=NULL){ ?>	
							<div class="alert alert-big alert-lightred alert-dismissable fade in">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<?php echo validation_errors(); ?>
							</div>
                        <?php } ?>

						<div class="form-group">
							<label class="col-sm-2 control-label"><?php echo $this->lang->line ( "visa" );?>  <?php echo $this->lang->line ( "title" );?> </label>
							<div class="col-sm-9">
								<div class="input text">
									<?php echo form_input(array('name'=>'visa_title','maxlength'=>200,'class'=>'form-control'),set_value('visa_title', isset($result->visa_title) ? $result->visa_title : ''));?>
									<?php echo form_error('visa_title', '<div class="error">', '</div>');?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"><?php echo $this->lang->line ( "visa" );?>  <?php echo $this->lang->line ( "amount" );?> </label>
							<div class="col-sm-9">
								<div class="input text">
									<?php echo form_input(array('name'=>'visa_amount',"onkeypress"=>"return onlyNumberKey(event)",'class'=>'form-control'),set_value('visa_amount', isset($result->visa_amount) ? $result->visa_amount : ''));?>
									<?php echo form_error('visa_amount', '<div class="error">', '</div>');?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"><?php echo $this->lang->line ( "visa" );?>  Duration </label>
							<div class="col-sm-9">
								<div class="input text">
									<?php echo form_input(array('name'=>'visa_duration',"onkeypress"=>"return onlyNumberKey(event)",'class'=>'form-control'),set_value('visa_duration',isset($result->duration) ? $result->duration : ''));?>
										<?php echo form_error('visa_duration', '<div class="error">', '</div>');?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"><?php echo $this->lang->line ( "visa" );?>  <?php echo $this->lang->line ( "location" );?>  </label>
							<div class="col-sm-9">
								<div class="input text">
									<?php echo form_dropdown($location); ?>
									<?php echo form_error('country_id', '<div class="error">', '</div>');?>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label"><?php echo $this->lang->line ( "visa" );?>  <?php echo $this->lang->line ( "status" );?>  </label>
							<div class="col-sm-9">
								<div class="input text">
									<select class="form-control" name="status">
									<option value="active" <?php if($result->visa_status=="active"){ echo "selected"; } ?>><?php echo $this->lang->line ( "active" );?> </option>
									<option value="inactive" <?php if($result->visa_status=="inactive"){ echo "selected"; } ?>><?php echo $this->lang->line ( "inactive" );?> </option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!-- /tile body -->
					
					<!-- tile footer -->
					<div class="tile-footer text-right bg-tr-black lter dvd dvd-top">
						<!-- SUBMIT BUTTON -->
						<div class="submit">
							<input type="submit" class="btn btn-success" value="<?php echo $this->lang->line ( "submit" );?> ">
						</div>
					</div>
					<!-- /tile footer -->
					</form>
				</section>
				<!-- /tile -->
			</div>
			<!-- /col -->
		</div>
		<!-- /row -->
	</div>
</section>
<!--/ CONTENT -->
<?php $this->load->view("simple_layout/footer");?>
<?php $this->load->view("visa/js");?>
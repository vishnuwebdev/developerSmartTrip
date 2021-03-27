<?php $this->view('simple_layout/header'); ?>
<?php $this->view('simple_layout/leftSidebar'); ?>
<style>
    <!--
    .thumbscl{

        border-radius:6%;
        width: 80px;
        height: 80px !important;

    }

    table.bp_table th,table.bp_table tr td{
        vertical-align: middle;
    }
    -->
</style>
<section id="content">
    <div class="page page-forms-validate">
        <div class="pageheader">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i>
                            <?php echo $this->lang->line("dashboard"); ?></a></li>
                    <li><a href="<?php echo site_url($this->uri->segment("1")); ?>"></i><?php echo $this->lang->line("testimonial"); ?></a></li>
                    <li><a></i> <?php echo $this->lang->line("testimonial"); ?> <?php echo $this->lang->line("list"); ?></a></li>
                </ul>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12">
                <!-- tile -->
                <a href="<?php echo site_url() . $this->uri->segment("1"); ?>/add_testimonial" class="btn btn-greensea btn-ef btn-ef-7 btn-ef-7h mb-10 pull-right"><i class="fa fa-plus"></i> <?php echo $this->lang->line("add"); ?> <?php echo $this->lang->line("testimonial"); ?></a>
                <div class="clearfix"></div>
                <section class="tile bp_shadow">
                    <!-- tile header -->
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font">
                            <strong><?php echo $this->lang->line("testimonial"); ?> </strong> <?php echo $this->lang->line("list"); ?>
                        </h1>
                    </div>
                    <?php
                    if ($this->session->flashdata('alert') !== NULl) {
                        $bhanu_message = $this->session->flashdata('alert');
                        ?>
                        <div class="alert alert-sm alert-border-left <?php echo $bhanu_message['class']; ?> light alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×</button>
                            <i class="fa fa-info pr10"></i> <strong> <?php echo $bhanu_message['message']; ?></strong>
                        </div>

                    <?php } ?>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <!-- tile body -->
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="tableTools"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="colVis"></div>
                            </div>
                        </div>
                        <table class="table table-bordered bp_table">
                            <thead>
                                <tr>
                                    <th>#</th>

                                    <th><?php echo $this->lang->line("name"); ?></th>
                                    <th><?php echo $this->lang->line("detail"); ?></th>
                                    <th><?php echo $this->lang->line("discription"); ?></th>
                                    <th><?php echo $this->lang->line("language"); ?></th>
                                   
                                     <th><?php echo $this->lang->line("site_type"); ?></th>
                                    <th><?php echo $this->lang->line("status"); ?></th>
                                    <th><?php echo $this->lang->line("action"); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($result)) {
                                    if (is_array($result)) {
                                        $i = 1;
                                        foreach ($result as $bp) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?> </td>

                                                <td><?php echo $bp->testimo_name; ?></td>
                                                <td><b><?php echo $this->lang->line("email"); ?>: </b><?php echo $bp->testimo_email; ?><br>
                                                    <b><?php echo $this->lang->line("phone"); ?>: </b><?php echo $bp->testimo_phone; ?><br>
                                                    <b><?php echo $this->lang->line("designation"); ?>: </b><?php echo $bp->testimo_designation; ?><br>
                                                    <b><?php echo $this->lang->line("company"); ?>: </b><?php echo $bp->testimo_company; ?><br>
                                                <b><?php echo $this->lang->line("star"); ?>: </b> <?php echo $bp->testimo_star; ?></td>
                                                <td><?php echo $bp->testimo_comment; ?></td>
                                                <td><?php echo $bp->testimo_language; ?></td>
                                           
                                                 <td><?php echo $bp->testimo_site_type; ?></td>
                                                <td><?php if ($bp->testimo_status == "active") { ?><a href="<?php echo site_url(); ?>testimonial/update_testimonial_status/?ref_id=<?php echo url_encode($bp->testimo_id); ?>&status=inactive" class="label label-success"><?php echo $this->lang->line($bp->testimo_status); ?></a><?php } else { ?><a href="<?php echo site_url(); ?>testimonial/update_testimonial_status/?ref_id=<?php echo url_encode($bp->testimo_id); ?>&status=active" class="label label-danger"><?php echo $this->lang->line($bp->testimo_status); ?></a><?php } ?></td>
                                                <td>
                                                    <a href="<?php echo site_url(); ?>testimonial/edit_testimonial/?ref_id=<?php echo url_encode($bp->testimo_id); ?>" class="btn btn-primary btn-sm mb-10"><i class="fa fa-edit"></i> <span> <?php echo $this->lang->line("edit"); ?></span></a>
                                                    <button class="btn btn-danger btn-sm mb-10"  onclick="addidfordelete('<?php echo site_url(); ?>testimonial/deletetestimo/?testimo_id=<?php echo url_encode($bp->testimo_id); ?>')"><i class="fa fa-trash"></i> <span><?php echo $this->lang->line("delete"); ?></span></button>
                                                    
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <div style="text-align: right;"><?php echo $this->pagination->create_links(); ?></div>
                    </div>
                    <!-- /tile body -->
                    <!-- /tile body -->
                    <!-- tile footer -->
                    <div class="tile-footer text-right bg-tr-black lter dvd dvd-top">
                        <!-- SUBMIT BUTTON -->

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

<div class="modal fade" id="delPollModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">! <?php echo $this->lang->line("warning"); ?></h3>
            </div>
            <div class="modal-body">
<?php echo $this->lang->line("do_you_want_to_delete"); ?>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" id="deletePoll"><i class="fa fa-arrow-right"></i> <?php echo $this->lang->line("delete"); ?></a>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> <?php echo $this->lang->line("cancel"); ?></button>
            </div>
        </div>
    </div>
</div>
<!--/ CONTENT -->
<?php $this->load->view("simple_layout/footer"); ?>
<?php $this->load->view("testimonial/js"); ?>


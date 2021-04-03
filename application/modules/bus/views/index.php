<?php $this->load->view('include/head') ?>
<?php $this->load->view('include/header') ?>
<section class="slider-search-wrap position-relative">
    <?php $this->load->view('search_section') ?>
    <div class="slider-wrap">
        <div class="owl-carousel homepage-carousel">
            <?php 
                if(!empty($sliderimg)){ 
                    foreach($sliderimg as $slider_data){ 
            ?>
                <div class="item">
                    <img src="<?= site_url() ?>admin/assets/img/slider/main/<?= $slider_data->sliimg_image ?>" alt="<?= $slider_data->sliimg_title ?>">
                </div>	
            <?php } } else{ ?>
                <div class="item">
                    <img src="assets/images/los-angeles.jpg" alt="slider-02">
                </div>
            <?php }?>
        </div>
    </div>
    <!-- slider section end from here -->
</section>
<?php $this->load->view('include/footer') ?>
<?php $this->load->view('bus/js') ?>
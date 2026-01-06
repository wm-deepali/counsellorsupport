<?php include('header.php');?>
<section class="services-page-section">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (isset($services) && !empty($services)) {
                 foreach($services as $service) { ?>
            <div class="col-sm-4">
                <div class="services-main">
                    <div class="service-img">
                        <img src="<?= base_url() ?><?= $service->image_thumb ?>" alt="Service" class="img-fluid">
                    </div>
                    <div class="service-text">
                        <h5><?= $service->name ?><br>(<?= $service->hindi_name ?>)</h5>
                        <p><?= $service->content ?></p>
                        <a href="<?= base_url() ?>services/<?= $service->slug ?>">Read Detail</a>
                    </div>
                </div>
            </div>
            <?php }}?>
            
        </div>
    </div>
</section>
<?php include('footer.php');?>
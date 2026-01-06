<?php include('header.php');?>
<section class="about-us-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12 order-r-2">
				<div class="inner-column">
					<div class="title"></div>
					<h2><?= $about[0]->title ?></h2>
					
					<?= $about[0]->content ?>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 align-self-center order-r-1">
			    <div class="image-column image-1">
					<img src="<?= base_url() ?><?= $about[0]->image1 ?>" class="img-fluid">
                </div><!--
                <div class="image-column image-2">
					<img src="<?= base_url() ?><?= $about[0]->image2 ?>" class="img-fluid">
				</div>-->
			</div>
		</div>
	</div>
</section>
<?php include('footer.php');?>
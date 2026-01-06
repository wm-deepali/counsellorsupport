<?php include('header.php');?>
<section class="rev_slider_wrapper">
	<div id="slider1" class="rev_slider" data-version="5.0">
		<ul>
		    	<?php if (isset($sliders) && !empty($sliders)) {
					 foreach($sliders as $slider) { ?>
			<li data-transition="fade" data-thumb="<?= base_url() ?><?= $slider->image ?>">
				<img src="<?= base_url() ?><?= $slider->image ?>" alt="" width="1920" height="500" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

				<div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="0" data-y="top" data-voffset="170" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="500">
					<div class="slide-content-box mar-lft">
						<div class="tag-line has-line is-inline"></div>
					</div>
				</div>
				<div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="0" data-y="top" data-voffset="210" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="1000">
					<div class="slide-content-box mar-lft">
						<div class="big-title" style="color:<?= $slider->text_color ?>;"><?= $slider->title ?> </br>
					<?= $slider->hindi_title ?>	</div>
					</div>
				</div>
				<div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="0" data-y="top" data-voffset="335" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="1500">
					<div class="slide-content-box mar-lft">
						<div class="text"></div>
					</div>
				</div>
				<div class="tp-caption tp-resizeme" data-x="left" data-hoffset="0" data-y="top" data-voffset="465" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="2000">
					<div class="slide-content-box mar-lft">
						<div class="btn-box">
							<a href="<?= base_url() ?>about-us" class="slide-btn">Meet the Counsellor</a>
						</div>
					</div>
				</div>
			</li>
			<?php }} ?>

			
		</ul>
	</div>
</section>
<section class="slider-section" style="display: none;">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?= base_url() ?>assets/images/slider/slide1.jpg" alt="">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  		</a>
	</div>
</section>

<section class="about-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="inner-column">
					<div class="title"></div>
					<h2><?= $home[0]->title ?></h2>
					<?= $home[0]->content ?>
			    </div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 align-self-center">
				<div class="image-column-1 mb-5">
					<img src="<?= base_url() ?><?= $home[0]->image ?>" class="img-fluid">
				</div>
				<div class="image-column-2">
					<img src="<?= base_url() ?><?= $home[0]->image1 ?>" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="quote-section-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 align-self-center">
                <div class="quote">
                    <h3><div class="quote-left"><i class="fas fa-quote-left"></i></div> Anger and intolerance are the enemies of correct understanding.<div class="quote-right"><i class="fas fa-quote-right"></i></div></h3>
                    <h4>- Mahatma Gandhi</h4>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="quote-img">
                    <img src="<?= base_url() ?>assets/images/gandhi.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-services">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="heading-title">
					<h2>How I Can Help You</h2>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="owl-carousel service-block" id="service-block">
					<?php if (isset($services) && !empty($services)) {
					 foreach($services as $service) { ?>
					<div class="service-main">
						<div class="service-img">
							<a href="<?= base_url() ?>services/<?= $service->slug ?>"><img src="<?= base_url() ?><?= $service->image_thumb ?>" class="img-fluid"></a>
						</div>
						<div class="service-text">
							<h3><a href="<?= base_url() ?>services/<?= $service->slug ?>"><?= $service->name ?><br><?= $service->hindi_name ?></a></h3>
							<p><?= $service->content ?></p>
							<a href="<?= base_url() ?>services/<?= $service->slug ?>" class="btn-vd">View Details</a>
						</div>
					</div>
				<?php }} ?>
					
				</div>
			</div>
		</div>
	</div>
</section>

<section class="quote-section-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="quote-img">
                    <img src="<?= base_url() ?>assets/images/glenn-close.png" class="img-fluid">
                </div>
            </div>
            <div class="col-sm-10 align-self-center">
                <div class="quote">
                    <h3>What mental health needs is, more sunlight, more candor and more unashamed conversation.</h3>
                    <h4>- Glenn Close</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title">What Client Says</div>
			</div>
			<div class="col-sm-12">
				<div class="owl-carousel client-block" id="client-block">
				      <?php if (isset($feedbacks) && !empty($feedbacks)) {
										 foreach($feedbacks as $feedback) { ?>
					<div class="clientSayWrapper">
						<div class="clientSay">
							<i class="fas fa-quote-left"></i>
							<div class="simple-article normall">
								<p><?= $feedback->message ?></p>
							</div>
						</div>
						<div class="sayPersone">
							<img src="<?= base_url() ?><?= $feedback->image_thumb ?>" class="img-fluid" alt="">
							<div class="personeInfo">
								<p><?= $feedback->name ?></p>
								<span></span>
							</div>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>

			<div class="col-sm-12 text-center">
				<button class="btn btn-feedback" data-target="#send-feedback" data-toggle="modal" type="button">Send Feedback</button>
			</div>
		</div>
	</div>
</section>
<?php if (isset($popup) && !empty($popup)) { ?>
									
<div class="modal fade" id="onload" tabindex="-1" role="dialog" aria-labelledby="onload" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-650" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Important Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="covid-div">
            <div class="covid-img align-self-center">
                <img src="<?= base_url() ?><?= $popup[0]->image ?>" class="img-fluid">
            </div>
            <div class="covid-text">
                <?= $popup[0]->content ?>

            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php include('footer.php');?>
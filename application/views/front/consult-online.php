<?php include('header.php'); ?>
<style>
    .doctor-section {
  padding: 60px 0;
}

.doctor-card-row {
  gap: 20px 0;
}

/* Card */
.doctor-card {
  text-align: center;
  padding: 30px 20px;
  border-radius: 6px;
  height: 100%;
}

.doctor-card h5 {
  font-size: 18px;
  font-weight: 500;
  margin: 20px 0;
}



/* Image box */
.doctor-image {
  width:95%;
  background: #fff;
  padding: 2px;
  display: inline-block;
}

.doctor-image img {
width: 100%;
  height:auto;
}

/* Button */
.book-btn {
  display: inline-block;
  padding: 8px 26px;
  border: 1px solid #000;
  color: #000;
  text-decoration: none;
  transition: 0.3s;
}

.book-btn:hover {
  background: #000;
  color: #fff;
}

/* Background colors */
.card-bg-1 { background: #fdf0ea; }
.card-bg-2 { background: #c9f2ef; }
.card-bg-3 { background: #ffd4ff; }
.card-bg-4 { background: #f6f4dd; }

/* Responsive */
@media (max-width: 768px) {
  .doctor-card {
    margin-bottom: 20px;
  }
}

</style>

<section class="consult-page-section">
	<div class="container">
	    <?php if($this->session->flashdata('errors')) { ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('errors'); ?>
                </div><?php }  ?>
		<div class="row">
			<div class="col-sm-2">
				<div class="guid">
					<h2>How it works</h2>
				</div>
			</div>
			<div class="col-sm-10">
				<div class="guid">
					<ul class="list-unstyled">
						<li><i class="fas fa-file-alt"></i><span>Online</span>Appointment</li>
						<li><i class="fas fa-graduation-cap"></i><span>Your</span> Counsellor</li>
						<li><i class="fas fa-rupee-sign"></i><span>Consultation</span> Fee</li>
						<li><i class="fas fa-pencil-alt"></i><span>Your</span> Details</li>
						<li><i class="fas fa-reply"></i><span>Make</span>Payment</li>
						<li><i class="fas fa-file-archive"></i><span>Save Your</span>Acknowledgement</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--<section class="doctor-section">-->
<!--	<div class="container">-->
<!--		<div class="row justify-content-center">-->
<!--			<div class="col-sm-8">-->
<!--				<div class="doctor">-->
<!--					<div class="image">-->
<!--						<img src="<?= base_url() ?>assets/images/profile/vidushi-full.jpg" alt="profile" class="img-fluid">-->
<!--					</div>-->
<!--					<div class="text">-->
<!--						<div>-->
<!--							<h5>Ms Vidushi Dixit</h5>-->

						

<!--							<strong>Counsellor</strong>-->
						
<!--						</div>-->
<!--					</div>-->
<!--					<div class="book">-->
<!--						<div class="body">-->
<!--							<h6>Consultation Fee</h6>-->
<!--							<strong><i class="fas fa-rupee-sign"></i> <?= $fees[0]->fee ?></strong>-->
<!--							<a href="#myModal" data-toggle="modal" class="book-btn">Request for Booking</a>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->

<section class="doctor-section">
  <div class="container">
    <div class="row justify-content-center doctor-card-row">

      <?php
      if (!empty($categories)) {
        $bg = ['card-bg-1', 'card-bg-2', 'card-bg-3', 'card-bg-4'];
        $i = 0;
        foreach ($categories as $cat) {
      ?>

        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="doctor-card <?= $bg[$i % 4] ?>">

            <div class="doctor-image">
              <?php if (!empty($cat->image)) { ?>
                <img src="<?= base_url() . $cat->image ?>" alt="<?= $cat->name ?>">
              <?php } ?>
            </div>

            <h5><?= $cat->name ?></h5>

            <a href="<?= base_url('consult-details?category='.$cat->slug) ?>"
   class="book-btn">
   Book
</a>


          </div>
        </div>

      <?php
          $i++;
        }
      }
      ?>

    </div>
  </div>
</section>


<!-- <section class="doctor-section">
  <div class="container">
    <div class="row justify-content-center doctor-card-row">

      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="doctor-card card-bg-1">
          <div class="doctor-image">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>
          <h5>Online Session for<br>International Clients</h5>
          <a href="https://counsellorsupport.com/consult-details" data-toggle="modal" class="book-btn">Book</a>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="doctor-card card-bg-2">
          <div class="doctor-image">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>
          <h5>Individual Session<br>(Online / Offline)</h5>
          <a href="https://counsellorsupport.com/consult-details" data-toggle="modal" class="book-btn">Book</a>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="doctor-card card-bg-3">
          <div class="doctor-image">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>
          <h5>Couple Session</h5>
          <a href="https://counsellorsupport.com/consult-details" data-toggle="modal" class="book-btn">Book</a>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="doctor-card card-bg-4">
          <div class="doctor-image">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>
          <h5>Couple Session for<br>International Clients</h5>
          <a href="https://counsellorsupport.com/consult-details" data-toggle="modal" class="book-btn">Book</a>
        </div>
      </div>

    </div>
  </div>
</section> -->

<!--modal  -->
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header modal-consult">
				<h3>Consult Now</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?= base_url() ?>front/add_appointment" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-6">
							<label class="label-control">Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter Name">
							<input type="hidden" name="amount" value="<?= $fees[0]->fee ?>">
						</div>
						<div class="col-sm-6">
							<label class="label-control">Email</label>
							<input type="text" name="email" class="form-control" placeholder="Enter Email">
							<input type="hidden" name="consult" value="consult" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label class="label-control">Mobile No.</label>
							<input type="tel" name="mobile" class="form-control" placeholder="Enter Mobile No.">
						</div>
						<div class="col-sm-6">
							<label class="label-control">Select Service</label>
							<select class="form-control" name="service" required>
								<option value="">Select Service</option>
                                        <?php if(isset($consult_services) && !empty($consult_services)){
                                          foreach($consult_services as $key){?>
                                            <option value="<?php echo $key->id;?>"><?php echo $key->name;?></option>
                                          <?php }}?>
                                         
                                    </select>
						</div>
					</div>
                    <div class="form-group row">
						<div class="col-sm-6">
							<label> Date</label>
							<select class="form-control" name="date" id="date">
								<option value="">Select Date</option>
                                <?php if(isset($dates) && !empty($dates)){
                                          foreach($dates as $key){?>
                                            <option value="<?php echo $key->date;?>"><?php echo $key->date;?> - <?php echo $key->days;?></option>
                                          <?php }}?>
                                      </select>
						</div>
						<div class="col-sm-6">
							<label>Consultation Time</label>
							<select class="form-control" name="timeslot" id="timing">
								<option value="">Select Time</option>
              
                                      </select>
						</div>
					</div>
					<div class="form-group row">
						
						<div class="col-sm-12">
							<label>Document</label>
							<input type="file" name="document" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Description</label>
							<textarea rows="3" cols="6" name="description" class="form-control" placeholder="Description here"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-vd" type="submit">Submit Now</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<section class="faq-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title">
					<h4>Frequently Asked Questions</h4>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="faq-image">
					<img src="<?= base_url() ?>assets/images/service/1.jpg" alt="image" class="img-fluig">
				</div>
			</div>
			<div class="col-sm-8">
				<div class="accrodion" id="accordion">
					<?php if (isset($faqs) && !empty($faqs)) {
											$i=1;
										 foreach($faqs as $faq) { ?>
					<div class="card">
						<div class="card-header" id="heading<?php echo $i?>">
							<h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $i?>" aria-expanded="true" aria-controls="#collapse<?php echo $i?>">
                                    <?= $faq->question ?>
                                </button>
                            </h5>
						

						</div>

						<div id="collapse<?php echo $i?>" class="collapse" aria-labelledby="heading<?php echo $i?>" data-parent="#accordion">
							<div class="card-body">
								<?= $faq->answer ?>
							</div>
						</div>
					</div>
					<?php }}?>	
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php');?>
<script type="text/javascript">
  $(document).ready(function(){
    let baseurl= "<?= base_url(); ?>";
    $("#date").change(function(){
    	//alert("vxbfbfb");
      var date = $('#date :selected').val();
      $.ajax({
       url: baseurl+"front/fetch_timeslot",
       type: "POST",
       data: {"date":date},
       success: function(result)
       {
         $("#timing").html(result);
       }
     });
    });
    });
</script>
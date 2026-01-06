<?php include('header.php'); ?>
<style>
    .package-section {
  padding: 60px 0;
}

.package-row {
  gap: 20px 0;
}

/* Card */
.package-card {
  height: 100%;
  padding: 30px 22px;
  text-align: center;
  border-radius: 6px;
}

.package-card h5 {
  font-size: 22px;
  height: 60px;
  margin: 16px 0 8px;
  font-weight: 500;
}

.package-session {
    border:1px solid gray;
    border-radius:4px;
    padding:5px 20px;
  font-size: 14px;
  width:fit-content;
  margin:auto;
  font-weight: 600;
}

.package-price {
  color: red;
  font-size:30px;
  font-weight: 700;
  margin-bottom: 15px;
}

/* Image */
.package-img {
    width:95%;
  background: #fff;
  padding: 2px;
  display: inline-block;
}

.package-img img {
 width: 100%;
  height:auto;
}

/* List */
.package-card ul {
  padding-left: 18px;
  text-align: left;
  font-size: 13px;
  margin-bottom: 20px;
}

.package-card ul li {
  margin-bottom: 6px;
}

/* Button */
.package-btn {
  background: #ffd54f;
  border: none;
  padding: 7px 18px;
  font-size: 13px;
  cursor: pointer;
}


.pkg-bg-1 { background: #e6edff; }
.pkg-bg-2 { background: #e7f6c8; }
.pkg-bg-3 { background: #e1e0bf; }
.pkg-bg-4 { background: #fdebe3; }

/* Responsive */
@media (max-width: 768px) {
  .package-card {
    margin-bottom: 20px;
  }
}
.section-heading h2 {
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 10px;
}

.section-heading p {
  max-width: 700px;
  margin: 0 auto;
  font-size: 14px;
  color: #666;
  line-height: 1.6;
}


</style>

<section class="package-section">
  <div class="container">
     <div class="section-heading text-center mb-4">
  <h2>Choose the Right Counselling Package</h2>
  <p>Flexible session plans designed to support your emotional well-being.</p>
</div>


    <div class="row package-row">

      <!-- Card 1 -->
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="package-card pkg-bg-1">
          <div class="package-img">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>

          <h5>Explore Therapy</h5>
          <p class="package-session">1 Session</p>
          <p class="package-price">₹ 1200</p>

          <ul>
            <li>Pour your heart out</li>
            <li>Build rapport with psychologist</li>
            <li>Understand how therapy works</li>
            <li>Validity: 1 Week</li>
          </ul>

          <button class="package-btn" data-toggle="modal" data-target="#myModal">
            I'm ready!
          </button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="package-card pkg-bg-2">
          <div class="package-img">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>

          <h5>Express Yourself</h5>
          <p class="package-session">2 Sessions</p>
          <p class="package-price">₹ 2200</p>

          <ul>
            <li>Discuss emotional concerns</li>
            <li>Work on therapy plan</li>
            <li>Set goals with psychologist</li>
            <li>Validity: 3 Weeks</li>
          </ul>

          <button class="package-btn" data-toggle="modal" data-target="#myModal">
            I'm ready!
          </button>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="package-card pkg-bg-3">
          <div class="package-img">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>

          <h5>Identify & Discuss<br>Emotional Concerns</h5>
          <p class="package-session">5 Sessions</p>
          <p class="package-price">₹ 4750</p>

          <ul>
            <li>Identify negative patterns</li>
            <li>Work as a team</li>
            <li>Set short-term goals</li>
            <li>Validity: 3 Months</li>
          </ul>

          <button class="package-btn" data-toggle="modal" data-target="#myModal">
            I'm ready!
          </button>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="package-card pkg-bg-4">
          <div class="package-img">
            <img src="<?= base_url() ?>assets/images/profile/demo-image.jpeg" alt="">
          </div>

          <h5>Become a Better You</h5>
          <p class="package-session">8 Sessions</p>
          <p class="package-price">₹ 7200</p>

          <ul>
            <li>Self-exploration & analysis</li>
            <li>Build healthier habits</li>
            <li>Bring out the best in you</li>
            <li>Validity: 4 Months</li>
          </ul>

          <button class="package-btn" data-toggle="modal" data-target="#myModal">
            I'm ready!
          </button>
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
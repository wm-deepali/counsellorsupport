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

      <?php
      if (!empty($packages)) {
        $bg = ['pkg-bg-1', 'pkg-bg-2', 'pkg-bg-3', 'pkg-bg-4'];
        $i = 0;

        foreach ($packages as $pkg) {
          $features = $this->Front_model->get_package_features($pkg->id);

          $symbol = ($pkg->price_type == 'USD') ? '$' : '₹';
      ?>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="package-card <?= $bg[$i % 4] ?>">

          <div class="package-img">
            <?php if ($pkg->image) { ?>
              <img src="<?= base_url().$pkg->image ?>" alt="<?= $pkg->name ?>">
            <?php } ?>
          </div>

          <h5><?= $pkg->name ?></h5>

          <p class="package-session"><?= $pkg->sessions ?> Session<?= $pkg->sessions > 1 ? 's' : '' ?></p>

          <p class="package-price"><?= $symbol ?> <?= number_format($pkg->price) ?></p>

          <?php if (!empty($features)) { ?>
            <ul>
              <?php foreach ($features as $f) { ?>
                <li><?= $f->feature ?></li>
              <?php } ?>
            </ul>
          <?php } ?>

          <button class="package-btn"
                  data-toggle="modal"
                  data-target="#myModal"
                  onclick="setPackage('<?= $pkg->id ?>','<?= $pkg->name ?>','<?= $pkg->category_name ?>')">
            I'm ready!
          </button>

        </div>
      </div>

      <?php $i++; } } ?>

    </div>
  </div>
</section>


<!-- MODAL -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header modal-consult">
        <h3>Consult Now</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="<?= base_url() ?>front/add_appointment" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="package_id" id="package_id" required>
          <input type="hidden" name="package_name" id="package_name">
          <input type="hidden" name="category_name" id="category_name">

          <div class="form-group row">
            <div class="col-sm-6">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
              <input type="hidden" name="consult" value="consult">
            </div>

            <div class="col-sm-6">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
          </div>

           <div class="form-group row">
            	<div class="col-sm-6">
							<label class="label-control">Mobile No.</label>
							<input type="tel" name="mobile" class="form-control" placeholder="Enter Mobile No.">
						</div>
            <div class="col-sm-6">
              <label>Package</label>
              <input type="text" id="show_package_name" class="form-control" readonly>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-6">
              <label>Category</label>
              <input type="text" id="show_category_name" class="form-control" readonly>
            </div>
          </div>

          	<!-- <div class="col-sm-6">
							<label class="label-control">Select Service</label>
							<select class="form-control" name="service" required>
								<option value="">Select Service</option>
                                        <?php if(isset($consult_services) && !empty($consult_services)){
                                          foreach($consult_services as $key){?>
                                            <option value="<?php echo $key->id;?>"><?php echo $key->name;?></option>
                                          <?php }}?>
                                         
                                    </select>
						</div> -->

          <div class="form-group row">
            <div class="col-sm-6">
              <label>Date</label>
              <select class="form-control" name="date" id="date" required>
                <option value="">Select Date</option>
                <?php if(isset($dates)) { foreach($dates as $key){ ?>
                <option value="<?= $key->date ?>"><?= $key->date ?> - <?= $key->days ?></option>
                <?php }} ?>
              </select>
            </div>

            <div class="col-sm-6">
              <label>Time</label>
              <select class="form-control" name="timeslot" id="timing" required>
                <option value="">Select Time</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label>Document <span style="color:red">*</span></label>
            <input type="file" name="document" class="form-control" required>
            <small class="text-muted">Upload related document (JPG, PNG, PDF, DOC).</small>
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea rows="3" name="description" class="form-control" placeholder="Describe your concern" required></textarea>
          </div>

          <div class="form-group text-center">
            <button class="btn btn-vd" type="submit">Submit Now</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


<?php include('footer.php'); ?>


<script>
function setPackage(id,name,category){
  document.getElementById('package_id').value = id;
  document.getElementById('package_name').value = name;
  document.getElementById('category_name').value = category;

  document.getElementById('show_package_name').value = name;
  document.getElementById('show_category_name').value = category;
}
</script>

<script>
$(document).ready(function(){
  let baseurl= "<?= base_url(); ?>";
  $("#date").change(function(){
    var date = $('#date').val();
    $.ajax({
       url: baseurl+"front/fetch_timeslot",
       type: "POST",
       data: {date:date},
       success: function(result){
         $("#timing").html(result);
       }
    });
  });
});
</script>

<?php include('header.php');?>
<section class="appointment-page-section">
    <div class="container">
        <?php if($this->session->flashdata('errors')) { ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('errors'); ?>
                </div><?php }  ?>
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="main">
                            <img src="<?= base_url() ?>assets/images/logo-white.png" alt="Logo" class="img-fluid">
                            <div class="address">
                                <p>Sarvoday Enclave, New Delhi - 110017</p>
                                <h2>Write us : <a href="#">counsellor@counsellorsupport.com</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form">
                            <div class="title">
                                <h4>Book An Appointment</h4>
                            </div>
                            <form action="<?= base_url() ?>front/insert_appointment" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter Name">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="exampleInputPassword1">Contact</label>
                                        <input type="tel" name="mobile" class="form-control form-control-sm"placeholder="Contact No.">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter email" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="SelectServices">Services</label>
                                    <select class="form-control" name="service" requierd>
                                        <option value="">Select Service</option >
                                        <?php if(isset($services) && !empty($services)){
                                          foreach($services as $key){?>
                                            <option value="<?php echo $key->id;?>"><?php echo $key->name;?></option>
                                        <?php }}?>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea rows="5" name="description" class="form-control form-control-sm" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Attachment</label>
                                    <input type="file" name="document" class="form-control form-control-sm">
                                </div>
                                <div class="button">
                                    <button type="button" class="submit-btn" data-toggle="modal" data-target="#myModal">Submit</button>
                                </div>
                                <!-- modal -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Choose Timeslot</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form>
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
                                                        <div class="col-sm-12 text-center">
                                                            <button class="btn btn-primary">Book Now</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
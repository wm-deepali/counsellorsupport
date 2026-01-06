<?php include('header.php'); ?>
<section class="serv-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="service">
                    <h3 class="title"><?= $service_detail[0]->name ?> 
                    (<?= $service_detail[0]->hindi_name ?>)</h3>
                    
                    <div class="image">
                        <img src="<?= base_url() ?><?= $service_detail[0]->image_thumb ?>" alt="service" class="img-fluid">
                    </div>
                    <div class="detail">
                        <p><?= $service_detail[0]->content ?> </p>
                    </div>
                </div>
                <div class="feedback">
                    <h4>Give a Short Feedback</h4>
                    <form action="#" method="POST">
                              <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <input type="hidden" name="type" id="type" value="feedback">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea rows="5" name="message"  id="message"class="form-control"></textarea>
                        </div>
                        <button class="send-btn" id="btn-save" type="button">Send</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="related">
                    <h5 class="title">Consult with</h5>
                    <ul class="list-unstyled">
                        <li>
                                <div class="media">
                                    <img src="<?= base_url() ?>assets/images/profile/Vidushi-Dixit.PNG" alt="images" class="img-fluid">
                                    <div class="media-body">
                                        <h6>Ms Vidushi Dixit</h6>
                                        <p>Counsellor</p>
                                        <!--<span>Consultation Fee  <strong> <i class="fas fa-rupee-sign"></i><?= $fees[0]->fee ?></strong></span> -->
                                        <a href="<?= base_url() ?>consult-online" class="book-btn">Request for Booking</a>
                                    </div>
                                </div>
                        </li>
                    </ul>
                </div>
                <div class="related">
                    <h5 class="title">Other Services</h5>
                    <ul class="list-unstyled">
                       
                             <?php if (isset($latest_service) && !empty($latest_service)) {
                 foreach($latest_service as $service) { ?>
                     <li>
                            <a href="<?= base_url() ?>services/<?= $service->slug ?>">
                                <div class="media">
                                    <img src="<?= base_url() ?><?= $service->image_thumb ?>" alt="images" class="img-fluid">
                                    <div class="media-body">
                                        <h6><?= $service->name ?></h6>
                                        <p><?= $service->content ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        <?php }} ?>
                           
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

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
				<form action="<?= base_url() ?>front/insert_appointment" method="POST" enctype="multipart/form-data">
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
                                        <?php if(isset($services) && !empty($services)){
                                          foreach($services as $key){?>
                                            <option value="<?php echo $key->id;?>"><?php echo $key->name;?></option>
                                          <?php }}?>
                                        
                                    </select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-6">
							<label>Consultation Time</label>
							<select class="form-control" name="timeslot" required>
								<option value="">Select Time</option>
                                <?php if(isset($timeslot) && !empty($timeslot)){
                                          foreach($timeslot as $key){?>
                                            <option value="<?php echo $key->id;?>"><?php echo $key->from_;?> - <?php echo $key->to_;?></option>
                                          <?php }}?>
                                          </select>
						</div>
						<div class="col-sm-6">
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
<?php include('footer.php'); ?>
<script type="text/javascript">
                $(document).ready(function(){
                    let baseurl= "<?= base_url(); ?>";
                    $("#btn-save").click(function() 
                    {
                        var name = $('#name').val();
                        var email = $('#email').val();
                        var type = $('#type').val();
                        var message = $('#message').val();
                        if(name!="" && email!="" && message!="")
                        {
                            jQuery.ajax({
                                type: "POST",
                                url: baseurl+"front/add_feedback",
                                dataType: 'html',
                                data: {name: name, email: email,type: type, message:message},
                                success: function(res) {
                                    if(res==1){
                                        
                                       toastr.success("Data Added Successfully");
                                       location.reload();
                                    }
                                    else{
                                        toastr.error('Data not saved');    
                                    }
                                },
                                error:function(){
                                    toastr.error('data not saved');    
                                }
                            });
                        }
                        else{
                            toastr.error("Please fill all fields first");
                        }
                    });
                });
            </script>
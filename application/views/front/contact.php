<?php include('header.php');?>
<section class="contact-page-section">
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
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt"></i> <?= $footer[0]->address?></li>
                            <li><i class="fas fa-phone-alt"></i> <?= $footer[0]->contact?></li>
                            <li><i class="far fa-envelope"></i> <?= $footer[0]->email?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form">
                    <div class="title">
                        <h4>Get In Touch</h4>
                    </div>
                    <form action="<?= base_url() ?>front/insert_contact" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-6">
							<label class="label-control">Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter Name" reqiured>
						</div>
						<div class="col-sm-6">
							<label class="label-control">Email</label>
							<input type="text" name="email" class="form-control" placeholder="Enter Email" reqiured>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label class="label-control">Mobile No.</label>
							<input type="tel" name="mobile" class="form-control" placeholder="Enter Mobile No." reqiured>
						</div>
						<div class="col-sm-6">
							<label class="label-control">Select Service</label>
							<select class="form-control" name="service">
								<option>Select Service</option>
										<?php if(isset($services) && !empty($services)){
					                      foreach($services as $key){?>
					                        <option value="<?php echo $key->id;?>"><?php echo $key->name;?></option>
					                      <?php }}?>
					                      <option value="Others">Others</option>
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
</section>
<section class="map-section">
    <div class="container-fluid">
        <div class="row">
            <div class="map">
                <iframe src="<?= $header[0]->map_link ?>" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>
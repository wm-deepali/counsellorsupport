<?php include('header.php'); ?>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="content-header">
                    <h3 class="content-header-title">Site Settings</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item">Site Settings</li>
                        <li class="breadcrumb-item active">Header Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-main-body">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <form action="<?= base_url()?>admin/update_header" method="POST" enctype="multipart/form-data">
                                <h4 class="form-section-h">Update Header</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Logo</label>
                                                <input type="file"  name="logo" class="text-control">
												<img src="<?= base_url()?><?= $header[0]->logo ?>" class="img-fluid" style="height: 40px;">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Logo Link</label>
                                                <input type="text" name="logo_link" value="<?= $header[0]->logo_link ?>" class="text-control" placeholder="Logo Link">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Contact Us Map Link</label>
                                                <input type="text" name="map_link" value="<?= $header[0]->map_link ?>" class="text-control" placeholder="Map Link">
                                            </div>
                                        </div>
										
										<div class="form-group row">
											<div class="col-sm-6">
                                                <label class="label label-control">Location</label>
                                                <input type="text" value="<?= $header[0]->location ?>" name="location" class="text-control" placeholder=" Enter location">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Contact</label>
                                                <input type="text" name="contact" value="<?= $header[0]->mobile ?>" class="text-control" placeholder="Enter Contact Number">
                                            </div>
                                            
                                        </div>
                                        <button class="btn btn-dark btn-save" type="submit"><i class="fas fa-plus"></i> Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php include('footer.php'); ?>
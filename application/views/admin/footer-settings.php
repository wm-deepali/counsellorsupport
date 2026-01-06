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
                        <li class="breadcrumb-item active">Footer Settings</li>
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
                             <form action="<?= base_url()?>admin/update_footer" method="POST" enctype="multipart/form-data">
                                <h4 class="form-section-h">Update Footer</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Footer Image</label>
                                                <input type="file" name="image" class="text-control">
												<img src="<?= base_url()?><?= $footer[0]->logo ?>" class="img-fluid" style="height: 40px;">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Popup Image</label>
                                                <input type="file" name="popup_image" class="text-control">
												<img src="<?= base_url()?><?= $footer[0]->popup_image ?>" class="img-fluid" style="height: 40px;">
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Logo</label>
                                                <input type="file" name="logo" class="text-control">
												<img src="<?= base_url()?><?= $footer[0]->image ?>" class="img-fluid" style="height: 40px;">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Logo Link</label>
                                                <input type="text" name="logo_link" class="text-control" placeholder="Logo Link" value="<?= $footer[0]->logo_link ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Contact Number</label>
                                                <input type="text" name="contact"class="text-control" value="<?= $footer[0]->contact ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Address </label>
                                                <input type="text" name="address" class="text-control" placeholder="Address" value="<?= $footer[0]->address ?>">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Email </label>
                                                <input type="text" name="email" class="text-control" placeholder="Email" value="<?= $footer[0]->email ?>">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Copyright Text</label>
                                                <input type="text" name="copyright_text" value="<?= $footer[0]->copyright_text ?>" class="text-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            
                                            <div class="col-sm-12">
                                                <label class="label label-control">Marquee Text</label>
                                                <input type="text" name="marque_text" value="<?= $footer[0]->marque_text ?>" class="text-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-dark btn-save" type="submit"><i class="fas fa-plus"></i> Update Settings</button>
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
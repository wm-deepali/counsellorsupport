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
                        <li class="breadcrumb-item active">Social Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-main-body">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                         <form action="<?= base_url()?>admin/update_social_setting" method="POST">
                        <div class="card-block">
                           
                                <h4 class="form-section-h">Update Social Setting</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                    <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-1 <span class="required">*</span></label>
                                        <input type="text" name="fb" class="text-control" placeholder="Enter Facebook Icon" value="<?= $social[0]->fb ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-1 Link <span class="required">*</span></label>
                                        <input type="text" name="fb_link" class="text-control" placeholder="Enter Facebook URL" value="<?= $social[0]->fb_link ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-2 <span class="required">*</span></label>
                                        <input type="text" name="twitter" class="text-control" placeholder="Enter Twitter Icon" value="<?= $social[0]->twitter ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-2 link <span class="required">*</span></label>
                                        <input type="text" name="twitter_link" class="text-control" placeholder="Enter Twitter URL" value="<?= $social[0]->twitter_link ?>">
                                    </div>
                                </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-3  <span class="required">*</span></label>
                                        <input type="text" name="linked" class="text-control" placeholder="Enter LinkedIn Icon" value="<?= $social[0]->linkedin ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-3 Link <span class="required">*</span></label>
                                        <input type="text" name="linked_link" class="text-control" placeholder="Enter LinkedIn URL" value="<?= $social[0]->linkedin_link ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-4 <span class="required">*</span></label>
                                        <input type="text" name="utube" class="text-control" placeholder="Enter Youtube Icon" value="<?= $social[0]->utube ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-4 Link <span class="required">*</span></label>
                                        <input type="text" name="utube_link" class="text-control" placeholder="Enter Youtube URL" value="<?= $social[0]->utube_link ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-5 <span class="required">*</span></label>
                                        <input type="text" name="insta" class="text-control" placeholder="Enter Instagram Icon" value="<?= $social[0]->insta ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-control">Social-4 Link <span class="required">*</span></label>
                                        <input type="text" name="insta_link" class="text-control" placeholder="Enter Instagram URL" value="<?= $social[0]->insta_link ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
    <div class="col-sm-6">
        <label class="label-control">Social-6 (WhatsApp) <span class="required">*</span></label>
        <input type="text" name="whatsapp" class="text-control" placeholder="Enter WhatsApp Icon" value="<?= $social[0]->whatsapp ?>">
    </div>
    <div class="col-sm-6">
        <label class="label-control">Social-6 Link <span class="required">*</span></label>
        <input type="text" name="whatsapp_link" class="text-control" placeholder="Enter WhatsApp URL" value="<?= $social[0]->whatsapp_link ?>">
    </div>
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
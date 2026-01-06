<?php include('header.php'); ?>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="content-header">
                    <h3 class="content-header-title">My Account</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">My Account</li>
                        <li class="breadcrumb-item active">Update Profile</li>
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
                          <?php  if($error = $this->session->flashdata('profile_err')){  ?>
                            <div class="alert alert-danger alert-dismissable">
                                <?= $error ?>
                            </div>
                            <?php        
                        }
                        if($error = $this->session->flashdata('profile_succ')){  ?>
                            <div class="alert alert-success alert-dismissable">
                                <?= $error ?>
                            </div>
                            <?php    
                        } ?>
                        <form method="POST" action="<?= base_url(); ?>admin/update_profile" class="form-body" enctype="multipart/form-data">
                            <h4 class="form-section-h">Update Profile</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <img src="<?= base_url(); ?><?= $profile[0]->logo_thumb; ?>" class="img-fluid img-stud-pro">
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="file" name="image" class="text-control">
                                            <span class="text-danger"><?php echo form_error('image');?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="label label-control">Company Name</label>
                                            <input type="text" name="company_name" value="<?= $profile[0]->company_name ?>" class="text-control" placeholder="Enter Company Name" required>
                                            <span class="text-danger"><?php echo form_error('company_name');?></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="label label-control">Name</label>
                                            <input type="text" name="name" value="<?= $profile[0]->name ?>" class="text-control" placeholder="Enter Name" required>
                                            <span class="text-danger"><?php echo form_error('name');?></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label class="label label-control">Email</label>
                                            <input type="text" name="email" value="<?= $profile[0]->email ?>" class="text-control" placeholder="Enter Email">
                                            <span class="text-danger"><?php echo form_error('email');?></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="label label-control">Mobile No.</label>
                                            <input type="text" name="contact_number" value="<?= $profile[0]->contact_number ?>" class="text-control" placeholder="Enter Mobile No.">
                                            <span class="text-danger"><?php echo form_error('contact_number');?></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-dark">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <?php
                        if($error = $this->session->flashdata('pass_err')){  ?>
                            <div class="alert alert-danger alert-dismissable">
                                <?= $error ?>
                            </div>
                            <?php        
                        }
                        ?>
                        <?php
                        if($error = $this->session->flashdata('pass_succ')){  ?>
                            <div class="alert alert-success alert-dismissable">
                                <?= $error ?>
                            </div>
                            <?php    
                        } ?>
                        <div class="form-body">										<form action="<?= base_url(); ?>admin/change_password" method="POST">				
                            <h4 class="form-section-h">Login Security</h4>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="label-control">Currnent Password <span class="required">*</span></label>
                                    <input type="password" name="old_password" class="text-control" placeholder="Enter Current Password">
                                    <span class="text-danger"><?php echo form_error('old_password');?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="label-control">New Password <span class="required">*</span></label>
                                    <input type="password" name="password"class="text-control" placeholder="Enter New Password">
                                    <span class="text-danger"><?php echo form_error('password');?></span>
                                    <span>Leave Blank if you don't want to change.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="label-control">Re-enter Password <span class="required">*</span></label>
                                    <input type="password" name="con_pass" class="text-control" placeholder="Re-enter Password">
                                    <span class="text-danger"><?php echo form_error('con_pass');?></span>
                                    <input type="hidden" value="<?= $profile[0]->id ?>" name="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn-w100 btn btn-dark">Update Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php include('footer.php'); ?>
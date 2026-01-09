<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap-4.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/responsive.css">

    <script src="<?= base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
    <script src="<?= base_url() ?>assets/admin/ckfinder/ckfinder.js"></script>

</head>

<body>

    <header>

        <div class="top-bar">

            <div class="container">

                <nav class="navbar navbar-expand-lg navbar-top">

                    <a class="navbar-brand" href="<?php echo base_url(); ?>admin"><img
                            src="<?= base_url() ?>assets/images/logo.png" class="img-fluid"></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">

                        <i class="fas fa-ellipsis-v"></i>

                    </button>



                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span><img src="<?= base_url() ?>assets/admin/images/usr.png"
                                            class="img-fliud"></span>Admin

                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/profile">My Profile</a>

                                    <div class="dropdown-divider"></div>

                                    <a href="<?= base_url() ?>admin/logout" class="dropdown-item">Logout</a>

                                </div>

                            </li>

                        </ul>

                    </div>

                </nav>

            </div>

        </div>

        <div class="middle-bar">

            <div class="container">

                <nav class="navbar navbar-expand-lg">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-middle"
                        aria-controls="navbar-middle" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="fas fa-bars"></span>

                    </button>



                    <div class="collapse navbar-collapse" id="navbar-middle">

                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item active">

                                <a class="nav-link" href="<?= base_url() ?>admin/">Dashboard</a>

                            </li>

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    Master

                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/manage_timeslot">Manage
                                        Timeslot</a>

                                    <!-- <a class="dropdown-item"
                                        href="<?= base_url() ?>admin/manage_consultation_fees">Manage Consultation
                                        Fee</a> -->

                                </div>

                            </li>

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    Web Pages

                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/manage_aboutus">Counsellor
                                        Content</a>

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/manage_services">Manage
                                        Services</a>

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/manage_faqs">Manage FAQ's</a>

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/header_setting">Header
                                        Setting</a>

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/footer_setting">Footer
                                        Setting</a>

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/social_setting">Social
                                        Setting</a>

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/home_page_content">Home Page
                                        Content</a>
                                    <a class="dropdown-item" href="<?= base_url() ?>admin/slider_setting">Slider
                                        Settings</a>
                                    <a class="dropdown-item"
                                        href="<?= base_url() ?>admin/cancellation_policy">Cancellation Policy</a>
                                    <a class="dropdown-item" href="<?= base_url() ?>admin/privacy_policy">Privacy
                                        Ploicy</a>
                                    <a class="dropdown-item" href="<?= base_url() ?>admin/disclaimer">Disclaimer</a>
                                    <a class="dropdown-item" href="<?= base_url() ?>admin/popup">Pop Up</a>
                                </div>

                            </li>

                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    Enquiries

                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/manage_contact">Contact
                                        Form</a>

                                    <a class="dropdown-item" href="<?= base_url() ?>admin/manage_appointments">Online
                                        Appointments</a>

                                    <a class="dropdown-item"
                                        href="<?= base_url() ?>admin/manage_feedbacks">Feedback/Suggestions</a>

                                </div>

                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    Consultation
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= base_url('admin/consult_categories') ?>">Manage
                                        Categories</a>
                                    <a class="dropdown-item" href="<?= base_url('admin/consult_packages') ?>">Manage
                                        Packages</a>
                                </div>
                            </li>


                        </ul>



                    </div>

                </nav>

            </div>

        </div>

    </header>

    <?php

    if ($this->session->flashdata('err_msg')) { ?>

        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <?php echo $this->session->flashdata('err_msg'); ?>

        </div><?php }

    if ($this->session->flashdata('succ_msg')) { ?>

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <?php echo $this->session->flashdata('succ_msg'); ?>

        </div><?php } ?>
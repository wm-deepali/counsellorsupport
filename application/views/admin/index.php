<?php include('header.php'); ?>
<section class="content-main-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="stats-box">
                        <i class="fas fa-users align-self-center"></i>
                        <div class="stats-con">
                            <p>Total Appointments</p>
                            <h3><?= $appointment ;?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="stats-box">
                        <i class="fas fa-file align-self-center"></i>
                        <div class="stats-con">
                            <p>Total Enquiries</p>
                            <h3><?= $enquiries ;?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="stats-box">
                        <i class="fas fa-rupee-sign align-self-center"></i>
                        <div class="stats-con">
                            <p>Payment Received</p>
                            <h3><i class="fas fa-rupee-sign" style="font-size: 60%;"></i> <?= $total_payment[0]['amount'] ;?></h3>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <?php include('footer.php');?>
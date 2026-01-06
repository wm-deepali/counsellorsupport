<?php include('header.php');?>
<section class="feedback-page-section">
    <div class="container">
        <?php if($this->session->flashdata('errors')) { ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <?php echo $this->session->flashdata('errors'); ?>
            </div><?php }  ?>
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="title">
                    <h2>Testimonial</h2>
                </div>
                <?php if (isset($feedbacks) && !empty($feedbacks)) {
										 foreach($feedbacks as $feedback) { ?>
                <div class="clientSayWrapper">
                    <div class="sayPersone">
                        <img src="<?= base_url() ?><?= $feedback->image_thumb ?>" class="img-fluid" alt="">
                    </div>
                    <div class="clientSay">
                        <i class="fas fa-quote-left"></i>
                        <div class="simple-article normall">
                            <p><?= $feedback->message ?></p>
                            <p><?= $feedback->name ?></p>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
            <div class="col-sm-5">
                <div class="form">
                    <div class="title">
                        <h4>Give Your Opinion</h4>
                    </div>
                    <form action="<?= base_url() ?>front/insert_feedback" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleSelect">Feedback/suggestion</label>
                            <select class="form-control" name="type" required>
                                <option value="">Select</option>
                                <option value="feedback">Feedback</option>
                                <option value="suggestion">Suggestion</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1" required>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            <input type="hidden" name="feedview" value="yes" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Message</label>
                            <textarea rows="5" name="message" class="form-control" placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Profile</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="button">
                            <button type="submit" class="btn btn-primary">Submit Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>
<?php include('header.php');?>
<section class="appointment-page-section">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-sm-6">
                <div class="main">
                    <img src="images/logo-white.png" alt="Logo" class="img-fluid">
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
                    <form>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Name">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="exampleInputPassword1">Contact</label>
                                <input type="tel" class="form-control form-control-sm"placeholder="Contact No.">
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control form-control-sm" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="SelectServices">Services</label>
                            <select class="form-control form-control-sm">
                                <option>Service</option>
                                <option>Service</option>
                                <option>Service</option>
                                <option>Service</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea rows="5" class="form-control form-control-sm" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Attachment</label>
                            <input type="file" class="form-control form-control-sm">
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
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label>Time</label>
                                                <select class="form-control">
                                                    <option>Consuling Time</option>
                                                    <option>09:00 am-10:00 pm</option>
                                                    <option>09:00 am-10:00 pm</option>
                                                    <option>09:00 am-10:00 pm</option>
                                                    <option>09:00 am-10:00 pm</option>
                                                </select>
                                            </div>
                                            <button class="submit-btn">Send</button>
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
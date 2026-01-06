<?php include('header.php'); ?>

<section class="consult-page-section">

	<div class="container">

		<div class="row">

			<div class="col-sm-2">

				<div class="guid">

					<h2>How it work</h2>

				</div>

			</div>

			<div class="col-sm-10">

				<div class="guid">

					<ul class="list-unstyled">

						<li><i class="fas fa-file-alt"></i><span>Online</span>Appointment</li>

						<li><i class="fas fa-user-md"></i><span>Your</span> Counsellor</li>

						<li><i class="fas fa-rupee-sign"></i><span>Consultation</span> Fee</li>

						<li><i class="fas fa-pencil-alt"></i><span>Your</span> Details</li>

						<li><i class="fas fa-reply"></i><span>Make</span>Payment</li>

						<li><i class="fas fa-file-archive"></i><span>Save Your</span>Acknowledgement</li>

					</ul>

				</div>

			</div>

		</div>

	</div>

</section>

<section class="doctor-section">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-sm-12 col-md-10 col-lg-9">

				<div class="doctor">

					<div class="image">

						<img src="images/profile/Vidushi-Dixit.PNG" alt="profile" class="img-fluid">

					</div>

					<div class="text">

						<div>

							<h5>Ms Vidushi Dixit</h5>



						



							<strong>Counsellor</strong>

							<p>MD, FACR, FACRO, FASTRO, Certified by American Board</p>

						</div>

					</div>

					<div class="book">

						<div class="body">

							<h6>Consultation Fees</h6>

							<strong><i class="fas fa-rupee-sign"></i> 8000</strong>

							<a href="#myModal" data-toggle="modal" class="book-btn">Request for Booking</a>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>

<!--modal  -->

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

				<form>

					<div class="form-group row">

						<div class="col-sm-6">

							<label class="label-control">Name</label>

							<input type="text" class="form-control" placeholder="Enter Name">

						</div>

						<div class="col-sm-6">

							<label class="label-control">Email</label>

							<input type="text" class="form-control" placeholder="Enter Email">

						</div>

					</div>

					<div class="form-group row">

						<div class="col-sm-6">

							<label class="label-control">Mobile No.</label>

							<input type="tel" class="form-control" placeholder="Enter Mobile No.">

						</div>

						<div class="col-sm-6">

							<label class="label-control">Select Service</label>

							<select class="form-control">

								<option>Select Service</option>

							</select>

						</div>

					</div>



					<div class="form-group row">

						<div class="col-sm-6">

							<label>Consultation Time</label>

							<select class="form-control">

								<option>Select Time</option>

								<option>09:00 am - 10:00am</option>

								<option>10:00 am - 11:00am</option>

								<option>11:00 am - 12:00am</option>

							</select>

						</div>

						<div class="col-sm-6">

							<label>Document</label>

							<input type="file" class="form-control">

						</div>

					</div>

					<div class="form-group row">

						<div class="col-sm-12">

							<label class="label-control">Description</label>

							<textarea rows="3" cols="6" class="form-control" placeholder="Description here"></textarea>

						</div>

					</div>

					<div class="form-group row">

						<div class="col-sm-12 text-center">

							<button class="btn btn-vd" type="button" onclick="window.location.href='detail.php'">Submit Now</button>

						</div>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>

<section class="faq-section">

	<div class="container">

		<div class="row">

			<div class="col-sm-12">

				<div class="title">

					<h4>Frequently Asked Questions</h4>

				</div>

			</div>

			<div class="col-sm-12 col-md-4">

				<div class="faq-image">

					<img src="images/service/1.jpg" alt="image" class="img-fluid">

				</div>

			</div>

			<div class="col-sm-12 col-md-8">

				<div class="accrodion" id="accordion">

					<div class="card">

						<div class="card-header" id="headingOne">

							<h5 class="mb-0">

                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                    Will my selected doctor solve my medical issue ?

                                </button>

                            </h5>

						



						</div>



						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

							<div class="card-body">

								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.

							</div>

						</div>

					</div>

					<div class="card">

						<div class="card-header" id="headingTwo">

							<h5 class="mb-0">

                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                Do I get a refund in case of no consultation ?

                            </button>

                        </h5>

						



						</div>

						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

							<div class="card-body">

								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.

							</div>

						</div>

					</div>

					<div class="card">

						<div class="card-header" id="headingThree">

							<h5 class="mb-0">

                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                                Is the consultation secure ?

                            </button>

                        </h5>

						



						</div>

						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">

							<div class="card-body">

								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.

							</div>

						</div>

					</div>

					<div class="card">

						<div class="card-header" id="headingFour">

							<h5 class="mb-0">

                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">

                                Is the consultation secure ?

                            </button>

                        </h5>

						



						</div>

						<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">

							<div class="card-body">

								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.

							</div>

						</div>

					</div>

					<div class="card">

						<div class="card-header" id="headingFive">

							<h5 class="mb-0">

                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">

                            What if I had to upload few reports asked by the doctor ?

                            </button>

                        </h5>

						



						</div>

						<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">

							<div class="card-body">

								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>

<?php include('footer.php');?>
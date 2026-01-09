<?php include('header.php'); ?>
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="content-header">
					<h3 class="content-header-title">Enquiries</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item">Enquiries</li>
						<li class="breadcrumb-item active">Manage Appointments</li>
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
						<div class="card-block">
							<div class="table-responsive">
								<table class="table table-bordered table-fitems">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Name</th>
											<th>Email</th>
											<th>Mobile No.</th>
											<th>Package Details</th>
											<th>Amount</th>
											<th>Timeslot</th>
											<th>Date & Day</th>
											<th>Document</th>
											<th>Description</th>
											<th>Payment Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if (isset($appointments) && !empty($appointments)) {
											$i = 1;
											foreach ($appointments as $appoint) { ?>
												<tr>
													<td><?= $i ?></td>
													<td><?= $appoint->name ?></td>
													<td><?= $appoint->email ?></td>
													<td><?= $appoint->mobile ?></td>
													<td>
														<?= $appoint->package_name ?> (<?= $appoint->category_name ?>)<br>
													</td>
													<td>
														<?php
														$symbol = ($appoint->price_type == 'USD') ? '$' : '₹';
														echo $symbol . number_format($appoint->package_price, 2);
														?>
													</td>
													<td><?= $appoint->from_ ?> to <?= $appoint->to_ ?></td>
													<td><?= $appoint->appoint_date ?> - <?= $appoint->day ?></td>

													<td><a href="<?= base_url() . $appoint->image ?>" target="_blank">View
															Attachment</a></td>
													<td><a href="#" data-target="#view-desc<?= $appoint->id ?>"
															data-toggle="modal">View</a></td>
													<td><a href="#" data-target="#view-payment<?= $appoint->id ?>"
															data-toggle="modal"><?= $appoint->payment_status ?></a></td>

													<td>
														<ul class="action">
															<li>
																<a href="#" title="Update Payment Status"
																	onclick="openPaymentModal(<?= $appoint->id ?>)">
																	<i class="fas fa-credit-card"></i>
																</a>
															</li>
															<li>
																<a href="#" title="View Acknowledgement Slip">
																	<i class="fas fa-file"></i>
																</a>
															</li>
															<li>
																<a href="<?= base_url() ?>admin/delete_appointment/<?= $appoint->id ?>"
																	title="Delete"
																	onclick="return confirm('Delete this appointment?')">
																	<i class="fas fa-trash"></i>
																</a>
															</li>
														</ul>
													</td>
												</tr>
												<div class="modal" id="view-desc<?= $appoint->id ?>">
													<div class="modal-dialog">
														<div class="modal-content">

															<!-- Modal Header -->
															<div class="modal-header">
																<h4 class="modal-title">View Description</h4>
																<button type="button" class="close"
																	data-dismiss="modal">&times;</button>
															</div>

															<!-- Modal body -->
															<div class="modal-body">
																<form>
																	<div class="form-group row">
																		<div class="col-sm-12">
																			<p><?= $appoint->description ?></p>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>

												<?php $i++;
											}
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if (isset($appointments) && !empty($appointments)) {

	foreach ($appointments as $appoint) { ?>
		<div class="modal" id="view-payment<?= $appoint->id ?>">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">View Payment</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form>
							<div class="form-group row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<?php if (empty($appoint->status)) { ?>
											<table class="table table-bordered">
												<tr>
													<th>Payment Status</th>
													<td><?= $appoint->payment_status ?></td>
												</tr>
											</table>
										<?php } else { ?>
											<table class="table table-bordered">
												<tr>
													<th>Date &amp; Time</th>
													<td><?= $appoint->date ?></td>
													<th>Transaction ID</th>
													<td><?= $appoint->transaction_id ?></td>
												</tr>

												<tr>
													<th>Payment Status</th>
													<td><?= $appoint->status ?></td>
												</tr>
											</table>
										<?php } ?>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php $i++;
	}
} ?>

<div class="modal fade" id="paymentActionModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Update Payment Status</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body text-center">

				<input type="text" id="transaction_id" class="form-control mb-3"
					placeholder="Enter Transaction ID (optional)">

				<p><strong>Select payment status:</strong></p>

				<button class="btn btn-success m-2" onclick="submitPaymentStatus('Success' )">
					✔ Mark Paid
				</button>

				<button class="btn btn-danger m-2" onclick="submitPaymentStatus('Failed')">
					✖ Reject
				</button>

			</div>

		</div>
	</div>
</div>

<script>
	let selectedAppointmentId = null;

	function openPaymentModal(appoint_id) {
		selectedAppointmentId = appoint_id;
		$('#transaction_id').val('');
		$('#paymentActionModal').modal('show');
	}

	function submitPaymentStatus(status) {

		if (!selectedAppointmentId) {
			alert('Invalid appointment');
			return;
		}

		let txn_id = $('#transaction_id').val();

		if (!confirm('Are you sure you want to mark this payment as ' + status + '?')) {
			return;
		}

		$.ajax({
			url: "<?= base_url() ?>admin/mark-whatsapp-payment",
			type: "POST",
			data: {
				appoint_id: selectedAppointmentId,
				payment_status: status,
				transaction_id: txn_id
			},
			success: function (res) {
				if (res == 1) {
					alert('Payment updated successfully');
					location.reload();
				} else {
					alert('Something went wrong');
				}
			}
		});
	}
</script>


<?php include('footer.php'); ?>
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
						<li class="breadcrumb-item active">Manage Feedback</li>
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
											<th>Status</th>
											<th>Document</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if (isset($feedbacks) && !empty($feedbacks)) {
											$i=1;
										 foreach($feedbacks as $feedback) { ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $feedback->name ?></td>
											<td><?= $feedback->email ?></td>
											<td><?= $feedback->status ?></td>
											<td><a href="<?= base_url() ?><?= $feedback->image ?>" download>View Attachment</a></td>
											<td><a href="#" data-target="#view-desc<?= $feedback->id ?>" data-toggle="modal">View</a></td>
											<td>
												<ul class="action">
												    <li><a href="<?= base_url(); ?>admin/approved_feedback/<?= $feedback->id ?>" title="Approved"><i class="fas fa-check"></i></a></li>
													<li><a href="<?= base_url() ?>admin/delete_feedback/<?= $feedback->id ?>"><i class="fas fa-trash"></i></a></li>
													
												</ul>
											</td>
										</tr>
										<div class="modal" id="view-desc<?= $feedback->id ?>">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">View Description</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form>
					<div class="form-group row">
						<div class="col-sm-12">
							<p><?= $feedback->message ?> </p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
										<?php $i++; }} ?>
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


<?php include('footer.php'); ?>
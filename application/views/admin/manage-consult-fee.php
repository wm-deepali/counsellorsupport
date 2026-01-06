<?php include('header.php'); ?>
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="content-header">
					<h3 class="content-header-title">Consultation Fees Management</h3>
					<button class="btn btn-primary btn-save" data-target="#add-fees" data-toggle="modal"><i class="fas fa-plus"></i> Add Consultation Fees</button>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item">Consultation Fees</li>
						<li class="breadcrumb-item active">Manage Consultation Fees</li>
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
											<th>Consultation Fee</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if (isset($fees) && !empty($fees)) {
											$i=1;
										 foreach($fees as $fee) { ?>
										<tr>
											<td><?= $i; ?></td>
											<td><?= $fee->fee ?></td>
											<td><?= $fee->status ?></td>
											<td>
												<ul class="action">
													<li><a href="" data-target="#update-fee<?= $fee->id ?>" data-toggle="modal" title="Edit Consultation Fees"><i class="fas fa-pencil-alt"></i></a></li>
													
													<li><a href="<?= base_url() ?>admin/delete_fee/<?= $fee->id ?>" title="Delete"><i class="fas fa-trash"></i></a></li>
												</ul>
											</td>
										</tr>
										<div class="modal" id="update-fee<?= $fee->id ?>">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update Consultation Fees</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
			<form action="<?= base_url()?>admin/update_fee" method="POST">
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control"> Consultation fee</label>
							<input type="number" name="fees" value="<?= $fee->fee ?>" class="text-control" placeholder="Enter fee">
							<input type="hidden" name="id" value="<?= $fee->id ?>">
						</div>
						</div>
					<div class="form-action row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-primary btn-save" type="submit">Update Fees</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
									<?php $i++; }}?>
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
<div class="modal" id="add-fees">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add Consultation Fees</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?= base_url()?>admin/add_fee" method="POST">
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Consultation Fee</label>
							<input type="number" name="fees" class="text-control" placeholder="Enter fee">
						</div>
						</div>
					<div class="form-action row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-primary btn-save" type="submit">Add  Fees</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
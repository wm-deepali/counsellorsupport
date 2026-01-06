<?php include('header.php'); ?>
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="content-header">
					<h3 class="content-header-title">timeslot Management</h3>
				<button class="btn btn-primary btn-save" onclick="window.location.href='<?php echo base_url();?>admin/add_timeslot'"><i class="fas fa-plus"></i> Add timeslot</button>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item">timeslots</li>
						<li class="breadcrumb-item active">Manage timeslots</li>
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
											<th>From</th>
											<th>To</th>
											<th>Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if (isset($timing) && !empty($timing)) {
											$i=1;
										 foreach($timing as $time) { ?>
										<tr>
											<td><?= $i; ?></td>
											<td><?= $time->from_ ?></td>
											<td> <?= $time->to_ ?></td>
											<td><?= $time->date; ?></td>
											<td><?= $time->status ?></td>
											<td>
												<ul class="action">
													<?php if($time->status=="Open"){ ?>
													<li><a href="" data-target="#update-timeslot<?= $time->id ?>" data-toggle="modal" title="Edit timeslot"><i class="fas fa-pencil-alt"></i></a></li>
													<?php } ?>
													
													<li><a href="<?= base_url() ?>admin/delete_timeslot/<?= $time->id ?>" title="Delete"><i class="fas fa-trash"></i></a></li>
												</ul>
											</td>
										</tr>
										<div class="modal" id="update-timeslot<?= $time->id ?>">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update Timeslot</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
			<form action="<?= base_url()?>admin/update_timeslot" method="POST">
					<div class="form-group row">
						<div class="col-sm-6">
							<label class="label-control">Time (From)</label>
							<input type="text" name="from" value="<?= $time->from_ ?>" class="text-control" placeholder="Enter Time (From)">
						</div>
						<div class="col-sm-6">
							<label class="label-control">Time (To)</label>
							<input type="text" name="to" value="<?= $time->to_ ?>" class="text-control" placeholder="Enter Time (To)">
							<input type="hidden" name="id" value="<?= $time->id ?>">
						</div>
					</div>
					<!--<div class="form-group row">-->
					<!--	<div class="col-sm-12">-->
					<!--		<label class="label-control">Applicable for</label>-->
					<!--		<div class="applicable_for">-->
					<!--			<input type="checkbox" name="days[]" value="Monday" <?=(in_array("Monday",explode(',',$time->days)) ? 'checked=""' : '')?>> Monday &nbsp;&nbsp;-->
					<!--			<input type="checkbox" name="days[]" value="Tuesday" <?=(in_array("Tuesday",explode(',',$time->days)) ? 'checked=""' : '')?>> Tuesday &nbsp;&nbsp;-->
					<!--			<input type="checkbox" name="days[]" value="Wednesday" <?=(in_array("Wednesday",explode(',',$time->days)) ? 'checked=""' : '')?>> Wednesday &nbsp;&nbsp;-->
					<!--			<input type="checkbox" name="days[]" value="Thursday" <?=(in_array("Thursday",explode(',',$time->days)) ? 'checked=""' : '')?>> Thursday &nbsp;&nbsp;-->
					<!--			<input type="checkbox" name="days[]" value="Friday" <?=(in_array("Friday",explode(',',$time->days)) ? 'checked=""' : '')?>> Friday &nbsp;&nbsp;-->
					<!--			<input type="checkbox" name="days[]" value="Saturday" <?=(in_array("Saturday",explode(',',$time->days)) ? 'checked=""' : '')?>> Saturday &nbsp;&nbsp;-->
					<!--			<input type="checkbox" name="days[]" value="Sunday" <?=(in_array("Sunday",explode(',',$time->days)) ? 'checked=""' : '')?>> Sunday &nbsp;&nbsp;-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					<div class="form-action row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-primary btn-save" type="submit">Update Timeslot</button>
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

<div class="modal" id="add-timeslot">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add Timeslot</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?= base_url()?>admin/add_timing" method="POST">
					<div class="form-group row">
						<div class="col-sm-6">
							<label class="label-control">Time (From)</label>
							<input type="time" name="from" class="text-control" placeholder="Enter Time (From)">
						</div>
						<div class="col-sm-6">
							<label class="label-control">Time (To)</label>
							<input type="time" name="to" class="text-control" placeholder="Enter Time (To)">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Applicable for</label>
							<div class="applicable_for">
								<input type="checkbox" name="days[]" value="Monday"> Monday &nbsp;&nbsp;
								<input type="checkbox" name="days[]" value="Tuesday"> Tuesday &nbsp;&nbsp;
								<input type="checkbox" name="days[]" value="Wednesday"> Wednesday &nbsp;&nbsp;
								<input type="checkbox" name="days[]" value="Thursday"> Thursday &nbsp;&nbsp;
								<input type="checkbox" name="days[]" value="Friday"> Friday &nbsp;&nbsp;
								<input type="checkbox" name="days[]" value="Saturday"> Saturday &nbsp;&nbsp;
								<input type="checkbox" name="days[]" value="Sunday"> Sunday &nbsp;&nbsp;
							</div>
						</div>
					</div>
					<div class="form-action row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-primary btn-save" type="submit">Add Timeslot</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php include('footer.php'); ?>
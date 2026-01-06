<?php include('header.php'); ?>
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="content-header">
					<h3 class="content-header-title">FAQ's</h3>
					<button type="button" class="btn btn-dark btn-save" data-target="#add-faq" data-toggle="modal"><i class="fas fa-plus"></i> Add FAQ's</button>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item">FAQ's</li>
						<li class="breadcrumb-item active">Manage FAQ's</li>
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
											<th>Question</th>
											<th>Answer</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if (isset($faqs) && !empty($faqs)) {
											$i=1;
										 foreach($faqs as $faq) { ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $faq->question ?></td>
											<td><a href="#" data-target="#view-ans<?= $faq->id ?>" data-toggle="modal">View</a></td>
											<td><?= $faq->status ?></td>
											<td>
												<ul class="action">
													<li><a href="#" data-target="#edit-faq<?= $faq->id ?>" data-toggle="modal" title="Edit FAQ"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="<?= base_url() ?>admin/change_status/<?= $faq->id ?>" title="Status Change"><i class="fas fa-times"></i></a></li>
													<li><a href="<?= base_url() ?>admin/delete_faqs/<?= $faq->id ?>" title="Delete"><i class="fas fa-trash"></i></a></li>
												</ul>
											</td>
										</tr>
										<div class="modal" id="view-ans<?= $faq->id ?>">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">View Answer</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form>
					<div class="form-group row">
						<div class="col-sm-12">
							<p><?= $faq->answer ?></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal" id="edit-faq<?= $faq->id ?>">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update FAQ</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?= base_url() ?>admin/update_faqs" method="POST">
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Question</label>
							<input type="text" name="question" value="<?= $faq->question ?>" class="text-control" placeholder="Enter Question">
							<input type="hidden" name="id" value="<?= $faq->id ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Answer</label>
							<textarea class="text-control" name="answer" rows="2" cols="4" placeholder="Enter Answer here"><?= $faq->answer ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-dark" type="submit">Update FAQ</button>
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
<div class="modal" id="add-faq">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add FAQ</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?= base_url() ?>admin/add_faqs" method="POST">
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Question</label>
							<input type="text" name="question" class="text-control" placeholder="Enter Question">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<label class="label-control">Answer</label>
							<textarea class="text-control" name="answer" rows="2" cols="4" placeholder="Enter Answer here"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-dark" type="submit">Add FAQ</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
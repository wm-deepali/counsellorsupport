<?php include('header.php'); ?>
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Web Pages</h3>
			<button type="button" class="btn btn-primary btn-save" onclick="window.location.href='<?= base_url()?>admin/add_slider'"><i class="fas fa-plus"></i> Add slider</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Web Pages</li>
            <li class="breadcrumb-item active">Slider</li>
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
											<th>Slider Image</th>
											<th>Title</th>
											<th>Hindi Title</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if (isset($sliders) && !empty($sliders)) {
											$i=1;
										 foreach($sliders as $slider) { ?>
										<tr>
											<td><?= $i ?></td>
											<td><img src="<?= base_url() ?><?= $slider->image ?>" class="img-fluid rounded" style="height: 60px;"></td>
											<td><?= $slider->title ?></td>
											<td><?= $slider->hindi_title ?></td>
											<td><?= $slider->status ?></td>>
											<td>
												<ul class="action">
													<li><a href="<?= base_url() ?>admin/edit_slider/<?= $slider->id ?>"><i class="fas fa-pencil-alt"></i></a></li>
													<li><a href="<?= base_url() ?>admin/delete_slider/<?= $slider->id ?>"><i class="fas fa-trash"></i></a></li>
												</ul>
											</td>
										</tr>
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
<?php include('footer.php');?>
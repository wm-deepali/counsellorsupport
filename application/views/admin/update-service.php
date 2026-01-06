<?php include('header.php'); ?>
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Web Pages</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Services</li>
            <li class="breadcrumb-item active">Update Service</li>
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
						<form action="<?= base_url() ?>admin/update_service" method="POST" enctype="multipart/form-data">
						<div class="card-block">
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="label-control">Name </label>
									<input type="text" name="name" value="<?= $service[0]['name'] ?>" class="text-control" placeholder="Enter Service Name">
									<input type="hidden" name="id" value="<?= $service[0]['id'] ?>">
								</div>
								<div class="col-sm-6">
									<label class="label-control"> Hindi Name </label>
									<input type="text" name="hindi_name" value="<?= $service[0]['hindi_name'] ?>" class="text-control" placeholder="Enter Hindi Name">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="label-control">Slug</label>
									<input type="text" name="slug" value="<?= $service[0]['slug'] ?>" class="text-control" placeholder="Enter Slug">
								</div>
								<div class="col-sm-6">
									<label class="label-control">Image</label>
									<input type="file" name="image" class="text-control">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="label-control">Content </label>
									<textarea cols="8" name="content" rows="4" class="text-control" id="editor1" placeholder="Content Here"><?= $service[0]['content'] ?></textarea>
								</div>
							</div>
						</div>
						<div class="col-sm-12 text-center">
				<button class="btn btn-dark" type="submit">Update Service</button>
			</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php');?>
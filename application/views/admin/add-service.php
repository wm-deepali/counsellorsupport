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
            <li class="breadcrumb-item active">Add Service</li>
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
							<form action="<?= base_url()?>admin/insert_service" method="POST" enctype="multipart/form-data">
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="label-control">Name </label>
									<input type="text" name="name" class="text-control" placeholder="Enter Service Name">
								</div>
								<div class="col-sm-6">
									<label class="label-control"> Hindi Name </label>
									<input type="text" name="hindi_name" class="text-control" placeholder="Enter Hindi Name">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6">
									<label class="label-control">Slug</label>
									<input type="text" name="slug" class="text-control" placeholder="Enter Slug">
								</div>
								
								<div class="col-sm-6">
									<label class="label-control">Image</label>
									<input type="file" name="image" class="text-control">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="label-control">Content </label>
									<textarea name="content" cols="8" rows="4" class="text-control" id="editor1" placeholder="Content Here"></textarea>
								</div>
							</div>
							<div class="col-sm-12 text-center">
				<button class="btn btn-dark" type="submit">Add Service</button>
			</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<?php include('footer.php');?>
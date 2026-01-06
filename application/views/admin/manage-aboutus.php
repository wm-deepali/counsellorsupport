<?php include('header.php'); ?>
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Web Pages</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Web Pages</li>
            <li class="breadcrumb-item active">About Us</li>
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
							<form action="<?= base_url()?>admin/about_us" method="POST" enctype="multipart/form-data">
							<h4 class="form-section-h">Post Details</h4>
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="label-control">Title </label>
									<input type="text" name="title" value="<?= $about_us[0]->title ?>" class="text-control" placeholder="Enter Title">
								</div>
								<div class="col-sm-4">
									<label class="label-control">Image 01</label>
									<input type="file" name="image1" class="text-control">
								</div>
								<div class="col-sm-4">
									<label class="label-control">Image 02</label>
									<input type="file" name="image2" class="text-control">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<label class="label-control">Content </label>
									<textarea name="content" cols="8" rows="4" class="text-control" id="editor1" placeholder="Content Here"><?= $about_us[0]->content ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 text-center">
				<button class="btn btn-dark" type="submit">Update About Us</button>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php');?>
<script type="text/javascript">
   CKEDITOR.replace( 'content' );
</script>
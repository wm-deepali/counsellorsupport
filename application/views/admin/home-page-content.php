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

            <li class="breadcrumb-item active">Update Content</li>

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

					<form action="<?= base_url()?>admin/update_home_content" method="POST" enctype="multipart/form-data">

					<div class="card-body">

						<div class="card-block">

							

							<h4 class="form-section-h">Post Details</h4>

							<div class="form-group row">

								<div class="col-sm-4">

									<label class="label-control">Title </label>

									<input type="text" name="title" value="<?= $home[0]->title

									?>" class="text-control" placeholder="Enter Title">

								</div>

									<div class="col-sm-4">

									<label class="label-control">Image 1</label>

									<input type="file" name="image" class="text-control">

								</div>
								<div class="col-sm-4">

									<label class="label-control">Image 2</label>

									<input type="file" name="image1" class="text-control">

								</div>

							</div>

								<div class="form-group row">

								<div class="col-sm-12">

									<label class="label-control">Content </label>

									<textarea name="editor1"><?= $home[0]->content

									?></textarea>

								</div>

							</div>

							<div class="col-sm-12 text-center">

				<button class="btn btn-dark" type="submit">Update Content</button>

			</div>

						

						</div>

					</form>

					</div>

				</div>

			</div>

			

		</div>

	</div>

</section>

<script type="text/javascript">

   CKEDITOR.replace( 'editor1' );

</script>

<?php include('footer.php');?>
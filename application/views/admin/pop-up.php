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

					<form action="<?= base_url()?>admin/update_popup" method="POST" enctype="multipart/form-data">

					<div class="card-body">

						<div class="card-block">

							

							<h4 class="form-section-h">Post Details</h4>

							<div class="form-group row">

									<div class="col-sm-6">

									<label class="label-control">Image </label>

									<input type="file" name="image" class="text-control">

								</div>
								<div class="col-sm-6">

									<label class="label-control">Status </label>

								<select class="text-control" name="status">
										<option value="">Select Status</option>
										<option value="Active"<?php if ($popup[0]->status=="Active") { echo "selected";}?>> Active</option>
										<option value="Deactive"<?php if ($popup[0]->status=="Deactive") { echo "selected";}?>> Deactive</option>
									</select>

								</div>

							</div>

								<div class="form-group row">

								<div class="col-sm-12">

									<label class="label-control">Content </label>

									<textarea class="text-control" id="editor1" rows="4" name="content"><?= $popup[0]->content ?></textarea>

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
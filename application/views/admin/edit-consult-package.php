<?php include('header.php'); ?>
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Consultation</h3>

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Consultation</li>
            <li class="breadcrumb-item active">Edit Package</li>
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

              <form action="<?= base_url() ?>admin/update_consult_package" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $package->id ?>">

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="label-control">Category</label>
                    <select name="category_id" class="text-control">
                      <?php foreach ($categories as $cat) { ?>
                        <option value="<?= $cat->id ?>" <?= $package->category_id == $cat->id ? 'selected' : '' ?>>
                          <?= $cat->name ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-sm-6">
                    <label class="label-control">Package Name</label>
                    <input type="text" name="name" value="<?= $package->name ?>" class="text-control">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="label-control">Sessions</label>
                    <input type="number" name="sessions" value="<?= $package->sessions ?>" class="text-control">
                  </div>

                  <div class="col-sm-6">
                    <label class="label-control">Price Type</label>
                    <select name="price_type" class="form-control" required>
                      <option value="INR" <?= ($package->price_type == 'INR') ? 'selected' : '' ?>>INR</option>
                      <option value="USD" <?= ($package->price_type == 'USD') ? 'selected' : '' ?>>USD</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="label-control">Price</label>
                    <input type="number" name="price" value="<?= $package->price ?>" class="text-control">
                  </div>
                  <div class="col-sm-6">
                    <label class="label-control">Image</label>
                    <input type="file" name="image" class="text-control">
                    <?php if (!empty($package->image)) { ?>
                      <img src="<?= base_url() . $package->image ?>" style="height:60px;" class="mt-2">
                    <?php } ?>
                  </div>

                  <div class="col-sm-6">
                    <label class="label-control">Status</label>
                    <select name="status" class="text-control">
                      <option value="1" <?= $package->status == 1 ? 'selected' : '' ?>>Active</option>
                      <option value="0" <?= $package->status == 0 ? 'selected' : '' ?>>Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="label-control">Features</label>
                  <div id="features">
                    <?php foreach ($features as $f) { ?>
                      <input type="text" name="features[]" value="<?= $f->feature ?>" class="text-control mb-2">
                    <?php } ?>
                  </div>
                  <button type="button" class="btn btn-sm btn-secondary" onclick="addFeature()">+ Add Feature</button>
                </div>

                <div class="col-sm-12 text-center">
                  <button class="btn btn-dark" type="submit">Update Package</button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function addFeature(){
  document.getElementById('features').insertAdjacentHTML(
    'beforeend',
    '<input type="text" name="features[]" class="text-control mb-2" placeholder="Feature">'
  );
}
</script>

<?php include('footer.php'); ?>
<?php include('header.php'); ?>
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Consultation</h3>

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url()?>admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Consultation</li>
            <li class="breadcrumb-item active">Add Package</li>
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

<form action="<?= base_url()?>admin/insert_consult_package"
      method="POST"
      enctype="multipart/form-data">

<div class="form-group row">
  <div class="col-sm-6">
    <label class="label-control">Category</label>
    <select name="category_id" class="text-control" required>
      <option value="">Select Category</option>
      <?php foreach($categories as $cat){ ?>
        <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="col-sm-6">
    <label class="label-control">Package Name</label>
    <input type="text" name="name" class="text-control" required>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-6">
    <label class="label-control">Sessions</label>
    <input type="number" name="sessions" class="text-control">
  </div>

  <div class="col-sm-6">
    <label class="label-control">Price Type</label>
  <select name="price_type" class="form-control" required>
      <option value="INR">INR</option>
      <option value="USD">USD</option>
  </select>
  </div>

 
</div>

<div class="form-group row">
   <div class="col-sm-6">
    <label class="label-control">Price</label>
    <input type="number" name="price" class="text-control">
  </div>
  
  <div class="col-sm-6">
    <label class="label-control">Image</label>
    <input type="file" name="image" class="text-control">
  </div>

  <div class="col-sm-6">
    <label class="label-control">Status</label>
    <select name="status" class="text-control">
      <option value="1">Active</option>
      <option value="0">Inactive</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="label-control">Features</label>
  <div id="features">
    <input type="text" name="features[]" class="text-control mb-2" placeholder="Feature">
  </div>
  <button type="button" class="btn btn-sm btn-secondary" onclick="addFeature()">+ Add Feature</button>
</div>

<div class="col-sm-12 text-center">
  <button class="btn btn-dark" type="submit">Add Package</button>
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

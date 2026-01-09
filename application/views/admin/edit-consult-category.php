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
            <li class="breadcrumb-item active">Edit Category</li>
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

              <form action="<?= base_url()?>admin/update_consult_category"
                    method="POST"
                    enctype="multipart/form-data">

                <!-- ID -->
                <input type="hidden" name="id" value="<?= $category->id ?>">

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="label-control">Category Name</label>
                    <input type="text"
                           name="name"
                           class="text-control"
                           value="<?= $category->name ?>"
                           required>
                  </div>

                  <div class="col-sm-6">
                    <label class="label-control">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="text-control"
                           value="<?= $category->sort_order ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="label-control">Image</label>
                    <input type="file"
                           name="image"
                           class="text-control">

                    <?php if(!empty($category->image)){ ?>
                      <div class="mt-2">
                        <img src="<?= base_url().$category->image ?>"
                             class="img-fluid rounded"
                             style="height:60px;">
                      </div>
                    <?php } ?>
                  </div>

                  <div class="col-sm-6">
                    <label class="label-control">Status</label>
                    <select name="status" class="text-control">
                      <option value="1" <?= $category->status==1?'selected':'' ?>>
                        Active
                      </option>
                      <option value="0" <?= $category->status==0?'selected':'' ?>>
                        Inactive
                      </option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-12 text-center">
                  <button class="btn btn-dark" type="submit">
                    Update Category
                  </button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('footer.php'); ?>

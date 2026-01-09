<?php include('header.php'); ?>
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Consultation</h3>

          <button type="button"
                  class="btn btn-primary btn-save"
                  onclick="window.location.href='<?= base_url()?>admin/add_consult_category'">
            <i class="fas fa-plus"></i> Add Category
          </button>

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url()?>admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Consultation</li>
            <li class="breadcrumb-item active">Categories</li>
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
                      <th>Category Image</th>
                      <th>Category Name</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php if (isset($categories) && !empty($categories)) {
                      $i = 1;
                      foreach ($categories as $cat) { ?>
                      <tr>
                        <td><?= $i ?></td>

                        <td>
                          <?php if(!empty($cat->image)){ ?>
                            <img src="<?= base_url().$cat->image ?>"
                                 class="img-fluid rounded"
                                 style="height:60px;">
                          <?php } else { ?>
                            <span class="text-muted">No Image</span>
                          <?php } ?>
                        </td>

                        <td><?= $cat->name ?></td>
                        <td><?= $cat->slug ?></td>

                        <td>
                          <?= $cat->status == 1 ? 'Active' : 'Inactive' ?>
                        </td>

                        <td>
                          <ul class="action">
                            <li>
                              <a href="<?= base_url()?>admin/edit_consult_category/<?= $cat->id ?>">
                                <i class="fas fa-pencil-alt"></i>
                              </a>
                            </li>
                            <li>
                              <a href="<?= base_url()?>admin/delete_consult_category/<?= $cat->id ?>"
                                 onclick="return confirm('Delete this category?')">
                                <i class="fas fa-trash"></i>
                              </a>
                            </li>
                          </ul>
                        </td>
                      </tr>
                    <?php $i++; } } ?>
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
<?php include('footer.php'); ?>

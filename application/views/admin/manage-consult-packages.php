<?php include('header.php'); ?>
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Consultation</h3>

          <button type="button" class="btn btn-primary btn-save"
            onclick="window.location.href='<?= base_url() ?>admin/add_consult_package'">
            <i class="fas fa-plus"></i> Add Package
          </button>

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Consultation</li>
            <li class="breadcrumb-item active">Packages</li>
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
                      <th>Package Image</th>
                      <th>Package Name</th>
                      <th>Category</th>
                      <th>Sessions</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php if (!empty($packages)) {
                      $i = 1;
                      foreach ($packages as $pkg) { ?>
                        <tr>
                          <td><?= $i ?></td>

                          <td>
                            <?php if (!empty($pkg->image)) { ?>
                              <img src="<?= base_url() . $pkg->image ?>" class="img-fluid rounded" style="height:60px;">
                            <?php } else { ?>
                              <span class="text-muted">No Image</span>
                            <?php } ?>
                          </td>

                          <td><?= $pkg->name ?></td>
                          <td><?= $pkg->category ?></td>
                          <td><?= $pkg->sessions ?></td>
                          <td>
                            <?php if ($pkg->price_type == 'USD') { ?>
                              $ <?= number_format($pkg->price, 2) ?>
                            <?php } else { ?>
                              ₹ <?= number_format($pkg->price, 2) ?>
                            <?php } ?>
                          </td>

                          <td><?= $pkg->status == 1 ? 'Active' : 'Inactive' ?></td>

                          <td>
                            <ul class="action">
                              <li>
                                <a href="<?= base_url() ?>admin/edit_consult_package/<?= $pkg->id ?>">
                                  <i class="fas fa-pencil-alt"></i>
                                </a>
                              </li>
                              <li>
                                <a href="<?= base_url() ?>admin/delete_consult_package/<?= $pkg->id ?>"
                                  onclick="return confirm('Delete this package?')">
                                  <i class="fas fa-trash"></i>
                                </a>
                              </li>
                            </ul>
                          </td>
                        </tr>
                        <?php $i++;
                      }
                    } ?>
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
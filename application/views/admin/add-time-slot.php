<?php include('header.php'); ?>
<style type="text/css">
	.add_op {
    color: #fff;
    background-color: #00b5b8;
    border-color: #00a5a8;
    padding: 10px;
    cursor:pointer;
    margin-top: 28px;
    display: inline-block;
    border-radius: 4px;
}
.block_op {
  margin-bottom:10px;
}
.remove_op {
    color: #fff;
    cursor:pointer;
    background-color: #CF1013;
    border-color: #00a5a8;
    padding: 10px;
    margin-top: 28px;
    display: inline-block;
    border-radius: 4px;
}
</style>
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="content-header">
					<h3 class="content-header-title">Timeslot</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
						<li class="breadcrumb-item">Timeslot</li>
						<li class="breadcrumb-item active">Add Timeslot</li>
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
							<form action="<?= base_url()?>admin/add_timing" method="POST">
							<div class="optionBox_op">
								<div class="block_op">
									<div class="form-group row">
						<div class="col-sm-6">
							<label class="label-control">Time (From)</label>
							<input type="date" name="date" value="" class="text-control" placeholder="Enter Time (From)">
						</div>
					</div>
									<div class="form-group row">
										<div class="col-sm-3">
										<label for="to"> TO</label>
											<input type="time" class="form-control" id="product_op_stock" name="to[]" value="">
										</div>	
										<div class="col-sm-3">
											<label for="from">From</label>
											<input type="time" class="form-control" id="product_op_stock" name="from[]" value="">
										</div> 
										<span class="add_op"><i class="fa fa-plus"></i> Add</span>
									</div>

								</div>
							</div>
							<div class="form-action row">
						<div class="col-sm-12 text-center">
							<button class="btn btn-primary btn-save" type="submit">Add Timeslot</button>
						</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<?php include('footer.php');?>
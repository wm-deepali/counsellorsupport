<?php include('header.php');?>
<style type="text/css">
	.payment-response-section {
  padding: 4em 0; }
  .payment-response-section .payment-success {
    text-align: center; }
    .payment-response-section .payment-success img {
      margin-bottom: 10px;
      height: 80px; }
    .payment-response-section .payment-success p i {
      font-size: 60%; }
    .payment-response-section .payment-success h3 {
      font-family: "Nunito", sans-serif; }
    .payment-response-section .payment-success a {
      background: #578d8d;
      border-radius: 3px;
      padding: 7px 12px;
      color: #fff;
      display: inline-block; }
      .payment-response-section .payment-success a.failure-btn {
        background: red; }
        .payment-response-section .payment-success a.failure-btn:hover {
          background: red;
          color: #fff;
          text-decoration: none; }
      .payment-response-section .payment-success a:hover {
        color: #fff;
        text-decoration: none; }
      .payment-response-section .payment-success a i {
        padding-right: 5px; }
  .payment-response-section table th {
    padding: 4px 10px !important;
    font-size: 13px;
    font-family: "Poppins", sans-serif; }
  .payment-response-section table td {
    padding: 4px 10px !important;
    font-size: 13px;
    font-family: "Poppins", sans-serif; }
</style>
<script type="text/javascript">
function printDiv(payment) {
    var printContents = document.getElementById(payment).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
<section class="payment-response-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-8">
				<div class="payment-success" id="payment">
					<img src="<?= base_url() ?>assets/images/check.png" class="img-fluid">
					<h3>Payment Success</h3>
					<p>Dear <b><?= $payment[0]->name ?></b>, Thank you for your payment. Your transaction ID  <?= $payment[0]->transaction_id ?> for the amount &nbsp;<i class="fas fa-rupee-sign"></i> <?= $payment[0]->amount ?> has been paid successfully. You will received an invoice on your registered email id.</p>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Email</th>
								<th>Mobile No.</th>
								<th>Service</th>
								<th>Time</th>
								<th>Date & Day</th>
								<th>Amount Paid</th>
							</tr>
							<tr>
								<td><?= $payment[0]->email ?></td>
								<td><?= $payment[0]->mobile ?></td>
								<td><?= $payment[0]->service_name ?></td>
								<td><?= $payment[0]->to_ ?> - <?= $payment[0]->from_ ?></td>
								<td><?= $payment[0]->date ?>  <?= $payment[0]->days ?></td>
								<td><i class="fas fa-rupee-sign"></i> <?= $payment[0]->amount ?></td>
							</tr>
						</table>
					</div>
					<a href="<?= base_url() ?>"><i class="fas fa-chevron-circle-right"></i>Back to Home</a>
					<a type="#" class="bg-danger" onclick="printDiv('payment')"><i class="fas fa-file-alt"></i>Print Invoice</a>
		
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php');?>

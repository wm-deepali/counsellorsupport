<?php include('header.php');?>
<style type="text/css">
	.payment-response-section {
  padding: 4em 0; }
.payment-response-section .payment-failed {
    text-align: center; }
    .payment-response-section .payment-failed img {
      margin-bottom: 10px;
      height: 80px; }
    .payment-response-section .payment-failed p i {
      font-size: 60%; }
    .payment-response-section .payment-failed h3 {
      font-family: "Nunito", sans-serif; }
    .payment-response-section .payment-failed a {
      background: #578d8d;
      border-radius: 3px;
      padding: 7px 12px;
      color: #fff;
      display: inline-block; }
      .payment-response-section .payment-failed a.failure-btn {
        background: red; }
        .payment-response-section .payment-failed a.failure-btn:hover {
          background: red;
          color: #fff;
          text-decoration: none; }
      .payment-response-section .payment-failed a:hover {
        color: #fff;
        text-decoration: none; }
      .payment-response-section .payment-failed a i {
        padding-right: 5px; }
</style>
<section class="payment-response-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="payment-failed">
                    <img src="<?= base_url() ?>assets/images/times.png" class="img-fluid">
                    <h3>Payment Failed</h3>
                    <p>Dear <b><?= $payment[0]->name ?></b>, Your payment has been declined.</p>
                    <a href="<?= base_url() ?>"><i class="fas fa-chevron-circle-right"></i>Back to Home</a>
                    <a href="<?= base_url() ?>front/proceed_to_payment" class="bg-danger"><i class="fas fa-redo"></i>Try Again</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>

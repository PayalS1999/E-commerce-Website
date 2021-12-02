<?php

session_start();

if (!isset($_SESSION['status'])) {
    include('../index.php');
    exit();
}

include("../resources/header.php");
$count = count($_POST);
$n='';
$mn='';
$amt='';
if ($count >= 1) {
  $n = "Kalakriti Admin";
  $mn = 8700654001;
  $amt = substr($_POST['amount'],3);
}
?>

<link rel="stylesheet" type="text/css" href="../resources/css/toast.css">
<script type="text/javascript" src="../resources/js/payment/pay.js"></script>

<div class="forms">
    <form method="POST" id="pay_form">
          <h1>Pay</h1>
          <p id="error_message"></p>
          <p id="response_message"></p>

          <div class="input-field">
            <label for="pay_to">Mobile Number*</label>
            <input type="text" name="pay_to" id="pay_to" onfocusout="validate_contact()" <?php echo "value = '$mn'"; ?> required />
            <label for="contact_name">Name* </label>
            <input type="text" name="contact_name" id="contact_name"  <?php echo "value = '$n'"; ?> />
            <label for="amount">Amount*</label>
            <input type="text" name="amount" id="amount" onfocusout="validate_amount()"  <?php echo "value = '$amt'"; ?>  required />
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment"/>
            <input type="submit" value="Pay" class="button" id="pay" onclick="show_msg()"/>
          </div>
      </form>
      <div id="toast" class="toast">
        <h2><b>Please wait while your transaction is being processed!!!</b></h2>
      </div>
</div>
<?php
include("../resources/footer.php");
?>

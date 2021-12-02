<?php

session_start();

if (isset($_SESSION['status']) and $_SESSION['status'] === 'logged_in') {
    header('Location: http://localhost/kalakriti/epayments/accounts/user/');
    exit();
}

include("../resources/header.php");
?>

<script src="../resources/js/auth/validate_contact.js"></script>
<script src="../resources/js/auth/login.js"></script>

<div class="forms">
          <h1>Login</h1>
          <p id="error_message"></p>
          <p id="response_message"></p>

    <form action="/kalakriti/epayments/app/auth/login.php" id="login_form" method="post">

          <div class="input-field">
            <label for="contact">Mobile Number</label>
            <input type="text" name="contact" id="contact"required />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
            <input type="submit" value="Login" class="button" id="login"/>
          </div>
          Don't have an account?
          <a href="/kalakriti/epayments/signup">Sign up</a>
      </form>

</div>
<?php
include("../resources/footer.php");
?>

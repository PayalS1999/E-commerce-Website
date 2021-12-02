<?php

session_start();

if (isset($_SESSION['status']) and $_SESSION['status'] === 'logged_in') {
    header('Location: http://localhost/kalakriti/epayments/accounts/user/');
    exit();
} else {
    include('app/auth/logout.php');
    header('Location: http://localhost/kalakriti/epayments/login/index.php');
    exit();
}

<!DOCTYPE html>
<html>
<head>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="/kalakriti/epayments/resources/js/switch_form_tab.js"></script>
	<link rel="stylesheet" type="text/css" href="/kalakriti/epayments/resources/css/tab_style_form.css">
	<link rel="stylesheet" href="/kalakriti/epayments/resources/css/Header.css">
	<link rel="stylesheet" href="/kalakriti/epayments/resources/css/Footer.css">
	<title>E-payments</title>
</head>
<body>
<nav class='header'>
	<a href="http://localhost/kalakriti/epayments/" class='link'>
		<span class="brand-name">E-Pay</span>
	</a>
	<div class='space'></div>
    <?php if (isset($_SESSION['name'])) { ?>
		<ul class="login nav-menu">
			<li class="nav-item"><a href="http://localhost/kalakriti/epayments/accounts/user/" class = "link"><?php echo $_SESSION['name']; ?></a></li>
			<li class="nav-item"><a href="http://localhost/kalakriti/epayments/logout/" class = "link">Logout</a></li>
		</ul>
	<?php } ?>
</nav>

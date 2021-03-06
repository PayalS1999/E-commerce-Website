<?php

    session_start();

    if (!isset($_SESSION['status'])) {
        include('../../index.php');
        exit();
    }
    
	include("../connection/connect.php");
	$current_user = $_SESSION['user_id'];
	$contact = $_POST['pay_to'];
	$name = $_POST['contact_name'];
	$amount = $_POST['amount'];
	$comment = $_POST['comment'];

	$sql = "SELECT user_id FROM user_details WHERE contact=$contact";
	$result = $connection->query($sql); 
	$row = $result->fetch_assoc();
	$receiver_id = $row['user_id'];

	$sql = "SELECT wallet_balance FROM user_wallet WHERE user_id=$current_user";
	$result = $connection->query($sql); 
	$row = $result->fetch_assoc();
	$sender_balance = $row['wallet_balance'];
	$updated_sender_balance = $sender_balance-$amount;
	if($updated_sender_balance<0){
	    include("../connection/disconnect.php");
		header("Location: http://localhost/kalakriti/epayments/error/");
		exit();
	}

	$sql = "UPDATE user_wallet SET wallet_balance=$updated_sender_balance WHERE user_id=$current_user";
	$result = $connection->query($sql);
	if(!$result){
	    include("../connection/disconnect.php");
		header("Location: http://localhost/kalakriti/epayments/error/");
		exit();
	}else{
		$sql = "SELECT wallet_balance FROM user_wallet WHERE user_id=$receiver_id";
		$result = $connection->query($sql); 
		$row = $result->fetch_assoc();
		$receiver_balance = $row['wallet_balance'];
		$updated_receiver_balance = $receiver_balance+$amount;
		$sql = "UPDATE user_wallet SET wallet_balance=$updated_receiver_balance WHERE user_id=$receiver_id";
		$result = $connection->query($sql);
		if(!$result){
		    include("../connection/disconnect.php");
			header("Location: http://localhost/kalakriti/epayments/error/");
			exit();
		}else{
			$sql = "SELECT first_name, middle_name, last_name FROM user_details WHERE user_id=$current_user";
			$result = $connection->query($sql);
			$row = $result->fetch_assoc();
			$firstname = $row['first_name'];
			$middlename = $row['middle_name'];
			$lastname = $row['last_name'];
			$sender_name = $firstname." ";
			if($middlename!=Null) $sender_name.=$middlename." ";
			if($lastname!=Null) $sender_name.=$lastname;

			$sql = "INSERT INTO transactions (sender_id, receiver_id, sender_name, 	receiver_name, amount, comment) VALUES ($current_user, $receiver_id, '$sender_name', '$name', $amount, '$comment')";
			$result = $connection->query($sql);
			if(!$result){
			    include("../connection/disconnect.php");
				header("Location: http://localhost/kalakriti/epayments/error/");
				exit();
			}else{
			    include("../connection/disconnect.php");
				header("Location: http://localhost/kalakriti/epayments/accounts/user/");
				exit();
			}
		}
	}
	include("../connection/disconnect.php");
?>

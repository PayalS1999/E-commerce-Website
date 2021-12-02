
<?php 
$conn = mysqli_connect("localhost","root","") or die("Couldn't connect to SQL server");
mysqli_select_db($conn, "Kalakriti") or die("Couldn'ttt select DB");
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$uemail_db = $get_user_email['email'];

			$umob_db = $get_user_email['mobile'];
			$uadd_db = $get_user_email['address'];
}


if (isset($_REQUEST['cid'])) {
		$cid = mysqli_real_escape_string($conn, $_REQUEST['cid']);
		if(mysqli_query($conn,"DELETE FROM cart WHERE pid='$cid' AND uid='$user'")){
		header('location: mycart.php?uid='.$user.'');
	}else{
		header('location: index.php');
	}
}
if (isset($_REQUEST['aid'])) {
		$aid = mysqli_real_escape_string($conn, $_REQUEST['aid']);
		$result = mysqli_query($conn,"SELECT * FROM cart WHERE pid='$aid'");
		$get_p = mysqli_fetch_assoc($result);
		$num = $get_p['quantity'];
		$num += 1;

		if(mysqli_query($conn,"UPDATE cart SET quantity='$num' WHERE pid='$aid' AND uid='$user'")){
		header('location: mycart.php?uid='.$user.'');
	}else{
		header('location: index.php');
	}
}
if (isset($_REQUEST['sid'])) {
		$sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
		$result = mysqli_query($conn, "SELECT * FROM cart WHERE pid='$sid'");
		$get_p = mysqli_fetch_assoc($result);
		$num = $get_p['quantity'];
		$num -= 1;
		if ($num <= 0){
			$num = 1;
		}
		if(mysqli_query($conn, "UPDATE cart SET quantity='$num' WHERE pid='$sid' AND uid='$user'")){
		header('location: mycart.php?uid='.$user.'');
	}else{
		header('location: index.php');
	}
}


?>
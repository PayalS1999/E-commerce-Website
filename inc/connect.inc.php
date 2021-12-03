<?php 
	$conn = mysqli_connect("localhost","root","") or die("Couldn't connect to SQL server");
	mysqli_select_db($conn, "Kalakriti") or die("Couldn'ttt select DB");
	return $conn;
?>
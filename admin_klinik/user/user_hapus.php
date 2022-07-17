<?php
	include '../koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM user WHERE id = '{$id}'";
	$result = mysqli_query($conn, $sql);
	header('location: user.php');
?>
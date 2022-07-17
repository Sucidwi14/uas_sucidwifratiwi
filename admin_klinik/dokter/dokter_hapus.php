<?php
	include '../koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM dokter WHERE id_dokter = '{$id}'";
	$result = mysqli_query($conn, $sql);
	header('location: dokter.php');
?>
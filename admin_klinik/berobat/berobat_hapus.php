<?php
	include '../koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM berobat WHERE id_berobat = '{$id}'";
	$result = mysqli_query($conn, $sql);
	header('location: berobat.php');
?>
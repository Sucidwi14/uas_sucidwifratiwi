<?php
	include '../koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM pasien WHERE id_pasien = '{$id}'";
	$result = mysqli_query($conn, $sql);
	header('location: pasien.php');
?>
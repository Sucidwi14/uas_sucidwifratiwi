<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit']))
{
	$pasien		= $_POST['nama_pasien'];
	$dokter		= $_POST['nama_dokter'];
	$tanggal	= $_POST['tgl_berobat'];
	$keluhan	= $_POST['keluhan_pasien'];
	$diagnosa	= $_POST['hasil_diagnosa'];
	$laksana	= $_POST['penatalaksanaan'];
	$sql		= 'INSERT INTO berobat (nama_pasien, nama_dokter, tgl_berobat, keluhan_pasien, hasil_diagnosa, penatalaksanaan)';
	$sql		.= "VALUE ('{$pasien}', '{$dokter}', '{$tanggal}','{$keluhan}', '{$diagnosa}', '{$laksana}')";
	$result 	= mysqli_query($conn, $sql);
	header('location: berobat.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
	<title>Tambah Pasien</title>
	<style>
	.deni {
		background-color: 	#8FBC8F;
		border-radius: 5px;
		padding: 10px 23px;
		margin-top: 20px;
	}
	form div > label {
			display: inline-block;
			width: 100px;
			height: 30px;
	}
	form div > label {
			display: inline-block;
			width: 100px;
			height: 50px;
	}
	form input[type="text"], form textarea {
			border: 1px solid;
	}
	
	.main{
		height: 100vh;
	}
	
	.tambah-box{
		width: 900px;
		height: 700px;
		box-sizing: border-box;
		border-radius: 10px;
		margin-top: 50px;
	}
	</style>
</head>
<body>
	<div class="main d-flex flex-column justify-content-center align-items-center">
		<div class="tambah-box p-5 shadow">
		<header class="deni">
		<h2 align="center" class="text-white">Tambah Data Berobat</h2>
		</header>
		<hr>
			<div class="main">
				<form method="post" action="berobat_tambah.php" enctype="multipart/form-data">
					<div class="input mb-3">
						<label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
						<input type="text" class="form-control" name="nama_pasien" required/>
					</div>
					<div class="input mb-3">
						<label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
						<input type="text" class="form-control" name="nama_dokter" required/>
					</div>
					<div class="input mb-3">
						<label for="tgl_berobat" class="col-sm-2 col-form-label">Tanggal</label>
						<input type="date" class="form-control" name="tgl_berobat" required/>
					</div>
					<div class="input mb-3">
						<label for="keluhan_pasien" class="col-sm-2 col-form-label">Keluhan</label>
						<input type="text" class="form-control" name="keluhan_pasien" required/>
					</div>
					<div class="input mb-3">
						<label for="hasil_diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
						<input type="text" class="form-control" name="hasil_diagnosa" required/>
					</div>
					<legend class="col-form-label col-sm-2 pt-0 mt-2">Penatalaksanaan</legend>
					<select class="form-select form-select-lg-col-2 mb-3" name="penatalaksanaan" aria-label=".form-select-lg example" required/>
						<option selected>Pilih</option>
						<option value="Rawat Jalan">Rawat Jalan</option>
						<option value="Rawat Inap">Rawat Inap</option>
						<option value="Rujuk">Rujuk</option>
						<option value="Isolasi">Isolasi</option>
						
					</select>
					<div class="submit">
						<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan" />
						<a class="btn btn-warning mt-2" href="berobat.php" role="button">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit']))
{
	$nama = $_POST['nama_pasien'];
	$kelamin = $_POST['jenis_kelamin'];
	$umur = $_POST['umur'];
	$sql = 'INSERT INTO pasien (nama_pasien, jenis_kelamin, umur)';
	$sql .= "VALUE ('{$nama}','{$kelamin}', '{$umur}')";
	$result = mysqli_query($conn, $sql);
	header('location: pasien.php');
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
		background-color: 	#FF4500;
		border-radius: 5px;
		padding: 10px 23px;
		margin-bottom: 20px;
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
		height: 600px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<body>
	<div class="main d-flex flex-column justify-content-center align-items-center">
		<div class="tambah-box p-5 shadow">
		<header class="deni">
		<h2 align="center" class="text-white">Tambah Pasien</h2>
		</header>
		<hr>
			<div class="main">
				<form method="post" action="pasien_tambah.php" enctype="multipart/form-data">
					<div class="input mb-3">
						<label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
						<input type="text" class="form-control" name="nama_pasien" required/>
					</div>
					<div class="input mb-3">
						<label for="umur" class="col-sm-2 col-form-label">Umur</label>
						<input type="number" class="form-control" name="umur" required/>
					</div>
					<legend class="col-form-label col-sm-2 pt-0 mt-2">Jenis Kelamin</legend>
					<select class="form-select form-select-lg-col-2 mb-3" name="jenis_kelamin" aria-label=".form-select-lg example">
						<option selected>Pilih Gender</option>
						<option value="L" required/>Laki-laki</option>
						<option value="P" required/>Perempuan</option>
					</select>
					<div class="submit">
						<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan" />
						<a class="btn btn-warning mt-2" href="pasien.php" role="button">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
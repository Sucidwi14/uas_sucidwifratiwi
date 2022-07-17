<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit']))
{
	$id			= $_POST['id'];
	$pasien		= $_POST['nama_pasien'];
	$dokter		= $_POST['nama_dokter'];
	$tanggal	= $_POST['tgl_berobat'];
	$keluhan	= $_POST['keluhan_pasien'];
	$diagnosa	= $_POST['hasil_diagnosa'];
	$laksana	= $_POST['penatalaksanaan'];


    $sql = 'UPDATE berobat2 SET ';
    $sql .= "nama_pasien  = '{$pasien}', nama_dokter  = '{$dokter}',  tgl_berobat  = '{$tanggal}', keluhan_pasien = '{$keluhan}', hasil_diagnosa = '{$diagnosa}', penatalaksanaan = '{$laksana}' " ;
    $sql .= "WHERE id_berobat = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: berobat.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM berobat2 WHERE id_berobat = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result);

    function is_select($var, $val) {
        if ($var == $val) return 'selected="selected"';
        return false;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
    <title>Ubah Barang</title>
	<style>
		.didi {
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
	
	.ubah-box{
		width: 900px;
		height: 600px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<body>
<div class="main d-flex flex-column justify-content-center align-items-center">
	<div class="ubah-box p-5 shadow">
		<header class="didi text-white">
		<h2 align="center">Edit Data Berobat</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="berobat_ubah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Nama Pasien</label>
					<input type="text" class="form-control" name="nama_pasien" value="<?php echo $data['nama_pasien'];?>"/>
				</div>
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Nama Dokter</label>
					<input type="text" class="form-control" name="nama_dokter" value="<?php echo $data['nama_dokter'];?>"/>
				</div>
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Tanggal</label>
					<input type="date" class="form-control" name="tgl_berobat" value="<?php echo $data['tgl_berobat'];?>"/>
				</div>
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Keluhan</label>
					<input type="text" class="form-control" name="keluhan_pasien" value="<?php echo $data['keluhan_pasien'];?>"/>
				</div>
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Diagnosa</label>
					<input type="text" class="form-control" name="hasil_diagnosa" value="<?php echo $data['hasil_diagnosa'];?>"/>
				</div>
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Penatalaksanaan</label>
					<select class="form-select form-select-lg-col-2 mb-3" name="penatalaksanaan" aria-label=".form-select-lg example">
						<option <?php echo is_select ('Rawat Jalan', $data['penatalaksanaan']);?> value="Rawat Jalan">Rawat Jalan</option>
						<option <?php echo is_select ('Rawat Inap', $data['penatalaksanaan']);?> value="Rawat Inap">Rawat Inap</option>
						<option <?php echo is_select ('Rujuk', $data['penatalaksanaan']);?> value="Rujuk">Rujuk</option>
						<option <?php echo is_select ('Isolasi', $data['penatalaksanaan']);?> value="Isolasi">Isolasi</option>
					</select>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_berobat'];?>" />
					<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan" />
					<a class="btn btn-warning mt-2" href="berobat.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>
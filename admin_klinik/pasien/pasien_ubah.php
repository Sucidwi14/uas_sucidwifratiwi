<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
	$nama = $_POST['nama_pasien'];
	$kelamin = $_POST['jenis_kelamin'];
	$umur = $_POST['umur'];	


    $sql = 'UPDATE pasien SET ';
    $sql .= "nama_pasien = '{$nama}', jenis_kelamin  = '{$kelamin}', umur = '{$umur}' " ;
    $sql .= "WHERE id_pasien = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: pasien.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM pasien WHERE id_pasien = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result); 
    function is_select($var, $val) 
    {
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
		<header class="deni">
		<h2 align="center" class="hero text-white">Edit Data Pasien</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="pasien_ubah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Nama Pasien</label>
					<input type="text" class="form-control" name="nama_pasien" value="<?php echo $data['nama_pasien'];?>"/>
				</div>
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Umur</label>
					<input type="number" class="form-control" name="umur" value="<?php echo $data['umur'];?>"/>
				</div>
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<select class="form-select form-select-lg-col-2 mb-3" name="jenis_kelamin" aria-label=".form-select-lg example">
						<option <?php echo is_select ('L', $data['jenis_kelamin']);?> value="L">Laki-Laki</option>
						<option <?php echo is_select ('P', $data['jenis_kelamin']);?> value="P">Perempuan</option>
					</select>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_pasien'];?>" />
					<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan" />
					<a class="btn btn-warning mt-2" href="pasien.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>
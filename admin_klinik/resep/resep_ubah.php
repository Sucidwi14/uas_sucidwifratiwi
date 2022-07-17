<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit']))
{
    $id 	= $_POST['id'];
	$nama 	= $_POST['nama_obat'];

    $sql = 'UPDATE resep_obat SET ';
    $sql .= "nama_obat = '{$nama}'" ;
    $sql .= "WHERE id_obat = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: resep.php');
}
    $id= $_GET['id'];
    $sql = "SELECT nama_obat, id_resep FROM obat INNER JOIN resep_obat ON obat.id_obat = resep_obat.id_obat WHERE id_resep = '{$id}'";
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
		.deni {
		background-color: 	#0a516b;
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
		height: 400px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<body>
<div class="main d-flex flex-column justify-content-center align-items-center">
	<div class="ubah-box p-5 shadow">
		<header class="deni text-white">
		<h2 align="center">Edit Data Obat</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="resep_ubah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label class="col-sm-2 col-form-label">Nama Obat</label>
					<input type="text" class="form-control" name="nama_obat" value="<?php echo $data['nama_obat'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_resep'];?>" />
					<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan" />
					<a class="btn btn-warning mt-2" href="resep.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>
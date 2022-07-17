<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama_lengkap'];	


    $sql = 'UPDATE user SET ';
    $sql .= "username = '{$username}', password  = '{$password}', nama_lengkap = '{$nama}' " ;
    $sql .= "WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: user.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = '{$id}'";
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
		.hero {
		background-color: 	#DEB887;
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
		height: 550px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<body>
<div class="main d-flex flex-column justify-content-center align-items-center">
	<div class="ubah-box p-5 shadow">
		<header class="hero">
		<h2 align="center" class="hero text-white">Edit Data User</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="user_ubah.php" enctype="multipart/form-data">
				<div class="input">
					<label class="col-sm-2 col-form-label">Username</label>
					<input type="username" class="form-control" name="username" value="<?php echo $data['username'];?>"/>
				</div>
				<div class="input">
					<label class="col-sm-2 col-form-label">Password</label>
					<input type="password" class="form-control" name="password" value="<?php echo $data['password'];?>"/>
				</div>
                <div class="input">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
					<input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id'];?>" />
					<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan" />
					<a class="btn btn-warning mt-2" href="user.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>
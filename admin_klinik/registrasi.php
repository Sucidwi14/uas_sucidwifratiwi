<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <title>Registrasi</title>
<style>
.main{
	height: 100vh;
}

.tambah-box{
	width: 500px;
	height: 500px;
	box-sizing: border-box;
	border-radius: 10px
}

</style>
</head>
<body>
	<div class="container">
		<div class="main d-flex flex-column justify-content-center align-items-center">
			<div class="tambah-box p-5 shadow mb-3">
				<form name="registrasi" action="" method="post">
					<div>
						<h2 align="center">Registrasi</h2>
					</div>
					<hr>
					<div>
						<label for="username" class="col-sm-2 col-form-label">Username</label>
						<input type="text" class="form-control" name="username" required/>
					</div>
					<div>
						<label for="password" class="col-sm-2 col-form-label">Password</label>
						<input type="password" class="form-control" name="password" required/>
					</div>
					<div>
						<label for="nama_lengkap" class="col-sm-2 col-form-label">Nama</label>
						<input type="text" class="form-control" name="nama_lengkap">
					</div>
					<div>
						<button class="btn btn-success form-control mt-3" type="submit" name="submit" value="registration"/>Create</button>
					</div>
					<br>
					<p class="login-register-text">Sudah punya akun? <a href="login.php">Login</a></p>
				</form>
			</div>
			<div class="mt-6" style="width: 500px">
			<?php
				require('koneksi.php');
			// If form submitted, insert values into the database.
			
			if (isset($_REQUEST['username'])){
				$username 	= stripslashes($_REQUEST['username']); // removes backslashes
				$username 	= mysqli_real_escape_string($conn,$username); //escapes special characters in a string
				$password 	= stripslashes($_REQUEST['password']);
				$password 	= mysqli_real_escape_string($conn,$password);
				$nama		= $_POST['nama_lengkap'];
				
				$query = "INSERT into `user` (username, password, nama_lengkap) VALUES ('$username', '".md5($password)."', '$nama')";
				$result = mysqli_query($conn,$query);
				if($result){
					echo "
						<div class='alert alert-success' align='center'>
							Registrasi Berhasil!
						</div>";
					
				}
			}else{
		?>
			</div>
			<?php } ?>
		</div>	
	</div>
</body>
</html>

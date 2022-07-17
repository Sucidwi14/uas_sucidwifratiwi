<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <title>Login</title>
<style>
.main{
	height: 100vh;
}

.login-box{
	width: 500px;
	height: 400px;
	box-sizing: border-box;
	border-radius: 10px
}

</style>
</head>
<body>

    <div class="container">
		<div class="main d-flex flex-column justify-content-center align-items-center">
			<div class="login-box p-5 shadow mb-3">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<div>
						<h2 align="center">Login User</h2>
					</div>
					<hr>
					<div>
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username">
					</div>
					<div>
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password">
					</div>
					<div>
						<button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
					</div>
					<br>
					<p class="login-register-text">Anda belum punya akun? <a href="registrasi.php">Register</a></p>
				</form>
			</div>
			<div class="mt-6" style="width: 500px">
					<?php
					require('koneksi.php');
					session_start();
					// If form submitted, insert values into the database.
					if (isset($_POST['username'])){
					
					$username = stripslashes($_REQUEST['username']); // removes backslashes
					$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
					$password = stripslashes($_REQUEST['password']);
					$password = mysqli_real_escape_string($conn,$password);
					
				//Checking is user existing in the database or not
					$query = "SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
					$result = mysqli_query($conn,$query) or die(mysql_error());
					$rows = mysqli_num_rows($result);
					if($rows==1){
						$_SESSION['username'] = $username;
						header("Location: index.php"); // Redirect user to index.php
						}else{
							echo "
								<div class='alert alert-warning' align='center'>
									Username atau password salah!
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
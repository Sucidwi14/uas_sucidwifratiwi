<?php
	require "koneksi.php";
	include "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="fontawesome/fontawesome/css/all.css" />
    <title>Home</title>
	
	<style>
		.navbar{
			background-color: #008080;
		}
		.hero {
			background-color: #E0FFFF;
			padding: 50px 23px;
			margin-bottom: 20px;
		}
		.super {
			background-color: #E6E6FA;
			padding: 50px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container shadow">
        <header>
			<h1 align="center" class="mb-3">Sistem Informasi Klinik</h1>
        </header>
		<nav class="navbar navbar-expand-lg navbar-dark">
			<div class="container">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item me-4">
							<a class="nav-link text-white"  href="index.php"><i class="fa-solid fa-house-chimney"></i> Home</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="data.php"><i class="fa-solid fa-file-medical"></i> Data</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="#"><i class="fa-solid fa-envelope"></i> e-mail</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="#"><i class="fa-solid fa-bell"></i> Notifikasi</a>
						</li>
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
						</li>
						
					</ul>
				</div>
			 </div>
		</nav>
	<div class="container mt-4">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
				<i class="fa-solid fa-house-chimney fa-2x"></i>
				Dashboard
			</li>
		  </ol>
		</nav>
		<div>
			<h2>Selamat Datang <?php echo $_SESSION['username'];?></h2>
			<div class="container mt-4">
				<div class="row">
					<p>Website ini berisi data - data klinik yang dibuat untuk memenuhi <b>Ujian Akhir Semester Sistem Basis Data</b>.</p>
					<div class="hero">
					<h4>Pelayanan Rawat Inap</h4>
					<hr class="divider" />
						<article class="entry">
						<img src="img/klinik4.png" alt="klinik" width="189px" style="float:left;" class="me-5">
							<p style="margin-left: 3px;">Kami melayani pasien rawat inap menggunakan BPJS maupun asuransi swasta dengan proses yang mudah.</p>
						</article>
					</div>
					<div class="super">
					<h4>Pelayanan Rawat Jalan</h4>
					<hr class="divider" />
						<article class="entry ">
							<img src="img/klinik1.png" alt="klinik" width="189px" style="float:left;" class="me-5">
							<p style="text-align:justify;">Kami melayani pasien rawat jalan menggunakan BPJS maupun asuransi swasta dengan proses yang mudah.</p>
						</article>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<?php require "footer.php";?>
</div>
</body>
</html>
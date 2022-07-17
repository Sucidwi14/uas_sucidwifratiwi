<?php
	require "koneksi.php";
	include "session.php";
	$querypasien = mysqli_query($conn, "SELECT * FROM pasien");
	$jumlahpasien = mysqli_num_rows($querypasien);
	
	$queryobat = mysqli_query($conn, "SELECT * FROM obat");
	$jumlahobat = mysqli_num_rows($queryobat);
	
	$querydokter = mysqli_query($conn, "SELECT * FROM dokter");
	$jumlahdokter = mysqli_num_rows($querydokter);
	
	$queryberobat = mysqli_query($conn, "SELECT * FROM berobat");
	$jumlahberobat = mysqli_num_rows($queryberobat);
	
	$queryresep = mysqli_query($conn, "SELECT * FROM resep_obat");
	$jumlahresep = mysqli_num_rows($queryresep);
	
	$queryuser = mysqli_query($conn, "SELECT * FROM user");
	$jumlahuser = mysqli_num_rows($queryuser); 

	// IMPLEMETASI FUNCTION (untuk menampilkan total pasien)
	$data_pasien = mysqli_query($conn, "SELECT fn_totalUsers() as total");
	$jumlah_pasien = mysqli_fetch_row($data_pasien);
	// END IMPLEMENTASI FUNCTION

	// IMPLEMENTASI SUBQUERY (menampilkan total posien yang belum berobat)
	$totalPasienBelumBerobat = mysqli_query($conn, "SELECT count(id_pasien) as total FROM pasien WHERE id_pasien NOT IN(SELECT DISTINCT id_pasien FROM berobat)");
	$totalPasienBelumBerobat = mysqli_fetch_row($totalPasienBelumBerobat);
	// END IMPLEMENTASI SUBQUERY
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
    <title>Data Klinik</title>
	
	<style>
		
		.kotak {
			border: solid;
		}
		.summary-pasien{
			background-color: #FF0000;
			border-radius: 15px;
		}
		.summary-obat{
			background-color: #0a516b;
			border-radius: 15px;
		}
		.summary-dokter{
			background-color: #F0F8FF;
			border-radius: 15px;
		}
		.summary-berobat{
			background-color: #8FBC8F;
			border-radius: 15px;
		}
		.summary-resep{
			background-color: #66CDAA;
			border-radius: 15px;
		}
		.summary-user{
			background-color: #DEB887;
			border-radius: 15px;
		}
		.no-decoration{
			text-decoration: none;
		}
		.navbar{
			background-color: #008080;
		}
		.container-data {
			background-color: #E0FFFF;
			padding: 50px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container shadow">
        <header>
            <h1 align="center" class="mb-3">Data Klinik</h1>
        </header>
		<nav class="navbar navbar-expand-lg navbar-dark">
			<div class="container">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item me-4">
							<a class="nav-link text-white" href="index.php"><i class="fa-solid fa-house-chimney"></i> Home</a>
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
				<i class="fa-solid fa-file-medical fa-2x"></i>
				Data
			</li>
		  </ol>
		</nav>
		<hr>
		<h2>Hallo <?php echo $_SESSION['username'];?>!</h2>
		<div class="container-data mt-4">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-pasien p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-bed-pulse fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Pasien</h3>
								<p class="fs-4"><?php echo $jumlahpasien; ?> Pasien</p>
								<p> <a href="pasien/pasien.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-obat p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-capsules fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Obat</h3>
								<p class="fs-4"><?php echo $jumlahobat; ?> Obat</p>
								<p> <a href="obat/obat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-dokter p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-user-doctor fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Dokter</h3>
								<p class="fs-4"><?php echo $jumlahdokter; ?> Dokter</p>
								<p> <a href="dokter/dokter.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-berobat p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-syringe fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Berobat</h3>
								<p class="fs-4"><?php echo $jumlahberobat; ?> Berobat</p>
								<p> <a href="berobat/berobat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-resep p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-receipt fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Resep</h3>
								<p class="fs-4"><?php echo $jumlahresep; ?> Resep</p>
								<p> <a href="resep/resep.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-user p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">User</h3>
								<p class="fs-4"><?php echo $jumlahuser; ?> User</p>
								<p> <a href="user/user.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				<!-- IMPLEMENTASI SUBQUERY -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-4">
												<i class="fa-solid fa-syringe fa-7x text-black-50"></i>
											</div>
											<div class="col-8 text-white">
												<h3 class="fs-2">Belum Berobat</h3>
												<p class="fs-4">
													<?= $totalPasienBelumBerobat[0]; ?> Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI SUBQUERY -->

								<!-- IMPLEMENTASI FUNCTION -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-bed-pulse fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Total Pasien</h3>
												<p class="fs-4">
													<?= $jumlah_pasien[0]; ?>
													Total Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI SUBQUERY -->
							</div>
						</div>
					</div>
					<!-- IMPLEMENTASI VIEW -->
			<div class="card" style="margin-top:2rem;">
				<div class="card-body">
					<h4>Data Berobat Laki-Laki (IMPLEMENTASI view)</h4>
					<div class="container mt-4">
						<table class="table" style="margin-top:1rem;">
							<thead>
								<tr>
									<td>No.</td>
									<td>Nama Pasien</td>
									<td>Jenis Kelamin</td>
									<td>Umur</td>
									<td>Keluhan</td>
									<td>Hasil Diagnosa</td>
									<td>Nama Dokter</td>
								</tr>
							</thead>
							<?php
								$no = 1;
								$query = mysqli_query($conn, 'SELECT * FROM viewPenyakit');
								while ($data = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data['nama_pasien'] ?></td>
								<td><?= $data['jenis_kelamin'] ?></td>
								<td><?= $data['umur'] ?></td>
								<td><?= $data['keluhan_pasien'] ?></td>
								<td><?= $data['hasil_diagnosa'] ?></td>
								<td><?= $data['nama_dokter'] ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>

	<?php require "footer.php";?>
</div>
</body>
</html>
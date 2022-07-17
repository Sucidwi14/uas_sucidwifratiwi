<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../fontawesome/fontawesome/css/all.css" />
    <title>Menampilkan data dari database</title>
	<style>
		.hero {
			background-color: 	#8FBC8F;
			border-radius: 5px;
			padding: 10px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container shadow p-3">
	<header>
	<h2 align="center" class="hero text-white">Tabel Berobat</h2>
	</header>
	<hr>
	<div class="btn-toolbar mb-2 mb-md-10">
		<a class="btn btn-warning me-3" href="../data.php" role="button"><i class="fa-solid fa-angles-left me-1"></i>Kembali</a>
		<a class="btn btn-primary" href="berobat_tambah.php" role="button"><i class="fa-solid fa-plus me-1"></i>Tambah</a>
	</div>
	<div class="card">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td>No</td>
					<td>Id Berobat</td>
					<td>Nama Pasien</td>
					<td>Nama Dokter</td>
					<td>Tanggal Berobat</td>
					<td>Keluhan Pasien</td>
					<td>Hasil Diagnosa</td>
					<td>Penatalaksanaan</td> 
					<td>Aksi</td>
				</tr>
			</thead>
			<?php
			require "../koneksi.php";
			include "../session.php";
			$no = 1;
			$query = mysqli_query($conn, 'SELECT * FROM berobat
				join pasien on pasien.id_pasien = berobat.id_pasien
				join dokter on dokter.id_dokter = berobat.id_dokter');
			while ($data = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $data['id_berobat'] ?></td>
					<td><?php echo $data['nama_pasien'] ?></td>
					<td><?php echo $data['nama_dokter'] ?></td>
					<td><?php echo $data['tgl_berobat'] ?></td>
					<td><?php echo $data['keluhan_pasien'] ?></td>
					<td><?php echo $data['hasil_diagnosa'] ?></td>
					<td><?php echo $data['penatalaksanaan'] ?></td>
					<td>
						<a class="btn btn-success" href="berobat_ubah.php?id=<?= $data['id_berobat'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
						<a class="btn btn-danger" href="berobat_hapus.php?id=<?= $data['id_berobat'];?>" role="button"><i class="fa-solid fa-trash-can"></i></a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	</div>
	<?php require "../footer.php";?>
</div>
</body>
</html>

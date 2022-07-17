<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</script>
	<link rel="stylesheet" href="../fontawesome/fontawesome/css/all.css" />
    <title>Menampilkan data dari database</title>
	<style>
		.hero {
			background-color: 	#FF4500;
			border-radius: 5px;
			padding: 10px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<div class="container shadow p-3">
		<header class="hero">
		<h2 class="text-white" align="center">Tabel Pasien</h2>
		</header>
		<hr>
		<div class="btn-toolbar mb-2 mb-md-10">
			<a class="btn btn-warning me-3" href="../data.php" role="button"><i class="fa-solid fa-angles-left me-1"></i>Kembali</a>
			<a class="btn btn-primary me-3" href="pasien_tambah.php" role="button"><i class="fa-solid fa-plus me-1"></i>Tambah</a>
		</div>
		<div class="card mt-3">
		<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td>No</td>
					<td>Id Pasien</td>
					<td>Nama Pasien</td>
					<td>Jenis Kelamin</td>
					<td>Umur</td> 
					<td>Aksi</td>
				</tr>
			</thead>
			<?php
			include "../koneksi.php";
			include "../session.php";
			$no = 1;
			$query = mysqli_query($conn, 'SELECT * FROM pasien');
			while ($data = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $data['id_pasien'] ?></td>
					<td><?php echo $data['nama_pasien'] ?></td>
					<td><?php echo $data['jenis_kelamin'] ?></td>
					<td><?php echo $data['umur'] ?></td>
					<td>
						<a class="btn btn-success" href="pasien_ubah.php?id=<?= $data['id_pasien'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
						<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data..?');" href="pasien_hapus.php?id=<?= $data['id_pasien'];?>" role="button"><i class="fa-solid fa-trash-can"></i></a>
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
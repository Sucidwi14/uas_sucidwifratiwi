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
			background-color: 	#66CDAA;
			border-radius: 5px;
			padding: 10px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container shadow p-3">
	<header>
		<h2 align="center" class="hero text-white">Tabel Resep</h2>
	</header>
	<hr>
	<div class="btn-toolbar mb-2 mb-md-10">
		<a class="btn btn-warning me-3" href="../data.php" role="button"><i class="fa-solid fa-angles-left me-1"></i>Kembali</a>
		<a class="btn btn-primary" href="resep_tambah.php" role="button"><i class="fa-solid fa-plus me-1"></i>Tambah</a>
	</div>
	<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>No</td>
				<td>Id Resep</td>
				<td>Nama Obat</td>
				<td>Aksi</td>
            </tr>
        </thead>
		<?php
        require "../koneksi.php";
		include "../session.php";
        $no = 1;
        $query = mysqli_query($conn, 'SELECT nama_obat, id_resep FROM obat INNER JOIN resep_obat ON obat.id_obat = resep_obat.id_obat');
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?php echo $data['id_resep'] ?></td>
				<td><?php echo $data['nama_obat'] ?></td>
				<td>
					<a class="btn btn-success" href="resep_ubah.php?id=<?= $data['id_resep'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
					<a class="btn btn-danger" href="hapus.php?id=<?= $data['id_resep'];?>" role="button"><i class="fa-solid fa-trash-can"></i></a>
				</td>
            </tr>
        <?php } ?>
    </table>
	</div>
	<?php require "../footer.php";?>
</div>
</body>
</html>
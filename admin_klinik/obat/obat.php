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
			background-color: #0a516b;
			border-radius: 5px;
			padding: 10px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container shadow p-3">
	<header class="hero text-white">
	<h2 align="center">Tabel Obat</h2>
	</header>
	<hr>
	<div class="btn-toolbar mb-2 mb-md-10">
		<a class="btn btn-warning me-3" href="../data.php" role="button"><i class="fa-solid fa-angles-left me-1"></i>Kembali</a>
		<a class="btn btn-primary" href="obat_tambah.php" role="button"><i class="fa-solid fa-plus me-1"></i>Tambah</a>
	</div>
	<div class="card mb-5">
	<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>No</td>
				<td>Id Obat</td>
                <td>Nama Obat</td>
				<td>Aksi</td>
            </tr>
        </thead>
        <?php
        require "../koneksi.php";
		include "../session.php";
        $no = 1;
        $sql = mysqli_query($conn, 'SELECT * FROM obat');
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?php echo $data['id_obat'] ?></td>
                <td><?php echo $data['nama_obat'] ?></td>
				<td>
					<a class="btn btn-success" href="obat_ubah.php?id=<?= $data['id_obat'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
					<a class="btn btn-danger" href="obat_hapus.php?id=<?= $data['id_obat'];?>" role="button"><i class="fa-solid fa-trash-can"></i></a>
				</td>
            </tr>
        <?php } ?>
    </table>
	</div>
	</div>
	<hr class="divider">
	<div class="card mt-5">
	<div class="card-header">
        <h4>Trigger</h4>
    </div>
	<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="card-header text-white bg-secondary">
            <tr>
                <td>No</td>
				<td>Id Log</td>
				<td>Id Obat</td>
                <td>Obat Lama</td>
				<td>Obat Baru</td>
				<td>Waktu</td>
				<td>Aksi</td>
            </tr>
        </thead>
        <?php
        $no = 1;
        $sql = mysqli_query($conn, 'SELECT * FROM log_obat');
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?php echo $data['id_log'] ?></td>
				<td><?php echo $data['id_obat'] ?></td>
                <td><?php echo $data['nama_obat_lama'] ?></td>
				<td><?php echo $data['nama_obat_baru'] ?></td>
				<td><?php echo $data['waktu'] ?></td>
				<td><a class="btn btn-danger" href="hapus_triger.php?id=<?= $data['id_log'];?>" role="button"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
        <?php } ?>
    </table>
	</div>
	</div>
	<?php require "../footer.php";?>
</div>
</body>
</html>
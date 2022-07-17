-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2022 pada 19.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_klinik`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_totalUsers` () RETURNS INT(11) UNSIGNED NO SQL RETURN (SELECT COUNT(id_pasien) FROM pasien)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berobat`
--

CREATE TABLE `berobat` (
  `id_berobat` int(11) NOT NULL,
  `id_pasien` int(5) DEFAULT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `tgl_berobat` date DEFAULT NULL,
  `keluhan_pasien` varchar(200) DEFAULT NULL,
  `hasil_diagnosa` varchar(200) DEFAULT NULL,
  `penatalaksanaan` enum('Rawat Jalan','Rawat Inap','Rujuk','lainnya') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `penatalaksanaan`) VALUES
(2221, 11, 1011, '2022-04-21', 'Sakit Tenggorokan,Demam,Panas', 'Covid', 'Rujuk'),
(2222, 12, 1012, '2022-04-21', 'Sakit Kaki', 'Diabetes', 'Rawat Jalan'),
(2223, 13, 1013, '2022-04-21', 'Demam,Panas,Pusing', 'DBD', 'Rawat Inap'),
(2224, 14, 1014, '2022-04-21', 'Sakit Perut', 'Diare', 'Rawat Jalan'),
(2225, 15, 1015, '2022-04-21', 'Sakit Perut, Magh', 'Asam Lambung', 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
(1012, 'Suci'),
(1015, 'Nurjanah'),
(1014, 'Monic'),
(1013, 'Adun'),
(1011, 'Nizar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_obat`
--

CREATE TABLE `log_obat` (
  `id_log` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `nama_obat_lama` varchar(100) DEFAULT NULL,
  `nama_obat_baru` varchar(100) DEFAULT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_obat`
--

INSERT INTO `log_obat` (`id_log`, `id_obat`, `nama_obat_lama`, `nama_obat_baru`, `waktu`) VALUES
(NULL, 1113, 'Costrimoxazole', 'Promag', '2022-07-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(1111, 'Amoxillin'),
(1112, 'Antasida'),
(1113, 'Promag'),
(1114, 'Dextropen'),
(1115, 'Erytromycin'),
(1117, 'Komix');

--
-- Trigger `obat`
--
DELIMITER $$
CREATE TRIGGER `update_nama_obat` BEFORE UPDATE ON `obat` FOR EACH ROW insert into log_obat set id_obat=old.id_obat, nama_obat_lama = old.nama_obat, nama_obat_baru=new.nama_obat, waktu = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(40) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `umur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(11, 'irvan', 'L', 24),
(12, 'angel', 'P', 15),
(13, 'siska', 'P', 10),
(14, 'ilyas', 'L', 7),
(15, 'Rafi', 'L', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_berobat`, `id_obat`) VALUES
(3331, 2221, 1111),
(3332, 2222, 1112),
(3333, 2223, 1113),
(3334, 2224, 1114),
(3335, 2225, 1115);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama_lengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1211, 'adminklinik1', '1211', 'irvan maulana'),
(1212, 'adminklinik2', '1212', 'angelina golie'),
(1213, 'adminklinik3', '1213', 'siska khol'),
(1214, 'adminklinik4', '1214', 'ilyas alkamal'),
(1215, 'adminklinik5', '1215', 'rafi ahmad'),
(1216, 'suci', 'suci01', 'suciicuss'),
(1217, 'suci', '1c8d1ead24adf9c9b210cebc9bae6c1a', 'suciicuss');
-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewpenyakit`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewpenyakit` (
`id_berobat` int(11)
,`nama_pasien` varchar(40)
,`jenis_kelamin` enum('L','P')
,`umur` int(2)
,`keluhan_pasien` varchar(200)
,`hasil_diagnosa` varchar(200)
,`tgl_berobat` date
,`nama_dokter` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewpenyakit`
--
DROP TABLE IF EXISTS `viewpenyakit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewpenyakit`  AS SELECT `a`.`id_berobat` AS `id_berobat`, `b`.`nama_pasien` AS `nama_pasien`, `b`.`jenis_kelamin` AS `jenis_kelamin`, `b`.`umur` AS `umur`, `a`.`keluhan_pasien` AS `keluhan_pasien`, `a`.`hasil_diagnosa` AS `hasil_diagnosa`, `a`.`tgl_berobat` AS `tgl_berobat`, `c`.`nama_dokter` AS `nama_dokter` FROM ((`berobat` `a` join `pasien` `b` on(`a`.`id_pasien` = `b`.`id_pasien`)) join `dokter` `c` on(`a`.`id_dokter` = `c`.`id_dokter`)) WHERE `b`.`jenis_kelamin` = 'L''L'  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD UNIQUE KEY `nama_dokter_2` (`nama_dokter`),
  ADD KEY `nama_dokter` (`nama_dokter`),
  ADD KEY `nama_dokter_3` (`nama_dokter`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_berobat` (`id_berobat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2226;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1118;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3336;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1217;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `id_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `id_berobat` FOREIGN KEY (`id_berobat`) REFERENCES `berobat` (`id_berobat`),
  ADD CONSTRAINT `id_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

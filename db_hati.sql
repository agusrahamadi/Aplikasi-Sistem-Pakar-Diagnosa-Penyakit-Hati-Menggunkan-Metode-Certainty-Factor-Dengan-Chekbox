-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Nov 2019 pada 11.49
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
  `kd_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`kd_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_daftar`
--

CREATE TABLE IF NOT EXISTS `t_daftar` (
  `kode_daftar` int(12) NOT NULL AUTO_INCREMENT,
  `nm_pasien` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `usia` varchar(20) NOT NULL,
  `kd_daftar` varchar(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`kode_daftar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data untuk tabel `t_daftar`
--

INSERT INTO `t_daftar` (`kode_daftar`, `nm_pasien`, `jk`, `usia`, `kd_daftar`, `tanggal`) VALUES
(1, 'sarah', 'Perempuan', '22', 'K1', '0000-00-00 00:00:00'),
(2, 'adi', 'Laki-laki', '18', 'K2', '0000-00-00 00:00:00'),
(3, 'wahyui', 'Laki-laki', '12', 'K3', '0000-00-00 00:00:00'),
(4, 'a', 'Laki-laki', '18', 'K4', '0000-00-00 00:00:00'),
(5, 'adi', 'Laki-laki', '223', 'K5', '0000-00-00 00:00:00'),
(6, 'aad', 'Laki-laki', '23', 'K6', '0000-00-00 00:00:00'),
(7, 'a', 'Perempuan', '13', 'K7', '0000-00-00 00:00:00'),
(8, 'fyfhj', 'Perempuan', '78', 'K8', '0000-00-00 00:00:00'),
(9, 'ndlkand', 'Laki-laki', '29', 'K9', '0000-00-00 00:00:00'),
(10, 'adad', 'Laki-laki', '12', 'K10', '0000-00-00 00:00:00'),
(11, 'adi', 'Laki-laki', '12', 'K11', '0000-00-00 00:00:00'),
(12, 'ado', 'Laki-laki', '89', 'K12', '0000-00-00 00:00:00'),
(13, 'aad', 'Laki-laki', '11', 'K13', '0000-00-00 00:00:00'),
(14, 'bbb', 'Perempuan', '78', 'K14', '0000-00-00 00:00:00'),
(15, 'tes', 'Laki-laki', '19', 'K15', '0000-00-00 00:00:00'),
(16, 'tes', 'Laki-laki', '19', 'K16', '0000-00-00 00:00:00'),
(17, 'tes', 'Laki-laki', '19', 'K17', '0000-00-00 00:00:00'),
(18, 'tes', 'Laki-laki', '19', 'K18', '0000-00-00 00:00:00'),
(19, 'tes', 'Laki-laki', '19', 'K19', '0000-00-00 00:00:00'),
(20, 'tes', 'Laki-laki', '19', 'K20', '0000-00-00 00:00:00'),
(21, 'tes', 'Laki-laki', '19', 'K21', '0000-00-00 00:00:00'),
(22, '1dad', 'Laki-laki', '31', 'K22', '0000-00-00 00:00:00'),
(23, 'axa', 'Laki-laki', 'ax', 'K23', '0000-00-00 00:00:00'),
(24, 'Lani', 'Laki-laki', '18', 'K24', '2019-09-29 02:07:08'),
(25, 'Arie Kurniawan', 'Laki-laki', '19', 'K25', '0000-00-00 00:00:00'),
(26, 'Maulida', 'Perempuan', '28', 'K26', '2019-09-29 00:41:04'),
(27, 'Aulia', 'Perempuan', '18', 'K27', '2019-09-29 00:52:48'),
(28, 'Jamilah', 'Laki-laki', '19', 'K28', '2019-09-29 11:57:46'),
(29, 'Denny', 'Laki-laki', '18', 'K29', '2019-09-29 13:42:16'),
(30, 'Kokom', 'Perempuan', '18', 'K30', '2019-09-29 14:36:49'),
(31, 'Depok', 'Laki-laki', '89', 'K31', '2019-09-29 15:07:34'),
(32, 'Maulida', 'Laki-laki', '18', 'K32', '2019-09-29 15:11:35'),
(33, 'Nindy', 'Perempuan', '15', 'K33', '2019-09-29 15:17:57'),
(34, 'adi', 'Laki-laki', '18', 'K34', '2019-10-08 14:13:34'),
(35, 'a', 'Laki-laki', '12', 'K35', '2019-10-08 14:20:40'),
(36, 'Denny', 'Perempuan', '19', 'K36', '2019-10-08 14:32:59'),
(37, 'aaa', 'Perempuan', '11', 'K37', '2019-10-08 15:03:29'),
(38, 'ada', 'Laki-laki', '11', 'K38', '2019-10-08 15:38:50'),
(39, 'daas', 'Laki-laki', '16', 'K39', '2019-10-08 16:17:56'),
(40, 'imam', 'Laki-laki', '22', 'K40', '2019-10-08 16:22:57'),
(41, 'scs', 'Laki-laki', '12', 'K41', '2019-10-13 19:26:03'),
(42, 'a', 'Laki-laki', '223', 'K42', '2019-10-13 19:46:36'),
(43, 'aaa', 'Laki-laki', '12', 'K43', '2019-10-13 20:58:14'),
(44, 'axa', 'Laki-laki', '11', 'K44', '2019-10-13 21:05:04'),
(45, 's', 'Perempuan', '3', 'K45', '2019-10-13 21:05:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_diagnosa`
--

CREATE TABLE IF NOT EXISTS `t_diagnosa` (
  `kd_diagnosa` int(11) NOT NULL AUTO_INCREMENT,
  `mb` float NOT NULL,
  `md` float NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `kode_gejala` int(11) NOT NULL,
  PRIMARY KEY (`kd_diagnosa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `t_diagnosa`
--

INSERT INTO `t_diagnosa` (`kd_diagnosa`, `mb`, `md`, `kode_penyakit`, `kode_gejala`) VALUES
(1, 0.65, 0.03, 1, 1),
(2, 0.5, 0.01, 1, 2),
(3, 0.6, 0.01, 1, 3),
(4, 0.6, 0.05, 1, 4),
(5, 0.4, 0.01, 1, 5),
(6, 0.65, 0.01, 1, 6),
(7, 0.6, 0.01, 1, 8),
(8, 0.9, 0.01, 1, 13),
(9, 0.8, 0.02, 2, 6),
(10, 0.8, 0.02, 2, 7),
(11, 0.9, 0.05, 2, 8),
(12, 0.6, 0.02, 2, 9),
(13, 0.2, 0.01, 2, 10),
(14, 0.6, 0.01, 2, 11),
(15, 0.5, 0.02, 2, 2),
(16, 0.4, 0.05, 2, 12),
(17, 0.2, 0.09, 2, 1),
(18, 0.85, 0.04, 3, 3),
(19, 0.3, 0.02, 3, 1),
(20, 0.5, 0.03, 3, 13),
(21, 0.9, 0.02, 3, 10),
(22, 0.3, 0.01, 3, 14),
(23, 0.8, 0.05, 3, 11),
(24, 0.7, 0.05, 6, 15),
(25, 0.6, 0.02, 6, 16),
(26, 0.3, 0.02, 6, 17),
(27, 0.5, 0.02, 6, 18),
(28, 0.7, 0.03, 6, 7),
(29, 0.5, 0.03, 6, 8),
(30, 0.4, 0.03, 6, 19),
(31, 0.4, 0.01, 6, 9),
(32, 0.6, 0.04, 4, 14),
(33, 0.4, 0.02, 4, 20),
(34, 0.3, 0.02, 4, 1),
(35, 0.7, 0.03, 4, 16),
(36, 0.5, 0.06, 4, 3),
(37, 0.2, 0.03, 4, 21),
(38, 0.4, 0.01, 4, 22),
(39, 0.6, 0.04, 4, 7),
(40, 0.4, 0.02, 4, 19),
(41, 0.8, 0.03, 4, 6),
(42, 0.7, 0.08, 4, 23),
(43, 0.3, 0.02, 6, 1),
(44, 0.6, 0.03, 6, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gejala`
--

CREATE TABLE IF NOT EXISTS `t_gejala` (
  `kode_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `nm_gejala` varchar(50) NOT NULL,
  `kd_gejala` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_gejala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `t_gejala`
--

INSERT INTO `t_gejala` (`kode_gejala`, `nm_gejala`, `kd_gejala`) VALUES
(1, 'Kehilangan selera makan', 'G1'),
(2, 'Muntah', 'G2'),
(3, 'Mual', 'G3'),
(4, 'Rasa letih', 'G4'),
(5, 'Perut tidak nyaman', 'G5'),
(6, 'Air seni berwarna kuning tua', 'G6'),
(7, 'Kulit menjadi kekuningan', 'G7'),
(8, 'Bagian putih mata menjadi kuning', 'G8'),
(9, 'Bengkak pada kanan perut atas', 'G9'),
(10, 'Nyeri sendi', 'G10'),
(11, 'Demam', 'G11'),
(12, 'Mulut tersa pahit', 'G12'),
(13, 'Mudah capek', 'G13'),
(14, 'Nyeri perut disisi kanan atas', 'G14'),
(15, 'Muntah darah', 'G15'),
(16, 'Berat badan menurun', 'G16'),
(17, 'Bercak kemerahan ditelapak tangan', 'G17'),
(18, 'Sesak nafas', 'G18'),
(19, 'Kulit terasa gatal', 'G19'),
(20, 'Nyeri pada bahu kanan', 'G20'),
(21, 'Mengantuk', 'G21'),
(22, 'Benjolan di perut bagian atas', 'G22'),
(23, 'Tinja berwarna abu-abu terang', 'G23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penyakit`
--

CREATE TABLE IF NOT EXISTS `t_penyakit` (
  `kode_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `nm_penyakit` varchar(50) NOT NULL,
  `penanganan` text NOT NULL,
  `kd_penyakit` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_penyakit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_penyakit`
--

INSERT INTO `t_penyakit` (`kode_penyakit`, `nm_penyakit`, `penanganan`, `kd_penyakit`) VALUES
(1, 'Hepatitis A ', 'Hepatitis A akan sembuh dengan sendirinya karena sistem kekebalan tubuh penderita dapat membasmi virus tersebut. Pengobatan yang diberikan hanya untuk meringankan gejala-gejala yang dialami penderitanya, sambil menunggu penyakit sembuh.\r\n\r\nSelain itu, penting bagi penderita untuk menjaga kebersihan untuk mencegah penularan ke orang lain. Penderita yang sembuh akan memiliki kekebalan tubuh terhadap penyakit ini.', 'P1'),
(2, 'Hepatitis B', 'Tidak ada langkah penanganan khusus untuk kondisi hepatitis B akut. Infeksi akan sembuh sendiri tanpa memerlukan pengobatan khusus. Penanganan hanya bertujuan untuk meredakan gejala yang muncul. Akan tetapi, sebagian infeksi hepatitis B akut akan menjadi kronis.\r\n\r\nSalah satu langkah pengobatan untuk penderita hepatitis B kronis adalah dengan mengonsumsi obat antivirus. Pemberian obat antivirus bertujuan untuk mencegah perkembangan virus, bukan untuk menghilangkan virus dari tubuh penderitanya secara tuntas.\r\n\r\nPengobatan hepatitis B kronis membutuhkan kepatuhan penderitanya untuk kontrol secara berkala ke dokter untuk melihat perkembangan penyakit dan mengevaluasi pengobatan. Hal tersebut karena hepatitis B kronis dapat menyebabkan kerusakan organ hati. Jika kerusakan hati cukup parah, dokter mungkin akan menganjurkan prosedur transplantasi hati.', 'P2'),
(3, 'Hepatitis C', 'Sebagian penderita hepatitis C dapat sembuh dengan sendirinya, namun sebagian lainnya menjadi kronis. Penderita hepatitis C kronis dapat mengalami komplikasi berupa sirosis atau kanker hati.\r\n\r\nOleh karena itu, dokter akan menentukan perlu atau tidaknya pengobatan terhadap hepatitis C dengan obat antivirus. Bila penderita hepatitis C sudah mengalami komplikasi, dokter mungkin akan menyarankan transplantasi hati.', 'P3'),
(4, 'Kanker hati', 'Pengobatan kanker hati meliputi pemberian obat-obatan, terapi radiasi, hingga transplantasi hati. Pemilihan metode tersebut tergantung kepada kondisi pasien, serta stadium kanker. Beberapa pilihan pengobatan yang dapat dilakukan di antaranya:\r\n\r\n    Bedah\r\n    Ablasi tumor\r\n    Embolisasi\r\n\r\n    Radioterapi\r\n    Terapi target\r\n', 'P4'),
(6, 'Sirosis', 'Pengobatan sirosis bertujuan untuk mencegah kerusakan lebih lanjut dan meredakan gejala yang timbul. Jika organ hati sudah tidak bisa berfungsi, penderita perlu menjalani transplantasi hati, yaitu mengganti organ hati yang rusak dengan organ hati yang sehat dari pendonor.', 'P5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tentangpenyakit`
--

CREATE TABLE IF NOT EXISTS `t_tentangpenyakit` (
  `kd_tentangpenyakit` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tentangpenyakit` varchar(50) NOT NULL,
  `det_tentangpenyakit` varchar(15000) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  PRIMARY KEY (`kd_tentangpenyakit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `t_tentangpenyakit`
--

INSERT INTO `t_tentangpenyakit` (`kd_tentangpenyakit`, `nm_tentangpenyakit`, `det_tentangpenyakit`, `gambar`) VALUES
(35, 'Hepatitis A', '<div class="post-detail-container">\r\n<div id="postContent" class="post-content">\r\n<p><strong>Hepatitis A </strong><strong>adalah</strong> <strong>peradangan </strong><strong>organ</strong><strong> hati yang </strong><strong>disebabkan</strong><strong> oleh infeksi virus hepatitis A. Infeksi </strong><strong>yang</strong><strong> akan mengganggu kerja </strong><strong>organ </strong><strong>hati</strong><strong> ini </strong><strong>dapat menular dengan mudah</strong><strong>,</strong><strong> melalui makanan </strong><strong>atau</strong><strong> minuma</strong><strong>n</strong><strong> yang terkontaminasi virus</strong><strong>.</strong></p>\r\n<p>Penyebab penyakit ini adalah virus hepatitis A. Virus ini dapat menyebar dengan mudah melalui konsumsi makanan atau minuman yang telah terkontaminasi tinja penderita hepatitis A.</p>\r\n<p><img class="alignnone size-full wp-image-4589" src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1470387859/attached_image/hepatitis-a-alodokter.jpg" alt="alodokter-hepatitis-a" width="385" height="289" /></p>\r\n<h3><strong>Faktor Risiko</strong> <strong>Hepatitis A</strong></h3>\r\n<p>Seseorang lebih mudah terkena hepatitis A jika memiliki kondisi sebagai berikut:</p>\r\n<ul>\r\n<li>Mengunjungi atau tinggal di daerah yang terdapat banyak kasus hepatitis A.</li>\r\n<li>Melakukan hubungan intim dengan penderita hepatitis A.</li>\r\n<li>Tinggal serumah dengan penderita hepatitis A.</li>\r\n</ul>\r\n<h3><strong>Gejala Hepatitis A</strong></h3>\r\n<p>Gejala hepatitis A muncul beberapa minggu setelah penderita tertular virus tersebut. Gejala yang paling disadari oleh penderita hepatitis A adalah perubahan warna mata dan kulit menjadi kuning. Tetapi sebelum timbulnya <a href="https://www.alodokter.com/penyakit-kuning">penyakit kuning</a>, penderita dapat mengalami:</p>\r\n<ul>\r\n<li>Demam</li>\r\n<li>Lemas</li>\r\n<li><a href="https://www.alodokter.com/mual">Mual</a> dan muntah</li>\r\n<li>Warna urine menjadi gelap</li>\r\n<li>Warna tinja menjadi pucat</li>\r\n</ul>\r\n<h3><strong>Pengobatan Hepatitis A</strong></h3>\r\n<p>Hepatitis A akan sembuh dengan sendirinya karena sistem kekebalan tubuh penderita dapat membasmi virus tersebut. Pengobatan yang diberikan hanya untuk meringankan gejala-gejala yang dialami penderitanya, sambil menunggu penyakit sembuh.</p>\r\n<p>Selain itu, penting bagi penderita untuk menjaga kebersihan untuk mencegah penularan ke orang lain. Penderita yang sembuh akan memiliki kekebalan tubuh terhadap penyakit ini.</p>\r\n<h3>Komplikasi Hepatitis A</h3>\r\n<p>Infeksi hepatitis A tidak menyebabkan <a href="https://www.alodokter.com/penyakit-liver">penyakit liver</a> jangka panjang (kronis) dan jarang berakibat fatal. Meski demikian, penyakit ini berpotensi menyebabkan <a href="https://www.alodokter.com/gagal-hati">gagal hati</a>, terutama pada lansia dan orang yang sudah menderita penyakit liver kronis sebelumnya.</p>\r\n<h3><strong>Pencegahan Hepatitis A</strong></h3>\r\n<p>Hepatitis A dapat dicegah dengan beberapa cara, antara lain:</p>\r\n<ul>\r\n<li>Melakukan <a href="https://www.alodokter.com/vaksin-hepatitis-a-mencegah-infeksi-yang-menyebabkan-kerusakan-hati">vaksinasi hepatitis A</a></li>\r\n<li>Menjaga kebersihan diri dan lingkungan</li>\r\n<li>Menghindari konsumsi makanan mentah atau setengah matang</li>\r\n</ul>\r\n</div>\r\n</div>', 'hepatites a.jpg'),
(36, 'Hepatitis B', '<div class="post-detail-container">\r\n<div id="postContent" class="post-content">\r\n<p><strong>Hepatitis B adalah peradangan organ hati yang disebabkan oleh virus hepatitis B. Virus ini dapat menular melalui hubungan seksual atau berbagi jarum suntik. </strong></p>\r\n<p>Infeksi hepatitis B merupakan penyakit yang tidak bertahan lama dalam tubuh penderita dan akan sembuh sendiri tanpa pengobatan khusus. Kondisi ini disebut infeksi hepatitis B akut. Akan tetapi, infeksi hepatitis B juga dapat menetap dan bertahan dalam tubuh seseorang (menjadi kronis).</p>\r\n<p><img class="alignnone size-full wp-image-3144" src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1470387861/attached_image/hepatitis-b-alodokter.jpg" alt="alodokter-hepatitis-b" width="378" height="284" /></p>\r\n<p>Infeksi hepatitis B kronis ini dapat menimbulkan komplikasi yang dapat membahayakan nyawa, yaitu sirosis dan kanker hati. Oleh karena itu, penderita hepatitis B kronis perlu melakukan kontrol secara berkala ke dokter untuk mendapatkan penanganan dan deteksi dini bila terjadi komplikasi. Perlu diketahui, hepatitis B dapat dicegah dengan melakukan vaksinasi hepatitis B.</p>\r\n<h3><strong>Gejala Hepatitis B</strong></h3>\r\n<p>Hepatitis B sering kali tidak menimbulkan gejala, sehingga penderitanya tidak menyadari bahwa dia telah terinfeksi. Meski demikian, gejala tetap dapat muncul setelah 1-5 bulan sejak pertama kali terpapar virus. Gejala yang dapat muncul adalah demam, sakit kepala, mual, muntah, lemas, serta <a href="https://www.alodokter.com/penyakit-kuning">penyakit kuning</a>.</p>\r\n<h3><strong>Penyebab Hepatitis B</strong></h3>\r\n<p>Hepatitis B tidak akan menular bila hanya berbagi alat makan atau berpelukan dengan penderitanya.</p>\r\n<p>Penularan virus ini terjadi melalui hubungan seksual tanpa kondom dan berbagi jarum suntik dengan penderita hepatitis B. Hal ini karena virus hepatitis B berada di dalam darah dan cairan tubuh, seperti sperma dan cairan vagina.</p>\r\n<p>Selain itu, hepatitis B juga dapat ditularkan dari wanita yang sedang hamil kepada bayi dalam kandungannya.</p>\r\n<h3><strong>Diagnosis Hepatitis B</strong></h3>\r\n<p>Telah disebutkan sebelumnya bahwa penyakit hepatitis B sering kali tidak menimbulkan gejala hingga timbul komplikasi. Oleh karena itu, penyakit ini umumnya terdeteksi saat seseorang melakukan <a href="https://www.alodokter.com/cari-rumah-sakit/laboratorium-klinik/skrining-hepatitis">skrining terhadap penyakit hepatitis B</a>.</p>\r\n<p>Bila terdeteksi terkena hepatitis B, dokter akan melakukan pemeriksaan lanjutan, seperti tes darah, <a href="https://www.alodokter.com/cari-rumah-sakit/radiologi/usg-perut">USG perut</a>, hingga pengambilan sampel jaringan hati (<a href="https://www.alodokter.com/cari-rumah-sakit/onkologi/biopsi-hati">biopsi hati</a>). Pemeriksaan ini bertujuan untuk menilai apakah hepatitis B yang dialami penderita bersifat akut atau kronis, serta memeriksa tingkat kerusakan dan fungsi organ hati penderita.</p>\r\n<h3><strong>Pengobatan Hepatitis B</strong></h3>\r\n<p>Tidak ada langkah penanganan khusus untuk kondisi hepatitis B akut. Infeksi akan sembuh sendiri tanpa memerlukan pengobatan khusus. Penanganan hanya bertujuan untuk meredakan gejala yang muncul. Akan tetapi, sebagian infeksi hepatitis B akut akan menjadi kronis.</p>\r\n<p>Salah satu langkah pengobatan untuk penderita hepatitis B kronis adalah dengan mengonsumsi <a href="https://www.alodokter.com/obat-antivirus">obat antivirus</a>. Pemberian obat antivirus bertujuan untuk mencegah perkembangan virus, bukan untuk menghilangkan virus dari tubuh penderitanya secara tuntas.</p>\r\n<p>Pengobatan hepatitis B kronis membutuhkan kepatuhan penderitanya untuk kontrol secara berkala ke dokter untuk melihat perkembangan penyakit dan mengevaluasi pengobatan. Hal tersebut karena hepatitis B kronis dapat menyebabkan kerusakan organ hati. Jika kerusakan hati cukup parah, dokter mungkin akan menganjurkan prosedur <a href="https://www.alodokter.com/ketahui-tahap-tahap-prosedur-transplantasi-hati">transplantasi hati</a>.</p>\r\n<h3><strong>Komplikasi Hepatitis B</strong></h3>\r\n<p>Penderita hepatitis B kronis berisiko menimbulkan <a href="https://www.alodokter.com/sirosis">sirosis</a>, <a href="https://www.alodokter.com/kanker-hati">kanker hati</a>, dan <a href="https://www.alodokter.com/gagal-hati">gagal hati</a>. Meski jarang terjadi, infeksi hepatitis B akut juga dapat menyebabkan komplikasi berupa hepatitis B fulminan yang dapat mengancam nyawa.</p>\r\n<h3><strong>Vaksin dan Pencegahan Hepatitis B</strong></h3>\r\n<p>Langkah utama untuk mencegah hepatitis B adalah melalui vaksinasi. <a href="https://www.alodokter.com/vaksin-hepatitis-b">Vaksin hepatitis B</a> merupakan vaksin wajib yang diberikan kepada anak-anak. Efek vaksin yang diberikan saat anak-anak tidak akan bertahan seumur hidup, sehingga vaksinasi perlu diulang saat dewasa.</p>\r\n<p>Selain vaksinasi, beberapa tindakan juga perlu dilakukan untuk menurunkan risiko terkena hepatitis B, yaitu melakukan hubungan seksual yang aman dan tidak menyalahgunakan NAPZA.</p>\r\n</div>\r\n</div>', 'hepatites B.jpg'),
(37, 'Hepatitis C', '<p><strong>Hepatitis C</strong><strong> adalah</strong> <strong>peradangan pada organ hati akibat infeksi virus hepatisis C</strong><strong>. Sebagian penderita hepatitis C dapat mengalami penyakit liver kronis, hingga mengalami kanker hati.</strong></p>\r\n<p>Hepatitis C menular melalui darah, yaitu saat darah penderita masuk ke dalam pembuluh darah orang lain. Selain itu, hepatitis C juga dapat menular melalui hubungan intim tanpa kondom dengan penderita.</p>\r\n<p><img class="alignnone size-full wp-image-10611" src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1556157511/attached_image/hepatitis-c-alodokter.jpg" alt="alodokter-hepatitis-c" width="398" height="284" /></p>\r\n<p>Hepatitis C rentan terjadi bila:</p>\r\n<ul>\r\n<li>Berbagi peralatan pribadi, seperti sikat gigi, gunting, atau gunting kuku, dengan penderita.</li>\r\n<li>Mendapatkan prosedur medis dengan peralatan yang tidak steril.</li>\r\n</ul>\r\n<h3><strong>Gejala Hepatitis C</strong></h3>\r\n<p>Sebagian besar penderita hepatitis C tidak mengalami gejala pada tahap awal. Hal ini mengakibatkan penderita tidak mengetahui bahwa dirinya menderita hepatitis C hingga kondisi penyakitnya sudah kronis.</p>\r\n<p>Meski demikian, tidak semua hepatitis C berkembang menjadi kronis. Hampir setengah penderita hepatitis C akan sembuh dengan sendirinya.</p>\r\n<p>Gejala biasanya muncul bila infeksi kronis dari hepatitis sudah menimbulkan kerusakan pada hati. Gejala yang dapat ditimbulkan adalah lemas, tidak nafsu makan, dan <a href="https://www.alodokter.com/penyakit-kuning" target="_blank" rel="noopener noreferrer">penyakit kuning</a>.</p>\r\n<h3><strong>Diagnosis Hepatitis C</strong></h3>\r\n<p>Untuk mendeteksi virus hepatitis C, dokter akan melakukan pemeriksaan darah, yaitu pemeriksaan antibodi terhadap hepatitis C dan tes genetik virusnya sendiri di dalam darah (HCV RNA). Kemudian, penderita perlu menjalani tes lanjutan seperti <em><a href="https://www.alodokter.com/cari-rumah-sakit/gastroenterologi/fibroscan" target="_blank" rel="noopener noreferrer">fibroscan</a></em> dan biopsi hati, untuk mengetahui tingkat kerusakan hati.</p>\r\n<h3><strong>Pengobatan dan Komplikasi Hepatitis C</strong></h3>\r\n<p>Sebagian penderita hepatitis C dapat sembuh dengan sendirinya, namun sebagian lainnya menjadi kronis. Penderita hepatitis C kronis dapat mengalami komplikasi berupa <a href="https://www.alodokter.com/sirosis" target="_blank" rel="noopener noreferrer">sirosis</a> atau kanker hati.</p>\r\n<p>Oleh karena itu, dokter akan menentukan perlu atau tidaknya pengobatan terhadap hepatitis C dengan <a href="https://www.alodokter.com/obat-antivirus" target="_blank" rel="noopener noreferrer">obat antivirus</a>. Bila penderita hepatitis C sudah mengalami komplikasi, dokter mungkin akan menyarankan <a href="https://www.alodokter.com/ketahui-tahap-tahap-prosedur-transplantasi-hati">transplantasi hati</a>.</p>\r\n<h3><strong>Pencegahan Hepatitis C<br /> </strong></h3>\r\n<p>Belum ada vaksin khusus untuk mencegah hepatitis C. Meski demikian, ada beberapa cara yang dapat dilakukan untuk mencegah terjadinya infeksi akibat virus hepatitis C. Langkah-langkah pencegahan hepatitis C, antara lain:</p>\r\n<ul>\r\n<li>Tidak berbagi penggunaan barang pribadi dengan orang lain.</li>\r\n<li>Memilih tempat tindik atau tato dengan peralatan sekali pakai.</li>\r\n<li>T</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>idak bergonta-ganti pasangan seksual.</li>\r\n<li>Tidak berbagi jarum suntik.</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'Hepatites C.jpg'),
(38, 'Kangker Hati', '<p><strong>Kanker hati adalah kanker yang bermula dari organ hati</strong><strong>, dan bisa menyebar ke organ lain di tubuh. Kondisi ini terjadi ketika sel-sel di dalam hati bermutasi dan membentuk tumor</strong><strong>.</strong></p>\r\n<p>Hati adalah salah satu organ dalam tubuh yang memiliki banyak fungsi penting. Antara lain adalah untuk membersihkan darah dari racun dan zat berbahaya seperti alkohol dan obat-obatan, menghasilkan empedu yang membantu mencerna nutrisi bagi tubuh seperti lemak, serta mengontrol pembekuan darah.</p>\r\n<p><img class="alignnone size-full wp-image-984" src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1553508885/attached_image/kanker-hati-alodokter.jpg" alt="Kanker hati-Alodokter" width="466" height="349" /></p>\r\n<p>Kanker hati adalah satu dari lima jenis <a href="https://www.alodokter.com/penyakit-a-z/kanker" target="_blank" rel="noopener noreferrer">kanker</a> yang paling banyak menyebabkan kematian. Berdasarkan riset WHO tahun 2015, kanker hati bertanggung jawab atas lebih dari 700.000 kematian, dari 9 juta kematian akibat kanker.</p>\r\n<h3><strong>Jenis Kanker Hati</strong></h3>\r\n<p>Kanker hati terbagi menjadi kanker hati primer dan kanker hati sekunder. Kanker hati primer adalah kanker yang tumbuh atau berasal dari organ hati. Jenis kanker hati primer yang paling sering terjadi adalah <em>h</em><em>epatocellular carcinoma</em>. Umumnya, jenis kanker ini terjadi akibat komplikasi penyakit hati, seperti sirosis atau penyakit radang hati (<a href="https://www.alodokter.com/hepatitis" target="_blank" rel="noopener noreferrer">hepatitis</a>).</p>\r\n<p>Selain <em>h</em><em>epatocellular carcinoma</em>, ada juga beberapa jenis kanker hati primer yang jarang terjadi, antara lain hepatoblastoma dan <em>angiosarcoma</em>. Hepatoblastoma adalah kanker hati yang hanya menyerang anak-anak. Sedangkan <em>angiosarcoma</em> adalah kanker yang tumbuh di sel-sel pembuluh darah di dalam hati. Jenis lain dari kanker hati primer yang jarang terjadi adalah <em><a href="https://www.alodokter.com/cholangiocarcinoma" target="_blank" rel="noopener noreferrer">cholangiocarcinoma</a></em>, yaitu kanker yang berkembang di saluran empedu.</p>\r\n<p>Sedangkan kanker hati sekunder adalah kanker yang tumbuh di organ lain, kemudian menyebar ke hati (metastasis). Kanker dari organ lain dapat menyebar ke hati, namun yang paling sering adalah kanker lambung, kanker usus, <a href="https://www.alodokter.com/kanker-paru-paru" target="_blank" rel="noopener noreferrer">kanker paru-paru</a>, dan kanker payudara.</p>\r\n<h3><strong>Stadium </strong><strong>Kanker Hati</strong></h3>\r\n<p>Sama seperti jenis kanker lain, kanker hati juga terbagi dalam beberapa tahap atau stadium. Pembagian ini menjelaskan ukuran dan tingkat penyebaran kanker. Artinya, semakin tinggi stadium yang dialami, semakin luas pula penyebaran kanker pada seseorang.</p>\r\n<ul>\r\n<li>\r\n<h4><strong>Stadium A</strong></h4>\r\n</li>\r\n</ul>\r\n<p>Ada satu tumor berukuran kurang dari 5 cm, atau terdapat 2-3 tumor dengan ukuran kurang dari 3 cm. Fungsi hati masih terbilang normal atau sangat minimal bila terganggu.</p>\r\n<ul>\r\n<li>\r\n<h4><strong>Stadium B</strong></h4>\r\n</li>\r\n</ul>\r\n<p>Terdapat beberapa tumor besar di hati, namun belum mengganggu fungsi hati. Kondisi pasien secara umum masih baik.</p>\r\n<ul>\r\n<li>\r\n<h4><strong>Stadium C</strong></h4>\r\n</li>\r\n</ul>\r\n<p>Kanker sudah menyebar ke pembuluh darah, kelenjar getah bening, atau organ tubuh lain. Pada stadium ini, kondisi pasien mulai memburuk, namun hati masih berfungsi.</p>\r\n<ul>\r\n<li>\r\n<h4><strong>Stadium D</strong></h4>\r\n</li>\r\n</ul>\r\n<p>Kanker hati yang disertai dengan kondisi fisik pasien yang memburuk dan gangguan fungsi dari organ hati, tanpa memandang ukuran tumor.</p>\r\n<h3><strong>Gejala dan Faktor Risiko Kanker Hati</strong></h3>\r\n<p>Gejala kanker hati seringkali baru muncul pada stadium lanjut. Umumnya, gejala yang muncul meliputi:</p>\r\n<ul>\r\n<li>Nyeri di perut</li>\r\n<li>Penumpukan cairan di dalam perut</li>\r\n<li>Pembengkakan organ hati</li>\r\n</ul>\r\n<p>Kanker hati dapat menyerang siapa saja, tapi lebih berisiko terjadi pada penderita penyakit hati dan HIV/AIDS, seseorang yang terpapar zat kimia, atau pada pasien yang menjalani terapi radiasi dan operasi pengangkatan kandung empedu.</p>\r\n<h3><strong>Pengobatan Kanker Hati</strong></h3>\r\n<p>Pengobatan kanker hati meliputi pemberian obat-obatan, terapi radiasi, hingga transplantasi hati. Pemilihan metode tersebut tergantung kepada kondisi pasien, serta stadium kanker. Beberapa pilihan pengobatan yang dapat dilakukan di antaranya:</p>\r\n<ul>\r\n<li>Bedah</li>\r\n<li>Ablasi tumor</li>\r\n<li>Embolisasi</li>\r\n</ul>\r\n<ul>\r\n<li>Radioterapi</li>\r\n<li>Terapi target</li>\r\n</ul>\r\n<p>Kanker hati bisa dicegah, di antaranya dengan melakukan hubungan seks yang aman dan mengurangi konsumsi alkohol.</p>', 'kangker hti.jpg'),
(39, 'Sirosis', '<div class="post-detail-container">\r\n<div id="postContent" class="post-content">\r\n<p><strong>Sirosis adalah kondisi rusaknya organ hati akibat terbentuknya jaringan parut. Jaringan parut ini terbentuk akibat penyakit liver yang berkepanjangan, misalnya karena infeksi virus hepatitis atau kecanduan alkohol.</strong></p>\r\n<p>Infeksi virus atau konsumsi alkohol yang berlebihan dapat mencederai hati secara perlahan. Organ hati akan memperbaiki cedera tersebut dengan membentuk jaringan parut. Jika kerusakan terus berlanjut, jaringan parut yang terbentuk akan semakin banyak dan mengganggu fungsi hati.</p>\r\n<p><img class="alignnone size-full wp-image-15862" src="https://res.cloudinary.com/dk0z4ums3/image/upload/v1538354394/attached_image/sirosis-alodokter.jpg" alt="Sirosis-Alodokter" width="494" height="329" /></p>\r\n<p>Bila terjadi selama bertahun-tahun, sirosis bisa menyebabkan gagal hati, sehingga hati tidak lagi berfungsi dengan baik. Namun jika penyebabnya diobati, perkembangan sirosis dapat dihentikan atau diperlambat.</p>\r\n<h3><strong>Gejala Sirosis</strong></h3>\r\n<p>Sirosis pada awalnya tidak menimbulkan gejala. Tetapi ketika kerusakan hati makin parah, penderita akan mengalami lemas, mual, muntah, dan penurunan nafsu makan. Segera ke dokter bila muncul gejala:</p>\r\n<ul>\r\n<li>Kulit dan bagian putih mata menguning</li>\r\n<li><a href="https://www.alodokter.com/muntah-darah">Muntah darah</a></li>\r\n<li>Perut membesar</li>\r\n</ul>\r\n<h3><strong>Penyebab Sirosis</strong></h3>\r\n<p>Sirosis terjadi akibat kerusakan hati jangka panjang, yang dapat dipicu oleh beberapa faktor berikut:</p>\r\n<ul>\r\n<li>Infeksi virus hepatitis B dan <a href="https://www.alodokter.com/hepatitis-c">hepatitis C</a></li>\r\n<li>Konsumsi minuman beralkohol secara berlebihan</li>\r\n<li>Berat badan berlebih</li>\r\n</ul>\r\n<h3><strong>Diagnosis Sirosis</strong></h3>\r\n<p>Dokter dapat menentukan seseorang menderita sirosis dengan mengamati perubahan pada tubuh pasien. Namun untuk lebih memastikannya, dokter akan menjalankan tes darah, uji pencitraan, atau mengambil sampel jaringan dari hati.</p>\r\n<h3><strong>Pengobatan Sirosis</strong></h3>\r\n<p>Pengobatan sirosis bertujuan untuk mencegah kerusakan lebih lanjut dan meredakan gejala yang timbul. Jika organ hati sudah tidak bisa berfungsi, penderita perlu menjalani <a href="https://www.alodokter.com/ketahui-tahap-tahap-prosedur-transplantasi-hati">transplantasi hati</a>, yaitu mengganti organ hati yang rusak dengan organ hati yang sehat dari pendonor.</p>\r\n<h3><strong>Pencegahan Sirosis</strong></h3>\r\n<p>Sirosis dapat dicegah dengan menghindari penyebabnya, antara lain dengan tidak berbagi penggunaan jarum suntik, menerapkan aktivitas seksual yang aman, dan membatasi konsumsi minuman beralkohol.</p>\r\n<p>Mempertahankan berat badan ideal dengan berolahraga rutin, dan konsumsi makanan sehat serta bergizi seimbang juga perlu dilakukan. Selain itu, penting untuk melakukan <a href="https://www.alodokter.com/vaksin-hepatitis-b">vaksinasi hepatitis B</a> sesuai saran dari dokter.</p>\r\n</div>\r\n</div>', 'Sirosis.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

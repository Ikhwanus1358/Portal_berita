-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 05:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_admin`, `nama`, `username`, `password`, `email`, `role`) VALUES
(1, 'Administrator', 'admin', '1234', 'admin.kasep@gmail.com', 'admin'),
(4, 'Rezza Ramdhani', 'rezzarn15', '1234', 'rezzaramdhanin@gmail.com', 'penulis'),
(13, 'agus gusti', 'agus123', 'asd', 'aquabotol015@gmail.com', 'penulis');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `ket` text NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `view_num` int(11) NOT NULL,
  `terbit` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `id_kat`, `isi`, `gambar`, `ket`, `hari`, `tanggal`, `id_admin`, `view_num`, `terbit`) VALUES
(1, 'Disebut Tukang Diving, Klopp Bela Mohamed Salah', 2, '<p><strong>Jakarta: </strong>Pelatih Liverpool Juergen Klopp membela ujung tombaknya Mohamed Salah, dari kritikan yang dilontarkan pelatih Cardiff City Neil Warnock. Klopp menegaskan, Salah jelas dilanggar oleh pemain Cardiff City, dan penyerang asal Mesir itu tidak melakukan diving seperti yang dituduhkan oleh Neil Warnock.<br />\r\n<br />\r\n&quot;Tidak diragukan lagi itu jelas penalti. Morisson (pemain Cardiff) jelas memegangi dan menahan pergerakan Salah sebanyak lima atau enam kali,&quot; ujarnya usai pertandingan di Stadion Cardiff City, Ahad (21/04) malam WIB.<br />\r\n<br />\r\nDalam pertandingan tersebut, Cardiff bisa menahan imbang Liverpool di babak pertama. Namun, dibabak kedua, Georginio Wijnaldum memecah kebuntuan lewat golnya memanfaatkan sepak pojok. Wasit yang memimpin pertandingan, Martin Atkinson, kemudian memberikan hadiah penalti untuk Liverpool setelah pemain Cardiff Morrison melakukan pelanggaran terhadap Salah. Milner yang menjadi eksekutor sukses menjalankan tugasnya, Liverpool pun menang dengan skor 2-0.<br />\r\n<br />\r\nKlopp pun memuji performa pasukannya dalam laga melawan Cardiff. Klopp menyebut pertandingan itu bisa saja menjadi &quot;kulit pisang&quot; yang membuat the Reds tergelincir dalam perburuan gelar juara. Pelatih asal Jerman itu juga mengeluhkan keringnya lapangan di Stadion Cardiff, sehingga permainan pasukannya kurang berkembang.<br />\r\n<br />\r\n&quot;Cuaca berubah dan membuat pertandingan menjadi lebih intens. Kami tahu kami harus tetap sabar dan melakukan hal dengan benar. Lapangan sangat kering, sehingga umpan tidak mudah dilakukan. Namun anak-anak tidak frustasi, kami tahu jika kami terus berusaha maka kami memiliki peluang (untuk jadi juara),&quot; katanya.<br />\r\n<br />\r\n&quot;Sikap mereka luar biasa dan ini musim yang sulit tetapi juga sangat positif,&quot; ucapnya.<br />\r\n<br />\r\nSebelumnya, pelatih Cardiff City Neil Warnock tidak terima wasit memberikan hadiah penalti untuk Liverpool, dalam pertandingan pekan ke-35 Liga Primer Inggris, Ahad (22/4) malam WIB, yang berakhir untuk kemenangan the Reds dengan skor 2-0. Warnock pun menyebut Mohamed Salah tukang diving yang hebat.<br />\r\n<br />\r\nWarnock menilai, timnya tak pantas menerima hukuman penalti. Sebab, ia menilai Salah sengaja menjatuhkan diri ke tanah, dan seolah-olah dirinya dilanggar oleh pemain Cardiff Sean Morrison di dalam kotak penalti.<br />\r\n<br />\r\nMeski dalam tayangan ulang, jelas terlihat Morrison memegangi badan Mohamed Salah, saat keduanya berduel memperebutkan bola, namun Warnock tetap tidak terima timnya kalah 0-2 atas Liverpool di kandang sendiri. <strong>(republika)</strong></p>\r\n', 'Disebut_Tukang_Diving__Klopp_Bela_Mohamed_Salah.jpg', 'Pelatih Liverpool', 'Sabtu', '2019-04-23 09:44:05', 1, 4, '1'),
(2, 'Jutaan UMKM Butuh Pendanaan Syariah', 1, '<p><b>Jakarta: </b>Jutaan usaha mikro, kecil, dan menengah (UMKM) membutuhkan pendanaan syariah. Permodalan berbasis sistem syariah dinilai menjadi model pembiayaan yang tepat. Pengamat Ekonomi Syaiah dari Sekolah Tinggi Ekonomi Islam SEBI, Azis Budi Setiawan mengatakan, kebutuhan akses keuangan syariah terhadap keuangan syariah sejatinya cukup besar.<br><br>Namun, banyak yang tidak dapat mengakses karena UMKM tersebut dinilai belum bankable. “Keuangan syariah yang paling mendasar dan dituntut kepada UMKM yaitu syarat-syarat yang bankable. UMKM bisa masuk kalau sudah memenuhi aspek legalitas, tata kelola usaha, masa berjalan usaha, dan berbagai syarat lainnya yang masih dianggap menyulit UMKM,” kata Azis kepada Republika.co.id, Ahad (21/4).<br><br>Azis mengatakan, untuk memenuhi berbagai persyaratan yang diberikan perbankan syariah itu, setidaknya pelaku UMKM membutuhkan seorang akuntan yang dapat membimbing. Namun, Azis mengakui, di Indonesia tidak banyak akuntan yang mau memberikan jasa untuk membimbing UMKM. Menurut dia, hal itu menjadi tantangan tersendiri bagi UMKM.<br><br>Meski demikian, terlepas dari tantangan yang ada, Azis mengatakan, beberapa pelaku industri keuangan syariah, khususnya bank mulai menerapkan sistem yang meniadakan berbagai persyaratan tersebut. Hal itu diimbangi dengan pemberian pinjaman yang lebih kecil di bawah kategori mikro, yakni sekitar Rp 2-5 juta.<br><br>Azis mengatakan, setidaknya saat ini terdapat sekitar 7 juta nasabah yang menjadi bagian dari program tersebut. “Saya kira ini terobosan yang baik dan bisa menjadi benchmark bagi lembagan keuangan lain baik bank maupun non bank yang sebelumnya menganggap sistem ini risiko menjadi potensi profit,” ujar dia.<br><br>Di satu sisi, dengan jumlah pinjaman yang lebih kecil, Azis mengatakan, tingkat kredit macet juga tergolong rendah. Oleh karena itu, pihaknya berharap pemerintah bisa menciptakan iklim yang kondusif agar pola-pola baru tersebut bsia terus berkembang dan menopang kebutuhan UMKM.<br><br>Sebab, kata Azis, jika baru sekitar 7 juta nasabah yang terlayani, maka terdapat 53 juta pelaku UMKM lainnya yang belum terlayani dan membutuhkan pendanaan syariah tanpa syarat yang begitu rumit. “Artinya ini masih besar dan masih harus dipikirkan lagi ke depan untuk memberikan akses pendanaan bagi UMKM lainnya. Makanya lembaga keuangan syariah harus terus bertumbuh,” katanya. <b>(republika)</b><br></p>', 'Jutaan_UMKM_Butuh_Pendanaan_Syariah.jpg', 'ilustrasi', 'Kamis', '2019-04-23 07:12:00', 1, 2, '1'),
(4, 'KEIN: Era Industri 4.1 Buka Peluang Bagi UMKM', 1, '<p><strong>Jakarta:</strong> Komite Ekonomi dan Industri Nasional (KEIN) menilai era Industri 4.0 memberikan ruang besar bagi usaha mikro, kecil, dan menengah (UMKM) untuk meningkatkan skala usahanya. Setidaknya melalui era ini hanya usaha yang menerapkan digitalisasi yang akan mampu berkompetisi secara efisien dan efektif sehingga menang dalam persaingan usaha.<br />\r\n<br />\r\nKetua KEIN Soetrisno Bachir mengatakan era Industri 4.0 menuntut pelaku UMKM harus memahami dan menguasai digitalisasi di berbagai sektor industri tanpa terkecuali. &ldquo;Penguasaan ini menjadi penting agar usahanya beroperasi secara efektif dan efisien, serta produknya berkualitas baik dan bernilai harga bersaing,&rdquo; ujarnya dalam keterangan tulis, Ahad (21/4).<br />\r\n<br />\r\nSebagai contoh, kata dia, beberapa waktu lalu ada badan usaha milik negara (BUMN) yang menciptakan aplikasi bagi pelaku usaha pertanian. Layanan dalam bentuk aplikasi ini akan memandu pemangku kepentingan (stakeholders) sektor pertanian apa yang harus dilakukan saat pra tanam, tanam, pascapanen, dan panen.<br />\r\n<br />\r\n&quot;Dengan mengetahui situasi masing-masing tahapan akan menjadi tahu apa yang boleh dan tidak dikerjakannya sehingga produksi makin efisien dan menghasilkan produk pertanian berkualitas,&quot; ucapnya.<br />\r\n<br />\r\nMenurutnya pelaku usaha bukan hanya sektor pertanian saja yang harus masuk digitalisasi, tetapi seluruh sektor. Namun, dia mengingatkan pada pelaku usaha yang berbasis industri agar jangan sampai beralih menjadi pedagang.<br />\r\n<br />\r\n&quot;Memang digitalisasi mendatangkan keuntungan signifikan bagi pedagang, tapi janganlah beralih dari industri menjadi pedagang,&quot; ungkapnya.<br />\r\n<br />\r\nDia menambahkan digitalisasi seharusnya semakin memperkokoh industri. Indonesia membutuhkan banyak UMKM yang menerjuni berbagai macam industri.<br />\r\n<br />\r\n&ldquo;Pada umumnya, UMKM banyak bergelut pada industri makanan dan minuman, fashion, kerajinan tangan, otomotif, elektronik, dan sebagainya,&rdquo; ucapnya. <strong>(republika)</strong></p>\r\n', 'KEIN__Era_Industri_4_1_Buka_Peluang_Bagi_UMKM.jpg', '(Ilustrasi)', 'Senin', '2019-04-23 05:16:00', 1, 5, '1'),
(6, 'Guardiola: Klopp Ubah Liverpool Jadi Tim Terbaik', 2, '<p><b>Jakarta:</b> Pelatih Manchester City Josep Guardiola mengingatkan pasukannya agar tidak kehilangan satu poin pun di kompetisi Liga Primer Inggris. Sebab, Guardiola mengatakan pada musim ini City bersaing dengan Liverpool, yang berbeda dari musim-musim sebelumnya.<br><br>Guardiola menyebut, Liverpool dibawah asuhan Juergen Klopp saat ini adalah Liverpool terbaik sepanjang masa. Meski begitu, Guardiola menyebut timnya masih punya peluang besar untuk kembali menjadi juara Liga Primer Inggris.<br><br>\"Gelar itu masih ada di tangan kami,\" ujarnya seperti dikutip dari squawka.com.<br><br>Guardiola menegaskan, dirinya dan para pemain Manchester City akan berjuang hingga akhir untuk memenangkan persaingan dengan Liverpool. \"Kami akan melihat seberapa jauh kita (Manchester City) bisa mendapatkan,\" ucapnya.<br><br>\"Kami berjuang dengan Liverpool terbaik yang pernah ada, salah satu tim terbaik yang pernah saya lihat dalam hidup saya,\" katanya menambahkan.<br><br>Untuk itu, Guardiola menegaskan Manchester City tidak boleh kehilangan satu poin pun di pertandingan-pertandingan akhir musim ini. Manchester City akan menjalani derby berat melawan Manchester United pada tengah pekan ini. Guardiola menyebut klubnya harus bisa mengalahkan sang tetangga, agar bisa merebut trofi Liga Primer Inggris.<br><br>\"Pertandingan itu sangat penting untuk memenangi persaingan Liga Primer Inggris. Kami tahu kami tidak boleh kehilangan poin.&nbsp; Kami telah bermain untuk Liga Premier setiap tiga hari selama 10 bulan. Anda bisa merasakan tekanannya,\" katanya.<br><br>Liverpool kembali menggeser Manchester City dari puncak klasemen sementara Liga Primer Inggris, usai menang 2-0 atas Cardiff City dalam pertandingan pada Ahad (21/4) malam. City harus mengalahkan Manchester United dalam pertandingan di Old Trafford pada Kamis (25/4) dini hari mendatang. Jika kalah, peluang City untuk merebut trofi Liga Primer Inggris akan sulit.<b> (Republika)</b><br></p>', 'Guardiola__Klopp_Ubah_Liverpool_Jadi_Tim_Terbaik_4.jpg', 'pelatih liverpool', 'Monday', '2021-12-20 20:04:27', 1, 0, '1'),
(10, 'Tempuh 13 Jam Buat Nonton Spiderman: No Way Home, Endingnya Malah Apes', 3, '<p><strong>SIXNews.com</strong> - viral nasib yang dialami lelaki aceh dan kawan-kawannya yang rela menempuh <em>13 jam perjalanan&nbsp;</em>darat untuk menonton Spiderman : No Way Home, tapi dibatalkan.</p>\r\n\r\n<p>Mengutip&nbsp;Worldometers, Senin (20/12/2021), lelaki yang bernama Rifki Aufa tersebut membeli 5 tiket film bersama kawan-kawannya sejak 10 Desember, dan dijadwalkan film akan tayang pada 15 Desember.&nbsp;</p>\r\n', 'spiderman.jpg', 'Gambar : Spider-Man : No Way Home (ilustrasi)', 'Tuesday', '2021-12-21 07:59:39', 1, 0, '0'),
(11, 'Pendapatan Spider-Man: No Way Home Pecahkan Rekor', 3, '<p><strong>SIXNews, Bandung</strong>&nbsp;- Pendapatan domestik&nbsp;<em>Spider-Man: No Way Home</em>&nbsp;pada pekan pertama penayangannya memecahkan rekor yang rilis pada era pandemi Covid-19. Film meraup 253 juta dolar AS (sekitar Rp 3,64 triliun) dari 4.336 bioskop di Amerika Utara.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sepanjang perilisan pada masa pandemi, belum ada film lain dengan pendapatan pekan pertama sebesar itu di Amerika. Sinema&nbsp;<em>Venom: Let There Be Carnage</em>&nbsp;hanya mendapat 90 juta dolar AS (setara Rp 1,29 triliun) pada pekan pertamanya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Penghasilan pekan pertama&nbsp;<em>Spider-Man: No Way Home</em>&nbsp;di luar Amerika juga cukup bombastis. Dengan<a href=\"https://republika.co.id/tag/ancaman-varian-covid19\">&nbsp;ancaman varian Covid-19&nbsp;</a>omicron dan pembatasan di sejumlah negara Eropa, film meraup 334,2 juta dolar AS (Rp 4,81 triliun) dari 60 wilayah.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Angka tersebut menjadikan sinema besutan Sony ini sebagai film dengan pendapatan pembukaan terbesar ketiga. Posisi nomor satu ditempati&nbsp;<em>Avengers: Endgame</em>&nbsp;dengan pendapatan di pekan pertama penayangan sebesar 357 juta dolar AS.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tidak mustahil&nbsp;<em>No Way Home</em>&nbsp;bisa mendekati angka pembukaan&nbsp;<em>Endgame</em>&nbsp;jika film tidak diputar di tengah pandemi. Film pun sudah mengungguli judul-judul besar seperti&nbsp;<em>Star Wars: The Force Awakens</em>&nbsp;(247 juta dolar AS) dan&nbsp;<em>Jurrasic World</em>&nbsp;(208 juta dolar AS).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Spider-Man: No Way Home</em>&nbsp;bahkan melebihi gabungan pendapatan pekan pertama film pendahulunya,&nbsp;<em>Spider-Man: Homecoming</em>&nbsp;dan&nbsp;<em>Spider-Man: Far From Home</em>. Pada debut penayangan, masing-masing menghasilkan 117 juta dan 92 juta dolar AS.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Perbandingan lain, pendapatan pekan pertama&nbsp;<em>No Way Home</em>&nbsp;sebesar 2,5 kali film pertama&nbsp;<em>Spider-Man</em>&nbsp;yang dibintangi Tobey Maguire. Belum memperhitungkan inflasi, kala itu film versi Maguire mengantongi 114,8 juta dolar AS pada pekan awal penayangan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sementara, penghasilan pekan pertama film-film lain yang sudah tayang di bioskop cukup jauh dari&nbsp;<em>No Way Home</em>. Deretan judulnya antara lain&nbsp;<em>Encanto</em>&nbsp;dari Disney (6,52 juta dolar AS),&nbsp;<em>West Side Story</em>&nbsp;(3,41 juta dolar AS),&nbsp;<em>Ghostbusters: Afterlife</em>&nbsp;(3,4 juta dolar AS), serta&nbsp;<em>Nightmare Alley</em>&nbsp;arahan Guillermo del Toro (2,95 juta dolar AS).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kesuksesan komersial&nbsp;<em>No Way Home</em>&nbsp;dibarengi penerimaan positif dari kritikus maupun penonton awam.&nbsp;<em>No Way Home</em>&nbsp;merupakan satu dari sedikit film pahlawan super yang mendapat nilai A+ via CinemaScore, selain skor 9,1 di Metacritic, dikutip dari laman&nbsp;<em>Collider</em>, Senin (20/12) waktu setempat.</p>\r\n', 'download.jpg', 'Pendapatan domestik Spider-Man: No Way Home pada pekan pertama penayangannya memecahkan rekor film yang rilis pada era pandemi Covid-19 (ilustrasi).', 'Tuesday', '2021-12-21 08:06:07', 1, 0, '1'),
(15, 'Bukalapak dan Microsoft Luncurkan Platform Belajar Bisnis Online', 22, '<p><strong>SIXNews.com -&nbsp;&nbsp;</strong><a href=\"https://www.suara.com/tag/bukalapak\">Bukalapak</a>&nbsp;dan&nbsp;<a href=\"https://www.suara.com/tag/microsoft\">Microsoft</a>&nbsp;resmi meluncurkan Akademi Jagoan by Bukalapak. Ini adalah platform e-learning untuk para pelaku UMKM demi meningkatkan literasi digital dan kemampuan pengelolaan bisnis.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.suara.com/tag/ceo-bukalapak\">CEO Bukalapak</a>, Rachmat Kaimuddin mengungkapkan, saat ini peran internet dan teknologi dalam kehidupan sehari-hari kian besar. Kemampuan digital dalam kehidupan sehari-hari akan sama pentingnya dengan kemampuan dasar seperti membaca, menulis, dan berhitung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ldquo;Platform ini hadir untuk memberikan kesempatan pada semua pelaku usaha dan masyarakat luas untuk mempelajari keterampilan digital, dan untuk menaik kelaskan bisnisnya, sehingga dapat menikmati kehidupan yang lebih sejahtera&rdquo;, ujarnya dalam rilis yang diterima, Senin (20/12/2021).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Melalui platform ini, Bukalapak dan Microsoft menyediakan berbagai materi pembelajaran seperti kemampuan dasar terkait penggunaan komputer, membuat konten digital, hingga tips dan trik mengelola warung serta lapak online agar makin optimal</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Semua materi di Akademi Jagoan by Bukalapak juga dapat diakses secara gratis oleh lebih dari 17 juta Pelapak dan Mitra Bukalapak, serta semua pelaku usaha di seluruh Indonesia. Setiap menyelesaikan suatu materi, mereka juga akan memperoleh sertifikat elektronik dari Bukalapak dan Microsoft.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Linda Dwiyanti selaku Chief Partnership Officer Microsoft Indonesia mengatakan, penting bagi pemilik usaha untuk mengadopsi teknologi agar dapat menyesuaikan diri dan terus bertumbuh sesuai kebutuhan pasar dan pelanggan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Linda Dwiyanti selaku Chief Partnership Officer Microsoft Indonesia mengatakan, penting bagi pemilik usaha untuk mengadopsi teknologi agar dapat menyesuaikan diri dan terus bertumbuh sesuai kebutuhan pasar dan pelanggan.</p>\r\n\r\n<p>Data dari Kementerian Koordinator Bidang Perekonomian Republik Indonesia menyatakan, saat ini Indonesia memiliki lebih dari 64 juta UMKM yang menyerap kurang lebih 97 persen tenaga kerja serta berkontribusi lebih dari 60 persen terhadap Produk Domestik Bruto (PDB).</p>\r\n\r\n<p>Presiden Komisaris Bukalapak, Bambang Brodjonegoro menyebut, angka itu menunjukkan potensi yang sangat besar dari UMKM. Oleh karena itu, perlu gotong-royong untuk membantu memberdayakan UMKM di tanah air.</p>\r\n', '25796-direktur-utama-bukalapak-rachmat-kaimuddin-dalam-konfrensi-pers-virtualny-jumat-682021.jpg', 'Direktur Utama Bukalapak Rachmat Kaimuddin. [Tangkapan layar]', 'Tuesday', '2021-12-21 18:32:31', 4, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `alias` varchar(25) NOT NULL,
  `terbit` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `kategori`, `alias`, `terbit`) VALUES
(1, 'Ekonomi', 'ekonomi', '1'),
(2, 'Olahraga', 'olahraga', '1'),
(3, 'Hiburan', 'hiburan', '1'),
(17, 'Politik', 'politik', '1'),
(22, 'Teknologi', 'teknologi', '1'),
(29, 'game mobile', 'game_mobile', '0');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komen`, `komentar`, `id`, `id_member`) VALUES
(1, 'mantap', 15, 1),
(2, 'Hmmm menarik...', 15, 3),
(3, 'gak heran sih spiderman no way home ini emang bagus ', 11, 2),
(8, 'saya suka spiderman', 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jenis_kelamin` enum('l','p') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `email`, `password`, `no_telp`, `jenis_kelamin`) VALUES
(1, 'Budi Setiawan', 'budi.setiawan@gmail.com', '1234', '085758664223', 'l'),
(2, 'Asep Ahmad ', 'asepganteng123@gmail.com', '1234', '087332223345', 'l'),
(3, 'Santi Susanti', 'santicantik@gmail.com', '1234', '085443345678', 'p'),
(4, 'Rezza Ramdhani', 'aquabotol015@gmail.com', '1234', '087887689113', 'l');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_ibfk_1` (`id_kat`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `id` (`id`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `administrator` (`id_admin`) ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `berita` (`id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

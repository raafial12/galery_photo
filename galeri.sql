-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2024 pada 08.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggalbuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggalbuat`, `userid`) VALUES
(14, 'anime', 'seputar anime', '2024-03-04', 9),
(15, 'kartun', 'seputar kartun', '2024-03-04', 9),
(17, 'wallpaper', 'wallpaper', '2024-03-05', 9),
(18, 'Case Diagram', 'Seputar Diagram', '2024-03-05', 10),
(19, 'tugas', 'foto tugas', '2024-03-06', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(49, 'Kimi no nawa', 'Meteor', '2024-03-01', '1474244286-1533136989-Screenshot 2023-08-05 230813.png', 14, 9),
(50, 'poneglyph', 'One Piece', '2024-03-06', '1639753894-wallhaven-nkjlr7.jpg', 14, 9),
(51, 'Kucing', 'art kucing', '2024-03-06', '13079848-wallhaven-qzmlj5.png', 15, 9),
(52, 'bunga lili', 'wallpaper bunga lili', '2024-03-06', '1627816781-70fd60a5-944c-464a-81ee-664cbaa57b59.jpg', 17, 9),
(53, 'Use Case', 'Use Case Galery', '2024-03-06', '1342636006-Screenshot 2024-02-28 090205.png', 18, 10),
(54, 'Tugas ujikom', 'Landing Page User', '2024-03-06', '1048204787-Screenshot 2024-03-06 113507.png', 19, 8),
(58, 'Tugas ujikom', 'Landing Page guest', '2024-03-06', '716863773-Screenshot 2024-03-06 114359.png', 19, 8),
(59, 'Tugas ujikom', 'Halaman Login', '2024-03-06', '670056226-Screenshot 2024-03-06 114413.png', 19, 8),
(60, 'Tugas ujikom', 'Halaman Register', '2024-03-06', '1673519109-Screenshot 2024-03-06 114428.png', 19, 8),
(61, 'Tidur', 'nuju bobo', '2024-03-06', '2043046419-Screenshot 2023-09-15 231837.png', 14, 9),
(64, 'anime', 'Blue Eye', '2024-03-06', '1075704645-wallhaven-dp3yg3.jpg', 17, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(30, 49, 10, 'lari bang ada meteor', '2024-03-06'),
(32, 54, 8, 'bagus kann', '2024-03-06'),
(33, 51, 8, 'Lucu', '2024-03-06'),
(34, 50, 8, 'Apa ini', '2024-03-06'),
(35, 49, 9, 'siap bang', '2024-03-06'),
(36, 53, 10, 'contoh use case diagram', '2024-03-06'),
(38, 54, 9, 'ehemm', '2024-03-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(532, 49, 9, '2024-03-06'),
(533, 50, 9, '2024-03-06'),
(534, 51, 9, '2024-03-06'),
(535, 52, 9, '2024-03-06'),
(536, 53, 10, '2024-03-06'),
(537, 49, 10, '2024-03-06'),
(538, 50, 10, '2024-03-06'),
(540, 52, 10, '2024-03-06'),
(541, 49, 8, '2024-03-06'),
(542, 50, 8, '2024-03-06'),
(544, 51, 8, '2024-03-06'),
(547, 54, 8, '2024-03-06'),
(551, 53, 8, '2024-03-06'),
(552, 58, 8, '2024-03-06'),
(553, 59, 8, '2024-03-06'),
(554, 60, 8, '2024-03-06'),
(555, 52, 8, '2024-03-06'),
(559, 51, 10, '2024-03-06'),
(560, 59, 10, '2024-03-06'),
(565, 58, 9, '2024-03-07'),
(573, 54, 9, '2024-03-07'),
(574, 59, 9, '2024-03-07'),
(576, 60, 9, '2024-03-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(8, 'rivaldo', '$2y$10$zph6mwxc6K37Hj2CT/eiHe0q5T2fNiPT3MtS6/cxImpsZqDeiq2y6', 'uiprojecta@gmail.com', 'Rivaldo', 'Bandung'),
(9, 'raafi', '$2y$10$3IKFFGgd.k100IWykhRwIOVQ2Dlvd0yIrA/Rgq/rMh0D3qujE97Km', 'qwe@gmail.com', 'raafi alfarizqi', 'cileunyi'),
(10, 'ujanaja', '$2y$10$x1VwKzMZCDL7y0hFsMlPu.oLBQjEyD.n.PP/jdWbR53G/bNs0q2wi', 'ujan@gmail.com', 'Fauzan', 'Rancamaung'),
(14, 'sena', '$2y$10$N6PoRQFHHmJ4CLGLx40hreQULh/mZp4R9Ivhf1ssupDSnmygYz4O6', 'qwe@gmail.com', 'sena', 'dimana');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

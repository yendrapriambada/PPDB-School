-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2021 pada 12.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswabaru`
--

CREATE TABLE `siswabaru` (
  `No_Pendaftaran` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `asal_sekolah` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `jurusan` varchar(6) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswabaru`
--

INSERT INTO `siswabaru` (`No_Pendaftaran`, `nama`, `nisn`, `tgl_lahir`, `gender`, `asal_sekolah`, `alamat`, `agama`, `email`, `no_telp`, `foto`, `tahun_ajaran`, `jurusan`, `id_akun`) VALUES
(1003, 'Itadori Putra', '32343443', '2021-03-31', 'Laki-laki', 'SMPN 5 Bandung', 'bandung', 'Islam', 'putraitadori@gmail.com', '08128737873', '607ff8d11074f.png', '2021/2022', 'Bahasa', 1),
(1004, 'Warda Azzahra', '3989896', '2021-04-03', 'Perempuan', 'SMPN 1 Angkasa', 'Bekasi', 'Islam', 'wardazzahra635@gmail.com', '08128737873', '607ff97c773a9.jpg', '2021/2022', 'Bahasa', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'putra', 'putraitadori@gmail.com', '$2y$10$GLKDPDd9umdPbyZ74fUsMOJlXsTcOBkUMOtuMgKOSdOZyHzfL.u66'),
(2, 'warda', 'wardazzahra635@gmail.com', '$2y$10$oB9cavwQhpzJZdSh6HS4Ae.qYTSZ9WoRRBpJ.mAKNvR/W0BplEYVu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswabaru`
--
ALTER TABLE `siswabaru`
  ADD PRIMARY KEY (`No_Pendaftaran`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `siswabaru`
--
ALTER TABLE `siswabaru`
  ADD CONSTRAINT `siswabaru_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

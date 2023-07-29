-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2023 pada 09.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpbs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayarbebas`
--

CREATE TABLE `tb_bayarbebas` (
  `id_bayarBebas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `id_bebas` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bayarbebas`
--

INSERT INTO `tb_bayarbebas` (`id_bayarBebas`, `id_siswa`, `nisn`, `id_bebas`, `tanggal_bayar`, `jumlah_bayar`) VALUES
(11, 5, '5666609', 3, '2023-06-03', 30000),
(12, 5, '5666609', 1, '2023-06-23', 350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayarspp`
--

CREATE TABLE `tb_bayarspp` (
  `id_pembayaranSpp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `id_tahunAjar` int(11) NOT NULL,
  `tahunBayarspp` int(11) NOT NULL,
  `bulanbayarSpp` varchar(50) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlahBayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bayarspp`
--

INSERT INTO `tb_bayarspp` (`id_pembayaranSpp`, `id_siswa`, `nisn`, `tanggal_bayar`, `id_tahunAjar`, `tahunBayarspp`, `bulanbayarSpp`, `id_spp`, `jumlahBayar`) VALUES
(17, 5, '5666609', '2023-06-02', 1, 2021, 'Oktober', 1, 55000),
(18, 6, '0002309098', '2023-06-08', 1, 2023, 'Maret', 1, 55000),
(19, 6, '0002309098', '2023-06-09', 1, 2022, 'Juni', 1, 55000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bebas`
--

CREATE TABLE `tb_bebas` (
  `id_bebas` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `nama_pembayaran` varchar(100) NOT NULL,
  `nominal_bebas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bebas`
--

INSERT INTO `tb_bebas` (`id_bebas`, `tahun`, `nama_pembayaran`, `nominal_bebas`) VALUES
(1, '2023', 'Kartu Pelajar', 350000),
(3, '2022', 'Ulangan Tengah Semester', 30000),
(4, '2023', 'Perakerin', 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `singkatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`, `singkatan`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'RPL'),
(2, 'Perbankan Syari\'ah', 'PBKS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `keterangan`) VALUES
(4, 'X', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pos`
--

CREATE TABLE `tb_pos` (
  `id_pos` int(11) NOT NULL,
  `nama_pos` varchar(60) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pos`
--

INSERT INTO `tb_pos` (`id_pos`, `nama_pos`, `keterangan`) VALUES
(1, 'SPP', 'SPP Tahun 2022'),
(2, 'Seragam', 'Cicil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_seragam`
--

CREATE TABLE `tb_seragam` (
  `id_seragam` int(11) NOT NULL,
  `tahunSeragam` varchar(20) NOT NULL,
  `nominalSeragam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_seragam`
--

INSERT INTO `tb_seragam` (`id_seragam`, `tahunSeragam`, `nominalSeragam`) VALUES
(1, '2022', 200000),
(2, '2020', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(60) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nisn`, `nama_siswa`, `id_kelas`, `id_jurusan`, `id_spp`, `foto`, `no_hp`) VALUES
(5, '0002000', '5666609', 'tuti', 4, 2, 1, 'foto1685238860.png', '08999xx'),
(6, '0002000', '0002309098', 'Taufik Rahmat Hidayar', 4, 2, 1, 'foto6471f14fd3e2f.png', '08999'),
(7, '12345', '67890', 'tuti', 4, 2, 3, 'foto1685687853.png', '0876555444'),
(8, '0900020001', '0090002000', 'Ujang', 4, 1, 1, 'foto6479b49751343.PNG', '0876555444');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `id_tahunAjar` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `id_tahunAjar`, `nominal`) VALUES
(1, 1, 1500000),
(2, 1, 300000),
(3, 2, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahunajar`
--

CREATE TABLE `tb_tahunajar` (
  `id_tahunAjar` int(11) NOT NULL,
  `tahunMulai` year(4) NOT NULL,
  `tahunSelesai` year(4) NOT NULL,
  `ket` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tahunajar`
--

INSERT INTO `tb_tahunajar` (`id_tahunAjar`, `tahunMulai`, `tahunSelesai`, `ket`) VALUES
(1, 2022, 2023, 'berjalan'),
(2, 2023, 2024, 'aktif'),
(3, 2024, 2025, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `foto`) VALUES
(1, 'Taufik Rahmat Hidayat', 'taufik13', '81dc9bdb52d04dc20036dbd8313ed055', 'op.png'),
(2, 'Ujang', 'ujang12', '81dc9bdb52d04dc20036dbd8313ed055', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bayarbebas`
--
ALTER TABLE `tb_bayarbebas`
  ADD PRIMARY KEY (`id_bayarBebas`),
  ADD KEY `id_bebas` (`id_bebas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tb_bayarspp`
--
ALTER TABLE `tb_bayarspp`
  ADD PRIMARY KEY (`id_pembayaranSpp`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tb_bebas`
--
ALTER TABLE `tb_bebas`
  ADD PRIMARY KEY (`id_bebas`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_pos`
--
ALTER TABLE `tb_pos`
  ADD PRIMARY KEY (`id_pos`);

--
-- Indeks untuk tabel `tb_seragam`
--
ALTER TABLE `tb_seragam`
  ADD PRIMARY KEY (`id_seragam`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `id_tahunAjar` (`id_tahunAjar`);

--
-- Indeks untuk tabel `tb_tahunajar`
--
ALTER TABLE `tb_tahunajar`
  ADD PRIMARY KEY (`id_tahunAjar`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bayarbebas`
--
ALTER TABLE `tb_bayarbebas`
  MODIFY `id_bayarBebas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_bayarspp`
--
ALTER TABLE `tb_bayarspp`
  MODIFY `id_pembayaranSpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_bebas`
--
ALTER TABLE `tb_bebas`
  MODIFY `id_bebas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pos`
--
ALTER TABLE `tb_pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_seragam`
--
ALTER TABLE `tb_seragam`
  MODIFY `id_seragam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_tahunajar`
--
ALTER TABLE `tb_tahunajar`
  MODIFY `id_tahunAjar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bayarbebas`
--
ALTER TABLE `tb_bayarbebas`
  ADD CONSTRAINT `tb_bayarbebas_ibfk_1` FOREIGN KEY (`id_bebas`) REFERENCES `tb_bebas` (`id_bebas`);

--
-- Ketidakleluasaan untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD CONSTRAINT `tb_spp_ibfk_1` FOREIGN KEY (`id_tahunAjar`) REFERENCES `tb_tahunajar` (`id_tahunAjar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

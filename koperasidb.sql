-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2022 pada 16.09
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasidb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `Id_Anggota` varchar(15) NOT NULL,
  `NamaAnggota` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `NoHp` varchar(16) DEFAULT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `Alamat` varchar(150) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `JenisKelamin` varchar(15) DEFAULT NULL,
  `Status` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`Id_Anggota`, `NamaAnggota`, `Email`, `NoHp`, `NIP`, `Alamat`, `Photo`, `Tanggal`, `JenisKelamin`, `Status`) VALUES
('20220427742114', 'Widianto', 'widianto@gmail.com', '085718858795', '12162622', 'Perum Mandosi Permai JL. Garuda Blok I no 13 Jatiasih Bekasi', 'foto1651033470.jpg', '1989-04-14', 'Laki-Laki', 'N'),
('20220522638477', 'Anto', 'anto@gmail.com', '085782446689', '32146758907658', 'Pekayon Bekasi', 'foto1653219183.png', '2008-02-15', 'Laki-Laki', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `Id_Angsuran` varchar(50) NOT NULL DEFAULT '',
  `Id_Anggota` varchar(15) DEFAULT NULL,
  `Jumlah` int(20) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `Status` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_admin`
--

CREATE TABLE `db_admin` (
  `Id_Admin` int(15) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Bagian` varchar(50) DEFAULT NULL,
  `NoHp` varchar(16) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `JenisKelamin` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_admin`
--

INSERT INTO `db_admin` (`Id_Admin`, `Nama`, `Bagian`, `NoHp`, `Email`, `JenisKelamin`) VALUES
(44546001, 'Widianto A.Md.Kom', 'Loker 3', '085718858795', 'widi@gmail.com', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_laporan`
--

CREATE TABLE `db_laporan` (
  `Id_Laporan` varchar(50) NOT NULL DEFAULT '',
  `Id_Pengguna` varchar(15) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `Jumlah` int(20) DEFAULT NULL,
  `Total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_pengajuan`
--

CREATE TABLE `db_pengajuan` (
  `id_Pengajuan` varchar(25) NOT NULL DEFAULT '',
  `Id_Anggota` varchar(15) DEFAULT NULL,
  `Id_Pinjaman` int(11) DEFAULT NULL,
  `Id_Admin` int(15) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `Verivikasi` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_tabungan`
--

CREATE TABLE `db_tabungan` (
  `Id_Tabungan` varchar(15) NOT NULL DEFAULT '',
  `Id_Anggota` varchar(15) DEFAULT NULL,
  `Jumlah` int(25) DEFAULT NULL,
  `Id_Jenis` int(11) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pinjaman`
--

CREATE TABLE `jenis_pinjaman` (
  `Id_Jenis` int(11) NOT NULL,
  `Jumlah` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pinjaman`
--

INSERT INTO `jenis_pinjaman` (`Id_Jenis`, `Jumlah`) VALUES
(5, '1000000'),
(6, '1500000'),
(7, '2000000'),
(8, '2500000'),
(9, '3000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `Id_Simpanan` int(2) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`Id_Simpanan`, `Nama`) VALUES
(1, 'Wajib'),
(2, 'Sukarela'),
(3, 'Pokok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `Id_Pinjaman` varchar(25) NOT NULL DEFAULT '',
  `Id_Anggota` varchar(25) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Status` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`Id_Anggota`);

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`Id_Angsuran`),
  ADD KEY `Id_Anggota` (`Id_Anggota`);

--
-- Indeks untuk tabel `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indeks untuk tabel `db_laporan`
--
ALTER TABLE `db_laporan`
  ADD PRIMARY KEY (`Id_Laporan`) USING BTREE,
  ADD KEY `Id_Pengguna` (`Id_Pengguna`);

--
-- Indeks untuk tabel `db_pengajuan`
--
ALTER TABLE `db_pengajuan`
  ADD PRIMARY KEY (`id_Pengajuan`),
  ADD KEY `Id_Anggota` (`Id_Anggota`),
  ADD KEY `Id_Pinjaman` (`Id_Pinjaman`),
  ADD KEY `Id_Admin` (`Id_Admin`);

--
-- Indeks untuk tabel `db_tabungan`
--
ALTER TABLE `db_tabungan`
  ADD PRIMARY KEY (`Id_Tabungan`),
  ADD KEY `Id_Anggota` (`Id_Anggota`),
  ADD KEY `Id_Jenis` (`Id_Jenis`);

--
-- Indeks untuk tabel `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  ADD PRIMARY KEY (`Id_Jenis`);

--
-- Indeks untuk tabel `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`Id_Simpanan`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`Id_Pinjaman`) USING BTREE,
  ADD KEY `Id_Anggota` (`Id_Anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  MODIFY `Id_Jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  MODIFY `Id_Simpanan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `FK_angsuran_anggota` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`);

--
-- Ketidakleluasaan untuk tabel `db_laporan`
--
ALTER TABLE `db_laporan`
  ADD CONSTRAINT `FK_db_akses_anggota` FOREIGN KEY (`Id_Pengguna`) REFERENCES `anggota` (`Id_Anggota`);

--
-- Ketidakleluasaan untuk tabel `db_pengajuan`
--
ALTER TABLE `db_pengajuan`
  ADD CONSTRAINT `FK_db_pengajuan_anggota` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`),
  ADD CONSTRAINT `FK_db_pengajuan_db_admin` FOREIGN KEY (`Id_Admin`) REFERENCES `db_admin` (`Id_Admin`),
  ADD CONSTRAINT `FK_db_pengajuan_jenis_pijaman` FOREIGN KEY (`Id_Pinjaman`) REFERENCES `jenis_pinjaman` (`Id_Jenis`);

--
-- Ketidakleluasaan untuk tabel `db_tabungan`
--
ALTER TABLE `db_tabungan`
  ADD CONSTRAINT `FK_db_tabungan_anggota` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`),
  ADD CONSTRAINT `FK_db_tabungan_jenis_simpanan` FOREIGN KEY (`Id_Jenis`) REFERENCES `jenis_simpanan` (`Id_Simpanan`);

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `FK_pinjaman_anggota` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2024 pada 13.46
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi_updated`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `positions`
--

CREATE TABLE `positions` (
  `id_positions` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `positions`
--

INSERT INTO `positions` (`id_positions`, `position_name`) VALUES
(1, 'Dokter'),
(2, 'Perawat '),
(3, 'Apoteker'),
(4, 'Akuntan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presents`
--

CREATE TABLE `presents` (
  `id_presents` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `information` char(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presents`
--

INSERT INTO `presents` (`id_presents`, `user_id`, `date`, `time`, `information`, `status`) VALUES
(36, 19, '2020-08-27', '09:00:32', 'M', 1),
(37, 19, '2020-08-27', '09:00:35', 'I', 2),
(38, 19, '2020-08-27', '09:00:38', 'S', 2),
(39, 33, '2023-11-13', '11:25:06', 'M', 0),
(40, 28, '2024-03-24', '03:58:56', 'M', 1),
(41, 23, '2024-03-29', '23:37:14', 'M', 1),
(42, 44, '2024-05-05', '01:54:44', 'M', 1),
(43, 21, '2024-05-05', '01:59:50', 'I', 1),
(44, 23, '2024-05-05', '02:00:07', 'S', 1),
(45, 42, '2024-05-05', '02:00:29', 'M', 1),
(46, 46, '2024-05-05', '02:00:50', 'M', 1),
(47, 39, '2024-05-05', '02:11:27', 'S', 1),
(48, 39, '2024-05-15', '02:49:17', 'M', 1),
(49, 21, '2024-05-17', '07:35:21', 'M', 1),
(50, 23, '2024-05-17', '07:35:38', 'M', 1),
(51, 42, '2024-05-17', '07:35:54', 'M', 1),
(52, 39, '2024-05-22', '17:44:25', 'M', 1),
(53, 52, '2024-06-05', '18:54:26', 'M', 2),
(54, 52, '2024-06-05', '18:54:49', 'M', 1),
(55, 52, '2024-06-05', '18:54:52', 'I', 1),
(56, 53, '2024-06-10', '15:08:44', 'M', 0),
(57, 53, '2024-06-25', '16:15:16', 'M', 1),
(58, 39, '2024-06-25', '16:20:46', 'M', 1),
(59, 53, '2024-07-04', '16:26:17', 'M', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_roles`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `no_employee` char(18) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `no_employee`, `name`, `gender`, `email`, `photo`, `password`, `role_id`, `position_id`, `date_created`) VALUES
(1, '', 'Administrator', '', 'admin@gmail.com', NULL, '$2y$10$XcKdUshhVN4I39Wazc01Rebi8OLjKWFOrddD15VgQo1iMMSw8tfYO', 1, 0, '2020-04-14'),
(21, '198608252017052002', 'dr. Harlyanita', 'P', 'harlyanita@gmail.com', 'f19411a58557d160f24a844c3d9b2cd7.jpg', '$2y$10$Wiu/isQvS2UxdaLQZERJWeVeyH6ev8os9568UvaeGMn7QObkiTVZG', 2, 1, '2023-11-07'),
(22, '197704012023212002', 'Anisa Apriani', 'P', 'anisa@gmail.com', NULL, '$2y$10$D/Uda3or/lQGoHNfPg9QQOwIdB8ScaEmOiKJ0ke6H5sF/XcUTWJSG', 2, 2, '2023-11-07'),
(24, '198903172023212004', 'Anita Solihat As', 'P', 'anita@gmail.com', NULL, '$2y$10$bI1EUz5hMXDSaDAjSOTUbOsp6XbxrzSuRrCxj0u2/bKK/OAqOOTS6', 2, 2, '2023-11-07'),
(25, '198310172023211001', 'Asmit Sudrajat', 'L', 'asmit@gmail.com', NULL, '$2y$10$E12AfanVLY7nLvjWywmFjukNae/oMY/U6HoMKXQAJwGnzX3sU5LWG', 2, 2, '2023-11-07'),
(26, '3215012306780002', 'Purwanto', 'L', 'purwanto@gmail.com', NULL, '$2y$10$Pf/Uf7kmltwWDD1lDvMnveXvKBgCP5E0K536eyAHkd8zAxa9JpWau', 2, 4, '2023-11-07'),
(27, '3215014410920008', 'Dini Khoeriah', 'P', 'dini@gmail.com', NULL, '$2y$10$kHY46R/kfZ0x3y/7wVcjauMc5lxIrWcIhC3Oe2Rsq7D51rOWMuIya', 2, 4, '2023-11-07'),
(28, '196504051993122001', 'Drg. Endah Purwanti', 'P', 'endahpurwanti@gmail.com', '93111fd2bd7555b28be5abb7857c4b8a.png', '$2y$10$GEcJ7yKCGHbYz9gNjesZlumsxyntT1R9W/HDMKY.l0DV2yuBXN4fe', 2, 1, '2023-11-07'),
(29, '197809122023212002', 'Dede Jubaedah', 'P', 'dedejubaedah@gmail.com', NULL, '$2y$10$1EHvf9YIervEix.9lmCTsu6zfFd2N2tB9YYEsYc5Niqh.d7JnOHJy', 2, 2, '2023-11-07'),
(30, '3215015408000014', 'Syifa Nurul Zahra Mulyadi', 'P', 'syifa@gmail.com', NULL, '$2y$10$kKNPZirmWOvVuj.RPUqAEuZudu9XjpQuSwbZPoKGI2.b9.F/mMpzK', 2, 4, '2023-11-07'),
(31, '198402192017042003', 'Intan Ismayanti', 'P', 'intanismayanti@gmail.com', NULL, '$2y$10$LRddwt7YJfFvzsac0KNQUOXC11uh0Cb2Yr8hKC9XT99CZlTEmABna', 2, 2, '2023-11-07'),
(32, '197312231995032002', 'Cucun Gunarsih', 'P', 'cucun@gmail.com', NULL, '$2y$10$DCYECxeawpLo9xLF4ppITeD6nK5sNHgUe.cmgcbEtkruOWb3uo0SK', 2, 3, '2023-11-07'),
(33, '197310241994032004', 'Siti Komariah', 'P', 'sitikomariah@gmail.com', NULL, '$2y$10$Avz.F5MhRHeVCF4ZtTXYc.X.VMEBy7qaVjYmUgMCFMTYbFcyTm0L2', 2, 2, '2023-11-07'),
(34, '197110251996032002', 'Lilis Farida', 'P', 'lilis@gmail.com', NULL, '$2y$10$Caer7zPvEylPmmUT.fyPYOrPB.Sip1aawb2Z8/w6AkQeLRgn.ZPQy', 2, 2, '2023-11-07'),
(35, '199203262023212004', 'Millaty Hanifa', 'P', 'milla@gmail.com', NULL, '$2y$10$vFfrTK0jP8KOxut5894VbeiKLs1UAdxWDmZ3EE58lz7A1azgnTVAG', 2, 3, '2023-11-07'),
(36, '1983042720170420', 'Irah Nuryasih', 'P', 'irah@gmail.com', NULL, '$2y$10$SMmMh4gpoAYS.272ulUikOPeuUvbhCMPNRmKDZcgv7h97nf6.T1vi', 2, 2, '2023-11-07'),
(37, '198106272003122003', 'Dwi Yusrini Farghob', 'P', 'dwi@gmail.com', NULL, '$2y$10$dwDjRsaB5fqt9K7J.r6JMuw7qKr08mDTPcQNvh5AyGClYaacjC54.', 2, 2, '2023-11-07'),
(38, '3215016901960001', 'Hena Herliana', 'P', 'hena@gmail.com', NULL, '$2y$10$zqcHuYW23giJJhmfKOFb3OlwsYFg4Hui7D0CzigUKh8CEL/xn18iW', 2, 4, '2023-11-07'),
(39, '199111292019022003', 'Novalawati Pratiwi', 'P', 'novalawati@gmail.com', 'aa3ff28d33b6f0101374b1b5c7997b8e.png', '$2y$10$ugX6E0HVCAv9AMPgrI8frOFEY/KmFrOVt73zGOArcBX6IkOssfpYu', 2, 2, '2023-11-07'),
(40, '197810102010012001', 'R. Siti Ratna Mulia', 'P', 'ratna@gmail.com', NULL, '$2y$10$51mKo6X9Z9zLKdDqMOnJV.rM2EVBde23xlGzB7SN6Utp09E/49gAG', 2, 4, '2023-11-07'),
(41, '197604122007012013', 'Ida Rosdianah', 'P', 'ida@gmail.com', NULL, '$2y$10$x5QaGVXFzdFVHg56ar.EhOpFxGGbfAOWmr2mBfs.b0EK1oo9lBjqS', 2, 2, '2023-11-07'),
(42, '196806162002122001', 'Aluisia Rita Dewi C', 'P', 'rita@gmail.com', '6ef18b12ec0ad354f663ace70fd7bab5.png', '$2y$10$ZKeVeZGf/5MIM/QK7Tmuh.vjWykabsMhXSeUwnIRrRWwL1CzDu3jm', 2, 1, '2023-11-07'),
(43, '3215050805810008', 'Achmad Kurnia', 'L', 'achmad@gmail.com', NULL, '$2y$10$H.9XJOyhvpeae7aOebwiNumfoQtarF3fszhpK6meK8dr4uRJXO1ZO', 2, 4, '2023-11-07'),
(44, '3215070210860003', 'Suryana', 'L', 'suryana@gmail.com', NULL, '$2y$10$UxoB0Kl7zuMpLVeluWW1ROt24/tZma98Vi2l1YFAQmsoI6nR7KriK', 2, 4, '2023-11-07'),
(45, '198507222017042002', 'Romih Ratnaningsih', 'P', 'romih@gmail.com', NULL, '$2y$10$.sFmeWznD10Nys4Tsdp/6ehnSi5ID.4ve6m.PTxPBgUk2UZHZOFt2', 2, 2, '2023-11-07'),
(46, '197808102023211001', 'Ajat Sudrajat', 'L', 'ajat@gmail.com', NULL, '$2y$10$873yJ3D3ZZ0l6eDaNb4F9.uo1XHxUeG5SakSLbwPHBOo33mAPzf9y', 2, 2, '2023-11-07'),
(48, '198503072017042006', 'Rifa Hediana', 'P', 'rifahediana@gmail.com', NULL, '$2y$10$CrJ7vzfPVV1lOcZOv2pTX.ioAtVm6Zo.mjvr2BOLYPN4vS/3ox.cW', 2, 2, '2023-11-07'),
(50, '198301052008032001', 'Nuning Wulandari', 'P', 'nuningwulandari@gmail.com', NULL, '$2y$10$xY06QeFcKsJwdz6PATaK0eDtQ9uWwNRZK3RcMK6N2S288lMOANNOa', 2, 4, '2023-11-07'),
(51, '21416255201055', 'Trisya', 'P', 'trisya@gmail.com', NULL, '$2y$10$oCXfPeDK/CM0rGEcjh2ANuqV2YkPFSeb2ltegotp.XwSlw53YlgA.', 2, 1, '2024-05-22'),
(52, '123456789101211131', 'Hasanah', 'P', 'hasanah@gmail.com', NULL, '$2y$10$Oc7Wd0NPEkghVHwkuigqkeWI/VV4SlAYi1EBAJ8A44zjV17XaZPoa', 2, 1, '2024-06-05'),
(53, '122345678997865435', 'aisyah', 'P', 'aisyah@gmail.com', NULL, '$2y$10$ieA7e.FaicYCE9i47MsxXOCg7fFWbRGQqKUmM96SI4JjcAFPNopS2', 2, 4, '2024-06-07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id_positions`);

--
-- Indeks untuk tabel `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id_presents`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `positions`
--
ALTER TABLE `positions`
  MODIFY `id_positions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `presents`
--
ALTER TABLE `presents`
  MODIFY `id_presents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

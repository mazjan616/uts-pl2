/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100419
Source Host           : localhost:3306
Source Database       : spp

Target Server Type    : MYSQL
Target Server Version : 100419
File Encoding         : 65001

Date: 2021-09-23 09:13:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `nama_kelas` (`nama_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_kelas
-- ----------------------------
INSERT INTO `tb_kelas` VALUES ('10011', 'Regular SI', 'Sistem Informasi');
INSERT INTO `tb_kelas` VALUES ('10012', 'Regular TI', 'Teknik Informasi');
INSERT INTO `tb_kelas` VALUES ('20011', 'Regular Malam SI', 'Sistem Informasi');
INSERT INTO `tb_kelas` VALUES ('20012', 'Regular Malam TI', 'Teknik Informasi');
INSERT INTO `tb_kelas` VALUES ('30011', 'Karyawan SI', 'Sistem Informasi');
INSERT INTO `tb_kelas` VALUES ('30012', 'Karyawan TI', 'Teknik Informasi');
INSERT INTO `tb_kelas` VALUES ('40011', 'Karyawan Bisnis SI', 'Sistem Informasi');
INSERT INTO `tb_kelas` VALUES ('40012', 'Karyawan Bisnis TI', 'Teknik Informasi');

-- ----------------------------
-- Table structure for tb_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_pembayaran`;
CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` bigint(20) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` int(10) NOT NULL,
  `tgl_bayar` int(2) NOT NULL,
  `bulan_bayar` varchar(10) NOT NULL,
  `tahun_bayar` int(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_petugas` (`id_petugas`),
  KEY `nisn` (`nisn`),
  KEY `id_spp` (`id_spp`),
  CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`),
  CONSTRAINT `tb_pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_pembayaran
-- ----------------------------
INSERT INTO `tb_pembayaran` VALUES ('1419700104072020', '210002', '14197001', '4', 'Juni', '2020', '20180001', '1000000');
INSERT INTO `tb_pembayaran` VALUES ('1419700105012019', '210002', '14197001', '5', 'Januari', '2019', '20180001', '1000000');
INSERT INTO `tb_pembayaran` VALUES ('1419700105012020', '210005', '14197001', '5', 'Januari', '2020', '20180001', '1000000');
INSERT INTO `tb_pembayaran` VALUES ('1419700105072018', '210002', '14197001', '5', 'Juli', '2018', '20180001', '1000000');
INSERT INTO `tb_pembayaran` VALUES ('1419700105072019', '110001', '14197001', '5', 'Juli', '2019', '20180001', '1000000');

-- ----------------------------
-- Table structure for tb_petugas
-- ----------------------------
DROP TABLE IF EXISTS `tb_petugas`;
CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `nama_petugas` (`nama_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=210007 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_petugas
-- ----------------------------
INSERT INTO `tb_petugas` VALUES ('110001', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'Admin');
INSERT INTO `tb_petugas` VALUES ('210002', 'petugas', '5a1c6634a096df73871c5f5f55e2e32da54da17e', 'Petugas 2', 'Petugas');
INSERT INTO `tb_petugas` VALUES ('210003', 'ridwan', 'aa027e41edc3372c35646eb382168ecd7092de7a', 'Ridwan Nurfauzan', 'Petugas');
INSERT INTO `tb_petugas` VALUES ('210005', 'petugas10', '7c222fb2927d828af22f592134e8932480637c0d', 'Dadang Komarudin', 'Admin');

-- ----------------------------
-- Table structure for tb_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE `tb_siswa` (
  `nisn` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  KEY `id_kelas` (`id_kelas`),
  KEY `id_spp` (`id_spp`),
  KEY `nisn` (`nisn`),
  CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tb_siswa
-- ----------------------------
INSERT INTO `tb_siswa` VALUES ('14197001', '1419700001', 'Muhamad Ridwan', '10011', 'Kabupaten Bogor', '628098765432', '20180001');
INSERT INTO `tb_siswa` VALUES ('14197002', '1419700003', 'Risti Ramadanti', '30011', 'Tajur', '6281234567890', '20180001');
INSERT INTO `tb_siswa` VALUES ('14197003', '1419700002', 'Muhamad Novaldy', '30012', 'Tajur', '6283456789011', '20190001');
INSERT INTO `tb_siswa` VALUES ('14197004', '1419700004', 'Reza Julianti', '30011', 'Citereup', '08123456789', '20190001');

-- ----------------------------
-- Table structure for tb_spp
-- ----------------------------
DROP TABLE IF EXISTS `tb_spp`;
CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(11) NOT NULL,
  PRIMARY KEY (`id_spp`),
  KEY `nominal` (`nominal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_spp
-- ----------------------------
INSERT INTO `tb_spp` VALUES ('20180001', '2018', '10550000');
INSERT INTO `tb_spp` VALUES ('20190001', '2019', '12000000');
INSERT INTO `tb_spp` VALUES ('20200001', '2020', '13500000');
INSERT INTO `tb_spp` VALUES ('20210001', '2021', '15500000');

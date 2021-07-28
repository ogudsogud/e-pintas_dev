/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.4.11-MariaDB : Database - pintas_dev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pintas_dev` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pintas_dev`;

/*Table structure for table `mtr_golongan` */

DROP TABLE IF EXISTS `mtr_golongan`;

CREATE TABLE `mtr_golongan` (
  `id_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `golongan` varchar(5) DEFAULT NULL,
  `nama_gol` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_golongan` */

insert  into `mtr_golongan`(`id_golongan`,`golongan`,`nama_gol`,`status`) values (1,'II/d','Pengatur Tk.1',1),(2,'III/a','Penata Muda',1),(3,'III/b','Penata Muda Tk.1',1),(4,'III/c','Penata',1),(5,'III/d','Penata Tk.1',1),(6,'IV/a','Pembina',1),(7,'IV/b','Pembina Tk.1',1),(8,'IV/c','Pembina Utama Muda',1),(9,'IV/d','Pembina Utama Madya',1),(10,'IV/e','Pembina Utama',1);

/*Table structure for table `mtr_instansi` */

DROP TABLE IF EXISTS `mtr_instansi`;

CREATE TABLE `mtr_instansi` (
  `id_instansi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ins` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `tlp` char(12) DEFAULT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_instansi` */

insert  into `mtr_instansi`(`id_instansi`,`nama_ins`,`alamat`,`tlp`) values (1,'BNN','Jakarta','-'),(2,'Kejaksaan RI','Samarinda','-'),(3,'Kepolisian RI','Samarinda','-'),(4,'Kemenkumham RI','Samarinda','-'),(5,'Mahkamah Agung RI','Jakarta','-');

/*Table structure for table `mtr_klasifikasi` */

DROP TABLE IF EXISTS `mtr_klasifikasi`;

CREATE TABLE `mtr_klasifikasi` (
  `id_klas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_klas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_klas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_klasifikasi` */

insert  into `mtr_klasifikasi`(`id_klas`,`nama_klas`) values (1,'Penyitaan'),(2,'Penggeledahan'),(3,'Penahanan');

/*Table structure for table `mtr_org` */

DROP TABLE IF EXISTS `mtr_org`;

CREATE TABLE `mtr_org` (
  `id_org` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  PRIMARY KEY (`id_org`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_org` */

/*Table structure for table `mtr_role_level` */

DROP TABLE IF EXISTS `mtr_role_level`;

CREATE TABLE `mtr_role_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `role` enum('Admin','Wakil Ketua','Panitera','Panmud','PTSP','Pemohon') DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_role_level` */

insert  into `mtr_role_level`(`id_user_level`,`role`,`level`) values (1,'Admin',6),(2,'Wakil Ketua',5),(3,'Panitera',4),(4,'Panmud',3),(5,'PTSP',2),(6,'Pemohon',1);

/*Table structure for table `mtr_satker` */

DROP TABLE IF EXISTS `mtr_satker`;

CREATE TABLE `mtr_satker` (
  `id_satker` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) DEFAULT NULL,
  `nama_satker` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_satker`),
  KEY `mtr_satker_ibfk_1` (`id_unit`),
  CONSTRAINT `mtr_satker_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `mtr_unit` (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_satker` */

insert  into `mtr_satker`(`id_satker`,`id_unit`,`nama_satker`,`alamat`,`phone`) values (1,1,'Polres Samarinda','Samarinda','-'),(2,1,'Polres Sungai Kunjang','Samarinda','-'),(3,1,'Polsek Samarinda','Samarinda','-'),(4,2,'Kejaksaan Negeri Samarinda','Samarinda','-'),(5,2,'Kejaksaan Negeri Balikpapan','Samarinda','-'),(6,3,'Lapas Kelas II Samarinda','Samarinda','-'),(7,4,'Pengadilan Negeri Samarinda','Samarinda','-');

/*Table structure for table `mtr_status` */

DROP TABLE IF EXISTS `mtr_status`;

CREATE TABLE `mtr_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_status` */

insert  into `mtr_status`(`id_status`,`status`) values (1,'Permohonan Aktivasi'),(2,'Aktif'),(3,'Belum Lengkap'),(4,'Cek PTSP'),(5,'Cek WKPN'),(6,'Cek Panitera'),(7,'Cek Panmud'),(8,'Lengkap'),(9,'Berkas Salah');

/*Table structure for table `mtr_unit` */

DROP TABLE IF EXISTS `mtr_unit`;

CREATE TABLE `mtr_unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tlp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_unit` */

insert  into `mtr_unit`(`id_unit`,`nama_unit`,`alamat`,`tlp`) values (1,'Polda Kaltim','Balikpapan',NULL),(2,'Kejati Kaltim','Samarinda',NULL),(3,'Kanwil Kumham Kaltim','Samarinda',NULL),(4,'Pengadilan Tinggi Kaltim','Samarinda',NULL);

/*Table structure for table `mtr_user_apr` */

DROP TABLE IF EXISTS `mtr_user_apr`;

CREATE TABLE `mtr_user_apr` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mtr_user_apr` */

insert  into `mtr_user_apr`(`id_jabatan`,`jabatan`,`status`) values (1,'Wakil Ketua',1),(2,'Panitera',1),(3,'Panmud Pidana',1),(4,'Umum',1),(5,'PTSP',1);

/*Table structure for table `tbl_file` */

DROP TABLE IF EXISTS `tbl_file`;

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(11) DEFAULT NULL,
  `ukuran_file` double DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `type_file` varchar(100) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_file`),
  KEY `id_permohonan` (`id_permohonan`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `tbl_file_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `tbl_permohonan` (`id_permohonan`),
  CONSTRAINT `tbl_file_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `mtr_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_file` */

insert  into `tbl_file`(`id_file`,`id_permohonan`,`ukuran_file`,`filename`,`type_file`,`tgl_upload`,`id_status`) values (220,71,179.28,'Permohonan_Penyitaan.pdf','.pdf','2021-07-28',8),(221,71,179.57,'Laporan_Polisi_(LP).pdf','.pdf','2021-07-28',8),(222,71,181.06,'Surat_Perintah_Penyidikan.pdf','.pdf','2021-07-28',8),(223,71,181.69,'Surat_Dimulai_Penyidikan.pdf','.pdf','2021-07-28',8),(224,71,181.42,'Surat_Perintah_Penyitaan.pdf','.pdf','2021-07-28',8),(225,71,179.78,'BA_Penyitaan.pdf','.pdf','2021-07-28',8),(226,71,177.12,'Resume.pdf','.pdf','2021-07-28',8);

/*Table structure for table `tbl_permohonan` */

DROP TABLE IF EXISTS `tbl_permohonan`;

CREATE TABLE `tbl_permohonan` (
  `id_permohonan` int(11) NOT NULL AUTO_INCREMENT,
  `id_klas` int(11) DEFAULT NULL,
  `id_satker` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `tgl_reg` date DEFAULT NULL,
  `tgl_surat` varchar(10) DEFAULT NULL,
  `perihal` varchar(300) DEFAULT NULL,
  `prioritas` varchar(50) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permohonan`),
  KEY `id_klas` (`id_klas`),
  KEY `id_user` (`id_user`),
  KEY `tbl_permohonan_ibfk_2` (`id_satker`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `tbl_permohonan_ibfk_1` FOREIGN KEY (`id_klas`) REFERENCES `mtr_klasifikasi` (`id_klas`),
  CONSTRAINT `tbl_permohonan_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `mtr_satker` (`id_satker`),
  CONSTRAINT `tbl_permohonan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`),
  CONSTRAINT `tbl_permohonan_ibfk_7` FOREIGN KEY (`id_status`) REFERENCES `mtr_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_permohonan` */

insert  into `tbl_permohonan`(`id_permohonan`,`id_klas`,`id_satker`,`id_user`,`no_surat`,`tgl_reg`,`tgl_surat`,`perihal`,`prioritas`,`id_status`) values (67,2,6,28,'kheb/12.erte/2021','2021-07-28','22-07-2021','sfgsgzsgAEGS','penting',3),(70,1,5,29,'keb/12.erte/2021','2021-07-28','31-03-2021','assdg','penting',3),(71,1,6,30,'zaio/34/m23.xgn/2021','2021-07-28','30-03-2021','sgfsdgfs','penting',8);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_satker` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `tlp` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pswd` varchar(50) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `tgl_aktivasi` datetime DEFAULT NULL,
  `id_user_level` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_status` (`id_status`),
  KEY `id_user_level` (`id_user_level`),
  KEY `tbl_user_ibfk_1` (`id_satker`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_satker`) REFERENCES `mtr_satker` (`id_satker`),
  CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `mtr_status` (`id_status`),
  CONSTRAINT `tbl_user_ibfk_4` FOREIGN KEY (`id_user_level`) REFERENCES `mtr_role_level` (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`id_satker`,`nama`,`nip`,`jabatan`,`tlp`,`email`,`pswd`,`tgl_input`,`tgl_aktivasi`,`id_user_level`,`id_status`) values (21,7,'yoga','198604292019031003','IT',NULL,'ogudsogud@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 08:46:08','2021-07-28 10:19:26',1,2),(22,4,'Adit','654321','IT',NULL,'putuaditya17800@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 08:48:47','2021-07-28 10:19:26',1,2),(24,7,'wkpn','198604292019031003','wkpn',NULL,'wkpn@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 10:45:47','2021-07-28 10:49:47',2,2),(25,7,'panmud','198604292019031003','panmud',NULL,'panmud@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 10:45:47','2021-07-28 10:49:47',4,2),(26,7,'panitera','198604292019031003','panitera',NULL,'panitera@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 10:45:47','2021-07-28 10:49:47',3,2),(27,7,'ptsp','198604292019031003','ptsp',NULL,'ptsp@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 10:45:47','2021-07-28 10:49:47',5,2),(28,6,'pemohon1','198604292019031003','pemohon1',NULL,'pemohon1@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 10:45:47','2021-07-28 10:49:47',6,2),(29,5,'pemohon2','198604292019031003','pemohon2',NULL,'pemohon2@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 10:45:47','2021-07-28 10:49:47',6,2),(30,6,'pemohon3','198604292019031003','pemohon3',NULL,'pemohon3@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-07-28 10:45:47','2021-07-28 10:49:47',6,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

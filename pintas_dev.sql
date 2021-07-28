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
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_file` */

insert  into `tbl_file`(`id_file`,`id_permohonan`,`ukuran_file`,`filename`,`type_file`,`tgl_upload`,`id_status`) values (157,53,179.28,'Permohonan_Penyitaan.pdf','.pdf','2021-04-19',6),(158,53,179.57,'Laporan_Polisi_(LP).pdf','.pdf','2021-04-19',6),(159,53,181.06,'Surat_Perintah_Penyidikan.pdf','.pdf','2021-04-19',6),(160,53,181.69,'Surat_Dimulai_Penyidikan.pdf','.pdf','2021-04-19',6),(161,53,181.42,'Surat_Perintah_Penyitaan.pdf','.pdf','2021-04-19',6),(162,53,179.78,'BA_Penyitaan.pdf','.pdf','2021-04-19',6),(163,53,177.12,'Resume.pdf','.pdf','2021-04-19',6),(164,59,179.28,'Permohonan_Penyitaan1.pdf','.pdf','2021-04-19',7),(165,59,179.57,'Laporan_Polisi_(LP)1.pdf','.pdf','2021-04-19',7),(166,59,181.06,'Surat_Perintah_Penyidikan1.pdf','.pdf','2021-04-19',7),(167,59,181.69,'Surat_Dimulai_Penyidikan1.pdf','.pdf','2021-04-19',7),(168,59,181.42,'Surat_Perintah_Penyitaan1.pdf','.pdf','2021-04-19',7),(169,59,179.78,'BA_Penyitaan1.pdf','.pdf','2021-04-19',7),(170,59,177.12,'Resume1.pdf','.pdf','2021-04-19',7),(171,57,179.28,'Permohonan_Penggeledahan.pdf','.pdf','2021-04-19',6),(172,57,179.57,'Laporan_Polisi_(LP)2.pdf','.pdf','2021-04-19',6),(173,57,181.06,'Surat_Perintah_Penyidikan2.pdf','.pdf','2021-04-19',6),(174,57,181.69,'Surat_Dimulai_Penyidikan2.pdf','.pdf','2021-04-19',6),(175,57,181.42,'Surat_Perintah_Penggeledahan.pdf','.pdf','2021-04-19',6),(176,57,179.78,'BA_Penggeledahan.pdf','.pdf','2021-04-19',6),(177,57,177.12,'Resume2.pdf','.pdf','2021-04-19',6),(178,63,179.28,'Permohonan_Penyitaan2.pdf','.pdf','2021-04-19',6),(179,63,179.57,'Laporan_Polisi_(LP)3.pdf','.pdf','2021-04-19',6),(180,63,181.06,'Surat_Perintah_Penyidikan3.pdf','.pdf','2021-04-19',6),(181,63,181.69,'Surat_Dimulai_Penyidikan3.pdf','.pdf','2021-04-19',6),(182,63,181.42,'Surat_Perintah_Penyitaan2.pdf','.pdf','2021-04-19',6),(183,63,179.78,'BA_Penyitaan2.pdf','.pdf','2021-04-19',6),(184,63,177.12,'Resume3.pdf','.pdf','2021-04-19',6),(185,60,179.28,'Permohonan_Penggeledahan1.pdf','.pdf','2021-04-19',6),(186,60,179.57,'Laporan_Polisi_(LP)4.pdf','.pdf','2021-04-19',6),(187,60,181.06,'Surat_Perintah_Penyidikan4.pdf','.pdf','2021-04-19',6),(188,60,181.69,'Surat_Dimulai_Penyidikan4.pdf','.pdf','2021-04-19',6),(189,60,181.42,'Surat_Perintah_Penggeledahan1.pdf','.pdf','2021-04-19',6),(190,60,179.78,'BA_Penggeledahan1.pdf','.pdf','2021-04-19',6),(191,60,177.12,'Resume4.pdf','.pdf','2021-04-19',6),(192,58,179.28,'Permohonan_Penyitaan3.pdf','.pdf','2021-04-19',6),(193,58,179.57,'Laporan_Polisi_(LP)5.pdf','.pdf','2021-04-19',6),(194,58,181.06,'Surat_Perintah_Penyidikan5.pdf','.pdf','2021-04-19',6),(195,58,181.69,'Surat_Dimulai_Penyidikan5.pdf','.pdf','2021-04-19',6),(196,58,181.42,'Surat_Perintah_Penyitaan3.pdf','.pdf','2021-04-19',6),(197,58,179.78,'BA_Penyitaan3.pdf','.pdf','2021-04-19',6),(198,58,177.12,'Resume5.pdf','.pdf','2021-04-19',6),(199,61,179.28,'Permohonan_Penggeledahan2.pdf','.pdf','2021-04-19',6),(200,61,179.57,'Laporan_Polisi_(LP)6.pdf','.pdf','2021-04-19',6),(201,61,181.06,'Surat_Perintah_Penyidikan6.pdf','.pdf','2021-04-19',6),(202,61,181.69,'Surat_Dimulai_Penyidikan6.pdf','.pdf','2021-04-19',6),(203,61,181.42,'Surat_Perintah_Penggeledahan2.pdf','.pdf','2021-04-19',6),(204,61,179.78,'BA_Penggeledahan2.pdf','.pdf','2021-04-19',6),(205,61,177.12,'Resume6.pdf','.pdf','2021-04-19',6),(206,64,179.28,'Permohonan_Penggeledahan3.pdf','.pdf','2021-04-19',6),(207,64,179.57,'Laporan_Polisi_(LP)7.pdf','.pdf','2021-04-19',6),(208,64,181.06,'Surat_Perintah_Penyidikan7.pdf','.pdf','2021-04-19',6),(209,64,181.69,'Surat_Dimulai_Penyidikan7.pdf','.pdf','2021-04-19',6),(210,64,181.42,'Surat_Perintah_Penggeledahan3.pdf','.pdf','2021-04-19',6),(211,64,179.78,'BA_Penggeledahan3.pdf','.pdf','2021-04-19',6),(212,64,177.12,'Resume7.pdf','.pdf','2021-04-19',6),(213,56,179.28,'Permohonan_Penyitaan4.pdf','.pdf','2021-05-03',6),(214,56,179.57,'Laporan_Polisi_(LP)8.pdf','.pdf','2021-05-03',6),(215,56,181.06,'Surat_Perintah_Penyidikan8.pdf','.pdf','2021-05-03',6),(216,56,181.69,'Surat_Dimulai_Penyidikan8.pdf','.pdf','2021-05-03',6),(217,56,181.42,'Surat_Perintah_Penyitaan4.pdf','.pdf','2021-05-03',6),(218,56,179.78,'BA_Penyitaan4.pdf','.pdf','2021-05-03',6),(219,56,177.12,'Resume8.pdf','.pdf','2021-05-03',6);

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
  `id_user_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permohonan`),
  KEY `id_klas` (`id_klas`),
  KEY `id_user` (`id_user`),
  KEY `tbl_permohonan_ibfk_2` (`id_satker`),
  KEY `id_user_level` (`id_user_level`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `tbl_permohonan_ibfk_1` FOREIGN KEY (`id_klas`) REFERENCES `mtr_klasifikasi` (`id_klas`),
  CONSTRAINT `tbl_permohonan_ibfk_2` FOREIGN KEY (`id_satker`) REFERENCES `mtr_satker` (`id_satker`),
  CONSTRAINT `tbl_permohonan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`),
  CONSTRAINT `tbl_permohonan_ibfk_6` FOREIGN KEY (`id_user_level`) REFERENCES `mtr_role_level` (`id_user_level`),
  CONSTRAINT `tbl_permohonan_ibfk_7` FOREIGN KEY (`id_status`) REFERENCES `mtr_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_permohonan` */

insert  into `tbl_permohonan`(`id_permohonan`,`id_klas`,`id_satker`,`id_user`,`no_surat`,`tgl_reg`,`tgl_surat`,`perihal`,`prioritas`,`id_status`,`id_user_level`) values (53,1,2,17,'dfg/23423/m.jh/2021','2021-04-19','30-03-2021','xhm','sdfs',6,NULL),(54,2,2,17,'shfgh/23423/m.jh/2021','2021-04-19','05-04-2021','dasd','tjyty',3,NULL),(55,2,2,17,'ddg/23423/m.jh/2021','2021-04-19','05-04-2021','sthx','penting',3,NULL),(56,1,7,15,'5fgh/23423/m.jh/2021','2021-04-19','05-04-2021','jhgk','penting',6,NULL),(57,2,2,17,'ifk/233/m.jh/2021','2021-04-19','05-04-2021','xj','penting',7,NULL),(58,1,7,15,'aery/233/m.jh/2021','2021-04-19','05-04-2021','srtus5','penting',7,NULL),(59,1,2,17,'ypw/233/m.jh/2021','2021-04-19','05-04-2021','dhgjd','penting',7,NULL),(60,2,7,15,'dfg/425/m23.yry/2021','2021-04-19','31-03-2021','ajathjghj','penting',6,NULL),(61,2,2,17,'dfg/8568/m23.fjk/2021','2021-04-19','31-03-2021','dutyr','penting',6,NULL),(63,1,7,15,'zaio/34/m23.xgn/2021','2021-04-19','09-04-2021','6thdzgnzth','penting',3,NULL),(64,2,2,17,'siufj,/34/dyjhg.345/2021','2021-04-19','09-04-2021','xhgjddj','penting',3,NULL),(65,2,7,15,'ias/23423/m.jh/2021','2021-04-21','06-04-2021','fhgGfdz','ethsrt',3,NULL),(66,1,7,19,'spr/102/sp.rmn/2.2/2021','2021-05-04','27-04-2021','fhgzdghSgg','FhdhSRftgSH',3,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`id_satker`,`nama`,`nip`,`jabatan`,`tlp`,`email`,`pswd`,`tgl_input`,`tgl_aktivasi`,`id_user_level`,`id_status`) values (15,7,'Yoga Wiguna','198604292019031003','Prakom',NULL,'ogudsogud@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-03-30 06:42:51','2021-04-04 16:24:53',1,2),(17,2,'Priya Wiguna','198604292019031003','Prakom 2',NULL,'ypw1986@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-04-04 15:36:13','2021-04-04 16:25:33',1,2),(19,7,'Suparman','197210231992032001','Fungsional Umum',NULL,'anandanafa36@gmail.com','e10adc3949ba59abbe56e057f20f883e','2021-04-21 15:27:21','2021-04-21 15:27:41',1,2),(20,7,'roby','-','-',NULL,'robyanursaputra@gmail.com','e10adc3949ba59abbe56e057f20f883e','2021-05-05 09:09:32','2021-05-05 09:10:10',1,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

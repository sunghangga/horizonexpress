/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 5.6.21 : Database - horizon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`horizon` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `horizon`;

/*Table structure for table `check` */

DROP TABLE IF EXISTS `check`;

CREATE TABLE `check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) DEFAULT NULL,
  `examiner` varchar(55) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `check_item` */

DROP TABLE IF EXISTS `check_item`;

CREATE TABLE `check_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `item` varchar(55) NOT NULL,
  `foto` mediumtext,
  `gejala` mediumtext NOT NULL,
  `penyebab` mediumtext NOT NULL,
  `engine` varchar(15) DEFAULT NULL,
  `frame` varchar(15) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `solusi` mediumtext,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `address` text,
  `telephone` varchar(12) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `create_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `delivery` */

DROP TABLE IF EXISTS `delivery`;

CREATE TABLE `delivery` (
  `kode` varchar(15) NOT NULL,
  `name_pengirim` varchar(55) NOT NULL,
  `address_pengirim` text,
  `telephone_pengirim` varchar(12) NOT NULL,
  `wr_pengirim_id` int(11) DEFAULT NULL,
  `name_penerima` varchar(55) NOT NULL,
  `address_penerima` text,
  `telephone_penerima` varchar(12) NOT NULL,
  `wr_penerima_id` int(11) DEFAULT NULL,
  `user_id` int(5) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'warehouse',
  `driver` varchar(55) DEFAULT NULL,
  `nopol` varchar(55) DEFAULT NULL,
  `regencies_id` char(4) NOT NULL,
  `districts_id` char(7) NOT NULL,
  `villages_id` char(10) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `delivery_detail` */

DROP TABLE IF EXISTS `delivery_detail`;

CREATE TABLE `delivery_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `category` int(2) NOT NULL DEFAULT '0',
  `name` varchar(55) NOT NULL,
  `qty` float NOT NULL,
  `price` float DEFAULT NULL,
  `unit` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `districts` */

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` char(7) NOT NULL,
  `regency_id` char(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_id_index` (`regency_id`),
  CONSTRAINT `districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `driver` */

DROP TABLE IF EXISTS `driver`;

CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `address` text,
  `telephone` varchar(12) NOT NULL,
  `name_wife` varchar(250) DEFAULT NULL,
  `telephone_wife` varchar(12) DEFAULT NULL,
  `sim_expire` date NOT NULL,
  `create_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` enum('kelengkapan','barang') NOT NULL DEFAULT 'barang',
  `unit_id` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `postage` */

DROP TABLE IF EXISTS `postage`;

CREATE TABLE `postage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_district_id` char(7) NOT NULL,
  `last_district_id` char(7) NOT NULL,
  `emount` float DEFAULT NULL,
  `create_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `provinces` */

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `receive` */

DROP TABLE IF EXISTS `receive`;

CREATE TABLE `receive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `receiver` varchar(55) NOT NULL,
  `pdi` varchar(55) NOT NULL,
  `pic` varchar(55) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `receive_item` */

DROP TABLE IF EXISTS `receive_item`;

CREATE TABLE `receive_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_detail_id` varchar(15) NOT NULL,
  `qty_received` float NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `regencies` */

DROP TABLE IF EXISTS `regencies`;

CREATE TABLE `regencies` (
  `id` char(4) NOT NULL,
  `province_id` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regencies_province_id_index` (`province_id`),
  CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `road_money` */

DROP TABLE IF EXISTS `road_money`;

CREATE TABLE `road_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `table_money` float NOT NULL,
  `pulse` float NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `road_money_detail` */

DROP TABLE IF EXISTS `road_money_detail`;

CREATE TABLE `road_money_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) NOT NULL,
  `postage` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tire` */

DROP TABLE IF EXISTS `tire`;

CREATE TABLE `tire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT NULL,
  `noseri` varchar(25) DEFAULT NULL,
  `stock` int(15) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tire_in` */

DROP TABLE IF EXISTS `tire_in`;

CREATE TABLE `tire_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tire_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tire_out` */

DROP TABLE IF EXISTS `tire_out`;

CREATE TABLE `tire_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tire_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `nopol` varchar(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `km_before` varchar(10) NOT NULL,
  `km_after` varchar(10) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `truck` */

DROP TABLE IF EXISTS `truck`;

CREATE TABLE `truck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `nosin` varchar(25) NOT NULL,
  `norangka` varchar(25) DEFAULT NULL,
  `production_year` varchar(5) DEFAULT NULL,
  `jto_samsat` varchar(15) DEFAULT NULL,
  `kir` varchar(25) DEFAULT NULL,
  `km` varchar(10) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `unit` */

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  `create_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `villages` */

DROP TABLE IF EXISTS `villages`;

CREATE TABLE `villages` (
  `id` char(10) NOT NULL,
  `district_id` char(7) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `villages_district_id_index` (`district_id`),
  CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `warehouse` */

DROP TABLE IF EXISTS `warehouse`;

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT NULL,
  `alamat` text,
  `create_at` date DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

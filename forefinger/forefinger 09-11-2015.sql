/*
SQLyog Ultimate v10.42 
MySQL - 5.5.32 : Database - forefinger
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`forefinger` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `forefinger`;

/*Table structure for table `class_data` */

DROP TABLE IF EXISTS `class_data`;

CREATE TABLE `class_data` (
  `class_id` varchar(10) NOT NULL,
  `class_num` int(3) NOT NULL,
  `char_id` varchar(10) NOT NULL,
  `char_data` varchar(40) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`class_id`,`class_num`,`char_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `class_data` */

insert  into `class_data`(`class_id`,`class_num`,`char_id`,`char_data`,`changed_on`,`changed_by`) values ('1',1,'1','Daikin','2015-10-25 14:20:00',NULL),('1',1,'2','Ac Daikin','2015-10-25 14:20:00',NULL),('1',1,'4','500','2015-10-25 14:20:00',NULL),('1',2,'1','2','2015-10-24 20:12:59',NULL),('1',2,'2','2','2015-10-24 20:12:59',NULL),('1',2,'4','2','2015-10-24 20:12:59',NULL),('1',3,'1','Air','2015-11-08 19:26:03',NULL),('1',3,'2','PAM','2015-11-08 19:26:04',NULL),('1',3,'4','500','2015-11-05 19:51:21',NULL),('1',4,'1','Philip','2015-11-08 19:23:19',NULL),('1',4,'2','Test','2015-11-08 19:23:19',NULL),('1',4,'4','100','2015-11-08 19:23:19',NULL),('1',5,'1','Daikin','2015-11-08 19:23:53',NULL),('1',5,'2','Ac Daikin','2015-11-08 19:23:53',NULL),('1',5,'4','500','2015-11-08 19:23:53',NULL),('1',6,'1','Sony','2015-11-08 19:25:01',NULL),('1',6,'2','Stereo','2015-11-08 19:25:01',NULL),('1',6,'4','400','2015-11-08 19:25:01',NULL),('1',7,'1','Sony','2015-11-08 19:27:21',NULL),('1',7,'2','Televisi','2015-11-08 19:27:21',NULL),('1',7,'4','300','2015-11-08 19:27:21',NULL),('1',8,'1','PPX','2015-11-08 19:28:02',NULL),('1',8,'2','PP','2015-11-08 19:28:02',NULL),('1',8,'4','100','2015-11-08 19:28:02',NULL),('1',9,'1','12312112','2015-11-08 21:11:57',NULL),('1',9,'2','12312112','2015-11-08 21:11:58',NULL),('1',9,'4','12312112','2015-11-08 21:11:58',NULL);

/*Table structure for table `class_master` */

DROP TABLE IF EXISTS `class_master`;

CREATE TABLE `class_master` (
  `class_id` varchar(10) NOT NULL,
  `char_id` varchar(10) NOT NULL,
  `class_desc` varchar(40) DEFAULT NULL,
  `char_desc` varchar(40) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`class_id`,`char_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `class_master` */

insert  into `class_master`(`class_id`,`char_id`,`class_desc`,`char_desc`,`changed_on`) values ('1','1','Manufacturer','Manufacturer','2015-10-24 17:53:26'),('1','2','object description','Object Description','2015-10-24 17:53:32'),('1','4','Power Consumtion (W)','Power Consumption (W)','2015-10-24 19:46:34');

/*Table structure for table `icon_master` */

DROP TABLE IF EXISTS `icon_master`;

CREATE TABLE `icon_master` (
  `icon_id` int(3) NOT NULL,
  `icon_name` varchar(20) DEFAULT NULL,
  `icon_pic` varchar(10) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`icon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icon_master` */

insert  into `icon_master`(`icon_id`,`icon_name`,`icon_pic`,`changed_on`) values (1,'1','1.png','2015-10-24 17:07:05'),(2,'2','2.png','2015-10-24 17:07:10'),(3,'3','3.png','2015-10-24 17:07:17'),(4,'4','4.png','2015-10-24 17:07:22'),(5,'5','5.png','2015-10-24 17:07:28'),(6,'6','6.png','2015-10-24 17:07:33'),(7,'7','7.png','2015-10-24 17:07:39'),(8,'8','8.png','2015-10-24 17:07:43'),(9,'9','9.png','2015-10-24 17:07:49'),(10,'10','10.png','2015-10-24 17:07:57'),(11,'11','11.png','2015-10-24 17:08:06'),(12,'12','12.png','2015-10-24 17:08:11');

/*Table structure for table `message_master` */

DROP TABLE IF EXISTS `message_master`;

CREATE TABLE `message_master` (
  `message_id` char(4) NOT NULL,
  `language` char(2) DEFAULT NULL,
  `message_desc` text,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `message_master` */

/*Table structure for table `message_status` */

DROP TABLE IF EXISTS `message_status`;

CREATE TABLE `message_status` (
  `message_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_id` char(4) NOT NULL,
  `message_desc` text,
  PRIMARY KEY (`message_date_time`,`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `message_status` */

/*Table structure for table `object_master` */

DROP TABLE IF EXISTS `object_master`;

CREATE TABLE `object_master` (
  `object_id` int(3) NOT NULL AUTO_INCREMENT,
  `object_pin_output` int(2) DEFAULT NULL,
  `object_i2c_output` int(1) DEFAULT NULL,
  `object_pin_in` int(2) DEFAULT NULL,
  `object_i2c_in` int(1) DEFAULT NULL,
  `object_name` varchar(40) DEFAULT NULL,
  `object_floor` char(1) DEFAULT NULL,
  `object_loc` varchar(40) DEFAULT NULL,
  `icon_id` int(3) DEFAULT NULL,
  `class_id` varchar(10) DEFAULT NULL,
  `class_num` int(3) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`object_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `object_master` */

insert  into `object_master`(`object_id`,`object_pin_output`,`object_i2c_output`,`object_pin_in`,`object_i2c_in`,`object_name`,`object_floor`,`object_loc`,`icon_id`,`class_id`,`class_num`,`changed_on`,`changed_by`) values (1,1323232,113121,112312,123232,'AC Kamar Mandi','1','Kamar Pembantu',3,'1',1,'2015-11-08 19:25:34',NULL),(2,2,2,2,2,'Lampu K.M. 2','2','Kamar Mandi',1,'1',2,'2015-10-24 20:12:59',NULL),(3,1323232,113121,112312,123232,'Air','1','Kamar Mandi',12,'1',3,'2015-11-08 19:26:03',NULL),(7,1231441,1231211,1231111,1231111,'Lampu Kamar','1','Kamar Utama',2,'1',4,'2015-11-08 19:26:19',NULL),(8,12931919,12931919,12931919,12931919,'Ac Kamar','1','Kamar Utama',3,'1',5,'2015-11-08 19:26:31',NULL),(9,12931914,12931914,12931914,12931914,'Stereo','1','Kamar Utama',9,'1',6,'2015-11-08 19:26:42',NULL),(10,12931988,12931988,12931988,12931988,'Televisi','1','Kamar Utama',7,'1',7,'2015-11-08 19:27:21',NULL),(11,12931887,12931887,12931887,12931887,'Penghangat Ruangan','1','Kamar Utama',5,'1',8,'2015-11-08 19:28:02',NULL),(12,12312112,12312112,12312112,12312112,'Lampu','1','Kamar Mandi',1,'1',9,'2015-11-08 21:11:57',NULL);

/*Table structure for table `object_status` */

DROP TABLE IF EXISTS `object_status`;

CREATE TABLE `object_status` (
  `object_id` int(3) NOT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `object_status` */

insert  into `object_status`(`object_id`,`active_ind`,`changed_on`,`changed_by`) values (1,1,'2015-10-24 17:17:25',NULL),(2,1,'2015-10-24 17:17:26',NULL);

/*Table structure for table `other_header` */

DROP TABLE IF EXISTS `other_header`;

CREATE TABLE `other_header` (
  `user_pas_dua` char(64) DEFAULT NULL,
  `serial_num` char(16) DEFAULT NULL,
  `version` char(10) DEFAULT NULL,
  `default_class_object` varchar(10) DEFAULT NULL,
  `default_class_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `other_header` */

insert  into `other_header`(`user_pas_dua`,`serial_num`,`version`,`default_class_object`,`default_class_user`) values ('MTIzNDU=',NULL,NULL,'1','1');

/*Table structure for table `profile_master` */

DROP TABLE IF EXISTS `profile_master`;

CREATE TABLE `profile_master` (
  `profile_id` int(4) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(65) DEFAULT NULL,
  `sunday` int(1) DEFAULT NULL,
  `monday` int(1) DEFAULT NULL,
  `tuesday` int(1) DEFAULT NULL,
  `wednesday` int(1) DEFAULT NULL,
  `thursday` int(1) DEFAULT NULL,
  `friday` int(1) DEFAULT NULL,
  `saturday` int(1) DEFAULT NULL,
  `time_active` time DEFAULT NULL,
  `object_id` int(3) NOT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`profile_id`,`object_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `profile_master` */

insert  into `profile_master`(`profile_id`,`profile_name`,`sunday`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saturday`,`time_active`,`object_id`,`changed_on`,`changed_by`) values (1,'Profile 1',1,1,1,1,1,1,1,'00:00:00',2,'2015-11-08 21:09:22',NULL),(1,'Profile 1',1,1,1,1,1,1,1,'00:00:00',3,'2015-11-08 21:09:22',NULL),(1,'Profile 1',1,1,1,1,1,1,1,'00:00:00',7,'2015-11-08 21:09:22',NULL),(1,'Profile 1',1,1,1,1,1,1,1,'00:00:00',8,'2015-11-08 21:09:22',NULL),(1,'Profile 1',1,1,1,1,1,1,1,'00:00:00',11,'2015-11-08 21:09:22',NULL),(16,'Profile 2',0,0,0,0,0,0,0,'00:00:00',3,'2015-11-08 21:03:20',NULL),(16,'Profile 2',0,0,0,0,0,0,0,'00:00:00',8,'2015-11-08 21:03:20',NULL),(16,'Profile 2',0,0,0,0,0,0,0,'00:00:00',9,'2015-11-08 21:03:20',NULL);

/*Table structure for table `profile_status` */

DROP TABLE IF EXISTS `profile_status`;

CREATE TABLE `profile_status` (
  `profile_id` int(4) NOT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `profile_status` */

/*Table structure for table `sched_master` */

DROP TABLE IF EXISTS `sched_master`;

CREATE TABLE `sched_master` (
  `sched_id` int(4) NOT NULL,
  `sched_name` varchar(40) DEFAULT NULL,
  `sched_start_on` datetime DEFAULT NULL,
  `sched_end_on` datetime DEFAULT NULL,
  `object_id` int(3) NOT NULL,
  `object_start_on` time DEFAULT NULL,
  `object_end_on` time DEFAULT NULL,
  `profile_id` int(4) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sched_id`,`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sched_master` */

/*Table structure for table `sched_status` */

DROP TABLE IF EXISTS `sched_status`;

CREATE TABLE `sched_status` (
  `sched_id` int(4) NOT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sched_status` */

/*Table structure for table `session_master` */

DROP TABLE IF EXISTS `session_master`;

CREATE TABLE `session_master` (
  `session_id` int(3) NOT NULL,
  `object_id` int(3) DEFAULT NULL,
  `object_pin_out` int(2) DEFAULT NULL,
  `object_i2c_out` int(1) DEFAULT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `session_master` */

/*Table structure for table `tech_info` */

DROP TABLE IF EXISTS `tech_info`;

CREATE TABLE `tech_info` (
  `object_pin_out` int(2) DEFAULT NULL,
  `object_i2c_out` int(1) DEFAULT NULL,
  `port_id_out` int(1) DEFAULT NULL,
  `tech_id_out` int(2) DEFAULT NULL,
  `object_pin_in` int(2) DEFAULT NULL,
  `object_i2c_in` int(1) DEFAULT NULL,
  `port_id_in` int(1) DEFAULT NULL,
  `tech_id_in` int(2) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tech_info` */

/*Table structure for table `user_log` */

DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user_log` (
  `user_id` varchar(40) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_notif` datetime DEFAULT NULL,
  `num_fail` int(3) DEFAULT NULL,
  `last_ip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_log` */

insert  into `user_log`(`user_id`,`last_login`,`last_notif`,`num_fail`,`last_ip`) values ('admin','2015-11-09 13:28:49',NULL,NULL,NULL),('adminx','2015-10-18 18:59:10',NULL,0,NULL),('adminxx','2015-11-04 18:59:42',NULL,1,'::1'),('adminxxx','2015-10-18 18:56:49',NULL,2,NULL),('adminzxczx','2015-10-18 13:01:01',NULL,1,NULL);

/*Table structure for table `user_master` */

DROP TABLE IF EXISTS `user_master`;

CREATE TABLE `user_master` (
  `user_id` varchar(40) NOT NULL,
  `cust_name` varchar(254) DEFAULT NULL,
  `class_id` varchar(10) DEFAULT NULL,
  `class_num` int(3) DEFAULT NULL,
  `auth_set_object` int(1) DEFAULT NULL,
  `auth_set_profile` int(1) DEFAULT NULL,
  `auth_set_user` int(1) DEFAULT NULL,
  `object_id` varchar(125) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`changed_on`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_master` */

insert  into `user_master`(`user_id`,`cust_name`,`class_id`,`class_num`,`auth_set_object`,`auth_set_profile`,`auth_set_user`,`object_id`,`changed_on`,`changed_by`) values ('admin','admin','admin',0,1,1,1,'1,2','2015-11-01 17:33:17','admin'),('test','test',NULL,NULL,1,1,1,'1,2','2015-11-01 17:20:16','admin');

/*Table structure for table `user_password` */

DROP TABLE IF EXISTS `user_password`;

CREATE TABLE `user_password` (
  `user_id` varchar(64) NOT NULL COMMENT 'Encrypted version of user ID',
  `user_pass_satu` varchar(64) DEFAULT NULL COMMENT 'Encrypted version of password',
  `user_pass_dua` varchar(64) DEFAULT NULL COMMENT 'Encrypted version of password',
  `init_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_password` */

insert  into `user_password`(`user_id`,`user_pass_satu`,`user_pass_dua`,`init_ind`,`changed_on`,`changed_by`) values ('admin','MTIzNDU=','MTIzNDU=',NULL,'2015-11-04 19:02:32','admin'),('c','MTIzNDU=','MTIzNDU=',NULL,'2015-11-04 19:02:31','admin'),('test','MTIzNDU=','MTIzNDU=',NULL,'2015-11-04 19:02:30','admin'),('x','MTIzNDU=','MTIzNDU=',NULL,'2015-11-04 19:02:30','admin'),('xxx','MTIzNDU=','MTIzNDU=',NULL,'2015-11-04 19:02:29','admin'),('yyy','MTIzNDU=','MTIzNDU=',NULL,'2015-11-04 19:02:29','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

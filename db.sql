/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - dbharold
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbharold` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbharold`;

/*Table structure for table `aboutus` */

DROP TABLE IF EXISTS `aboutus`;

CREATE TABLE `aboutus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `atitle` varchar(255) NOT NULL,
  `acontent` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `aboutus` */

insert  into `aboutus`(`id`,`atitle`,`acontent`) values 
(1,'Mission','Develop diverse learners for global citizenship and leadership by sustaining holistic academic excellence for the maximum fulfilment of human potential amidst the ever-evolving society'),
(2,'Vision','A recognized leader in providing multi-disciplinary inclusive quality education that uplifts society in a collaborative global environment'),
(3,'History','Colegio de Sta. Teresa de Avila, a co-educational institution, was founded by spouses Mr. Gregorio H. Roxas Sr. and Mrs. Adoracion S. Roxas, on June 28, 2006.  It is located at 06 Kingfisher Street, Zabarte Subdivision, Kaligayahan, Novaliches, Quezon City. It is one of the fastest-growing higher education institutions in the Northeastern part of Quezon City that is primarily known for its industry-responsive curricular and co-curricular programs.\r\n\r\nConsidering the needs of the community and the demands overseas for more skilled workers, the Roxas couple established a training center for Hotel and Restaurant Services (HRS), Information Communications Technology (ICT), and other short-term courses.\r\n\r\nThe 76 pioneer students were accommodated in a building supposedly constructed to serve the unprecedented increase of student population in the family-owned basic education  school, the St. Theresa\'s School of Novaliches. Driven by a pristine spirit to heed to their humanitarian calling, the Roxas couple typologized the college as a foundation; thus offering minimal tuition fees to financially challenged students.\r\n\r\nIn 2008, three baccalaureate programs were added including Bachelor of Science in Hotel and Restaurant Management (BSHRM), Bachelor of Science in Information Technology (BSIT), and Bachelor of Secondary Education Major in English (BSEd).\r\n\r\nIn June 2009, the rapid increase in student population prompted the administration to acquire the annex building with 5 huge classrooms. Facilities were upgraded and modernized to address the advancement in technology. In response to this phenomenal growth, more professors were added to the roster of faculty.\r\n\r\nIn 2010, the relentless efforts of the administration, the faculty, and the staff in Colegio de Sta. Teresa de Avila yielded fruits when the Commission on Higher Education (CHED) issued Government Recognitions for the operation of BSIT and BSEd. In 2011, the BS Hotel and Restaurant Management likewise obtained recognition.\r\n\r\nBeginning the Second Semester of AY 2010-2011, the School of Education offered three more majors in BSEd that included Filipino, Mathematics, and Social Science. Simultaneous with the addition of such three majors was the offering of a Bachelor of Elementary Education Major in General Education. CSTA continues to upgrade its quality of professors to serve the increasing demands of educators in both private and public schools not only nationwide but likewise worldwide.\r\n\r\nThe CSTA administration purchased additional adjacent lots to respond to the expansion demand for the construction of more educational infrastructure.  In addition to the Gregorio H. Roxas, Sr. Building, the Multipurpose Hall, and the Adoracion S. Roxas Building, the President\'s Building was completed with modern facilities, bigger space, and better educational amenities. \r\n\r\nIn 2017, BS Tourism Management obtained its recognition while Bachelor of Science in Hotel and Restaurant Management changed its nomenclature to Bachelor of Science in Hospitality Management. All degree programs of CSTA have migrated to the new curricula in higher education following the senior high school absorption of some tertiary education curriculum components. CSTA, the home of TESDA Assessors, serves as a TESDA Training and Assessment Center for Events Management Services NC III, Front Office Services NC II, Foods and Beverage Services NC II, Bartending NC II, Housekeeping NC II, Cookery NC II, Bread and Pastry Production NC II and Caregiving NC II. It is also the home of education gurus and leaders with untarnished reputations.\r\nTo sustain the quality performance of both faculty and students, CSTA has affiliations with the Philippine Association for Teachers and Educators (PAFTE), Philippine Society of Information Technology Education (PSITE), and Association of Administrators in Hospitality, Hotel and Restaurant Management Educational Institutions (AAHHRMEI).\r\n\r\nCSTA stands proud of its accomplishments. It has produced well-rounded graduates, quality educators, information technology experts, and successful hoteliers. With this, the college continuously upgrades its governance, leadership, instruction, research, creative works, extension programs, and academic outcomes, thus soaring further toward genuine quality education.\r\n'),
(6,'THE FOX','The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog.\r\n\r\nThe quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog. The quick brOwn fox jumps over the lazy dog.'),
(8,'Harold </td></div>','kjhkhdsfsd kjhdskfhsd fkjhsdkf hsdkfhsdkfhksdfhj s ');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

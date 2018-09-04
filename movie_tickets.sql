-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 10:48 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(2) NOT NULL,
  `branch_name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'เอ็มโพเรียม'),
(2, 'เซ็นทรัลเวิลด์'),
(3, 'เซ็นทรัล พระราม 9'),
(4, 'เซ็นทรัล พลาซา ลาดพร้าว'),
(5, 'เซ็นทรัล พลาซา แจ้งวัฒนะ'),
(6, 'เดอะคริสตัล เอกมัยรามอินทรา'),
(7, 'เอ็มบีเค เซ็นเตอร์'),
(8, 'เทอร์มินอล 21 อโศก'),
(9, 'เดอะมอลล์ บางกะปิ'),
(10, 'เดอะมอลล์ งามวงศ์วาน'),
(11, 'เดอะมอลล์ บางแค'),
(12, 'เดอะมอลล์ ท่าพระ'),
(13, 'เดอะ คริสตัล ราชพฤกษ์'),
(14, 'เซ็นทรัล พลาซา รามอินทรา'),
(15, 'เซ็นทรัล พลาซา รัตนาธิเบศร์'),
(16, 'โรบินสัน ศรีสมาน'),
(17, 'บิ๊กซี บางพลี'),
(18, 'แจส เออเบิร์น ศรีนครินทร์'),
(19, 'เดอะสแควร์ บางใหญ่'),
(20, 'เซ็นทรัล ศาลายา'),
(21, 'เซ็นทรัล พลาซา มหาชัย'),
(22, 'โรบินสัน ลพบุรี'),
(23, 'โรบินสัน สุพรรณบุรี'),
(24, 'โรบินสัน กาญจนบุรี'),
(25, 'โรบินสัน ราชบุรี'),
(26, 'บิ๊กซี เพชรบุรี');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Action '),
(2, 'Adventure '),
(3, 'War '),
(4, 'Drama '),
(5, 'Sci-Fi'),
(6, 'Family '),
(7, 'Thriller '),
(8, 'Crime '),
(9, 'Documentaries '),
(10, 'Animation '),
(11, 'Comedy '),
(12, 'Erotic '),
(13, 'Fantasy '),
(14, 'Musicals '),
(15, 'Romance '),
(16, 'Western ');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cinema_id` int(3) NOT NULL,
  `cinema_name` varchar(150) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `tel` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cinema_id`, `cinema_name`, `branch_id`, `tel`) VALUES
(1, 'เอ็มพรีเว่ ซีเนคลับ', 1, '02-421-2215'),
(2, 'เอส เอฟ เวิลด์ ซีเนม่า', 2, '034-215-445'),
(3, 'เอส เอฟ เอ็กซ์ ซีเนม่า', 3, '034-215-446'),
(4, 'เอส เอฟ เอ็กซ์ ซีเนม่า', 4, '034-215-447'),
(5, 'เอส เอฟ เอ็กซ์ ซีเนม่า', 5, '034-215-445'),
(6, 'เอส เอฟ เอ็กซ์ ซีเนม่า', 6, '034-215-445'),
(7, 'เอส เอฟ ซีเนม่า ', 7, '034-215-445'),
(8, 'เอส เอฟ ซีเนม่า', 8, '034-215-445'),
(9, 'เอส เอฟ ซีเนม่า', 9, '034-215-445'),
(10, 'เอส เอฟ ซีเนม่า ', 10, '034-215-445'),
(11, 'เอส เอฟ ซีเนม่า', 11, '034-215-445'),
(12, 'เอส เอฟ ซีเนม่า', 12, '034-215-445'),
(13, 'เอส เอฟ ซีเนม่า', 13, '034-215-445'),
(14, 'เอส เอฟ ซีเนม่า', 14, '034-215-445'),
(15, 'เอส เอฟ ซีเนม่า', 15, '034-215-445'),
(16, 'เอส เอฟ ซีเนม่า', 16, '034-215-445'),
(17, 'เอส เอฟ ซีเนม่า', 17, '034-215-445'),
(18, 'เอส เอฟ ซีเนม่า', 18, '034-215-445'),
(19, 'เอส เอฟ ซีเนม่า', 19, '034-215-445'),
(20, 'เอส เอฟ ซีเนม่า', 20, '034-215-445'),
(21, 'เอส เอฟ ซีเนม่า', 21, '034-215-445'),
(22, 'เอส เอฟ ซีเนม่า', 22, '034-215-445'),
(23, 'เอส เอฟ ซีเนม่า', 23, '034-215-445'),
(24, 'เอส เอฟ ซีเนม่า', 24, '034-215-445'),
(25, 'เอส เอฟ ซีเนม่า', 25, '034-215-445'),
(26, 'เอส เอฟ ซีเนม่า', 26, '034-215-445');

-- --------------------------------------------------------

--
-- Table structure for table `cinema_movie`
--

CREATE TABLE `cinema_movie` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `date_show` date NOT NULL,
  `time_show` time NOT NULL,
  `theater` int(11) NOT NULL,
  `projection_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cinema_movie`
--

INSERT INTO `cinema_movie` (`id`, `cinema_id`, `movie_id`, `date_show`, `time_show`, `theater`, `projection_id`) VALUES
(323, 24, 3, '2018-05-16', '00:12:00', 1, 2),
(320, 1, 9, '2018-05-15', '13:00:00', 1, 1),
(317, 1, 29, '2018-05-14', '10:25:00', 1, 2),
(318, 1, 6, '2018-05-15', '14:33:00', 1, 2),
(319, 24, 2, '2018-05-15', '13:41:00', 1, 2),
(321, 1, 29, '2018-05-16', '06:25:00', 1, 2),
(324, 1, 2, '2018-05-17', '00:00:00', 1, 1),
(325, 1, 28, '2018-05-17', '10:40:00', 1, 1),
(326, 1, 6, '2018-05-17', '00:50:00', 1, 2),
(327, 1, 3, '2018-05-17', '19:30:00', 1, 1),
(328, 1, 6, '2018-05-17', '19:50:00', 1, 1),
(329, 1, 6, '2018-05-17', '21:30:00', 1, 1),
(330, 1, 6, '2018-05-17', '20:00:00', 2, 1),
(331, 1, 6, '2018-05-17', '22:20:00', 1, 1),
(332, 2, 9, '2018-05-18', '15:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(2) NOT NULL,
  `gender_name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'ชาย'),
(2, 'หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `initial`
--

CREATE TABLE `initial` (
  `initial_id` int(2) NOT NULL,
  `initial_name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `initial`
--

INSERT INTO `initial` (`initial_id`, `initial_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(3) NOT NULL,
  `movie_name_th` varchar(300) NOT NULL,
  `movie_name_eng` varchar(300) NOT NULL,
  `audience` varchar(10) NOT NULL,
  `length_time` int(11) NOT NULL,
  `movie_date` date NOT NULL,
  `deteil` text NOT NULL,
  `img` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name_th`, `movie_name_eng`, `audience`, `length_time`, `movie_date`, `deteil`, `img`, `category_id`) VALUES
(2, 'เรดดี้ เพลเยอร์ วัน สงครามเกมคนอัจฉริยะ', 'Ready Player One', 'G', 140, '2018-03-29', 'เรื่องราวที่เกิดขึ้นเมื่อปี 2045 ช่วงที่โลกเต็มไปด้วยความวุ่นวายและการล่มสลาย แต่ผู้คนพบทางรอดชีวิตที่ the OASIS ซึ่งเป็นจักรวาลเสมือนจริงอันกว้างใหญ่ที่สร้างขึ้นมาโดย เจมส์ ฮัลลิเดย์ ผู้มีความอัจฉริยะอย่างไม่ธรรมดา (มาร์ค ไรแลนซ์). เมื่อฮัลลิเดย์เสียชีวิตลง เขาได้ทิ้งทรัพย์สมบัติมหาศาลเอาไว้ให้กับคนแรกที่พบไข่อีสเตอร์ดิจิตอลที่เขาซ่อนไว้ในสถานที่หนึ่งใน the OASIS จนเกิดการแข่งขันขึ้นทั่วโลก', '20180517aBybPOhSEN.jpg', 5),
(3, 'หลวงพี่แจ๊ส 5G', 'Luang Pee Jazz 5G', '15', 120, '2018-04-05', 'หลังจากเหตุการณ์วุ่นวายที่หลวงพี่แจ๊ส (แจ๊ส ชวนชื่น) ได้เข้ามาพบเจอเรื่องราวมากมาย ในเมืองหลวงก็ทำให้ท่านได้รับรู้ถึงการใช้ชีวิตที่ไม่ว่าจะเป็นคนธรรมดาหรือว่าเป็นพระภิกษุ ก็ไม่สามารถหลุดพ้นจากเรื่องของความรัก,ความโลภ,ความโกรธและความหลงได้ มีเพียงแต่หลักธรรมคำสอนของพระพุทธศาสนาที่จะค่อยช่วยยึดเหนี่ยวและขัดเกลาจิตใจให้มนุษย์เป็นคนดีและเหตุการณ์วันนั้นก็ทำให้หลวงพี่แจ๊สได้ตัดสินใจบวชต่อไปโดยไม่มีกำหนดสึกหลวงพี่แจ๊สตั้งใจว่าอยากเผยแผ่หลักธรรมคำสอนให้แก่พุทธศาสนิกชนได้เข้าถึงพระพุทธศาสนาอย่างแท้จริงแต่ด้วยหลวงพี่แจ๊สเองก็ยังไม่ได้มีความรู้เกี่ยวกับพุทธศานามากมายนัก ท่านจึงออกธุดงพร้อมกับลูกศิษท์คนสนิทนั่นก็คือมโน(นิก คุณาธิป)กับสายสิญจน์(โต้ส อัครัช)ทั้ง3ออกตามหาความสงบสุขที่แท้จริงว่าเป็นเช่นไร จนกระทั่งวันหนึ่งระหว่างธุดงอยู่ที่จังหวัดสุราษฎหลวงพี่แจ๊สได้ข่าวมาว่าหลวงพ่อจงรวย (หยองลูกหยี)ได้มาย้ายมาเป็นเจ้าอาวาสอยู่ที่วัดในจังหวัดหลวงพี่แจ๊สจึงถือโอกาสไปกราบนมัสการหลวงพ่อ เมื่อพบหลวงพ่อหลวงพ่อก็ได้ไหว้วานหลวงพี่แจ๊สให้พาเณรไปหาหลวงพ่อไชยา(จตุรงค์ พลบูรณ์)ที่กรุงเทพ จึงทำให้หลวงพี่แจ๊สและลูกศิษย์คนสนิททั้ง 2 ได้เข้ามากรุงเทพอีกครั้ง และเมื่อหลวงพี่แจ๊สมาถึงวัดของหลวงพ่อไชยาแล้วก็ได้นำเณรมาฝากให้กับหลวงพ่อเป็นที่เรียบร้อยหลวงพี่แจ๊สก็ได้ขอตัวลากลับไปออกธุดงค์ต่อแต่ว่าหลวงพ่อไชยาได้ขอให้หลวงพี่แจ๊สอยู่ที่วัดต่อเพราะด้วยเหตุผลที่หลวงพี่แจ๊สมีชื่อเสียงและพอที่จะทำประโยชน์ให้กับวัดได้ บางวันหลวงพ่อก็ให้หลวงพี่แจ๊สเป็นพีเซนเตอร์วัดในด้านต่างๆ แต่ยิ่งอยู่นานขึ้นหลวงพี่แจ๊สก็ได้เห็นความไม่ชอบมาพากลของหลวงพ่อและพระลูกวัดที่ใช้อำนาจหน้าที่ในการบริหารวัดในทางที่ไม่ถูกไม่ควรทำให้พระอย่างหลวงพี่แจ๊สอยู่นิ่งเฉยไม่ได้และเรื่องราวความวุ่นวายจากการสืบหาความจริงก็เริ่มต้นขึ้นที่วัดแห่งนี้และคราวนี้หลวงพี่แจ๊สจะต้องเจอกับเหตุการณ์ร้ายๆอะไรอีก มาร่วมเอาใจช่วยหลวงพี่แจ๊สกันใน หลวงพี่แจ๊ส 5G ', '20180517180CiP2v8F.jpg', 11),
(4, 'แรมเพจ ใหญ่ชนยักษ์', 'Rampage', 'G', 105, '2018-04-12', '\"Rampage\"  คือเรื่องราวของนักวานรวิทยา ดาวิส โอโคเย (จอห์นสัน) ชายผู้หลบเลี่ยงห่างไกลจากผู้คน เขามีสายสัมพันธ์อันแน่นหนาที่ไม่มีวันสั่นคลอนกับจอร์จ กอริล่าหลังเงินที่เฉลียวฉลาดยิ่งกว่ากอริลล่าทั่วไปที่เขาเป็นผู้เลี้ยงดูมาตั้งแต่มันเกิด แต่แล้วยีนส์แห่งความโหดร้ายในร่างมันได้เกิดการกลายพันธุ์ และเปลี่ยนกอริลล่าแสนสุภาพตัวนี้ให้กลายเป็นสิ่งมีชีวิตที่โหดร้ายตัวใหญ่ยักษ์ และทุกสิ่งเลวร้ายยิ่งขึ้น เมื่อได้มีการค้นพบว่า แท้จริงแล้วยังมีสัตว์อื่นอีกมายมายที่เกิดการกลายพันธุ์เช่นเดียวกัน พวกมันกลายเป็นนักล่าที่อยู่เหนือทุกขีวิตและมุ่งหน้าสู่อเมริกาเหนือ ทำลายทุกสิ่งที่ขวางทางของพวกมัน กลุ่มของโอโคเยและนักพันธุวิศวกรรมผู้ไม่น่าเชื่อถือต้องปกป้องแอนติโดส ต่อสู้กับอุปสรรคขวากหนามและปัญหามากมายที่มาเยือนอย่างไม่ซ้ำ ไม่เพียงเพื่อหยุดยั้งจุดจบของโลก ทว่าเพื่อช่วยสิ่งมีชีวิตที่น่าหวาดหวั่น ที่ครั้งหนึ่ง เคยเป็นเพื่อนของเขาเอง', '20180517IcBk2Spt7H.jpg', 5),
(5, 'โคตรแท็กซี่ขับระเบิด', 'Taxi 5', '15', 105, '2018-04-19', 'เรื่องราวของ ซิลเวียง มาโคร นายตำรวจที่ได้ถูกสั่งย้ายไปประจำการที่สถานีตำรวจในเมืองมาร์กเซย ภารกิจของเขาคือออกไล่ล่าปราบแก๊งโจรอิตาเลียนที่ใช้รถเฟอร์รารีแรงม้าทรงพลังในการปล้นธนาคาร งานนี้ซิลเวียงจึงต้องแท็กทีมกับ เอ็ดดี มาคลูฟ คนขับแท็กซี่สายซิ่งเพื่อออกตามหารถแท็กซี่เปอร์โยสีขาวในตำนานที่โคตรแรงทั้งสมรรถนะ ความเร็ว และเทคโนโลยี เพื่อใช้ต่อกรกับแก๊งโจร', '20180517WZx0X86OlJ.jpg', 1),
(6, 'มหาสงครามล้างจักรวาล', 'Avengers: Infinity War ', 'TBC', 150, '2018-04-25', '“เหล่าอเวนเจอร์ยังคงต้องปกป้องโลกจากภัยอันตรายครั้งใหญ่ที่เกินกว่าที่ซุปเปอร์ฮีโร่คนเดียวจะรับมือได้ อันตรายครั้งใหม่นั้นมาจากเงามืดของจักรวาล ‘ทานอส’ จอมเผด็จการแห่งจักรวาล เป้าหมายของเขาคือการรวบรวมอัญมณี อินฟินิตี้สโตนส์ทั้งหก เพื่อครอบครองพลังที่เกินจะจินตนาการถึง และใช้พวกมันในการเปลี่ยนแปลงความจริงทั้งมวลของจักรวาล ทุกสิ่งทุกอย่างที่อเวนเจอร์ต่อสู้มาก็เพื่อสิ่งนี้ ชะตากรรมของโลกและจักรวาลไม่เคยสั่นคลอนเท่านี้มาก่อน”', '20180517CtUjSjIQ5o.jpg', 1),
(7, 'เนิร์ดแล้วไง มีหัวใจนะเว้ย', 'Please Stand By', 'G', 95, '2018-04-19', 'เด็กสาวออทิสติกได้หลบหนีจากผู้ดูแลของเธอเพื่อไปส่งต้นฉบับบทภาพยนตร์เรื่อง \"Star Trek\" ความยาวกว่า 500 หน้า เพื่อให้ทันการแข่งขันเขียนบทในฮอลลีวูด นี่คือการเดินทางที่เต็มไปด้วยเสียงหัวเราะและหยาดน้ำตา แสดงโดย ดาโกต้า แฟนนิ่ง ติดตามจิตวิญญาณของมิสเตอร์สป็อกในการเดินทางสู่ดินแดนที่เธอไม่รู้จัก \"มันคือสิ่งที่เราจะพิชิต ไม่ต้องกลัว\" กำกับโดย เบน เลวิน (จากเรื่อง The Sessions) และร่วมแสดงโดยนักแสดงผู้เข้าชิงรางวัลออสการ์ โทนี คอลเล็ตต์ และแขกรับเชิญสุดพิเศษที่จะมาปรากฎตัวด้วยคือ แพตตัน ออสวอลท์', '201805172U3BNoSDTE.jpg', 4),
(8, 'ฮักแพง', 'hukpang', 'TBC', 90, '2018-05-01', 'อีสานมีวัฒนธรรมประเพณีที่มีเอกลักษณ์โดดเด่นมากมายที่เหล่าบรมครูสร้างไว้ให้คนรุ่นหลังสืบทอดต่อๆ กันมาอย่างยาวนาน โดยวัฒนธรรมที่เด่นชัดคือ “หมอลำ” ที่สามารถให้คนรุ่นลูกรุ่นหลานนำเอามาเป็นอาชีพเลี้ยงดูชีวิตของตนเอง', '201805175oJmXQgbAf.jpg', 15),
(9, 'เดดพูล 2', 'Deadpool 2', 'TBC', 0, '2018-05-17', '', '20180517dnBXatVIiS.jpg', 1),
(10, 'น้อง.พี่.ที่รัก', 'Brother of the Year', 'TBC', 0, '2018-05-10', 'ตั้งแต่เด็ก ชัช (ซันนี่ สุวรรณเมธานนท์) คิดมาตลอดว่าน้องที่อยู่ในท้องแม่คือ น้องชาย พอถึงวันที่แม่คลอดแล้วกลายเป็นน้องสาว ชัชจึงเซ็งระดับสิบ ความฝันที่จะได้เล่นหุ่นยนต์และเตะบอลแมนๆกับน้องก็จบไป เพราะเล่นกับไอ้เจน (อุรัสยา เสปอร์บันด์) ทีไร มันก็ร้องไห้งอแงทุกที ตั้งแต่เด็กจนโต ชัชกับเจนตีกันได้ ทุกเรื่อง เพราะเจนชอบทำตัวเหมือนเป็นแม่มากกว่าเป็นน้อง ส่วนชัชก็ชอบทำตัวเป็นภาระมากกว่าเป็นพี่จะมีพี่ชายคนไหนที่ห่วยกว่าน้องสาวไปซะทุกด้าน ไม่ว่าจะเป็นเรื่องการเรียน กีฬา หน้าตา นิสัย แข่งกันยังไง เจนก็เพอร์เฟคกว่า เวลาเดียวที่ชัชจะโชว์เหนือทำตัวเป็นพี่ ก็คือตอนที่มีคนมาจีบเจน ชัชจะทำตัวกร่างไล่หนุ่มๆให้หนีหายไปหมด เหมือนเป็นการเอาคืน', '20180517kuUfwwaKKl.jpg', 15),
(29, 'จูราสสิค เวิร์ด ภาค 2', 'Jurassic World: Fallen Kingdom', 'TBC', 0, '2018-06-07', 'ด้วยความมหัศจรรย์ การผจญภัยและความตื่นเต้นลุ้นระทึกในแบบของหนึ่งในแฟรนไชส์ภาพยนตร์ที่ได้รับความนิยมสูงสุดและประสบความสำเร็จสูงสุดในประวัติศาสตร์ ในภาพยนตร์ฟอร์มยักษ์เรื่องใหม่นี้ เราจะได้เห็นการกลับมาของตัวละครและไดโนเสาร์ตัวโปรดของเราอีกครั้ง พร้อมด้วยไดโนเสาร์พันธุ์ใหม่ๆ ที่น่าอัศจรรย์ใจและน่าสะพรึงกลัวยิ่งกว่าแต่ก่อน ยินดีต้อนรับสู่ Jurassic World: Fallen Kingdom', '20180517uG5bPQDq7D.jpg', 1),
(28, 'ตุ๊ดตู่กู้ชาติ', 'ตุ๊ดตู่กู้ชาติ', 'TBC', 0, '2018-05-24', 'ติดตามเรื่องย่อเร็วๆ นี้', '201805170j3dUzce2m.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `projection_system`
--

CREATE TABLE `projection_system` (
  `projection_id` int(11) NOT NULL,
  `projection_name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projection_system`
--

INSERT INTO `projection_system` (`projection_id`, `projection_name`) VALUES
(1, '4K'),
(2, '3D Cinema');

-- --------------------------------------------------------

--
-- Table structure for table `status_user`
--

CREATE TABLE `status_user` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_user`
--

INSERT INTO `status_user` (`status_id`, `status_name`) VALUES
(1, 'ผู้ใช้งาน'),
(2, 'ผู้ดูแลระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `initial_id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status_id` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `email`, `password`, `initial_id`, `firstname`, `lastname`, `gender_id`, `phone`, `image`, `status_id`) VALUES
(1, 'admin', '123456', 1, 'admin', 'admin', 1, '0983023001', '20180517k0JQnRaqxZ.jpg', 2),
(2, 'Teerapon.sa58@kru.ac.th', '123456', 1, 'ธีรพล', 'สังขไพรวรรณ', 1, '0987284058', '20180517a9ARQzPuK9.jpg', 1),
(16, 'test', '123456', 1, 'safd', 'safd', 2, '09886456', '20180517veRN9YxLoc.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `tickets_id` int(11) NOT NULL,
  `around_id` int(11) NOT NULL,
  `t_row` varchar(2) NOT NULL,
  `num` int(2) NOT NULL,
  `price` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`tickets_id`, `around_id`, `t_row`, `num`, `price`, `email`, `phone`, `status`) VALUES
(94, 325, 'A', 15, 200, 'test', '09886456', 2),
(93, 325, 'A', 14, 200, 'test', '09886456', 2),
(92, 325, 'A', 13, 200, 'test', '09886456', 2),
(91, 325, 'A', 12, 200, 'test', '09886456', 2),
(90, 325, 'A', 11, 200, 'test', '09886456', 2),
(89, 325, 'A', 10, 200, 'Teerapon.sa58@kru.ac.th', '0987284058', 2),
(87, 324, 'A', 15, 200, 'Teerapon.sa58@kru.ac.th', '0987284058', 2),
(86, 324, 'A', 16, 200, 'Teerapon.sa58@kru.ac.th', '0987284058', 2),
(88, 325, 'A', 9, 200, 'Teerapon.sa58@kru.ac.th', '0987284058', 2),
(84, 320, 'AA', 5, 500, 'admin', '0983023001', 2),
(83, 320, 'AA', 4, 500, '', '', 1),
(95, 325, 'A', 16, 200, 'test', '09886456', 2),
(96, 325, 'A', 17, 200, 'test', '09886456', 2),
(97, 326, 'A', 10, 230, 'test', '09886456', 2),
(98, 326, 'A', 9, 230, 'test', '09886456', 2),
(99, 324, 'AA', 3, 500, '', '', 1),
(100, 332, 'A', 10, 230, 'test', '09886456', 2),
(101, 332, 'A', 9, 230, 'test', '09886456', 2),
(102, 332, 'A', 12, 230, 'test', '09886456', 2),
(103, 332, 'A', 11, 230, 'test', '09886456', 2),
(104, 332, 'D', 14, 210, 'test', '09886456', 2),
(105, 332, 'D', 8, 210, 'test', '09886456', 2),
(106, 332, 'D', 9, 210, 'test', '09886456', 2),
(107, 332, 'D', 13, 210, 'test', '09886456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cinema_id`);

--
-- Indexes for table `cinema_movie`
--
ALTER TABLE `cinema_movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `initial`
--
ALTER TABLE `initial`
  ADD PRIMARY KEY (`initial_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `projection_system`
--
ALTER TABLE `projection_system`
  ADD PRIMARY KEY (`projection_id`);

--
-- Indexes for table `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`tickets_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `cinema_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cinema_movie`
--
ALTER TABLE `cinema_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `initial`
--
ALTER TABLE `initial`
  MODIFY `initial_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `projection_system`
--
ALTER TABLE `projection_system`
  MODIFY `projection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_user`
--
ALTER TABLE `status_user`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `tickets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

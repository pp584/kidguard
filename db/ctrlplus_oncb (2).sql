-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 04, 2023 at 04:45 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctrlplus_oncb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment1`
--

CREATE TABLE `assessment1` (
  `id` int(11) NOT NULL,
  `ref_assessment_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL COMMENT 'จังหวัด',
  `section` int(11) NOT NULL,
  `question_1` int(11) NOT NULL COMMENT '1.เพศ[1=ชาย,2=หญิง]',
  `question_2` int(11) NOT NULL COMMENT '2.อายุ',
  `question_3` int(11) NOT NULL COMMENT '3.สถานภาพการศึกษา[1=1.ศึกษาอยู่,2=2. ไม่ได้ศึกษา]',
  `question_4` int(11) NOT NULL COMMENT '4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่',
  `question_5` int(11) NOT NULL COMMENT '5.จำนวนพี่น้อง[1=1. เป็นลูกคนเดียว,2=2. มีพี่น้องรวมทั้งหมด]',
  `question_6` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'กรุณากรอก',
  `question_7` int(11) NOT NULL COMMENT '6.สถานภาพทางครอบครัว[1=1. บิดามารดาอยู่ด้วยกัน,2=2. บิดามารดาแยกกันอยู่,3=3. บิดาเสียชีวิตแล้ว,4=4. มารดาเสียชีวิตแล้ว,5=5. บิดาและมารดาเสียชีวิตแล้ว]',
  `question_8` int(11) NOT NULL COMMENT '7.อาชีพของบิดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]',
  `question_9` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '8. อาชีพของมารดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]',
  `question_10` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]',
  `question_11` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'กรุณากรอก',
  `question_12` int(11) NOT NULL COMMENT '11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]',
  `question_13` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)[1=1,2=2,3=3,4=4,5=5,6=6,7=7,8=8,9=9,10=10,11=11,12=อื่น ๆ โปรดระบุ]',
  `question_14` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'กรุณากรอก',
  `question_15` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `question_16` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `question_17` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `create_datetime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตอนที่ 1 ข้อมูลพื้นฐาน';

--
-- Dumping data for table `assessment1`
--

INSERT INTO `assessment1` (`id`, `ref_assessment_id`, `province_id`, `section`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `question_7`, `question_8`, `question_9`, `question_10`, `question_11`, `question_12`, `question_13`, `question_14`, `question_15`, `question_16`, `question_17`, `create_datetime`) VALUES
(102, 90, 0, 10, 1, 13, 1, 1, 1, '1', 6, 6, '1', '0', '2', 0, '0', '2', '2', '2', '2', '2023-10-03'),
(103, 91, 0, 10, 1, 14, 1, 2, 6, '1', 5, 5, '1', '1', '2', 0, '0', '4', '2', '2', '1', '2023-10-03'),
(104, 92, 0, 10, 1, 13, 1, 1, 1, '1', 5, 6, '1', '1', '2', 0, '0', '2', '2', '2', '4', '2023-10-03'),
(105, 93, 0, 10, 2, 15, 1, 3, 2, '1', 5, 5, '1', '1', '2', 0, '0', '2', '3', '2', '3', '2023-10-03'),
(106, 94, 0, 10, 2, 14, 1, 3, 3, '2', 5, 5, '1', '0', '2', 0, '0', '3', '4', '3', '2', '2023-10-03'),
(107, 95, 0, 10, 1, 13, 1, 1, 1, '1', 5, 5, '2', '1', '2', 0, '0', '3', '2', '2', '4', '2023-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `assessment2`
--

CREATE TABLE `assessment2` (
  `id` int(11) NOT NULL,
  `ref_assessment_id` int(11) NOT NULL,
  `quest_1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_4` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_5` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_6` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_7` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_8` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_9` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_10` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_11` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_12` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_13` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_14` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_15` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_16` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_17` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_18` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_19` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_20` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_21` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_22` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_23` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_24` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_25` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_26` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_27` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_28` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_29` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_30` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_31` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_32` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_33` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_34` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_35` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_36` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_37` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_38` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_39` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_40` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_41` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_42` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_43` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_44` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_45` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_46` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_47` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_48` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_49` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_50` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_51` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_52` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_53` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_54` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_55` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_56` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_57` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_58` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_59` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_60` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_61` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_62` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_63` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_64` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_65` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_66` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_67` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_68` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_69` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_70` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_71` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_72` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_73` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_74` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_75` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_76` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_77` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_78` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_79` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_80` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_81` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_82` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_83` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_84` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_85` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_86` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_87` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_88` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_89` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_90` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_91` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_92` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_93` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_94` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_95` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_96` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_97` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_98` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_99` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_100` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_101` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_102` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_103` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_104` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_105` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_106` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_107` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_108` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_109` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_110` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_111` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_112` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_113` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_114` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment2`
--

INSERT INTO `assessment2` (`id`, `ref_assessment_id`, `quest_1`, `quest_2`, `quest_3`, `quest_4`, `quest_5`, `quest_6`, `quest_7`, `quest_8`, `quest_9`, `quest_10`, `quest_11`, `quest_12`, `quest_13`, `quest_14`, `quest_15`, `quest_16`, `quest_17`, `quest_18`, `quest_19`, `quest_20`, `quest_21`, `quest_22`, `quest_23`, `quest_24`, `quest_25`, `quest_26`, `quest_27`, `quest_28`, `quest_29`, `quest_30`, `quest_31`, `quest_32`, `quest_33`, `quest_34`, `quest_35`, `quest_36`, `quest_37`, `quest_38`, `quest_39`, `quest_40`, `quest_41`, `quest_42`, `quest_43`, `quest_44`, `quest_45`, `quest_46`, `quest_47`, `quest_48`, `quest_49`, `quest_50`, `quest_51`, `quest_52`, `quest_53`, `quest_54`, `quest_55`, `quest_56`, `quest_57`, `quest_58`, `quest_59`, `quest_60`, `quest_61`, `quest_62`, `quest_63`, `quest_64`, `quest_65`, `quest_66`, `quest_67`, `quest_68`, `quest_69`, `quest_70`, `quest_71`, `quest_72`, `quest_73`, `quest_74`, `quest_75`, `quest_76`, `quest_77`, `quest_78`, `quest_79`, `quest_80`, `quest_81`, `quest_82`, `quest_83`, `quest_84`, `quest_85`, `quest_86`, `quest_87`, `quest_88`, `quest_89`, `quest_90`, `quest_91`, `quest_92`, `quest_93`, `quest_94`, `quest_95`, `quest_96`, `quest_97`, `quest_98`, `quest_99`, `quest_100`, `quest_101`, `quest_102`, `quest_103`, `quest_104`, `quest_105`, `quest_106`, `quest_107`, `quest_108`, `quest_109`, `quest_110`, `quest_111`, `quest_112`, `quest_113`, `quest_114`) VALUES
(39, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment3`
--

CREATE TABLE `assessment3` (
  `id` int(11) NOT NULL,
  `ref_assessment_id` int(11) NOT NULL,
  `quest_1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_4` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_5` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_6` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_7` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_8` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_9` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_10` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_11` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_12` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_13` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_14` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_15` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_16` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_17` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_18` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_19` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_20` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_21` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_22` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_23` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_24` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_25` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_26` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_27` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_28` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_29` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_30` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_31` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_32` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_33` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_34` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_35` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_36` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_37` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_38` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_39` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_40` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_41` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_42` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_43` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_44` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_45` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_46` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_47` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_48` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_49` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_50` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_51` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_52` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_53` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_54` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_55` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_56` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_57` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_58` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_59` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_60` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_61` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_62` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_63` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_64` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_65` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_66` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_67` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_68` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_69` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_70` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_71` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_72` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_73` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_74` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_75` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_76` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_77` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_78` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_79` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_80` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_81` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_82` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_83` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_84` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_85` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_86` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_87` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_88` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_89` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_90` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_91` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_92` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_93` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_94` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_95` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_96` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_97` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_98` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment3`
--

INSERT INTO `assessment3` (`id`, `ref_assessment_id`, `quest_1`, `quest_2`, `quest_3`, `quest_4`, `quest_5`, `quest_6`, `quest_7`, `quest_8`, `quest_9`, `quest_10`, `quest_11`, `quest_12`, `quest_13`, `quest_14`, `quest_15`, `quest_16`, `quest_17`, `quest_18`, `quest_19`, `quest_20`, `quest_21`, `quest_22`, `quest_23`, `quest_24`, `quest_25`, `quest_26`, `quest_27`, `quest_28`, `quest_29`, `quest_30`, `quest_31`, `quest_32`, `quest_33`, `quest_34`, `quest_35`, `quest_36`, `quest_37`, `quest_38`, `quest_39`, `quest_40`, `quest_41`, `quest_42`, `quest_43`, `quest_44`, `quest_45`, `quest_46`, `quest_47`, `quest_48`, `quest_49`, `quest_50`, `quest_51`, `quest_52`, `quest_53`, `quest_54`, `quest_55`, `quest_56`, `quest_57`, `quest_58`, `quest_59`, `quest_60`, `quest_61`, `quest_62`, `quest_63`, `quest_64`, `quest_65`, `quest_66`, `quest_67`, `quest_68`, `quest_69`, `quest_70`, `quest_71`, `quest_72`, `quest_73`, `quest_74`, `quest_75`, `quest_76`, `quest_77`, `quest_78`, `quest_79`, `quest_80`, `quest_81`, `quest_82`, `quest_83`, `quest_84`, `quest_85`, `quest_86`, `quest_87`, `quest_88`, `quest_89`, `quest_90`, `quest_91`, `quest_92`, `quest_93`, `quest_94`, `quest_95`, `quest_96`, `quest_97`, `quest_98`) VALUES
(37, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment4`
--

CREATE TABLE `assessment4` (
  `id` int(11) NOT NULL,
  `ref_assessment_id` int(11) NOT NULL,
  `quest_1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_4` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_5` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_6` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_7` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_8` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_9` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_10` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_11` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_12` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_13` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_14` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_15` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_16` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_17` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_18` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_19` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_20` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_21` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_22` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quest_23` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment4`
--

INSERT INTO `assessment4` (`id`, `ref_assessment_id`, `quest_1`, `quest_2`, `quest_3`, `quest_4`, `quest_5`, `quest_6`, `quest_7`, `quest_8`, `quest_9`, `quest_10`, `quest_11`, `quest_12`, `quest_13`, `quest_14`, `quest_15`, `quest_16`, `quest_17`, `quest_18`, `quest_19`, `quest_20`, `quest_21`, `quest_22`, `quest_23`) VALUES
(44, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_form`
--

CREATE TABLE `assessment_form` (
  `id` int(11) NOT NULL,
  `assessment_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `draf` int(11) NOT NULL COMMENT 'Draf[1=Draf,2=Submit]',
  `import_year_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment_form`
--

INSERT INTO `assessment_form` (`id`, `assessment_code`, `create_date`, `draf`, `import_year_data`) VALUES
(90, '16962997921', '2023-10-03 00:00:00', 0, 0),
(91, '16962997922', '2023-10-03 00:00:00', 0, 0),
(92, '16962997923', '2023-10-03 00:00:00', 0, 0),
(93, '16962997924', '2023-10-03 00:00:00', 0, 0),
(94, '16962997925', '2023-10-03 00:00:00', 0, 0),
(95, '16962997926', '2023-10-03 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `basic_information`
--

CREATE TABLE `basic_information` (
  `basic_information_id` int(11) NOT NULL COMMENT 'id',
  `code_name` char(20) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `province` int(2) NOT NULL COMMENT 'จังหวัด',
  `section` int(2) NOT NULL COMMENT 'ส่วน',
  `sex` int(255) NOT NULL COMMENT 'เพศ[1=ชาย,2=หญิง]',
  `age` varchar(2) NOT NULL COMMENT 'อายุ',
  `edu1` varchar(2) NOT NULL COMMENT 'สถานภาพการศึกษา[1=ศึกษาอยู่,2=ไม่ได้ศึกษา]',
  `edu_id` varchar(2) NOT NULL COMMENT 'ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่',
  `sisbro` varchar(3) NOT NULL COMMENT 'จำนวนพี่น้อง[1=เป็นลูกคนเดียว,2=มีพี่น้องรวมทั้งหมด]',
  `sisbro_remain` varchar(3) NOT NULL COMMENT 'อื่นๆ ',
  `family_status` varchar(3) NOT NULL COMMENT 'สถานภาพทางครอบครัว[1=บิดามารดาอยู่ด้วยกัน,2=บิดามารดาแยกกันอยู่,3=บิดาเสียชีวิตแล้ว,4=มารดาเสียชีวิตแล้ว,5=บิดาและมารดาเสียชีวิตแล้ว]',
  `dad_job` varchar(3) NOT NULL COMMENT 'อาชีพของบิดา[1=เกษตร,2=รับราชการ,3=พนักงานเอกชน,4=รัฐวิสาหกิจ,5=รับจ้างทั่วไป,6=ธุรกิจส่วนตัว,7=อื่นๆ]',
  `dad_job_remain` varchar(255) DEFAULT NULL COMMENT 'อื่นๆ ',
  `mom_job` varchar(3) NOT NULL COMMENT 'อาชีพของมารดา[1=เกษตร,2=รับราชการ,3=พนักงานเอกชน,4=รัฐวิสาหกิจ,5=รับจ้างทั่วไป,6=ธุรกิจส่วนตัว,7=อื่นๆ]',
  `mom_job_remain` varchar(255) DEFAULT NULL COMMENT 'อื่นๆ ',
  `family_earn` varchar(3) NOT NULL COMMENT 'รายได้ของครบอครัว[1=ต่ำกว่า15000บาท,2=15000-30000,3=30001-40000,4=40001-50000,5=มากกว่า50000]',
  `consult` varchar(255) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง(ตอบได้มากกว่า1ข้อ)[1=บิดา,2=มารดา,3=ญาติ,4=เพื่อน,5=ครู,6=คนรัก,7=อื่นๆ]',
  `consult_remain` varchar(255) DEFAULT NULL COMMENT 'อื่นๆ ',
  `try_drugs` varchar(3) NOT NULL COMMENT 'ท่านเคยถูกให้ลองสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]',
  `type_drugs` varchar(3) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง(ตอบได้มากกว่า1ข้อ)[1=ยาบ้า,2=ยาอี,3=ยาเค,4=ฝิ่น,5=เฮโรอีน,6=กัญชา,7=ใบกระท่อม,8=ทินเนอร์,9=ยาไอซ์,10=บุหรี่,11=สุรา,12=อื่นๆ]',
  `type_drugs_remain` varchar(255) DEFAULT NULL COMMENT 'อื่นๆ '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `basic_resuscitation`
--

CREATE TABLE `basic_resuscitation` (
  `basic_resuscitation_id` int(11) NOT NULL,
  `service_information_id` int(11) NOT NULL,
  `first_life_resuscitation` int(11) DEFAULT NULL COMMENT 'การทำกู้ชีพเบื้องต้น ก่อนทีมปฏิบัติการแพทย์ฉุกเฉินมาถึง[1=มี,2=ไม่มี]',
  `methods_first_life_resuscitation` int(11) DEFAULT NULL COMMENT 'ลักษณะของการทำกู้ชีพเบื้องต้น[1=Compressions only (กดหน้าอกอย่างเดียว),2=Chest compressions and mouth or bag ventilations (กดหน้าอกร่วมกับช่วยหายใจทางปากหรือถุงลม),3=Mouth or bag ventilations only (ช่วยหายใจทางปากหรือถุงลมอย่างเดียว),4=AED,5=Stop bleeding (ห้ามเลือด),6=Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า),7=อื่นๆ',
  `rescuer_cpr` int(11) DEFAULT NULL COMMENT 'ผู้ทำการกู้ชีพ (CPR) เบื้องต้น[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์,3=อื่นๆ]',
  `rescuer_cpr_general_public` int(11) DEFAULT NULL COMMENT 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]',
  `rescuer_cpr_medical_personnel` int(11) DEFAULT NULL COMMENT 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]',
  `rescuer_cpr_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ',
  `general_public_aed` int(11) DEFAULT NULL COMMENT 'มี AED ในที่สาธารณะ[1=มี,2=ไม่มี]',
  `use_general_public_aed` int(11) DEFAULT NULL COMMENT 'มีการใช้ AED โดยผู้พบเห็นเหตุการณ์ ณ จุดเกิดเหตุ[1=มี,2=ไม่มี]',
  `first_use_aed` int(11) DEFAULT NULL COMMENT 'ผู้ที่ใช้ AED คนแรก ณ จุดเกิดเหตุ[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์]',
  `first_use_aedgeneral_public` int(11) DEFAULT NULL COMMENT 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]',
  `first_use_aedmedical_personnel` int(11) DEFAULT NULL COMMENT 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `basic_resuscitation`
--

INSERT INTO `basic_resuscitation` (`basic_resuscitation_id`, `service_information_id`, `first_life_resuscitation`, `methods_first_life_resuscitation`, `rescuer_cpr`, `rescuer_cpr_general_public`, `rescuer_cpr_medical_personnel`, `rescuer_cpr_remark`, `general_public_aed`, `use_general_public_aed`, `first_use_aed`, `first_use_aedgeneral_public`, `first_use_aedmedical_personnel`) VALUES
(2, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 25, 1, 1, NULL, 2, NULL, 'อื่นๆ ', 1, 1, 1, 2, 1),
(9, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cardiac_arrest`
--

CREATE TABLE `cardiac_arrest` (
  `cardiac_arrest_id` int(11) NOT NULL,
  `subject` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cardiac_arrest`
--

INSERT INTO `cardiac_arrest` (`cardiac_arrest_id`, `subject`, `detail`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt');

-- --------------------------------------------------------

--
-- Table structure for table `ca_symptoms`
--

CREATE TABLE `ca_symptoms` (
  `ca_symptoms_id` int(11) NOT NULL,
  `ca_symptoms_name` varchar(130) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ca_symptoms_detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='อาการภาวะหัวใจหยุดเต้น';

--
-- Dumping data for table `ca_symptoms`
--

INSERT INTO `ca_symptoms` (`ca_symptoms_id`, `ca_symptoms_name`, `ca_symptoms_detail`, `image`) VALUES
(3, '1. เปิดอก เปิดใจ เปิดโอกาส', 'การตำหนิ บังคับ กดดัน หรือดุด่าเพื่อให้เลิกใช้ยา รังแต่จะเพิ่มความเครียดให้ผู้เสพและหันไปพึ่งยาเสพติดเหมือนเดิม วิธีที่ควรทำคือเปิดอกคุยกันอย่างจริงใจ ให้รู้ถึงสาเหตุที่ทำให้เขาหันไปหายาเสพติด', './assets/uploads/ca_symptoms/2566/25b90d9640a9a42bacc29d248a1b49b2.png'),
(6, '2. กำลังใจคือยาวิเศษ', 'ถ้าเปรียบยาเสพติดคือยาร้าย กำลังใจก็คือยาวิเศษที่จะเป็นอาวุธในการต่อสู้ เพราะฉะนั้นเมื่อเรารู้สาเหตุของปัญหาที่เกิดขึ้นแล้ว ขั้นต่อไปก็คือการให้กำลังใจเพื่อแสดงให้ผู้ใช้ยาเห็นว่า เราเชื่อมั่นว่าเขาจะต้องทำได้สำเร็จ ให้รู้ว่าเราจะอยู่เคียงข้างเขา และก้าวข้', './assets/uploads/ca_symptoms/2566/bdb1b88e19da126f22abf6fe26960953.png'),
(7, '3. อ้อมกอดคือพลังอันยิ่งใหญ่', 'ลองนึกถึงตัวเองว่าในวันที่เราเหนื่อยล้าหรือเครียดกับเรื่องอะไรมากๆ การได้อ้อมกอดจากคนที่เรารักช่วยทำให้เรารู้สึกดีได้ขนาดไหน...ผู้ติดยาเองก็ไม่ต่างจากเรา เขาต้องการอ้อมกอดอันอบอุ่นและสัมผัสทางกายที่จะช่วยเยียวยาปัญหาทางใจได้ควบคู่ไปกับการพูดคุยอย่างเข้าอก', './assets/uploads/ca_symptoms/2566/72d5f2302ee7e999a7e7b53d17393430.png'),
(8, '4. คุยกันมากขึ้น เข้าใจกันยิ่งขึ้น', 'การพูดคุยกันให้บ่อยขึ้นเป็นสิ่งจำเป็นในการช่วยเหลือผู้ที่ต้องการเลิกใช้ยาเสพติด เพราะจะช่วยดึงเข้าออกจากความหมกมุ่นในโลกส่วนตัว เปิดโอกาสให้เขาได้ระบายความอัดอั้นตันใจ และรับฟังโดยไม่แสดงท่าทีรังเกียจเพื่อให้เขารู้สึกว่าตัวเองยังเป็นส่วนหนึ่งของสังคมอยู่', './assets/uploads/ca_symptoms/2566/b37148cb3e2fb56e820e679fdbe85d4b.png'),
(11, '5. พบแพทย์เพื่อเปลี่ยนแปลง', 'เมื่อผู้ติดยาเปิดใจพร้อมที่จะเปลี่ยนแปลงตัวเองแล้ว อีกสิ่งที่เราสามารถช่วยได้ก็คือพาไปพบแพทย์เพื่อจะได้บำบัดรักษาให้ถูกวิธี ตามแนวทางการช่วยเหลือผู้ติดยาเสพติดแนวใหม่ ภายใตกรอบแนวคิด \"ผู้เสพ คือ ผู้ป่วย\" ผู้ป่วยก็ต้องได้รับการรักษาจากแพทย์ที่สำคัญ ทุกวันน', './assets/uploads/ca_symptoms/2566/074de3da771a53fd372cb0e038fcad31.png');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('05rqkpji0m3q52k1oi4bgg18q7b7no0p', '::1', 1696297976, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239373937363b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('0k0mk8263bb4aplbdeljdppn6sdsm6v9', '::1', 1696294765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239343736353b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b),
('4rk1jho8sfnandpee904j46c0m84snhq', '::1', 1696300090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363330303039303b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('4s34u0vj6cjg3p9t0t5cg7pi0sjejjpu', '::1', 1696300422, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363330303432323b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('5egs8orp6rckmrs651oh8qgh097gk0nr', '::1', 1696301074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363330313037343b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('78elpuikl4p3q8ts22tns0guen7v5io1', '::1', 1696301667, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363330313634303b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('9o7eo54c9e3geb9lajtjsvr94lg3cb2h', '::1', 1696346379, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363334363337393b),
('a9uikaf31r9lf1040n3iackku5opf9bg', '::1', 1696346379, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363334363337393b),
('ccbr222g1q6c57mtaphd81o4jl7nvcqc', '::1', 1696291982, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239313938323b),
('cu18eh5dhocpbaf0hov51q4skr8v56lp', '::1', 1696296324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239363332343b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b),
('e989be9hcprkkmdkls48rsnbvf4evkna', '::1', 1696296991, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239363939313b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b),
('el7d8ivaic9q3s5ml41ebo3a2j04me0c', '::1', 1696285404, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363238353430343b),
('fma9r5pms6db2le3gvnd7sn90jplpcqd', '::1', 1696300763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363330303736333b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('h70is58c87efrnp1rdj4f8edc3ed1cb1', '::1', 1696293813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239333831333b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b),
('hikm0faiqihb8ggqdp52scpgq7nf0l0u', '::1', 1696297667, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239373636373b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('j2ppoabunafa5errghoinnnpq3418cd2', '::1', 1696301640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363330313634303b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('qcbodmks3pjunlr5pvckrf17rftn29ma', '::1', 1696295810, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239353831303b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b),
('s6l9sh86d9ihhovrdk6l0ioql725cb04', '::1', 1696299734, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239393733343b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b6173736573736d656e745f69647c693a38303b),
('uub32sk8u9p9o3m2sni9lupocmnthhn5', '::1', 1696296626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639363239363632363b757365725f69647c733a313a2233223b757365725f7072656669785f6e616d657c733a323a224d52223b757365725f66697273746e616d657c733a363a2241646d696e31223b757365725f6c6173746e616d657c733a353a225445535433223b757365725f656d61696c7c733a31353a227573657233406c6f63616c2e636f6d223b757365725f6c6576656c7c733a313a2239223b757365725f70686f746f7c4e3b6c6576656c5f7469746c657c733a36363a22e0b8a3e0b8b0e0b894e0b8b1e0b89ae0b8aae0b8b4e0b897e0b898e0b8b4e0b98ce0b89ce0b8b9e0b989e0b894e0b8b9e0b981e0b8a5e0b8a3e0b8b0e0b89ae0b89a223b74656c5f6e756d6265727c733a333a22737373223b766f69647c733a313a2231223b63695f6d616e69615f6c6f67696e7c623a313b6c6f67696e5f76616c6964617465647c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `cms_about_us`
--

CREATE TABLE `cms_about_us` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_th` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `cardiac_arrest` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_about_us`
--

INSERT INTO `cms_about_us` (`id`, `image`, `title_th`, `title_en`, `detail`, `cardiac_arrest`) VALUES
(1, './assets/uploads/cms_about_us/2566/b54638b654570abf6008a4fe74708cbb.png', 'ต่อต้านสารเสพติด', 'Anti Narcotics', 'โครงการวิจัยนี้ มีวัตถุประสงค์เพื่อวิจัยและพัฒนาคู่มือกิจกรรมเสริมสร้างทุนทางจิตวิทยา รวมทั้งระบบติดตามสภาพการณ์ปัจจัยภูมิคุ้มกัน ปัจจัยบริบทและพฤติกรรมเสี่ยงต่อการใช้สารเสพติดในกลุ่มเด็กช่วงอายุ 13-15 ปี ที่ใช้ในจัดเก็บข้อมูล จัดทำมาตฐานข้อมูลกลาง ในการนำเข้า แลกเปลี่ยน บริหารจัดการ และเชื่อมโยงข้อมูลระหว่างหน่วยงาน เพื่อใช้สำหรับส่วนสนับสนุนการตัดสินใจสำหรับผู้บริหาร โดยใช้เครื่องมือในลักษณะ Business Intelligent ในการวิเคราะห์ คาดการณ์ เพื่อ“สนับสนุนการตัดสินใจ”ชองผู้บริหารสำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด ในการกำหนดนโยบาย วางแผน จัดวางกลยุทธ์ในการป้องกันและปราบปรามยาเสพติดในเยาวชนของชาติ การนี้คณะผู้วิจัยต้องขอขอบคุณสำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด ได้ให้การสนับสนุนงบประมาณในการดำเนินการวิจัย ขอขอบพระคุณมหาวิทยาลัยศรีนครินทรวิโรฒที่ได้ให้การสนับสนุน ด้านเวลา สถานที่ ขอขอบคุณผู้ทรงคุณวุฒิ และกลุ่มตัวอย่างที่ทำให้การวิจัยนี้สาเร็จลุล่วงไปด้วยดี ท้ายที่สุดหวังเป็นอย่างยิ่งว่าองค์ความรู้ที่เกิดจากการวิจัยครั้งนี้จะนำไปสู่การพัฒนาและนำไปใช้ปรับประยุกต์ใช้เป็นส่วนหนึ่งของการวางแผนจัดวางกลยุทธ์ในการป้องกันและปราบปรามยาเสพติดในเยาวชนของชาติต่อไป', 'รัฐบาลกำหนดนโยบายให้ปัญหายาเสพติดเป็นวาระแห่งชาติ โดยมียุทธศาสตร์ “พลังแผ่นดินเอาชนะยาเสพติด” เป็นยุทธศาสตร์หลักในการขับเคลื่อนการดำเนินงานตามนโยบายของรัฐบาล ด้วยการระดมสรรพกำลังของทุกภาคส่วนร่วมเป็นพลังแผ่นดินในการเอาชนะยาเสพติด สำนักงาน ป.ป.ส. ในฐานะหน่วยงานหลักที่รับผิดชอบงานยาเสพติด จึงกำหนดเร่งดำเนินงานตามแผนการปฏิบัติ เพื่อสนองต่อนโยบายรัฐบาล รวมถึงการกำหนดนโยบายในการรณรงค์ประชาสัมพันธ์และจัดกิจกรรมให้สอดรับกับแผนและยุทธศาสตร์การดำเนินงานการแก้ไขปัญหายาเสพติดของรัฐบาล');

-- --------------------------------------------------------

--
-- Table structure for table `cms_cardiac_arrest_slide`
--

CREATE TABLE `cms_cardiac_arrest_slide` (
  `cms_cardiac_arrest_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_cardiac_arrest_slide`
--

INSERT INTO `cms_cardiac_arrest_slide` (`cms_cardiac_arrest_id`, `image`) VALUES
(3, './assets/uploads/cms_cardiac_arrest_slide/2566/6a0c9fda6e6d6cb51efa8ab88f317a8e.jpg'),
(4, './assets/uploads/cms_cardiac_arrest_slide/2566/b9b55d08524cf67a0f817e10594a4e8f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cms_category`
--

CREATE TABLE `cms_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_category`
--

INSERT INTO `cms_category` (`id`, `name`) VALUES
(1, 'ข่าวสาร'),
(2, 'ประชาสัมพันธ์'),
(3, 'ข่าวกิจกรรม');

-- --------------------------------------------------------

--
-- Table structure for table `cms_ca_basic_info`
--

CREATE TABLE `cms_ca_basic_info` (
  `ca_basic_info` int(11) NOT NULL,
  `subject` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เรื่อง',
  `detail` text COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  `images` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูปภาพ',
  `create_by_userid` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `files` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ไฟล์แนบ',
  `create_date` date DEFAULT NULL COMMENT 'วันที่สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_ca_basic_info`
--

INSERT INTO `cms_ca_basic_info` (`ca_basic_info`, `subject`, `detail`, `images`, `create_by_userid`, `files`, `create_date`) VALUES
(7, 'หัวใจหยุดเต้นเฉียบพลัน (Cardiac Arrest)', 'ภาวะหัวใจหยุดเต้นเฉียบพลัน: เป็นพยาธิสภาพที่หัวใจทำงานผิดปกติ ส่งผลต่อการบีบตัวและการเต้นของหัวใจ ทำให้ไม่สามารถส่งเลือดไปเลี้ยงตามส่วนต่างๆ ของร่างกายได้เพียงพอ จึงทำให้เกิดอาการเป็นลม หมดสติ โดยที่หัวใจหยุดเต้นเป็นภาวะที่รุนแรงและอาจส่งผลให้ผู้ป่วยเสียชีวิตได้อย่างรวดเร็ว หากพบคนใกล้ตัวหมดสติและมีสัญญาณของภาวะหัวใจหยุดเต้น อย่างไม่มีชีพจรหรือไม่หายใจ ควรโทรแจ้งสายด่วนที่เบอร์ 1669 และหากเคยได้รับการฝึกฝนการกู้ชีพขั้นพื้นฐาน ควรช่วยเหลือผู้ป่วยโดยให้ทำการกู้ชีพขั้นพื้นฐานด้วยการปั๊มหัวใจ (Cardiopulmonary Resuscitation: CPR) สลับกับการใช้เครื่องกระตุกหัวใจไฟฟ้าอัตโนมัติ (Automated External Defibrillators: AED) ทันที', '', 3, '', NULL),
(8, 'ภาวะกล้ามเนื้อหัวใจตายเฉียบพลันในประเทศไทย', 'สําหรับประเทศไทยภาวะกล้ามเนื้อหัวใจตายเฉียบพลันยังคงเป็นสาเหตุ การตายอันดับต้นๆ รองจาก มะเร็ง และอุบัติเหตุ การช่วยเหลือผู้ป่วยอย่าง ถูกต้อง รีบด่วน และมีประสิทธิภาพ สามารถช่วยลดอัตราการตาย ป้องกันการเกิดกล้ามเนื้อหัวใจตายถาวร ซึ่ง ส่งผลให้เกิดภาวะแทรกซ้อนตามมา เช่น หัวใจเต้นผิดจังหวะ หัวใจวาย ภาวะช็อคจากหัวใจ หัวใจหยุดเต้น เป็นต้น การพยาบาลที่สำคัญคือ การบรรเทาความเจ็บปวดเพื่อลดการทํางานของหัวใจและ ส่งเสริมให้เลือดไปเลี้ยง กล้ามเนื้อหัวใจให้เพียงพอ เพื่อป้องกันอันตรายจากโรคและภาวะแทรกซ้อน รวมทั้งการให้ความรู้ ความเข้าใจและ คําแนะนําที่เป็นประโยชน์ต่อผู้ป่วย เพื่อป้องกันการกลับเป็นซ้ำรวมทั้งส่งเสริมให้ผู้ป่วยมีคุณภาพชีวิตที่ดีต่อไป', '', 3, '', NULL),
(9, 'การพยาบาลที่สำคัญ', 'การพยาบาลที่สำคัญ ได้แก่ การบรรเทาความเจ็บปวดเพื่อลดการทํางานของหัวใจและ ส่งเสริมให้เลือดไปเลี้ยง กล้ามเนื้อหัวใจให้เพียงพอ เพื่อป้องกันอันตรายจากโรคและภาวะแทรกซ้อน', '', 3, '', NULL),
(10, 'การช่วยฟื้นคืนชีพขั้นพื้นฐาน', 'การช่วยฟื้นคืนชีพขั้นพื้นฐาน: สถานการณ์ฉุกเฉิน เป็นสิ่งที่สามารถเกิดขึ้นได้โดยที่เราไม่ได้คาดการณ์ไว้ล่วงหน้า ซึ่งอาจเป็นอันตรายถึงชีวิต การให้ความช่วยเหลือต่อผู้ประสบกับสถานการณ์ฉุกเฉินจึงถือว่าเป็นสิ่งสำคัญพื้นฐานในการช่วยเหลือคนที่คุณรักหรือเพื่อนมนุษย์ด้วยกัน ท่านควรเรียนรู้เรื่องการแจ้งเหตุเพื่อขอความช่วยเหลือ การช่วยฟื้นคืนชีพขั้นพื้นฐาน รวมถึงการใช้เครื่อง เอ อี ดี (AED) ระหว่างที่ทีมกู้ชีพยังเดินทางไปไม่ถึง อย่างไรก็ตามการใช้เครื่อง เอ อี ดี (AED) ในประเทศไทยถือเป็นเรื่องใหม่ สำหรับประชาชนที่จำเป็นจะต้องใช้เครื่องดังกลาวควรดำเนินการช่วยเหลือภายใต้คำแนะนำของแพทย์หรือตามคำแนะนำจากผู้ปฏิบัติการฉุกเฉินผ่านสายด่วน 1669 และหวังเป็นอย่างยิ่งว่าคู่มือฉบับนี้จะเป็นประโยชน์สำหรับประชาชนทั่วไปให้นำไปปฏิบัติในการช่วยชีวิตผู้ป่วยฉุกเฉินที่มีภาวะหัวใจหยุดเต้นด้วยเครื่อง เอ อี ดี เพื่อเพิ่มโอกาสการรอดชีวิตของประชาชนที่หัวใจหยุดเต้นเฉียบพลันนอกโรงพยาบาลได้', '', 3, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_ca_resuscitation`
--

CREATE TABLE `cms_ca_resuscitation` (
  `ca_resuscitation_id` int(11) NOT NULL,
  `ca_resuscitation_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ca_resuscitation_detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ปฏิบัติการช่วยฟื้นคืนชีพ';

--
-- Dumping data for table `cms_ca_resuscitation`
--

INSERT INTO `cms_ca_resuscitation` (`ca_resuscitation_id`, `ca_resuscitation_name`, `ca_resuscitation_detail`, `image`) VALUES
(1, '1. การตระหนักรู้และเห็นคุณค่าในตนเองและผู้อื่น', '1. การตระหนักรู้และเห็นคุณค่าในตนเองและผู้อื่น', './assets/uploads/cms_ca_resuscitation/2566/fe945425fcc2cd7bdc1482e7abfef761.jpg'),
(2, '2. การคิดวิเคราะห์ ตัดสินใจ และแก้ปัญหาอย่างสร้างสรรค์', 'การคิดวิเคราะห์ ตัดสินใจ และแก้ปัญหาอย่างสร้างสรรค์', './assets/uploads/cms_ca_resuscitation/2566/bf66e06e03243ca28bb718cd6c590252.jpg'),
(3, '3. การจัดการกับอารมณ์และความเครียด', '3. การจัดการกับอารมณ์และความเครียด', './assets/uploads/cms_ca_resuscitation/2566/eeb448e21f3abb96683b2bfef838089c.jpg'),
(4, '4. การสร้างสัมพันธ์ที่ดีกับผู้อื่น', 'การสร้างสัมพันธ์ที่ดีกับผู้อื่น', './assets/uploads/cms_ca_resuscitation/2566/3665abedead78f7c7a5917c1b86adfe0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cms_contact_us`
--

CREATE TABLE `cms_contact_us` (
  `cms_contact_us_id` int(11) NOT NULL,
  `contact_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_contact_us`
--

INSERT INTO `cms_contact_us` (`cms_contact_us_id`, `contact_name`, `email`, `phone`, `subject`, `detail`) VALUES
(1, 'Paritad Dadach', NULL, '0946379768', 'หัวใจหยุดเต้นเฉียบพลัน (Cardiac Arrest)', '0'),
(2, 'Paritad Dadach', 'popinlive@gmail.com', '0946379768', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cms_faq`
--

CREATE TABLE `cms_faq` (
  `cms_faq_id` int(11) NOT NULL,
  `cms_faq_title` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faq_detail` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_posts`
--

CREATE TABLE `cms_posts` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูปภาพ',
  `title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เรื่อง',
  `message` text COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  `category_id` int(11) DEFAULT NULL COMMENT 'หมวดหมู่',
  `userid` int(11) DEFAULT NULL COMMENT 'ผู้เขียน',
  `status` enum('published','draft','archived','') COLLATE utf8_unicode_ci DEFAULT 'published' COMMENT 'สถานะ[published,draft, archived]',
  `created` datetime DEFAULT NULL COMMENT 'วันที่สร้าง',
  `updated` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่แก้ไข'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_posts`
--

INSERT INTO `cms_posts` (`id`, `image`, `title`, `message`, `category_id`, `userid`, `status`, `created`, `updated`) VALUES
(10, './assets/uploads/news/2566/7f0acf02e1091c0f273abc79199beeae.jpg', 'นายกฯ เปิดปฏิบัติการป้องกัน ปราบปราม แก้ไขปัญหายาเสพติดตามนโยบายรัฐบาล', '<b>นายกฯ เปิดปฏิบัติการป้องกัน ปราบปราม แก้ไขปัญหายาเสพติดตามนโยบายรัฐบาล เผย อายัดทรัพย์แล้วกว่า 1.1 หมื่นล้าน ลั่น 3 เดือน ต้องเป็นรูปธรรม เข้ม 5 ข้อ บูรณาการผลปราบยา ฮึ่ม จนท.- ขรก.มีเอี่ยว ฟันโทษหนักวินัย-อาญา</b><br />\r\n<br />\r\nวันนี้ (23 พ.ย.) เมื่อเวลา 13.30 น. ที่ ห้องมัฆวานรังสรรค์ ชั้น 3 สโมสรทหารบก ถนนวิภาวดีรังสิต พล.อ.ประยุทธ์ จันทร์โอชา นายกรัฐมนตรี และ รมว.กลาโหม เป็นประธานในพิธีเปิดปฏิบัติการป้องกัน ปราบปราม และแก้ไขปัญหายาเสพติดตามนโยบายของรัฐบาล ประจำปีงบประมาณ พ.ศ. 2566 ระยะเร่งด่วน 3 เดือน โดยมี นายอนุทิน ชาญวีรกูล รองนายกรัฐมนตรี และ รมว.สาธารณสุข พล.อ.อนุพงษ์ เผ่าจินดา รมว.มหาดไทย นายสมศักดิ์ เทพสุทิน รมว.ยุติธรรม นายเจเรมี ดักลาส ผู้แทนสำนักงานยาเสพติดและอาชญากรรมแห่งสหประชาชาติประจำภูมิภาคเอเชียตะวันออกเฉียงใต้และแปซิฟิก นายคาร์สเท่น แอนเดอร์เซ่น ผู้แทนหน่วยประสานงานยาเสพติดและอาชญากรรมต่างประเทศประจำประเทศไทย นายวิชัย ไชยมงคล เลขาธิการ ป.ป.ส. แม่ทัพภาค 1-4 ผู้บัญชาการตำรวจภูธร และหน่วยงานที่เกี่ยวข้องเข้าร่วม<br />\r\n<br />\r\nพล.อ.ประยุทธ์ กล่าวว่า วันนี้เป็นอีกวันหนึ่งที่ตนรู้สึกยินดีและเป็นเกียรติที่มาเป็นประธานและมอบนโยบายในการเปิดปฏิบัติการป้องกัน ปราบปราม และแก้ไขปัญหายาเสพติดตามนโยบายของรัฐบาล ประจำปีงบประมาณ พ.ศ. 2566 ระยะเร่งด่วน 3 เดือน ตั้งแต่วันที่ 1 พฤศจิกายน 2565 - 31 มกราคม 2566 ต้องเข้าใจว่านี่คือเรื่องด่วนและเราคงต้องทำต่อเนื่อง ปัญหายาเสพติดเป็นปัญหาที่มีความสลับซับซ้อน เรายิ่งปรับแก้วิธีการต่างๆในการดำเนินการต่างๆอีกฝ่ายก็ปรับเหมือนกัน ฉะนั้นเราต้องทำกันทั้งสองฝ่าย จะทำอย่างไรที่จะแก้ปัญหาความซับซ้อนให้ได้ เพราะส่งผลกระทบต่อความมั่นคงทางเศรษฐกิจและสังคมของประเทศ เราจะต้องแก้ไขปัญหาให้ลดลงหรือหมดสิ้นจากแผ่นดินไทย เพราะฉะนั้นสิ่งสำคัญที่สุดคือความเข้าใจ การบูรณาการประสานงานกันของหน่วยงานต่างๆ ในระดับประเทศ ซึ่งมีหลายระดับหลายขั้นตอนด้วยกันจากบนลงสู่ชุมชน ซึ่งมีหลายหน่วยงานที่เกี่ยวข้อง สิ่งสำคัญวันนี้เราต้องดูว่าเราจะแก้ปัญหาอย่างไรและมีอะไรเกี่ยวข้องบ้าง ป้องกัน ปราบปราม บำบัด รักษา และที่ทุกคนทราบ คือ ดีมาน ซัปพลาย และผู้เสพรายใหม่ แก้ไขผู้เสพรายเก่า แต่ปัญหามันไม่ได้จบสิ้นง่ายๆ เพราะการพัฒนาการของอีกฝ่ายหรือสังคมเปลี่ยนแปลงไปเยอะ สิ่งเหล่านี้เป็นสิ่งสำคัญ เราจำเป็นต้องมีการบูรณาการอย่างใกล้ชิดโดยเฉพาะประเทศเพื่อนบ้าน<br />\r\n<br />\r\nพล.อ.ประยุทธ์ กล่าวว่า รัฐบาลได้กำหนดให้ยาเสพติดเป็นวาระแห่งชาติ เป็นหนึ่งใน 1 ใน 12 นโยบายสำคัญของรัฐบาล ที่ผ่านมา เราปฏิบัติและพัฒนาการมาอย่างต่อเนื่อง ซึ่งก็เป็นทั้งเราและเขา แต่ที่เราทำวันนี้จะเป็นจุดเปลี่ยนสำคัญในระดับนโยบาย สิ่งแรกเป็นการปรับปรุงกฎหมายกฎระเบียบต่างๆ ที่อาจเกี่ยวข้องในหลายกฎหมายด้วยกัน ส่งผลดีในทางปฏิบัติ สร้างประสิทธิภาพให้เจ้าหน้าที่ในการทำงานให้สูงขึ้นโดยเฉพาะด้านการปราบปราม การจับกุม ติดตามขยายผลสู่นายทุน และผู้เกี่ยวข้องได้จำนวนมาก และวันนี้สามารถอายัดทรัพย์สินได้มากถึง 11,000 ล้านบาท ถ้าทำไปเรื่อยๆ ยอดจะสูงขึ้น และวันนี้เรากลายเป็นเส้นทางผ่านจากแนวชายแดนส่งไปที่อื่น ซึ่งเราต้องแก้ปัญหาทั้งภายในประเทศและปัญหาระหว่างประเทศตามแนวชายแดนเพื่อไม่ให้แพร่กระจายไปที่อื่น\r\n<pre>\r\n<a href=\"https://mgronline.com/politics/detail/9650000111846\"><span style=\"color:null;\"><strong>แหล่งข้อมูล</strong></span></a></pre>', 1, 3, 'published', NULL, '2023-05-07 12:46:47'),
(11, './assets/uploads/news/2566/4fe6fe9dcbba3b4d017a9b68cec55909.jpg', 'นายกรัฐมนตรี มอบโล่บุคคลและองค์กรที่มีผลงาน เนื่องในวันต่อต้านยาเสพติดโลก', '<p>&nbsp;วันพฤหัสบดีที่&nbsp;30&nbsp;มิถุนายน&nbsp;2565&nbsp;เวลา&nbsp;14.00&nbsp;น.&nbsp;ณ&nbsp;ตึกสันติไมตรี&nbsp;ทำเนียบรัฐบาล&nbsp;พลเอกประยุทธ์&nbsp;&nbsp;จันทร์โอชา&nbsp;นายกรัฐมนตรี&nbsp;เป็นประธานในพิธีมอบโล่ประกาศเกียรติคุณบุคคลและองค์กรที่มีผลงานยอดเยี่ยมและดีเด่นในการป้องกันและแก้ไขปัญหายาเสพติด&nbsp;ประจำปี&nbsp; 2565&nbsp;โดยมีนายสมศักดิ์&nbsp;เทพสุทิน&nbsp;รัฐมนตรีว่าการกระทรวงยุติธรรม&nbsp;นายวิชัยไชยมงคล&nbsp;เลขาธิการคณะกรรมการป้องกันและปราบปราม&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ยาเสพติด&nbsp;(ป.ป.ส)&nbsp;นายกลินท์&nbsp;สารสิน&nbsp;ประธานกรรมการมูลนิธิ&nbsp;พล.ต.อ.เภา&nbsp;สารสิน&nbsp;พร้อมด้วยบุคคล/องค์กรผู้ได้รับเงินสนับสนุนจากมูลนิธิ พล.ต.อ.เภา&nbsp;สารสิน&nbsp;จำนวน&nbsp;5&nbsp;ราย ผู้ได้รับโล่ประกาศเกียรติคุณฯ&nbsp;ระดับยอดเยี่ยม&nbsp;จำนวน&nbsp;3&nbsp;ราย&nbsp;และดีเด่น&nbsp;จำนวน&nbsp;7&nbsp;ราย&nbsp;นอกจากนี้ยังมีทายาท/ครอบครัวผู้เสียสละชีวิต&nbsp;เข้ารับโล่ฯ&nbsp;จำนวน&nbsp;4&nbsp;ราย&nbsp;โดยการจัดพิธีมอบโล่ประกาศเกียรติคุณฯ&nbsp;ในปี&nbsp;2565&nbsp;นี้ยังคงเป็นการจัดพร้อมกันทั่วประเทศผ่านระบบการประชุมทางไกล&nbsp;(Video Conference)&nbsp;ไปยังสำนักงาน&nbsp;ป.ป.ส.&nbsp;ส่วนกลาง&nbsp;(ดินแดง)&nbsp;และสำนักงาน&nbsp;ปปส.&nbsp;ภาค&nbsp;1 &ndash; 9&nbsp;ด้วยซึ่งได้เรียนเชิญผู้ว่าราชการจังหวัดในพื้นที่ตั้งสำนักงาน&nbsp;ปปส.ภาค&nbsp;เป็นผู้มอบโล่ประกาศเกียรติคุณฯ&nbsp;และเชิญผู้บริหารจากหน่วยงานภาคีที่เกี่ยวข้อง&nbsp; &nbsp; &nbsp; อัยการ&nbsp;ทหาร&nbsp;ตำรวจ&nbsp;สาธารณสุข&nbsp;เข้าร่วมเป็นเกียรติฯ&nbsp;ในพิธีมอบโล่ประกาศเกียรติคุณดังกล่าว</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;การจัดพิธีมอบโล่เกียรติคุณฯ&nbsp;เป็นหนึ่งในกิจกรรมวันต่อต้านยาเสพติดโลก&nbsp;ซึ่งสำนักงาน&nbsp;ป.ป.ส.&nbsp;ร่วมกับ&nbsp;มูลนิธิพล.ต.อ.เภา&nbsp;สารสิน&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ร่วมกันจัดขึ้นมีโดยวัตถุประสงค์เพื่อยกย่องเชิดชูเกียรติ&nbsp;และเป็นขวัญกำลังใจแก่ผู้ปฏิบัติงานที่มีผลงานยอดเยี่ยมและดีเด่นในการป้องกันและแก้ไขปัญหายาเสพติด&nbsp;โดยดำเนินการมาตั้งแต่ปีพ.ศ. 2537&nbsp;จนถึงปัจจุบัน</p>\r\n\r\n<pre>\r\n<a href=\"https://www.oncb.go.th/_layouts/15/FSBTSP2013/NewsDisplay.aspx?NewsID=2243&amp;DisplayScope=internet%20and%20intranet&amp;NewsList=board1&amp;NewsListDisplayName=board1&amp;ColumnName=Title,image,VisitedCounts,FormatDate,DateCreate&amp;Newssite=https://www.oncb.go.th/&amp;Comment=yes\"><strong>แหล่งข้อมูล</strong></a></pre>', 1, 3, 'published', NULL, '2023-05-07 12:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `cms_researchs`
--

CREATE TABLE `cms_researchs` (
  `cms_researchs_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `research_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `create_by_userid` int(11) DEFAULT NULL,
  `files` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_slide`
--

CREATE TABLE `cms_slide` (
  `cms_slide_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เรื่อง',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปภาพ',
  `sequences` int(11) NOT NULL COMMENT 'ลำดับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางเก็บข้อมูล slide';

--
-- Dumping data for table `cms_slide`
--

INSERT INTO `cms_slide` (`cms_slide_id`, `title`, `image`, `sequences`) VALUES
(3, 'สมองฝ่อ รักษาไม่หาย คือพิษร้ายจากยาเสพติด', './assets/uploads/slides/2566/d846f5f9ca1cc1c9e8461b3682c421d1.jpg', 1),
(4, 'ผิดกฎหมาย ทำลายชีวิต หากติดสารระเหย', './assets/uploads/slides/2566/24dc40521fdc2d262b35821086c3dfdf.jpg', 2),
(7, 'ร่วมใจเล่นกีฬา ใช้ชีวิตอย่างรู้ค่า ไม่พึ่งพายาเสพติด', './assets/uploads/slides/2566/22510949dce25c5d498ce3bcca894ea2.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cms_teams`
--

CREATE TABLE `cms_teams` (
  `cms_team_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หน่วยงาน',
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทร',
  `level` int(11) NOT NULL COMMENT 'ลำดับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_teams`
--

INSERT INTO `cms_teams` (`cms_team_id`, `photo`, `name`, `company_name`, `tel`, `level`) VALUES
(1, './assets/uploads/cms_teams/2565/060e1fb1c85be4f313fad6f1024343b1.jpg', 'ดร. พีรดนย์ ศรีจันทร์', 'มหาวิทยาลัยแม่ฟ้าหลวง', '053916921', 1),
(2, './assets/uploads/cms_teams/2565/314d5927fdd44ab64a467232f8d0359b.jpg', 'นท.หญิง ดร.สุปราณี พลธนะ', 'กองทัพเรือ กระทรวงกลาโหม', '085-318-78', 2),
(3, './assets/uploads/cms_teams/2565/eda037649e90075c203f8e3ba130d0d0.jpg', 'ดร.ไพรินทร์ พัสดุ', 'สถาบันการพยาบาลศรีสวรินทิรา', '(662)256 4', 3);

-- --------------------------------------------------------

--
-- Table structure for table `context_factor`
--

CREATE TABLE `context_factor` (
  `context_factor_id` int(11) NOT NULL COMMENT 'id',
  `basic_information_id` int(11) NOT NULL,
  `question1` int(11) NOT NULL COMMENT 'ฉันพยายามทำทุกอย่าง เพราะต้องการเป็นที่ยอมรับในกลุ่มเพื่อนที่ใช้สารเสพติด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question2` int(11) NOT NULL COMMENT 'ฉันคิดว่าการที่ใช้สารเสพติดในกลุ่มเพื่อนเป็นเรื่องปกติธรรมดา[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง] ',
  `question3` int(11) NOT NULL COMMENT 'ถ้าฉันใช้สารเสพติด ฉันจะได้เป็นส่วนหนึ่งของกลุ่มเพื่อน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question4` int(11) NOT NULL COMMENT 'ฉันไม่ยอมเชื่อเพื่อน เมื่อเพื่อนชักจูงให้เห็นถึงความท้าทายของสารเสพติด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question5` int(11) NOT NULL COMMENT '5	การที่ฉันใช้ชีวิตร่วมกับกลุ่มเพื่อนที่ใช้สารเสพติดและได้เพื่อนแท้ที่เข้าใจกัน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question6` int(11) NOT NULL COMMENT 'ถ้าการลองสูบบุหรี่จะทำให้เพื่อน ๆ ยอมรับฉันเข้ากลุ่ม ฉันยินดีที่จะทำ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question7` int(11) NOT NULL COMMENT 'การที่ฉันใช้ชีวิตร่วมกับผู้ที่ใช้สารเสพติด ทำให้รู้สารเสพติดทำให้ได้เพื่อนแท้ที่เข้าใจกัน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question8` int(11) NOT NULL COMMENT 'ฉันจะไม่ยุ่งเกี่ยวกับกลุ่มเพื่อนที่ใช้สารเสพติดโดยเด็ดขาด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question9` int(11) NOT NULL COMMENT 'ฉันถูกทำร้ายร่างกายจากคนในครอบครัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question10` int(11) NOT NULL COMMENT 'ฉันรับรู้/เห็นคนในครอบครัวทำร้ายร่างกายกันจนได้รับบาดเจ็บ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question11` int(11) NOT NULL COMMENT 'ฉันรู้สึกไม่พอใจที่ถูกคนในครอบครัวบังคับให้ทำในสิ่งที่ฉันไม่ชอบ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question12` int(11) NOT NULL COMMENT 'ฉันรู้สึกเสียใจที่ถูกคนในครอบครัวต่อว่าด้วยถ้อยคำที่รุนแรงและหยาบคาย[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question13` int(11) NOT NULL COMMENT 'ฉันถูกคนในครอบครัวนำไปเปรียบเทียบกับคนอื่น จนทำให้ฉันรู้สึกกดดันหรืออับอาย[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question14` int(11) NOT NULL COMMENT 'ฉันรู้สึกสบายใจที่ได้รับการดูแลเอาใจใส่จากคนในครอบครัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question15` int(11) NOT NULL COMMENT 'ฉันรับรู้/เห็นคนในครอบครัวต้องเสียใจเพราะการกระทำของคนในบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question16` int(11) NOT NULL COMMENT 'ฉันถูกห้ามไม่ให้คบเพื่อนบางคน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question17` int(11) NOT NULL COMMENT 'ฉันถูกกีดกันจากครอบครัวไม่ให้ติดต่อกับญาติพี่น้อง และ/หรือเพื่อนบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question18` int(11) NOT NULL COMMENT 'ฉันถูกห้ามไม่ให้ออกนอกบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question19` int(11) NOT NULL COMMENT 'ฉันต้องช่วยที่บ้านทำงาน จนทำให้ฉันไม่มีเวลาทำในสิ่งที่ฉันต้องการ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question20` int(11) NOT NULL COMMENT 'คนในครอบครัวของฉันถูกกีดกันไม่ให้คบหรือติดต่อกับคนอื่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question21` int(11) NOT NULL COMMENT 'คนในครอบครัวของฉันถูกบังคับไม่ให้ออกนอกบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question22` int(11) NOT NULL COMMENT 'ฉันได้รับสิ่งจำเป็นพื้นฐานในการดำรงชีวิตจากครอบครัวอย่างเพียงพอ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question23` int(11) NOT NULL COMMENT 'ฉันได้รับเงินจากผู้ปกครองไม่เพียงพอต่อการใช้ในชีวิตประจำวัน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question24` int(11) NOT NULL COMMENT 'เมื่อฉันไม่สบายหรือเจ็บป่วย ครอบครัวไม่มีเงินพาฉันไปรักษา[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question25` int(11) NOT NULL COMMENT '17	คนในครอบครัวของฉันทะเลาะกันเพราะเงินไม่พอใช้[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question26` int(11) NOT NULL COMMENT 'คนในครอบครัวมักพูดจาลามกต่อหน้าฉัน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question27` int(11) NOT NULL COMMENT 'ฉันถูกคนในครอบครัวจับเนื้อต้องตัวจนทำให้ฉันรู้สึกอึดอัดหรือไม่สบายใจ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question28` int(11) NOT NULL COMMENT 'ฉันถูกคนในครอบครัวบังคับให้มีเพศสัมพันธ์กับผู้อื่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question29` int(11) NOT NULL COMMENT 'ฉันถูกคนในครอบครัวบังคับให้ขายบริการทางเพศเพื่อแลกเงิน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question30` int(11) NOT NULL COMMENT 'ฉันรับรู้/เห็นคนในครอบครัวถูกบังคับให้มีเพศสัมพันธ์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question31` int(11) NOT NULL COMMENT 'ฉันเห็นคนในครอบครัวสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question32` int(11) NOT NULL COMMENT 'ฉันเห็นคนในครอบครัวใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question33` int(11) NOT NULL COMMENT 'ฉันเห็นเพื่อน/รุ่นพี่ในโรงเรียนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question34` int(11) NOT NULL COMMENT 'ฉันเห็นเพื่อน/รุ่นพี่ใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question35` int(11) NOT NULL COMMENT 'ฉันเห็นคนในชุมชนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question36` int(11) NOT NULL COMMENT 'ฉันเห็นคนในชุมชนใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question37` int(11) NOT NULL COMMENT 'ฉันเห็นดาราหรือนักร้องที่ฉันชื่นชอบสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question38` int(11) NOT NULL COMMENT 'คนในครอบครัวชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question39` int(11) NOT NULL COMMENT 'เพื่อน/รุ่นพี่ในโรงเรียนชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question40` int(11) NOT NULL COMMENT 'คนในชุมชนชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question41` int(11) NOT NULL COMMENT 'ฉันพบเจอสารเสพติดหรืออุปกรณ์ที่ใช้ในการเสพสารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question42` int(11) NOT NULL COMMENT 'ฉันสนิทกับคนในครอบครัวที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question43` int(11) NOT NULL COMMENT 'ฉันมีกิจกรรมหรือความเกี่ยวข้องกับเพื่อน/รุ่นพี่ในโรงเรียนที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question44` int(11) NOT NULL COMMENT 'ฉันมีกิจกรรมหรือความเกี่ยวข้องกับคนในชุมชนที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question45` int(11) NOT NULL COMMENT 'ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันเกรงกลัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question46` int(11) NOT NULL COMMENT 'ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันนับถือหรือชื่นชอบ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question47` int(11) NOT NULL COMMENT 'ฉันติดตามการใช้สารเสพติดจากสื่อต่าง ๆ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_information`
--

CREATE TABLE `delivery_information` (
  `service_information_id` int(11) NOT NULL,
  `delivery_hospital` int(11) DEFAULT NULL COMMENT 'โรงพยาบาลที่นำส่ง[1=รัฐบาล,2=เอกชน]',
  `delivery_hospital_course` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เหตุผลในการเลือกโรงพยาบาล (เลือกได้มากกว่า 1 ข้อ)[1=เหมาะสม-สามารถให้การรักษาได้,2=อยู่ใกล้,3=มีสิทธิการรักษา,4=เป็นผู้ป่วยเก่า,5=เป็นความต้องการของญาติ]',
  `screening_level` int(11) DEFAULT NULL COMMENT 'ระดับการคัดกรอง[1=สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation),2=สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency),3=สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency),4=สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency),5=สีขาว ผู้ป่วยทั่วไป (Non-Urgency)]',
  `resuscitation` int(11) DEFAULT NULL COMMENT 'การ Resuscitation  ณ แผนกอุบัติเหตุและฉุกเฉิน[1=ไม่ทำ,2=ทำ]',
  `respiratory_system` int(11) DEFAULT NULL COMMENT 'ระบบทางเดินหายใจ[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]	',
  `respiratory_system_remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `water_supply` int(11) DEFAULT NULL COMMENT 'การให้สารน้ำ[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]	',
  `water_supply_remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hemostasis` int(11) DEFAULT NULL COMMENT 'การห้ามเลือด[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]',
  `hemostasis_remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `splint` int(11) DEFAULT NULL COMMENT 'การดามกระดูก[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]',
  `splint_remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_information`
--

INSERT INTO `delivery_information` (`service_information_id`, `delivery_hospital`, `delivery_hospital_course`, `screening_level`, `resuscitation`, `respiratory_system`, `respiratory_system_remark`, `water_supply`, `water_supply_remark`, `hemostasis`, `hemostasis_remark`, `splint`, `splint_remark`) VALUES
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, '1', 1, 1, 1, '', 1, '', 1, '', 1, ''),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, '1,3', 2, 1, 1, '', 1, '', 1, '', 1, ''),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, '1', 1, 1, 1, '1', 1, '1', 1, '1', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `event_information`
--

CREATE TABLE `event_information` (
  `event_information_id` int(11) NOT NULL,
  `service_information_id` int(11) NOT NULL,
  `even_scene` int(11) DEFAULT NULL COMMENT 'ลักษณะของที่เกิดเหตุ[1=ที่พักอาศัย ,2=สถานที่ทำงาน,3=สถานที่สาธารณะ,4=ศูนย์ดูแลผู้ป่วย,5=อื่นๆ]',
  `even_scene_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ ………............',
  `accommodation` int(11) DEFAULT NULL COMMENT 'ที่พักอาศัย[1=หอพัก/แฟลต/อพาร์ทเมนต์/คอนโด (เป็นตึกสูง),2=บ้านเดี่ยวของตนเอง,3=หมู่บ้านจัดสรร,4=อื่น ๆ]',
  `accommodation_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ ………............',
  `workplace` int(11) DEFAULT NULL COMMENT 'สถานที่ทำงาน[1=โรงงาน/บริษัท/สำนักงาน,2=ค่ายทหาร,3=หน่วยงานราชการ,4=อื่น ๆ]',
  `workplace_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ ………............',
  `public_place` int(11) DEFAULT NULL COMMENT 'สถานที่สาธารณะ[1=ตลาด,2=แหล่งท่องเที่ยว,3=สนามบิน,4=ถนน,5=ห้างสรรพสินค้า,6=สนามกีฬา,7=สถานบันเทิง,8=สวนสาธารณะ,9=สถานีขนส่ง]',
  `eyewitnesses` int(11) DEFAULT NULL COMMENT 'ผู้พบเห็นเหตุการณ์[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์,3=อื่นๆ]',
  `general_public` int(11) DEFAULT NULL COMMENT 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]',
  `medical_personnel` int(11) DEFAULT NULL COMMENT 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]',
  `eyewitnesses_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ ………............',
  `causes_cardiac_arres` int(11) DEFAULT NULL COMMENT ' สาเหตุเบื้องต้นของภาวะหัวใจหยุดเต้น[1=Hypovolemia ภาวะปริมาตรเลือดน้อย เช่น มีประวัติถ่ายเหลว ท้องเสีย อาเจียน รับประทานไม่ได้ ขาดน้ำรุนแรง,2=Hypoxia ภาวะพร่องออกซิเจน เช่น ขาดอากาศหายใจ respiratory failureO2saturation drop,3=Hydrogen ion (Acidosis)  ภาวะเลือดเป็นกรด,4=Hypo/Hyperkalemia ภาวะโพแทสเซียมต่ำ/สูง,5=Hypothermia ภาวะอุณหภูมิกายต่ำ เช่น ตัวเย็นเกิน,6=Hypoglycemia ภาวะน้ำตาลในเลือดต่ำ,7=Toxins สารพิษ เช่น พบสารพิษ/ยาหล่นอยู่ข้างลำตัวหรือบริเวณใกล้เคียง กินยาฆ่าแมลง/น้ำยาล้างห้องน้ำ,8=Tamponade cardiac ภาวะบีบรัดหัวใจ เช่น ความดันโลหิตต่ำ ฟังพบเสียงหัวใจเบา หลอดเลือดดำคอโป่ง,9=Tension pneumothorax ภาวะปอดถูกกดทับ เช่น ฟังเสียงลมเข้าปอดลดลง หลอดลมคอเอียงไปข้างใดข้างหนึ่ง,10=Thrombosis pulmonary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดปอด เช่น โรคประจำตัวเป็นมะเร็งนอนติดเตียง นั่งเครื่องบินหลายชั่วโมง,11=Thrombosis coronary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดหัวใจ เช่น โรคประจำตัวหัวใจ ประวัติเจ็บแน่นหน้าอก เหงื่อออก ใจสั่น,12=Trauma ภาวะบาดเจ็บตามอวัยวะ เช่ย ประสบอุบัติเหตุทางรถยนต์,13=อื่นๆ ระบุ]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_information`
--

INSERT INTO `event_information` (`event_information_id`, `service_information_id`, `even_scene`, `even_scene_remark`, `accommodation`, `accommodation_remark`, `workplace`, `workplace_remark`, `public_place`, `eyewitnesses`, `general_public`, `medical_personnel`, `eyewitnesses_remark`, `causes_cardiac_arres`) VALUES
(3, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 25, 2, '', 1, '', 1, '', 1, 1, 2, 1, '', 1),
(10, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 27, 4, '', 0, '', 0, '', 0, 1, 1, 0, '', 1),
(12, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 33, 1, '1', 1, '1', 0, '', 0, 1, 1, 0, '1', 1),
(18, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 36, 0, '1', 1, '1', 1, '', 1, 0, 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `immune_factor`
--

CREATE TABLE `immune_factor` (
  `immune_factor_id` int(11) NOT NULL COMMENT 'id',
  `basic_information_id` int(11) NOT NULL COMMENT 'basic_information_id',
  `question1` int(11) NOT NULL COMMENT 'ฉันเริ่มทำกิจกรรมหรืองานต่าง ๆ ได้ด้วยตนเอง[1=ไม่เคย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question2` int(11) NOT NULL COMMENT 'ฉันเริ่มทำกิจวัตรประจำวัน โดยไม่ต้องให้ใครมาบอก[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question3` int(11) NOT NULL COMMENT 'ฉันมักผัดวันประกันพรุ่ง ในการเริ่มต้นกระทำกิจกรรมต่าง ๆ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question4` int(11) NOT NULL COMMENT 'ฉันเริ่มคิดทำการบ้านหรืองานต่าง ๆ ในนาทีสุดท้าย[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question5` int(11) NOT NULL COMMENT 'ฉันไม่รู้ว่าจะเริ่มต้นทำงานต่าง ๆ ด้วยตนเองได้อย่างไร[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question6` int(11) NOT NULL COMMENT 'ฉันมีคนคอยเตือนให้ลงมือทำงานต่าง ๆ [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question7` int(11) NOT NULL COMMENT 'เมื่อได้รับการสั่งงานหลาย ๆ อย่าง ฉันจำได้เพียงบางอย่าง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question8` int(11) NOT NULL COMMENT 'ฉันจำรายละเอียดสำคัญในขณะนำเสนองานหน้าชั้นได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question9` int(11) NOT NULL COMMENT 'ฉันสามารถเล่าเหตุการณ์ที่เกิดขึ้นเมื่อวานนี้ให้เพื่อนฟังได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question10` int(11) NOT NULL COMMENT 'ฉันมีปัญหาการจำ แม้ในช่วงเวลาสั้น ๆ (เช่น ทิศทาง, เบอร์โทรศัพท์)[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question11` int(11) NOT NULL COMMENT 'ฉันจำขั้นตอนการทำงานที่ซับซ้อนได้ [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question12` int(11) NOT NULL COMMENT 'ฉันตอบคำถามในหัวข้อที่อาจารย์เคยสอนได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question13` int(11) NOT NULL COMMENT 'ฉันลืมสิ่งที่จะต้องทำในลำดับต่อไป[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question14` int(11) NOT NULL COMMENT 'ฉันถูกเบี่ยงเบนความสนใจได้ง่าย  ในขณะทำกิจกรรม[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question15` int(11) NOT NULL COMMENT 'ฉันจดจ่ออยู่กับกิจกรรมหรืองานที่ทำ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question16` int(11) NOT NULL COMMENT 'ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question17` int(11) NOT NULL COMMENT 'ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question18` int(11) NOT NULL COMMENT 'ฉันเปลี่ยนไปคุยหัวข้อใหม่ ทั้ง ๆ ที่ยังคุยหัวข้อเดิมไม่เสร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question19` int(11) NOT NULL COMMENT 'ฉันมักหาสิ่งของที่ต้องการใช้ไม่เจอ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question20` int(11) NOT NULL COMMENT 'ฉันกำหนดหัวข้อและเรียงลำดับความสำคัญของเนื้อหา ก่อนลงมือทำรายงาน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question21` int(11) NOT NULL COMMENT 'ฉันจัดลำดับความสำคัญของงานที่จะทำได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question22` int(11) NOT NULL COMMENT 'การกำหนดขั้นตอนการทำงานไว้ล่วงหน้า เป็นเรื่องที่ยากสำหรับฉัน [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question23` int(11) NOT NULL COMMENT 'ฉันกำหนดเป้าหมายการทำงานไว้อย่างชัดเจน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question24` int(11) NOT NULL COMMENT 'ฉันตรวจทานความถูกต้องของงาน ก่อนนำส่งอาจารย์[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question25` int(11) NOT NULL COMMENT 'ฉันรู้และปรับแก้ข้อผิดพลาดในงานของฉัน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question26` int(11) NOT NULL COMMENT 'ฉันรู้ข้อผิดพลาดของงาน และปรับแก้ด้วยตนเอง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question27` int(11) NOT NULL COMMENT 'ฉันติดตามผลการปรับปรุงงานของตนเอง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question28` int(11) NOT NULL COMMENT 'ฉันตรวจสอบการปฏิบัติกิจกรรมให้เป็นไปตามแผนที่วางไว้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question29` int(11) NOT NULL COMMENT 'ฉันรู้สึกหงุดหงิด หากต้องเปลี่ยนไปทำกิจกรรมอย่างอื่นที่ไม่ได้กำหนดไว้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question30` int(11) NOT NULL COMMENT 'ฉันกังวลที่จะต้องทำกิจกรรมที่แปลกใหม่และท้าทาย[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question31` int(11) NOT NULL COMMENT 'ฉันยอมรับการเปลี่ยนแปลงที่เกิดขึ้นในชีวิตประจำวันได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question32` int(11) NOT NULL COMMENT 'ฉันยึดติดกับปัญหาใดปัญหาหนึ่งเป็นเวลานานมากเกินไป[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question33` int(11) NOT NULL COMMENT 'ฉันรู้สึกรำคาญ เมื่อเพื่อนยืมใช้ของส่วนตัว[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question34` int(11) NOT NULL COMMENT 'ฉันยินดีรับฟังข้อเสนอแนะในสิ่งที่ฉันทำผิดพลาด[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question35` int(11) NOT NULL COMMENT 'เวลาประสบปัญหาเล็ก ๆ น้อย ๆ  ฉันแสดงออกทางอารมณ์มากเกินไป [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]  ',
  `question36` int(11) NOT NULL COMMENT 'ฉันปรับอารมณ์เข้ากับสถานการณ์ที่ไม่พึงประสงค์ได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question37` int(11) NOT NULL COMMENT 'ฉันเอะอะ โวยวาย เมื่อไม่ได้ดั่งใจ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question38` int(11) NOT NULL COMMENT 'ฉันใช้เวลาเล่นโทรศัพท์มือถือมากเกินไป โดยไม่ได้นึกถึงผลเสียที่จะเกิดตามมา[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question39` int(11) NOT NULL COMMENT 'ฉันทำกิจกรรมที่เสี่ยงอันตราย แม้จะถูกตักเตือนแล้ว[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question40` int(11) NOT NULL COMMENT 'ฉันปฏิเสธเมื่อเพื่อนชวนให้ลองดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question41` int(11) NOT NULL COMMENT 'ฉันคิดไตร่ตรองอย่างรอบคอบ ก่อนลงมือกระทำกิจกรรมต่าง ๆ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question42` int(11) NOT NULL COMMENT 'ฉันไม่พูดคุยกับเพื่อนในระหว่างงานพิธีการของโรงเรียน/ชุมชน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question43` int(11) NOT NULL COMMENT 'ก่อนลงมือทำกิจกรรม ฉันคิดถึงอันตรายที่อาจจะเกิดขึ้นได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question44` int(11) NOT NULL COMMENT 'ฉันตั้งใจทำงานที่ได้รับมอบหมายจนเสร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question45` int(11) NOT NULL COMMENT 'ฉันไม่ย่อท้อในการทำงาน แม้จะมีปัญหาและอุปสรรค[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question46` int(11) NOT NULL COMMENT 'ฉันตั้งใจและลงมือกระทำกิจกรรมหรืองานต่าง ๆ ด้วยความมุ่งมั่น อดทน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ',
  `question47` int(11) NOT NULL COMMENT 'ฉันพยายามหาข้อมูลมาสนับสนุนในการทำโครงงานจนประสบความสำเร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]',
  `question48` int(11) NOT NULL COMMENT 'เมื่อประสบกับปัญหาและอุปสรรค ฉันจะยกเลิกการทำงานนั้นทันที[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `immune_factor`
--

INSERT INTO `immune_factor` (`immune_factor_id`, `basic_information_id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `question11`, `question12`, `question13`, `question14`, `question15`, `question16`, `question17`, `question18`, `question19`, `question20`, `question21`, `question22`, `question23`, `question24`, `question25`, `question26`, `question27`, `question28`, `question29`, `question30`, `question31`, `question32`, `question33`, `question34`, `question35`, `question36`, `question37`, `question38`, `question39`, `question40`, `question41`, `question42`, `question43`, `question44`, `question45`, `question46`, `question47`, `question48`) VALUES
(1, 1, 1, 1, 1, 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE `patient_profile` (
  `patient_profile_id` int(11) NOT NULL COMMENT 'ID',
  `service_information_id` int(11) DEFAULT NULL,
  `ohac_id` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัส OHAC-ID',
  `patient_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้ป่วย ',
  `age` int(11) DEFAULT NULL COMMENT 'อายุ',
  `sex` int(11) DEFAULT NULL COMMENT 'เพศ[1=ชาย,2=หญิง]',
  `right_medical` int(11) DEFAULT NULL COMMENT 'สิทธิการรักษา[1=ไม่มีสิทธิรักษาพยาบาล,2=หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง,3=สิทธิกรมบัญชีกลาง,4=ประกันสังคม ,5=อื่น ๆ]',
  `right_medical_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ ',
  `congenital_disease` int(11) DEFAULT NULL COMMENT 'โรคประจำตัว[1=มี,2=ไม่มี]',
  `congenital_disease_patient` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'โรคประจำตัว[1=Diabetes (เบาหวาน),2=Hypertension (ความดันโลหิตสูง),3=Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ),4=Respiratory disease (ระบบทางเดินหายใจ),5=Stroke/ CVA (หลอดเลือดในสมอง),6=Renal disease (ไต),7=Cancer (มะเร็ง),8=Dyslipidemia (ไขมันในเลือดสูง),9=อื่นๆ]',
  `congenital_disease_patient_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient_profile`
--

INSERT INTO `patient_profile` (`patient_profile_id`, `service_information_id`, `ohac_id`, `patient_name`, `age`, `sex`, `right_medical`, `right_medical_remark`, `congenital_disease`, `congenital_disease_patient`, `congenital_disease_patient_remark`) VALUES
(5, 6, '12', 'mepop', 32, 1, 2, '12', 1, '1', ''),
(6, 25, '121234567989', 'test test', 32, 1, 1, '', 1, '1,2', ''),
(7, 29, '12', 'mepop', 12, 1, 1, '', 2, '1,2', ''),
(8, 32, '1', '1', 1, 2, 1, '', 1, '1,2,3,4,5,6,7,8', ''),
(17, 33, '1234567890115', 'mepop', 32, 1, 2, '', 1, '1,2,3', ''),
(18, 36, '2565110100001', 'สมชาย รักดี', 45, 1, 1, '1', 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_web` varchar(255) NOT NULL COMMENT 'นโยบายการใช้งานเว็บไซต์',
  `policy_pv` varchar(255) NOT NULL COMMENT 'นโยบาบการคุ้มครองข้อมูลส่วนบุคคล',
  `policy_id` int(11) NOT NULL COMMENT 'id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `code`, `name_th`, `name_en`) VALUES
(1, '10', 'กรุงเทพมหานคร', 'Bangkok'),
(2, '11', 'สมุทรปราการ', 'Samut Prakan'),
(3, '12', 'นนทบุรี', 'Nonthaburi'),
(4, '13', 'ปทุมธานี', 'Pathum Thani'),
(5, '14', 'พระนครศรีอยุธยา', 'Phra Nakhon Si Ayutthaya'),
(6, '15', 'อ่างทอง', 'Ang Thong'),
(7, '16', 'ลพบุรี', 'Loburi'),
(8, '17', 'สิงห์บุรี', 'Sing Buri'),
(9, '18', 'ชัยนาท', 'Chai Nat'),
(10, '19', 'สระบุรี', 'Saraburi'),
(11, '20', 'ชลบุรี', 'Chon Buri'),
(12, '21', 'ระยอง', 'Rayong'),
(13, '22', 'จันทบุรี', 'Chanthaburi'),
(14, '23', 'ตราด', 'Trat'),
(15, '24', 'ฉะเชิงเทรา', 'Chachoengsao'),
(16, '25', 'ปราจีนบุรี', 'Prachin Buri'),
(17, '26', 'นครนายก', 'Nakhon Nayok'),
(18, '27', 'สระแก้ว', 'Sa Kaeo'),
(19, '30', 'นครราชสีมา', 'Nakhon Ratchasima'),
(20, '31', 'บุรีรัมย์', 'Buri Ram'),
(21, '32', 'สุรินทร์', 'Surin'),
(22, '33', 'ศรีสะเกษ', 'Si Sa Ket'),
(23, '34', 'อุบลราชธานี', 'Ubon Ratchathani'),
(24, '35', 'ยโสธร', 'Yasothon'),
(25, '36', 'ชัยภูมิ', 'Chaiyaphum'),
(26, '37', 'อำนาจเจริญ', 'Amnat Charoen'),
(27, '39', 'หนองบัวลำภู', 'Nong Bua Lam Phu'),
(28, '40', 'ขอนแก่น', 'Khon Kaen'),
(29, '41', 'อุดรธานี', 'Udon Thani'),
(30, '42', 'เลย', 'Loei'),
(31, '43', 'หนองคาย', 'Nong Khai'),
(32, '44', 'มหาสารคาม', 'Maha Sarakham'),
(33, '45', 'ร้อยเอ็ด', 'Roi Et'),
(34, '46', 'กาฬสินธุ์', 'Kalasin'),
(35, '47', 'สกลนคร', 'Sakon Nakhon'),
(36, '48', 'นครพนม', 'Nakhon Phanom'),
(37, '49', 'มุกดาหาร', 'Mukdahan'),
(38, '50', 'เชียงใหม่', 'Chiang Mai'),
(39, '51', 'ลำพูน', 'Lamphun'),
(40, '52', 'ลำปาง', 'Lampang'),
(41, '53', 'อุตรดิตถ์', 'Uttaradit'),
(42, '54', 'แพร่', 'Phrae'),
(43, '55', 'น่าน', 'Nan'),
(44, '56', 'พะเยา', 'Phayao'),
(45, '57', 'เชียงราย', 'Chiang Rai'),
(46, '58', 'แม่ฮ่องสอน', 'Mae Hong Son'),
(47, '60', 'นครสวรรค์', 'Nakhon Sawan'),
(48, '61', 'อุทัยธานี', 'Uthai Thani'),
(49, '62', 'กำแพงเพชร', 'Kamphaeng Phet'),
(50, '63', 'ตาก', 'Tak'),
(51, '64', 'สุโขทัย', 'Sukhothai'),
(52, '65', 'พิษณุโลก', 'Phitsanulok'),
(53, '66', 'พิจิตร', 'Phichit'),
(54, '67', 'เพชรบูรณ์', 'Phetchabun'),
(55, '70', 'ราชบุรี', 'Ratchaburi'),
(56, '71', 'กาญจนบุรี', 'Kanchanaburi'),
(57, '72', 'สุพรรณบุรี', 'Suphan Buri'),
(58, '73', 'นครปฐม', 'Nakhon Pathom'),
(59, '74', 'สมุทรสาคร', 'Samut Sakhon'),
(60, '75', 'สมุทรสงคราม', 'Samut Songkhram'),
(61, '76', 'เพชรบุรี', 'Phetchaburi'),
(62, '77', 'ประจวบคีรีขันธ์', 'Prachuap Khiri Khan'),
(63, '80', 'นครศรีธรรมราช', 'Nakhon Si Thammarat'),
(64, '81', 'กระบี่', 'Krabi'),
(65, '82', 'พังงา', 'Phangnga'),
(66, '83', 'ภูเก็ต', 'Phuket'),
(67, '84', 'สุราษฎร์ธานี', 'Surat Thani'),
(68, '85', 'ระนอง', 'Ranong'),
(69, '86', 'ชุมพร', 'Chumphon'),
(70, '90', 'สงขลา', 'Songkhla'),
(71, '91', 'สตูล', 'Satun'),
(72, '92', 'ตรัง', 'Trang'),
(73, '93', 'พัทลุง', 'Phatthalung'),
(74, '94', 'ปัตตานี', 'Pattani'),
(75, '95', 'ยะลา', 'Yala'),
(76, '96', 'นราธิวาส', 'Narathiwat'),
(77, '97', 'บึงกาฬ', 'buogkan');

-- --------------------------------------------------------

--
-- Table structure for table `result_data`
--

CREATE TABLE `result_data` (
  `result_data_id` int(11) NOT NULL,
  `service_information_id` int(11) NOT NULL,
  `patient_status` int(11) DEFAULT NULL COMMENT 'สถานภาพผู้ป่วยภายหลังทำการช่วยชีวิต[1=มีชีวิต รักษาในโรงพยาบาล,2=เสียชีวิต]	',
  `patient_status_dead` int(11) DEFAULT NULL COMMENT 'เสียชีวิต[1=เสียชีวิตก่อนถึงโรงพยาบาล,2=เสียชีวิตที่แผนกอุบัติเหตุและฉุกเฉิน,3=เสียชีวิตระหว่างนอนโรงพยาบาล,4=กลับไปเสียชีวิตที่บ้าน]',
  `department` int(11) DEFAULT NULL COMMENT 'แผนกที่ผู้ป่วยเข้ารับการรักษา[1=หอผู้ป่วยหนัก,2=หอผู้ป่วยสามัญ]	',
  `survival` int(11) DEFAULT NULL COMMENT 'การรอดชีวิต จำหน่ายออกจากโรงพยาบาล[1=ไม่มี Neuro deficit สามารถกลับไปใช้ชีวิตได้ตามปกติ จำหน่ายออกจากโรงพยาบาล,2=มี Neuro deficit แต่ยังสามารถช่วยเหลือตัวเองได้บ้าง,3=มี Neuro deficit  ไม่สามารถช่วยเหลือตนเองได้เลย (Fully dependent)]',
  `days_admitted` int(11) DEFAULT NULL COMMENT 'จำนวนวันที่รับไว้รักษาในโรงพยาบาล',
  `date_out` date DEFAULT NULL COMMENT 'วันเวลาที่จำหน่าย',
  `date_out_course` int(11) DEFAULT NULL COMMENT 'เหตุผลในการจำหน่าย[1=ญาติปฏิเสธการรักษา,2=มีชีวิต,3=เสียชีวิต]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT=' ผลลัพธ์';

--
-- Dumping data for table `result_data`
--

INSERT INTO `result_data` (`result_data_id`, `service_information_id`, `patient_status`, `patient_status_dead`, `department`, `survival`, `days_admitted`, `date_out`, `date_out_course`) VALUES
(1, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 25, 2, 1, 1, 1, 1, '2022-04-24', 3),
(8, 25, 1, 0, 1, 1, 12, '2022-04-24', 2),
(9, 25, 1, 1, 1, 1, 17, '2022-04-24', 2),
(10, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 29, 1, 4, 2, 3, 12, '2022-04-25', 2),
(14, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 1, 0, 1, 1, 1, '2022-10-24', 1),
(19, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 1, 0, 1, 1, 1, '2022-11-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `risk_behavior`
--

CREATE TABLE `risk_behavior` (
  `risk_behavior_id` int(11) NOT NULL COMMENT 'id',
  `basic_information_id` int(11) NOT NULL,
  `question1` int(11) NOT NULL COMMENT 'ฉันเป็นคนมีสาระ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question2` int(11) NOT NULL COMMENT 'ฉันไม่คิดก่อนพูด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question3` int(11) NOT NULL COMMENT 'ฉันชอบความโลดโผนท้าทาย เช่น แข่งรถ ปีนเขา กระโดดร่ม[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question4` int(11) NOT NULL COMMENT 'ฉันรู้สึกมีความสุขในชีวิต[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question5` int(11) NOT NULL COMMENT 'เมื่อเหตุการณ์ผ่านไปแล้ว ฉันได้แต่เสียใจในการกระทำของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question6` int(11) NOT NULL COMMENT 'ฉันมีประสบการณ์ที่ตื่นเต้นและท้าทาย[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question7` int(11) NOT NULL COMMENT 'ฉันได้วางแผนเกี่ยวกับอนาคตตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question8` int(11) NOT NULL COMMENT 'ฉันรู้สึกวิตกกังวลจนปวดศีรษะ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question9` int(11) NOT NULL COMMENT 'ฉันรู้สึกกังวลในการทำบางสิ่ง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question10` int(11) NOT NULL COMMENT 'ฉันมีความกล้าที่จะเปลี่ยนแปลงชีวิตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question11` int(11) NOT NULL COMMENT 'ฉันทำอะไรโดยไม่คิด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question12` int(11) NOT NULL COMMENT 'ฉันชอบการขับมอเตอร์ไซค์ด้วยความเร็วสูง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question13` int(11) NOT NULL COMMENT 'ฉันมีความภาคภูมิใจในตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question14` int(11) NOT NULL COMMENT 'ฉันเป็นคนขี้กลัว  เวลาจะทำอะไรมักจะวิตกกังวล[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question15` int(11) NOT NULL COMMENT 'ฉันเป็นคนหุนหันพลันแล่น[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question16` int(11) NOT NULL COMMENT 'ฉันชอบทำกิจกรรมที่มีความตื่นเต้นท้าทายโดยเฉพาะการกระทำที่ฝ่าฝืนกฎ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question17` int(11) NOT NULL COMMENT 'ฉันรู้สึกว่าฉันล้มเหลวในชีวิต ทำอะไรก็ไม่สำเร็จ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question18` int(11) NOT NULL COMMENT 'ฉันใช้อารมณ์มากกว่าเหตุผล[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question19` int(11) NOT NULL COMMENT 'ฉันมีความสุขในการรุกรานพื้นที่ของผู้อื่น[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question20` int(11) NOT NULL COMMENT 'ฉันมีความพอใจในชีวิตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question21` int(11) NOT NULL COMMENT 'ฉันกลัวที่จะต้องทำสิ่งใดสิ่งหนึ่ง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question22` int(11) NOT NULL COMMENT 'ฉันต้องการความเปลี่ยนแปลงในสิ่งใหม่อยู่เสมอ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]',
  `question23` int(11) NOT NULL COMMENT 'ฉันมีความกระตือรือร้นต่ออนาคตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='พฤติกรรมเสี่ยง';

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ืชื่อสถานศึกษา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ศูนย์บริการ',
  `code_name` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `services_id` int(11) NOT NULL COMMENT 'ID',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_name`, `code_name`, `services_id`, `address`) VALUES
('วชิระพยาบาล', '11535', 1, 'กรุงเทพมหานคร ดูแลพื้นที่เขตพระนคร ดุสิต ตลิ่งชัน บางพลัด บางซื่อ ทวีวัฒนา'),
('โรงพยาบาลกลาง', '11537', 2, 'ดูแลพื้นที่เขตป้อมปราบศัตรูพ่าย สัมพันธวงศ์'),
('โรงพยาบาลตากสิน', '11539', 3, 'ดูแลพื้นที่เขตจอมทอง บางแค'),
('โรงพยาบาลเจริญกรุงประชารักษ์', '11541', 4, 'ดูแลพื้นที่เขตบางขุนเทียน ราษฎร์บูรณะ บางคอแหลม คลองเตย ทุ่งครุ บางบอน'),
('โรงพยาบาลเลิดสิน', '11469', 5, 'ดูแลพื้นที่เขตบางรัก พระโขนง ยานนาวา สาทร วัฒนา บางนา หนองจอก'),
('โรงพยาบาลนพรัตน์', '11470', 6, 'ดูแลพื้นที่เขตบางกะปิ มีนบุรี ลาดกระบัง บึงกุ่ม ประเวศ สวนหลวง คันนายาว สะพานสูง คลองสามวา'),
('โรงพยาบาลภูมิพล', '11482', 7, 'ดูแลพ้นที่เขตดอนเมือง หลักสี่ สายไหม'),
('โรงพยาบาลราชวิถี', '11472', 8, 'ดูแลพื้นที่เขตพญาไท ห้วยขวาง ดินแดง จตุจักร ราชเทวี ลาดพร้าว'),
('โรงพยาบาลตำรวจ', '14173', 9, 'ดูแลพื้นที่เขตปทุมวัน วังทองหลาง');

-- --------------------------------------------------------

--
-- Table structure for table `service_information`
--

CREATE TABLE `service_information` (
  `service_information_id` int(11) NOT NULL COMMENT 'ID',
  `master_ohca_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_unit_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หน่วยบริการ   ',
  `operating_command` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปฏิบัติการที่',
  `zone_area` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'พื้นที่โซน',
  `police_station` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สน',
  `operating_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขที่ปฏิบัติการ',
  `regis_date` date DEFAULT NULL COMMENT 'วันที่',
  `performance` int(11) DEFAULT NULL COMMENT 'ผลการปฏิบัติ[1=พบเหตุ,2=ไม่พบเหตุ,3=ปฏิบัติการ,4=ในพื้นที่,5=นอกพื้นที่]',
  `locale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานที่เกิดเหตุ',
  `event` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC)',
  `create_by_userid` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `create_date` date DEFAULT NULL COMMENT 'วันที่สร้าง',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ข้อมูลหน่วยบริการ';

--
-- Dumping data for table `service_information`
--

INSERT INTO `service_information` (`service_information_id`, `master_ohca_id`, `service_unit_name`, `operating_command`, `zone_area`, `police_station`, `operating_number`, `regis_date`, `performance`, `locale`, `event`, `create_by_userid`, `create_date`, `status`) VALUES
(25, NULL, 'วชิระพยาบาล', 'xx', 'xx', 'xx', 'xx', '2022-04-23', 2, 'xx', 'xx', 3, '2022-04-23', 0),
(26, NULL, 'วชิระพยาบาล', 'xxx', 'xx', 'xx', 'xx', '2022-04-23', 3, 'xxx', 'xx', 3, '2022-04-23', 0),
(27, NULL, 'โรงพยาบาลกลาง', 'xxx', 'xx', 'xx', 'xx', '2022-04-24', 1, 'xx', 'xx', 3, '2022-04-24', 0),
(28, NULL, 'โรงพยาบาลตากสิน', 'xx', 'xx', 'xx', 'xx', '2022-04-24', 1, 'xx', 'xx', 4, '2022-04-24', 0),
(29, NULL, 'โรงพยาบาลตากสิน', 'xxx', 'xxx', 'xxx', '2233344', '2022-04-25', 1, 'xx', 'xxx', 4, '2022-04-25', 0),
(30, NULL, 'วชิระพยาบาล', '1', '1', '1', '1', '2022-04-27', 5, '1', '1', 8, '2022-04-26', 0),
(31, NULL, 'วชิระพยาบาล', '1', '1', '1', '1', '2022-04-26', 4, '1', '1', 8, '2022-04-26', 0),
(32, NULL, 'วชิระพยาบาล', '1', '1', '1', '1', '2022-04-26', 2, '1', '1', 8, '2022-04-26', 0),
(33, 'โรงพยาบาลกลาง', 'โรงพยาบาลกลาง', 'xx', 'xx', 'xx', '123456789011', '2022-05-10', 1, 'xxx', '0000', 4, '2022-05-10', 0),
(34, 'วชิระพยาบาล', 'วชิระพยาบาล', '1', '1', '1', '1', '2022-10-17', 2, '1', '0000', 4, '2022-10-19', 0),
(36, 'โรงพยาบาลตำรวจ', 'โรงพยาบาลตำรวจ', 'ถนนพระราม 1 แขวงปทุมวัน เขตปทุมวัน', 'ปทุมวัน', 'ปทุมวัน', '2565110100001', '2022-11-01', 1, 'ถนนพระราม 1 แขวงปทุมวัน เขตปทุมวัน', '0000', 4, '2022-11-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_information_users`
--

CREATE TABLE `service_information_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_information_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='เจ้าหน้าที่ผู้ให้บริการ';

--
-- Dumping data for table `service_information_users`
--

INSERT INTO `service_information_users` (`id`, `user_id`, `service_information_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 4, 2),
(4, 1, 4),
(5, 1, 4),
(6, 3, 6),
(7, 4, 6),
(8, 7, 7),
(9, 7, 8),
(10, 3, 23),
(11, 7, 28),
(12, 5, 29),
(13, 10, 36);

-- --------------------------------------------------------

--
-- Table structure for table `table_name`
--

CREATE TABLE `table_name` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_addr_province`
--

CREATE TABLE `tb_addr_province` (
  `PROVINCE_ID` int(5) NOT NULL,
  `PROVINCE_CODE` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_addr_province`
--

INSERT INTO `tb_addr_province` (`PROVINCE_ID`, `PROVINCE_CODE`, `PROVINCE_NAME`, `GEO_ID`) VALUES
(1, '10', 'กรุงเทพมหานคร   ', 2),
(2, '11', 'สมุทรปราการ   ', 2),
(3, '12', 'นนทบุรี   ', 2),
(4, '13', 'ปทุมธานี   ', 2),
(5, '14', 'พระนครศรีอยุธยา   ', 2),
(6, '15', 'อ่างทอง   ', 2),
(7, '16', 'ลพบุรี   ', 2),
(8, '17', 'สิงห์บุรี   ', 2),
(9, '18', 'ชัยนาท   ', 2),
(10, '19', 'สระบุรี', 2),
(11, '20', 'ชลบุรี   ', 5),
(12, '21', 'ระยอง   ', 5),
(13, '22', 'จันทบุรี   ', 5),
(14, '23', 'ตราด   ', 5),
(15, '24', 'ฉะเชิงเทรา   ', 5),
(16, '25', 'ปราจีนบุรี   ', 5),
(17, '26', 'นครนายก   ', 2),
(18, '27', 'สระแก้ว   ', 5),
(19, '30', 'นครราชสีมา   ', 3),
(20, '31', 'บุรีรัมย์   ', 3),
(21, '32', 'สุรินทร์   ', 3),
(22, '33', 'ศรีสะเกษ   ', 3),
(23, '34', 'อุบลราชธานี   ', 3),
(24, '35', 'ยโสธร   ', 3),
(25, '36', 'ชัยภูมิ   ', 3),
(26, '37', 'อำนาจเจริญ   ', 3),
(27, '39', 'หนองบัวลำภู   ', 3),
(28, '40', 'ขอนแก่น   ', 3),
(29, '41', 'อุดรธานี   ', 3),
(30, '42', 'เลย   ', 3),
(31, '43', 'หนองคาย   ', 3),
(32, '44', 'มหาสารคาม   ', 3),
(33, '45', 'ร้อยเอ็ด   ', 3),
(34, '46', 'กาฬสินธุ์   ', 3),
(35, '47', 'สกลนคร   ', 3),
(36, '48', 'นครพนม   ', 3),
(37, '49', 'มุกดาหาร   ', 3),
(38, '50', 'เชียงใหม่   ', 1),
(39, '51', 'ลำพูน   ', 1),
(40, '52', 'ลำปาง   ', 1),
(41, '53', 'อุตรดิตถ์   ', 1),
(42, '54', 'แพร่   ', 1),
(43, '55', 'น่าน   ', 1),
(44, '56', 'พะเยา   ', 1),
(45, '57', 'เชียงราย   ', 1),
(46, '58', 'แม่ฮ่องสอน   ', 1),
(47, '60', 'นครสวรรค์   ', 2),
(48, '61', 'อุทัยธานี   ', 2),
(49, '62', 'กำแพงเพชร   ', 2),
(50, '63', 'ตาก   ', 4),
(51, '64', 'สุโขทัย   ', 2),
(52, '65', 'พิษณุโลก   ', 2),
(53, '66', 'พิจิตร   ', 2),
(54, '67', 'เพชรบูรณ์   ', 2),
(55, '70', 'ราชบุรี   ', 4),
(56, '71', 'กาญจนบุรี   ', 4),
(57, '72', 'สุพรรณบุรี   ', 2),
(58, '73', 'นครปฐม   ', 2),
(59, '74', 'สมุทรสาคร   ', 2),
(60, '75', 'สมุทรสงคราม   ', 2),
(61, '76', 'เพชรบุรี   ', 4),
(62, '77', 'ประจวบคีรีขันธ์   ', 4),
(63, '80', 'นครศรีธรรมราช   ', 6),
(64, '81', 'กระบี่   ', 6),
(65, '82', 'พังงา   ', 6),
(66, '83', 'ภูเก็ต   ', 6),
(67, '84', 'สุราษฎร์ธานี   ', 6),
(68, '85', 'ระนอง   ', 6),
(69, '86', 'ชุมพร   ', 6),
(70, '90', 'สงขลา   ', 6),
(71, '91', 'สตูล   ', 6),
(72, '92', 'ตรัง   ', 6),
(73, '93', 'พัทลุง   ', 6),
(74, '94', 'ปัตตานี   ', 6),
(75, '95', 'ยะลา   ', 6),
(76, '96', 'นราธิวาส   ', 6),
(77, '97', 'บึงกาฬ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_assessment_01`
--

CREATE TABLE `tb_assessment_01` (
  `assessment_id` int(10) NOT NULL COMMENT 'รหัสผู้ประเมิน',
  `assessment_date` date NOT NULL COMMENT 'วันประเมิน',
  `province` int(2) NOT NULL COMMENT 'จังหวัด',
  `section` int(2) NOT NULL COMMENT 'ภาค ปปส',
  `Sex` int(1) NOT NULL COMMENT 'เพศ',
  `Age` int(2) NOT NULL COMMENT 'อายุ',
  `Edu1` int(1) NOT NULL COMMENT 'สถานภาพการศึกษา         ',
  `Edu2` int(1) NOT NULL COMMENT 'ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่',
  `sisbro` int(1) NOT NULL COMMENT 'จำนวนพี่น้อง         ',
  `family` int(1) NOT NULL COMMENT 'สถานภาพทางครอบครัว ',
  `Dad Job` int(1) NOT NULL COMMENT 'อาชีพของบิดา ',
  `Mom Job` int(1) NOT NULL COMMENT 'อาชีพของมารดา ',
  `earn` int(1) NOT NULL COMMENT 'รายได้ของครอบครัว (เฉลี่ยต่อเดือน)',
  `C1` int(1) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `C2` int(1) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `C3` int(1) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `C4` int(1) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `C5` int(1) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `C6` int(1) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `C7` int(1) NOT NULL COMMENT 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `try` int(1) NOT NULL COMMENT 'ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่            ',
  `D1` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D2` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)  ',
  `D3` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D4` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D5` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D6` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D7` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D8` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D9` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D10` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D11` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)',
  `D12` int(1) NOT NULL COMMENT 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ci_log_delete`
--

CREATE TABLE `tb_ci_log_delete` (
  `log_id` int(11) NOT NULL,
  `log_del_remark` varchar(50) DEFAULT NULL COMMENT 'หมายเหตุ',
  `log_table_name` varchar(70) DEFAULT NULL COMMENT 'ชื่อตารางที่ลบ',
  `log_table_pk_name` varchar(100) DEFAULT NULL COMMENT 'PK Field',
  `log_table_pk_value` varchar(100) DEFAULT NULL COMMENT 'PK Value',
  `log_del_condition` varchar(100) DEFAULT NULL COMMENT 'เงื่อนไขที่ใช้ลบ',
  `log_record_data` text COMMENT 'ข้อมูลเรคอร์ดที่ลบ',
  `create_user_id` int(11) DEFAULT NULL COMMENT 'รหัสผู้ทำรายการ',
  `create_datetime` datetime DEFAULT NULL COMMENT 'วันที่ทำรายการ',
  `log_login_id` int(11) DEFAULT NULL COMMENT 'อ้างอิงตารางล็อกอิน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='เก็บข้อมูลก่อนลบ';

--
-- Dumping data for table `tb_ci_log_delete`
--

INSERT INTO `tb_ci_log_delete` (`log_id`, `log_del_remark`, `log_table_name`, `log_table_pk_name`, `log_table_pk_value`, `log_del_condition`, `log_record_data`, `create_user_id`, `create_datetime`, `log_login_id`) VALUES
(1, 'ไฟล์ไม่ถูกต้อง', 'cms_slide', 'cms_slide_id', '2', 'cms_slide.cms_slide_id = 2', '{\"cms_slide_id\":\"2\",\"title\":\"slide2\",\"image\":\".\\/assets\\/uploads\\/slides\\/2565\\/3bdb01ba2f0f4dae935e1b5a44d88dc2.png\",\"sequences\":\"2\"}', 3, '2022-04-10 10:10:51', NULL),
(2, 'ข้อมุลไม่ถูกต้อง', 'cms_slide', 'cms_slide_id', '1', 'cms_slide.cms_slide_id = 1', '{\"cms_slide_id\":\"1\",\"title\":\"slide1\",\"image\":\".\\/assets\\/uploads\\/slides\\/2565\\/5ac5bed7d754b4f5a13fd105220a889d.png\",\"sequences\":\"1\"}', 3, '2022-04-10 10:10:56', NULL),
(3, 'ไฟล์ไม่ถูกต้อง', 'cms_faq', 'cms_faq_id', '1', 'cms_faq.cms_faq_id = 1', '{\"cms_faq_id\":\"1\",\"cms_faq_title\":\"faq1\",\"faq_detail\":\"dssdsdsdsdsdsd\"}', 3, '2022-04-10 12:53:22', NULL),
(4, '', 'tb_uploads_filename', 'id', '4', 'tb_uploads_filename.encrypt_name = \'b27d274da3d5dbf1421056e9293db365.png\' ', '{\"id\":\"4\",\"encrypt_name\":\"b27d274da3d5dbf1421056e9293db365.png\",\"filename\":\"niems_logo.png\"}', 3, '2022-04-18 06:15:13', NULL),
(5, '', 'tb_uploads_filename', 'id', '5', 'tb_uploads_filename.encrypt_name = \'b0adf5bcaea5474a2c97e8a6ac322494.png\' ', '{\"id\":\"5\",\"encrypt_name\":\"b0adf5bcaea5474a2c97e8a6ac322494.png\",\"filename\":\"Screen_Shot_2022-04-06_at_15_37_46.png\"}', 3, '2022-04-18 06:15:49', NULL),
(6, '', 'tb_uploads_filename', 'id', '1', 'tb_uploads_filename.encrypt_name = \'51040a290af97be753ff38a2b877cf64.png\' ', '{\"id\":\"1\",\"encrypt_name\":\"51040a290af97be753ff38a2b877cf64.png\",\"filename\":\"Screen_Shot_2022-04-08_at_09_37_55.png\"}', 3, '2022-04-18 08:15:00', NULL),
(7, '', 'tb_uploads_filename', 'id', '16', 'tb_uploads_filename.encrypt_name = \'4b9fbc6c9e27ba8a0f74db5e53543f2d.jpg\' ', '{\"id\":\"16\",\"encrypt_name\":\"4b9fbc6c9e27ba8a0f74db5e53543f2d.jpg\",\"filename\":\"home-3-spread-004.jpg\"}', 3, '2022-04-18 08:37:16', NULL),
(8, 'ไฟล์ไม่ถูกต้อง', 'cms_faq', 'cms_faq_id', '5', 'cms_faq.cms_faq_id = 5', '{\"cms_faq_id\":\"5\",\"cms_faq_title\":\"sdsdsd\",\"faq_detail\":\"sdsdsd\"}', 3, '2022-04-18 12:55:06', NULL),
(9, 'ไฟล์ไม่ถูกต้อง', 'service_information', 'service_information_id', '13', 'service_information.service_information_id = 13', '{\"service_information_id\":\"13\",\"master_ohca_id\":null,\"service_unit_name\":null,\"operating_command\":null,\"zone_area\":null,\"police_station\":null,\"operating_number\":null,\"regis_date\":null,\"performance\":null,\"locale\":null,\"event\":null,\"create_by_userid\":null,\"create_date\":null}', 3, '2022-04-23 11:07:49', NULL),
(10, 'ข้อมุลไม่ถูกต้อง', 'service_information', 'service_information_id', '16', 'service_information.service_information_id = 16', '{\"service_information_id\":\"16\",\"master_ohca_id\":null,\"service_unit_name\":\"\\u0e27\\u0e0a\\u0e34\\u0e23\\u0e30\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\",\"operating_command\":\"xx\",\"zone_area\":\"xx\",\"police_station\":\"xx\",\"operating_number\":\"xx\",\"regis_date\":\"2022-04-23\",\"performance\":\"1\",\"locale\":\"xx\",\"event\":\"xx\",\"create_by_userid\":\"3\",\"create_date\":\"2022-04-23\"}', 3, '2022-04-23 11:07:53', NULL),
(11, '', 'tb_uploads_filename', 'id', '22', 'tb_uploads_filename.encrypt_name = \'683eb71e1788e87357988b7964f2c072.png\' ', '{\"id\":\"22\",\"encrypt_name\":\"683eb71e1788e87357988b7964f2c072.png\",\"filename\":\"MU_Pop.png\"}', 3, '2022-04-24 06:16:06', NULL),
(12, '', 'tb_uploads_filename', 'id', '23', 'tb_uploads_filename.encrypt_name = \'e8d76c7164ba3414242ddec30b48aa51.jpg\' ', '{\"id\":\"23\",\"encrypt_name\":\"e8d76c7164ba3414242ddec30b48aa51.jpg\",\"filename\":\"timeline_20191202_182046_(1).jpg\"}', 3, '2022-04-24 06:24:47', NULL),
(13, '', 'tb_uploads_filename', 'id', '24', 'tb_uploads_filename.encrypt_name = \'91f358b7a85006b3ae9e1430b4507620.jpg\' ', '{\"id\":\"24\",\"encrypt_name\":\"91f358b7a85006b3ae9e1430b4507620.jpg\",\"filename\":\"messageImage_1631155938979.jpg\"}', 3, '2022-04-24 06:26:03', NULL),
(14, 'ไฟล์ไม่ถูกต้อง', 'cms_teams', 'cms_team_id', '4', 'cms_teams.cms_team_id = 4', '{\"cms_team_id\":\"4\",\"photo\":\".\\/assets\\/uploads\\/cms_teams\\/2565\\/91f358b7a85006b3ae9e1430b4507620.jpg\",\"name\":\"\\u0e1b\\u0e32\\u0e23\\u0e34\\u0e17\\u0e23\\u0e23\\u0e28\\u0e4c2 \\u0e14\\u0e32\\u0e40\\u0e14\\u0e0a\",\"company_name\":\"Ctrlplus\",\"tel\":\"0946379768\",\"level\":\"4\"}', 3, '2022-04-24 06:27:51', NULL),
(15, 'ข้อมุลไม่ถูกต้อง', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '2', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 2', '{\"cms_cardiac_arrest_id\":\"2\",\"image\":\".\\/assets\\/uploads\\/cms_cardiac_arrest_slide\\/2565\\/a348571fa1a3523b5dc1b654f22de149.png\"}', 3, '2022-04-24 06:28:46', NULL),
(16, 'ข้อมุลไม่ถูกต้อง', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '1', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 1', '{\"cms_cardiac_arrest_id\":\"1\",\"image\":\".\\/assets\\/uploads\\/cms_cardiac_arrest_slide\\/2565\\/f5bdc1ce6011459b7fd1be6ca965b151.jpg\"}', 3, '2022-04-24 06:28:51', NULL),
(17, 'ไฟล์ไม่ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '2', 'ca_symptoms.ca_symptoms_id = 2', '{\"ca_symptoms_id\":\"2\",\"ca_symptoms_name\":\"sdsdsd\",\"ca_symptoms_detail\":\"sdsdsdsd\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/2543239777391c57e6d7dd39fed341a2.png\"}', 3, '2022-04-24 06:31:06', NULL),
(18, 'ไฟล์ไม่ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '1', 'ca_symptoms.ca_symptoms_id = 1', '{\"ca_symptoms_id\":\"1\",\"ca_symptoms_name\":\"\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e191\",\"ca_symptoms_detail\":\"\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e191\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/724fcfecb10486a6329b47f2e1ab1ad4.png\"}', 3, '2022-04-24 06:31:11', NULL),
(19, '', 'tb_uploads_filename', 'id', '21', 'tb_uploads_filename.encrypt_name = \'7485518ee2f91ec89da8f576aa3caf72.png\' ', '{\"id\":\"21\",\"encrypt_name\":\"7485518ee2f91ec89da8f576aa3caf72.png\",\"filename\":\"MU_Pop.png\"}', 3, '2022-04-24 06:35:56', NULL),
(20, 'ไฟล์ไม่ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '4', 'ca_symptoms.ca_symptoms_id = 4', '{\"ca_symptoms_id\":\"4\",\"ca_symptoms_name\":\"Victim collapse\",\"ca_symptoms_detail\":\"Victim collapse\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/fd6d6ec48c760eac2b73969626176466.png\"}', 3, '2022-04-24 06:43:57', NULL),
(21, '', 'tb_uploads_filename', 'id', '6', 'tb_uploads_filename.encrypt_name = \'e7c1ca6449680ebfa8ca9f174493ecbb.png\' ', '{\"id\":\"6\",\"encrypt_name\":\"e7c1ca6449680ebfa8ca9f174493ecbb.png\",\"filename\":\"niems_logo.png\"}', 3, '2022-04-24 06:57:15', NULL),
(22, '', 'tb_uploads_filename', 'id', '13', 'tb_uploads_filename.encrypt_name = \'bb8db4275b8ff2e53c5c6c7622576385.png\' ', '{\"id\":\"13\",\"encrypt_name\":\"bb8db4275b8ff2e53c5c6c7622576385.png\",\"filename\":\"png-transparent-heart-health-heart-cardiovascular-disease-ecg-love-food-text.png\"}', 3, '2022-04-24 07:16:26', NULL),
(23, 'ไฟล์ไม่ถูกต้อง', 'cms_posts', 'id', '1', 'cms_posts.id = 1', '{\"id\":\"1\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/530ce62864a2df9f3a6c66521d00ae11.jpeg\",\"title\":\"iOS 15.4 \\u0e2d\\u0e31\\u0e1b\\u0e40\\u0e14\\u0e15\\u0e44\\u0e14\\u0e49\\u0e41\\u0e25\\u0e49\\u0e27 \\u0e2a\\u0e41\\u0e01\\u0e19\\u0e2b\\u0e19\\u0e49\\u0e32 (Face ID) \\u0e02\\u0e13\\u0e30\\u0e43\\u0e2a\\u0e48\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e2d\\u0e19\\u0e32\\u0e21\\u0e31\\u0e22\\u0e44\\u0e14\\u0e49\",\"message\":\"\\u0e14\\u0e49\\u0e27\\u0e22 iOS 15.4 \\u0e15\\u0e2d\\u0e19\\u0e19\\u0e35\\u0e49\\u0e21\\u0e35\\u0e15\\u0e31\\u0e27\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e25\\u0e14\\u0e25\\u0e47\\u0e2d\\u0e01 iPhone \\u0e02\\u0e2d\\u0e07\\u0e04\\u0e38\\u0e13\\u0e02\\u0e13\\u0e30\\u0e2a\\u0e27\\u0e21\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e42\\u0e14\\u0e22\\u0e44\\u0e21\\u0e48\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e43\\u0e0a\\u0e49\\u0e2e\\u0e32\\u0e23\\u0e4c\\u0e14\\u0e41\\u0e27\\u0e23\\u0e4c\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e40\\u0e15\\u0e34\\u0e21 \\u0e40\\u0e0a\\u0e48\\u0e19 Apple Watch&nbsp; \\u0e14\\u0e49\\u0e32\\u0e19 Apple \\u0e40\\u0e15\\u0e37\\u0e2d\\u0e19\\u0e27\\u0e48\\u0e32 ID \\u0e41\\u0e1a\\u0e1a\\u0e40\\u0e15\\u0e47\\u0e21\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e15\\u0e31\\u0e27\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e17\\u0e35\\u0e48\\u0e1b\\u0e25\\u0e2d\\u0e14\\u0e20\\u0e31\\u0e22\\u0e01\\u0e27\\u0e48\\u0e32 \\u0e41\\u0e15\\u0e48\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e25\\u0e14\\u0e25\\u0e47\\u0e2d\\u0e01\\u0e1c\\u0e48\\u0e32\\u0e19\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e2d\\u0e19\\u0e34\\u0e40\\u0e21\\u0e31\\u0e22 Face ID \\u0e01\\u0e47\\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e43\\u0e0a\\u0e49\\u0e07\\u0e32\\u0e19\\u0e44\\u0e14\\u0e49\\u0e41\\u0e25\\u0e49\\u0e27\",\"category_id\":\"1\",\"userid\":\"3\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-10 14:02:46\"}', 3, '2022-04-25 12:39:58', NULL),
(24, 'ข้อมุลไม่ถูกต้อง', 'cms_faq', 'cms_faq_id', '6', 'cms_faq.cms_faq_id = 6', '{\"cms_faq_id\":\"6\",\"cms_faq_title\":\"faq1\",\"faq_detail\":\"xxxxxxxxx\"}', 3, '2022-04-25 12:43:21', NULL),
(25, 'ข้อมุลไม่ถูกต้อง', 'cms_researchs', 'cms_researchs_id', '2', 'cms_researchs.cms_researchs_id = 2', '{\"cms_researchs_id\":\"2\",\"image\":\".\\/assets\\/uploads\\/research\\/2565\\/c7737bd0d61813f514d4693daf1bc33c.png\",\"subject\":\"\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19 (Cardiac Arrest)\",\"detail\":\"xzxzxzx\",\"research_name\":\"zxzxzxzx\",\"create_date\":\"2022-04-25\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/research\\/2565\\/e757f7f008469e93e46c3158d710c2c0.xlsx\"}', 3, '2022-04-25 12:48:29', NULL),
(26, 'ข้อมุลไม่ถูกต้อง', 'cms_teams', 'cms_team_id', '5', 'cms_teams.cms_team_id = 5', '{\"cms_team_id\":\"5\",\"photo\":\".\\/assets\\/uploads\\/cms_teams\\/2565\\/3e87988ebc75dffa60c43cd0a46d60ac.png\",\"name\":\"xxx\",\"company_name\":\"xx\",\"tel\":\"(662)256 4\",\"level\":\"4\"}', 3, '2022-04-25 12:53:21', NULL),
(27, 'ข้อมุลไม่ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '9', 'ca_symptoms.ca_symptoms_id = 9', '{\"ca_symptoms_id\":\"9\",\"ca_symptoms_name\":\"\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e191\",\"ca_symptoms_detail\":\"\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19 (Sudden Cardiac Arrest) \\u0e04\\u0e37\\u0e2d \\u0e20\\u0e32\\u0e27\\u0e30\\u0e17\\u0e35\\u0e48\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e1c\\u0e34\\u0e14\\u0e1b\\u0e01\\u0e15\\u0e34 \\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e25\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e35\\u0e1a\\u0e15\\u0e31\\u0e27\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e40\\u0e15\\u0e49\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 \\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e44\\u0e21\\u0e48\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e44\\u0e1b\\u0e40\\u0e25\\u0e35\\u0e49\\u0e22\\u0e07\\u0e15\\u0e32\\u0e21\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e15\\u0e48\\u0e32\\u0e07\\u0e46 \\u0e02\\u0e2d\\u0e07\\u0e23\\u0e48\\u0e32\\u0e07\\u0e01\\u0e32\\u0e22\\u0e44\\u0e14\\u0e49\\u0e40\\u0e1e\\u0e35\\u0e22\\u0e07\\u0e1e\\u0e2d \\u0e08\\u0e36\\u0e07\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e25\\u0e21 \\u0e2b\\u0e21\\u0e14\\u0e2a\\u0e15\\u0e34\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/e2d2d3c681558fa76c590ace32d85d9c.jpg\"}', 3, '2022-04-25 12:56:06', NULL),
(28, 'ไฟล์ไม่ถูกต้อง', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '6', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 6', '{\"cms_cardiac_arrest_id\":\"6\",\"image\":\".\\/assets\\/uploads\\/cms_cardiac_arrest_slide\\/2565\\/6b1a095ec0af9e944aa31ab2edecaf57.jpg\"}', 3, '2022-04-25 12:57:38', NULL),
(29, 'ข้อมุลไม่ถูกต้อง', 'cms_ca_resuscitation', 'ca_resuscitation_id', '5', 'cms_ca_resuscitation.ca_resuscitation_id = 5', '{\"ca_resuscitation_id\":\"5\",\"ca_resuscitation_name\":\"5. \\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e17\\u0e48\\u0e32\\u0e1e\\u0e31\\u0e01\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e23\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e19\\u0e33\\u0e2a\\u0e48\\u0e07\",\"ca_resuscitation_detail\":\"4. \\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e17\\u0e48\\u0e32\\u0e1e\\u0e31\\u0e01\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e23\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e19\\u0e33\\u0e2a\\u0e48\\u0e07\",\"image\":\".\\/assets\\/uploads\\/cms_ca_resuscitation\\/2565\\/140d90e8db0ea26b13f95c1d1d1cd00f.png\"}', 3, '2022-04-25 13:00:52', NULL),
(30, 'ไฟล์ไม่ถูกต้อง', 'tb_members', 'userid', '7', 'tb_members.userid = 7', '{\"userid\":\"7\",\"username\":null,\"email\":\"popinlive@gmail.com\",\"password\":null,\"prefix\":null,\"firstname\":\"Paritad\",\"lastname\":\"Dadach\",\"birthday\":null,\"sex\":null,\"level\":\"1\",\"tel_number\":null,\"line_id\":null,\"department_id\":null,\"photo\":null,\"unsubscribe\":\"0\",\"void\":\"0\",\"referral_code\":null,\"create_datetime\":\"2022-04-10 12:47:08\",\"create_user_id\":\"3\",\"modify_datetime\":null,\"modify_user_id\":null}', 3, '2022-04-25 13:07:28', NULL),
(31, '', 'tb_uploads_filename', 'id', '18', 'tb_uploads_filename.encrypt_name = \'6cbe4ba59b66f883eb1a7acde0e8748f.pdf\' ', '{\"id\":\"18\",\"encrypt_name\":\"6cbe4ba59b66f883eb1a7acde0e8748f.pdf\",\"filename\":\"650408-\\u0e19\\u0e33\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\\u0e01\\u0e49\\u0e32\\u0e27\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e15\\u0e48\\u0e2d_\\u0e2a\\u0e1e\\u0e09_-wide_screen.pdf\"}', 3, '2022-05-01 11:07:37', NULL),
(32, 'ทดสอบ', 'cms_ca_basic_info', 'ca_basic_info', '3', 'cms_ca_basic_info.ca_basic_info = 3', '{\"ca_basic_info\":\"3\",\"subject\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text.\",\"detail\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text.\",\"images\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/5e4e528336f6b2364509617ae333982e.jpg\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/dcd0adefbbcbfc181289490adfc333a7.pdf\",\"create_date\":null}', 3, '2022-05-05 09:43:41', NULL),
(33, 'ข้อมูลซ้ำ', 'ca_symptoms', 'ca_symptoms_id', '5', 'ca_symptoms.ca_symptoms_id = 5', '{\"ca_symptoms_id\":\"5\",\"ca_symptoms_name\":\"Victim collapse\",\"ca_symptoms_detail\":\"\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19 (Sudden Cardiac Arrest) \\u0e04\\u0e37\\u0e2d \\u0e20\\u0e32\\u0e27\\u0e30\\u0e17\\u0e35\\u0e48\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e1c\\u0e34\\u0e14\\u0e1b\\u0e01\\u0e15\\u0e34 \\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e25\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e35\\u0e1a\\u0e15\\u0e31\\u0e27\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e40\\u0e15\\u0e49\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 \\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e44\\u0e21\\u0e48\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e44\\u0e1b\\u0e40\\u0e25\\u0e35\\u0e49\\u0e22\\u0e07\\u0e15\\u0e32\\u0e21\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e15\\u0e48\\u0e32\\u0e07\\u0e46 \\u0e02\\u0e2d\\u0e07\\u0e23\\u0e48\\u0e32\\u0e07\\u0e01\\u0e32\\u0e22\\u0e44\\u0e14\\u0e49\\u0e40\\u0e1e\\u0e35\\u0e22\\u0e07\\u0e1e\\u0e2d \\u0e08\\u0e36\\u0e07\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e25\\u0e21 \\u0e2b\\u0e21\\u0e14\\u0e2a\\u0e15\\u0e34\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/e3c41cc62ae99ca6f5f75e654e66d80c.png\"}', 3, '2022-05-05 10:15:45', NULL),
(34, 'ข้อมูลซ้ำ', 'ca_symptoms', 'ca_symptoms_id', '10', 'ca_symptoms.ca_symptoms_id = 10', '{\"ca_symptoms_id\":\"10\",\"ca_symptoms_name\":\"\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e21\\u0e34\\u0e19\\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e39\\u0e49\\u0e2a\\u0e36\\u0e01\\u0e15\\u0e31\\u0e27\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\",\"ca_symptoms_detail\":\"\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e21\\u0e34\\u0e19\\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e39\\u0e49\\u0e2a\\u0e36\\u0e01\\u0e15\\u0e31\\u0e27\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e17\\u0e38\\u0e01 2 \\u0e19\\u0e32\\u0e17\\u0e35 \\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e40\\u0e21\\u0e37\\u0e48\\u0e2d\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e01\\u0e14\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e04\\u0e23\\u0e1a 200 \\u0e04\\u0e23\\u0e31\\u0e49\\u0e07 \\u0e2b\\u0e32\\u0e01\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e22\\u0e31\\u0e07\\u0e04\\u0e07\\u0e44\\u0e21\\u0e48\\u0e23\\u0e39\\u0e49\\u0e2a\\u0e36\\u0e01\\u0e15\\u0e31\\u0e27\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e22\\u0e31\\u0e07\\u0e21\\u0e35\\u0e01\\u0e32\\u0e23\\u0e2b\\u0e32\\u0e22\\u0e43\\u0e08\\u0e40\\u0e2e\\u0e37\\u0e2d\\u0e01 \\u0e43\\u0e2b\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e02\\u0e31\\u0e49\\u0e19\\u0e15\\u0e2d\\u0e19\\u0e40\\u0e14\\u0e34\\u0e21\\u0e0b\\u0e49\\u0e33\\u0e08\\u0e19\\u0e01\\u0e27\\u0e48\\u0e32\\u0e04\\u0e27\\u0e32\\u0e21\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e08\\u0e30\\u0e21\\u0e32\\u0e16\\u0e36\\u0e07\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/4e08127ebe773597a47e10a13c00f0d9.jpg\"}', 3, '2022-05-05 10:32:09', NULL),
(35, '', 'tb_uploads_filename', 'id', '40', 'tb_uploads_filename.encrypt_name = \'eb14fd105b942a62cb74eeceb63511a3.png\' ', '{\"id\":\"40\",\"encrypt_name\":\"eb14fd105b942a62cb74eeceb63511a3.png\",\"filename\":\"Screen_Shot_2022-04-24_at_11_31_52.png\"}', 3, '2022-05-05 10:33:25', NULL),
(36, 'ซ้ำ', 'ca_symptoms', 'ca_symptoms_id', '13', 'ca_symptoms.ca_symptoms_id = 13', '{\"ca_symptoms_id\":\"13\",\"ca_symptoms_name\":\"\\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e0a\\u0e47\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2d\\u0e31\\u0e15\\u0e42\\u0e19\\u0e21\\u0e31\\u0e15\\u0e34 (AED)\",\"ca_symptoms_detail\":\"\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e1b\\u0e34\\u0e14\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e41\\u0e25\\u0e30\\u0e16\\u0e2d\\u0e14\\u0e40\\u0e2a\\u0e37\\u0e49\\u0e2d\\u0e1c\\u0e49\\u0e32\\u0e1c\\u0e39\\u0e49\\u0e2b\\u0e21\\u0e14\\u0e2a\\u0e15\\u0e34\\u0e2d\\u0e2d\\u0e01, \\u0e15\\u0e34\\u0e14\\u0e41\\u0e1c\\u0e48\\u0e19\\u0e19\\u0e33\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e1a\\u0e23\\u0e34\\u0e40\\u0e27\\u0e13\\u0e43\\u0e15\\u0e49\\u0e01\\u0e23\\u0e30\\u0e14\\u0e39\\u0e01\\u0e44\\u0e2b\\u0e1b\\u0e25\\u0e32\\u0e23\\u0e49\\u0e32\\u0e14\\u0e49\\u0e32\\u0e19\\u0e02\\u0e27\\u0e32 \\u0e41\\u0e25\\u0e30\\u0e0a\\u0e32\\u0e22\\u0e42\\u0e04\\u0e23\\u0e07\\u0e14\\u0e49\\u0e32\\u0e19\\u0e0b\\u0e49\\u0e32\\u0e22 \\u0e2b\\u0e25\\u0e31\\u0e07\\u0e08\\u0e32\\u0e01\\u0e19\\u0e31\\u0e49\\u0e19\\u0e44\\u0e21\\u0e48\\u0e2a\\u0e31\\u0e21\\u0e1c\\u0e31\\u0e2a\\u0e15\\u0e31\\u0e27\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22, \\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e15\\u0e32\\u0e21\\u0e04\\u0e33\\u0e41\\u0e19\\u0e30\\u0e19\\u0e33\\u0e02\\u0e2d\\u0e07\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 AED, \\u0e01\\u0e14\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e15\\u0e48\\u0e2d\\u0e17\\u0e31\\u0e19\\u0e17\\u0e35\\u0e2b\\u0e25\\u0e31\\u0e07\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e47\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e14\\u0e49\\u0e27\\u0e22\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 AED \\u0e2a\\u0e48\\u0e07\\u0e15\\u0e48\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e40\\u0e21\\u0e37\\u0e48\\u0e2d\\u0e17\\u0e35\\u0e21\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e21\\u0e32\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/f7b033923ed05a32f328b42d3d733a39.jpg\"}', 3, '2022-05-05 10:42:11', NULL),
(37, '', 'tb_uploads_filename', 'id', '52', 'tb_uploads_filename.encrypt_name = \'700cf4d72f4d327a8c2abd1eec746c7c.pdf\' ', '{\"id\":\"52\",\"encrypt_name\":\"700cf4d72f4d327a8c2abd1eec746c7c.pdf\",\"filename\":\"2019-Characteristics_and_outcomes_of_out-of-hospital_cardiac_arrest_in_Japan.pdf\"}', 3, '2022-05-05 11:14:54', NULL),
(38, '', 'tb_uploads_filename', 'id', '17', 'tb_uploads_filename.encrypt_name = \'45e4f56a0e61f2cd46fcf8d30efb2c3e.jpeg\' ', '{\"id\":\"17\",\"encrypt_name\":\"45e4f56a0e61f2cd46fcf8d30efb2c3e.jpeg\",\"filename\":\"news_list_002.jpeg\"}', 3, '2022-05-05 11:20:10', NULL),
(39, '', 'tb_uploads_filename', 'id', '15', 'tb_uploads_filename.encrypt_name = \'530ce62864a2df9f3a6c66521d00ae11.jpeg\' ', '{\"id\":\"15\",\"encrypt_name\":\"530ce62864a2df9f3a6c66521d00ae11.jpeg\",\"filename\":\"news_list_002.jpeg\"}', 3, '2022-05-05 12:11:43', NULL),
(40, 'ซ้ำ', 'cms_posts', 'id', '4', 'cms_posts.id = 4', '{\"id\":\"4\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/fd5feccb3a74299c959e4cdfa2b49ad1.jpg\",\"title\":\"\\u0e2a\\u0e1e\\u0e09.\\u0e23\\u0e48\\u0e27\\u0e21\\u0e01\\u0e31\\u0e1a\\u0e20\\u0e32\\u0e04\\u0e35\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22 \\u0e08\\u0e31\\u0e14\\u0e17\\u0e33\\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48 4 \\u0e1b\\u0e35 \\u0e1e.\\u0e28. 2566-2570 \\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e40\\u0e15\\u0e23\\u0e35\\u0e22\\u0e21\\u0e40\\u0e1b\\u0e34\\u0e14\\u0e23\\u0e31\\u0e1a\\u0e1f\\u0e31\\u0e07\\u0e04\\u0e27\\u0e32\\u0e21\\u0e04\\u0e34\\u0e14\\u0e40\\u0e2b\\u0e47\\u0e19\\u0e08\\u0e32\\u0e01\\u0e17\\u0e38\\u0e01\\u0e20\\u0e32\\u0e04\\u0e2a\\u0e48\\u0e27\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e43\\u0e19\\u0e40\\u0e14\\u0e37\\u0e2d\\u0e19 \\u0e1e.\\u0e04. \",\"message\":\"<p>\\u0e40\\u0e23\\u0e37\\u0e2d\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e28\\u0e40\\u0e2d\\u0e01&nbsp;\\u0e19\\u0e32\\u0e22\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e2d\\u0e31\\u0e08\\u0e09\\u0e23\\u0e34\\u0e22\\u0e30 \\u0e41\\u0e1e\\u0e07\\u0e21\\u0e32 \\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34&nbsp;\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e16\\u0e36\\u0e07\\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e17\\u0e33\\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48&nbsp;4&nbsp;\\u0e27\\u0e48\\u0e32\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\\u0e40\\u0e1e\\u0e23\\u0e32\\u0e30\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e17\\u0e34\\u0e28\\u0e17\\u0e32\\u0e07\\u0e01\\u0e32\\u0e23\\u0e02\\u0e31\\u0e1a\\u0e40\\u0e04\\u0e25\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e07\\u0e32\\u0e19\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e35\\u0e48\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2a\\u0e2d\\u0e14\\u0e04\\u0e25\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e1a\\u0e2a\\u0e16\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e40\\u0e1b\\u0e25\\u0e35\\u0e48\\u0e22\\u0e19\\u0e41\\u0e1b\\u0e25\\u0e07\\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e42\\u0e25\\u0e01 \\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28 \\u0e23\\u0e27\\u0e21\\u0e17\\u0e31\\u0e49\\u0e07\\u0e2a\\u0e16\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e25\\u0e30\\u0e41\\u0e19\\u0e27\\u0e42\\u0e19\\u0e49\\u0e21\\u0e04\\u0e27\\u0e32\\u0e21\\u0e17\\u0e49\\u0e32\\u0e17\\u0e32\\u0e22\\u0e43\\u0e19\\u0e2d\\u0e19\\u0e32\\u0e04\\u0e15\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28&nbsp;\\u0e0b\\u0e36\\u0e48\\u0e07\\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48&nbsp;3.1\\u0e17\\u0e35\\u0e48\\u0e43\\u0e0a\\u0e49\\u0e2d\\u0e22\\u0e39\\u0e48\\u0e43\\u0e19\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e38\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e08\\u0e30\\u0e2a\\u0e34\\u0e49\\u0e19\\u0e2a\\u0e38\\u0e14\\u0e43\\u0e19\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48&nbsp;30&nbsp;\\u0e01\\u0e31\\u0e19\\u0e22\\u0e32\\u0e22\\u0e19&nbsp;2565&nbsp;\\u0e19\\u0e35\\u0e49&nbsp;\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34(\\u0e2a\\u0e1e\\u0e09.)&nbsp;\\u0e08\\u0e36\\u0e07\\u0e23\\u0e48\\u0e27\\u0e21\\u0e21\\u0e37\\u0e2d\\u0e01\\u0e31\\u0e1a\\u0e20\\u0e32\\u0e04\\u0e35\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e1b\\u0e23\\u0e30\\u0e01\\u0e2d\\u0e1a\\u0e14\\u0e49\\u0e27\\u0e22 \\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e1c\\u0e39\\u0e49\\u0e17\\u0e23\\u0e07\\u0e04\\u0e38\\u0e13\\u0e27\\u0e38\\u0e12\\u0e34 \\u0e2a\\u0e33\\u0e19\\u0e31\\u0e01\\u0e07\\u0e32\\u0e19\\u0e2a\\u0e20\\u0e32\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e01\\u0e32\\u0e23\\u0e40\\u0e28\\u0e23\\u0e29\\u0e10\\u0e01\\u0e34\\u0e08\\u0e41\\u0e25\\u0e30\\u0e2a\\u0e31\\u0e07\\u0e04\\u0e21\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e1c\\u0e39\\u0e49\\u0e15\\u0e23\\u0e27\\u0e08\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1c\\u0e48\\u0e19\\u0e14\\u0e34\\u0e19 \\u0e2a\\u0e33\\u0e19\\u0e31\\u0e01\\u0e07\\u0e32\\u0e19\\u0e1b\\u0e25\\u0e31\\u0e14\\u0e01\\u0e23\\u0e30\\u0e17\\u0e23\\u0e27\\u0e07\\u0e2a\\u0e32\\u0e18\\u0e32\\u0e23\\u0e13\\u0e2a\\u0e38\\u0e02 \\u0e2a\\u0e33\\u0e19\\u0e31\\u0e01\\u0e07\\u0e32\\u0e19\\u0e04\\u0e13\\u0e30\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e19\\u0e42\\u0e22\\u0e1a\\u0e32\\u0e22\\u0e40\\u0e02\\u0e15\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e1e\\u0e34\\u0e40\\u0e28\\u0e29\\u0e20\\u0e32\\u0e04\\u0e15\\u0e30\\u0e27\\u0e31\\u0e19\\u0e2d\\u0e2d\\u0e01&nbsp;\\u0e01\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c&nbsp;&nbsp;\\u0e01\\u0e23\\u0e21\\u0e04\\u0e27\\u0e1a\\u0e04\\u0e38\\u0e21\\u0e42\\u0e23\\u0e04 \\u0e01\\u0e23\\u0e21\\u0e2d\\u0e19\\u0e32\\u0e21\\u0e31\\u0e22 \\u0e01\\u0e23\\u0e21\\u0e2a\\u0e38\\u0e02\\u0e20\\u0e32\\u0e1e\\u0e08\\u0e34\\u0e15 \\u0e01\\u0e23\\u0e21\\u0e2a\\u0e19\\u0e31\\u0e1a\\u0e2a\\u0e19\\u0e38\\u0e19\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e38\\u0e02\\u0e20\\u0e32\\u0e1e&nbsp;\\u0e01\\u0e23\\u0e21\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e01\\u0e04\\u0e23\\u0e2d\\u0e07\\u0e17\\u0e49\\u0e2d\\u0e07\\u0e16\\u0e34\\u0e48\\u0e19&nbsp;\\u0e01\\u0e23\\u0e21\\u0e1b\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e19\\u0e41\\u0e25\\u0e30\\u0e1a\\u0e23\\u0e23\\u0e40\\u0e17\\u0e32\\u0e2a\\u0e32\\u0e18\\u0e32\\u0e23\\u0e13\\u0e20\\u0e31\\u0e22 \\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e30\\u0e1e\\u0e32\\u0e19\\u0e1b\\u0e25\\u0e32 \\u0e2a\\u0e21\\u0e32\\u0e04\\u0e21\\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e08\\u0e31\\u0e07\\u0e2b\\u0e27\\u0e31\\u0e14\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22 \\u0e2a\\u0e21\\u0e32\\u0e04\\u0e21\\u0e2a\\u0e31\\u0e19\\u0e19\\u0e34\\u0e1a\\u0e32\\u0e15\\u0e40\\u0e17\\u0e28\\u0e1a\\u0e32\\u0e25\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22&nbsp;\\u0e2a\\u0e21\\u0e32\\u0e04\\u0e21\\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e15\\u0e33\\u0e1a\\u0e25\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22 \\u0e21\\u0e39\\u0e25\\u0e19\\u0e34\\u0e18\\u0e34\\u0e23\\u0e48\\u0e27\\u0e21\\u0e01\\u0e15\\u0e31\\u0e0d\\u0e0d\\u0e39 \\u0e21\\u0e39\\u0e25\\u0e19\\u0e34\\u0e18\\u0e34\\u0e1b\\u0e48\\u0e2d\\u0e40\\u0e15\\u0e47\\u0e01\\u0e15\\u0e36\\u0e4a\\u0e07\\u0e2a\\u0e21\\u0e32\\u0e04\\u0e21\\u0e1e\\u0e38\\u0e17\\u0e18\\u0e21\\u0e32\\u0e21\\u0e01\\u0e2a\\u0e07\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e01\\u0e38\\u0e28\\u0e25\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22&nbsp;\\u0e23\\u0e27\\u0e21\\u0e17\\u0e31\\u0e49\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e41\\u0e25\\u0e30\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e07\\u0e32\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e23\\u0e27\\u0e21&nbsp;53&nbsp;\\u0e04\\u0e19 \\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e38\\u0e21\\u0e08\\u0e31\\u0e14\\u0e17\\u0e33\\u0e23\\u0e48\\u0e32\\u0e07\\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48&nbsp;4&nbsp;\\u0e1e.\\u0e28.&nbsp;2566-2570&nbsp;\\u0e40\\u0e21\\u0e37\\u0e48\\u0e2d\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48&nbsp;19&nbsp;\\u0e40\\u0e21\\u0e29\\u0e32\\u0e22\\u0e19&nbsp;2565&nbsp;\\u0e40\\u0e27\\u0e25\\u0e32&nbsp;9.30 &ndash; 12.00&nbsp;\\u0e19. \\u0e13 \\u0e2b\\u0e49\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e38\\u0e21&nbsp;A 601&nbsp;\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e41\\u0e25\\u0e30\\u0e17\\u0e32\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e2d\\u0e2d\\u0e19\\u0e44\\u0e25\\u0e19\\u0e4c&nbsp;\\u0e42\\u0e14\\u0e22\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e32 (\\u0e23\\u0e48\\u0e32\\u0e07) \\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48&nbsp;4&nbsp;\\u0e1e.\\u0e28.&nbsp;2566-2570&nbsp;\\u0e44\\u0e14\\u0e49\\u0e01\\u0e33\\u0e2b\\u0e19\\u0e14&nbsp;\\u0e27\\u0e34\\u0e2a\\u0e31\\u0e22\\u0e17\\u0e31\\u0e28\\u0e19\\u0e4c&nbsp;\\u0e27\\u0e48\\u0e32 &ldquo;\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e31\\u0e07\\u0e04\\u0e21\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e1a\\u0e23\\u0e39\\u0e49 \\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e21\\u0e35\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e23\\u0e48\\u0e27\\u0e21\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e40\\u0e02\\u0e49\\u0e21\\u0e41\\u0e02\\u0e47\\u0e07 \\u0e42\\u0e14\\u0e22\\u0e21\\u0e35\\u0e21\\u0e32\\u0e15\\u0e23\\u0e10\\u0e32\\u0e19\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e43\\u0e19\\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e2a\\u0e32\\u0e01\\u0e25\\u0e17\\u0e35\\u0e48\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e40\\u0e0a\\u0e37\\u0e48\\u0e2d\\u0e21\\u0e31\\u0e48\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e44\\u0e14\\u0e49\\u0e23\\u0e31\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e21\\u0e35\\u0e04\\u0e38\\u0e13\\u0e20\\u0e32\\u0e1e \\u0e17\\u0e31\\u0e48\\u0e27\\u0e16\\u0e36\\u0e07 \\u0e41\\u0e25\\u0e30\\u0e40\\u0e17\\u0e48\\u0e32\\u0e40\\u0e17\\u0e35\\u0e22\\u0e21&rdquo;&nbsp;\\u0e42\\u0e14\\u0e22\\u0e02\\u0e31\\u0e1a\\u0e40\\u0e04\\u0e25\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e14\\u0e49\\u0e27\\u0e22\\u0e1e\\u0e31\\u0e19\\u0e18\\u0e01\\u0e34\\u0e08 \\u0e17\\u0e35\\u0e48\\u0e21\\u0e38\\u0e48\\u0e07\\u0e40\\u0e19\\u0e49\\u0e19\\u0e01\\u0e32\\u0e23\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e2a\\u0e23\\u0e49\\u0e32\\u0e07\\u0e04\\u0e48\\u0e32\\u0e19\\u0e34\\u0e22\\u0e21\\u0e41\\u0e25\\u0e30\\u0e27\\u0e31\\u0e12\\u0e19\\u0e18\\u0e23\\u0e23\\u0e21\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34&nbsp;\\u0e27\\u0e48\\u0e32\\u0e14\\u0e49\\u0e27\\u0e22\\u0e04\\u0e27\\u0e32\\u0e21\\u0e1b\\u0e25\\u0e2d\\u0e14\\u0e20\\u0e31\\u0e22&nbsp;\\u0e41\\u0e25\\u0e30&nbsp;\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e1a\\u0e38\\u0e04\\u0e25\\u0e32\\u0e01\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34\\u0e23\\u0e2d\\u0e07\\u0e23\\u0e31\\u0e1a\\u0e04\\u0e27\\u0e32\\u0e21\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e40\\u0e1b\\u0e25\\u0e35\\u0e48\\u0e22\\u0e19\\u0e41\\u0e1b\\u0e25\\u0e07&nbsp;<\\/p>\\r\\n\\r\\n<p>\\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e1e\\u0e09.\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e15\\u0e48\\u0e2d\\u0e2d\\u0e35\\u0e01\\u0e27\\u0e48\\u0e32 \\u0e23\\u0e48\\u0e32\\u0e07\\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48&nbsp;4&nbsp;\\u0e1e.\\u0e28.&nbsp;2566-2570&nbsp;&nbsp;\\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e19\\u0e35\\u0e49&nbsp;\\u0e44\\u0e14\\u0e49\\u0e21\\u0e35\\u0e01\\u0e32\\u0e23\\u0e19\\u0e33\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e15\\u0e48\\u0e2d\\u0e04\\u0e13\\u0e30\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e2d\\u0e33\\u0e19\\u0e27\\u0e22\\u0e01\\u0e32\\u0e23\\u0e2f&nbsp;\\u0e41\\u0e25\\u0e30\\u0e19\\u0e33\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e04\\u0e13\\u0e30\\u0e2d\\u0e19\\u0e38\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e22\\u0e38\\u0e17\\u0e18\\u0e28\\u0e32\\u0e2a\\u0e15\\u0e23\\u0e4c\\u0e23\\u0e31\\u0e1a\\u0e17\\u0e23\\u0e32\\u0e1a\\u0e04\\u0e27\\u0e32\\u0e21\\u0e01\\u0e49\\u0e32\\u0e27\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e44\\u0e1b\\u0e41\\u0e25\\u0e49\\u0e27 &nbsp;\\u0e42\\u0e14\\u0e22\\u0e02\\u0e31\\u0e49\\u0e19\\u0e15\\u0e2d\\u0e19\\u0e15\\u0e48\\u0e2d\\u0e44\\u0e1b&nbsp;\\u0e2a\\u0e1e\\u0e09.\\u0e08\\u0e30\\u0e40\\u0e1b\\u0e34\\u0e14\\u0e23\\u0e31\\u0e1a\\u0e1f\\u0e31\\u0e07\\u0e04\\u0e27\\u0e32\\u0e21\\u0e04\\u0e34\\u0e14\\u0e40\\u0e2b\\u0e47\\u0e19\\u0e15\\u0e48\\u0e2d (\\u0e23\\u0e48\\u0e32\\u0e07) \\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48&nbsp;4&nbsp;\\u0e1e.\\u0e28. 2566-2570 \\u0e43\\u0e19\\u0e40\\u0e14\\u0e37\\u0e2d\\u0e19\\u0e1e\\u0e24\\u0e29\\u0e20\\u0e32\\u0e04\\u0e21&nbsp;2565&nbsp;\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e33\\u0e02\\u0e49\\u0e2d\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e41\\u0e19\\u0e30\\u0e21\\u0e32\\u0e1b\\u0e23\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e38\\u0e07&nbsp;\\u0e41\\u0e25\\u0e30\\u0e19\\u0e33\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e15\\u0e48\\u0e2d\\u0e04\\u0e13\\u0e30\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e1e\\u0e34\\u0e08\\u0e32\\u0e23\\u0e13\\u0e32&nbsp;\\u0e08\\u0e36\\u0e07\\u0e02\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e48\\u0e27\\u0e21\\u0e21\\u0e37\\u0e2d\\u0e08\\u0e32\\u0e01\\u0e20\\u0e32\\u0e04\\u0e35\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22 \\u0e41\\u0e25\\u0e30\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e19\\u0e43\\u0e08 \\u0e23\\u0e48\\u0e27\\u0e21\\u0e43\\u0e2b\\u0e49\\u0e04\\u0e27\\u0e32\\u0e21\\u0e04\\u0e34\\u0e14\\u0e40\\u0e2b\\u0e47\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e02\\u0e49\\u0e2d\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e41\\u0e19\\u0e30 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e17\\u0e32\\u0e07 \\u0e2a\\u0e1e\\u0e09. \\u0e08\\u0e30\\u0e44\\u0e14\\u0e49\\u0e23\\u0e27\\u0e1a\\u0e23\\u0e27\\u0e21\\u0e41\\u0e25\\u0e30\\u0e19\\u0e33\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e04\\u0e13\\u0e30\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e1e\\u0e34\\u0e08\\u0e32\\u0e23\\u0e13\\u0e32 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e01\\u0e23\\u0e2d\\u0e1a \\u0e17\\u0e34\\u0e28\\u0e17\\u0e32\\u0e07 \\u0e02\\u0e31\\u0e1a\\u0e40\\u0e04\\u0e25\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e07\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e43\\u0e2b\\u0e49\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e40\\u0e0a\\u0e37\\u0e48\\u0e2d\\u0e21\\u0e31\\u0e48\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e44\\u0e14\\u0e49\\u0e23\\u0e31\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e21\\u0e35\\u0e04\\u0e38\\u0e13\\u0e20\\u0e32\\u0e1e \\u0e17\\u0e31\\u0e48\\u0e27\\u0e16\\u0e36\\u0e07 \\u0e41\\u0e25\\u0e30\\u0e40\\u0e17\\u0e48\\u0e32\\u0e40\\u0e17\\u0e35\\u0e22\\u0e21 \\u0e15\\u0e48\\u0e2d\\u0e44\\u0e1b&nbsp;&nbsp;<a href=\\\"https:\\/\\/www.niems.go.th\\/1\\/Ebook\\/Detail\\/15341?group=121\\\"><u>\\u0e1a\\u0e17\\u0e2a\\u0e23\\u0e38\\u0e1b\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e38\\u0e21\\u0e01\\u0e23\\u0e30\\u0e1a\\u0e27\\u0e19\\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e17\\u0e33 (\\u0e23\\u0e48\\u0e32\\u0e07) \\u0e41\\u0e1c\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48 \\u0e54 \\u0e1e.\\u0e28. \\u0e52\\u0e55\\u0e56\\u0e56-\\u0e52\\u0e55\\u0e57\\u0e50\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e21\\u0e35\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e23\\u0e48\\u0e27\\u0e21\\u0e02\\u0e2d\\u0e07\\u0e20\\u0e32\\u0e04\\u0e35\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e43\\u0e19\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19<\\/u><\\/a><br \\/>\\r\\n<br \\/>\\r\\n\\u0e17\\u0e35\\u0e48\\u0e21\\u0e32:&nbsp;https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8401?group=2<\\/p>\",\"category_id\":\"2\",\"userid\":\"3\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-18 13:16:31\"}', 3, '2022-05-05 12:48:40', NULL),
(41, 'ซ้ำ', 'cms_posts', 'id', '6', 'cms_posts.id = 6', '{\"id\":\"6\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/530ce62864a2df9f3a6c66521d00ae11.jpeg\",\"title\":\"iOS 15.4 \\u0e2d\\u0e31\\u0e1b\\u0e40\\u0e14\\u0e15\\u0e44\\u0e14\\u0e49\\u0e41\\u0e25\\u0e49\\u0e27 \\u0e2a\\u0e41\\u0e01\\u0e19\\u0e2b\\u0e19\\u0e49\\u0e32 (Face ID) \\u0e02\\u0e13\\u0e30\\u0e43\\u0e2a\\u0e48\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e2d\\u0e19\\u0e32\\u0e21\\u0e31\\u0e22\\u0e44\\u0e14\\u0e49\",\"message\":\"\\u0e14\\u0e49\\u0e27\\u0e22 iOS 15.4 \\u0e15\\u0e2d\\u0e19\\u0e19\\u0e35\\u0e49\\u0e21\\u0e35\\u0e15\\u0e31\\u0e27\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e25\\u0e14\\u0e25\\u0e47\\u0e2d\\u0e01 iPhone \\u0e02\\u0e2d\\u0e07\\u0e04\\u0e38\\u0e13\\u0e02\\u0e13\\u0e30\\u0e2a\\u0e27\\u0e21\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e42\\u0e14\\u0e22\\u0e44\\u0e21\\u0e48\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e43\\u0e0a\\u0e49\\u0e2e\\u0e32\\u0e23\\u0e4c\\u0e14\\u0e41\\u0e27\\u0e23\\u0e4c\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e40\\u0e15\\u0e34\\u0e21 \\u0e40\\u0e0a\\u0e48\\u0e19 Apple Watch&nbsp; \\u0e14\\u0e49\\u0e32\\u0e19 Apple \\u0e40\\u0e15\\u0e37\\u0e2d\\u0e19\\u0e27\\u0e48\\u0e32 ID \\u0e41\\u0e1a\\u0e1a\\u0e40\\u0e15\\u0e47\\u0e21\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e15\\u0e31\\u0e27\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e17\\u0e35\\u0e48\\u0e1b\\u0e25\\u0e2d\\u0e14\\u0e20\\u0e31\\u0e22\\u0e01\\u0e27\\u0e48\\u0e32 \\u0e41\\u0e15\\u0e48\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e25\\u0e14\\u0e25\\u0e47\\u0e2d\\u0e01\\u0e1c\\u0e48\\u0e32\\u0e19\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e2d\\u0e19\\u0e34\\u0e40\\u0e21\\u0e31\\u0e22 Face ID \\u0e01\\u0e47\\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e43\\u0e0a\\u0e49\\u0e07\\u0e32\\u0e19\\u0e44\\u0e14\\u0e49\\u0e41\\u0e25\\u0e49\\u0e27\",\"category_id\":\"1\",\"userid\":\"3\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-18 13:16:31\"}', 3, '2022-05-05 12:48:46', NULL),
(42, 'ซ้ำ', 'cms_posts', 'id', '7', 'cms_posts.id = 7', '{\"id\":\"7\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/530ce62864a2df9f3a6c66521d00ae11.jpeg\",\"title\":\"iOS 15.4 \\u0e2d\\u0e31\\u0e1b\\u0e40\\u0e14\\u0e15\\u0e44\\u0e14\\u0e49\\u0e41\\u0e25\\u0e49\\u0e27 \\u0e2a\\u0e41\\u0e01\\u0e19\\u0e2b\\u0e19\\u0e49\\u0e32 (Face ID) \\u0e02\\u0e13\\u0e30\\u0e43\\u0e2a\\u0e48\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e2d\\u0e19\\u0e32\\u0e21\\u0e31\\u0e22\\u0e44\\u0e14\\u0e49\",\"message\":\"\\u0e14\\u0e49\\u0e27\\u0e22 iOS 15.4 \\u0e15\\u0e2d\\u0e19\\u0e19\\u0e35\\u0e49\\u0e21\\u0e35\\u0e15\\u0e31\\u0e27\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e25\\u0e14\\u0e25\\u0e47\\u0e2d\\u0e01 iPhone \\u0e02\\u0e2d\\u0e07\\u0e04\\u0e38\\u0e13\\u0e02\\u0e13\\u0e30\\u0e2a\\u0e27\\u0e21\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e42\\u0e14\\u0e22\\u0e44\\u0e21\\u0e48\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e43\\u0e0a\\u0e49\\u0e2e\\u0e32\\u0e23\\u0e4c\\u0e14\\u0e41\\u0e27\\u0e23\\u0e4c\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e40\\u0e15\\u0e34\\u0e21 \\u0e40\\u0e0a\\u0e48\\u0e19 Apple Watch&nbsp; \\u0e14\\u0e49\\u0e32\\u0e19 Apple \\u0e40\\u0e15\\u0e37\\u0e2d\\u0e19\\u0e27\\u0e48\\u0e32 ID \\u0e41\\u0e1a\\u0e1a\\u0e40\\u0e15\\u0e47\\u0e21\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e15\\u0e31\\u0e27\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e17\\u0e35\\u0e48\\u0e1b\\u0e25\\u0e2d\\u0e14\\u0e20\\u0e31\\u0e22\\u0e01\\u0e27\\u0e48\\u0e32 \\u0e41\\u0e15\\u0e48\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e25\\u0e14\\u0e25\\u0e47\\u0e2d\\u0e01\\u0e1c\\u0e48\\u0e32\\u0e19\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e01\\u0e32\\u0e01\\u0e2d\\u0e19\\u0e34\\u0e40\\u0e21\\u0e31\\u0e22 Face ID \\u0e01\\u0e47\\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e43\\u0e0a\\u0e49\\u0e07\\u0e32\\u0e19\\u0e44\\u0e14\\u0e49\\u0e41\\u0e25\\u0e49\\u0e27\",\"category_id\":\"1\",\"userid\":\"3\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-10 14:02:46\"}', 3, '2022-05-05 12:48:54', NULL),
(43, '', 'tb_uploads_filename', 'id', '35', 'tb_uploads_filename.encrypt_name = \'53505d733463e59dca55546050e95620.png\' ', '{\"id\":\"35\",\"encrypt_name\":\"53505d733463e59dca55546050e95620.png\",\"filename\":\"Screen_Shot_2022-04-24_at_11_31_32.png\"}', 3, '2022-05-05 13:17:32', NULL),
(44, '', 'tb_uploads_filename', 'id', '38', 'tb_uploads_filename.encrypt_name = \'f7cb3d42d6dbf8adee5c1998c688f55b.png\' ', '{\"id\":\"38\",\"encrypt_name\":\"f7cb3d42d6dbf8adee5c1998c688f55b.png\",\"filename\":\"Screen_Shot_2022-04-24_at_11_31_42.png\"}', 3, '2022-05-05 13:28:05', NULL),
(45, '', 'tb_uploads_filename', 'id', '39', 'tb_uploads_filename.encrypt_name = \'af7c83135b35663c28f63e7e3c35cd10.png\' ', '{\"id\":\"39\",\"encrypt_name\":\"af7c83135b35663c28f63e7e3c35cd10.png\",\"filename\":\"Screen_Shot_2022-04-24_at_11_31_47.png\"}', 3, '2022-05-05 13:36:21', NULL),
(46, '', 'tb_uploads_filename', 'id', '56', 'tb_uploads_filename.encrypt_name = \'881f8d7efe0c6df0aeb7dda44df65f39.jpg\' ', '{\"id\":\"56\",\"encrypt_name\":\"881f8d7efe0c6df0aeb7dda44df65f39.jpg\",\"filename\":\"4__\\u0e01\\u0e32\\u0e23\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e40\\u0e1a\\u0e37\\u0e49\\u0e2d\\u0e07\\u0e15\\u0e49\\u0e19.jpg\"}', 3, '2022-05-05 13:39:18', NULL),
(47, '', 'tb_uploads_filename', 'id', '55', 'tb_uploads_filename.encrypt_name = \'40485cc808b89fdf38d4c279f6652827.png\' ', '{\"id\":\"55\",\"encrypt_name\":\"40485cc808b89fdf38d4c279f6652827.png\",\"filename\":\"\\u0e01\\u0e32\\u0e23\\u0e15\\u0e23\\u0e27\\u0e08\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e21\\u0e34\\u0e19.png\"}', 3, '2022-05-05 13:43:53', NULL),
(48, '', 'tb_uploads_filename', 'id', '57', 'tb_uploads_filename.encrypt_name = \'b3458730948c6026311017e248b1744b.jpg\' ', '{\"id\":\"57\",\"encrypt_name\":\"b3458730948c6026311017e248b1744b.jpg\",\"filename\":\"5__\\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e01\\u0e29\\u0e32\\u0e42\\u0e14\\u0e22\\u0e17\\u0e35\\u0e21.jpg\"}', 3, '2022-05-05 13:47:35', NULL),
(49, 'ซ้ำ', 'ca_symptoms', 'ca_symptoms_id', '16', 'ca_symptoms.ca_symptoms_id = 16', '{\"ca_symptoms_id\":\"16\",\"ca_symptoms_name\":\"9. \\u0e01\\u0e14\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e15\\u0e48\\u0e2d\\u0e2b\\u0e25\\u0e31\\u0e07\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e4a\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e41\\u0e25\\u0e49\\u0e27\\u0e17\\u0e31\\u0e19\\u0e17\\u0e35\",\"ca_symptoms_detail\":\"\\u0e01\\u0e14\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e15\\u0e48\\u0e2d\\u0e2b\\u0e25\\u0e31\\u0e07\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e4a\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e41\\u0e25\\u0e49\\u0e27\\u0e17\\u0e31\\u0e19\\u0e17\\u0e35\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/572a9482604369ca629eb8d6350a1145.jpg\"}', 3, '2022-05-05 13:55:23', NULL),
(50, '', 'tb_uploads_filename', 'id', '44', 'tb_uploads_filename.encrypt_name = \'ef9622a53ffeb64eb79785068a82442a.png\' ', '{\"id\":\"44\",\"encrypt_name\":\"ef9622a53ffeb64eb79785068a82442a.png\",\"filename\":\"abt-pg-corona-image.png\"}', 3, '2022-05-05 17:07:47', NULL);
INSERT INTO `tb_ci_log_delete` (`log_id`, `log_del_remark`, `log_table_name`, `log_table_pk_name`, `log_table_pk_value`, `log_del_condition`, `log_record_data`, `create_user_id`, `create_datetime`, `log_login_id`) VALUES
(51, 'ซ้ำ', 'cms_ca_basic_info', 'ca_basic_info', '5', 'cms_ca_basic_info.ca_basic_info = 5', '{\"ca_basic_info\":\"5\",\"subject\":\"\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e04\\u0e37\\u0e19\\u0e0a\\u0e35\\u0e1e\\u0e02\\u0e31\\u0e49\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19\",\"detail\":\"\\u0e2a\\u0e16\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e34\\u0e48\\u0e07\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e40\\u0e01\\u0e34\\u0e14\\u0e02\\u0e36\\u0e49\\u0e19\\u0e44\\u0e14\\u0e49\\u0e42\\u0e14\\u0e22\\u0e17\\u0e35\\u0e48\\u0e40\\u0e23\\u0e32\\u0e44\\u0e21\\u0e48\\u0e44\\u0e14\\u0e49\\u0e04\\u0e32\\u0e14\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e44\\u0e27\\u0e49\\u0e25\\u0e48\\u0e27\\u0e07\\u0e2b\\u0e19\\u0e49\\u0e32 \\u0e0b\\u0e36\\u0e48\\u0e07\\u0e2d\\u0e32\\u0e08\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2d\\u0e31\\u0e19\\u0e15\\u0e23\\u0e32\\u0e22\\u0e16\\u0e36\\u0e07\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15 \\u0e01\\u0e32\\u0e23\\u0e43\\u0e2b\\u0e49\\u0e04\\u0e27\\u0e32\\u0e21\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e15\\u0e48\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e1a\\u0e01\\u0e31\\u0e1a\\u0e2a\\u0e16\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e08\\u0e36\\u0e07\\u0e16\\u0e37\\u0e2d\\u0e27\\u0e48\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e34\\u0e48\\u0e07\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e48\\u0e04\\u0e38\\u0e13\\u0e23\\u0e31\\u0e01\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e21\\u0e19\\u0e38\\u0e29\\u0e22\\u0e4c\\u0e14\\u0e49\\u0e27\\u0e22\\u0e01\\u0e31\\u0e19 \\u0e17\\u0e48\\u0e32\\u0e19\\u0e04\\u0e27\\u0e23\\u0e40\\u0e23\\u0e35\\u0e22\\u0e19\\u0e23\\u0e39\\u0e49\\u0e40\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e41\\u0e08\\u0e49\\u0e07\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e02\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d \\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e04\\u0e37\\u0e19\\u0e0a\\u0e35\\u0e1e\\u0e02\\u0e31\\u0e49\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19 \\u0e23\\u0e27\\u0e21\\u0e16\\u0e36\\u0e07\\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 \\u0e40\\u0e2d \\u0e2d\\u0e35 \\u0e14\\u0e35 (AED) \\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07\\u0e17\\u0e35\\u0e48\\u0e17\\u0e35\\u0e21\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e22\\u0e31\\u0e07\\u0e40\\u0e14\\u0e34\\u0e19\\u0e17\\u0e32\\u0e07\\u0e44\\u0e1b\\u0e44\\u0e21\\u0e48\\u0e16\\u0e36\\u0e07\",\"images\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/6bb9472c9884eee8349b2549a48a281e.jpg\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/93b485a9d95d7cc6fe491b0dfd82dcba.pdf\",\"create_date\":null}', 3, '2022-05-06 15:11:48', NULL),
(52, '', 'tb_uploads_filename', 'id', '43', 'tb_uploads_filename.encrypt_name = \'90c398bfba43a85cb18661e3afc11169.jpeg\' ', '{\"id\":\"43\",\"encrypt_name\":\"90c398bfba43a85cb18661e3afc11169.jpeg\",\"filename\":\"HIHL-\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19-Cardiac-Arrest.jpeg\"}', 3, '2022-05-06 15:21:16', NULL),
(53, '', 'tb_uploads_filename', 'id', '7', 'tb_uploads_filename.encrypt_name = \'e4e67dfd0296e4d8fc47f4a2e87fe270.pdf\' ', '{\"id\":\"7\",\"encrypt_name\":\"e4e67dfd0296e4d8fc47f4a2e87fe270.pdf\",\"filename\":\"PND91_P910005930633.pdf\"}', 3, '2022-05-06 15:35:11', NULL),
(54, 'ข้อมุลไม่ถูกต้อง', 'cms_slide', 'cms_slide_id', '5', 'cms_slide.cms_slide_id = 5', '{\"cms_slide_id\":\"5\",\"title\":\"\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e17\\u0e35\\u0e48\\u0e14\\u0e35\\u0e01\\u0e27\\u0e48\\u0e32\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e1b\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e19\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\",\"image\":\".\\/assets\\/uploads\\/slides\\/2565\\/4e2b7d8764452ba425e58e7b22d6fcd8.jpg\",\"sequences\":\"2\"}', 3, '2022-05-10 20:19:29', NULL),
(55, 'ไฟล์ไม่ถูกต้อง', 'cms_slide', 'cms_slide_id', '6', 'cms_slide.cms_slide_id = 6', '{\"cms_slide_id\":\"6\",\"title\":\"test\",\"image\":\".\\/assets\\/uploads\\/slides\\/2565\\/afedcf3b7146861a524402b9c86f6c6c.png\",\"sequences\":\"1\"}', 3, '2022-05-10 20:20:27', NULL),
(56, 'ข้อมุลไม่ถูกต้อง', 'cms_faq', 'cms_faq_id', '8', 'cms_faq.cms_faq_id = 8', '{\"cms_faq_id\":\"8\",\"cms_faq_title\":\"faq1\",\"faq_detail\":\"zxzxzxzxzx\"}', 3, '2022-05-10 20:24:54', NULL),
(57, 'ข้อมุลไม่ถูกต้อง', 'cms_contact_us', 'cms_contact_us_id', '4', 'cms_contact_us.cms_contact_us_id = 4', '{\"cms_contact_us_id\":\"4\",\"contact_name\":\"Paritad Dadach\",\"email\":\"popinlive@gmail.com\",\"phone\":\"0946379768\",\"subject\":\"zxzxzx\",\"detail\":\"zxzxzx\"}', 3, '2022-05-10 20:28:08', NULL),
(58, 'ข้อมุลไม่ถูกต้อง', 'cms_contact_us', 'cms_contact_us_id', '3', 'cms_contact_us.cms_contact_us_id = 3', '{\"cms_contact_us_id\":\"3\",\"contact_name\":\"\\u0e2a\\u0e38\\u0e23\\u0e40\\u0e14\\u0e0a \\u0e1a\\u0e38\\u0e0d\\u0e25\\u0e37\\u0e2d\",\"email\":\"tsuradej@gmail.com\",\"phone\":\"0890549524\",\"subject\":\"\\u0e37\\u0e17\\u0e14\\u0e2a\\u0e2d\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e48\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\",\"detail\":\"0\"}', 3, '2022-05-10 20:28:14', NULL),
(59, 'ลบการทดลองทดสอบ', 'cms_researchs', 'cms_researchs_id', '4', 'cms_researchs.cms_researchs_id = 4', '{\"cms_researchs_id\":\"4\",\"image\":\".\\/assets\\/uploads\\/research\\/2565\\/47b684d11f21698565bc774a041e9512.png\",\"subject\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum dummy text.\",\"detail\":\"asas\",\"research_name\":\"\\u0e1c\\u0e39\\u0e49\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22,\\u0e1c\\u0e39\\u0e49\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22,\\u0e1c\\u0e39\\u0e49\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\",\"create_date\":\"2022-05-10\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/research\\/2565\\/6d1a10edad6a8c2753b473c5ec6e1bc5.docx\"}', 3, '2022-05-23 14:26:24', NULL),
(60, 'ทดลองบันทึก', 'service_information', 'service_information_id', '35', 'service_information.service_information_id = 35', '{\"service_information_id\":\"35\",\"master_ohca_id\":\"\\u0e27\\u0e0a\\u0e34\\u0e23\\u0e30\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\",\"service_unit_name\":\"\\u0e27\\u0e0a\\u0e34\\u0e23\\u0e30\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\",\"operating_command\":\"\\u0e15\\u0e32\\u0e01\\u0e2a\\u0e34\\u0e19\",\"zone_area\":\"13\",\"police_station\":\"\\u0e1a\\u0e38\\u0e04\\u0e04\\u0e42\\u0e25\",\"operating_number\":\"23\",\"regis_date\":\"2022-10-20\",\"performance\":\"1\",\"locale\":\"\\u0e15\\u0e32\\u0e01\\u0e2a\\u0e34\\u0e19\",\"event\":\"0000\",\"create_by_userid\":\"4\",\"create_date\":\"2022-10-20\"}', 4, '2022-10-20 00:54:29', NULL),
(61, '', 'tb_uploads_filename', 'id', '91', 'tb_uploads_filename.encrypt_name = \'ff7f8f61183ebceb06c40b79c96b2b48.png\' ', '{\"id\":\"91\",\"encrypt_name\":\"ff7f8f61183ebceb06c40b79c96b2b48.png\",\"filename\":\"human-being-heart-Premium-vector-PNG.png\"}', 3, '2023-05-07 04:42:33', NULL),
(62, '', 'tb_uploads_filename', 'id', '10', 'tb_uploads_filename.encrypt_name = \'42b3787c4e264d4735c82daf24b861c8.jpg\' ', '{\"id\":\"10\",\"encrypt_name\":\"42b3787c4e264d4735c82daf24b861c8.jpg\",\"filename\":\"s1.jpg\"}', 3, '2023-05-07 04:47:19', NULL),
(63, '', 'tb_uploads_filename', 'id', '11', 'tb_uploads_filename.encrypt_name = \'f1a90b036eb33ef66c160a7489e38bc8.jpg\' ', '{\"id\":\"11\",\"encrypt_name\":\"f1a90b036eb33ef66c160a7489e38bc8.jpg\",\"filename\":\"slide2.jpg\"}', 3, '2023-05-07 04:47:56', NULL),
(64, '', 'tb_uploads_filename', 'id', '28', 'tb_uploads_filename.encrypt_name = \'8804f2af1a29418bc45e4b0fedd333d7.jpg\' ', '{\"id\":\"28\",\"encrypt_name\":\"8804f2af1a29418bc45e4b0fedd333d7.jpg\",\"filename\":\"s_cardiac1.jpg\"}', 3, '2023-05-07 04:52:57', NULL),
(65, '', 'tb_uploads_filename', 'id', '29', 'tb_uploads_filename.encrypt_name = \'e3e4881597a49c63ac42279ada00dca0.jpg\' ', '{\"id\":\"29\",\"encrypt_name\":\"e3e4881597a49c63ac42279ada00dca0.jpg\",\"filename\":\"s_cardiac2.jpg\"}', 3, '2023-05-07 04:53:28', NULL),
(66, 'ไม่ใช้', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '5', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 5', '{\"cms_cardiac_arrest_id\":\"5\",\"image\":\".\\/assets\\/uploads\\/cms_cardiac_arrest_slide\\/2565\\/fc1114240febc99d482d63e942fd7927.jpg\"}', 3, '2023-05-07 04:53:43', NULL),
(67, 'ไม่ใช้', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '7', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 7', '{\"cms_cardiac_arrest_id\":\"7\",\"image\":\".\\/assets\\/uploads\\/cms_cardiac_arrest_slide\\/2566\\/397dabdcb0bc61ee9e27780076a3c76f.jpg\"}', 3, '2023-05-07 04:55:23', NULL),
(68, '', 'tb_uploads_filename', 'id', '112', 'tb_uploads_filename.encrypt_name = \'b0e1dd75040d16cd14c5473c43ff1593.jpg\' ', '{\"id\":\"112\",\"encrypt_name\":\"b0e1dd75040d16cd14c5473c43ff1593.jpg\",\"filename\":\"18-SlideShow.jpg\"}', 3, '2023-05-07 04:56:45', NULL),
(69, '', 'tb_uploads_filename', 'id', '72', 'tb_uploads_filename.encrypt_name = \'f2d502088517a057089af06a91ccbc99.jpg\' ', '{\"id\":\"72\",\"encrypt_name\":\"f2d502088517a057089af06a91ccbc99.jpg\",\"filename\":\"1.jpg\"}', 3, '2023-05-07 05:07:33', NULL),
(70, 'ไม่ใช้', 'ca_symptoms', 'ca_symptoms_id', '18', 'ca_symptoms.ca_symptoms_id = 18', '{\"ca_symptoms_id\":\"18\",\"ca_symptoms_name\":\"10. \\u0e2a\\u0e48\\u0e07\\u0e15\\u0e48\\u0e2d\\u0e43\\u0e2b\\u0e49\\u0e17\\u0e35\\u0e21\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\",\"ca_symptoms_detail\":\"1) \\u0e17\\u0e35\\u0e21\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e08\\u0e30\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e0b\\u0e31\\u0e01\\u0e1b\\u0e23\\u0e30\\u0e27\\u0e31\\u0e15\\u0e34\\u0e08\\u0e32\\u0e01\\u0e1c\\u0e39\\u0e49\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d 2) \\u0e2d\\u0e30\\u0e44\\u0e23\\u0e17\\u0e35\\u0e48\\u0e1c\\u0e39\\u0e49\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e44\\u0e14\\u0e49\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22 3) \\u0e17\\u0e35\\u0e21\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e08\\u0e30\\u0e19\\u0e33\\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e44\\u0e1b\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e17\\u0e35\\u0e48\\u0e43\\u0e01\\u0e25\\u0e49\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e38\\u0e14\\u0e41\\u0e25\\u0e30\\u0e40\\u0e2b\\u0e21\\u0e32\\u0e30\\u0e2a\\u0e21\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/76c970ed1b56b8d131355f15e075995d.jpg\"}', 3, '2023-05-07 05:07:48', NULL),
(71, 'ไม่ใช้', 'ca_symptoms', 'ca_symptoms_id', '17', 'ca_symptoms.ca_symptoms_id = 17', '{\"ca_symptoms_id\":\"17\",\"ca_symptoms_name\":\"9. \\u0e01\\u0e14\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e15\\u0e48\\u0e2d\\u0e2b\\u0e25\\u0e31\\u0e07\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e4a\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\",\"ca_symptoms_detail\":\"\\u0e01\\u0e14\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e15\\u0e48\\u0e2d\\u0e2b\\u0e25\\u0e31\\u0e07\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e4a\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e41\\u0e25\\u0e49\\u0e27\\u0e17\\u0e31\\u0e19\\u0e17\\u0e35\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/af3730bcb755d4d4810de8b86f56396f.jpg\"}', 3, '2023-05-07 05:07:53', NULL),
(72, 'ไม่ใช้', 'ca_symptoms', 'ca_symptoms_id', '15', 'ca_symptoms.ca_symptoms_id = 15', '{\"ca_symptoms_id\":\"15\",\"ca_symptoms_name\":\"8. \\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e15\\u0e32\\u0e21\\u0e04\\u0e33\\u0e41\\u0e19\\u0e30\\u0e19\\u0e33\\u0e02\\u0e2d\\u0e07\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 \\u0e40\\u0e2d \\u0e2d\\u0e35 \\u0e14\\u0e35 (AED)\",\"ca_symptoms_detail\":\"1) \\u0e2b\\u0e32\\u0e01\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e40\\u0e2d \\u0e2d\\u0e35 \\u0e14\\u0e35 (AED) \\u0e41\\u0e1b\\u0e25\\u0e1c\\u0e25\\u0e27\\u0e48\\u0e32\\u0e44\\u0e21\\u0e48\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e0a\\u0e4a\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 \\u0e43\\u0e2b\\u0e49\\u0e01\\u0e14\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e15\\u0e48\\u0e2d\\u0e44\\u0e1b 2) \\u0e2b\\u0e32\\u0e01\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e2a\\u0e31\\u0e48\\u0e07\\u0e43\\u0e2b\\u0e49\\u0e0a\\u0e4a\\u0e2d\\u0e01\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 \\u0e1c\\u0e39\\u0e49\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e1e\\u0e39\\u0e14 \\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e15\\u0e30\\u0e42\\u0e01\\u0e19\\u0e27\\u0e48\\u0e32 \\u201c\\u0e16\\u0e2d\\u0e22\\u0e2b\\u0e48\\u0e32\\u0e07\\/\\u0e2b\\u0e49\\u0e32\\u0e21\\u0e2a\\u0e31\\u0e21\\u0e1c\\u0e31\\u0e2a\\u0e15\\u0e31\\u0e27\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u201d 3) \\u0e01\\u0e14\\u0e1b\\u0e38\\u0e48\\u0e21 \\u0e0a\\u0e4a\\u0e2d\\u0e01\\u0e15\\u0e32\\u0e21\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e2a\\u0e31\\u0e48\\u0e07\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/d1c4cce197eff749da6913d13c260e53.jpg\"}', 3, '2023-05-07 05:07:58', NULL),
(73, 'ไม่ใช้', 'ca_symptoms', 'ca_symptoms_id', '14', 'ca_symptoms.ca_symptoms_id = 14', '{\"ca_symptoms_id\":\"14\",\"ca_symptoms_name\":\"7. \\u0e15\\u0e34\\u0e14\\u0e41\\u0e1c\\u0e48\\u0e19\\u0e19\\u0e33\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\",\"ca_symptoms_detail\":\"\\u0e15\\u0e34\\u0e14\\u0e41\\u0e1c\\u0e48\\u0e19\\u0e19\\u0e33\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e1a\\u0e23\\u0e34\\u0e40\\u0e27\\u0e13\\u0e43\\u0e15\\u0e49\\u0e01\\u0e23\\u0e30\\u0e14\\u0e39\\u0e01\\u0e44\\u0e2b\\u0e1b\\u0e25\\u0e32\\u0e23\\u0e49\\u0e32\\u0e14\\u0e49\\u0e32\\u0e19\\u0e02\\u0e27\\u0e32 \\u0e41\\u0e25\\u0e30\\u0e0a\\u0e32\\u0e22\\u0e42\\u0e04\\u0e23\\u0e07\\u0e14\\u0e49\\u0e32\\u0e19\\u0e0b\\u0e49\\u0e32\\u0e22 (\\u0e15\\u0e32\\u0e21\\u0e20\\u0e32\\u0e1e) \\u0e2b\\u0e25\\u0e31\\u0e07\\u0e08\\u0e32\\u0e01\\u0e19\\u0e31\\u0e49\\u0e19\\u0e44\\u0e21\\u0e48\\u0e2a\\u0e31\\u0e21\\u0e1c\\u0e31\\u0e2a\\u0e15\\u0e31\\u0e27\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/d226a76bdd51a097020f0c27099a4f22.jpg\"}', 3, '2023-05-07 05:08:03', NULL),
(74, 'ไม่ใช้', 'ca_symptoms', 'ca_symptoms_id', '12', 'ca_symptoms.ca_symptoms_id = 12', '{\"ca_symptoms_id\":\"12\",\"ca_symptoms_name\":\"6. \\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 \\u0e40\\u0e2d \\u0e2d\\u0e35 \\u0e14\\u0e35 (AED) \\u0e21\\u0e32\\u0e16\\u0e36\\u0e07\",\"ca_symptoms_detail\":\"1) \\u0e40\\u0e1b\\u0e34\\u0e14\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 2) \\u0e16\\u0e2d\\u0e14\\u0e40\\u0e2a\\u0e37\\u0e49\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2d\\u0e2d\\u0e01 3) \\u0e16\\u0e49\\u0e32\\u0e15\\u0e31\\u0e27\\u0e40\\u0e1b\\u0e35\\u0e22\\u0e01\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e0a\\u0e47\\u0e14\\u0e19\\u0e49\\u0e33\\u0e2d\\u0e2d\\u0e01\\u0e01\\u0e48\\u0e2d\\u0e19\\u0e41\\u0e25\\u0e49\\u0e27\\u0e15\\u0e34\\u0e14\\u0e41\\u0e1c\\u0e48\\u0e19\\u0e19\\u0e33\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\",\"image\":\".\\/assets\\/uploads\\/ca_symptoms\\/2565\\/6a46b31dee6a4cbac28a1ffbc4ef1be2.jpg\"}', 3, '2023-05-07 05:08:08', NULL),
(75, '', 'tb_uploads_filename', 'id', '74', 'tb_uploads_filename.encrypt_name = \'64ce1e8f167d6c0448ed153932286f0f.jpg\' ', '{\"id\":\"74\",\"encrypt_name\":\"64ce1e8f167d6c0448ed153932286f0f.jpg\",\"filename\":\"2.jpg\"}', 3, '2023-05-07 05:08:52', NULL),
(76, '', 'tb_uploads_filename', 'id', '75', 'tb_uploads_filename.encrypt_name = \'b6eff7387a31f8bca90bf665d947ead3.jpg\' ', '{\"id\":\"75\",\"encrypt_name\":\"b6eff7387a31f8bca90bf665d947ead3.jpg\",\"filename\":\"3.jpg\"}', 3, '2023-05-07 05:09:30', NULL),
(77, '', 'tb_uploads_filename', 'id', '76', 'tb_uploads_filename.encrypt_name = \'112669e2dd9019a54b43aa46e1974ae5.jpg\' ', '{\"id\":\"76\",\"encrypt_name\":\"112669e2dd9019a54b43aa46e1974ae5.jpg\",\"filename\":\"4.jpg\"}', 3, '2023-05-07 05:10:09', NULL),
(78, '', 'tb_uploads_filename', 'id', '78', 'tb_uploads_filename.encrypt_name = \'8001b788cfe037cb1aa161f22699fd2e.jpg\' ', '{\"id\":\"78\",\"encrypt_name\":\"8001b788cfe037cb1aa161f22699fd2e.jpg\",\"filename\":\"5.jpg\"}', 3, '2023-05-07 05:10:44', NULL),
(79, '', 'tb_uploads_filename', 'id', '31', 'tb_uploads_filename.encrypt_name = \'59140688b767070309e7c84305cecf39.jpg\' ', '{\"id\":\"31\",\"encrypt_name\":\"59140688b767070309e7c84305cecf39.jpg\",\"filename\":\"home-3-spread-001.jpg\"}', 3, '2023-05-07 05:12:43', NULL),
(80, '', 'tb_uploads_filename', 'id', '32', 'tb_uploads_filename.encrypt_name = \'d87f393432e508e51fae230b35262422.jpg\' ', '{\"id\":\"32\",\"encrypt_name\":\"d87f393432e508e51fae230b35262422.jpg\",\"filename\":\"home-3-spread-002.jpg\"}', 3, '2023-05-07 05:13:06', NULL),
(81, '', 'tb_uploads_filename', 'id', '33', 'tb_uploads_filename.encrypt_name = \'4b9fe866db16e1ad3a36ca13b43b44e1.jpg\' ', '{\"id\":\"33\",\"encrypt_name\":\"4b9fe866db16e1ad3a36ca13b43b44e1.jpg\",\"filename\":\"home-3-spread-003.jpg\"}', 3, '2023-05-07 05:13:32', NULL),
(82, '', 'tb_uploads_filename', 'id', '34', 'tb_uploads_filename.encrypt_name = \'fb7d6db423bdeb65087e663b2bd2dd95.jpg\' ', '{\"id\":\"34\",\"encrypt_name\":\"fb7d6db423bdeb65087e663b2bd2dd95.jpg\",\"filename\":\"home-3-spread-004.jpg\"}', 3, '2023-05-07 05:13:54', NULL),
(83, 'ไม่ใช้', 'cms_posts', 'id', '2', 'cms_posts.id = 2', '{\"id\":\"2\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/fa4e61c98f501ded597af7621e4178c5.jpg\",\"title\":\"\\u0e2a\\u0e1e\\u0e09. \\u0e2b\\u0e48\\u0e27\\u0e07\\u0e04\\u0e19\\u0e27\\u0e31\\u0e22\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e42\\u0e23\\u0e04\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e2a\\u0e39\\u0e07\\u0e02\\u0e36\\u0e49\\u0e19 \\u0e40\\u0e2b\\u0e15\\u0e38\\u0e40\\u0e04\\u0e23\\u0e35\\u0e22\\u0e14 \\u0e44\\u0e21\\u0e48\\u0e21\\u0e35\\u0e40\\u0e27\\u0e25\\u0e32\\u0e2d\\u0e2d\\u0e01\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e01\\u0e32\\u0e22\",\"message\":\"\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48 1 \\u0e1e\\u0e24\\u0e29\\u0e20\\u0e32\\u0e04\\u0e21 \\u0e02\\u0e2d\\u0e07\\u0e17\\u0e38\\u0e01\\u0e1b\\u0e35 \\u0e16\\u0e39\\u0e01\\u0e01\\u0e33\\u0e2b\\u0e19\\u0e14\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e27\\u0e31\\u0e19\\u0e41\\u0e23\\u0e07\\u0e07\\u0e32\\u0e19 \\u0e0b\\u0e36\\u0e48\\u0e07\\u0e27\\u0e31\\u0e22\\u0e41\\u0e23\\u0e07\\u0e07\\u0e32\\u0e19\\u0e16\\u0e37\\u0e2d\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28 \\u0e41\\u0e15\\u0e48\\u0e04\\u0e19\\u0e01\\u0e25\\u0e38\\u0e48\\u0e21\\u0e19\\u0e35\\u0e49\\u0e01\\u0e47\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2d\\u0e35\\u0e01\\u0e01\\u0e25\\u0e38\\u0e48\\u0e21\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e2a\\u0e35\\u0e48\\u0e22\\u0e07\\u0e21\\u0e32\\u0e01\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e38\\u0e14\\u0e17\\u0e35\\u0e48\\u0e08\\u0e30\\u0e21\\u0e35\\u0e42\\u0e23\\u0e04\\u0e41\\u0e25\\u0e30\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e04\\u0e38\\u0e01\\u0e04\\u0e32\\u0e21<br \\/>\\r\\n<br \\/>\\r\\n\\u0e19\\u0e1e.\\u0e2d\\u0e19\\u0e38\\u0e0a\\u0e32 \\u0e40\\u0e28\\u0e23\\u0e29\\u0e10\\u0e40\\u0e2a\\u0e16\\u0e35\\u0e22\\u0e23 \\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34(\\u0e2a\\u0e1e\\u0e09.) \\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e27\\u0e48\\u0e32 \\u0e08\\u0e32\\u0e01\\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e40\\u0e01\\u0e47\\u0e1a\\u0e2a\\u0e16\\u0e34\\u0e15\\u0e34\\u0e42\\u0e23\\u0e04\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e34\\u0e14\\u0e02\\u0e36\\u0e49\\u0e19\\u0e01\\u0e31\\u0e1a\\u0e04\\u0e19\\u0e44\\u0e17\\u0e22\\u0e42\\u0e14\\u0e22\\u0e40\\u0e09\\u0e1e\\u0e32\\u0e30\\u0e43\\u0e19\\u0e0a\\u0e48\\u0e27\\u0e07\\u0e27\\u0e31\\u0e22\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19 \\u0e2d\\u0e32\\u0e22\\u0e38 18-60 \\u0e1b\\u0e35 &nbsp;\\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48 1 \\u0e1e.\\u0e04.2557-30 \\u0e40\\u0e21.\\u0e22. 2558 \\u0e1e\\u0e1a\\u0e27\\u0e48\\u0e32 \\u0e21\\u0e35\\u0e01\\u0e32\\u0e23\\u0e41\\u0e08\\u0e49\\u0e07\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e1c\\u0e48\\u0e32\\u0e19\\u0e2a\\u0e32\\u0e22\\u0e14\\u0e48\\u0e27\\u0e19 1669 &nbsp;\\u0e43\\u0e19\\u0e40\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e2d\\u0e38\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e21\\u0e32\\u0e01\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e38\\u0e14 \\u0e23\\u0e2d\\u0e07\\u0e25\\u0e07\\u0e21\\u0e32\\u0e04\\u0e37\\u0e2d\\u0e21\\u0e35\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e41\\u0e19\\u0e48\\u0e19\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e2d\\u0e01\\u0e17\\u0e35\\u0e48\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2b\\u0e19\\u0e36\\u0e48\\u0e07\\u0e43\\u0e19\\u0e2a\\u0e32\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e02\\u0e2d\\u0e07\\u0e42\\u0e23\\u0e04\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08&nbsp;<br \\/>\\r\\n<br \\/>\\r\\n\\u0e2a\\u0e32\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e17\\u0e35\\u0e48\\u0e04\\u0e19\\u0e27\\u0e31\\u0e22\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e42\\u0e23\\u0e04\\u0e2b\\u0e31<wbr \\/>\\u0e27\\u0e43\\u0e08\\u0e21\\u0e32\\u0e01\\u0e02\\u0e36\\u0e49\\u0e19 \\u0e40\\u0e19\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e08\\u0e32\\u0e01\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e04\\u0e23\\u0e35\\u0e22\\u0e14 \\u0e44\\u0e21\\u0e48\\u0e21\\u0e35\\u0e40\\u0e27\\u0e25\\u0e32\\u0e1e\\u0e31\\u0e01\\u0e1c\\u0e48\\u0e2d\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e27\\u0e25\\u0e32\\u0e2d\\u0e22\\u0e39\\u0e48\\u0e01\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e04\\u0e48<wbr \\/>\\u0e2d\\u0e19\\u0e02\\u0e49\\u0e32\\u0e07\\u0e21\\u0e32\\u0e01 \\u0e41\\u0e25\\u0e30\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e04\\u0e23\\u0e35\\u0e22\\u0e14\\u0e22\\u0e31\\u0e07\\u0e01\\u0e23\\u0e30\\u0e15\\u0e38\\u0e49\\u0e19\\u0e43\\u0e2b\\u0e49\\u0e2b\\u0e31<wbr \\/>\\u0e27\\u0e43\\u0e08\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e2b\\u0e19\\u0e31\\u0e01\\u0e02\\u0e36\\u0e49\\u0e19 \\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e1a\\u0e35\\u0e1a\\u0e15\\u0e31\\u0e27\\u0e41\\u0e25\\u0e30\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e23\\u0e47\\u0e27\\u0e02\\u0e36\\u0e49\\u0e19 \\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e2d\\u0e32\\u0e08\\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e25\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e32\\u0e23\\u0e40\\u0e15\\u0e49\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e31<wbr \\/>\\u0e27\\u0e43\\u0e08\\u0e1c\\u0e34\\u0e14\\u0e1b\\u0e01\\u0e15\\u0e34&nbsp;&nbsp;\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2b\\u0e19\\u0e37\\u0e14\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e02\\u0e36\\u0e49<wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/>\\u0e19\\u0e40\\u0e19\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e08\\u0e32\\u0e01\\u0e21\\u0e35\\u0e44\\u0e02\\u0e21\\u0e31\\u0e19\\u0e43\\u0e19\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e2a\\u0e39<wbr \\/>\\u0e07\\u0e41\\u0e25\\u0e30\\u0e40\\u0e01\\u0e34\\u0e14\\u0e2d\\u0e38\\u0e14\\u0e15\\u0e31\\u0e19\\u0e2b\\u0e25\\u0e2d\\u0e14\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e44\\u0e14\\u0e49\\u0e07\\u0e48\\u0e32\\u0e22&nbsp;&nbsp;\\u0e2d\\u0e35\\u0e01\\u0e17\\u0e31\\u0e49\\u0e07\\u0e2d\\u0e32\\u0e08\\u0e30\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31<wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/><wbr \\/>\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e01\\u0e30\\u0e17\\u0e31\\u0e19\\u0e2b\\u0e31\\u0e19 \\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e17\\u0e35\\u0e48\\u0e40\\u0e23\\u0e35\\u0e22\\u0e01\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e27\\u0e32\\u0e22\\u0e44\\u0e14\\u0e49\\u0e14\\u0e49\\u0e27\\u0e22<br \\/>\\r\\n<br \\/>\\r\\n\\u0e17\\u0e35\\u0e48\\u0e21\\u0e32: <a href=\\\"https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/4181?group=2\\\">https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/4181?group=2<\\/a><br \\/>\\r\\n&nbsp;\",\"category_id\":\"1\",\"userid\":\"4\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-18 13:16:31\"}', 3, '2023-05-07 07:41:33', NULL),
(84, 'ไม่ใช้', 'cms_posts', 'id', '3', 'cms_posts.id = 3', '{\"id\":\"3\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/a6e2476fcec9a4a4102c93351d3a53c6.jpg\",\"title\":\"\\u0e2a\\u0e1e\\u0e09.\\u0e08\\u0e31\\u0e1a\\u0e21\\u0e37\\u0e2d 8 \\u0e1e\\u0e31\\u0e19\\u0e18\\u0e21\\u0e34\\u0e15\\u0e23 \\u0e1b\\u0e0f\\u0e34\\u0e23\\u0e39\\u0e1b\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e40\\u0e17\\u0e04\\u0e42\\u0e19\\u0e42\\u0e25\\u0e22\\u0e35\\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e21\\u0e37\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e43\\u0e19\\u0e23\\u0e1b\\u0e39 \\u0e41\\u0e1a\\u0e1a\\u0e14\\u0e34\\u0e08\\u0e34\\u0e17\\u0e31\\u0e25\",\"message\":\"9 \\u0e21\\u0e35\\u0e19\\u0e32\\u0e04\\u0e21 2565 \\u0e2a\\u0e1e\\u0e09.\\u0e08\\u0e31\\u0e1a\\u0e21\\u0e37\\u0e2d 8 \\u0e1e\\u0e31\\u0e19\\u0e18\\u0e21\\u0e34\\u0e15\\u0e23 \\u0e1b\\u0e0f\\u0e34\\u0e23\\u0e39\\u0e1b\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e40\\u0e17\\u0e04\\u0e42\\u0e19\\u0e42\\u0e25\\u0e22\\u0e35\\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e21\\u0e37\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e43\\u0e19\\u0e23\\u0e1b\\u0e39 \\u0e41\\u0e1a\\u0e1a\\u0e14\\u0e34\\u0e08\\u0e34\\u0e17\\u0e31\\u0e25 (EMS Digital Transformation) \\u0e02\\u0e31\\u0e1a\\u0e40\\u0e04\\u0e25\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e20\\u0e32\\u0e23\\u0e01\\u0e34\\u0e08\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e14\\u0e49\\u0e27\\u0e22\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 \\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e40\\u0e15\\u0e47\\u0e21\\u0e15\\u0e31\\u0e27 (EMS Data-Driven) \\u0e19\\u0e4d\\u0e32\\u0e44\\u0e1b\\u0e2a\\u0e39\\u0e48\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e35\\u0e48 \\u0e40\\u0e17\\u0e48\\u0e32\\u0e40\\u0e17\\u0e35\\u0e22\\u0e21 \\u0e17\\u0e31\\u0e48\\u0e27\\u0e16\\u0e36\\u0e07 \\u0e41\\u0e25\\u0e30\\u0e21\\u0e35\\u0e21\\u0e32\\u0e15\\u0e23\\u0e10\\u0e32\\u0e19 \\u0e43\\u0e2b\\u0e49\\u0e01\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e41\\u0e25\\u0e30\\u0e17\\u0e38\\u0e01\\u0e20\\u0e32\\u0e04\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e35\\u0e48\\u0e22\\u0e27\\u0e02\\u0e49\\u0e2d\\r\\n<p>\\u0e19\\u0e32\\u0e27\\u0e32\\u0e40\\u0e2d\\u0e01\\u0e19\\u0e32\\u0e22\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e1e\\u0e34\\u0e2a\\u0e34\\u0e17\\u0e18\\u0e34\\u0e4c \\u0e40\\u0e08\\u0e23\\u0e34\\u0e0d\\u0e22\\u0e34\\u0e48\\u0e07\\u0e23\\u0e2d\\u0e07\\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e44\\u0e14\\u0e49\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e27\\u0e48\\u0e32 \\u0e17\\u0e48\\u0e32\\u0e19\\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19 \\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e40\\u0e23\\u0e37\\u0e2d\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e28\\u0e40\\u0e2d\\u0e01\\u0e19\\u0e32\\u0e22\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e2d\\u0e31\\u0e08\\u0e09\\u0e23\\u0e34\\u0e22\\u0e30 \\u0e41\\u0e1e\\u0e07\\u0e21\\u0e32 \\u0e44\\u0e14\\u0e49\\u0e43\\u0e2b\\u0e49\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2a\\u0e4d\\u0e32\\u0e04\\u0e31\\u0e0d\\u0e02\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e0f\\u0e34\\u0e23\\u0e39\\u0e1b\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e40\\u0e17\\u0e04\\u0e42\\u0e19\\u0e42\\u0e25\\u0e22\\u0e35 \\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e02\\u0e31\\u0e1a\\u0e40\\u0e04\\u0e25\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e20\\u0e32\\u0e23\\u0e01\\u0e34\\u0e08\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e14\\u0e49\\u0e27\\u0e22\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e4d\\u0e32\\u0e44\\u0e1b\\u0e2a\\u0e39\\u0e48\\u0e01\\u0e32\\u0e23\\u0e22\\u0e01\\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23 \\u0e43\\u0e2b\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e43\\u0e19\\u0e23\\u0e39\\u0e1b\\u0e41\\u0e1a\\u0e1a\\u0e14\\u0e34\\u0e08\\u0e34\\u0e17\\u0e31\\u0e25\\u0e17\\u0e31\\u0e49\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a \\u0e08\\u0e36\\u0e07\\u0e44\\u0e14\\u0e49\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e41\\u0e25\\u0e30\\u0e1c\\u0e25\\u0e31\\u0e01\\u0e14\\u0e31\\u0e19\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e42\\u0e04\\u0e23\\u0e07\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e0f\\u0e34\\u0e23\\u0e39\\u0e1b\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e40\\u0e17\\u0e04\\u0e42\\u0e19\\u0e42\\u0e25\\u0e22\\u0e35 \\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28 \\u0e41\\u0e25\\u0e30\\u0e08\\u0e31\\u0e14\\u0e17\\u0e4d\\u0e32\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e21\\u0e37\\u0e2d\\u0e2a\\u0e4d\\u0e32\\u0e2b\\u0e23\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e01\\u0e32\\u0e23\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 \\u0e2b\\u0e23\\u0e37\\u0e2d \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e41\\u0e1e\\u0e25\\u0e15\\u0e1f\\u0e2d\\u0e23\\u0e4c\\u0e21\\u0e01\\u0e25\\u0e32\\u0e07\\u0e2a\\u0e4d\\u0e32\\u0e2b\\u0e23\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e39\\u0e23\\u0e13\\u0e32\\u0e01\\u0e32\\u0e23 \\u0e41\\u0e25\\u0e01\\u0e40\\u0e1b\\u0e25\\u0e35\\u0e48\\u0e22\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e17\\u0e31\\u0e49\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e43\\u0e2b\\u0e49\\u0e15\\u0e2d\\u0e1a\\u0e2a\\u0e19\\u0e2d\\u0e07\\u0e15\\u0e48\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23 \\u0e43\\u0e2b\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e31\\u0e49\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e44\\u0e14\\u0e49\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e21\\u0e35\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e34\\u0e17\\u0e18\\u0e34\\u0e20\\u0e32\\u0e1e \\u0e42\\u0e14\\u0e22\\u0e43\\u0e0a\\u0e49\\u0e0a\\u0e37\\u0e48\\u0e2d\\u0e42\\u0e04\\u0e23\\u0e07\\u0e01\\u0e32\\u0e23\\u0e27\\u0e48\\u0e32 National EMS Data Exchange Platform \\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e1b\\u0e23\\u0e30\\u0e01\\u0e2d\\u0e1a\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e4d\\u0e32\\u0e04\\u0e31\\u0e0d\\u0e02\\u0e2d\\u0e07\\u0e41\\u0e1e\\u0e25\\u0e15\\u0e1f\\u0e2d\\u0e23\\u0e4c\\u0e21\\u0e01\\u0e25\\u0e32\\u0e07\\u0e14\\u0e31\\u0e07\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27 \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e19\\u0e42\\u0e22\\u0e1a\\u0e32\\u0e22\\u0e18\\u0e23\\u0e23\\u0e21\\u0e32\\u0e20\\u0e34\\u0e1a\\u0e32\\u0e25\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 (Data Governance) \\u0e21\\u0e32\\u0e15\\u0e23\\u0e10\\u0e32\\u0e19\\u0e0a\\u0e38\\u0e14\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 (Data Set and Standard) \\u0e21\\u0e32\\u0e15\\u0e23\\u0e10\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e40\\u0e02\\u0e49\\u0e32\\u0e16\\u0e36\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 (Data Access Control) \\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e01\\u0e32\\u0e23 \\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e40\\u0e0a\\u0e34\\u0e07\\u0e04\\u0e38\\u0e13\\u0e20\\u0e32\\u0e1e (Data Quality Control) \\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e01\\u0e29\\u0e32\\u0e04\\u0e27\\u0e32\\u0e21\\u0e1b\\u0e25\\u0e2d\\u0e14\\u0e20\\u0e31\\u0e22\\u0e02\\u0e2d\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 (Data Security Control) \\u0e42\\u0e14\\u0e22\\u0e21\\u0e35 \\u0e40\\u0e1b\\u0e49\\u0e32\\u0e2b\\u0e21\\u0e32\\u0e22\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e28\\u0e39\\u0e19\\u0e22\\u0e4c\\u0e01\\u0e25\\u0e32\\u0e07\\u0e01\\u0e32\\u0e23\\u0e41\\u0e25\\u0e01\\u0e40\\u0e1b\\u0e25\\u0e35\\u0e48\\u0e22\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e14\\u0e32\\u0e49 \\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e31\\u0e49\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e41\\u0e25\\u0e30\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e21\\u0e32\\u0e15\\u0e23\\u0e10\\u0e32\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28<\\/p>\\r\\n\\r\\n<p>\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e44\\u0e14\\u0e49\\u0e40\\u0e0a\\u0e34\\u0e0d\\u0e1c\\u0e39\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e2a\\u0e39\\u0e07\\u0e08\\u0e32\\u0e01\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19\\u0e20\\u0e32\\u0e04\\u0e23\\u0e31\\u0e10\\u0e41\\u0e25\\u0e30\\u0e40\\u0e2d\\u0e01\\u0e0a\\u0e19\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e0a\\u0e35\\u0e48\\u0e22\\u0e27\\u0e0a\\u0e32\\u0e0d\\u0e17\\u0e31\\u0e49\\u0e07\\u0e2a\\u0e34\\u0e49\\u0e19 8 \\u0e41\\u0e2b\\u0e48\\u0e07 \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e2a\\u0e4d\\u0e32\\u0e19\\u0e31\\u0e01\\u0e07\\u0e32\\u0e19\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e23\\u0e31\\u0e10\\u0e1a\\u0e32\\u0e25\\u0e14\\u0e34\\u0e08\\u0e34\\u0e17\\u0e31\\u0e25 (\\u0e2a\\u0e1e\\u0e23)\\u0e2b\\u0e23\\u0e37\\u0e2d DGA \\u0e28\\u0e39\\u0e19\\u0e22\\u0e4c\\u0e40\\u0e17\\u0e04\\u0e42\\u0e19\\u0e42\\u0e25\\u0e22\\u0e35\\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28 \\u0e2a\\u0e4d\\u0e32\\u0e19\\u0e31\\u0e01\\u0e1b\\u0e25\\u0e31\\u0e14\\u0e01\\u0e23\\u0e30\\u0e17\\u0e23\\u0e27\\u0e07\\u0e2a\\u0e32\\u0e18\\u0e32\\u0e23\\u0e13\\u0e2a\\u0e38\\u0e02 \\u0e2a\\u0e4d\\u0e32\\u0e19\\u0e31\\u0e01\\u0e07\\u0e32\\u0e19\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e27\\u0e34\\u0e17\\u0e22\\u0e32\\u0e28\\u0e32\\u0e2a\\u0e15\\u0e23\\u0e4c\\u0e41\\u0e25\\u0e30\\u0e40\\u0e17\\u0e04\\u0e42\\u0e19\\u0e42\\u0e25\\u0e22\\u0e35\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 (\\u0e2a\\u0e27\\u0e17\\u0e0a.) \\u0e1a\\u0e23\\u0e34\\u0e29\\u0e31\\u0e17 Coraline \\u0e1a\\u0e23\\u0e34\\u0e29\\u0e31\\u0e17\\u0e42\\u0e17\\u0e23\\u0e04\\u0e21\\u0e19\\u0e32\\u0e04\\u0e21\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e08\\u0e4d\\u0e32\\u0e01\\u0e31\\u0e14 (\\u0e21\\u0e2b\\u0e32\\u0e0a\\u0e19) ( NT)\\u0e1a\\u0e23\\u0e34\\u0e29\\u0e31\\u0e17Microsoft\\u0e21\\u0e2b\\u0e32\\u0e27\\u0e34\\u0e17\\u0e22\\u0e32\\u0e25\\u0e31\\u0e22\\u0e40\\u0e01\\u0e29\\u0e15\\u0e23\\u0e28\\u0e32\\u0e2a\\u0e15\\u0e23\\u0e4c\\u0e41\\u0e25\\u0e30\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e01\\u0e32\\u0e23\\u0e27\\u0e34\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c\\u0e41\\u0e25\\u0e30\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e02\\u0e19\\u0e32\\u0e14\\u0e43\\u0e2b\\u0e0d\\u0e48\\u0e20\\u0e32\\u0e04\\u0e23\\u0e31\\u0e10 \\u0e23\\u0e48\\u0e27\\u0e21 \\u0e41\\u0e16\\u0e25\\u0e07\\u0e02\\u0e48\\u0e32\\u0e27 \\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e48\\u0e27\\u0e21\\u0e21\\u0e37\\u0e2d \\u0e1a\\u0e17\\u0e1a\\u0e32\\u0e17\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e17\\u0e35\\u0e48 \\u0e41\\u0e25\\u0e30\\u0e20\\u0e32\\u0e23\\u0e01\\u0e34\\u0e08\\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e35\\u0e48\\u0e22\\u0e27\\u0e02\\u0e49\\u0e2d\\u0e07 \\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e31\\u0e1a\\u0e2a\\u0e19\\u0e38\\u0e19\\u0e41\\u0e25\\u0e30\\u0e02\\u0e31\\u0e1a\\u0e40\\u0e04\\u0e25\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e42\\u0e04\\u0e23\\u0e07\\u0e01\\u0e32\\u0e23\\u0e2f \\u0e14\\u0e31\\u0e07\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27 \\u0e43\\u0e19\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48 9 \\u0e21\\u0e35\\u0e19\\u0e32\\u0e04\\u0e21 2565 \\u0e40\\u0e27\\u0e25\\u0e32 13.00 -15.00 \\u0e19. \\u0e13 \\u0e2b\\u0e49\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e38\\u0e21 B 601 \\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34<\\/p>\\r\\n\\r\\n<p>\\u0e23\\u0e2d\\u0e07\\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e43\\u0e19\\u0e15\\u0e2d\\u0e19\\u0e17\\u0e49\\u0e32\\u0e22\\u0e27\\u0e48\\u0e32 \\u0e19\\u0e2d\\u0e01\\u0e08\\u0e32\\u0e01\\u0e2d\\u0e4d\\u0e32\\u0e19\\u0e32\\u0e08\\u0e2b\\u0e19\\u0e49\\u0e32\\u0e17\\u0e35\\u0e48\\u0e02\\u0e2d\\u0e07\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c \\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e17\\u0e35\\u0e48\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e44\\u0e1b\\u0e15\\u0e32\\u0e21\\u0e1e\\u0e23\\u0e30\\u0e23\\u0e32\\u0e0a\\u0e1a\\u0e31\\u0e0d\\u0e0d\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 2551 \\u0e15\\u0e32\\u0e21\\u0e21\\u0e32\\u0e15\\u0e23\\u0e32 15 (3) \\u0e04\\u0e37\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e43\\u0e2b\\u0e49\\u0e21\\u0e35\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23\\u0e09\\u0e38\\u0e01\\u0e40 \\u0e09\\u0e34\\u0e19 \\u0e23\\u0e27\\u0e21\\u0e16\\u0e36\\u0e07\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e01\\u0e32\\u0e23\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e2a\\u0e37\\u0e48\\u0e2d\\u0e2a\\u0e32\\u0e23\\u0e41\\u0e25\\u0e30\\u0e40\\u0e17\\u0e04\\u0e42\\u0e19\\u0e42\\u0e25\\u0e22\\u0e35\\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e1b\\u0e23\\u0e30\\u0e42\\u0e22\\u0e0a\\u0e19\\u0e4c\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c \\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e41\\u0e25\\u0e49\\u0e27\\u0e19\\u0e31\\u0e49\\u0e19\\u0e01\\u0e32\\u0e23\\u0e44\\u0e14\\u0e49\\u0e21\\u0e35\\u0e42\\u0e2d\\u0e01\\u0e32\\u0e2a\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e14\\u0e4d\\u0e32\\u0e40\\u0e19\\u0e34\\u0e19\\u0e42\\u0e04\\u0e23\\u0e07\\u0e01\\u0e32\\u0e23\\u0e14\\u0e31\\u0e07\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e19\\u0e35\\u0e49 \\u0e08\\u0e30\\u0e17\\u0e4d\\u0e32\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e1b\\u0e23\\u0e30\\u0e42\\u0e22\\u0e0a\\u0e19\\u0e4c\\u0e2a\\u0e39\\u0e07\\u0e2a\\u0e38\\u0e14\\u0e17\\u0e31\\u0e49\\u0e07\\u0e20\\u0e32\\u0e04\\u0e23\\u0e31\\u0e10\\u0e41\\u0e25\\u0e30\\u0e40\\u0e2d\\u0e01\\u0e0a\\u0e19 \\u0e43\\u0e19\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e39\\u0e23 \\u0e13\\u0e32\\u0e01\\u0e32\\u0e23 \\u0e41\\u0e25\\u0e01\\u0e40\\u0e1b\\u0e25\\u0e35\\u0e48\\u0e22\\u0e19 \\u0e40\\u0e0a\\u0e37\\u0e48\\u0e2d\\u0e21\\u0e42\\u0e22\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19\\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e35\\u0e48\\u0e22\\u0e27\\u0e02\\u0e49\\u0e2d\\u0e07\\u0e02\\u0e2d\\u0e07\\u0e17\\u0e31\\u0e49\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28 \\u0e19\\u0e2d\\u0e01\\u0e08\\u0e32\\u0e01\\u0e19\\u0e35\\u0e49\\u0e22\\u0e31\\u0e07\\u0e17\\u0e4d\\u0e32\\u0e43\\u0e2b\\u0e49\\u0e25\\u0e14\\u0e15\\u0e49\\u0e19\\u0e17\\u0e38\\u0e19 \\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28\\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e35\\u0e48\\u0e22\\u0e27\\u0e02\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e1a\\u0e40\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e14\\u0e31\\u0e07\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e19\\u0e35\\u0e49\\u0e43\\u0e19\\u0e20\\u0e32\\u0e1e\\u0e23\\u0e27\\u0e21\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28 \\u0e2a\\u0e38\\u0e14\\u0e17\\u0e49\\u0e32\\u0e22\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e08\\u0e30\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e40\\u0e02\\u0e49\\u0e32\\u0e16\\u0e36\\u0e07\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23 \\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e44\\u0e1b\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e40\\u0e17\\u0e48\\u0e32\\u0e40\\u0e17\\u0e35\\u0e22\\u0e21 \\u0e17\\u0e31\\u0e48\\u0e27\\u0e16\\u0e36\\u0e07 \\u0e21\\u0e35\\u0e21\\u0e32\\u0e15\\u0e23\\u0e10\\u0e32\\u0e19 \\u0e17\\u0e31\\u0e19\\u0e2a\\u0e21\\u0e31\\u0e22 \\u0e41\\u0e25\\u0e30\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e22\\u0e31\\u0e48\\u0e07\\u0e22\\u0e37\\u0e19<br \\/>\\r\\n<br \\/>\\r\\n\\u0e17\\u0e35\\u0e48\\u0e21\\u0e32:&nbsp;<a href=\\\"https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8347?group=2\\\">https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8347?group=2<\\/a><\\/p>\",\"category_id\":\"1\",\"userid\":\"4\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-10 14:02:46\"}', 3, '2023-05-07 07:41:37', NULL),
(85, 'ไม่ใช้', 'cms_posts', 'id', '5', 'cms_posts.id = 5', '{\"id\":\"5\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/dd8efca549f0b1dd4564fb20f1cf1d1f.jpg\",\"title\":\"\\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23 \\u0e2a\\u0e1e\\u0e09. \\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e04\\u0e13\\u0e30 \\u0e25\\u0e07\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e15\\u0e23\\u0e27\\u0e08\\u0e40\\u0e22\\u0e35\\u0e48\\u0e22\\u0e21 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e43\\u0e08\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e07\\u0e32\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e43\\u0e19\\u0e0a\\u0e48\\u0e27\\u0e07\\u0e40\\u0e17\\u0e28\\u0e01\\u0e32\\u0e25\\u0e2a\\u0e07\\u0e01\\u0e23\\u0e32\\u0e19\\u0e15\\u0e4c \\u0e13 \\u0e08\\u0e38\\u0e14\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e2d\\u0e33\\u0e40\\u0e20\\u0e2d\\u0e21\\u0e27\\u0e01\\u0e40\\u0e2b\\u0e25\\u0e47\\u0e01\",\"message\":\"\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48 14 \\u0e40\\u0e21\\u0e29\\u0e32\\u0e22\\u0e19 2565 \\u0e40\\u0e27\\u0e25\\u0e32 11.30 \\u0e19. \\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e04\\u0e13\\u0e30 \\u0e25\\u0e07\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e15\\u0e23\\u0e27\\u0e08\\u0e40\\u0e22\\u0e35\\u0e48\\u0e22\\u0e21 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e43\\u0e08\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e07\\u0e32\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e43\\u0e19\\u0e0a\\u0e48\\u0e27\\u0e07\\u0e40\\u0e17\\u0e28\\u0e01\\u0e32\\u0e25\\u0e2a\\u0e07\\u0e01\\u0e23\\u0e32\\u0e19\\u0e15\\u0e4c \\u0e13 \\u0e08\\u0e38\\u0e14\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e2d\\u0e33\\u0e40\\u0e20\\u0e2d\\u0e21\\u0e27\\u0e01\\u0e40\\u0e2b\\u0e25\\u0e47\\u0e01 \\u0e2b\\u0e19\\u0e49\\u0e32\\u0e42\\u0e23\\u0e07\\u0e40\\u0e23\\u0e35\\u0e22\\u0e19\\u0e21\\u0e27\\u0e01\\u0e40\\u0e2b\\u0e25\\u0e47\\u0e01 \\u0e16\\u0e19\\u0e19\\u0e21\\u0e34\\u0e15\\u0e23\\u0e20\\u0e32\\u0e1e \\u0e41\\u0e25\\u0e30\\u0e40\\u0e22\\u0e35\\u0e48\\u0e22\\u0e21\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e43\\u0e08\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e07\\u0e32\\u0e19 \\u0e13 \\u0e2b\\u0e49\\u0e2d\\u0e07\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e23\\u0e1e.\\u0e21\\u0e27\\u0e01\\u0e40\\u0e2b\\u0e25\\u0e47\\u0e01 \\u0e08\\u0e31\\u0e07\\u0e2b\\u0e27\\u0e31\\u0e14\\u0e2a\\u0e23\\u0e30\\u0e1a\\u0e38\\u0e23\\u0e35<br \\/>\\r\\n<br \\/>\\r\\n\\u0e17\\u0e35\\u0e48\\u0e21\\u0e32:&nbsp;<a href=\\\"https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8395?group=2\\\">https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8395?group=2<\\/a>\",\"category_id\":\"3\",\"userid\":\"3\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-10 14:02:46\"}', 3, '2023-05-07 07:41:41', NULL);
INSERT INTO `tb_ci_log_delete` (`log_id`, `log_del_remark`, `log_table_name`, `log_table_pk_name`, `log_table_pk_value`, `log_del_condition`, `log_record_data`, `create_user_id`, `create_datetime`, `log_login_id`) VALUES
(86, 'ไม่ใช้', 'cms_posts', 'id', '8', 'cms_posts.id = 8', '{\"id\":\"8\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/675c6129ef0f51b9023651c336d1db60.jpg\",\"title\":\"\\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 (\\u0e2a\\u0e1e\\u0e09.) \\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e04\\u0e13\\u0e30 \\u0e25\\u0e07\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e15\\u0e23\\u0e27\\u0e08\\u0e40\\u0e22\\u0e35\\u0e48\\u0e22\\u0e21 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e43\\u0e08\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e07\\u0e32\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e13 \\u0e08\\u0e38\\u0e14\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19 \\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e01\",\"message\":\"\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48 14 \\u0e40\\u0e21\\u0e29\\u0e32\\u0e22\\u0e19 2565 \\u0e40\\u0e27\\u0e25\\u0e32 09.30 \\u0e19. \\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 (\\u0e2a\\u0e1e\\u0e09.) \\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e04\\u0e13\\u0e30 \\u0e25\\u0e07\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e15\\u0e23\\u0e27\\u0e08\\u0e40\\u0e22\\u0e35\\u0e48\\u0e22\\u0e21 \\u0e41\\u0e25\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e43\\u0e08\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e07\\u0e32\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e13 \\u0e08\\u0e38\\u0e14\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19 \\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e15\\u0e33\\u0e1a\\u0e25\\u0e1a\\u0e48\\u0e32\\u0e19\\u0e1b\\u0e48\\u0e32 \\u0e2d.\\u0e41\\u0e01\\u0e48\\u0e07\\u0e04\\u0e2d\\u0e22 \\u0e08.\\u0e2a\\u0e23\\u0e30\\u0e1a\\u0e38\\u0e23\\u0e35<br \\/>\\r\\n<br \\/>\\r\\n\\u0e17\\u0e35\\u0e48\\u0e21\\u0e32:&nbsp;<a href=\\\"https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8391?group=2\\\">https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8391?group=2<\\/a>\",\"category_id\":\"3\",\"userid\":\"3\",\"status\":\"published\",\"created\":null,\"updated\":\"2022-04-18 13:16:31\"}', 3, '2023-05-07 07:41:46', NULL),
(87, 'ไม่ใช้', 'cms_posts', 'id', '9', 'cms_posts.id = 9', '{\"id\":\"9\",\"image\":\".\\/assets\\/uploads\\/news\\/2565\\/e828cc8780553328b8655ab59f95dc96.jpg\",\"title\":\"\\u0e1e\\u0e34\\u0e18\\u0e35\\u0e25\\u0e07\\u0e19\\u0e32\\u0e21\\u0e43\\u0e19\\u0e1a\\u0e31\\u0e19\\u0e17\\u0e36\\u0e01\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e02\\u0e49\\u0e32\\u0e43\\u0e08 (MOU) \\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e41\\u0e25\\u0e30 SAMU des-Hauts-de-Seine Garches, AP HP. France\",\"message\":\"<p>\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48 20 \\u0e40\\u0e21\\u0e29\\u0e32\\u0e22\\u0e19 2565 \\u0e40\\u0e23\\u0e37\\u0e2d\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e28\\u0e40\\u0e2d\\u0e01 \\u0e19\\u0e32\\u0e22\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e2d\\u0e31\\u0e08\\u0e09\\u0e23\\u0e34\\u0e22\\u0e30 \\u0e41\\u0e1e\\u0e07\\u0e21\\u0e32 \\u0e40\\u0e25\\u0e02\\u0e32\\u0e18\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34\\u0e40\\u0e02\\u0e49\\u0e32\\u0e23\\u0e48\\u0e27\\u0e21\\u0e43\\u0e19\\u0e1e\\u0e34\\u0e18\\u0e35\\u0e01\\u0e32\\u0e23\\u0e25\\u0e07\\u0e19\\u0e32\\u0e21\\u0e43\\u0e19\\u0e1a\\u0e31\\u0e19\\u0e17\\u0e36\\u0e01\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e02\\u0e49\\u0e32\\u0e43\\u0e08 (MOU) \\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07 \\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e41\\u0e25\\u0e30 SAMU des-Hauts-de-Seine Garches, AP HP. France \\u0e41\\u0e25\\u0e30 \\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07 \\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e41\\u0e25\\u0e30 Institut de Recherche et d&rsquo;Enseignement des Soins d&rsquo;Urgence (IRESU) \\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e1d\\u0e23\\u0e31\\u0e48\\u0e07\\u0e40\\u0e28\\u0e2a \\u0e13 \\u0e2b\\u0e49\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e38\\u0e21 602 \\u0e2d\\u0e32\\u0e04\\u0e32\\u0e23\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e1a\\u0e38\\u0e04\\u0e25\\u0e32\\u0e01\\u0e23 \\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e42\\u0e14\\u0e22\\u0e21\\u0e35\\u0e1c\\u0e39\\u0e49\\u0e40\\u0e02\\u0e49\\u0e32\\u0e23\\u0e48\\u0e27\\u0e21\\u0e43\\u0e19\\u0e1e\\u0e34\\u0e18\\u0e35\\u0e01\\u0e32\\u0e23\\u0e25\\u0e07\\u0e19\\u0e32\\u0e21\\u0e43\\u0e19\\u0e1a\\u0e31\\u0e19\\u0e17\\u0e36\\u0e01\\u0e41\\u0e25\\u0e30\\u0e02\\u0e49\\u0e2d\\u0e15\\u0e01\\u0e25\\u0e07\\u0e14\\u0e31\\u0e07\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 Dr.Thomas Loeb, Head of SAMU des-Hauts-de-Seine Garches, AP HP. France, Dr.Anna Ozguler \\u0e41\\u0e25\\u0e30 Dr.Michel Baer President of theInstitut de Recherche et d&rsquo;Enseignement des Soins d&rsquo;Urgence \\u0e23\\u0e27\\u0e21\\u0e16\\u0e36\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e41\\u0e25\\u0e30\\u0e1a\\u0e38\\u0e04\\u0e25\\u0e32\\u0e01\\u0e23 \\u0e02\\u0e2d\\u0e07\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34 \\u0e44\\u0e14\\u0e49\\u0e40\\u0e02\\u0e49\\u0e32\\u0e23\\u0e48\\u0e27\\u0e21\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e40\\u0e01\\u0e35\\u0e22\\u0e23\\u0e15\\u0e34\\u0e43\\u0e19\\u0e1e\\u0e34\\u0e18\\u0e35<\\/p>\\r\\n\\r\\n<p>\\u0e42\\u0e14\\u0e22\\u0e01\\u0e32\\u0e23\\u0e25\\u0e07\\u0e19\\u0e32\\u0e21 MOU \\u0e01\\u0e31\\u0e1a SAMU des-Hauts-de-Seine Garches, AP HP. France \\u0e2b\\u0e23\\u0e37\\u0e2d SAMU 92 \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e01\\u0e32\\u0e23\\u0e25\\u0e07\\u0e19\\u0e32\\u0e21\\u0e04\\u0e23\\u0e31\\u0e49\\u0e07\\u0e17\\u0e35\\u0e48 4 \\u0e2b\\u0e25\\u0e31\\u0e07\\u0e08\\u0e32\\u0e01\\u0e17\\u0e31\\u0e49\\u0e07\\u0e2a\\u0e2d\\u0e07\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19\\u0e44\\u0e14\\u0e49\\u0e40\\u0e23\\u0e34\\u0e48\\u0e21\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e48\\u0e27\\u0e21\\u0e21\\u0e37\\u0e2d\\u0e15\\u0e31\\u0e49\\u0e07\\u0e41\\u0e15\\u0e48\\u0e1b\\u0e35 2553 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e08\\u0e31\\u0e14\\u0e01\\u0e34\\u0e08\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e1d\\u0e36\\u0e01\\u0e2d\\u0e1a\\u0e23\\u0e21\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e31\\u0e1a\\u0e1a\\u0e38\\u0e04\\u0e25\\u0e32\\u0e01\\u0e23\\u0e43\\u0e19\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22\\u0e43\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e1d\\u0e23\\u0e31\\u0e48\\u0e07\\u0e40\\u0e28\\u0e2a\\u0e1b\\u0e35\\u0e25\\u0e30 1 \\u0e04\\u0e23\\u0e31\\u0e49\\u0e07 \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e08\\u0e33\\u0e17\\u0e38\\u0e01\\u0e1b\\u0e35 \\u0e42\\u0e14\\u0e22\\u0e21\\u0e35\\u0e23\\u0e30\\u0e22\\u0e30\\u0e40\\u0e27\\u0e25\\u0e32\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1d\\u0e36\\u0e01\\u0e2d\\u0e1a\\u0e23\\u0e21\\u0e1b\\u0e23\\u0e30\\u0e21\\u0e32\\u0e13 2 \\u0e2a\\u0e31\\u0e1b\\u0e14\\u0e32\\u0e2b\\u0e4c \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e43\\u0e2b\\u0e49\\u0e1a\\u0e38\\u0e04\\u0e25\\u0e32\\u0e01\\u0e23\\u0e43\\u0e19\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22\\u0e44\\u0e14\\u0e49\\u0e21\\u0e35\\u0e42\\u0e2d\\u0e01\\u0e32\\u0e2a\\u0e17\\u0e35\\u0e48\\u0e08\\u0e30\\u0e40\\u0e23\\u0e35\\u0e22\\u0e19\\u0e23\\u0e39\\u0e49\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e1d\\u0e23\\u0e31\\u0e48\\u0e07\\u0e40\\u0e28\\u0e2a \\u0e2a\\u0e31\\u0e07\\u0e40\\u0e01\\u0e15\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e1a\\u0e41\\u0e08\\u0e49\\u0e07\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e31\\u0e48\\u0e07\\u0e01\\u0e32\\u0e23\\u0e23\\u0e27\\u0e21\\u0e16\\u0e36\\u0e07\\u0e01\\u0e32\\u0e23\\u0e15\\u0e34\\u0e14\\u0e15\\u0e32\\u0e21\\u0e0a\\u0e38\\u0e14\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e44\\u0e1b\\u0e2d\\u0e2d\\u0e01\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23\\u0e43\\u0e19\\u0e1a\\u0e32\\u0e07\\u0e42\\u0e2d\\u0e01\\u0e32\\u0e2a \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e43\\u0e2b\\u0e49\\u0e44\\u0e14\\u0e49\\u0e21\\u0e32\\u0e0b\\u0e36\\u0e48\\u0e07\\u0e2d\\u0e07\\u0e04\\u0e4c\\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e39\\u0e49\\u0e17\\u0e35\\u0e48\\u0e08\\u0e30\\u0e19\\u0e33\\u0e21\\u0e32\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22\\u0e15\\u0e48\\u0e2d\\u0e44\\u0e1b<\\/p>\\r\\n\\r\\n<p>\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e01\\u0e32\\u0e23\\u0e25\\u0e07\\u0e19\\u0e32\\u0e21\\u0e43\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e15\\u0e01\\u0e25\\u0e07 \\u0e01\\u0e31\\u0e1a Institut de Recherche et d&rsquo;Enseignement des Soins d&rsquo;Urgence (IRESU) \\u0e2b\\u0e23\\u0e37\\u0e2d Institute for Training and Research on Emergency Medicine \\u0e0b\\u0e36\\u0e48\\u0e07\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19\\u0e44\\u0e21\\u0e48\\u0e41\\u0e2a\\u0e27\\u0e07\\u0e2b\\u0e32\\u0e01\\u0e33\\u0e44\\u0e23\\u0e43\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e1d\\u0e23\\u0e31\\u0e48\\u0e07\\u0e40\\u0e28\\u0e2a \\u0e42\\u0e14\\u0e22\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e01\\u0e32\\u0e23\\u0e17\\u0e33\\u0e02\\u0e49\\u0e2d\\u0e15\\u0e01\\u0e25\\u0e07\\u0e02\\u0e36\\u0e49\\u0e19\\u0e43\\u0e2b\\u0e21\\u0e48\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e04\\u0e23\\u0e31\\u0e49\\u0e07\\u0e41\\u0e23\\u0e01 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e2a\\u0e19\\u0e31\\u0e1a\\u0e2a\\u0e19\\u0e38\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e01\\u0e34\\u0e08\\u0e01\\u0e23\\u0e23\\u0e21\\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e48\\u0e27\\u0e21\\u0e21\\u0e37\\u0e2d\\u0e01\\u0e31\\u0e1a SAMU92 \\u0e43\\u0e19\\u0e14\\u0e49\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e34\\u0e2b\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e01\\u0e32\\u0e23\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e07\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e21\\u0e32\\u0e13 \\u0e17\\u0e31\\u0e49\\u0e07\\u0e19\\u0e35\\u0e49 IRESU \\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e0a\\u0e35\\u0e48\\u0e22\\u0e27\\u0e0a\\u0e32\\u0e0d\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32\\u0e41\\u0e25\\u0e30\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e43\\u0e19\\u0e2b\\u0e31\\u0e27\\u0e02\\u0e49\\u0e2d\\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e35\\u0e48\\u0e22\\u0e27\\u0e01\\u0e31\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e08\\u0e36\\u0e07\\u0e19\\u0e31\\u0e1a\\u0e27\\u0e48\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e42\\u0e2d\\u0e01\\u0e32\\u0e2a\\u0e17\\u0e35\\u0e48\\u0e14\\u0e35\\u0e22\\u0e34\\u0e48\\u0e07\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e41\\u0e2b\\u0e48\\u0e07\\u0e0a\\u0e32\\u0e15\\u0e34\\u0e08\\u0e30\\u0e44\\u0e14\\u0e49\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e07\\u0e32\\u0e19\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e23\\u0e48\\u0e27\\u0e21\\u0e01\\u0e31\\u0e19\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e1e\\u0e31\\u0e12\\u0e19\\u0e32\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Agreement for Medical Cooperation on Emergency Medical Services Between National Institute for Emergency Medicine (NIEM) And Institut de Recherche et d&#39;Enseignement des Soins d&#39;Urgence (IRESU)<\\/li>\\r\\n\\t<li>Memorandum of Understanding (MOU) for Medical Cooperation on Emergency Medical Services Between National Institute for Emergency Medicine And SAMU des-Hauts-ds-Seine Garches, AP HP. Franc<\\/li>\\r\\n<\\/ul>\\r\\n\\u0e17\\u0e35\\u0e48\\u0e21\\u0e32:&nbsp;<a href=\\\"https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8400?group=2\\\">https:\\/\\/www.niems.go.th\\/1\\/News\\/Detail\\/8400?group=2<\\/a>\",\"category_id\":\"2\",\"userid\":\"4\",\"status\":\"draft\",\"created\":null,\"updated\":\"2022-05-05 12:35:39\"}', 3, '2023-05-07 07:41:51', NULL),
(88, 'ไม่ใช้', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', '{\"ca_basic_info\":\"1\",\"subject\":\"\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19 (Cardiac Arrest)\",\"detail\":\"\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19:  \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e1e\\u0e22\\u0e32\\u0e18\\u0e34\\u0e2a\\u0e20\\u0e32\\u0e1e\\u0e17\\u0e35\\u0e48\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e1c\\u0e34\\u0e14\\u0e1b\\u0e01\\u0e15\\u0e34 \\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e25\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e1a\\u0e35\\u0e1a\\u0e15\\u0e31\\u0e27\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e40\\u0e15\\u0e49\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 \\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e44\\u0e21\\u0e48\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e44\\u0e1b\\u0e40\\u0e25\\u0e35\\u0e49\\u0e22\\u0e07\\u0e15\\u0e32\\u0e21\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e15\\u0e48\\u0e32\\u0e07\\u0e46 \\u0e02\\u0e2d\\u0e07\\u0e23\\u0e48\\u0e32\\u0e07\\u0e01\\u0e32\\u0e22\\u0e44\\u0e14\\u0e49\\u0e40\\u0e1e\\u0e35\\u0e22\\u0e07\\u0e1e\\u0e2d \\u0e08\\u0e36\\u0e07\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e2d\\u0e32\\u0e01\\u0e32\\u0e23\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e25\\u0e21 \\u0e2b\\u0e21\\u0e14\\u0e2a\\u0e15\\u0e34  \\u0e42\\u0e14\\u0e22\\u0e17\\u0e35\\u0e48\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e20\\u0e32\\u0e27\\u0e30\\u0e17\\u0e35\\u0e48\\u0e23\\u0e38\\u0e19\\u0e41\\u0e23\\u0e07\\u0e41\\u0e25\\u0e30\\u0e2d\\u0e32\\u0e08\\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e25\\u0e43\\u0e2b\\u0e49\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2a\\u0e35\\u0e22\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e44\\u0e14\\u0e49\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e23\\u0e27\\u0e14\\u0e40\\u0e23\\u0e47\\u0e27 \\u0e2b\\u0e32\\u0e01\\u0e1e\\u0e1a\\u0e04\\u0e19\\u0e43\\u0e01\\u0e25\\u0e49\\u0e15\\u0e31\\u0e27\\u0e2b\\u0e21\\u0e14\\u0e2a\\u0e15\\u0e34\\u0e41\\u0e25\\u0e30\\u0e21\\u0e35\\u0e2a\\u0e31\\u0e0d\\u0e0d\\u0e32\\u0e13\\u0e02\\u0e2d\\u0e07\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19 \\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e44\\u0e21\\u0e48\\u0e21\\u0e35\\u0e0a\\u0e35\\u0e1e\\u0e08\\u0e23\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e44\\u0e21\\u0e48\\u0e2b\\u0e32\\u0e22\\u0e43\\u0e08 \\u0e04\\u0e27\\u0e23\\u0e42\\u0e17\\u0e23\\u0e41\\u0e08\\u0e49\\u0e07\\u0e2a\\u0e32\\u0e22\\u0e14\\u0e48\\u0e27\\u0e19\\u0e17\\u0e35\\u0e48\\u0e40\\u0e1a\\u0e2d\\u0e23\\u0e4c 1669 \\u0e41\\u0e25\\u0e30\\u0e2b\\u0e32\\u0e01\\u0e40\\u0e04\\u0e22\\u0e44\\u0e14\\u0e49\\u0e23\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e1d\\u0e36\\u0e01\\u0e1d\\u0e19\\u0e01\\u0e32\\u0e23\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e02\\u0e31\\u0e49\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19 \\u0e04\\u0e27\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e42\\u0e14\\u0e22\\u0e43\\u0e2b\\u0e49\\u0e17\\u0e33\\u0e01\\u0e32\\u0e23\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e02\\u0e31\\u0e49\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19\\u0e14\\u0e49\\u0e27\\u0e22\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e31\\u0e4a\\u0e21\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 (Cardiopulmonary Resuscitation: CPR) \\u0e2a\\u0e25\\u0e31\\u0e1a\\u0e01\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e01\\u0e23\\u0e30\\u0e15\\u0e38\\u0e01\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e44\\u0e1f\\u0e1f\\u0e49\\u0e32\\u0e2d\\u0e31\\u0e15\\u0e42\\u0e19\\u0e21\\u0e31\\u0e15\\u0e34 (Automated External Defibrillators: AED) \\u0e17\\u0e31\\u0e19\\u0e17\\u0e35\",\"images\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/b11510732f2576a42d44ac7c49adb43e.jpg\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/b44529e0685e4d4184955e38b095cfc1.pdf\",\"create_date\":null}', 3, '2023-05-07 08:19:10', NULL),
(89, 'ไม่ใช้', 'cms_ca_basic_info', 'ca_basic_info', '2', 'cms_ca_basic_info.ca_basic_info = 2', '{\"ca_basic_info\":\"2\",\"subject\":\"\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e15\\u0e32\\u0e22\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\\u0e43\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22\",\"detail\":\"\\u0e2a\\u0e4d\\u0e32\\u0e2b\\u0e23\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e15\\u0e32\\u0e22\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\\u0e22\\u0e31\\u0e07\\u0e04\\u0e07\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e32\\u0e40\\u0e2b\\u0e15\\u0e38 \\u0e01\\u0e32\\u0e23\\u0e15\\u0e32\\u0e22\\u0e2d\\u0e31\\u0e19\\u0e14\\u0e31\\u0e1a\\u0e15\\u0e49\\u0e19\\u0e46 \\u0e23\\u0e2d\\u0e07\\u0e08\\u0e32\\u0e01 \\u0e21\\u0e30\\u0e40\\u0e23\\u0e47\\u0e07 \\u0e41\\u0e25\\u0e30\\u0e2d\\u0e38\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e40\\u0e2b\\u0e15\\u0e38 \\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07 \\u0e16\\u0e39\\u0e01\\u0e15\\u0e49\\u0e2d\\u0e07 \\u0e23\\u0e35\\u0e1a\\u0e14\\u0e48\\u0e27\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e21\\u0e35\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e34\\u0e17\\u0e18\\u0e34\\u0e20\\u0e32\\u0e1e \\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e25\\u0e14\\u0e2d\\u0e31\\u0e15\\u0e23\\u0e32\\u0e01\\u0e32\\u0e23\\u0e15\\u0e32\\u0e22 \\u0e1b\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e40\\u0e01\\u0e34\\u0e14\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e15\\u0e32\\u0e22\\u0e16\\u0e32\\u0e27\\u0e23 \\u0e0b\\u0e36\\u0e48\\u0e07 \\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e25\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e20\\u0e32\\u0e27\\u0e30\\u0e41\\u0e17\\u0e23\\u0e01\\u0e0b\\u0e49\\u0e2d\\u0e19\\u0e15\\u0e32\\u0e21\\u0e21\\u0e32 \\u0e40\\u0e0a\\u0e48\\u0e19 \\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e40\\u0e15\\u0e49\\u0e19\\u0e1c\\u0e34\\u0e14\\u0e08\\u0e31\\u0e07\\u0e2b\\u0e27\\u0e30 \\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e27\\u0e32\\u0e22 \\u0e20\\u0e32\\u0e27\\u0e30\\u0e0a\\u0e47\\u0e2d\\u0e04\\u0e08\\u0e32\\u0e01\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 \\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19 \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e15\\u0e49\\u0e19 \\u0e01\\u0e32\\u0e23\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\\u0e04\\u0e37\\u0e2d \\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e23\\u0e40\\u0e17\\u0e32\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e1b\\u0e27\\u0e14\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e25\\u0e14\\u0e01\\u0e32\\u0e23\\u0e17\\u0e4d\\u0e32\\u0e07\\u0e32\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e41\\u0e25\\u0e30 \\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e44\\u0e1b\\u0e40\\u0e25\\u0e35\\u0e49\\u0e22\\u0e07 \\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e1e\\u0e35\\u0e22\\u0e07\\u0e1e\\u0e2d \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e1b\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e19\\u0e2d\\u0e31\\u0e19\\u0e15\\u0e23\\u0e32\\u0e22\\u0e08\\u0e32\\u0e01\\u0e42\\u0e23\\u0e04\\u0e41\\u0e25\\u0e30\\u0e20\\u0e32\\u0e27\\u0e30\\u0e41\\u0e17\\u0e23\\u0e01\\u0e0b\\u0e49\\u0e2d\\u0e19 \\u0e23\\u0e27\\u0e21\\u0e17\\u0e31\\u0e49\\u0e07\\u0e01\\u0e32\\u0e23\\u0e43\\u0e2b\\u0e49\\u0e04\\u0e27\\u0e32\\u0e21\\u0e23\\u0e39\\u0e49 \\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e02\\u0e49\\u0e32\\u0e43\\u0e08\\u0e41\\u0e25\\u0e30 \\u0e04\\u0e4d\\u0e32\\u0e41\\u0e19\\u0e30\\u0e19\\u0e4d\\u0e32\\u0e17\\u0e35\\u0e48\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e42\\u0e22\\u0e0a\\u0e19\\u0e4c\\u0e15\\u0e48\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e1b\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e01\\u0e25\\u0e31\\u0e1a\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e0b\\u0e49\\u0e33\\u0e23\\u0e27\\u0e21\\u0e17\\u0e31\\u0e49\\u0e07\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e43\\u0e2b\\u0e49\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e21\\u0e35\\u0e04\\u0e38\\u0e13\\u0e20\\u0e32\\u0e1e\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e17\\u0e35\\u0e48\\u0e14\\u0e35\\u0e15\\u0e48\\u0e2d\\u0e44\\u0e1b\",\"images\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/2f574c9a70a45d59bb97641c988b7d89.jpg\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/e4e67dfd0296e4d8fc47f4a2e87fe270.pdf\",\"create_date\":null}', 3, '2023-05-07 08:19:15', NULL),
(90, 'ไม่ใช้', 'cms_ca_basic_info', 'ca_basic_info', '4', 'cms_ca_basic_info.ca_basic_info = 4', '{\"ca_basic_info\":\"4\",\"subject\":\"\\u0e01\\u0e32\\u0e23\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\",\"detail\":\"\\u0e01\\u0e32\\u0e23\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e01\\u0e32\\u0e23\\u0e1a\\u0e23\\u0e23\\u0e40\\u0e17\\u0e32\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e1b\\u0e27\\u0e14\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e25\\u0e14\\u0e01\\u0e32\\u0e23\\u0e17\\u0e4d\\u0e32\\u0e07\\u0e32\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e41\\u0e25\\u0e30 \\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e44\\u0e1b\\u0e40\\u0e25\\u0e35\\u0e49\\u0e22\\u0e07 \\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e1e\\u0e35\\u0e22\\u0e07\\u0e1e\\u0e2d \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e1b\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e19\\u0e2d\\u0e31\\u0e19\\u0e15\\u0e23\\u0e32\\u0e22\\u0e08\\u0e32\\u0e01\\u0e42\\u0e23\\u0e04\\u0e41\\u0e25\\u0e30\\u0e20\\u0e32\\u0e27\\u0e30\\u0e41\\u0e17\\u0e23\\u0e01\\u0e0b\\u0e49\\u0e2d\\u0e19\",\"images\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/cfe676be7a7668a1df0f87b77a34269c.jpg\",\"create_by_userid\":\"3\",\"files\":\"\",\"create_date\":null}', 3, '2023-05-07 08:19:20', NULL),
(91, 'ไม่ใช้', 'cms_ca_basic_info', 'ca_basic_info', '6', 'cms_ca_basic_info.ca_basic_info = 6', '{\"ca_basic_info\":\"6\",\"subject\":\"\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e04\\u0e37\\u0e19\\u0e0a\\u0e35\\u0e1e\\u0e02\\u0e31\\u0e49\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19\",\"detail\":\"\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e04\\u0e37\\u0e19\\u0e0a\\u0e35\\u0e1e\\u0e02\\u0e31\\u0e49\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19: \\u0e2a\\u0e16\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e34\\u0e48\\u0e07\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e40\\u0e01\\u0e34\\u0e14\\u0e02\\u0e36\\u0e49\\u0e19\\u0e44\\u0e14\\u0e49\\u0e42\\u0e14\\u0e22\\u0e17\\u0e35\\u0e48\\u0e40\\u0e23\\u0e32\\u0e44\\u0e21\\u0e48\\u0e44\\u0e14\\u0e49\\u0e04\\u0e32\\u0e14\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e44\\u0e27\\u0e49\\u0e25\\u0e48\\u0e27\\u0e07\\u0e2b\\u0e19\\u0e49\\u0e32 \\u0e0b\\u0e36\\u0e48\\u0e07\\u0e2d\\u0e32\\u0e08\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2d\\u0e31\\u0e19\\u0e15\\u0e23\\u0e32\\u0e22\\u0e16\\u0e36\\u0e07\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15 \\u0e01\\u0e32\\u0e23\\u0e43\\u0e2b\\u0e49\\u0e04\\u0e27\\u0e32\\u0e21\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e15\\u0e48\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e1a\\u0e01\\u0e31\\u0e1a\\u0e2a\\u0e16\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e08\\u0e36\\u0e07\\u0e16\\u0e37\\u0e2d\\u0e27\\u0e48\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e34\\u0e48\\u0e07\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e48\\u0e04\\u0e38\\u0e13\\u0e23\\u0e31\\u0e01\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e19\\u0e21\\u0e19\\u0e38\\u0e29\\u0e22\\u0e4c\\u0e14\\u0e49\\u0e27\\u0e22\\u0e01\\u0e31\\u0e19 \\u0e17\\u0e48\\u0e32\\u0e19\\u0e04\\u0e27\\u0e23\\u0e40\\u0e23\\u0e35\\u0e22\\u0e19\\u0e23\\u0e39\\u0e49\\u0e40\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e41\\u0e08\\u0e49\\u0e07\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e02\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d \\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e04\\u0e37\\u0e19\\u0e0a\\u0e35\\u0e1e\\u0e02\\u0e31\\u0e49\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19 \\u0e23\\u0e27\\u0e21\\u0e16\\u0e36\\u0e07\\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 \\u0e40\\u0e2d \\u0e2d\\u0e35 \\u0e14\\u0e35 (AED) \\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07\\u0e17\\u0e35\\u0e48\\u0e17\\u0e35\\u0e21\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e22\\u0e31\\u0e07\\u0e40\\u0e14\\u0e34\\u0e19\\u0e17\\u0e32\\u0e07\\u0e44\\u0e1b\\u0e44\\u0e21\\u0e48\\u0e16\\u0e36\\u0e07 \\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e44\\u0e23\\u0e01\\u0e47\\u0e15\\u0e32\\u0e21\\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 \\u0e40\\u0e2d \\u0e2d\\u0e35 \\u0e14\\u0e35 (AED) \\u0e43\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22\\u0e16\\u0e37\\u0e2d\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e40\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e43\\u0e2b\\u0e21\\u0e48 \\u0e2a\\u0e33\\u0e2b\\u0e23\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e17\\u0e35\\u0e48\\u0e08\\u0e33\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e08\\u0e30\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07\\u0e14\\u0e31\\u0e07\\u0e01\\u0e25\\u0e32\\u0e27\\u0e04\\u0e27\\u0e23\\u0e14\\u0e33\\u0e40\\u0e19\\u0e34\\u0e19\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e20\\u0e32\\u0e22\\u0e43\\u0e15\\u0e49\\u0e04\\u0e33\\u0e41\\u0e19\\u0e30\\u0e19\\u0e33\\u0e02\\u0e2d\\u0e07\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e15\\u0e32\\u0e21\\u0e04\\u0e33\\u0e41\\u0e19\\u0e30\\u0e19\\u0e33\\u0e08\\u0e32\\u0e01\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e1c\\u0e48\\u0e32\\u0e19\\u0e2a\\u0e32\\u0e22\\u0e14\\u0e48\\u0e27\\u0e19 1669 \\u0e41\\u0e25\\u0e30\\u0e2b\\u0e27\\u0e31\\u0e07\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e22\\u0e34\\u0e48\\u0e07\\u0e27\\u0e48\\u0e32\\u0e04\\u0e39\\u0e48\\u0e21\\u0e37\\u0e2d\\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e19\\u0e35\\u0e49\\u0e08\\u0e30\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e1b\\u0e23\\u0e30\\u0e42\\u0e22\\u0e0a\\u0e19\\u0e4c\\u0e2a\\u0e33\\u0e2b\\u0e23\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e17\\u0e31\\u0e48\\u0e27\\u0e44\\u0e1b\\u0e43\\u0e2b\\u0e49\\u0e19\\u0e33\\u0e44\\u0e1b\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e14\\u0e49\\u0e27\\u0e22\\u0e40\\u0e04\\u0e23\\u0e37\\u0e48\\u0e2d\\u0e07 \\u0e40\\u0e2d \\u0e2d\\u0e35 \\u0e14\\u0e35 \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e42\\u0e2d\\u0e01\\u0e32\\u0e2a\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e14\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e17\\u0e35\\u0e48\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e44\\u0e14\\u0e49\",\"images\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/0692d49f8c3e014a99bbcd3e515e16da.jpg\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/cms_ca_basic_info\\/2565\\/26ddbbbb0d57b2e780655489c128e5f5.pdf\",\"create_date\":null}', 3, '2023-05-07 08:19:25', NULL),
(92, 'ไม่ใช้', 'cms_researchs', 'cms_researchs_id', '1', 'cms_researchs.cms_researchs_id = 1', '{\"cms_researchs_id\":\"1\",\"image\":\".\\/assets\\/uploads\\/research\\/2565\\/432c76274536007a39ac4c4e7a3dc5ad.jpg\",\"subject\":\"\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e1c\\u0e25\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e14\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e02\\u0e2d\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e17\\u0e35\\u0e48\\u0e40\\u0e02\\u0e49\\u0e32\\u0e23\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e01\\u0e29\\u0e32\\u0e43\\u0e19\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e40\\u0e0a\\u0e35\\u0e22\\u0e07\\u0e23\\u0e32\\u0e22\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e19\\u0e38\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c\",\"detail\":\"\\u0e27\\u0e31\\u0e15\\u0e16\\u0e38\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e07\\u0e04\\u0e4c : \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e1c\\u0e25\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e14\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e41\\u0e25\\u0e30\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2a\\u0e31\\u0e21\\u0e1e\\u0e31\\u0e19\\u0e18\\u0e4c\\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07\\u0e04\\u0e38\\u0e13\\u0e25\\u0e31\\u0e01\\u0e29\\u0e13\\u0e30\\u0e02\\u0e2d\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e41\\u0e25\\u0e30\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e1c\\u0e25\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e14\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e02\\u0e2d\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 \\u0e27\\u0e34\\u0e18\\u0e35\\u0e01\\u0e32\\u0e23\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32 : \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e01\\u0e32\\u0e23\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32\\u0e23\\u0e39\\u0e1b\\u0e41\\u0e1a\\u0e1a retrospective \\u0e43\\u0e19\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 \\u0e2d\\u0e32\\u0e22\\u0e38\\u0e15\\u0e31\\u0e49\\u0e07\\u0e41\\u0e15\\u0e48 18 \\u0e1b\\u0e35\\u0e17\\u0e35\\u0e48\\u0e40\\u0e02\\u0e49\\u0e32\\u0e23\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e01\\u0e29\\u0e32\\u0e43\\u0e19\\u0e2b\\u0e49\\u0e2d\\u0e07\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e40\\u0e0a\\u0e35\\u0e22\\u0e07\\u0e23\\u0e32\\u0e22\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e19\\u0e38\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c \\u0e15\\u0e31\\u0e49\\u0e07\\u0e41\\u0e15\\u0e48 1 \\u0e15\\u0e38\\u0e25\\u0e32\\u0e04\\u0e21 2559 \\u0e16\\u0e36\\u0e07 30 \\u0e01\\u0e31\\u0e19\\u0e22\\u0e32\\u0e22\\u0e19 2561 \\u0e42\\u0e14\\u0e22\\u0e40\\u0e01\\u0e47\\u0e1a\\u0e23\\u0e27\\u0e1a\\u0e23\\u0e27\\u0e21\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e08\\u0e32\\u0e01\\u0e40\\u0e27\\u0e0a\\u0e23\\u0e30\\u0e40\\u0e1a\\u0e35\\u0e22\\u0e19\\u0e41\\u0e25\\u0e30\\u0e27\\u0e34\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e42\\u0e14\\u0e22\\u0e43\\u0e0a\\u0e49  t-test, exact probability test \\u0e41\\u0e25\\u0e30 Logistic regression \\u0e1c\\u0e25\\u0e01\\u0e32\\u0e23\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32 : \\u0e0a\\u0e48\\u0e27\\u0e07\\u0e23\\u0e30\\u0e22\\u0e30\\u0e40\\u0e27\\u0e25\\u0e32 24 \\u0e40\\u0e14\\u0e37\\u0e2d\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32 \\u0e1e\\u0e1a\\u0e27\\u0e48\\u0e32 \\u0e08\\u0e33\\u0e19\\u0e27\\u0e19\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e17\\u0e35\\u0e48\\u0e40\\u0e02\\u0e49\\u0e32\\u0e40\\u0e01\\u0e13\\u0e11\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32 133 \\u0e23\\u0e32\\u0e22 \\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e43\\u0e2b\\u0e0d\\u0e48\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e40\\u0e1e\\u0e28\\u0e0a\\u0e32\\u0e22 \\u0e23\\u0e49\\u0e2d\\u0e22\\u0e25\\u0e30 63.90 \\u0e2a\\u0e32\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e02\\u0e2d\\u0e07\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e2a\\u0e32\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e17\\u0e35\\u0e48\\u0e44\\u0e21\\u0e48\\u0e43\\u0e0a\\u0e48\\u0e08\\u0e32\\u0e01\\u0e42\\u0e23\\u0e04\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08 \\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e31\\u0e1a\\u0e21\\u0e32\\u0e21\\u0e35\\u0e2a\\u0e31\\u0e0d\\u0e0d\\u0e32\\u0e13\\u0e0a\\u0e35\\u0e1e\\u0e2b\\u0e25\\u0e31\\u0e07\\u0e08\\u0e32\\u0e01\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e1f\\u0e37\\u0e49\\u0e19\\u0e04\\u0e37\\u0e19\\u0e0a\\u0e35\\u0e1e \\u0e21\\u0e32\\u0e01\\u0e01\\u0e27\\u0e48\\u0e32\\u0e40\\u0e17\\u0e48\\u0e32\\u0e01\\u0e31\\u0e1a 20 \\u0e19\\u0e32\\u0e17\\u0e35 (Sustained ROSC) 49 \\u0e23\\u0e32\\u0e22 \\u0e23\\u0e49\\u0e2d\\u0e22\\u0e25\\u0e30 36.80 \\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e1c\\u0e25\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e14\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e02\\u0e2d\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e21\\u0e35\\u0e19\\u0e31\\u0e22\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\\u0e17\\u0e32\\u0e07\\u0e2a\\u0e16\\u0e34\\u0e15\\u0e34 \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e40\\u0e27\\u0e25\\u0e32\\u0e17\\u0e35\\u0e48\\u0e43\\u0e0a\\u0e49\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e2d\\u0e2d\\u0e01\\u0e40\\u0e2b\\u0e15\\u0e38 (response time) \\u0e19\\u0e49\\u0e2d\\u0e22\\u0e01\\u0e27\\u0e48\\u0e32 8 \\u0e19\\u0e32\\u0e17\\u0e35 (OR 2.37, 95%CI 1.07-5.27) \\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e01\\u0e14\\u0e19\\u0e27\\u0e14\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e40\\u0e1a\\u0e37\\u0e49\\u0e2d\\u0e07\\u0e15\\u0e49\\u0e19\\u0e42\\u0e14\\u0e22\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e17\\u0e35\\u0e48\\u0e1e\\u0e1a\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e01\\u0e32\\u0e23\\u0e13\\u0e4c (OR 4.82, 95%CI1.68-13.87)   \\u0e17\\u0e35\\u0e48\\u0e21\\u0e32: https:\\/\\/he01.tci-thaijo.org\\/index.php\\/crmjournal\\/article\\/view\\/246423\",\"research_name\":\"\\u0e1b\\u0e1e\\u0e34\\u0e0a\\u0e0d\\u0e32 \\u0e1e\\u0e34\\u0e40\\u0e0a\\u0e29\\u0e10\\u0e1a\\u0e38\\u0e0d\\u0e40\\u0e01\\u0e35\\u0e22\\u0e23\\u0e15\\u0e34\",\"create_date\":\"2022-04-18\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/research\\/2565\\/9b3d4b347bb162d7135cce987b28ce3a.pdf\"}', 3, '2023-05-07 08:19:35', NULL),
(93, 'ไม่ใช้', 'cms_researchs', 'cms_researchs_id', '3', 'cms_researchs.cms_researchs_id = 3', '{\"cms_researchs_id\":\"3\",\"image\":\".\\/assets\\/uploads\\/research\\/2565\\/98d408f582b4d6adff93555fc173a02b.jpg\",\"subject\":\"\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e40\\u0e2a\\u0e35\\u0e48\\u0e22\\u0e07\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e40\\u0e01\\u0e34\\u0e14\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e02\\u0e32\\u0e14\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\\u0e43\\u0e19\\u0e27\\u0e31\\u0e22\\u0e1c\\u0e39\\u0e49\\u0e43\\u0e2b\\u0e0d\\u0e48\\u0e15\\u0e2d\\u0e19\\u0e15\\u0e49\\u0e19: \\u0e01\\u0e32\\u0e23\\u0e17\\u0e1a\\u0e17\\u0e27\\u0e19\\u0e27\\u0e23\\u0e23\\u0e13\\u0e01\\u0e23\\u0e23\\u0e21\\u0e41\\u0e1a\\u0e1a\\u0e1a\\u0e39\\u0e23\\u0e13\\u0e32\\u0e01\\u0e32\\u0e23\",\"detail\":\"\\u0e01\\u0e32\\u0e23\\u0e17\\u0e1a\\u0e17\\u0e27\\u0e19\\u0e27\\u0e23\\u0e23\\u0e13\\u0e01\\u0e23\\u0e23\\u0e21\\u0e41\\u0e1a\\u0e1a\\u0e1a\\u0e39\\u0e23\\u0e13\\u0e32\\u0e01\\u0e32\\u0e23\\u0e19\\u0e35\\u0e49\\u0e21\\u0e35\\u0e27\\u0e31\\u0e15\\u0e16\\u0e38\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e07\\u0e04\\u0e4c \\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e40\\u0e2a\\u0e35\\u0e48\\u0e22\\u0e07\\u0e43\\u0e19\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e27\\u0e31\\u0e22\\u0e1c\\u0e39\\u0e49\\u0e43\\u0e2b\\u0e0d\\u0e48\\u0e15\\u0e2d\\u0e19\\u0e15\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e02\\u0e32\\u0e14\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19 \\u0e2a\\u0e37\\u0e1a\\u0e04\\u0e49\\u0e19\\u0e07\\u0e32\\u0e19\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e08\\u0e32\\u0e01\\u0e10\\u0e32\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 CINAHL, PubMed, THAIJO, ProQuest, \\u0e41\\u0e25\\u0e30 ScienceDirect \\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07 \\u0e1b\\u0e35 \\u0e1e.\\u0e28. 2553-2563 \\u0e2b\\u0e23\\u0e37\\u0e2d \\u0e04.\\u0e28. 2010-2020 \\u0e44\\u0e14\\u0e49\\u0e07\\u0e32\\u0e19\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e09\\u0e1a\\u0e31\\u0e1a\\u0e2a\\u0e21\\u0e1a\\u0e39\\u0e23\\u0e13\\u0e4c\\u0e20\\u0e32\\u0e29\\u0e32\\u0e2d\\u0e31\\u0e07\\u0e01\\u0e24\\u0e29\\u0e41\\u0e25\\u0e30\\u0e20\\u0e32\\u0e29\\u0e32\\u0e44\\u0e17\\u0e22 \\u0e15\\u0e23\\u0e07\\u0e15\\u0e32\\u0e21\\u0e40\\u0e01\\u0e13\\u0e11\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e04\\u0e31\\u0e14\\u0e40\\u0e02\\u0e49\\u0e32 \\u0e08\\u0e33\\u0e19\\u0e27\\u0e19 13 \\u0e1a\\u0e17\\u0e04\\u0e27\\u0e32\\u0e21 \\u0e41\\u0e25\\u0e30\\u0e17\\u0e31\\u0e49\\u0e07 13 \\u0e1a\\u0e17\\u0e04\\u0e27\\u0e32\\u0e21\\u0e1c\\u0e48\\u0e32\\u0e19\\u0e40\\u0e01\\u0e13\\u0e11\\u0e4c\\u0e02\\u0e2d\\u0e07\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e42\\u0e08\\u0e41\\u0e2d\\u0e19\\u0e19\\u0e32\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e2a\\u0e4c \\u0e1c\\u0e25\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e31\\u0e07\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c\\u0e01\\u0e32\\u0e23\\u0e17\\u0e1a\\u0e17\\u0e27\\u0e19\\u0e27\\u0e23\\u0e23\\u0e13\\u0e01\\u0e23\\u0e23\\u0e21 \\u0e1e\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e40\\u0e01\\u0e34\\u0e14\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e02\\u0e32\\u0e14\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\\u0e43\\u0e19\\u0e27\\u0e31\\u0e22\\u0e1c\\u0e39\\u0e49\\u0e43\\u0e2b\\u0e0d\\u0e48\\u0e15\\u0e2d\\u0e19\\u0e15\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e2d\\u0e32\\u0e22\\u0e38\\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07 15-45 \\u0e1b\\u0e35 \\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e40\\u0e2a\\u0e35\\u0e48\\u0e22\\u0e07\\u0e17\\u0e35\\u0e48\\u0e1e\\u0e1a\\u0e41\\u0e1a\\u0e48\\u0e07\\u0e40\\u0e1b\\u0e47\\u0e19 2 \\u0e1b\\u0e23\\u0e30\\u0e40\\u0e20\\u0e17 \\u0e04\\u0e37\\u0e2d (1) \\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e17\\u0e35\\u0e48\\u0e44\\u0e21\\u0e48\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e1b\\u0e23\\u0e31\\u0e1a\\u0e40\\u0e1b\\u0e25\\u0e35\\u0e48\\u0e22\\u0e19\\u0e44\\u0e14\\u0e49 \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e2d\\u0e32\\u0e22\\u0e38 \\u0e40\\u0e1e\\u0e28 \\u0e1b\\u0e23\\u0e30\\u0e27\\u0e31\\u0e15\\u0e34\\u0e02\\u0e2d\\u0e07\\u0e1a\\u0e38\\u0e04\\u0e04\\u0e25\\u0e43\\u0e19\\u0e04\\u0e23\\u0e2d\\u0e1a\\u0e04\\u0e23\\u0e31\\u0e27 \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e42\\u0e23\\u0e04\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e41\\u0e25\\u0e30\\u0e2b\\u0e25\\u0e2d\\u0e14\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14 \\u0e41\\u0e25\\u0e30 (2) \\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e1b\\u0e23\\u0e31\\u0e1a\\u0e40\\u0e1b\\u0e25\\u0e35\\u0e48\\u0e22\\u0e19\\u0e44\\u0e14\\u0e49 \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e20\\u0e32\\u0e27\\u0e30\\u0e44\\u0e02\\u0e21\\u0e31\\u0e19\\u0e43\\u0e19\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e2a\\u0e39\\u0e07 \\u0e20\\u0e32\\u0e27\\u0e30\\u0e2d\\u0e49\\u0e27\\u0e19 \\u0e20\\u0e32\\u0e27\\u0e30\\u0e04\\u0e27\\u0e32\\u0e21\\u0e14\\u0e31\\u0e19\\u0e42\\u0e25\\u0e2b\\u0e34\\u0e15\\u0e2a\\u0e39\\u0e07 \\u0e40\\u0e1a\\u0e32\\u0e2b\\u0e27\\u0e32\\u0e19 \\u0e01\\u0e32\\u0e23\\u0e2a\\u0e39\\u0e1a\\u0e1a\\u0e38\\u0e2b\\u0e23\\u0e35\\u0e48 \\u0e01\\u0e32\\u0e23\\u0e14\\u0e37\\u0e48\\u0e21\\u0e41\\u0e2d\\u0e25\\u0e01\\u0e2d\\u0e2e\\u0e2d\\u0e25\\u0e4c \\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e2a\\u0e32\\u0e23\\u0e40\\u0e2a\\u0e1e\\u0e15\\u0e34\\u0e14 \\u0e44\\u0e14\\u0e49\\u0e41\\u0e01\\u0e48 \\u0e41\\u0e2d\\u0e21\\u0e40\\u0e1f\\u0e15\\u0e32\\u0e21\\u0e35\\u0e19 \\u0e01\\u0e31\\u0e0d\\u0e0a\\u0e32 \\u0e01\\u0e32\\u0e23\\u0e44\\u0e21\\u0e48\\u0e2d\\u0e2d\\u0e01\\u0e01\\u0e33\\u0e25\\u0e31\\u0e07\\u0e01\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e17\\u0e32\\u0e19\\u0e2d\\u0e32\\u0e2b\\u0e32\\u0e23\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e44\\u0e02\\u0e21\\u0e31\\u0e19\\u0e2a\\u0e39\\u0e07 \\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e17\\u0e32\\u0e19\\u0e1c\\u0e31\\u0e01\\u0e1c\\u0e25\\u0e44\\u0e21\\u0e49\\u0e19\\u0e49\\u0e2d\\u0e22 \\u0e42\\u0e2e\\u0e42\\u0e21\\u0e0a\\u0e35\\u0e2a\\u0e40\\u0e17\\u0e2d\\u0e35\\u0e19\\u0e43\\u0e19\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e2a\\u0e39\\u0e07 \\u0e41\\u0e25\\u0e30\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e04\\u0e23\\u0e35\\u0e22\\u0e14 \\u0e2a\\u0e23\\u0e38\\u0e1b: \\u0e1c\\u0e25\\u0e01\\u0e32\\u0e23\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32\\u0e04\\u0e23\\u0e31\\u0e49\\u0e07\\u0e19\\u0e35\\u0e49\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e43\\u0e0a\\u0e49\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e10\\u0e32\\u0e19\\u0e2a\\u0e33\\u0e2b\\u0e23\\u0e31\\u0e1a\\u0e1a\\u0e38\\u0e04\\u0e25\\u0e32\\u0e01\\u0e23\\u0e14\\u0e49\\u0e32\\u0e19\\u0e2a\\u0e38\\u0e02\\u0e20\\u0e32\\u0e1e\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2a\\u0e23\\u0e34\\u0e21\\u0e2a\\u0e38\\u0e02\\u0e20\\u0e32\\u0e1e\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e1b\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e19\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e40\\u0e2a\\u0e35\\u0e48\\u0e22\\u0e07\\u0e17\\u0e35\\u0e48\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e02\\u0e32\\u0e14\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\\u0e43\\u0e19\\u0e27\\u0e31\\u0e22\\u0e1c\\u0e39\\u0e49\\u0e43\\u0e2b\\u0e0d\\u0e48\\u0e15\\u0e2d\\u0e19\\u0e15\\u0e49\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e28\\u0e36\\u0e01\\u0e29\\u0e32\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2a\\u0e31\\u0e21\\u0e1e\\u0e31\\u0e19\\u0e18\\u0e4c\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e31\\u0e08\\u0e08\\u0e31\\u0e22\\u0e14\\u0e31\\u0e07\\u0e01\\u0e25\\u0e48\\u0e32\\u0e27\\u0e02\\u0e49\\u0e32\\u0e07\\u0e15\\u0e49\\u0e19\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e40\\u0e01\\u0e34\\u0e14\\u0e20\\u0e32\\u0e27\\u0e30\\u0e01\\u0e25\\u0e49\\u0e32\\u0e21\\u0e40\\u0e19\\u0e37\\u0e49\\u0e2d\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e02\\u0e32\\u0e14\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e14\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\\u0e43\\u0e19\\u0e27\\u0e31\\u0e22\\u0e1c\\u0e39\\u0e49\\u0e43\\u0e2b\\u0e0d\\u0e48\\u0e15\\u0e2d\\u0e19\\u0e15\\u0e49\\u0e19\\u0e15\\u0e48\\u0e2d\\u0e44\\u0e1b\\r\\n\\r\\n\\u0e17\\u0e35\\u0e48\\u0e21\\u0e32: https:\\/\\/he02.tci-thaijo.org\\/index.php\\/nur-psu\\/issue\\/view\\/17424\",\"research_name\":\"\\u0e17\\u0e34\\u0e1e\\u0e22\\u0e4c\\u0e2a\\u0e38\\u0e14\\u0e32 \\u0e1e\\u0e23\\u0e2b\\u0e21\\u0e14\\u0e19\\u0e15\\u0e23\\u0e35 \\u0e41\\u0e25\\u0e30\\u0e08\\u0e34\\u0e19\\u0e15\\u0e19\\u0e32 \\u0e14\\u0e33\\u0e40\\u0e01\\u0e25\\u0e35\\u0e49\\u0e22\\u0e07\",\"create_date\":\"2022-05-06\",\"create_by_userid\":\"3\",\"files\":\".\\/assets\\/uploads\\/research\\/2565\\/01431e519b8271da9822f65738fb602c.pdf\"}', 3, '2023-05-07 08:19:39', NULL);
INSERT INTO `tb_ci_log_delete` (`log_id`, `log_del_remark`, `log_table_name`, `log_table_pk_name`, `log_table_pk_value`, `log_del_condition`, `log_record_data`, `create_user_id`, `create_datetime`, `log_login_id`) VALUES
(94, 'ไม่ใช้', 'cms_faq', 'cms_faq_id', '2', 'cms_faq.cms_faq_id = 2', '{\"cms_faq_id\":\"2\",\"cms_faq_title\":\"\\u0e23\\u0e30\\u0e1a\\u0e1a OHCA-Thailand\",\"faq_detail\":\"OHCA-Thailand \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e08\\u0e31\\u0e14\\u0e01\\u0e32\\u0e23\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e17\\u0e35\\u0e48\\u0e1b\\u0e25\\u0e2d\\u0e14\\u0e20\\u0e31\\u0e22\\u0e41\\u0e25\\u0e30\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e04\\u0e27\\u0e32\\u0e21\\u0e25\\u0e31\\u0e1a\\u0e17\\u0e35\\u0e48\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e43\\u0e2b\\u0e49\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19 EMS \\u0e41\\u0e25\\u0e30\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e2a\\u0e32\\u0e21\\u0e32\\u0e23\\u0e16\\u0e15\\u0e23\\u0e27\\u0e08\\u0e2a\\u0e2d\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e34\\u0e17\\u0e18\\u0e34\\u0e20\\u0e32\\u0e1e\\u0e01\\u0e32\\u0e23\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1e\\u0e27\\u0e01\\u0e40\\u0e02\\u0e32\\u0e41\\u0e25\\u0e30\\u0e40\\u0e1b\\u0e23\\u0e35\\u0e22\\u0e1a\\u0e40\\u0e17\\u0e35\\u0e22\\u0e1a\\u0e15\\u0e31\\u0e27\\u0e40\\u0e2d\\u0e07\\u0e01\\u0e31\\u0e1a\\u0e40\\u0e01\\u0e13\\u0e11\\u0e4c\\u0e21\\u0e32\\u0e15\\u0e23\\u0e10\\u0e32\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e08\\u0e31\\u0e07\\u0e2b\\u0e27\\u0e31\\u0e14\\u0e41\\u0e25\\u0e30\\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28 \\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19\\u0e41\\u0e25\\u0e30\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 EMS \\u0e43\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e40\\u0e08\\u0e49\\u0e32\\u0e02\\u0e2d\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e02\\u0e2d\\u0e07\\u0e15\\u0e19\\u0e40\\u0e2d\\u0e07 OHCA-Thailand \\u0e21\\u0e38\\u0e48\\u0e07\\u0e21\\u0e31\\u0e48\\u0e19\\u0e17\\u0e35\\u0e48\\u0e08\\u0e30\\u0e23\\u0e31\\u0e01\\u0e29\\u0e32\\u0e04\\u0e27\\u0e32\\u0e21\\u0e25\\u0e31\\u0e1a\\u0e02\\u0e2d\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19 EMS \\u0e41\\u0e25\\u0e30\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\"}', 3, '2023-05-07 08:32:04', NULL),
(95, 'ไม่ใช้', 'cms_faq', 'cms_faq_id', '3', 'cms_faq.cms_faq_id = 3', '{\"cms_faq_id\":\"3\",\"cms_faq_title\":\"\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19\",\"faq_detail\":\"\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e40\\u0e09\\u0e35\\u0e22\\u0e1a\\u0e1e\\u0e25\\u0e31\\u0e19 (Cardiac arrest) \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e20\\u0e32\\u0e27\\u0e30\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e35\\u0e48\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e44\\u0e14\\u0e49\\u0e23\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e01\\u0e29\\u0e32\\u0e40\\u0e23\\u0e48\\u0e07\\u0e14\\u0e48\\u0e27\\u0e19 \\u0e41\\u0e25\\u0e30\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e32\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e01\\u0e32\\u0e23\\u0e40\\u0e2a\\u0e35\\u0e22\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e17\\u0e35\\u0e48\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d \\u0e42\\u0e14\\u0e22\\u0e40\\u0e09\\u0e1e\\u0e32\\u0e30\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 (Out of hospital cardiac arrest: OHCA) \\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 \\u0e08\\u0e30\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e1a\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2a\\u0e33\\u0e40\\u0e23\\u0e47\\u0e08\\u0e44\\u0e14\\u0e49 \\u0e15\\u0e49\\u0e2d\\u0e07\\u0e2d\\u0e32\\u0e28\\u0e31\\u0e22\\u0e01\\u0e32\\u0e23\\u0e17\\u0e33\\u0e07\\u0e32\\u0e19\\u0e40\\u0e0a\\u0e37\\u0e48\\u0e2d\\u0e21\\u0e42\\u0e22\\u0e07\\u0e41\\u0e25\\u0e30\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e32\\u0e19\\u0e07\\u0e32\\u0e19\\u0e01\\u0e31\\u0e19\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e21\\u0e35\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e17\\u0e35\\u0e48\\u0e02\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e31\\u0e1a\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e \\u0e15\\u0e31\\u0e49\\u0e07\\u0e41\\u0e15\\u0e48\\u0e01\\u0e32\\u0e23\\u0e41\\u0e08\\u0e49\\u0e07\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e02\\u0e2d\\u0e04\\u0e27\\u0e32\\u0e21\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e40\\u0e2b\\u0e25\\u0e37\\u0e2d\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19 (Early detection and early access) \\u0e01\\u0e32\\u0e23\\u0e17\\u0e33 Bystander CPR \\u0e02\\u0e2d\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1e\\u0e1a\\u0e40\\u0e2b\\u0e47\\u0e19\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e04\\u0e19\\u0e41\\u0e23\\u0e01\\u0e01\\u0e48\\u0e2d\\u0e19\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e\\u0e08\\u0e30\\u0e21\\u0e32\\u0e16\\u0e36\\u0e07 (Early CPR) \\u0e01\\u0e32\\u0e23\\u0e01\\u0e23\\u0e30\\u0e15\\u0e38\\u0e49\\u0e19\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e23\\u0e27\\u0e14\\u0e40\\u0e23\\u0e47\\u0e27\\u0e43\\u0e19\\u0e40\\u0e27\\u0e25\\u0e32\\u0e17\\u0e35\\u0e48\\u0e40\\u0e2b\\u0e21\\u0e32\\u0e30\\u0e2a\\u0e21 (Early defibrillation) \\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e0a\\u0e48\\u0e27\\u0e22\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e02\\u0e31\\u0e49\\u0e19\\u0e2a\\u0e39\\u0e07\\u0e02\\u0e2d\\u0e07\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e01\\u0e39\\u0e49\\u0e0a\\u0e35\\u0e1e (Early ALS) \\u0e08\\u0e36\\u0e07\\u0e08\\u0e30\\u0e40\\u0e01\\u0e34\\u0e14\\u0e25\\u0e39\\u0e01\\u0e42\\u0e0b\\u0e48\\u0e02\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e14\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15 (Chain of survival)\"}', 3, '2023-05-07 08:32:08', NULL),
(96, 'ไม่ใช้', 'cms_faq', 'cms_faq_id', '4', 'cms_faq.cms_faq_id = 4', '{\"cms_faq_id\":\"4\",\"cms_faq_title\":\"\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\",\"faq_detail\":\"\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 (Emergency Medical Service: EMS) \\u0e16\\u0e37\\u0e2d\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e19\\u0e42\\u0e22\\u0e1a\\u0e32\\u0e22\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e17\\u0e32\\u0e07\\u0e2a\\u0e38\\u0e02\\u0e20\\u0e32\\u0e1e\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e44\\u0e17\\u0e22 \\u0e40\\u0e1e\\u0e23\\u0e32\\u0e30\\u0e01\\u0e32\\u0e23\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e32\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e02\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e40\\u0e2a\\u0e35\\u0e22\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e2d\\u0e31\\u0e19\\u0e14\\u0e31\\u0e1a\\u0e15\\u0e49\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e01\\u0e32\\u0e23\\u0e43\\u0e2b\\u0e49\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e2a\\u0e34\\u0e48\\u0e07\\u0e2a\\u0e33\\u0e04\\u0e31\\u0e0d\\u0e41\\u0e25\\u0e30\\u0e21\\u0e35\\u0e04\\u0e27\\u0e32\\u0e21\\u0e08\\u0e33\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e25\\u0e14\\u0e04\\u0e27\\u0e32\\u0e21\\u0e2a\\u0e39\\u0e0d\\u0e40\\u0e2a\\u0e35\\u0e22\\u0e08\\u0e32\\u0e01\\u0e01\\u0e32\\u0e23\\u0e40\\u0e01\\u0e34\\u0e14\\u0e2d\\u0e38\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e40\\u0e2b\\u0e15\\u0e38\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e32\\u0e07\\u0e2a\\u0e32\\u0e18\\u0e32\\u0e23\\u0e13\\u0e2a\\u0e38\\u0e02 \\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e1b\\u0e23\\u0e30\\u0e0a\\u0e32\\u0e0a\\u0e19\\u0e40\\u0e02\\u0e49\\u0e32\\u0e16\\u0e36\\u0e07\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e38\\u0e02\\u0e20\\u0e32\\u0e1e\\u0e17\\u0e35\\u0e48\\u0e08\\u0e33\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e41\\u0e25\\u0e30\\u0e40\\u0e23\\u0e48\\u0e07\\u0e14\\u0e48\\u0e27\\u0e19\\u0e44\\u0e14\\u0e49\\u0e2d\\u0e22\\u0e48\\u0e32\\u0e07\\u0e1b\\u0e25\\u0e2d\\u0e14\\u0e20\\u0e31\\u0e22 \\u0e0b\\u0e36\\u0e48\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e08\\u0e31\\u0e14\\u0e43\\u0e2b\\u0e49\\u0e21\\u0e35\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e23\\u0e31\\u0e1a\\u0e41\\u0e08\\u0e49\\u0e07\\u0e40\\u0e2b\\u0e15\\u0e38 \\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e31\\u0e48\\u0e07\\u0e01\\u0e32\\u0e23\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e01\\u0e32\\u0e23 \\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e43\\u0e2b\\u0e49\\u0e01\\u0e32\\u0e23\\u0e14\\u0e39\\u0e41\\u0e25\\u0e1c\\u0e39\\u0e49\\u0e40\\u0e08\\u0e47\\u0e1a\\u0e1b\\u0e48\\u0e27\\u0e22 \\u0e13 \\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e34\\u0e14\\u0e40\\u0e2b\\u0e15\\u0e38 \\u0e43\\u0e19\\u0e23\\u0e30\\u0e2b\\u0e27\\u0e48\\u0e32\\u0e07\\u0e19\\u0e33\\u0e2a\\u0e48\\u0e07\\u0e41\\u0e25\\u0e30\\u0e01\\u0e32\\u0e23\\u0e19\\u0e33\\u0e2a\\u0e48\\u0e07\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 \\u0e42\\u0e14\\u0e22\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19 \\u0e21\\u0e35\\u0e23\\u0e30\\u0e1a\\u0e1a ITEMS \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e10\\u0e32\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e1c\\u0e48\\u0e32\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e48\\u0e32\\u0e22\\u0e2d\\u0e34\\u0e19\\u0e40\\u0e15\\u0e2d\\u0e23\\u0e4c\\u0e40\\u0e19\\u0e47\\u0e15\\u0e02\\u0e2d\\u0e07\\u0e23\\u0e30\\u0e1a\\u0e1a\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e17\\u0e35\\u0e48\\u0e43\\u0e0a\\u0e49\\u0e2a\\u0e33\\u0e2b\\u0e23\\u0e31\\u0e1a\\u0e40\\u0e01\\u0e47\\u0e1a\\u0e1a\\u0e31\\u0e19\\u0e17\\u0e36\\u0e01\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e15\\u0e48\\u0e32\\u0e07\\u0e46 \\u0e40\\u0e2b\\u0e25\\u0e48\\u0e32\\u0e19\\u0e31\\u0e49\\u0e19 \\u0e40\\u0e1e\\u0e35\\u0e22\\u0e07\\u0e41\\u0e15\\u0e48\\u0e02\\u0e32\\u0e14\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e23\\u0e32\\u0e22\\u0e25\\u0e30\\u0e40\\u0e2d\\u0e35\\u0e22\\u0e14\\u0e40\\u0e09\\u0e1e\\u0e32\\u0e30\\u0e40\\u0e08\\u0e32\\u0e30\\u0e08\\u0e07\\u0e14\\u0e49\\u0e32\\u0e19\\u0e2a\\u0e38\\u0e02\\u0e20\\u0e32\\u0e1e\\u0e02\\u0e2d\\u0e07\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 (Out of Hospital cardiac arrest: OHCA) \\u0e2a\\u0e48\\u0e07\\u0e1c\\u0e25\\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e02\\u0e32\\u0e14\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e2a\\u0e32\\u0e23\\u0e2a\\u0e19\\u0e40\\u0e17\\u0e28\\u0e17\\u0e35\\u0e48\\u0e19\\u0e33\\u0e21\\u0e32\\u0e40\\u0e1b\\u0e47\\u0e19\\u0e41\\u0e19\\u0e27\\u0e17\\u0e32\\u0e07\\u0e43\\u0e19\\u0e01\\u0e32\\u0e23\\u0e01\\u0e33\\u0e2b\\u0e19\\u0e14\\u0e41\\u0e19\\u0e27\\u0e17\\u0e32\\u0e07\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e0f\\u0e34\\u0e1a\\u0e31\\u0e15\\u0e34\\u0e07\\u0e32\\u0e19\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1e\\u0e17\\u0e22\\u0e4c\\u0e09\\u0e38\\u0e01\\u0e40\\u0e09\\u0e34\\u0e19\\u0e43\\u0e2b\\u0e49\\u0e21\\u0e35\\u0e1b\\u0e23\\u0e30\\u0e2a\\u0e34\\u0e17\\u0e18\\u0e34\\u0e20\\u0e32\\u0e1e \\u0e17\\u0e33\\u0e43\\u0e2b\\u0e49\\u0e40\\u0e01\\u0e34\\u0e14\\u0e1c\\u0e25\\u0e25\\u0e31\\u0e1e\\u0e18\\u0e4c\\u0e17\\u0e35\\u0e48\\u0e14\\u0e35\\u0e15\\u0e48\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e14\\u0e39\\u0e41\\u0e25\\u0e41\\u0e25\\u0e30\\u0e19\\u0e33\\u0e44\\u0e1b\\u0e2a\\u0e39\\u0e48\\u0e01\\u0e32\\u0e23\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e42\\u0e2d\\u0e01\\u0e32\\u0e2a\\u0e01\\u0e32\\u0e23\\u0e23\\u0e2d\\u0e14\\u0e0a\\u0e35\\u0e27\\u0e34\\u0e15\\u0e43\\u0e19\\u0e1c\\u0e39\\u0e49\\u0e1b\\u0e48\\u0e27\\u0e22\\u0e17\\u0e35\\u0e48\\u0e40\\u0e01\\u0e34\\u0e14\\u0e20\\u0e32\\u0e27\\u0e30\\u0e2b\\u0e31\\u0e27\\u0e43\\u0e08\\u0e2b\\u0e22\\u0e38\\u0e14\\u0e40\\u0e15\\u0e49\\u0e19\\u0e19\\u0e2d\\u0e01\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25\\u0e44\\u0e14\\u0e49\"}', 3, '2023-05-07 08:32:14', NULL),
(97, 'ไม่ใช้', 'cms_faq', 'cms_faq_id', '7', 'cms_faq.cms_faq_id = 7', '{\"cms_faq_id\":\"7\",\"cms_faq_title\":\"\\u0e19\\u0e42\\u0e22\\u0e1a\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e23\\u0e48\\u0e27\\u0e21\\u0e01\\u0e31\\u0e19\",\"faq_detail\":\"\\u0e19\\u0e31\\u0e01\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e17\\u0e35\\u0e48\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e01\\u0e32\\u0e23\\u0e27\\u0e34\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e42\\u0e14\\u0e22\\u0e23\\u0e27\\u0e21\\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e08\\u0e31\\u0e07\\u0e2b\\u0e27\\u0e31\\u0e14 \\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e23\\u0e30\\u0e14\\u0e31\\u0e1a\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e17\\u0e28\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e2a\\u0e48\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e44\\u0e1b\\u0e22\\u0e31\\u0e07\\u0e04\\u0e13\\u0e30\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e41\\u0e1a\\u0e48\\u0e07\\u0e1b\\u0e31\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e02\\u0e2d\\u0e07 OHCA-Thailand  \\u0e04\\u0e13\\u0e30\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e1b\\u0e23\\u0e30\\u0e40\\u0e21\\u0e34\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e17\\u0e32\\u0e07\\u0e08\\u0e23\\u0e34\\u0e22\\u0e18\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e43\\u0e19\\u0e21\\u0e19\\u0e38\\u0e29\\u0e22\\u0e4c \\u0e41\\u0e25\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e04\\u0e33\\u0e41\\u0e19\\u0e30\\u0e19\\u0e33\\u0e41\\u0e01\\u0e48\\u0e1c\\u0e39\\u0e49\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22 \\u0e2b\\u0e32\\u0e01\\u0e04\\u0e13\\u0e30\\u0e01\\u0e23\\u0e23\\u0e21\\u0e01\\u0e32\\u0e23\\u0e2d\\u0e19\\u0e38\\u0e21\\u0e31\\u0e15\\u0e34\\u0e02\\u0e49\\u0e2d\\u0e40\\u0e2a\\u0e19\\u0e2d OHCA-Thailand \\u0e08\\u0e30\\u0e43\\u0e2b\\u0e49\\u0e0a\\u0e38\\u0e14\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e17\\u0e35\\u0e48\\u0e44\\u0e21\\u0e48\\u0e23\\u0e30\\u0e1a\\u0e38\\u0e15\\u0e31\\u0e27\\u0e15\\u0e19\\u0e41\\u0e01\\u0e48\\u0e1c\\u0e39\\u0e49\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22 \\u0e2b\\u0e25\\u0e31\\u0e07\\u0e08\\u0e32\\u0e01\\u0e17\\u0e35\\u0e48\\u0e1c\\u0e39\\u0e49\\u0e40\\u0e02\\u0e35\\u0e22\\u0e19\\u0e2b\\u0e25\\u0e31\\u0e01\\u0e44\\u0e14\\u0e49\\u0e23\\u0e31\\u0e1a\\u0e01\\u0e32\\u0e23\\u0e2d\\u0e19\\u0e38\\u0e21\\u0e31\\u0e15\\u0e34\\u0e08\\u0e32\\u0e01 IRB (institutional review board) \\u0e43\\u0e19\\u0e1e\\u0e37\\u0e49\\u0e19\\u0e17\\u0e35\\u0e48\\u0e08\\u0e32\\u0e01\\u0e2a\\u0e16\\u0e32\\u0e1a\\u0e31\\u0e19\\u0e02\\u0e2d\\u0e07\\u0e15\\u0e19 \\u0e23\\u0e32\\u0e22\\u0e07\\u0e32\\u0e19\\u0e01\\u0e32\\u0e23\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e2a\\u0e34\\u0e48\\u0e07\\u0e1e\\u0e34\\u0e21\\u0e1e\\u0e4c\\u0e43\\u0e14 \\u0e46 \\u0e08\\u0e30\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e44\\u0e21\\u0e48\\u0e41\\u0e22\\u0e01\\u0e23\\u0e30\\u0e1a\\u0e38\\u0e2b\\u0e19\\u0e48\\u0e27\\u0e22\\u0e07\\u0e32\\u0e19\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e42\\u0e23\\u0e07\\u0e1e\\u0e22\\u0e32\\u0e1a\\u0e32\\u0e25 EMS \\u0e17\\u0e35\\u0e48\\u0e40\\u0e02\\u0e49\\u0e32\\u0e23\\u0e48\\u0e27\\u0e21\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e17\\u0e35\\u0e48\\u0e21\\u0e35\\u0e2a\\u0e48\\u0e27\\u0e19\\u0e23\\u0e48\\u0e27\\u0e21 \\u0e1c\\u0e39\\u0e49\\u0e27\\u0e34\\u0e08\\u0e31\\u0e22\\u0e15\\u0e49\\u0e2d\\u0e07\\u0e25\\u0e07\\u0e19\\u0e32\\u0e21\\u0e43\\u0e19\\u0e02\\u0e49\\u0e2d\\u0e15\\u0e01\\u0e25\\u0e07\\u0e01\\u0e32\\u0e23\\u0e43\\u0e0a\\u0e49\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e17\\u0e35\\u0e48\\u0e23\\u0e30\\u0e1a\\u0e38\\u0e27\\u0e48\\u0e32\\u0e08\\u0e30\\u0e44\\u0e21\\u0e48\\u0e41\\u0e1a\\u0e48\\u0e07\\u0e1b\\u0e31\\u0e19\\u0e0a\\u0e38\\u0e14\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e02\\u0e22\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e27\\u0e34\\u0e40\\u0e04\\u0e23\\u0e32\\u0e30\\u0e2b\\u0e4c\\u0e40\\u0e01\\u0e34\\u0e19\\u0e02\\u0e2d\\u0e1a\\u0e40\\u0e02\\u0e15\\u0e02\\u0e2d\\u0e07\\u0e02\\u0e49\\u0e2d\\u0e40\\u0e2a\\u0e19\\u0e2d \\u0e15\\u0e49\\u0e2d\\u0e07\\u0e15\\u0e34\\u0e14\\u0e15\\u0e32\\u0e21\\u0e02\\u0e49\\u0e2d\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e1a\\u0e17\\u0e04\\u0e31\\u0e14\\u0e22\\u0e48\\u0e2d\\u0e2b\\u0e23\\u0e37\\u0e2d\\u0e01\\u0e32\\u0e23\\u0e19\\u0e33\\u0e40\\u0e2a\\u0e19\\u0e2d\\u0e14\\u0e49\\u0e27\\u0e22\\u0e01\\u0e32\\u0e23\\u0e2a\\u0e48\\u0e07\\u0e20\\u0e32\\u0e22\\u0e43\\u0e19\\u0e2a\\u0e32\\u0e21\\u0e40\\u0e14\\u0e37\\u0e2d\\u0e19\\u0e19\\u0e31\\u0e1a\\u0e08\\u0e32\\u0e01\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48\\u0e43\\u0e2b\\u0e49\\u0e0a\\u0e38\\u0e14\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25 \\u0e15\\u0e49\\u0e2d\\u0e07\\u0e2a\\u0e48\\u0e07\\u0e40\\u0e2d\\u0e01\\u0e2a\\u0e32\\u0e23\\u0e40\\u0e1e\\u0e37\\u0e48\\u0e2d\\u0e15\\u0e23\\u0e27\\u0e08\\u0e2a\\u0e2d\\u0e1a\\u0e20\\u0e32\\u0e22\\u0e43\\u0e19\\u0e40\\u0e01\\u0e49\\u0e32\\u0e40\\u0e14\\u0e37\\u0e2d\\u0e19\\u0e19\\u0e31\\u0e1a\\u0e08\\u0e32\\u0e01\\u0e27\\u0e31\\u0e19\\u0e17\\u0e35\\u0e48\\u0e43\\u0e2b\\u0e49\\u0e0a\\u0e38\\u0e14\\u0e02\\u0e49\\u0e2d\\u0e21\\u0e39\\u0e25\"}', 3, '2023-05-07 08:32:25', NULL),
(98, 'ไม่ใช้', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '8', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 8', '{\"cms_cardiac_arrest_id\":\"8\",\"image\":\".\\/assets\\/uploads\\/cms_cardiac_arrest_slide\\/2566\\/dd7aa0d88c4059fb295f3668d00685ad.png\"}', 3, '2023-05-07 11:42:02', NULL),
(99, 'retet', 'tb_members', 'userid', '10', 'tb_members.userid = 10', '{\"userid\":\"10\",\"username\":null,\"email\":\"chetsadakon.jen@mahidol.edu\",\"password\":\"$2y$11$ubxqcv01W8weKkRjdftPF.B57kDHJGVlD0\\/ef2n1K8sQltZ7j15HC\",\"prefix\":null,\"firstname\":\"Mr. Chetsadakon\",\"lastname\":\"Jenpanitpong\",\"birthday\":null,\"sex\":null,\"level\":\"1\",\"tel_number\":null,\"line_id\":null,\"department_id\":null,\"photo\":null,\"unsubscribe\":\"0\",\"void\":\"0\",\"referral_code\":\"CHE6JR526G0L480\",\"create_datetime\":\"2022-10-26 21:20:13\",\"create_user_id\":null,\"modify_datetime\":\"2022-10-26 21:20:49\",\"modify_user_id\":null}', 3, '2023-07-17 11:53:42', NULL),
(100, 'ข้อมุลไม่ถูกต้อง', 'tb_members', 'userid', '4', 'tb_members.userid = 4', '{\"userid\":\"4\",\"username\":\"1001\",\"email\":\"user4@local.com\",\"password\":\"$2y$11$7FDP4nR6uC8LdfUZ2PAlOeG5hOpERqxfeElUkZHSSEZUl52N8e.zG\",\"prefix\":\"1\",\"firstname\":\"PARITAD1001\",\"lastname\":\"LAST1001\",\"birthday\":null,\"sex\":null,\"level\":\"1\",\"tel_number\":\"-\",\"line_id\":\"-\",\"department_id\":\"3\",\"photo\":\".\\/assets\\/uploads\\/members\\/2565\\/237635e8067c25e33887ec36e542f9c7.png\",\"unsubscribe\":\"0\",\"void\":\"0\",\"referral_code\":null,\"create_datetime\":\"2019-07-24 23:02:54\",\"create_user_id\":\"3\",\"modify_datetime\":\"2022-05-10 19:58:21\",\"modify_user_id\":\"4\"}', 3, '2023-07-17 11:54:01', NULL),
(101, 'ข้อมุลไม่ถูกต้อง', 'tb_members', 'userid', '8', 'tb_members.userid = 8', '{\"userid\":\"8\",\"username\":null,\"email\":\"Okhongtor@gmail.com\",\"password\":\"$2y$11$9TntU4hz2p9w0X.OP19Sw.qeYFNX0EOPieWOsKgj86\\/f1odr\\/pBBG\",\"prefix\":null,\"firstname\":\"Orrawan\",\"lastname\":\"Khongtor\",\"birthday\":null,\"sex\":null,\"level\":\"1\",\"tel_number\":null,\"line_id\":null,\"department_id\":null,\"photo\":null,\"unsubscribe\":\"0\",\"void\":\"0\",\"referral_code\":\"OKH69U3S9BUSOL0\",\"create_datetime\":\"2022-04-26 11:51:59\",\"create_user_id\":null,\"modify_datetime\":\"2022-04-26 11:53:45\",\"modify_user_id\":null}', 3, '2023-07-17 11:54:07', NULL),
(102, 'ข้อมุลไม่ถูกต้อง', 'tb_members', 'userid', '9', 'tb_members.userid = 9', '{\"userid\":\"9\",\"username\":null,\"email\":\"chetsadakon.jen@mahidol.ac.th\",\"password\":\"$2y$11$UsPGVoXvSXziDyN8nwgzUOCyamLz05Djd\\/CZisZxkmXwihk78I2YK\",\"prefix\":null,\"firstname\":\"\\u0e40\\u0e08\\u0e29\\u0e0e\\u0e32\\u0e01\\u0e23\",\"lastname\":\"\\u0e40\\u0e08\\u0e19\\u0e1e\\u0e32\\u0e13\\u0e34\\u0e0a\\u0e1e\\u0e07\\u0e28\\u0e4c\",\"birthday\":null,\"sex\":null,\"level\":\"1\",\"tel_number\":null,\"line_id\":null,\"department_id\":null,\"photo\":null,\"unsubscribe\":\"0\",\"void\":\"0\",\"referral_code\":\"CHE25OI6CSBHDG0\",\"create_datetime\":\"2022-10-22 19:17:21\",\"create_user_id\":null,\"modify_datetime\":\"2022-10-26 21:17:53\",\"modify_user_id\":null}', 3, '2023-07-17 11:54:12', NULL),
(103, 'ssdsd', 'tb_members', 'userid', '11', 'tb_members.userid = 11', '{\"userid\":\"11\",\"username\":\"education\",\"email\":\"education@local.com\",\"password\":\"$2y$11$ufhMNQO3t2KxumMd9e6acecB1EiYa5Sjj.\\/X37XUzXX7624DhwMgG\",\"prefix\":\"\\u0e19\\u0e32\\u0e22\",\"firstname\":\"education\",\"lastname\":\"education\",\"birthday\":null,\"sex\":\"1\",\"level\":\"4\",\"tel_number\":\"0123456789\",\"line_id\":\"-\",\"department_id\":null,\"photo\":\".\\/assets\\/uploads\\/users\\/2566\\/9713e0842d5a0ec8c2e7e78dd8365426.png\",\"unsubscribe\":\"0\",\"void\":\"0\",\"referral_code\":null,\"create_datetime\":null,\"create_user_id\":null,\"modify_datetime\":null,\"modify_user_id\":null}', 3, '2023-09-04 08:26:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ci_log_history`
--

CREATE TABLE `tb_ci_log_history` (
  `log_id` int(11) NOT NULL,
  `log_edit_user` varchar(30) DEFAULT NULL COMMENT 'อ้างอิงตาราง User',
  `log_edit_datetime` datetime DEFAULT NULL COMMENT 'เมื่อไหร่',
  `log_edit_remark` varchar(50) DEFAULT NULL COMMENT 'หมายเหตุ (ต้องระบุ)',
  `log_edit_table` varchar(50) DEFAULT NULL COMMENT 'ที่ตารางไหน',
  `log_edit_table_pk_name` varchar(50) DEFAULT NULL COMMENT 'PK ฟิลด์',
  `log_edit_table_pk_value` varchar(15) DEFAULT NULL COMMENT 'PK ข้อมูล',
  `log_edit_condition` varchar(100) DEFAULT NULL COMMENT 'เก็บเงื่อนไขการอัพเดต',
  `log_login_id` int(11) DEFAULT NULL COMMENT 'อ้างอิงการ ตาราง Login'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='เก็บสถานะการแก้ไข';

--
-- Dumping data for table `tb_ci_log_history`
--

INSERT INTO `tb_ci_log_history` (`log_id`, `log_edit_user`, `log_edit_datetime`, `log_edit_remark`, `log_edit_table`, `log_edit_table_pk_name`, `log_edit_table_pk_value`, `log_edit_condition`, `log_login_id`) VALUES
(1, '3', '2022-04-06 12:54:30', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '7', 'table_name = \'service_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'', NULL),
(2, '3', '2022-04-06 12:54:48', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '7', 'table_name = \'service_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'', NULL),
(3, '3', '2022-04-06 12:56:42', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '7', 'table_name = \'service_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'', NULL),
(4, '3', '2022-04-06 13:00:07', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '6', 'table_name = \'services\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Services\'\r\n', NULL),
(5, '3', '2022-04-06 13:21:06', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '9', 'table_name = \'tb_members\' \r\n					AND module_name = \'users\'\r\n					AND controller_name = \'Users\'\r\n				', NULL),
(6, '3', '2022-04-06 13:25:03', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '9', 'table_name = \'tb_members\' \r\n					AND module_name = \'users\'\r\n					AND controller_name = \'Users\'\r\n				', NULL),
(7, '3', '2022-04-06 13:26:14', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '9', 'table_name = \'tb_members\' \r\n					AND module_name = \'users\'\r\n					AND controller_name = \'Users\'\r\n				', NULL),
(8, '3', '2022-04-06 13:26:54', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '9', 'table_name = \'tb_members\' \r\n					AND module_name = \'users\'\r\n					AND controller_name = \'Users\'\r\n				', NULL),
(9, '8', '2022-04-06 15:44:45', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '9', 'table_name = \'tb_members\' \r\n					AND module_name = \'users\'\r\n					AND controller_name = \'Users\'\r\n				', NULL),
(10, '8', '2022-04-06 17:25:57', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '11', 'table_name = \'service_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'', NULL),
(11, '8', '2022-04-06 17:29:38', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '13', 'table_name = \'patient_profile\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Pati', NULL),
(12, '8', '2022-04-06 17:31:46', 'ข้อมูลไม่ชัดเจน', 'patient_profile', 'patient_profile_id', '1', 'patient_profile.patient_profile_id = 1', NULL),
(13, '8', '2022-04-06 17:56:55', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '14', 'table_name = \'event_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Ev', NULL),
(14, '8', '2022-04-06 17:57:50', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '14', 'table_name = \'event_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Ev', NULL),
(15, '8', '2022-04-06 18:02:20', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '14', 'table_name = \'event_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Ev', NULL),
(16, '8', '2022-04-06 18:05:50', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '14', 'table_name = \'event_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Ev', NULL),
(17, '8', '2022-04-06 18:06:00', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '14', 'table_name = \'event_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Ev', NULL),
(18, '8', '2022-04-06 18:25:21', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '15', 'table_name = \'basic_resuscitation\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'', NULL),
(19, '8', '2022-04-06 19:53:41', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '16', 'table_name = \'treatment_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name =', NULL),
(20, '8', '2022-04-06 19:55:26', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '16', 'table_name = \'treatment_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name =', NULL),
(21, '8', '2022-04-06 19:56:27', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '16', 'table_name = \'treatment_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name =', NULL),
(22, '8', '2022-04-06 19:57:46', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '16', 'table_name = \'treatment_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name =', NULL),
(23, '8', '2022-04-06 19:58:25', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '16', 'table_name = \'treatment_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name =', NULL),
(24, '8', '2022-04-06 20:27:12', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '17', 'table_name = \'delivery_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = ', NULL),
(25, '8', '2022-04-06 20:29:19', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '17', 'table_name = \'delivery_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = ', NULL),
(26, '1', '2022-04-06 16:48:14', 'แก้ไขข้อมูล', 'service_information', 'service_information_id', '1', 'service_information.service_information_id = 1', NULL),
(27, '1', '2022-04-06 17:45:42', 'แก้ไขข้อมูล', 'time_distance', 'itme_distance_id', '1', 'time_distance.itme_distance_id = 1', NULL),
(28, '1', '2022-04-06 17:46:17', 'แก้ไขข้อมูล', 'time_distance', 'itme_distance_id', '1', 'time_distance.itme_distance_id = 1', NULL),
(29, '1', '2022-04-06 17:46:34', 'แก้ไขข้อมูล', 'time_distance', 'itme_distance_id', '1', 'time_distance.itme_distance_id = 1', NULL),
(30, '1', '2022-04-06 17:46:45', 'แก้ไขข้อมูล', 'time_distance', 'itme_distance_id', '1', 'time_distance.itme_distance_id = 1', NULL),
(31, '1', '2022-04-06 17:48:11', 'แก้ไขข้อมูล', 'time_distance', 'itme_distance_id', '1', 'time_distance.itme_distance_id = 1', NULL),
(32, '1', '2022-04-07 02:40:42', 'แก้ไขข้อมูล', 'service_information', 'service_information_id', '1', 'service_information.service_information_id = 1', NULL),
(33, '1', '2022-04-07 02:46:16', 'แก้ไขข้อมูล', 'time_distance', 'itme_distance_id', '4', 'time_distance.itme_distance_id = 4', NULL),
(34, '1', '2022-04-07 03:13:28', 'แก้ไขข้อมูล', 'time_distance', 'itme_distance_id', '4', 'time_distance.itme_distance_id = 4', NULL),
(35, '8', '2022-04-10 13:58:12', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '19', 'table_name = \'cms_posts\' \r\n					AND module_name = \'news\'\r\n					AND controller_name = \'News\'\r\n					AN', NULL),
(36, '8', '2022-04-10 13:59:32', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '19', 'table_name = \'cms_posts\' \r\n					AND module_name = \'news\'\r\n					AND controller_name = \'News\'\r\n					AN', NULL),
(37, '3', '2022-04-10 14:01:04', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '19', 'table_name = \'cms_posts\' \r\n					AND module_name = \'news\'\r\n					AND controller_name = \'News\'\r\n					AN', NULL),
(38, '3', '2022-04-10 14:02:12', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '19', 'table_name = \'cms_posts\' \r\n					AND module_name = \'news\'\r\n					AND controller_name = \'News\'\r\n					AN', NULL),
(39, '3', '2022-04-10 14:08:06', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '20', 'table_name = \'cms_slide\' \r\n					AND module_name = \'slides\'\r\n					AND controller_name = \'Slides\'\r\n			', NULL),
(40, '3', '2022-04-10 14:10:17', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '20', 'table_name = \'cms_slide\' \r\n					AND module_name = \'slides\'\r\n					AND controller_name = \'Slides\'\r\n			', NULL),
(41, '3', '2022-04-10 14:10:59', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '20', 'table_name = \'cms_slide\' \r\n					AND module_name = \'slides\'\r\n					AND controller_name = \'Slides\'\r\n			', NULL),
(42, '3', '2022-04-10 14:12:22', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '20', 'table_name = \'cms_slide\' \r\n					AND module_name = \'slides\'\r\n					AND controller_name = \'Slides\'\r\n			', NULL),
(43, '3', '2022-04-10 14:23:32', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '22', 'table_name = \'cms_ca_basic_info\' \r\n					AND module_name = \'cadiac_arrest\'\r\n					AND controller_name ', NULL),
(44, '3', '2022-04-10 15:06:28', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '23', 'table_name = \'cms_contact_us\' \r\n					AND module_name = \'contact_us\'\r\n					AND controller_name = \'Con', NULL),
(45, '8', '2022-04-10 18:10:23', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '24', 'table_name = \'cms_researchs\' \r\n					AND module_name = \'research\'\r\n					AND controller_name = \'Resear', NULL),
(46, '8', '2022-04-10 18:11:09', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '24', 'table_name = \'cms_researchs\' \r\n					AND module_name = \'research\'\r\n					AND controller_name = \'Resear', NULL),
(47, '3', '2022-04-10 18:15:02', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '24', 'table_name = \'cms_researchs\' \r\n					AND module_name = \'research\'\r\n					AND controller_name = \'Resear', NULL),
(48, '3', '2022-04-10 18:15:48', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '24', 'table_name = \'cms_researchs\' \r\n					AND module_name = \'research\'\r\n					AND controller_name = \'Resear', NULL),
(49, '4', '2022-04-18 01:38:43', 'ข้อมูลไม่ชัดเจน', 'patient_profile', 'patient_profile_id', '5', 'patient_profile.patient_profile_id = 5', NULL),
(50, '8', '2022-04-18 08:49:29', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '29', 'table_name = \'cms_ca_resuscitation\' \r\n					AND module_name = \'ca_resuscitation\'\r\n					AND controller', NULL),
(51, '8', '2022-04-18 10:55:03', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '25', 'table_name = \'cms_posts\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'News\'\r\n				', NULL),
(52, '3', '2022-04-18 10:55:28', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '25', 'table_name = \'cms_posts\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'News\'\r\n				', NULL),
(53, '3', '2022-04-18 10:57:33', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '25', 'table_name = \'cms_posts\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'News\'\r\n				', NULL),
(54, '3', '2022-04-18 10:58:23', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '26', 'table_name = \'cms_faq\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'Faq\'\r\n					AN', NULL),
(55, '3', '2022-04-18 10:58:34', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '26', 'table_name = \'cms_faq\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'Faq\'\r\n					AN', NULL),
(56, '3', '2022-04-18 11:11:02', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '27', 'table_name = \'cms_researchs\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'Researc', NULL),
(57, '3', '2022-04-18 11:12:02', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '27', 'table_name = \'cms_researchs\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'Researc', NULL),
(58, '3', '2022-04-18 06:15:13', 'ข้อมูลไม่ชัดเจน', 'cms_slide', 'cms_slide_id', '3', 'cms_slide.cms_slide_id = 3', NULL),
(59, '3', '2022-04-18 06:15:49', 'ข้อมูลไม่ชัดเจน', 'cms_slide', 'cms_slide_id', '4', 'cms_slide.cms_slide_id = 4', NULL),
(60, '3', '2022-04-18 06:16:04', 'ข้อมูลไม่ชัดเจน', 'cms_slide', 'cms_slide_id', '5', 'cms_slide.cms_slide_id = 5', NULL),
(61, '3', '2022-04-18 12:23:54', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '19', 'table_name = \'cms_posts\' \r\n					AND module_name = \'news\'\r\n					AND controller_name = \'News\'\r\n					AN', NULL),
(62, '3', '2022-04-18 12:32:33', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '19', 'table_name = \'cms_posts\' \r\n					AND module_name = \'news\'\r\n					AND controller_name = \'News\'\r\n					AN', NULL),
(63, '3', '2022-04-18 08:15:00', 'ข้อมูลไม่ชัดเจน', 'cms_posts', 'id', '1', 'cms_posts.id = 1', NULL),
(64, '3', '2022-04-18 13:34:05', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '27', 'table_name = \'cms_researchs\' \r\n					AND module_name = \'website\'\r\n					AND controller_name = \'Researc', NULL),
(65, '3', '2022-04-18 08:37:16', 'ข้อมูลไม่ชัดเจน', 'cms_researchs', 'cms_researchs_id', '1', 'cms_researchs.cms_researchs_id = 1', NULL),
(66, '3', '2022-04-18 12:54:33', 'asasas', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(67, '9', '2022-04-23 07:25:59', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '17', 'table_name = \'delivery_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = ', NULL),
(68, '9', '2022-04-23 10:53:14', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '13', 'table_name = \'patient_profile\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Pati', NULL),
(69, '3', '2022-04-23 10:56:56', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '12', 'table_name = \'time_distance\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Time_d', NULL),
(70, '3', '2022-04-23 10:57:57', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '14', 'table_name = \'event_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Ev', NULL),
(71, '3', '2022-04-23 10:58:50', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '15', 'table_name = \'basic_resuscitation\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'', NULL),
(72, '3', '2022-04-23 11:00:20', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '16', 'table_name = \'treatment_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name =', NULL),
(73, '3', '2022-04-23 11:01:31', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '17', 'table_name = \'delivery_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = ', NULL),
(74, '3', '2022-04-23 11:02:40', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '18', 'table_name = \'result_data\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Result_d', NULL),
(75, '3', '2022-04-23 11:28:29', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '7', 'table_name = \'service_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'', NULL),
(76, '3', '2022-04-23 11:52:35', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '13', 'table_name = \'patient_profile\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Pati', NULL),
(77, '3', '2022-04-23 11:52:45', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '13', 'table_name = \'patient_profile\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = \'Pati', NULL),
(78, '3', '2022-04-23 12:37:20', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '17', 'table_name = \'delivery_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = ', NULL),
(79, '3', '2022-04-23 12:41:14', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '17', 'table_name = \'delivery_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = ', NULL),
(80, '3', '2022-04-23 12:41:52', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '17', 'table_name = \'delivery_information\' \r\n					AND module_name = \'services\'\r\n					AND controller_name = ', NULL),
(81, '3', '2022-04-23 10:52:29', 'asasas', 'service_information', 'service_information_id', '1', 'service_information.service_information_id = 1', NULL),
(82, '3', '2022-04-23 15:05:08', 'ข้อมูลไม่ชัดเจน', 'time_distance', 'itme_distance_id', '23', 'time_distance.itme_distance_id = 23', NULL),
(83, '3', '2022-04-23 15:16:52', 'Save Data', 'time_distance', 'itme_distance_id', '23', 'time_distance.itme_distance_id = 23', NULL),
(84, '3', '2022-04-23 16:33:53', 'asasas', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(85, '3', '2022-04-23 16:34:50', 'asasas', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(86, '3', '2022-04-23 16:35:39', 'asasas', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(87, '3', '2022-04-23 16:36:55', 'asasas', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(88, '3', '2022-04-23 16:37:02', 'ข้อมูลไม่ชัดเจน', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(89, '3', '2022-04-23 16:37:25', 'ข้อมูลไม่ชัดเจน', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(90, '3', '2022-04-23 16:51:29', 'ข้อมูลไม่ชัดเจน', 'basic_resuscitation', 'basic_resuscitation_id', '8', 'basic_resuscitation.basic_resuscitation_id = 8', NULL),
(91, '3', '2022-04-23 16:53:00', 'Save data ', 'basic_resuscitation', 'basic_resuscitation_id', '8', 'basic_resuscitation.basic_resuscitation_id = 8', NULL),
(92, '3', '2022-04-23 16:53:17', 'Save data ', 'basic_resuscitation', 'basic_resuscitation_id', '8', 'basic_resuscitation.basic_resuscitation_id = 8', NULL),
(93, '3', '2022-04-23 16:54:17', 'Save data ', 'basic_resuscitation', 'basic_resuscitation_id', '8', 'basic_resuscitation.basic_resuscitation_id = 8', NULL),
(94, '3', '2022-04-23 17:27:17', 'ยืนยันการเปลี่ยนแปลงแก้ไขข้อมูล ?', 'treatment_information', 'treatment_information_id', '8', 'treatment_information.treatment_information_id = 8', NULL),
(95, '3', '2022-04-23 17:28:05', 'ยืนยันการเปลี่ยนแปลงแก้ไขข้อมูล ?', 'treatment_information', 'treatment_information_id', '8', 'treatment_information.treatment_information_id = 8', NULL),
(96, '3', '2022-04-24 02:08:02', 'Save Data', 'time_distance', 'itme_distance_id', '23', 'time_distance.itme_distance_id = 23', NULL),
(97, '3', '2022-04-24 02:23:52', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(98, '3', '2022-04-24 02:24:10', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(99, '3', '2022-04-24 02:24:20', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(100, '3', '2022-04-24 02:24:26', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '9', 'event_information.event_information_id = 9', NULL),
(101, '9', '2022-04-24 08:43:37', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '35', 'table_name = \'patient_profile\' \r\n					AND module_name = \'patient\'\r\n					AND controller_name = \'Patie', NULL),
(102, '9', '2022-04-24 08:45:14', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '35', 'table_name = \'patient_profile\' \r\n					AND module_name = \'patient\'\r\n					AND controller_name = \'Patie', NULL),
(103, '3', '2022-04-24 04:04:57', 'ข้อมูลไม่ชัดเจน', 'result_data', 'result_data_id', '8', 'result_data.result_data_id = 8', NULL),
(104, '3', '2022-04-24 04:07:03', 'ข้อมูลไม่ชัดเจน', 'result_data', 'result_data_id', '8', 'result_data.result_data_id = 8', NULL),
(105, '3', '2022-04-24 04:08:59', 'ข้อมูลไม่ชัดเจน', 'result_data', 'result_data_id', '8', 'result_data.result_data_id = 8', NULL),
(106, '3', '2022-04-24 04:09:28', 'ข้อมูลไม่ชัดเจน', 'result_data', 'result_data_id', '7', 'result_data.result_data_id = 7', NULL),
(107, '3', '2022-04-24 04:24:22', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '11', 'event_information.event_information_id = 11', NULL),
(108, '3', '2022-04-24 04:24:49', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '11', 'event_information.event_information_id = 11', NULL),
(109, '3', '2022-04-24 04:25:16', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '11', 'event_information.event_information_id = 11', NULL),
(110, '3', '2022-04-24 04:25:28', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '11', 'event_information.event_information_id = 11', NULL),
(111, '3', '2022-04-24 09:32:45', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '36', 'table_name = \'result_data\' \r\n					AND module_name = \'dashboard\'\r\n					AND controller_name = \'Result_', NULL),
(112, '3', '2022-04-24 10:58:45', '', 'db_ci_gen_bigdata.tb_ci_setting', 'id', '37', 'table_name = \'cms_teams\' \r\n					AND module_name = \'teams\'\r\n					AND controller_name = \'Cms_teams\'\r\n	', NULL),
(113, '3', '2022-04-24 06:16:06', 'ข้อมูลไม่ชัดเจน', 'cms_teams', 'cms_team_id', '1', 'cms_teams.cms_team_id = 1', NULL),
(114, '3', '2022-04-24 06:24:47', 'ข้อมูลไม่ชัดเจน', 'cms_teams', 'cms_team_id', '1', 'cms_teams.cms_team_id = 1', NULL),
(115, '3', '2022-04-24 06:26:03', 'asasas', 'cms_teams', 'cms_team_id', '2', 'cms_teams.cms_team_id = 2', NULL),
(116, '3', '2022-04-24 06:27:45', 'ข้อมูลไม่ชัดเจน', 'cms_teams', 'cms_team_id', '3', 'cms_teams.cms_team_id = 3', NULL),
(117, '3', '2022-04-24 06:33:29', 'asasas', 'cms_ca_resuscitation', 'ca_resuscitation_id', '1', 'cms_ca_resuscitation.ca_resuscitation_id = 1', NULL),
(118, '3', '2022-04-24 06:35:56', 'ข้อมูลไม่ชัดเจน', 'cms_ca_resuscitation', 'ca_resuscitation_id', '2', 'cms_ca_resuscitation.ca_resuscitation_id = 2', NULL),
(119, '3', '2022-04-24 06:57:15', 'ข้อมูลไม่ชัดเจน', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(120, '3', '2022-04-24 07:16:26', 'ข้อมูลไม่ชัดเจน', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(121, '3', '2022-04-24 07:18:23', '666yyhhhhh', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(122, '3', '2022-04-24 07:21:28', 'ข้อมูลไม่ชัดเจน', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(123, '4', '2022-04-24 08:11:19', 'Save Data', 'time_distance', 'itme_distance_id', '26', 'time_distance.itme_distance_id = 26', NULL),
(124, '3', '2022-04-25 11:40:58', 'ข้อมูลไม่ชัดเจน', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(125, '3', '2022-04-25 11:43:32', 'ข้อมูลไม่ชัดเจน', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(126, '4', '2022-04-25 12:24:20', 'Save Data', 'time_distance', 'itme_distance_id', '27', 'time_distance.itme_distance_id = 27', NULL),
(127, '3', '2022-04-25 12:40:56', 'ข้อมูลไม่ชัดเจน', 'cms_posts', 'id', '2', 'cms_posts.id = 2', NULL),
(128, '3', '2022-04-25 12:42:37', 'ข้อมูลไม่ชัดเจน', 'cms_faq', 'cms_faq_id', '6', 'cms_faq.cms_faq_id = 6', NULL),
(129, '3', '2022-04-25 12:50:59', 'ข้อมูลไม่ชัดเจน', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(130, '3', '2022-04-25 13:00:34', 'ข้อมูลไม่ชัดเจน', 'cms_ca_resuscitation', 'ca_resuscitation_id', '5', 'cms_ca_resuscitation.ca_resuscitation_id = 5', NULL),
(131, '8', '2022-04-26 11:56:49', 'Save Data', 'time_distance', 'itme_distance_id', '28', 'time_distance.itme_distance_id = 28', NULL),
(132, '8', '2022-04-26 16:23:57', 'Save Data', 'time_distance', 'itme_distance_id', '29', 'time_distance.itme_distance_id = 29', NULL),
(133, '3', '2022-05-01 11:07:37', 'ปรับเปลี่ยนให้เหมาะสม', 'cms_researchs', 'cms_researchs_id', '1', 'cms_researchs.cms_researchs_id = 1', NULL),
(134, '3', '2022-05-05 09:33:59', 'เพื่อให้กระชับ ตรงประเด็น', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(135, '3', '2022-05-05 09:34:44', 'เพื่อให้กระชับ ตรงประเด็น', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(136, '3', '2022-05-05 09:41:08', 'ปรับให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '2', 'cms_ca_basic_info.ca_basic_info = 2', NULL),
(137, '3', '2022-05-05 09:42:09', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(138, '3', '2022-05-05 09:46:41', 'ปรับให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '4', 'cms_ca_basic_info.ca_basic_info = 4', NULL),
(139, '3', '2022-05-05 09:58:33', 'ปรับให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '4', 'cms_ca_basic_info.ca_basic_info = 4', NULL),
(140, '3', '2022-05-05 10:01:13', 'ปรับแก้', 'ca_symptoms', 'ca_symptoms_id', '3', 'ca_symptoms.ca_symptoms_id = 3', NULL),
(141, '3', '2022-05-05 10:12:41', 'ปรับแก้', 'ca_symptoms', 'ca_symptoms_id', '3', 'ca_symptoms.ca_symptoms_id = 3', NULL),
(142, '3', '2022-05-05 10:14:02', 'ปรับแก้', 'ca_symptoms', 'ca_symptoms_id', '3', 'ca_symptoms.ca_symptoms_id = 3', NULL),
(143, '3', '2022-05-05 10:17:27', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '6', 'ca_symptoms.ca_symptoms_id = 6', NULL),
(144, '3', '2022-05-05 10:18:49', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '7', 'ca_symptoms.ca_symptoms_id = 7', NULL),
(145, '3', '2022-05-05 10:21:15', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '8', 'ca_symptoms.ca_symptoms_id = 8', NULL),
(146, '3', '2022-05-05 10:23:04', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '8', 'ca_symptoms.ca_symptoms_id = 8', NULL),
(147, '3', '2022-05-05 10:23:48', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '8', 'ca_symptoms.ca_symptoms_id = 8', NULL),
(148, '3', '2022-05-05 10:33:25', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '8', 'ca_symptoms.ca_symptoms_id = 8', NULL),
(149, '3', '2022-05-05 10:44:11', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '12', 'ca_symptoms.ca_symptoms_id = 12', NULL),
(150, '3', '2022-05-05 10:44:51', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '12', 'ca_symptoms.ca_symptoms_id = 12', NULL),
(151, '3', '2022-05-05 11:14:54', 'แก้ไข', 'cms_researchs', 'cms_researchs_id', '1', 'cms_researchs.cms_researchs_id = 1', NULL),
(152, '3', '2022-05-05 11:20:10', 'แก้ไข', 'cms_researchs', 'cms_researchs_id', '1', 'cms_researchs.cms_researchs_id = 1', NULL),
(153, '3', '2022-05-05 11:24:39', 'แก้ไข', 'cms_faq', 'cms_faq_id', '2', 'cms_faq.cms_faq_id = 2', NULL),
(154, '3', '2022-05-05 11:26:08', 'แก้ไข', 'cms_faq', 'cms_faq_id', '2', 'cms_faq.cms_faq_id = 2', NULL),
(155, '3', '2022-05-05 11:27:05', 'แก้ไข', 'cms_faq', 'cms_faq_id', '3', 'cms_faq.cms_faq_id = 3', NULL),
(156, '3', '2022-05-05 11:28:51', 'แก้ไข', 'cms_faq', 'cms_faq_id', '4', 'cms_faq.cms_faq_id = 4', NULL),
(157, '3', '2022-05-05 11:31:18', 'แก้ไข', 'cms_faq', 'cms_faq_id', '3', 'cms_faq.cms_faq_id = 3', NULL),
(158, '3', '2022-05-05 11:32:28', 'แก้ไข', 'cms_faq', 'cms_faq_id', '4', 'cms_faq.cms_faq_id = 4', NULL),
(159, '3', '2022-05-05 12:03:33', 'แก้ไข', 'cms_posts', 'id', '2', 'cms_posts.id = 2', NULL),
(160, '3', '2022-05-05 12:11:43', 'แก้ไข', 'cms_posts', 'id', '2', 'cms_posts.id = 2', NULL),
(161, '3', '2022-05-05 12:12:49', 'แก้ไข', 'cms_posts', 'id', '2', 'cms_posts.id = 2', NULL),
(162, '3', '2022-05-05 12:21:12', 'แก้ไข', 'cms_posts', 'id', '3', 'cms_posts.id = 3', NULL),
(163, '3', '2022-05-05 12:23:13', 'แก้ไข', 'cms_posts', 'id', '3', 'cms_posts.id = 3', NULL),
(164, '3', '2022-05-05 12:23:43', 'แก้ไข', 'cms_posts', 'id', '3', 'cms_posts.id = 3', NULL),
(165, '3', '2022-05-05 12:24:34', 'แก้ไข', 'cms_posts', 'id', '2', 'cms_posts.id = 2', NULL),
(166, '3', '2022-05-05 12:28:09', 'แก้ไข', 'cms_posts', 'id', '4', 'cms_posts.id = 4', NULL),
(167, '3', '2022-05-05 12:29:04', 'แก้ไข', 'cms_posts', 'id', '4', 'cms_posts.id = 4', NULL),
(168, '3', '2022-05-05 12:41:28', 'แก้ไข', 'cms_posts', 'id', '5', 'cms_posts.id = 5', NULL),
(169, '3', '2022-05-05 12:51:24', 'แก้ไข ให้ถูกต้อง', 'cms_posts', 'id', '8', 'cms_posts.id = 8', NULL),
(170, '3', '2022-05-05 13:17:32', 'แกไขใหม่', 'ca_symptoms', 'ca_symptoms_id', '3', 'ca_symptoms.ca_symptoms_id = 3', NULL),
(171, '3', '2022-05-05 13:28:05', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '6', 'ca_symptoms.ca_symptoms_id = 6', NULL),
(172, '3', '2022-05-05 13:28:38', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '6', 'ca_symptoms.ca_symptoms_id = 6', NULL),
(173, '3', '2022-05-05 13:36:21', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '7', 'ca_symptoms.ca_symptoms_id = 7', NULL),
(174, '3', '2022-05-05 13:39:18', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '8', 'ca_symptoms.ca_symptoms_id = 8', NULL),
(175, '3', '2022-05-05 13:43:53', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '11', 'ca_symptoms.ca_symptoms_id = 11', NULL),
(176, '3', '2022-05-05 13:44:21', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '11', 'ca_symptoms.ca_symptoms_id = 11', NULL),
(177, '3', '2022-05-05 13:47:35', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '12', 'ca_symptoms.ca_symptoms_id = 12', NULL),
(178, '3', '2022-05-05 13:48:00', 'แก้ไขให้ถูกต้อง', 'ca_symptoms', 'ca_symptoms_id', '12', 'ca_symptoms.ca_symptoms_id = 12', NULL),
(179, '3', '2022-05-05 17:01:14', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(180, '3', '2022-05-05 17:02:39', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(181, '3', '2022-05-05 17:04:23', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(182, '3', '2022-05-05 17:07:47', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(183, '3', '2022-05-05 17:08:44', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(184, '3', '2022-05-05 17:11:21', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(185, '3', '2022-05-05 17:12:18', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(186, '3', '2022-05-05 17:15:35', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(187, '3', '2022-05-05 17:21:32', 'แก้ไขให้ถูกต้อง', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(188, '3', '2022-05-05 17:54:10', 'แก้ไขให้สั้นกระชับ', 'cms_ca_resuscitation', 'ca_resuscitation_id', '3', 'cms_ca_resuscitation.ca_resuscitation_id = 3', NULL),
(189, '3', '2022-05-05 17:54:36', 'แก้ไขให้สั้นกระชับ', 'cms_ca_resuscitation', 'ca_resuscitation_id', '4', 'cms_ca_resuscitation.ca_resuscitation_id = 4', NULL),
(190, '3', '2022-05-06 15:13:13', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '6', 'cms_ca_basic_info.ca_basic_info = 6', NULL),
(191, '3', '2022-05-06 15:21:16', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(192, '3', '2022-05-06 15:21:47', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(193, '3', '2022-05-06 15:23:36', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(194, '3', '2022-05-06 15:24:19', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(195, '3', '2022-05-06 15:24:47', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(196, '3', '2022-05-06 15:25:18', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(197, '3', '2022-05-06 15:35:11', 'แก้ไขให้ถูกต้อง', 'cms_ca_basic_info', 'ca_basic_info', '1', 'cms_ca_basic_info.ca_basic_info = 1', NULL),
(198, '3', '2022-05-06 16:40:00', 'แก้ไขให้ถูกต้อง', 'cms_researchs', 'cms_researchs_id', '1', 'cms_researchs.cms_researchs_id = 1', NULL),
(199, '4', '2022-05-07 10:36:08', 'แก้ไขให้ถูกต้อง', 'cms_posts', 'id', '2', 'cms_posts.id = 2', NULL),
(200, '1', '2022-05-07 11:08:29', 'แก้ไขให้ถูกต้อง', 'tb_members', 'userid', '1', 'userid = 1', NULL),
(201, '1', '2022-05-07 11:09:58', 'แก้ไข', 'tb_members', 'userid', '1', 'userid = 1', NULL),
(202, '3', '2022-05-07 11:12:54', 'แก้ไขให้ถูกต้อง', 'tb_members', 'userid', '1', 'tb_members.userid = 1', NULL),
(203, '4', '2022-05-10 17:46:38', 'ปรับปรุง', 'cms_posts', 'id', '9', 'cms_posts.id = 9', NULL),
(204, '4', '2022-05-10 17:51:26', 'แก้ไข', 'cms_posts', 'id', '3', 'cms_posts.id = 3', NULL),
(205, '4', '2022-05-10 19:58:21', 'system test', 'tb_members', 'userid', '4', 'userid = 4', NULL),
(206, '4', '2022-05-10 20:01:40', 'ข้อมูลไม่ชัดเจน', 'service_information', 'service_information_id', '33', 'service_information.service_information_id = 33', NULL),
(207, '4', '2022-05-10 20:05:24', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '17', 'event_information.event_information_id = 17', NULL),
(208, '4', '2022-05-10 20:07:31', 'Edit Data ', 'service_information', 'service_information_id', '33', 'service_information.service_information_id = 33', NULL),
(209, '3', '2022-05-10 20:22:27', 'system test', 'cms_posts', 'id', '8', 'cms_posts.id = 8', NULL),
(210, '3', '2022-05-10 20:29:01', 'ข้อมูลไม่ชัดเจน', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(211, '3', '2022-05-23 14:32:24', 'แก้ไขให้ถูกต้อง', 'cms_posts', 'id', '5', 'cms_posts.id = 5', NULL),
(212, '3', '2022-05-23 14:33:20', 'แก้ไขให้ถูกต้อง', 'cms_posts', 'id', '5', 'cms_posts.id = 5', NULL),
(213, '3', '2022-05-23 14:36:11', 'แก้ไขให้ถูกต้อง', 'cms_posts', 'id', '5', 'cms_posts.id = 5', NULL),
(214, '3', '2022-05-23 14:38:30', 'แก้ไขให้ถูกต้อง', 'cms_posts', 'id', '8', 'cms_posts.id = 8', NULL),
(215, '4', '2022-10-19 10:31:30', 'edit data', 'result_data', 'result_data_id', '18', 'result_data.result_data_id = 18', NULL),
(216, '4', '2022-11-04 14:32:36', 'ีuodate', 'service_information', 'service_information_id', '36', 'service_information.service_information_id = 36', NULL),
(217, '4', '2022-11-04 14:39:41', 'update', 'patient_profile', 'patient_profile_id', '18', 'patient_profile.patient_profile_id = 18', NULL),
(218, '4', '2022-11-04 14:42:10', 'update', 'patient_profile', 'patient_profile_id', '18', 'patient_profile.patient_profile_id = 18', NULL),
(219, '4', '2022-11-04 14:43:42', 'update', 'patient_profile', 'patient_profile_id', '18', 'patient_profile.patient_profile_id = 18', NULL),
(220, '4', '2022-11-04 14:49:51', 'บันทึกข้อมูล', 'event_information', 'event_information_id', '20', 'event_information.event_information_id = 20', NULL),
(221, '4', '2022-11-04 14:57:41', 'ยืนยันการเปลี่ยนแปลงแก้ไขข้อมูล ?', 'treatment_information', 'treatment_information_id', '19', 'treatment_information.treatment_information_id = 19', NULL),
(222, '4', '2022-11-04 14:57:51', 'ยืนยันการเปลี่ยนแปลงแก้ไขข้อมูล ?', 'treatment_information', 'treatment_information_id', '19', 'treatment_information.treatment_information_id = 19', NULL),
(223, '4', '2022-11-04 14:58:34', 'ยืนยันการเปลี่ยนแปลงแก้ไขข้อมูล ?', 'treatment_information', 'treatment_information_id', '19', 'treatment_information.treatment_information_id = 19', NULL),
(224, '4', '2022-11-04 15:03:44', 'edit data', 'result_data', 'result_data_id', '20', 'result_data.result_data_id = 20', NULL),
(225, '4', '2022-11-04 15:05:06', 'Edit Data ', 'service_information', 'service_information_id', '36', 'service_information.service_information_id = 36', NULL),
(226, '4', '2022-11-04 15:05:13', 'Edit Data ', 'service_information', 'service_information_id', '36', 'service_information.service_information_id = 36', NULL),
(227, '3', '2023-05-07 04:42:33', 'ทำใหม่', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(228, '3', '2023-05-07 04:45:15', 'แก้ไข', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(229, '3', '2023-05-07 04:47:19', 'แก้ไข', 'cms_slide', 'cms_slide_id', '3', 'cms_slide.cms_slide_id = 3', NULL),
(230, '3', '2023-05-07 04:47:56', 'แก้ไข', 'cms_slide', 'cms_slide_id', '4', 'cms_slide.cms_slide_id = 4', NULL),
(231, '3', '2023-05-07 04:49:25', 'แก้ไข', 'cms_slide', 'cms_slide_id', '3', 'cms_slide.cms_slide_id = 3', NULL),
(232, '3', '2023-05-07 04:52:57', 'แก้ไข', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '3', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 3', NULL),
(233, '3', '2023-05-07 04:53:28', 'แก้ไข', 'cms_cardiac_arrest_slide', 'cms_cardiac_arrest_id', '4', 'cms_cardiac_arrest_slide.cms_cardiac_arrest_id = 4', NULL),
(234, '3', '2023-05-07 04:56:45', 'แก้ไข', 'cms_slide', 'cms_slide_id', '3', 'cms_slide.cms_slide_id = 3', NULL),
(235, '3', '2023-05-07 05:07:33', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '3', 'ca_symptoms.ca_symptoms_id = 3', NULL),
(236, '3', '2023-05-07 05:08:52', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '6', 'ca_symptoms.ca_symptoms_id = 6', NULL),
(237, '3', '2023-05-07 05:09:30', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '7', 'ca_symptoms.ca_symptoms_id = 7', NULL),
(238, '3', '2023-05-07 05:10:09', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '8', 'ca_symptoms.ca_symptoms_id = 8', NULL),
(239, '3', '2023-05-07 05:10:44', 'แก้ไข', 'ca_symptoms', 'ca_symptoms_id', '11', 'ca_symptoms.ca_symptoms_id = 11', NULL),
(240, '3', '2023-05-07 05:12:43', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '1', 'cms_ca_resuscitation.ca_resuscitation_id = 1', NULL),
(241, '3', '2023-05-07 05:13:06', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '2', 'cms_ca_resuscitation.ca_resuscitation_id = 2', NULL),
(242, '3', '2023-05-07 05:13:32', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '3', 'cms_ca_resuscitation.ca_resuscitation_id = 3', NULL),
(243, '3', '2023-05-07 05:13:54', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '4', 'cms_ca_resuscitation.ca_resuscitation_id = 4', NULL),
(244, '3', '2023-05-07 05:14:23', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '1', 'cms_ca_resuscitation.ca_resuscitation_id = 1', NULL),
(245, '3', '2023-05-07 05:15:04', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '2', 'cms_ca_resuscitation.ca_resuscitation_id = 2', NULL),
(246, '3', '2023-05-07 05:15:20', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '3', 'cms_ca_resuscitation.ca_resuscitation_id = 3', NULL),
(247, '3', '2023-05-07 05:15:30', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '4', 'cms_ca_resuscitation.ca_resuscitation_id = 4', NULL),
(248, '3', '2023-05-07 05:32:37', 'แก้ไข', 'cms_about_us', 'id', '1', 'cms_about_us.id = 1', NULL),
(249, '3', '2023-05-07 07:03:39', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '4', 'cms_ca_resuscitation.ca_resuscitation_id = 4', NULL),
(250, '3', '2023-05-07 07:04:05', 'แก้ไข', 'cms_ca_resuscitation', 'ca_resuscitation_id', '4', 'cms_ca_resuscitation.ca_resuscitation_id = 4', NULL),
(251, '8', '2023-06-01 10:29:16', '', 'db_ci_gen.tb_ci_setting', 'id', '26', 'table_name = \'basic_information\' \r\n					AND module_name = \'surway\'\r\n					AND controller_name = \'Basi', NULL),
(252, '8', '2023-06-01 15:35:49', '', 'db_ci_gen.tb_ci_setting', 'id', '26', 'table_name = \'basic_information\' \r\n					AND module_name = \'surway\'\r\n					AND controller_name = \'Basi', NULL),
(253, '8', '2023-06-01 15:37:12', '', 'db_ci_gen.tb_ci_setting', 'id', '26', 'table_name = \'basic_information\' \r\n					AND module_name = \'surway\'\r\n					AND controller_name = \'Basi', NULL),
(254, '8', '2023-07-15 14:47:19', '', 'db_ci_gen.tb_ci_setting', 'id', '26', 'table_name = \'basic_information\' \r\n					AND module_name = \'surway\'\r\n					AND controller_name = \'Basi', NULL),
(255, '8', '2023-07-15 14:47:26', '', 'db_ci_gen.tb_ci_setting', 'id', '26', 'table_name = \'basic_information\' \r\n					AND module_name = \'surway\'\r\n					AND controller_name = \'Basi', NULL),
(256, '8', '2023-07-15 14:48:49', '', 'db_ci_gen.tb_ci_setting', 'id', '26', 'table_name = \'basic_information\' \r\n					AND module_name = \'surway\'\r\n					AND controller_name = \'Basi', NULL),
(257, '3', '2023-07-17 11:55:05', 'xxxxผ่านการอนุมัติ', 'tb_members', 'userid', '2', 'tb_members.userid = 2', NULL),
(258, '3', '2023-07-17 11:55:25', 'xxxxผ่านการอนุมัติ', 'tb_members', 'userid', '1', 'tb_members.userid = 1', NULL),
(259, '8', '2023-07-18 10:38:41', '', 'db_ci_gen.tb_ci_setting', 'id', '30', 'table_name = \'immune_factor\' \r\n					AND module_name = \'Immune_factor\'\r\n					AND controller_name = \'I', NULL),
(260, '8', '2023-07-23 23:09:03', '', 'db_ci_gen.tb_ci_setting', 'id', '34', 'table_name = \'assessment1\' \r\n					AND module_name = \'assessment\'\r\n					AND controller_name = \'Assess', NULL),
(261, NULL, '2023-07-29 12:19:02', '', 'assessment1', 'id', '4', 'assessment1.ref_assessment_id = 1', NULL),
(262, NULL, '2023-07-29 12:20:48', '', 'assessment1', 'id', '6', 'assessment1.ref_assessment_id = 3', NULL),
(263, NULL, '2023-07-29 13:08:58', '', 'assessment1', 'id', '6', 'assessment1.ref_assessment_id = 1', NULL),
(264, NULL, '2023-07-29 13:10:08', '', 'assessment1', 'id', '6', 'assessment1.ref_assessment_id = 1', NULL),
(265, NULL, '2023-07-29 13:10:26', '', 'assessment1', 'id', '6', 'assessment1.ref_assessment_id = 1', NULL),
(266, NULL, '2023-07-29 13:11:00', '', 'assessment1', 'id', '6', 'assessment1.ref_assessment_id = 1', NULL),
(267, NULL, '2023-07-29 13:12:15', '', 'assessment1', 'id', '6', 'assessment1.ref_assessment_id = 1', NULL),
(268, NULL, '2023-07-29 13:12:43', '', 'assessment1', 'id', '6', 'assessment1.ref_assessment_id = 1', NULL),
(269, NULL, '2023-07-29 13:19:32', '', 'assessment2', 'id', '7', 'assessment2.ref_assessment_id = 1', NULL),
(270, NULL, '2023-07-29 13:55:00', '', 'assessment2', 'id', '7', 'assessment2.ref_assessment_id = 1', NULL),
(271, NULL, '2023-07-29 13:55:17', '', 'assessment2', 'id', '7', 'assessment2.ref_assessment_id = 1', NULL),
(272, NULL, '2023-07-29 14:02:47', '', 'assessment3', 'id', '11', 'assessment3.ref_assessment_id = 1', NULL),
(273, NULL, '2023-07-29 14:41:45', '', 'assessment4', 'id', '17', 'assessment4.ref_assessment_id = 1', NULL),
(274, NULL, '2023-07-29 14:41:45', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(275, NULL, '2023-07-29 14:44:48', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(276, '8', '2023-07-29 22:02:11', '', 'db_ci_gen.tb_ci_setting', 'id', '35', 'table_name = \'assessment_form\' \r\n					AND module_name = \'assessment\'\r\n					AND controller_name = \'As', NULL),
(277, '8', '2023-07-29 22:03:00', '', 'db_ci_gen.tb_ci_setting', 'id', '35', 'table_name = \'assessment_form\' \r\n					AND module_name = \'assessment\'\r\n					AND controller_name = \'As', NULL),
(278, '8', '2023-07-29 22:04:16', '', 'db_ci_gen.tb_ci_setting', 'id', '35', 'table_name = \'assessment_form\' \r\n					AND module_name = \'assessment\'\r\n					AND controller_name = \'As', NULL),
(279, '8', '2023-07-29 22:04:29', '', 'db_ci_gen.tb_ci_setting', 'id', '35', 'table_name = \'assessment_form\' \r\n					AND module_name = \'assessment\'\r\n					AND controller_name = \'As', NULL),
(280, NULL, '2023-07-29 15:06:57', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(281, NULL, '2023-07-29 15:07:22', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(282, NULL, '2023-07-29 15:07:26', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(283, NULL, '2023-07-29 15:08:25', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(284, NULL, '2023-07-29 15:09:00', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(285, NULL, '2023-07-29 15:09:04', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(286, NULL, '2023-07-29 15:09:29', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(287, NULL, '2023-07-29 15:10:02', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(288, NULL, '2023-07-29 15:10:18', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(289, NULL, '2023-07-29 15:12:09', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(290, NULL, '2023-07-29 15:12:12', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(291, NULL, '2023-07-29 15:13:56', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(292, NULL, '2023-07-29 15:14:09', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(293, NULL, '2023-07-29 15:15:02', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(294, NULL, '2023-07-29 15:16:32', '', 'assessment4', 'id', '18', 'assessment4.ref_assessment_id = 1', NULL),
(295, NULL, '2023-07-29 15:17:22', '', 'assessment4', 'id', '19', 'assessment4.ref_assessment_id = 4', NULL),
(296, NULL, '2023-07-29 15:17:42', '', 'assessment4', 'id', '19', 'assessment4.ref_assessment_id = 4', NULL),
(297, NULL, '2023-07-29 15:18:09', '', 'assessment4', 'id', '19', 'assessment4.ref_assessment_id = 4', NULL),
(298, NULL, '2023-07-29 15:18:19', '', 'assessment4', 'id', '19', 'assessment4.ref_assessment_id = 4', NULL),
(299, NULL, '2023-07-29 15:18:19', '', 'assessment_form', 'id', '4', 'assessment_form.id = 4', NULL),
(300, NULL, '2023-07-29 15:30:10', '', 'assessment1', 'id', '8', 'assessment1.ref_assessment_id = 5', NULL),
(301, NULL, '2023-07-29 15:37:12', '', 'assessment1', 'id', '9', 'assessment1.ref_assessment_id = 6', NULL),
(302, NULL, '2023-07-29 16:13:58', '', 'assessment1', 'id', '10', 'assessment1.ref_assessment_id = 7', NULL),
(303, NULL, '2023-07-29 16:16:01', '', 'assessment2', 'id', '12', 'assessment2.ref_assessment_id = 7', NULL),
(304, NULL, '2023-07-29 19:04:59', '', 'assessment3', 'id', '15', 'assessment3.ref_assessment_id = 7', NULL),
(305, NULL, '2023-07-29 22:28:58', '', 'assessment1', 'id', '13', 'assessment1.ref_assessment_id = 14', NULL),
(306, NULL, '2023-07-29 22:29:32', '', 'assessment4', 'id', '23', 'assessment4.ref_assessment_id = 14', NULL),
(307, NULL, '2023-07-29 22:29:32', '', 'assessment_form', 'id', '14', 'assessment_form.id = 14', NULL),
(308, NULL, '2023-07-29 22:32:59', '', 'assessment2', 'id', '18', 'assessment2.ref_assessment_id = 14', NULL),
(309, NULL, '2023-07-29 22:35:10', '', 'assessment3', 'id', '16', 'assessment3.ref_assessment_id = 14', NULL),
(310, NULL, '2023-07-29 22:35:16', '', 'assessment4', 'id', '23', 'assessment4.ref_assessment_id = 14', NULL),
(311, NULL, '2023-07-29 22:35:16', '', 'assessment_form', 'id', '14', 'assessment_form.id = 14', NULL),
(312, '8', '2023-07-30 06:51:12', '', 'db_ci_gen.tb_ci_setting', 'id', '35', 'table_name = \'assessment_form\' \r\n					AND module_name = \'assessment\'\r\n					AND controller_name = \'As', NULL),
(313, NULL, '2023-07-30 00:04:36', '', 'assessment4', 'id', '23', 'assessment4.ref_assessment_id = 14', NULL),
(314, NULL, '2023-07-30 00:04:36', '', 'assessment_form', 'id', '14', 'assessment_form.id = 14', NULL),
(315, NULL, '2023-07-30 05:18:32', '', 'assessment1', 'id', '14', 'assessment1.ref_assessment_id = 15', NULL),
(316, NULL, '2023-07-30 05:19:02', '', 'assessment1', 'id', '14', 'assessment1.ref_assessment_id = 15', NULL),
(317, NULL, '2023-07-30 05:21:58', '', 'assessment2', 'id', '19', 'assessment2.ref_assessment_id = 15', NULL),
(318, NULL, '2023-07-30 05:23:02', '', 'assessment2', 'id', '19', 'assessment2.ref_assessment_id = 15', NULL),
(319, NULL, '2023-07-30 05:25:30', '', 'assessment3', 'id', '17', 'assessment3.ref_assessment_id = 15', NULL),
(320, NULL, '2023-07-30 05:26:33', '', 'assessment4', 'id', '24', 'assessment4.ref_assessment_id = 15', NULL),
(321, NULL, '2023-07-30 05:26:33', '', 'assessment_form', 'id', '15', 'assessment_form.id = 15', NULL),
(322, NULL, '2023-07-31 03:55:28', '', 'assessment1', 'id', '15', 'assessment1.ref_assessment_id = 16', NULL),
(323, NULL, '2023-07-31 03:55:49', '', 'assessment1', 'id', '15', 'assessment1.ref_assessment_id = 16', NULL),
(324, NULL, '2023-07-31 03:56:41', '', 'assessment1', 'id', '15', 'assessment1.ref_assessment_id = 16', NULL),
(325, NULL, '2023-07-31 04:54:43', '', 'assessment1', 'id', '15', 'assessment1.ref_assessment_id = 16', NULL),
(326, '3', '2023-08-28 08:38:58', '', 'assessment1', 'id', '18', 'assessment1.ref_assessment_id = 19', NULL),
(327, '3', '2023-08-28 08:43:07', '', 'assessment2', 'id', '23', 'assessment2.ref_assessment_id = 19', NULL),
(328, '3', '2023-08-28 09:00:21', '', 'assessment3', 'id', '21', 'assessment3.ref_assessment_id = 19', NULL),
(329, '3', '2023-08-28 09:02:19', '', 'assessment4', 'id', '28', 'assessment4.ref_assessment_id = 19', NULL),
(330, '3', '2023-08-28 09:02:19', '', 'assessment_form', 'id', '19', 'assessment_form.id = 19', NULL),
(331, NULL, '2023-09-02 03:00:21', '', 'assessment1', 'id', '19', 'assessment1.ref_assessment_id = 20', NULL),
(332, NULL, '2023-09-02 03:00:36', '', 'assessment1', 'id', '19', 'assessment1.ref_assessment_id = 20', NULL),
(333, NULL, '2023-09-02 03:09:37', '', 'assessment1', 'id', '19', 'assessment1.ref_assessment_id = 20', NULL),
(334, NULL, '2023-09-02 03:24:52', '', 'assessment1', 'id', '19', 'assessment1.ref_assessment_id = 20', NULL),
(335, NULL, '2023-09-02 05:34:48', '', 'assessment1', 'id', '20', 'assessment1.ref_assessment_id = 21', NULL),
(336, NULL, '2023-09-02 05:35:34', '', 'assessment1', 'id', '20', 'assessment1.ref_assessment_id = 21', NULL),
(337, NULL, '2023-09-02 05:39:46', '', 'assessment1', 'id', '20', 'assessment1.ref_assessment_id = 21', NULL),
(338, NULL, '2023-09-02 05:40:40', '', 'assessment1', 'id', '20', 'assessment1.ref_assessment_id = 21', NULL),
(339, NULL, '2023-09-02 05:40:46', '', 'assessment1', 'id', '20', 'assessment1.ref_assessment_id = 21', NULL),
(340, NULL, '2023-09-02 05:41:25', '', 'assessment1', 'id', '20', 'assessment1.ref_assessment_id = 21', NULL),
(341, NULL, '2023-09-02 05:44:55', '', 'assessment1', 'id', '20', 'assessment1.ref_assessment_id = 21', NULL),
(342, NULL, '2023-09-02 05:56:16', '', 'assessment2', 'id', '25', 'assessment2.ref_assessment_id = 21', NULL),
(343, NULL, '2023-09-02 06:19:20', '', 'assessment3', 'id', '23', 'assessment3.ref_assessment_id = 21', NULL),
(344, NULL, '2023-09-02 06:31:10', '', 'assessment3', 'id', '23', 'assessment3.ref_assessment_id = 21', NULL),
(345, NULL, '2023-09-02 06:36:13', '', 'assessment3', 'id', '23', 'assessment3.ref_assessment_id = 21', NULL),
(346, NULL, '2023-09-02 06:38:13', '', 'assessment3', 'id', '23', 'assessment3.ref_assessment_id = 21', NULL),
(347, NULL, '2023-09-02 06:42:14', '', 'assessment4', 'id', '30', 'assessment4.ref_assessment_id = 21', NULL),
(348, NULL, '2023-09-02 06:42:14', '', 'assessment_form', 'id', '21', 'assessment_form.id = 21', NULL),
(349, NULL, '2023-09-02 07:54:42', '', 'assessment1', 'id', '21', 'assessment1.ref_assessment_id = 22', NULL),
(350, '3', '2023-09-02 11:44:52', '', 'assessment1', 'id', '22', 'assessment1.ref_assessment_id = 23', NULL),
(351, '3', '2023-09-02 11:47:19', '', 'assessment2', 'id', '27', 'assessment2.ref_assessment_id = 23', NULL),
(352, '3', '2023-09-02 11:49:48', '', 'assessment3', 'id', '25', 'assessment3.ref_assessment_id = 23', NULL),
(353, '3', '2023-09-02 11:50:18', '', 'assessment4', 'id', '32', 'assessment4.ref_assessment_id = 23', NULL),
(354, '3', '2023-09-02 11:50:18', '', 'assessment_form', 'id', '23', 'assessment_form.id = 23', NULL),
(355, '2', '2023-09-03 04:50:15', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(356, '2', '2023-09-03 04:51:54', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL);
INSERT INTO `tb_ci_log_history` (`log_id`, `log_edit_user`, `log_edit_datetime`, `log_edit_remark`, `log_edit_table`, `log_edit_table_pk_name`, `log_edit_table_pk_value`, `log_edit_condition`, `log_login_id`) VALUES
(357, '2', '2023-09-03 04:52:02', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(358, '2', '2023-09-03 04:52:18', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(359, '2', '2023-09-03 04:54:33', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(360, '2', '2023-09-03 04:54:37', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(361, '2', '2023-09-03 04:55:39', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(362, '2', '2023-09-03 04:56:25', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(363, '2', '2023-09-03 04:57:05', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(364, '2', '2023-09-03 04:57:22', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(365, '2', '2023-09-03 04:57:26', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(366, '2', '2023-09-03 04:57:44', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(367, '2', '2023-09-03 04:58:24', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(368, '2', '2023-09-03 05:00:01', '', 'assessment1', 'id', '28', 'assessment1.ref_assessment_id = 29', NULL),
(369, '2', '2023-09-03 05:57:06', '', 'assessment1', 'id', '30', 'assessment1.ref_assessment_id = 31', NULL),
(370, '2', '2023-09-03 05:59:20', '', 'assessment2', 'id', '35', 'assessment2.ref_assessment_id = 31', NULL),
(371, '2', '2023-09-03 06:06:57', '', 'assessment3', 'id', '33', 'assessment3.ref_assessment_id = 31', NULL),
(372, '2', '2023-09-03 06:07:56', '', 'assessment4', 'id', '40', 'assessment4.ref_assessment_id = 31', NULL),
(373, '2', '2023-09-03 06:07:56', '', 'assessment_form', 'id', '31', 'assessment_form.id = 31', NULL),
(374, NULL, '2023-09-04 13:53:04', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(375, NULL, '2023-09-04 13:53:21', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(376, NULL, '2023-09-04 13:53:24', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(377, NULL, '2023-09-04 13:54:12', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(378, NULL, '2023-09-04 13:54:15', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(379, NULL, '2023-09-04 13:54:38', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(380, NULL, '2023-09-04 13:55:07', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(381, NULL, '2023-09-04 13:55:10', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(382, NULL, '2023-09-04 13:56:10', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(383, NULL, '2023-09-04 13:56:24', '', 'assessment1', 'id', '31', 'assessment1.ref_assessment_id = 32', NULL),
(384, NULL, '2023-09-04 14:01:07', '', 'assessment1', 'id', '32', 'assessment1.ref_assessment_id = 33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `dpm_id` int(11) NOT NULL,
  `dpm_name` varchar(100) NOT NULL COMMENT 'ชื่อสังกัด',
  `dpm_void` int(1) NOT NULL COMMENT '1=ยกเลิก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแผนก/ฝ่าย/สังกัด';

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`dpm_id`, `dpm_name`, `dpm_void`) VALUES
(1, 'ฝ่ายขาย', 0),
(2, 'ฝ่ายลูกค้าสัมพันธ์', 0),
(3, 'ฝ่ายศูนย์บริการซ่อมบำรุง', 0),
(4, 'ฝ่ายบุคคล', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_members`
--

CREATE TABLE `tb_members` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `email` varchar(100) DEFAULT NULL COMMENT 'อีเมล',
  `password` varchar(60) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `prefix` varchar(30) DEFAULT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `lastname` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `birthday` date DEFAULT NULL COMMENT 'วันเกิด',
  `sex` int(1) DEFAULT NULL COMMENT 'เพศ[1=ชาย,2=หญิง]',
  `level` int(1) DEFAULT '1' COMMENT 'สิทธิ์การใช้งาน [1=ผู้ใช้ทั่วไป,9=admin]',
  `tel_number` varchar(30) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `line_id` varchar(50) DEFAULT NULL COMMENT 'ไอดี Line',
  `department_id` int(11) DEFAULT NULL COMMENT 'อ้างอิง ไอดีสังกัด',
  `photo` varchar(150) DEFAULT NULL COMMENT 'ภาพประจำตัว',
  `unsubscribe` int(1) DEFAULT '0' COMMENT '1=ไม่รับข่าวสาร',
  `void` int(1) DEFAULT '0' COMMENT '1=ยกเลิกการใช้งาน',
  `referral_code` varchar(15) DEFAULT NULL COMMENT 'รหัสยืนยันสมาชิก',
  `create_datetime` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `modify_datetime` datetime DEFAULT NULL,
  `modify_user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_members`
--

INSERT INTO `tb_members` (`userid`, `username`, `email`, `password`, `prefix`, `firstname`, `lastname`, `birthday`, `sex`, `level`, `tel_number`, `line_id`, `department_id`, `photo`, `unsubscribe`, `void`, `referral_code`, `create_datetime`, `create_user_id`, `modify_datetime`, `modify_user_id`) VALUES
(1, '1002', 'testOHCA@gmail.com', '$2y$11$jtrWEP2qaiBn.2D0V5Hno.GMluvI1RWzZq6qo9QJxLxGd7eOcGngO', 'นาย', 'PARITAD1002', 'LAST1002', NULL, 1, 3, '0890549524', 'testOHCA', 1, './assets/uploads/users/2565/a9a4455f2004fb9fde08a0906c0066fb.jpg', 0, NULL, NULL, '2019-03-31 11:02:06', 1, '2022-05-07 11:09:58', 1),
(2, '1001', '1001@local.com', '$2y$11$jtrWEP2qaiBn.2D0V5Hno.GMluvI1RWzZq6qo9QJxLxGd7eOcGngO', 'นาย', 'USER02', 'TEST2', NULL, 1, 2, '888888', '99999', 3, './assets/uploads/users/2566/06a412cbfa39e365f29506032baeeb4b.jpg', 0, 0, NULL, '2019-03-31 11:02:13', 3, '2019-07-24 00:00:00', 3),
(3, 'admin', 'user3@local.com', '$2y$11$qmOjsOYbmPutFwPSJcNWJOZkAJ3J5nhcCKYJM6eY2YgaByaOmqGuu', 'MR', 'Admin1', 'TEST3', NULL, NULL, 9, 'sss', 'aaa', 2, NULL, 0, 1, NULL, '2019-03-31 11:02:10', 2, '2019-04-03 00:00:00', 1),
(5, '1000', 'user5@local.com', '$2y$11$ufhMNQO3t2KxumMd9e6acecB1EiYa5Sjj./X37XUzXX7624DhwMgG', 'MISS', 'PARITAD1000', 'LAST1000', NULL, NULL, 1, '-', '-', 2, NULL, 0, 0, NULL, '2019-07-30 22:05:50', 3, NULL, NULL),
(13, '016527', 'popinlive@gmail.com', '$2y$11$rEAWBg0K8ZDAp95q1dLkAedGUMh61dMlBFGI0xy3DGVWrAMUCKnsu', 'นาย', 'Paritad', 'Dadach', NULL, 1, 5, '016527', '016527', NULL, './assets/uploads/users/2566/b3dbfb69a86c016c480afff4eef5cfb9.PNG', 0, 0, NULL, NULL, NULL, NULL, NULL),
(12, 'education', 'education', '$2y$11$ufhMNQO3t2KxumMd9e6acecB1EiYa5Sjj./X37XUzXX7624DhwMgG', 'นาย', 'education', 'education', NULL, 1, 4, '094-637-9768', '1212', NULL, './assets/uploads/users/2566/061aa78f5026631f288011fc62f2f982.png', 0, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_members_level`
--

CREATE TABLE `tb_members_level` (
  `id` int(11) NOT NULL,
  `level_value` int(2) DEFAULT NULL COMMENT 'ตัวเลขระดับ',
  `level_title` varchar(50) DEFAULT NULL COMMENT 'คำอธิบาย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแสดงระดับสิทธิ์การเข้าใช้งานของสมาชิก';

--
-- Dumping data for table `tb_members_level`
--

INSERT INTO `tb_members_level` (`id`, `level_value`, `level_title`) VALUES
(1, 1, 'นักเรียน'),
(2, 2, 'ระดับสิทธิ์เจ้าหน้าที่'),
(3, 3, 'ผู้บริหาร ปปส'),
(4, 9, 'ระดับสิทธิ์ผู้ดูแลระบบ'),
(5, 4, 'ผู้อำนวยการ'),
(6, 5, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `tb_members_pass_forgot`
--

CREATE TABLE `tb_members_pass_forgot` (
  `encrypt_id` varchar(32) NOT NULL COMMENT 'email + date + encrypt + md5',
  `email` varchar(32) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `random_pass` varchar(8) NOT NULL COMMENT 'รหัสยืนยันลิงค์ในอีเมล',
  `active_time` datetime NOT NULL COMMENT 'สำหรับจับเวลา'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_members_prefix`
--

CREATE TABLE `tb_members_prefix` (
  `id` int(11) NOT NULL COMMENT 'ไอดี',
  `prefix_name` varchar(30) NOT NULL COMMENT 'คำนำหน้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางคำนำหน้า';

--
-- Dumping data for table `tb_members_prefix`
--

INSERT INTO `tb_members_prefix` (`id`, `prefix_name`) VALUES
(1, 'นาย'),
(2, 'นางสาว'),
(3, 'นาง'),
(4, 'ว่าที่ รต.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_members_question_forgot`
--

CREATE TABLE `tb_members_question_forgot` (
  `username` varchar(30) NOT NULL COMMENT 'อ้างอิงชื่อผู้ใช้งาน',
  `question` varchar(150) DEFAULT NULL COMMENT 'คำถาม',
  `answer` varchar(150) DEFAULT NULL COMMENT 'คำตอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บคำถาม สำหรับกรณีลืมรหัสผ่าน';

-- --------------------------------------------------------

--
-- Table structure for table `tb_uploads_filename`
--

CREATE TABLE `tb_uploads_filename` (
  `id` int(10) NOT NULL COMMENT 'ไอดี',
  `encrypt_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อไฟล์เข้ารหัส',
  `filename` varchar(250) DEFAULT NULL COMMENT 'ชื่อไฟล์ต้นฉบับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บรายชื่อไฟล์';

--
-- Dumping data for table `tb_uploads_filename`
--

INSERT INTO `tb_uploads_filename` (`id`, `encrypt_name`, `filename`) VALUES
(2, '5ac5bed7d754b4f5a13fd105220a889d.png', 'Screen_Shot_2022-04-07_at_11_40_33.png'),
(3, '3bdb01ba2f0f4dae935e1b5a44d88dc2.png', 'Screen_Shot_2022-04-08_at_09_37_55.png'),
(8, '724fcfecb10486a6329b47f2e1ab1ad4.png', 'niems_logo.png'),
(9, 'f5bdc1ce6011459b7fd1be6ca965b151.jpg', 's_cardiac3.jpg'),
(12, '4e2b7d8764452ba425e58e7b22d6fcd8.jpg', 'slide3.jpg'),
(14, '9caefad33eb6de4c0b2784e105be24e7.png', 'png-transparent-heart-health-heart-cardiovascular-disease-ecg-love-food-text.png'),
(19, 'a348571fa1a3523b5dc1b654f22de149.png', 'MU_Pop.png'),
(20, '2543239777391c57e6d7dd39fed341a2.png', 'MU_Pop.png'),
(25, '060e1fb1c85be4f313fad6f1024343b1.jpg', 'team-004.jpg'),
(26, '314d5927fdd44ab64a467232f8d0359b.jpg', 'team-002.jpg'),
(27, 'eda037649e90075c203f8e3ba130d0d0.jpg', 'team-003.jpg'),
(30, 'fc1114240febc99d482d63e942fd7927.jpg', 's_cardiac3.jpg'),
(36, 'fd6d6ec48c760eac2b73969626176466.png', 'Screen_Shot_2022-04-24_at_11_31_36.png'),
(37, 'e3c41cc62ae99ca6f5f75e654e66d80c.png', 'Screen_Shot_2022-04-24_at_11_31_36.png'),
(41, '5e4e528336f6b2364509617ae333982e.jpg', '3.jpg'),
(42, 'dcd0adefbbcbfc181289490adfc333a7.pdf', '00โครงการประชุม+FutureEarth+6สค63-ศูนย์ภูมิภาค.pdf'),
(45, 'cfe676be7a7668a1df0f87b77a34269c.jpg', 'Vintage-BW-Anatomical-Heart-GraphicsFairy-768x855.jpg'),
(46, 'c7737bd0d61813f514d4693daf1bc33c.png', 'why-choose-us-icon.png'),
(47, 'e757f7f008469e93e46c3158d710c2c0.xlsx', 'Patient_profile_list2022-04-25-12-10-53.xlsx'),
(48, '3e87988ebc75dffa60c43cd0a46d60ac.png', 'home_three_symptoms_003.png'),
(49, 'e2d2d3c681558fa76c590ace32d85d9c.jpg', 'Vintage-BW-Anatomical-Heart-GraphicsFairy-768x855.jpg'),
(50, '6b1a095ec0af9e944aa31ab2edecaf57.jpg', 'Vintage-BW-Anatomical-Heart-GraphicsFairy-768x855.jpg'),
(51, '140d90e8db0ea26b13f95c1d1d1cd00f.png', 'Tracking-Case.png'),
(53, '2f574c9a70a45d59bb97641c988b7d89.jpg', 'symptoms-of-heart-attack.jpg'),
(54, '4e08127ebe773597a47e10a13c00f0d9.jpg', '4__การกู้ชีพเบื้องต้น.jpg'),
(58, 'f7b033923ed05a32f328b42d3d733a39.jpg', '5__การรักษาโดยทีม.jpg'),
(59, 'ae2084b76d03910cc0f1d67fd39bd614.pdf', '2020-ปัจจัยที่มีผลต่อการรอดชีวิตของผู้ป่วยหัวใจหยุดเต้นนอกโรงพยาบาลที่เข้ารับการรักษา_ในโรงพยาบาลเชียงรายประชานุเคราะห์.pdf'),
(60, '432c76274536007a39ac4c4e7a3dc5ad.jpg', 'cover_issue_16936_th_TH_2.jpg'),
(61, '9b3d4b347bb162d7135cce987b28ce3a.pdf', '2020-ปัจจัยที่มีผลต่อการรอดชีวิตของผู้ป่วยหัวใจหยุดเต้นนอกโรงพยาบาลที่เข้ารับการรักษา_ในโรงพยาบาลเชียงรายประชานุเคราะห์.pdf'),
(62, '37481b0fab169ddbe22f216c30d185c6.jpg', 'Heart-attack-The-simple-exercise-found-to-lower-the-risk-of-the-deadly-condition-1290267.jpg'),
(63, 'fa4e61c98f501ded597af7621e4178c5.jpg', 'Heart-attack-The-simple-exercise-found-to-lower-the-risk-of-the-deadly-condition-1290267.jpg'),
(64, 'b67d17c1f726e7f7569fcf611b32e868.jpg', 'National_EMS.jpg'),
(65, '89b869a8a71eec82e4aeb99a9f05abd5.jpg', 'National_EMS_2.jpg'),
(66, 'a6e2476fcec9a4a4102c93351d3a53c6.jpg', 'National_EMS_2.jpg'),
(67, 'c793d24907f05c4503f8ecca4e773f78.jpg', 'สพฉ_1.jpg'),
(68, 'fd5feccb3a74299c959e4cdfa2b49ad1.jpg', 'สพฉ_1.jpg'),
(69, 'e828cc8780553328b8655ab59f95dc96.jpg', 'MOU.jpg'),
(70, 'dd8efca549f0b1dd4564fb20f1cf1d1f.jpg', 'เยี่ยมมวกเหล็ก.jpg'),
(71, '675c6129ef0f51b9023651c336d1db60.jpg', 'เยี่ยมสระบุรี.jpg'),
(73, '92f41c77f986ffad7b4db5179782c647.jpg', '2.jpg'),
(77, 'de5f8a4578f9535b059804cbb5d3c761.jpg', '5.jpg'),
(79, 'cb383a1926011f4330afccf3f880c652.jpg', '6.jpg'),
(80, '6a46b31dee6a4cbac28a1ffbc4ef1be2.jpg', '6.jpg'),
(81, 'd226a76bdd51a097020f0c27099a4f22.jpg', '7.jpg'),
(82, 'd1c4cce197eff749da6913d13c260e53.jpg', '8.jpg'),
(83, '572a9482604369ca629eb8d6350a1145.jpg', '9.jpg'),
(84, 'af3730bcb755d4d4810de8b86f56396f.jpg', '9.jpg'),
(85, '76c970ed1b56b8d131355f15e075995d.jpg', '10.jpg'),
(86, '6932964c191ee75c4c6014f737704e79.jpg', 'Heart_3D.jpg'),
(87, '86d3a03e3683ac169ea86dcf71efff52.png', 'Covic-19.png'),
(88, 'b99974cc95657335ba136799be95a60a.png', 'human-being-heart-Premium-vector-PNG.png'),
(89, 'f083c451e488d768ece55c6ee12929aa.png', 'Covic-19.png'),
(90, 'ef187ef3e40776dea2ba5d43f78d2904.png', 'human-being-heart-Premium-vector-PNG.png'),
(92, '6bb9472c9884eee8349b2549a48a281e.jpg', 'การช่วยฟื้นคืนชีพขั้นพื้นฐาน.jpg'),
(93, '93b485a9d95d7cc6fe491b0dfd82dcba.pdf', 'คู่มือสำหรับประชาชนในการช่วยชีวิตผู้ป่วยฉุกเฉิน_ที่มีภาวะหัวใจหยุดเต้นด้วยเครื่อง_เอ_อี_ดี.pdf'),
(94, '0692d49f8c3e014a99bbcd3e515e16da.jpg', 'การช่วยฟื้นคืนชีพขั้นพื้นฐาน.jpg'),
(95, '26ddbbbb0d57b2e780655489c128e5f5.pdf', 'คู่มือสำหรับประชาชนในการช่วยชีวิตผู้ป่วยฉุกเฉิน_ที่มีภาวะหัวใจหยุดเต้นด้วยเครื่อง_เอ_อี_ดี.pdf'),
(96, '4954532775abb5dce1b91fc69369f149.jpg', 'Cardiac_Arrest-Picture.jpg'),
(97, '9a95bc196b8d08224672d01383287fb4.jpg', 'Cardiac_Arrest-Picture.jpg'),
(98, '737e42ac450cbd610fb4509259d6c001.jpg', 'Cardiac_Arrest-Picture.jpg'),
(99, '6bb96a11db89bd4a242b4ca82457523b.jpg', 'Cardiac_Arrest-Picture.jpg'),
(100, '00ee63d19ed9f62ada7b27d8a88c3a9d.jpg', 'Cardiac_Arrest-Picture.jpg'),
(101, 'e98c29815d39b53f8a3f91fabd6225ab.jpg', 'Cardiac_Arrest-Picture.jpg'),
(102, 'b11510732f2576a42d44ac7c49adb43e.jpg', 'Cardiac_Arrest-Picture.jpg'),
(103, 'b44529e0685e4d4184955e38b095cfc1.pdf', '25640526145313PM_ภาวะหัวใจหยุดเต้นเฉียบพลัน(Sudden_Cardiac_Arrest).pdf'),
(104, '98d408f582b4d6adff93555fc173a02b.jpg', 'cover_issue_17424_th_TH.jpg'),
(105, '01431e519b8271da9822f65738fb602c.pdf', 'ปัจจัยเสี่ยงต่อการเกิดภาวะกล้ามเนื้อหัวใจขาดเลือดเฉียบพลัน.pdf'),
(106, 'a9a4455f2004fb9fde08a0906c0066fb.jpg', 'ต้น.jpg'),
(107, '237635e8067c25e33887ec36e542f9c7.png', '9.png'),
(108, 'afedcf3b7146861a524402b9c86f6c6c.png', 'Screen_Shot_2022-05-10_at_09_19_56.png'),
(109, '47b684d11f21698565bc774a041e9512.png', 'Screen_Shot_2022-05-09_at_23_28_18.png'),
(110, '6d1a10edad6a8c2753b473c5ec6e1bc5.docx', 'PDCA.docx'),
(111, 'b54638b654570abf6008a4fe74708cbb.png', 'alcohol-drugs-removebg-preview.png'),
(113, '24dc40521fdc2d262b35821086c3dfdf.jpg', '19-SlideShow.jpg'),
(114, '22510949dce25c5d498ce3bcca894ea2.jpg', '12-ฺSlideShow.jpg'),
(115, '6a0c9fda6e6d6cb51efa8ab88f317a8e.jpg', 'สาระสำคัญ.jpg'),
(116, 'b9b55d08524cf67a0f817e10594a4e8f.jpg', 'กัญชง.jpg'),
(117, '397dabdcb0bc61ee9e27780076a3c76f.jpg', 'กัญชง.jpg'),
(118, 'd846f5f9ca1cc1c9e8461b3682c421d1.jpg', '18-SlideShow.jpg'),
(119, '25b90d9640a9a42bacc29d248a1b49b2.png', '1-Family_Support-removebg-preview.png'),
(120, 'bdb1b88e19da126f22abf6fe26960953.png', '2-Addition-removebg-preview.png'),
(121, '72d5f2302ee7e999a7e7b53d17393430.png', '3-Support_System-removebg-preview.png'),
(122, 'b37148cb3e2fb56e820e679fdbe85d4b.png', '4-Recovery-removebg-preview.png'),
(123, '074de3da771a53fd372cb0e038fcad31.png', '5-treatment-removebg-preview.png'),
(124, 'fe945425fcc2cd7bdc1482e7abfef761.jpg', '1-เห็นคุณค่าในตนเองและผู้อื่น.jpg'),
(125, 'bf66e06e03243ca28bb718cd6c590252.jpg', '2-คิดวิเคราะห์_ตัดสินใจ.jpg'),
(126, 'eeb448e21f3abb96683b2bfef838089c.jpg', '3-อารมณ์และความเครียด.jpg'),
(127, '3665abedead78f7c7a5917c1b86adfe0.jpg', '4-สัมพันธ์ที่ดีกับผู้อื่น.jpg'),
(128, 'dd7aa0d88c4059fb295f3668d00685ad.png', 'วิธีหลีกหนียาเสพติด.png'),
(129, '7f0acf02e1091c0f273abc79199beeae.jpg', '20221113-01_oncbthai_01.jpg'),
(130, '4fe6fe9dcbba3b4d017a9b68cec55909.jpg', 'prayut11-30-06-65-9.jpg'),
(131, '06a412cbfa39e365f29506032baeeb4b.jpg', '304807405_5736714583027298_1515106276609136406_n.jpg'),
(132, '9713e0842d5a0ec8c2e7e78dd8365426.png', 'a.png'),
(133, '061aa78f5026631f288011fc62f2f982.png', 'b.png'),
(134, '5becf5b516b68052f93ee1be0943c0d8.png', 'b.png'),
(135, 'b3dbfb69a86c016c480afff4eef5cfb9.PNG', 'IMG_4126.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `thai_provinces`
--

CREATE TABLE `thai_provinces` (
  `id` int(11) NOT NULL,
  `PROVINCE_CODE` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_distance`
--

CREATE TABLE `time_distance` (
  `itme_distance_id` int(11) NOT NULL COMMENT 'ID',
  `service_information_id` int(11) DEFAULT NULL,
  `incident_time` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่มีผู้พบเห็นเหตุการณ์ ',
  `incident_time_recrive` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่ได้รับแจ้งเหตุ ',
  `time_order` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่สั่งการ ',
  `base_time_start` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่ออกจากฐาน',
  `base_time_stop` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่ไปถึงที่เกิดเหตุ ',
  `time_of_leaving` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่ออกจากที่เกิดเหตุ',
  `time_to_hospital` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่ไปถึงโรงพยาบาล',
  `base_time_finish` int(11) DEFAULT NULL COMMENT 'เวลาที่ถึงฐาน ',
  `distance_base_scene` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ระยะทางจากฐานไปถึงที่เกิดเหตุ',
  `distance_to_hospital` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล ',
  `hospital_to_base` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='เวลาที่มีผู้พบเห็นเหตุการณ์ ';

--
-- Dumping data for table `time_distance`
--

INSERT INTO `time_distance` (`itme_distance_id`, `service_information_id`, `incident_time`, `incident_time_recrive`, `time_order`, `base_time_start`, `base_time_stop`, `time_of_leaving`, `time_to_hospital`, `base_time_finish`, `distance_base_scene`, `distance_to_hospital`, `hospital_to_base`) VALUES
(17, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 25, '99', '99', '99', '99', '99', '99', '99', 99, '99', '99', NULL),
(24, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 28, '12', '12', '12', '12', '12', '12', '12', 12, '12', '12', NULL),
(27, 29, '12', '11', '11', '11', '11', '11', '11', 11, '11', '11', NULL),
(28, 30, '1000', '1000', '1', '1', '1', '1', '11', 1, '1', '1', NULL),
(29, 31, '1', '1', '1', '1', '1', '1', '1', 1, '1', '1', NULL),
(30, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_information`
--

CREATE TABLE `treatment_information` (
  `treatment_information_id` int(11) NOT NULL,
  `service_information_id` int(11) NOT NULL,
  `rosc_time_save` int(11) DEFAULT NULL COMMENT 'การบันทึกเวลา ROSC (การกลับมามีสัญญาณชีพ) ครั้งแรกเมื่อทีมปฏิบัติการแพทย์ฉุกเฉินไปถึง[1=ทำ,2=ไม่ทำ,3=ไม่ทราบเวลา]',
  `cpr` int(11) DEFAULT NULL COMMENT 'การทำ CPR ของทีมปฏิบัติการแพทย์ฉุกเฉิน[1=ไม่ทำ,2=ทำ]',
  `time_cpr_start` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่เริ่ม CPR ณ จุดเกิดเหตุ',
  `time_cpr_end` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เวลาที่สิ้นสุดการ CPR ณ จุดเกิดเหตุ',
  `rosc_time_alert` int(11) DEFAULT NULL COMMENT 'การมี ROSC (การกลับมามีสัญญาณชีพ)[1=มี,2=ไม่มี]',
  `rta_have` int(11) DEFAULT NULL COMMENT 'มี[1=หลังจาก CPR โดยผู้พบเห็นเหตุการณ์,2=หลังจาก CPR โดยทีมปฏิบัติการแพทย์ฉุกเฉิน,3=หลังจากใช้ AED โดยผู้พบเห็นเหตุการณ์,4=หลังจากใช้ AED โดยทีมปฏิบัติการแพทย์ฉุกเฉิน,5=หลังจากทีมปฏิบัติการแพทย์ฉุกเฉินทำ Advanced  cardiac life support (การช่วยฟื้นคืนชีพระดับสูง)]',
  `cpr_rosc_nomal` int(11) DEFAULT NULL COMMENT 'การทำ CPR เพื่อให้ผู้ป่วยมีภาวะ ROSC คงที่[1=ณ จุดเกิดเหตุ,2=ณ จุดเกิดเหตุ - ทำต่อเนื่องในรถฉุกเฉิน,3=ณ จุดเกิดเหตุ – ทำต่อเนื่องในรถฉุกเฉิน - แผนกอุบัติเหตุและฉุกเฉินโรงพยาบาล]',
  `use_defibrillator` int(11) DEFAULT NULL COMMENT 'การใช้ Defibrillator[1=มี,2=ไม่มี]',
  `ekg` int(11) DEFAULT NULL COMMENT 'การประเมิน EKG หลังทำ CPR[1=Shockable rhythm (Pulseless Ventricular Fibrillation/ Ventricular Tachycardia),2= Non-shockable rhythm (Asystole / Pulseless Electrical Activity)]',
  `defibrillations_number` int(11) DEFAULT NULL COMMENT 'จำนวนครั้งการกระตุกหัวใจที่ได้รับ',
  `airway_opening` int(11) DEFAULT NULL COMMENT 'การเปิดทางเดินหายใจ[1=ไม่ทำ,2=ทำ]',
  `airway_management` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'การจัดการทางเดินหายใจและการช่วยหายใจ (เลือกได้มากกว่า 1 ข้อ) [1=Non-definite airway เลือกประเภท,2=Definite airway เลือกประเภท,3=Oxygen cannula/mask,4=Bag-valve-mask ventilation,5=อื่น ๆ]',
  `non_definite_airway` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Non-definite airway[1=การจัดท่า เช่น Head tilt Chin lift Jaw thrust maneuver,2=Oral airway หรือ oropharyngeal airway (ท่อเปิดทางเดินหายใจทางปาก),3=Nasal airway หรือ nasopharyngeal airway (ท่อเปิดทางเดินหายใจทางจมูก), 4=Laryngeal mask airway (LMA) หรือหน้ากากครอบกล่องเสียง เป็นอุปกรณ์ช่วยหายใจเหนือสายเสียง (Supraglottic airway device)]',
  `definite_airway` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Definite airway[1=Endotracheal tube (ใส่ท่อช่วยหายใจ),2=Nasotracheal tube (ใส่ท่อช่วยหายใจทางจมูก),3=Surgical airway (เช่น เจาะคอ)]',
  `stop_bleeding` int(11) DEFAULT NULL COMMENT 'การ Stop bleeding (การห้ามเลือด)[1=ไม่ทำ,2=ทำ]',
  `intravenous_fluid` int(11) DEFAULT NULL COMMENT 'การให้สารน้ำทางหลอดเลือดดำ[1=ไม่ให้,2=ให้ ระบุประเภท และ อัตราการไหลต่อชั่วโมง]',
  `intravenous_fluid_yes` int(11) DEFAULT NULL COMMENT 'ให้[1=''0_9% Nacl'',2=Acetar,3=Lactate ringer,4=อื่นๆ]',
  `intravenous_fluid_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ',
  `drug` int(11) DEFAULT NULL COMMENT 'การให้ยา[1=ไม่ให้,2=ให้ ระบุประเภท]',
  `drag_yes` int(11) DEFAULT NULL COMMENT 'ให้[1=Adrenaline,2=Atropine,3=Cordarone,4=อื่นๆ]',
  `drug_remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ ระบุ',
  `hkw_local` int(11) DEFAULT NULL COMMENT 'การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) ณ จุดเกิดเหตุ[1=ไม่ทำ,2=ทำ]',
  `hkw_hospital` int(11) DEFAULT NULL COMMENT 'การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) อย่างต่อเนื่องจนถึงโรงพยาบาล[1=ไม่ทำ,2=ทำ]',
  `auto_cpr` int(11) DEFAULT NULL COMMENT 'เครื่อง Auto CPR[1=ไม่มีเครื่อง Auto CPR,2=มีเครื่อง Auto CPR]	',
  `auto_cpr_yes` int(11) DEFAULT NULL COMMENT 'มีเครื่อง Auto CPR[1=ไม่ใช้,2=ใช้]',
  `course_resuscitation` int(11) DEFAULT NULL COMMENT 'สาเหตุการหยุด Resuscitation[1=Loss of Spontaneous Circulation LOSC (ไม่มีสัญญาณชีพกลับมา),2=Living will (หนังสือแสดงเจตนาปฏิเสธการรักษาพยาบาล),3=Return of Spontaneous Circulation ROSC (กลับมามีสัญญาณชีพ)]',
  `cpr_output` int(11) DEFAULT NULL COMMENT 'ผลลัพธ์การ CPR[1=ทุเลา,2=คงเดิม,3=เสียชีวิต ณ จุดเกิดเหตุ,4=เสียชีวิตขณะนำส่งโรงพยาบาล]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treatment_information`
--

INSERT INTO `treatment_information` (`treatment_information_id`, `service_information_id`, `rosc_time_save`, `cpr`, `time_cpr_start`, `time_cpr_end`, `rosc_time_alert`, `rta_have`, `cpr_rosc_nomal`, `use_defibrillator`, `ekg`, `defibrillations_number`, `airway_opening`, `airway_management`, `non_definite_airway`, `definite_airway`, `stop_bleeding`, `intravenous_fluid`, `intravenous_fluid_yes`, `intravenous_fluid_remark`, `drug`, `drag_yes`, `drug_remark`, `hkw_local`, `hkw_hospital`, `auto_cpr`, `auto_cpr_yes`, `course_resuscitation`, `cpr_output`) VALUES
(2, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 25, 1, 1, '12', '12', 1, NULL, 1, NULL, 1, 12, 1, '1,2,3,5', '1,2,3', '1,2', 1, 1, NULL, '', 1, NULL, '', 1, 1, 1, NULL, 1, 1),
(9, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 36, 1, 1, '1', '1', 0, 1, 1, 1, 1, 1, 1, '1', '1', '0', 1, 1, 0, '1', 1, 1, '1', 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment1`
--
ALTER TABLE `assessment1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment2`
--
ALTER TABLE `assessment2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment3`
--
ALTER TABLE `assessment3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment4`
--
ALTER TABLE `assessment4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_form`
--
ALTER TABLE `assessment_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assessment_code_2` (`assessment_code`),
  ADD KEY `assessment_code` (`assessment_code`);

--
-- Indexes for table `basic_information`
--
ALTER TABLE `basic_information`
  ADD PRIMARY KEY (`basic_information_id`);

--
-- Indexes for table `basic_resuscitation`
--
ALTER TABLE `basic_resuscitation`
  ADD PRIMARY KEY (`basic_resuscitation_id`);

--
-- Indexes for table `cardiac_arrest`
--
ALTER TABLE `cardiac_arrest`
  ADD PRIMARY KEY (`cardiac_arrest_id`);

--
-- Indexes for table `ca_symptoms`
--
ALTER TABLE `ca_symptoms`
  ADD PRIMARY KEY (`ca_symptoms_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `cms_about_us`
--
ALTER TABLE `cms_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_cardiac_arrest_slide`
--
ALTER TABLE `cms_cardiac_arrest_slide`
  ADD PRIMARY KEY (`cms_cardiac_arrest_id`);

--
-- Indexes for table `cms_category`
--
ALTER TABLE `cms_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_ca_basic_info`
--
ALTER TABLE `cms_ca_basic_info`
  ADD PRIMARY KEY (`ca_basic_info`);

--
-- Indexes for table `cms_ca_resuscitation`
--
ALTER TABLE `cms_ca_resuscitation`
  ADD PRIMARY KEY (`ca_resuscitation_id`);

--
-- Indexes for table `cms_contact_us`
--
ALTER TABLE `cms_contact_us`
  ADD PRIMARY KEY (`cms_contact_us_id`);

--
-- Indexes for table `cms_faq`
--
ALTER TABLE `cms_faq`
  ADD PRIMARY KEY (`cms_faq_id`);

--
-- Indexes for table `cms_posts`
--
ALTER TABLE `cms_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_researchs`
--
ALTER TABLE `cms_researchs`
  ADD PRIMARY KEY (`cms_researchs_id`);

--
-- Indexes for table `cms_slide`
--
ALTER TABLE `cms_slide`
  ADD PRIMARY KEY (`cms_slide_id`);

--
-- Indexes for table `cms_teams`
--
ALTER TABLE `cms_teams`
  ADD PRIMARY KEY (`cms_team_id`);

--
-- Indexes for table `context_factor`
--
ALTER TABLE `context_factor`
  ADD PRIMARY KEY (`context_factor_id`);

--
-- Indexes for table `delivery_information`
--
ALTER TABLE `delivery_information`
  ADD UNIQUE KEY `service_information_id` (`service_information_id`);

--
-- Indexes for table `event_information`
--
ALTER TABLE `event_information`
  ADD PRIMARY KEY (`event_information_id`);

--
-- Indexes for table `immune_factor`
--
ALTER TABLE `immune_factor`
  ADD PRIMARY KEY (`immune_factor_id`);

--
-- Indexes for table `patient_profile`
--
ALTER TABLE `patient_profile`
  ADD PRIMARY KEY (`patient_profile_id`),
  ADD UNIQUE KEY `service_information_id` (`service_information_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_data`
--
ALTER TABLE `result_data`
  ADD PRIMARY KEY (`result_data_id`);

--
-- Indexes for table `risk_behavior`
--
ALTER TABLE `risk_behavior`
  ADD PRIMARY KEY (`risk_behavior_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`),
  ADD UNIQUE KEY `services_name` (`services_name`);

--
-- Indexes for table `service_information`
--
ALTER TABLE `service_information`
  ADD PRIMARY KEY (`service_information_id`);

--
-- Indexes for table `service_information_users`
--
ALTER TABLE `service_information_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_name`
--
ALTER TABLE `table_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_addr_province`
--
ALTER TABLE `tb_addr_province`
  ADD PRIMARY KEY (`PROVINCE_ID`);

--
-- Indexes for table `tb_assessment_01`
--
ALTER TABLE `tb_assessment_01`
  ADD PRIMARY KEY (`assessment_id`);

--
-- Indexes for table `tb_ci_log_delete`
--
ALTER TABLE `tb_ci_log_delete`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_ci_log_history`
--
ALTER TABLE `tb_ci_log_history`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`dpm_id`);

--
-- Indexes for table `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_members_level`
--
ALTER TABLE `tb_members_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_members_pass_forgot`
--
ALTER TABLE `tb_members_pass_forgot`
  ADD PRIMARY KEY (`encrypt_id`);

--
-- Indexes for table `tb_members_prefix`
--
ALTER TABLE `tb_members_prefix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_members_question_forgot`
--
ALTER TABLE `tb_members_question_forgot`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_uploads_filename`
--
ALTER TABLE `tb_uploads_filename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thai_provinces`
--
ALTER TABLE `thai_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_distance`
--
ALTER TABLE `time_distance`
  ADD PRIMARY KEY (`itme_distance_id`),
  ADD UNIQUE KEY `service_information_id` (`service_information_id`);

--
-- Indexes for table `treatment_information`
--
ALTER TABLE `treatment_information`
  ADD PRIMARY KEY (`treatment_information_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment1`
--
ALTER TABLE `assessment1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `assessment2`
--
ALTER TABLE `assessment2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `assessment3`
--
ALTER TABLE `assessment3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `assessment4`
--
ALTER TABLE `assessment4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `assessment_form`
--
ALTER TABLE `assessment_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `basic_information`
--
ALTER TABLE `basic_information`
  MODIFY `basic_information_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT for table `basic_resuscitation`
--
ALTER TABLE `basic_resuscitation`
  MODIFY `basic_resuscitation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cardiac_arrest`
--
ALTER TABLE `cardiac_arrest`
  MODIFY `cardiac_arrest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ca_symptoms`
--
ALTER TABLE `ca_symptoms`
  MODIFY `ca_symptoms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cms_about_us`
--
ALTER TABLE `cms_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_cardiac_arrest_slide`
--
ALTER TABLE `cms_cardiac_arrest_slide`
  MODIFY `cms_cardiac_arrest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_category`
--
ALTER TABLE `cms_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_ca_basic_info`
--
ALTER TABLE `cms_ca_basic_info`
  MODIFY `ca_basic_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cms_ca_resuscitation`
--
ALTER TABLE `cms_ca_resuscitation`
  MODIFY `ca_resuscitation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_contact_us`
--
ALTER TABLE `cms_contact_us`
  MODIFY `cms_contact_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_faq`
--
ALTER TABLE `cms_faq`
  MODIFY `cms_faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_posts`
--
ALTER TABLE `cms_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cms_researchs`
--
ALTER TABLE `cms_researchs`
  MODIFY `cms_researchs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_slide`
--
ALTER TABLE `cms_slide`
  MODIFY `cms_slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cms_teams`
--
ALTER TABLE `cms_teams`
  MODIFY `cms_team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `context_factor`
--
ALTER TABLE `context_factor`
  MODIFY `context_factor_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT for table `event_information`
--
ALTER TABLE `event_information`
  MODIFY `event_information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `immune_factor`
--
ALTER TABLE `immune_factor`
  MODIFY `immune_factor_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_profile`
--
ALTER TABLE `patient_profile`
  MODIFY `patient_profile_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `result_data`
--
ALTER TABLE `result_data`
  MODIFY `result_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `risk_behavior`
--
ALTER TABLE `risk_behavior`
  MODIFY `risk_behavior_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_information`
--
ALTER TABLE `service_information`
  MODIFY `service_information_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `service_information_users`
--
ALTER TABLE `service_information_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_name`
--
ALTER TABLE `table_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_addr_province`
--
ALTER TABLE `tb_addr_province`
  MODIFY `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_assessment_01`
--
ALTER TABLE `tb_assessment_01`
  MODIFY `assessment_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ประเมิน';

--
-- AUTO_INCREMENT for table `tb_ci_log_delete`
--
ALTER TABLE `tb_ci_log_delete`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tb_ci_log_history`
--
ALTER TABLE `tb_ci_log_history`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `dpm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_members_level`
--
ALTER TABLE `tb_members_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_members_prefix`
--
ALTER TABLE `tb_members_prefix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_uploads_filename`
--
ALTER TABLE `tb_uploads_filename`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `thai_provinces`
--
ALTER TABLE `thai_provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_distance`
--
ALTER TABLE `time_distance`
  MODIFY `itme_distance_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `treatment_information`
--
ALTER TABLE `treatment_information`
  MODIFY `treatment_information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

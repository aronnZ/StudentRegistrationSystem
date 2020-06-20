-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-06-19 10:04:49
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `systemdb`
--

-- --------------------------------------------------------

--
-- 表的结构 `administrator`
--

CREATE TABLE `administrator` (
  `ID` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shtdwn_flag` tinyint(1) DEFAULT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `semester` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `administrator`
--

INSERT INTO `administrator` (`ID`, `password`, `shtdwn_flag`, `year`, `semester`) VALUES
('A12345678', '123456', 1, '2019', 'Fall');

-- --------------------------------------------------------

--
-- 表的结构 `advisor`
--

CREATE TABLE `advisor` (
  `stu_id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `prof_id` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `course_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fee` decimal(4,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`course_id`, `title`, `dept_name`, `fee`) VALUES
('BIO-101', 'Intro. to Biology', 'Biology', '130'),
('BIO-301', 'Genetics', 'Biology', '490'),
('BIO-399', 'Computational Biology', 'Biology', '330'),
('CS-101', 'Intro. to Computer Science', 'Comp. Sci.', '420'),
('CS-190', 'Game Design', 'Comp. Sci.', '410'),
('CS-315', 'Robotics', 'Comp. Sci.', '360'),
('CS-319', 'Image Processing', 'Comp. Sci.', '310'),
('CS-347', 'Database System Concepts', 'Comp. Sci.', '380'),
('P.E.-181', 'P.E ', 'P.E.', '310'),
('FORE-201', 'Investment Banking', 'ForeLans', '310'),
('HIS-351', 'World History', 'History', '345'),
('ART-199', 'Music Video Production', 'Art', '320'),
('PHY-101', 'Physical Principles', 'Physics', '490'),
('CS-821', 'Linux', 'Comp. Sci.', '420'),
('CS-424', 'System Struct', 'Comp. Sci.', '410'),
('CS-536', 'Computer Network', 'Comp. Sci.', '410'),
('CS-111', 'JAVA', 'Comp. Sci.', '420'),
('CS-222', 'C++', 'Comp. Sci.', '410'),
('CS-333', 'Data Struct', 'Comp. Sci.', '410'),
('CS-245', 'Operating System', 'Comp. Sci.', '500');

-- --------------------------------------------------------

--
-- 表的结构 `onlinepeople`
--

CREATE TABLE `onlinepeople` (
  `id` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `onlinepeople`
--

INSERT INTO `onlinepeople` (`id`) VALUES
('P00010101'),
('S00000128');

-- --------------------------------------------------------

--
-- 表的结构 `prereq`
--

CREATE TABLE `prereq` (
  `course_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `prereq_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `prereq`
--

INSERT INTO `prereq` (`course_id`, `prereq_id`) VALUES
('BIO-301', 'BIO-101'),
('BIO-399', 'BIO-101'),
('P.E.-181', 'PHY-101');

-- --------------------------------------------------------

--
-- 表的结构 `professor`
--

CREATE TABLE `professor` (
  `prof_id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `SSN` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `professor`
--

INSERT INTO `professor` (`prof_id`, `password`, `name`, `birthday`, `SSN`, `status`, `dept_name`) VALUES
('P00010101', '000000', 'Srinivasan', NULL, '12553', 'lecturer', 'Comp. Sci.'),
('P00012121', '000000', 'Wu', NULL, '12213', 'lecturer', 'Art'),
('P00015151', '000000', 'Mozart', NULL, '14213', 'lecturer', 'P.E.'),
('P00022222', '000000', 'Einstein', NULL, '65853', 'lecturer', 'Physics'),
('P00032343', '000000', 'El Said', NULL, '83773', 'lecturer', 'History'),
('P00033456', '000000', 'Gold', NULL, '12376', 'lecturer', 'Physics'),
('P00045565', '000000', 'Katz', NULL, '62553', 'lecturer', 'Comp. Sci.'),
('P00058583', '000000', 'Califieri', NULL, '26553', 'lecturer', 'History'),
('P00076543', '000000', 'Singh', NULL, '27823', 'lecturer', 'Art'),
('P00076766', '000000', 'Crick', NULL, '96553', 'lecturer', 'Biology'),
('P00083821', '000000', 'Brandt', NULL, '03553', 'lecturer', 'Comp. Sci.'),
('P00098345', '000000', 'Kim', NULL, '65453', 'lecturer', 'Mechanics'),
('P00088219', '000000', 'Franklin Pon', NULL, '12353', 'lecturer', 'Comp. Sci.'),
('P00025439', '000000', 'Tony Marvels', NULL, '52346', 'lecturer', 'Comp. Sci.'),
('P00055234', '000000', 'Kitty Wang', NULL, '53234', 'lecturer', 'Comp. Sci.'),
('P00000001', '000000', 'AASAAAA', NULL, '1232', 'prof', 'Sociology'),
('P00000002', '000000', '王子平', '1960-02-03', '004', 'prof', 'P.E.'),
('P00000003', '000000', '123213', '2020-06-18', '123123', 'prof', 'Inorganic Chemistry');

-- --------------------------------------------------------

--
-- 表的结构 `remember`
--

CREATE TABLE `remember` (
  `id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `remember`
--

INSERT INTO `remember` (`id`, `password`) VALUES
('S00000128', '000000'),
('P00010101', '000000'),
('A12345678', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `section`
--

CREATE TABLE `section` (
  `course_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sec_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `year` decimal(4,0) NOT NULL,
  `building` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day` decimal(1,0) DEFAULT NULL,
  `time_slot_id` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `section`
--

INSERT INTO `section` (`course_id`, `sec_id`, `semester`, `year`, `building`, `day`, `time_slot_id`) VALUES
('BIO-101', 'BIO-1011219', 'Summer', '2019', 'Painter', '5', 'B'),
('BIO-301', 'BIO-3011220', 'Summer', '2020', 'Painter', '5', 'A'),
('CS-101', 'CS-1011319', 'Fall', '2019', 'Packard', '1', 'A'),
('PHY-101', 'PHY-1011319', 'Fall', '2019', 'Watson', '1', 'A'),
('CS-347', 'CS-3471319', 'Fall', '2019', 'Taylor', '1', 'A'),
('CS-101', 'CS-1011120', 'Spring', '2020', 'Packard', '1', 'F'),
('CS-315', 'CS-3151120', 'Spring', '2020', 'Watson', '1', 'F'),
('CS-190', 'CS-1901119', 'Spring', '2019', 'Taylor', '1', 'F'),
('CS-190', 'CS-1902119', 'Spring', '2019', 'Taylor', '3', 'A'),
('CS-319', 'CS-3191120', 'Spring', '2020', 'Watson', '1', 'B'),
('CS-319', 'CS-3192120', 'Spring', '2020', 'Taylor', '3', 'C'),
('P.E.-181', 'P.E.-1811119', 'Spring', '2019', 'Taylor', '3', 'C'),
('FORE-201', 'FORE-2011120', 'Spring', '2020', 'Packard', '1', 'B'),
('HIS-351', 'HIS-3511120', 'Spring', '2020', 'Painter', '5', 'C'),
('ART-199', 'ART-1991120', 'Spring', '2020', 'Packard', '1', 'D'),
('CS-821', 'CS-8211319', 'Fall', '2019', 'Taylor', '5', 'C'),
('CS-424', 'CS-4241319', 'Fall', '2019', 'Taylor', '3', 'C'),
('CS-536', 'CS-5361319', 'Fall', '2019', 'Painter', '2', 'E'),
('CS-111', 'CS-1111319', 'Fall', '2019', 'Taylor', '5', 'C'),
('CS-222', 'CS-2221319', 'Fall', '2019', 'Taylor', '3', 'C'),
('CS-333', 'CS-3331319', 'Fall', '2019', 'Painter', '2', 'E'),
('CS-245', 'CS-2451319', 'Fall', '2019', 'Painter', '2', 'B');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `stu_id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `SSN` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `graduation_date` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`stu_id`, `password`, `name`, `birthday`, `SSN`, `status`, `graduation_date`) VALUES
('S00000128', '000000', 'Zhang', NULL, '13123', 'bachelor', '2021'),
('S00012345', '000000', 'Shankar', NULL, '51134', 'master', '2021'),
('S00019991', '000000', 'Brandt', NULL, '11453', 'bachelor', '2021'),
('S00023121', '000000', 'Chavez', NULL, '41611', 'master', '2021'),
('S00044553', '000000', 'Peltier', NULL, '86555', 'master', '2021'),
('S00045678', '000000', 'Levy', NULL, '12656', 'bachelor', '2021'),
('S00054321', '000000', 'Williams', NULL, '56786', 'bachelor', '2021'),
('S00055739', '000000', 'Sanchez', NULL, '15789', 'doctor', '2021'),
('S00070557', '000000', 'Snow', NULL, '08755', 'doctor', '2021'),
('S00076543', '000000', 'Brown', NULL, '47998', 'master', '2021'),
('S00076653', '000000', 'Aoi', NULL, '39031', 'doctor', '2021'),
('S00098765', '000000', 'Bourikas', NULL, '89345', 'bachelor', '2021'),
('S00098988', '000000', 'Tanaka', NULL, '27821', 'master', '2021'),
('S00052345', '000000', 'Kuangni', NULL, '14523', 'bachelor', '2021'),
('S00053473', '000000', 'Patrical', NULL, '51141', 'master', '2021'),
('S00022241', '000000', 'Winstien', NULL, '14523', 'bachelor', '2021'),
('S00000003', '000000', '111', '2020-06-15', '231232', NULL, '2020-09-19'),
('S00000001', '000000', '1112132', '2020-06-15', '12412', NULL, '2020-06-23');

-- --------------------------------------------------------

--
-- 表的结构 `takes`
--

CREATE TABLE `takes` (
  `stu_id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sec_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `year` decimal(4,0) NOT NULL,
  `grade` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `takes`
--

INSERT INTO `takes` (`stu_id`, `course_id`, `sec_id`, `semester`, `year`, `grade`, `flag`) VALUES
('S00000128', 'CS-101', 'CS-1011319', 'Fall', '2019', 'A', '0'),
('S00012345', 'CS-101', 'CS-1011319', 'Fall', '2019', 'C', '0'),
('S00045678', 'CS-101', 'CS-1011319', 'Fall', '2019', 'F', '1'),
('S00054321', 'CS-101', 'CS-1011319', 'Fall', '2019', 'A', '0'),
('S00076543', 'CS-101', 'CS-1011319', 'Fall', '2019', 'A', '0'),
('S00098765', 'CS-101', 'CS-1011319', 'Fall', '2019', 'C', '0'),
('S00000128', 'CS-111', 'CS-1111319', 'Fall', '2019', NULL, '0'),
('S00088219', 'CS-111', 'CS-1111319', 'Fall', '2019', NULL, '0'),
('S00025439', 'CS-111', 'CS-1111319', 'Fall', '2019', NULL, '0'),
('S00055234', 'CS-111', 'CS-1111319', 'Fall', '2019', NULL, '0'),
('S00088219', 'CS-222', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00025439', 'CS-222', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00055234', 'CS-222', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00012345', 'CS-222', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00045678', 'CS-222', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00054321', 'CS-222', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00088219', 'CS-333', 'CS-3331319', 'Fall', '2019', NULL, '0'),
('S00025439', 'CS-333', 'CS-3331319', 'Fall', '2019', NULL, '0'),
('S00055234', 'CS-333', 'CS-3331319', 'Fall', '2019', NULL, '0'),
('S00012345', 'CS-333', 'CS-3331319', 'Fall', '2019', NULL, '0'),
('S00045678', 'CS-333', 'CS-3331319', 'Fall', '2019', NULL, '0'),
('S00054321', 'CS-333', 'CS-3331319', 'Fall', '2019', NULL, '0'),
('S00012345', 'CS-245', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00045678', 'CS-245', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00088219', 'CS-245', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00025439', 'CS-245', 'CS-2451319', 'Fall', '2019', NULL, '0'),
('S00000128', 'CS-245', 'CS-2451319', 'Fall', '2019', NULL, '0');

-- --------------------------------------------------------

--
-- 表的结构 `teaches`
--

CREATE TABLE `teaches` (
  `prof_id` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sec_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `year` decimal(4,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `teaches`
--

INSERT INTO `teaches` (`prof_id`, `course_id`, `sec_id`, `semester`, `year`) VALUES
('P00010101', 'CS-101', 'CS-1011319', 'Fall', '2019'),
('P00025439', 'CS-333', 'CS-3331319', 'Fall', '2019'),
('P00055234', 'CS-245', 'CS-2451319', 'Fall', '2019'),
('P00083821', 'CS-190', 'CS-1901119', 'Spring', '2019'),
('P00088219', 'CS-111', 'CS-1111319', 'Fall', '2019');

-- --------------------------------------------------------

--
-- 表的结构 `time_slot`
--

CREATE TABLE `time_slot` (
  `time_slot_id` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `start_hr` decimal(2,0) DEFAULT NULL,
  `start_min` decimal(2,0) DEFAULT NULL,
  `end_hr` decimal(2,0) DEFAULT NULL,
  `end_min` decimal(2,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `time_slot`
--

INSERT INTO `time_slot` (`time_slot_id`, `start_hr`, `start_min`, `end_hr`, `end_min`) VALUES
('A', '8', '0', '8', '50'),
('B', '9', '0', '9', '50'),
('C', '10', '0', '10', '50'),
('D', '11', '0', '11', '50'),
('E', '13', '0', '13', '50'),
('F', '14', '0', '14', '50'),
('G', '15', '0', '15', '50'),
('H', '16', '0', '16', '50'),
('I', '18', '0', '20', '0');

--
-- 转储表的索引
--

--
-- 表的索引 `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `prof_id` (`prof_id`);

--
-- 表的索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- 表的索引 `onlinepeople`
--
ALTER TABLE `onlinepeople`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `prereq`
--
ALTER TABLE `prereq`
  ADD PRIMARY KEY (`course_id`,`prereq_id`),
  ADD KEY `prereq_id` (`prereq_id`);

--
-- 表的索引 `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`prof_id`);

--
-- 表的索引 `remember`
--
ALTER TABLE `remember`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`course_id`,`sec_id`,`semester`,`year`);

--
-- 表的索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- 表的索引 `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`stu_id`,`course_id`,`sec_id`,`semester`,`year`),
  ADD KEY `course_id` (`course_id`,`sec_id`,`semester`,`year`);

--
-- 表的索引 `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`prof_id`,`course_id`,`sec_id`,`semester`,`year`),
  ADD KEY `course_id` (`course_id`,`sec_id`,`semester`,`year`);

--
-- 表的索引 `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`time_slot_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

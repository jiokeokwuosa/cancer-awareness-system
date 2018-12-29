-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 01:15 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `access_level` int(11) NOT NULL,
  `access_name` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`access_level`, `access_name`) VALUES
(1, 'User'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `login_id` varchar(13) NOT NULL,
  `submit_date` varchar(60) NOT NULL,
  `article_text` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `login_id`, `submit_date`, `article_text`) VALUES
(1, 'jioke', '2017-06-15 13:58:16', 'Cancer is the second leading cause of death in the world after cardiovascular diseases. Half of men and one third of women in the United States will develop cancer during their lifetimes.\r\nToday, millions of cancer people extend their life due to early identification and treatment. Cancer is not a new disease and as afflicted people throughout the world. The word cancer came from a Greek words karkinos to describe carcinoma tumors by a physician Hippocrates (460-370 B.C), but he was not the first to discover this disease. Some of the earliest evidence of human bone cancer was found in mummies in ancient Egypt and in ancient manuscripts dates about 1600 B.C. '),
(2, 'chi', '2017-06-16 14:29:11', 'The world’s oldest recorded case of breast cancer hails from ancient Egypt in 1500 BC and it was recorded that there was no treatment for the cancer, only palliative treatment. According\r\nto inscriptions, surface tumors were surgically removed in a similar manner as they are removed today.\r\n'),
(3, 'presdo', '2017-06-16 14:58:42', 'Cancer develops when normal cells in a particular part of the body begin to grow out of control. There are different types of cancers; all types of cancer cells continue to grow, divide and re-divide instead of dying and form new abnormal cells. Some types of cancer cells often travel to other parts of the body through blood circulation or lymph vessels (metastasis), where they begin to grow. '),
(5, 'obiano', '2017-06-18 11:47:19', 'For example when a breast cancer cell spread to liver through blood circulation, the cancer is still called as breast cancer, not a liver cancer. Generally cancer cells develop from normal cells due to damage of DNA. Most of the time when ever DNA was damaged, the body is able to repair it, unfortunately in cancer cells, damaged DNA is not repaired. '),
(6, 'max', '2017-06-18 11:52:57', 'Transcripts of students are prepared manually by the record officer and teachers. Report cards are produced by the home-room teachers. Attendance of students is recorded by the home-room teachers. In order to control absentees and know the number of days that a student has been absent from The school during the school days the attendance officer has to collect the attendance slips from the corresponding homeroom teachers and compile it which is also a time taking process. In addition to that retrieving records of students who have graduated couple of years ago has been a difficult task and the manual system also has difficulty of producing different reports which are required by the stakeholders such as teachers.'),
(7, 'jioke', '2017-06-18 11:55:30', 'Bulletin Board for Librarians (BUBL), is one of the registered BBS on Joint Academic Network (JANET), UK, designed to be accessed and used in interactive mode. BUBL was designed using Userbul software, produced by Leicester University, England. This interface allows the users to move easily between files within the bulletin board. Since the datasets are arranged hierarchically, users need not \\\'climb\\\' or \\\'descend\\\' through menus in order to reach files or menus they desire, for example the main menu can be recalled at any time, by typing \\\'M\\\' and pressing  Return key  as seen in Fig. 1. '),
(8, 'obiano', '2017-06-18 11:56:49', 'American Chemical Society (ACS), Organic Chemistry Division and Chemical Abstracts Service and STN International have jointly designed and implemented a new BBS for chemists. It allows online meetings and to communicate with each other without physically travelling to a single location.'),
(9, 'max', '2017-06-18 12:00:04', 'Forums are a type of interactive website for holding discussions and posting user generated content. Each conversation has its own screen, with the original posting at the top, and responses listed in chronological order below. A sense of virtual community often develops around forums that have regular users. Forums differ from chat rooms and instant messaging because forum participants do not have to be online at the same time; they suit short posts, which request a response from others. Due to the possibility of members missing replies to threads they are interested in, forums usually offer an ‘e-mail notification’ so that users can easy know when they have a reply.'),
(10, 'presdo', '2017-06-18 18:28:30', 'From the review of literature above, I understood that bulletin board system has been in use for some time in various areas of life, especially the education and business sector, but religious organizations have been lacking behind in this new trend and thus my desire to contribute my little quota in fixing the gap. Religious organizations must come to terms with this technology because it will help them so much in management and communication matters. Bulletin board system won’t be hard for religious organization to handle because it does not require much expertise; it only requires a basic understanding of how computer works.'),
(12, 'chi', '2017-08-14 05:04:28', 'Virchow proposed that chronic irritation was the cause of cancer. Later Thiersch was showed that cancers metastasize through the spread of malignant cells and not through some unidentified fluid.'),
(18, 'presdo', '2017-08-14 07:26:42', 'The methodology adopted for this project is Object Oriented Hypermedia Design Methodology (OOHDM). OOHDM (Object Oriented Hypermedia Design Method) is a method for the development of Web applications. \r\nThe Object-Oriented Hypermedia Design Method is a model-based approach for building hypermedia applications. It comprises four different activities namely conceptual design, navigational design, abstract interface design and implementation.\r\n'),
(19, 'chacha', '2017-08-14 07:26:54', 'Muller demonstrated that cancer is made up of cells but not with lymph in 1838. His student, Virchow (1821-1902) determined that all cells including cancer cells were derived from\r\nother cells.\r\n'),
(20, 'uche', '2017-08-14 07:30:22', 'Hippocrates believed that the body contained 4 humors (body fluids), (a) blood, (b) phlegm, (c) yellow bile and (d) black bile. Any imbalance of these fluids will result in disease and excess of black bile in a particular organ site was thought tocause cancer. '),
(21, 'chi', '2017-08-14 07:34:47', 'Not all tumors are cancerous, some tumors are benign (non-cancerous). Benign tumors do not grow and are not life threatening. Different types of cancer cells can behave differently'),
(22, 'jay', '2017-08-14 07:41:12', 'Many times though, a person’s DNA becomes damaged by exposure to something in the environment, like smoking.\r\nCancer generally forms as a solid tumor. Some cancers like leukemia (blood cancer) do not form tumors. Instead, leukemia cells involve the blood and blood forming organs and circulate through other tissues where they grow'),
(25, 'presdo', '2017-09-05 01:11:07', 'Cancer develops when normal cells in a particular part of the body begin to grow out of control. There are different types of cancers; all types of cancer cells continue to grow, divide and re-divide instead of dying and form new abnormal cells. Some types of cancer cells often travel to other parts of the body through blood circulation or lymph vessels (metastasis), where they begin to grow. '),
(26, 'jioke', '2017-09-22 18:34:42', 'Some of the earliest evidence of human bone cancer was found in mummies in ancient Egypt and in ancient manuscripts dates about 1600 B.C. The world’s oldest recorded case of breast cancer hails from ancient Egypt in 1500 BC and it was recorded that there was no treatment for the cancer, only palliative treatment. '),
(36, 'chi', '29 Oct 2017 @ 02: 28: 05', 'Cancer is the second leading cause of death in the world after cardiovascular diseases. Half of men and one third of women in the United States will develop cancer during their lifetimes.\r\nToday, millions of cancer people extend their life due to early identification and treatment. Cancer is not a new disease and as afflicted people throughout the world. The word cancer came from a Greek words karkinos to describe carcinoma tumors by a physician Hippocrates (460-370 B.C), but he was not the first to discover this disease. ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `article_id` varchar(3) NOT NULL,
  `login_id` varchar(12) NOT NULL,
  `comment_date` varchar(60) NOT NULL,
  `comment_text` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `login_id`, `comment_date`, `comment_text`) VALUES
(1, '3', 'jioke', '2017-06-16 17:12:57', 'This chapter presents an overview of previous work on related topics that provide the necessary background for the purpose of this research and to give some ideas of the fundamentals, also web forum is could be seen as a part of an interactive web community and social web, for that reason we review some works and concepts in that regards.'),
(2, '3', 'chi', '2017-06-16 17:21:33', 'Easy to use menus guide the new user through the bulletin boards. Some bulletin boards provide file transfer services. Rutgers Bulletin Board Service (Quartz, USA) and University of North Carolina (Samba, USA), Bulletin Board for Librarians (BUBL, UK), National information.'),
(3, '2', 'presdo', '2017-06-18 11:57:30', 'Please, this is bulletin board system'),
(4, '3', 'jioke', '2017-06-21 08:17:11', 'bgfnhgjmm'),
(5, '3', 'chacha', '2017-07-28 14:28:29', 'is not true'),
(6, '21', 'uche', '2017-08-14 07:35:12', 'read up, holigans'),
(12, '26', 'chi', '28 Oct 2017 @ 02: 57: 17', 'hope this is working fine?'),
(8, '21', 'jay', '2017-09-22 18:35:13', 'Forums are a type of interactive website for holding discussions and posting user generated content. Each conversation has its own screen, with the original posting at the top, and responses listed in chronological order below. A sense...'),
(9, '26', 'jioke', '2017-10-26 01:54:40', 'hahahah'),
(11, '26', 'jioke', '28 Oct 2017 @ 02: 55: 53', 'hope u entered?'),
(13, '36', 'jioke', '30 Oct 2017 @ 09: 14: 03', 'whats up?');

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `login_id` varchar(100) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`login_id`, `image_id`) VALUES
('obiano', 1),
('chi', 2),
('presdo', 6),
('jioke', 14),
('jay', 8),
('uche', 9),
('chacha', 19),
('auto', 18),
('max', 12),
('boss', 13);

-- --------------------------------------------------------

--
-- Table structure for table `image_table2`
--

CREATE TABLE `image_table2` (
  `id` int(11) NOT NULL,
  `image_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_table2`
--

INSERT INTO `image_table2` (`id`, `image_id`) VALUES
(3, '36'),
(4, '26');

-- --------------------------------------------------------

--
-- Table structure for table `user_info_table`
--

CREATE TABLE `user_info_table` (
  `login_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `marital_status` varchar(12) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` varchar(60) NOT NULL,
  `state` varchar(20) NOT NULL,
  `access_level` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_table`
--

INSERT INTO `user_info_table` (`login_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `marital_status`, `phone_number`, `address`, `state`, `access_level`) VALUES
('jioke', 'Chijioke', 'Okwuosa', 'okwuosachijioke@gmail.com', '123', 'Male', 'Single', '07037381011', '22 Uke street Omagba', 'Anambra', '2'),
('chacha', 'Chioma', 'Okereke', 'Okaforjane@gmail.com', '123', 'Female', 'Single', '09076543254', '34 Ziks Avenue Awka', 'Imo', '1'),
('presdo', 'Chidi', 'Umelika', 'chidi@gmail.com', '123', 'Male', 'Single', '0705435678', '32 Oko Road osha', 'Anambra', '1'),
('obiano', 'Obinna', 'Okwuosa', 'postmaster@localhost', '123', 'Male', 'Single', '07037381011', '22 Uke street Omagba1', 'Anambra', '1'),
('jay', 'John', 'Okeke', 'johnokeke@yahoo.com', '123', 'Male', 'Single', '09065346678', '43 Uke Street Awka', 'Anambra', '1'),
('uche', 'Uche', 'Nweke', 'nwekeuche@gmail.com', '123', 'Female', 'Married', '09065346678', '22 Uke Street', 'Anambra', '1'),
('max', 'Chika', 'Maxwell', 'maxwellchika@gmail', '123', 'Female', 'Married', '09065346678', '22 Uke Street', 'Anambra', '1'),
('auto', 'Micheal', 'Book', 'micheal@yahoo.com', '123', 'Male', 'Married', '09065346678', '22 Uke Street', 'Imo', '1'),
('boss', 'Bosah', 'Okereke', 'okaforbosah@yahoo.com', '123', 'Male', 'Single', '0805675463', '23 Boks street', 'Anambra', '1'),
('chi', 'Blessing ', 'Ofoma', 'okaforbosah@yahoo.com', '123', 'Female', 'Single', '09065346678', '32 olo street', 'Anambra', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`access_level`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Indexes for table `image_table2`
--
ALTER TABLE `image_table2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info_table`
--
ALTER TABLE `user_info_table`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `image_table2`
--
ALTER TABLE `image_table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

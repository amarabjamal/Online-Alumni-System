-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 09:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `name`, `password`) VALUES
(1, 'admin@email.com', 'admin', '$2y$10$lleIxpo4NLjo/vTMunxsGeHmNVnbhPsyegJegTewblJvCrC9Rb7le');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `location`) VALUES
(1, 'ABC Company', 'Kuala Lumpur'),
(2, 'Another Company', 'Selangor'),
(3, 'XYZ Company', 'Penang'),
(9, 'Berjaya Sdn Bhd', 'Kuala Lumpur'),
(10, 'Kuala Lumpur Sdn Bhd', 'Kuala Lumpur');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Africa'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Argentina'),
(5, 'Armenia'),
(6, 'Australia'),
(7, 'Austria'),
(8, 'Bahrain'),
(9, 'Bangladesh'),
(10, 'Belgium'),
(11, 'Bhutan'),
(12, 'Brazil'),
(13, 'Brunei Darussalam'),
(14, 'Bulgaria'),
(15, 'Cambodia'),
(16, 'Canada'),
(17, 'Chile'),
(18, 'China'),
(19, 'Colombia'),
(20, 'Denmark'),
(21, 'Dominica'),
(22, 'Egypt'),
(23, 'Ethiopia'),
(24, 'Fiji'),
(25, 'Finland'),
(26, 'France'),
(27, 'Georgia'),
(28, 'Germany'),
(29, 'Greece'),
(30, 'Greenland'),
(31, 'Grenada'),
(32, 'Hungary'),
(33, 'Iceland'),
(35, 'India'),
(34, 'Indonesia'),
(36, 'Ireland'),
(37, 'Italy'),
(38, 'Jamaica'),
(39, 'Japan'),
(40, 'Jordan'),
(41, 'Kazakhstan'),
(42, 'Kuwait'),
(43, 'Liberia'),
(44, 'Libya'),
(45, 'Madagascar'),
(47, 'Malawi'),
(46, 'Malaysia'),
(48, 'Maldives'),
(49, 'Myanmar'),
(50, 'Nepal'),
(51, 'New Zealand'),
(52, 'Nigeria'),
(0, 'None'),
(53, 'Republic of Korea'),
(54, 'Saudi Arabia'),
(55, 'Singapore'),
(56, 'State of Palestine'),
(57, 'Turkey'),
(58, 'Ukraine'),
(59, 'United Kingdom of Great Britain and Northern Ireland'),
(60, 'United States of America'),
(61, 'Viet Nam'),
(62, 'Yemen'),
(63, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `venue_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `image_url`, `content`, `start_at`, `end_at`, `venue_id`, `admin_id`) VALUES
(17, 'Intel Event', 'images/event/60c984a06f4b68.92526090.png', '<p>Intel Innovation is where technical inspiration happens. Gain the perspectives and training required to shift what’s possible through technology—today and tomorrow. We’re serving up insights from today’s technical titans to help accelerate progress and redefine what’s possible. Connect with your peers. Polish your skills. Build your knowledge.</p>', '2021-06-25 07:00:00', '2021-06-25 08:00:00', 8, 1),
(18, 'Faculty of Engineering Meet-Up', 'images/event/60c8c33b7c1543.11151126.jpg', '<p>Join a group to meet people, make friends, find support, grow a business, and explore your interests. Thousands of events are happening every day, both online and in person!</p>', '2021-06-29 07:00:00', '2021-07-04 19:00:00', 12, 1),
(19, 'Conversations and Coffee', 'images/event/60c8c3bfca3650.22343103.jpg', '<p>Coffee is one of the world’s most popular beverages. Some claim it is the most widely consumed liquid in the world aside from water.</p><p>Coffee is more than a beverage, however. It is a memory, an anticipation, a lifetime of consoling moments of modest pleasure woven into our lives.</p>', '2021-06-16 09:00:00', '2021-06-16 12:00:00', 7, 1),
(20, 'Database Introductory Workshop', 'images/event/60c8c423835af4.49504769.jpg', '<p>On this course from the Raspberry Pi Foundation you’ll learn what databases are and why we use them, exploring how to use SQL to search and manipulate data.</p><p>Along the way, you’ll learn about primary keys and table relationships, as well as how to create joins to search multiple tables. In the final week, you’ll finish by grouping and looking at exporting data from the database.</p>', '2021-06-30 07:00:00', '2021-06-30 09:00:00', 19, 1),
(21, 'Introduction to Data Analysis', 'images/event/60c8c476dc5100.77542097.jpg', '<p><strong>Data analysis</strong> is defined as a process of cleaning, transforming, and modeling <strong>data</strong> to discover useful information for business decision-making. The purpose of <strong>Data Analysis</strong> is to extract useful information from <strong>data</strong> and taking the decision based upon the <strong>data analysis</strong>.</p>', '2021-07-08 15:50:00', '2021-07-08 17:30:00', 8, 1),
(22, 'Pottery Session', 'images/event/60c8cb317ac664.86588241.jpg', '<p>As pottery and ceramics enthusiasts based in Dubai, we have come together to create a community space for everyone to explore this art form. And as pottery has always been a community activity, we’ve created a ‘members’ studio where we seek to provide inspiration through our space and our workshops.</p>', '2021-07-09 07:45:00', '2021-07-11 21:45:00', 5, 1),
(23, 'Art Gallery Inauguration', 'images/event/60c8cb908681d4.61469805.jpg', '<p>Art Gallery’s four gallery sections drive meaningful engagement with the rich cultural heritage and contemporary art practices from the Middle East and extending to territories across the Asian and African continents as well as Latin America.</p>', '2021-07-23 07:00:00', '2021-08-23 19:00:00', 5, 1),
(24, 'FCSIT Alumni Meet-Up', 'images/event/60c8ccec763930.43466825.jpg', '<p>Meetup with other local alumni from FCSIT. Gather to discuss your current post-college life, careers, and future alumni events in your town!</p>', '2021-06-18 07:55:00', '2021-06-18 11:55:00', 8, 1),
(25, 'Faculty of Medicine Alumni Meet-Up', 'images/event/60c8cd39be4493.63833699.jpg', '<p>Meetup with other local alumni from the Faculty of Medicine. Gather to discuss your current post-college life, careers, and future alumni events in your town!</p>', '2021-06-20 08:55:00', '2021-06-20 09:55:00', 15, 1),
(26, 'Faculty of Education Alumni Meet-Up', 'images/event/60c8ce2704f0d6.84823910.jpg', '<p>Meetup with other local alumni from the Faculty of Education. Gather to discuss your current post-college life, careers, and future alumni events in your town!</p>', '2021-06-25 11:00:00', '2021-06-25 13:00:00', 11, 1),
(27, 'Free Violin Course', 'images/event/60c8cf8360a7d8.34910626.jpg', '<p>Researchers have found connections between music lessons and nearly every measure of academic achievement: SAT scores, high school GPA, reading comprehension, and math skills. Music also improves their powers of recall for powerful learning in all subjects.</p>', '2021-06-17 10:00:00', '2021-06-17 12:00:00', 19, 1),
(28, 'Music Concert', 'images/event/60c8d06e5cd897.55287962.jpg', '<p>A concert tour is a series of concerts by an artist or group of artists in different cities, countries or locations. Often concert tours are named, to differentiate different tours by the same artist and associate a specific tour with a particular album or product.</p>', '2021-07-03 21:00:00', '2021-07-04 04:00:00', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exps`
--

CREATE TABLE `exps` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `statuses` varchar(100) DEFAULT NULL,
  `year_start` year(4) DEFAULT NULL,
  `year_end` year(4) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exps`
--

INSERT INTO `exps` (`id`, `title`, `statuses`, `year_start`, `year_end`, `user_id`) VALUES
(1, 'Intern at Halal Street UK', 'current', 2017, 0000, 32),
(4, 'MO at Kompleks Sukan Negara', 'current', 2021, 0000, 33),
(5, 'Intern at JDT Club', 'past', 2017, 2018, 33),
(6, 'Working at Starbucks', 'current', 2021, 0000, 34),
(7, 'Manager at 7 Eleven', 'past', 2019, 2020, 34),
(8, 'Intern at Post Co', 'past', 2018, 2019, 34),
(9, 'Intern at Digi', 'past', 2019, 2021, 35),
(10, 'Intern at UM Cultural Center', 'past', 2017, 2018, 35),
(11, 'Artist at PRIMA', 'current', 2020, 0000, 36),
(12, 'Intern at FESENI', 'past', 2017, 2017, 36),
(18, 'Manager at CoolBlog', 'past', 2018, 2019, 32),
(19, 'Intern at FoodPanda', 'current', 2020, 2021, 0),
(20, 'Operator at Panasonic Sdn Bhd', 'past', 2019, 2020, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`) VALUES
(1, 'Academy of Islamic Studies'),
(2, 'Academy of Malay Studies'),
(3, 'Centre for Foundation Studies in Science'),
(4, 'Cultural Centre'),
(5, 'Faculty of Arts and Social Sciences'),
(6, 'Faculty of Built Environment'),
(7, 'Faculty of Business and Accountancy'),
(8, 'Faculty of Computer Science and Information Technology'),
(9, 'Faculty of Dentistry'),
(11, 'Faculty of Economics and Administration'),
(10, 'Faculty of Education'),
(12, 'Faculty of Engineering'),
(13, 'Faculty of Languages and Linguistics'),
(14, 'Faculty of Law'),
(15, 'Faculty of Medicine'),
(16, 'Faculty of Pharmacy'),
(17, 'Faculty of Science'),
(18, 'Sport Centre');

-- --------------------------------------------------------

--
-- Table structure for table `job_ads`
--

CREATE TABLE `job_ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `content` text DEFAULT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `com_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_ads`
--

INSERT INTO `job_ads` (`id`, `title`, `salary`, `content`, `published_at`, `com_id`, `user_id`) VALUES
(2, 'Engineer', '3100.00', 'Designing now', '2021-06-16 01:45:46', 1, 23),
(6, 'Assistant Manager', '17000.00', 'Manage', '2021-06-16 01:58:43', 3, 23),
(15, 'Assistant Researcher', '1800.00', 'Assist in research activities of given PIC.', '2021-06-16 03:08:45', 9, 23),
(16, 'Architect', '12000.00', 'Design buildings', '2021-06-16 03:10:15', 1, 23),
(17, 'Multimedia Executive', '7800.00', 'Graphic Designing', '2021-06-16 03:11:14', 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `start_date` year(4) NOT NULL,
  `end_date` year(4) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `content`, `start_date`, `end_date`, `user_id`) VALUES
(1, 'FESKUM', 'Organize event to celebrate alumni\'s convocation', 2020, 2020, 32),
(2, 'Festival Seni UM', 'Organises an art event that involved participants from all residential colleges', 2017, 2017, 32),
(3, 'Kawad Kaki', '', 2018, 2018, 33),
(4, 'Kinaschool - Volunteer in SMK Senai', 'Plan activities that foster leadership and working in a team skills to Form 5 students', 2018, 2018, 34),
(5, 'STEM Mentor Mentee', 'Teach Mathematics and Science to Form 3 students.\r\n', 2018, 2018, 34),
(6, 'Netball', 'Represent KK12 for netball games during SUKMUM 2018', 2019, 2019, 35),
(7, 'Minggu Haluan Siswa', 'Guide the freshies during the entire orientation week. ', 2019, 2019, 35),
(8, 'Jawatankuasa Tindakan Kolej ', 'President', 2019, 2019, 35),
(9, 'Floor representative', 'Handle the residents at floor B400', 2019, 2019, 36),
(10, 'Pemudahcara Mahasiswa KK12', 'Handle the freshies of respective residential college.', 2019, 2019, 37),
(11, 'Pemudahcara Mahasiswa Sentral', 'Handle the freshies in Dewan Tunku Canselor (DTC).', 2019, 2019, 38),
(12, 'Sukan Mahasiswa Universiti Malaya (SUKMUM) ', 'Manager for KK8 handball team. Have to select and handle the athletes training and schedule', 2020, 2020, 39),
(13, 'Build Alumni System', 'Build a website intended to engage the faculty with alumni and provide the faculty a way to keep in touch with alumni.\r\n', 2020, 2020, 47),
(14, 'Simple Cat Game', 'Build  application that let user to create, feed and play with a pet\r\n', 2020, 2020, 47),
(16, 'Build courier\'s sentiment', 'Algorithm to analyse and compare Malaysia\'s courier', 2020, 2020, 0),
(31, 'Festival Konvokesyen UM', 'Organize event to celebrate alumni\'s convocation', 2018, 2018, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'Leadership'),
(2, 'Problem Solving'),
(3, 'Communication Skills'),
(4, 'Time Management'),
(5, 'Teamwork'),
(6, 'Project Planning'),
(7, 'Task Management'),
(8, 'Networking'),
(9, 'Multitasking'),
(10, 'Negotiation '),
(11, 'Creative'),
(12, 'Discipline'),
(13, 'Java'),
(14, 'HTML'),
(15, 'CSS'),
(16, 'PHP'),
(17, 'MySQL');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Linkedin'),
(4, 'Github'),
(5, 'Email');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(2, 'Approved'),
(3, 'Denied'),
(1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `grad_year` year(4) NOT NULL,
  `profile_picture_url` varchar(100) NOT NULL,
  `enroll_year` year(4) NOT NULL,
  `fac_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `grad_year`, `profile_picture_url`, `enroll_year`, `fac_id`, `status_id`, `country_id`) VALUES
(0, 'Siti Aisyah Atirah', 'aisyahatirah@alumni.um.my', '$2y$10$5eQYIf2NtyBJImSZoyohouGR4IL5TJo3cybhF9Q98tWpn7LymZ4sW', 2018, '', 0000, 8, 2, 0),
(14, 'Vettel', 'vettel@email.com', '$2y$10$tCFriXg9mNPfEa.zI3DAW.3.10YB44dMaYWABv9rZEKCFSMNtu/4y', 2008, 'images/profile/user2.jpg', 2004, 16, 3, 1),
(17, 'Mazepin', 'mazepin@email.com', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2009, 'images/profile/user2.jpg', 0000, 12, 3, 0),
(20, 'Leclerc', 'leclerc@email.com', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2009, 'images/profile/user2.jpg', 0000, 12, 3, 0),
(21, 'Sainz', 'sainz@email.com', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2009, 'images/profile/user2.jpg', 0000, 12, 3, 0),
(22, 'Danica Patrick', 'dpatrick@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2026, 'images/profile/user1.jpg', 2022, 7, 2, 60),
(23, 'Aneson Gib', 'agib@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2023, 'images/profile/user2.jpg', 2019, 2, 2, 40),
(24, 'Savitri Borra', 'sborra@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2022, 'images/profile/user3.jpg', 2018, 7, 2, 35),
(25, 'Noé Travere', 'ntravere@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2017, 'images/profile/user4.jpg', 2013, 14, 2, 26),
(26, 'Ryan Aguilar', 'raguilar@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2011, 'images/profile/user5.jpg', 2007, 5, 2, 15),
(27, 'Pat Andrews', 'pandrews@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2023, 'images/profile/user6.jpg', 2019, 2, 2, 47),
(28, 'Austin Jordan', 'ajordan@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2020, 'images/profile/user7.jpg', 2015, 12, 2, 41),
(29, 'Sidney Lyons', 'slyons@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2020, 'images/profile/user8.jpg', 2012, 15, 2, 60),
(30, 'Berdine Lyon', 'blyon@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2018, 'images/profile/user9.jpg', 2014, 18, 2, 52),
(31, 'Chantal D’Aramitz', 'caramitz@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2019, 'images/profile/user10.jpg', 2015, 11, 2, 38),
(32, 'Nurul Nisa', 'nisa@alumni.um.my', '$2y$10$j/EpKtgDQD4fKeZdTxsJqe.14Umfjg1n1VVkbyNSEG1iVDyBNDS1q', 2018, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 10, 1, 1),
(33, 'Margaret Empiang', 'margaret@alumni.um.my', '$2y$10$gq.5Lr5cbg0xXED/WfYOnOYiIJnnJwicebE/AfSvWnRSeAwZb15ei', 2015, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 15, 1, 1),
(34, 'Syahilla Majid', 'syahilla@alumni.um.my', '$2y$10$FhV8K.7YiXb2Ajz6.YKXIeh82diQh7SuBnm7FF0EL.wnaT715Ioqe', 2010, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 3, 1, 0),
(35, 'Nurul Saidah', 'saidah@alumni.um.my', '$2y$10$kLRMuZ.1ErIR.QTZ48wp7umbB395qTidkqT5zxsiJcbReDQL9n2xK', 2008, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 8, 1, 0),
(36, 'Nuraini Jamingan', 'nurainij@alumni.um.my', '$2y$10$aolJkKwD2FymXM1wkKQGoOjpxjOJVD3gNB43Ick1AOcuxThl8b2vC', 2012, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 5, 1, 0),
(37, 'Alif Maarof Manan', 'alifj@alumni.um.my', '$2y$10$xeY26qhZD8D7M6TwNMYQ/u9/.u6R.r2tk5YRcvDXtZcMlA4hE3pyW', 2009, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 9, 1, 0),
(38, 'Anis Zulaikha', 'anisj@alumni.um.my', '$2y$10$iFq5BP0lyfBrVpMv6PdBw.XBSfTpINu08t60nsmr7ogYrC.755QHa', 2018, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 12, 1, 0),
(39, 'Lee Jing Wei', 'leej@alumni.um.my', '$2y$10$PsTeXktED.Yc368LeMtZKOd7ClB5l/nHAYYL7RybhzitUKLWVqH1W', 2004, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 9, 1, 0),
(40, 'Muhammad Imran', 'muhammadj@alumni.um.my', '$2y$10$o7Dqy.9JZvdRFClnAc52.OxDBSw.v.8OuIt6eKR.igq67uEtaPqLS', 2006, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 7, 1, 0),
(41, 'Nurul Izzaty', 'nurulj@alumni.um.my', '$2y$10$LgC2/Ljb2oT3hYC8c6mtaOSdUn0xwFeX5TCwqu4kEmZ2SNr.pO0Ry', 2003, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 4, 1, 0),
(42, 'Samintaraj', 'samintarajj@alumni.um.my', '$2y$10$6.EMaUNm.4iE8HORaCesJecoXAO3boB3d.q5ogp3/MgImTywU8/Gm', 2014, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 13, 1, 0),
(43, 'Seah Yee Min', 'seahj@alumni.um.my', '$2y$10$OqbY360T2UvOnmuobni1b.OkitF6xakma/7KRflBzSfkj20qMrbyu', 2005, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 6, 1, 0),
(44, 'Arvin', 'arvinj@alumni.um.my', '$2y$10$G/J/H2RBftyIeNEKtVltE.g647Qi6LWCq7XrKmcngGLTuQ.Gr7qda', 2010, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 4, 1, 0),
(45, 'Ain Nadiah', 'ainj@alumni.um.my', '$2y$10$E/OdijhXWpqqxhAxIxm4weMXJROGKxKIsEBljVYa9MFSRAY71cETq', 2015, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 14, 1, 0),
(46, 'Loo Bee Ling', 'looj@alumni.um.my', '$2y$10$SNXKRPraQka0O3Co1nbDFOSxdBgltKL3A3uCcu3a6.IQI1uOqtLiO', 2010, 'https://cdn.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png', 0000, 15, 1, 0),
(47, 'Amar Aiman', 'aiman@alumni.um.my', '$2y$10$Fi2tfYOLl6sCMDW2WHgogemzk7ig/ThD8cMnX9lhI15RC0f/HHK6C', 2023, 'images/profile/user15.jpg', 2019, 8, 2, 47);

-- --------------------------------------------------------

--
-- Table structure for table `user_event`
--

CREATE TABLE `user_event` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_skill`
--

CREATE TABLE `user_skill` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `skill_id` int(10) UNSIGNED NOT NULL,
  `skill_level` varchar(100) NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_skill`
--

INSERT INTO `user_skill` (`user_id`, `skill_id`, `skill_level`, `projects_id`) VALUES
(32, 1, 'intermediate', 1),
(32, 3, 'intermediate', 1),
(32, 5, 'advanced', 1),
(32, 9, 'advanced', 1),
(32, 2, 'intermediate', 2),
(32, 6, 'advanced', 2),
(32, 8, 'intermediate', 2),
(33, 12, 'intermediate', 3),
(33, 1, 'advanced', 4),
(34, 3, 'advanced', 4),
(34, 5, 'beginner', 4),
(34, 9, 'intermediate', 4),
(34, 1, 'advanced', 5),
(34, 3, 'advanced', 5),
(34, 7, 'beginner', 5),
(34, 11, 'intermediate', 5),
(0, 2, 'advanced', 16),
(0, 17, 'intermediate', 16),
(0, 14, 'advanced', 16),
(0, 3, 'intermediate', 31),
(0, 4, 'intermediate', 31);

-- --------------------------------------------------------

--
-- Table structure for table `user_social_media`
--

CREATE TABLE `user_social_media` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `social_media_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_social_media`
--

INSERT INTO `user_social_media` (`user_id`, `social_media_id`, `username`) VALUES
(32, 1, 'Nurul Nisa'),
(32, 2, 'Nurul Nisa'),
(32, 3, 'Nurul Nisa'),
(32, 5, 'abc@gmail.com'),
(42, 1, 'Samintaraj'),
(42, 2, 'Samintaraj'),
(42, 3, 'Samintaraj'),
(42, 4, 'Samintaraj'),
(42, 5, 'samintaraj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(10) UNSIGNED NOT NULL,
  `venue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue`) VALUES
(1, 'Academy of Islamic Studies'),
(2, 'Academy of Malay Studies'),
(3, 'Centre for Foundation Studies in Science'),
(4, 'Cultural Centre'),
(5, 'Faculty of Arts and Social Sciences'),
(6, 'Faculty of Built Environment'),
(7, 'Faculty of Business and Accountancy'),
(8, 'Faculty of Computer Science and Information Technology'),
(9, 'Faculty of Dentistry'),
(10, 'Faculty of Economics and Administration'),
(11, 'Faculty of Education'),
(12, 'Faculty of Engineering'),
(13, 'Faculty of Languages and Linguistics'),
(14, 'Faculty of Law'),
(15, 'Faculty of Medicine'),
(16, 'Faculty of Pharmacy'),
(17, 'Faculty of Science'),
(18, 'Sport Centre'),
(19, 'Microsoft Teams');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`email`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_events_venues` (`venue_id`),
  ADD KEY `FK_events_admins` (`admin_id`);

--
-- Indexes for table `exps`
--
ALTER TABLE `exps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_exps_users` (`user_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculty` (`faculty`);

--
-- Indexes for table `job_ads`
--
ALTER TABLE `job_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_job_ads_companies` (`com_id`),
  ADD KEY `FK_job_ads_users` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_projects_users` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`email`),
  ADD KEY `FK_users_faculties` (`fac_id`),
  ADD KEY `FK_users_statuses` (`status_id`),
  ADD KEY `FK_users_countries` (`country_id`);

--
-- Indexes for table `user_event`
--
ALTER TABLE `user_event`
  ADD KEY `FK_user_event_users` (`user_id`),
  ADD KEY `FK_user_event_events` (`event_id`);

--
-- Indexes for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD KEY `user_skill_ibfk_1` (`projects_id`),
  ADD KEY `user_skill_ibfk_2` (`skill_id`),
  ADD KEY `user_skill_ibfk_3` (`user_id`);

--
-- Indexes for table `user_social_media`
--
ALTER TABLE `user_social_media`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `social_media_id` (`social_media_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `exps`
--
ALTER TABLE `exps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exps`
--
ALTER TABLE `exps`
  ADD CONSTRAINT `exps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`fac_id`) REFERENCES `faculties` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `user_skill_ibfk_1` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_social_media`
--
ALTER TABLE `user_social_media`
  ADD CONSTRAINT `user_social_media_ibfk_1` FOREIGN KEY (`social_media_id`) REFERENCES `social_media` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_social_media_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

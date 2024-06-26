-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 06:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitify_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications_tbl`
--

CREATE TABLE `applications_tbl` (
  `A_Id` int(5) NOT NULL,
  `A_J_Id` int(5) NOT NULL,
  `A_U_Id` int(5) NOT NULL,
  `A_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications_tbl`
--

INSERT INTO `applications_tbl` (`A_Id`, `A_J_Id`, `A_U_Id`, `A_Time`) VALUES
(1, 4, 4, '2023-10-20 22:34:15'),
(2, 5, 6, '2023-10-21 00:40:36'),
(3, 2, 5, '2023-10-17 00:13:51'),
(4, 3, 8, '2023-10-19 00:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `C_Id` int(5) NOT NULL,
  `C_Posted_by_Id` int(5) NOT NULL,
  `C_Name` varchar(50) NOT NULL,
  `C_Desc` varchar(5000) NOT NULL,
  `C_Business_Stream` varchar(100) NOT NULL,
  `C_Establish_Year` year(4) NOT NULL,
  `C_Website` varchar(50) NOT NULL,
  `C_City` varchar(50) NOT NULL,
  `C_State` varchar(50) NOT NULL,
  `C_Country` varchar(50) NOT NULL DEFAULT '''India''',
  `C_Phone` varchar(20) NOT NULL,
  `C_Email` varchar(50) NOT NULL,
  `C_Logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`C_Id`, `C_Posted_by_Id`, `C_Name`, `C_Desc`, `C_Business_Stream`, `C_Establish_Year`, `C_Website`, `C_City`, `C_State`, `C_Country`, `C_Phone`, `C_Email`, `C_Logo`) VALUES
(1, 3, 'Google', 'Google LLC (Google), a subsidiary of Alphabet Inc, is a provider of search and advertising services on the internet. The company\'s business areas include advertising, search, platforms and operating systems, and enterprise and hardware products.', 'Information Techonology', 1970, 'www.google.com', 'Kotdapitha', 'Gujarat', 'India', '9888776886', 'google@google.com', 'images\\user-img\\company-profile\\google.png'),
(2, 2, 'Spotify', 'music Company\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Est sequi corporis suscipit repudiandae aperiam expedita pariatur sed culpa soluta. Temporibus, inventore! Corrupti doloribus, ipsum odio assumenda eligendi pariatur obcaecati quia!', 'Music ', 2013, 'spotify.com', 'Rajkot', 'Gujarat', 'India', '6789008454', 'spotify@music.com', 'images\\user-img\\company-profile\\spotify.png'),
(3, 2, 'Paypal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati quasi voluptatem saepe perferendis laboriosam molestiae voluptas, atque exercitationem, vero, dolores corporis quidem veniam tempore amet quam unde illum tenetur. Vitae!', 'Fienence', 2009, 'www.paypal.com', 'Jangvad', 'Gujarat', 'India', '9935323126', 'paypal@paypal.com', 'images\\user-img\\company-profile\\paypal.png'),
(4, 2, 'Yelp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit aspernatur dignissimos est autem laborum excepturi suscipit ullam dicta doloremque ea, nulla ut, eum magnam, quos cupiditate rem ipsam placeat dolores!', 'Local Review System', 2004, 'www.yelp.com', 'Indore', 'MP', 'India', '7809765890', 'yelp@help.com', 'images\\user-img\\company-profile\\yelp.png'),
(5, 2, 'Twitter', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa explicabo ullam expedita asperiores illo, velit, ab fugiat ex nisi non, laborum at facere repellat ipsum labore in nesciunt! Cumque, quis.', 'Social Media Plateform', 2006, 'www.twitter.com', 'California', '', 'USA', '6787890956', 'tweet@twitter.com', 'images\\user-img\\company-profile\\twitter.png'),
(6, 2, 'Envato', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa explicabo ullam expedita asperiores illo, velit, ab fugiat ex nisi non, laborum at facere repellat ipsum labore in nesciunt! Cumque, quis.', 'Online Learning', 2006, 'www.evanto.com', 'Melbourne', '', 'Australia', '5647578899', 'evanto@contact.com', 'images\\user-img\\company-profile\\envato.png'),
(7, 3, 'Microsoft', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa explicabo ullam expedita asperiores illo, velit, ab fugiat ex nisi non, laborum at facere repellat ipsum labore in nesciunt! Cumque, quis.', 'IT Company', 1975, 'www.microsoft.com', 'Paris', '', 'France', '7809765890', 'micro@soft.com', 'images\\user-img\\company-profile\\microsoft.png'),
(8, 2, 'SoundCloud', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa explicabo ullam expedita asperiores illo, velit, ab fugiat ex nisi non, laborum at facere repellat ipsum labore in nesciunt! Cumque, quis.', 'Music Directory', 2007, 'www.soundcloud.com', 'Berline', '', 'Germany', '9450984576', 'sound@cloud.com', 'images/user-img/company-profile/soundcloud.png');

-- --------------------------------------------------------

--
-- Table structure for table `education_tbl`
--

CREATE TABLE `education_tbl` (
  `ED_Id` int(5) NOT NULL,
  `ED_U_Id` int(5) NOT NULL,
  `ED_Course` varchar(1000) NOT NULL,
  `ED_Institute` varchar(1000) NOT NULL,
  `ED_Inst_City` varchar(1000) NOT NULL,
  `ED_Start_Year` year(4) NOT NULL,
  `ED_End_Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_tbl`
--

INSERT INTO `education_tbl` (`ED_Id`, `ED_U_Id`, `ED_Course`, `ED_Institute`, `ED_Inst_City`, `ED_Start_Year`, `ED_End_Year`) VALUES
(1, 4, 'Master of Business Administration', 'Chandigadh University', 'Chandigadh', 2024, 2026),
(2, 6, 'Master of Business Administration', 'Nirma University', 'Rajkot', 2024, 2026),
(4, 6, 'Master of Computer Applications ', 'MS University', 'Jaipur', 2024, 2030);

-- --------------------------------------------------------

--
-- Table structure for table `experience_tbl`
--

CREATE TABLE `experience_tbl` (
  `EX_Id` int(5) NOT NULL,
  `EX_U_Id` int(5) NOT NULL,
  `EX_Years` varchar(2) NOT NULL,
  `EX_Is_Crnt` enum('Yes','No') NOT NULL,
  `EX_Com` varchar(500) NOT NULL,
  `EX_City` varchar(100) NOT NULL,
  `EX_Desg` varchar(500) NOT NULL,
  `EX_Joining_Year` year(4) NOT NULL,
  `EX_Leaving_Year` year(4) NOT NULL,
  `EX_Salary` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience_tbl`
--

INSERT INTO `experience_tbl` (`EX_Id`, `EX_U_Id`, `EX_Years`, `EX_Is_Crnt`, `EX_Com`, `EX_City`, `EX_Desg`, `EX_Joining_Year`, `EX_Leaving_Year`, `EX_Salary`) VALUES
(1, 4, '2', 'No', 'RadheKrishna Technichal', 'Rajkot', 'Web Designer', 2020, 2022, 30000),
(2, 6, '3', 'Yes', 'RK University', 'Rajkot', 'Lab Assistant', 2024, 2026, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `job_list_tbl`
--

CREATE TABLE `job_list_tbl` (
  `J_Id` int(5) NOT NULL,
  `J_Posted_by_Id` int(5) NOT NULL,
  `J_Title` varchar(50) NOT NULL,
  `J_Post_Time` datetime NOT NULL,
  `J_Desc` varchar(1000) NOT NULL,
  `J_Company_Id` int(5) NOT NULL,
  `J_Type` varchar(50) NOT NULL,
  `J_Reqs` text NOT NULL,
  `J_Benefits` text NOT NULL,
  `J_Salary` int(11) NOT NULL,
  `J_Image` text NOT NULL,
  `J_City` varchar(50) NOT NULL,
  `J_State` varchar(50) NOT NULL,
  `J_Country` varchar(100) NOT NULL DEFAULT '''India'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_list_tbl`
--

INSERT INTO `job_list_tbl` (`J_Id`, `J_Posted_by_Id`, `J_Title`, `J_Post_Time`, `J_Desc`, `J_Company_Id`, `J_Type`, `J_Reqs`, `J_Benefits`, `J_Salary`, `J_Image`, `J_City`, `J_State`, `J_Country`) VALUES
(1, 3, 'Technical Lead', '2023-08-30 22:50:27', 'very good job', 1, 'Internship', '0', '0', 22500, 'images\\jobs\\it-professional-works-startup-project.jpg', 'Rajkot', 'Gujarat', 'India'),
(2, 3, 'Marketing Assistant', '2023-08-30 22:58:51', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 'Contract', '0', '', 30000, 'images\\user-img\\job-profile\\paper-analysis.jpg', 'Rajkot', 'Gujarat', 'India'),
(3, 2, 'Programmer', '2023-08-31 22:35:39', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati quasi voluptatem saepe perferendis laboriosam molestiae voluptas, atque exercitationem, vero, dolores corporis quidem veniam tempore amet quam unde illum tenetur. Vitae!', 3, 'Part Time', '0', '0', 50000, 'images\\user-img\\job-profile\\coding-man.jpg', 'Bengaluru', 'Karnataka', 'India'),
(4, 2, 'HR Manager', '2023-10-20 19:30:19', 'We are looking for a highly motivated Recruiter.  You will be the first layer in our quest to find the best and brightest workers.\nDevelop recruitment goals and objectives.\nSearch resume databases for the most fit candidates.\nDraft and proofread job descriptions.\nResearch and recommend new sources for active and passive candidate recruiting.\nBuild networks to find qualified active and passive candidates.\nPost openings to job boards and other position appropriate channels.', 5, 'Contact', '0', 'Sick, personal, and parental leave\nChild and elder care\nHealth insurance\nRetirement plans\nProfessional development', 50000, 'images\\user-img\\job-profile\\pretty-blogger-posing-cozy-apartment.jpg', 'Jaipur', 'Rajasthan', 'India'),
(5, 3, 'Customer Support', '2023-09-16 21:14:19', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa explicabo ullam expedita asperiores illo, velit, ab fugiat ex nisi non, laborum at facere repellat ipsum labore in nesciunt! Cumque, quis.', 7, 'Remote', '0', '0', 30000, 'images/user-img/job-profile/portrait-woman-customer-service-worker.jpg', 'Paris', 'Paris', 'France'),
(6, 2, 'Sound Engineer', '2023-09-27 11:37:27', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa explicabo ullam expedita asperiores illo, velit, ab fugiat ex nisi non, laborum at facere repellat ipsum labore in nesciunt! Cumque, quis.', 8, 'Full Time', '0', '0', 70000, 'images/user-img/job-profile/sound-engineer-working-studio-with-equipment.jpg', 'Pune', 'Maharashtra', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `job_type_tbl`
--

CREATE TABLE `job_type_tbl` (
  `J_type_Id` int(5) NOT NULL,
  `J_Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type_tbl`
--

INSERT INTO `job_type_tbl` (`J_type_Id`, `J_Type`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Internship'),
(4, 'Contract');

-- --------------------------------------------------------

--
-- Table structure for table `skill_set_tbl`
--

CREATE TABLE `skill_set_tbl` (
  `S_Id` int(5) NOT NULL,
  `S_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_set_tbl`
--

INSERT INTO `skill_set_tbl` (`S_Id`, `S_name`) VALUES
(1, 'PHP'),
(2, 'HTML'),
(3, 'MYSQL'),
(4, 'PYTHON'),
(5, 'JAVA'),
(6, 'Swift'),
(7, 'Graphic Design'),
(8, 'DBA'),
(9, 'VFX'),
(10, 'Data Analyst'),
(11, 'Software Testing'),
(12, 'Cyber Security'),
(13, 'Communication'),
(14, 'Time Management'),
(15, 'Fast Learner'),
(16, 'Team Work'),
(17, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `user_acc_type_tbl`
--

CREATE TABLE `user_acc_type_tbl` (
  `Acc_Type_ID` int(1) NOT NULL,
  `Acc_Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_acc_type_tbl`
--

INSERT INTO `user_acc_type_tbl` (`Acc_Type_ID`, `Acc_Type`) VALUES
(1, 'Admin'),
(2, 'Jobseeker'),
(3, 'Employer');

-- --------------------------------------------------------

--
-- Table structure for table `user_skill_tbl`
--

CREATE TABLE `user_skill_tbl` (
  `US_Id` int(5) NOT NULL,
  `US_U_Id` int(5) NOT NULL,
  `US_S_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_skill_tbl`
--

INSERT INTO `user_skill_tbl` (`US_Id`, `US_U_Id`, `US_S_Id`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 4, 7),
(5, 4, 11),
(6, 4, 14),
(7, 6, 1),
(8, 6, 2),
(9, 6, 3),
(10, 6, 14),
(11, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `U_Id` int(6) NOT NULL,
  `U_Type_Id` int(1) NOT NULL,
  `U_Name` varchar(50) NOT NULL,
  `U_Email` varchar(50) NOT NULL,
  `U_DOB` date NOT NULL,
  `U_Gender` enum('Male','Female','Other') NOT NULL,
  `U_City` varchar(50) NOT NULL,
  `U_State` varchar(50) NOT NULL,
  `U_Country` varchar(100) NOT NULL,
  `U_Mobile` varchar(20) NOT NULL,
  `U_Image` text NOT NULL,
  `U_Password` varchar(15) NOT NULL,
  `U_Reg_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`U_Id`, `U_Type_Id`, `U_Name`, `U_Email`, `U_DOB`, `U_Gender`, `U_City`, `U_State`, `U_Country`, `U_Mobile`, `U_Image`, `U_Password`, `U_Reg_Date`) VALUES
(1, 1, 'Admin', 'admin@admin.com', '2003-10-17', 'Male', 'adminnagar', 'Adminia', 'India', '9925323126', 'images/user-img/user-profile/Profile.jpg', 'admin@12', '2023-08-09 18:21:54'),
(2, 3, 'Jinal Taraviya', 'jini@jt.com', '2003-05-22', 'Female', 'Tokyo', 'Tokyo', 'Japan', '6789008454', 'images/user-img/user-profile/jini1.jfif', 'jini@123', '2023-08-09 18:23:55'),
(3, 3, 'Kishan Vekariya', 'kv@kv.com', '2003-10-17', 'Male', 'Melbourne', 'Victoria', 'Australia', '9925323126', 'images/user-img/user-profile/Profile.jpg', 'kish.v17', '2023-08-10 09:32:33'),
(4, 2, 'Ronak Kapadiya', 'rk@rk.com', '2004-07-29', 'Male', 'Florida', 'Texas', 'USA', '9574914831', 'images/user-img/user-profile/IMG_0082.JPG', 'ronak@123', '2023-09-04 17:39:56'),
(5, 2, 'Kalindi Fichadiya', 'kd@kd.com', '2004-09-04', 'Female', 'Mumbai', 'Maharashta', 'India', '6789008454', 'images/user-img/user-profile/Indian-Flag-Flying.jpg', 'kallu@123', '2023-08-14 13:50:38'),
(6, 2, 'Vibhuti Chavda', 'vibhutic123@gmail.com', '2004-04-22', 'Female', 'Jaipur', 'Rajasthan', 'India', '9898909898', 'images/user-img/user-profile/vibhuti.jpg', 'bhuti@123', '2023-08-28 13:43:54'),
(7, 3, 'Radhika Bhut', 'rb@rb.com', '2003-03-20', 'Female', 'Manavadar', 'Gujarat', 'India', '8200787877', 'images/user-img/user-profile/radhika.PNG', 'radhi@123', '2023-09-18 13:57:50'),
(8, 2, 'Kevin Topiya', 'kt@kt.com', '2004-01-09', 'Male', 'Paris', 'Paris', 'France', '8765876543', 'images/user-img/user-profile/kevin.jpg', 'kevin@123', '2023-10-01 03:11:03'),
(9, 2, 'Khushi Mehta', 'km@km.com', '2003-10-05', 'Female', 'Talala', 'Gujarat', 'India', '9378486466', 'images/user-img/user-profile/download.jpeg', 'khushi@123', '2023-10-10 22:03:55'),
(10, 3, 'Rohit Sharma', 'rsharma45@gmail.com', '1987-10-20', 'Male', 'Mumbai', 'Maharashtra', 'India', '9725827019', 'images/user-img/user-profile/images.jfif', 'rohit264', '2023-10-20 21:58:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications_tbl`
--
ALTER TABLE `applications_tbl`
  ADD PRIMARY KEY (`A_Id`);

--
-- Indexes for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD PRIMARY KEY (`C_Id`),
  ADD KEY `foreign11` (`C_Posted_by_Id`);

--
-- Indexes for table `education_tbl`
--
ALTER TABLE `education_tbl`
  ADD PRIMARY KEY (`ED_Id`),
  ADD KEY `foreign1` (`ED_U_Id`);

--
-- Indexes for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  ADD PRIMARY KEY (`EX_Id`);

--
-- Indexes for table `job_list_tbl`
--
ALTER TABLE `job_list_tbl`
  ADD PRIMARY KEY (`J_Id`),
  ADD KEY `foreign2` (`J_Posted_by_Id`),
  ADD KEY `foreign3` (`J_Company_Id`);

--
-- Indexes for table `job_type_tbl`
--
ALTER TABLE `job_type_tbl`
  ADD PRIMARY KEY (`J_type_Id`);

--
-- Indexes for table `skill_set_tbl`
--
ALTER TABLE `skill_set_tbl`
  ADD PRIMARY KEY (`S_Id`);

--
-- Indexes for table `user_acc_type_tbl`
--
ALTER TABLE `user_acc_type_tbl`
  ADD PRIMARY KEY (`Acc_Type_ID`);

--
-- Indexes for table `user_skill_tbl`
--
ALTER TABLE `user_skill_tbl`
  ADD PRIMARY KEY (`US_Id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`U_Id`),
  ADD KEY `U_Acc_Type` (`U_Type_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications_tbl`
--
ALTER TABLE `applications_tbl`
  MODIFY `A_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `C_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `education_tbl`
--
ALTER TABLE `education_tbl`
  MODIFY `ED_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  MODIFY `EX_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_list_tbl`
--
ALTER TABLE `job_list_tbl`
  MODIFY `J_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_type_tbl`
--
ALTER TABLE `job_type_tbl`
  MODIFY `J_type_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skill_set_tbl`
--
ALTER TABLE `skill_set_tbl`
  MODIFY `S_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_acc_type_tbl`
--
ALTER TABLE `user_acc_type_tbl`
  MODIFY `Acc_Type_ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_skill_tbl`
--
ALTER TABLE `user_skill_tbl`
  MODIFY `US_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `U_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD CONSTRAINT `foreign11` FOREIGN KEY (`C_Posted_by_Id`) REFERENCES `user_tbl` (`U_Id`);

--
-- Constraints for table `education_tbl`
--
ALTER TABLE `education_tbl`
  ADD CONSTRAINT `foreign1` FOREIGN KEY (`ED_U_Id`) REFERENCES `user_tbl` (`U_Id`);

--
-- Constraints for table `job_list_tbl`
--
ALTER TABLE `job_list_tbl`
  ADD CONSTRAINT `foreign2` FOREIGN KEY (`J_Posted_by_Id`) REFERENCES `user_tbl` (`U_Id`),
  ADD CONSTRAINT `foreign3` FOREIGN KEY (`J_Company_Id`) REFERENCES `company_tbl` (`C_Id`);

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `U_Acc_Type` FOREIGN KEY (`U_Type_Id`) REFERENCES `user_acc_type_tbl` (`Acc_Type_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

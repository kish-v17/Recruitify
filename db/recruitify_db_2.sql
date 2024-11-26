-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2024 at 03:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `application_tbl`
--

CREATE TABLE `application_tbl` (
  `Application_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Job_Id` int NOT NULL,
  `Status` enum('Pending','Accepted','Rejected') NOT NULL,
  `Application_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `application_tbl`
--

INSERT INTO `application_tbl` (`Application_Id`, `User_Id`, `Job_Id`, `Status`, `Application_Date`) VALUES
(1, 1, 1, 'Pending', '2024-11-26 10:40:51'),
(2, 2, 2, 'Accepted', '2024-11-26 10:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

CREATE TABLE `branch_tbl` (
  `Branch_Id` int NOT NULL,
  `Company_Id` int NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL DEFAULT 'India',
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`Branch_Id`, `Company_Id`, `Address`, `City`, `State`, `Country`, `Phone`, `Email`) VALUES
(1, 1, '', 'New York', 'New York', 'USA', '123-456-7891', 'newyork@techsolutions.com'),
(2, 2, '', 'Los Angeles', 'California', 'USA', '987-654-3211', 'la@healthcare.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `Company_Id` int NOT NULL,
  `Posted_by` int NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Business_Stream` varchar(100) NOT NULL,
  `Establishment_Year` year NOT NULL,
  `Website` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Logo` text NOT NULL,
  `Main_Branch_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`Company_Id`, `Posted_by`, `Name`, `Description`, `Business_Stream`, `Establishment_Year`, `Website`, `Phone`, `Email`, `Logo`, `Main_Branch_Id`) VALUES
(1, 2, 'Tech Solutions Ltd.', 'A leading software development company.', 'IT & Software', '2010', 'www.techsolutions.com', '123-456-7890', 'contact@techsolutions.com', 'images/logos/apple.png', NULL),
(2, 2, 'HealthCare Inc.', 'Providing top-notch healthcare services.', 'Health', '2005', 'www.healthcare.com', '987-654-3210', 'contact@healthcare.com', 'images/logos/dropbox.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education_tbl`
--

CREATE TABLE `education_tbl` (
  `Education_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Course` varchar(1000) NOT NULL,
  `Institute` varchar(1000) NOT NULL,
  `Institute_City` varchar(1000) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `education_tbl`
--

INSERT INTO `education_tbl` (`Education_Id`, `User_Id`, `Course`, `Institute`, `Institute_City`, `Start_Date`, `End_Date`) VALUES
(1, 1, 'Information technology', 'Tech Uni.', 'New York', '2010-09-01', '2014-06-01'),
(2, 2, 'Nursing', 'Health University', 'Los Angeles', '2010-09-01', '2014-06-01'),
(3, 2, 'MCA', 'RK university', 'Rajkot', '2020-06-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experience_tbl`
--

CREATE TABLE `experience_tbl` (
  `Experience_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Is_Current` tinyint(1) NOT NULL DEFAULT '0',
  `Company_Id` int NOT NULL,
  `Branch_Id` int NOT NULL,
  `Designation` varchar(500) NOT NULL,
  `Joining_Date` date NOT NULL,
  `Leaving_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `experience_tbl`
--

INSERT INTO `experience_tbl` (`Experience_Id`, `User_Id`, `Is_Current`, `Company_Id`, `Branch_Id`, `Designation`, `Joining_Date`, `Leaving_Date`) VALUES
(1, 1, 0, 1, 1, 'Junior Developer', '2022-06-01', NULL),
(3, 2, 0, 1, 1, 'Software engineer', '2024-11-28', '2024-11-30'),
(4, 2, 1, 2, 2, 'Doctor', '2024-10-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_list_tbl`
--

CREATE TABLE `job_list_tbl` (
  `Job_Id` int NOT NULL,
  `Posted_By` int NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Posted_Time` datetime NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Company_Id` int NOT NULL,
  `Branch_Id` int NOT NULL,
  `Type` enum('Full-Time','Part-Time','Contract') NOT NULL,
  `Requirements` text NOT NULL,
  `Benefits` text NOT NULL,
  `Salary` int NOT NULL,
  `Image` text NOT NULL,
  `Is_Internship` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_list_tbl`
--

INSERT INTO `job_list_tbl` (`Job_Id`, `Posted_By`, `Title`, `Posted_Time`, `Description`, `Company_Id`, `Branch_Id`, `Type`, `Requirements`, `Benefits`, `Salary`, `Image`, `Is_Internship`) VALUES
(1, 1, 'Software Developer', '2024-11-26 10:40:21', 'Looking for a skilled software developer to join our team.', 1, 1, 'Full-Time', 'Experience with JavaScript and ReactJS', 'Health insurance, Paid vacation', 80000, 'images\\jobs\\coding-man.jpg', 0),
(2, 2, 'Nurse', '2024-11-26 10:40:21', 'Seeking a dedicated nurse for our healthcare facility.', 2, 2, 'Part-Time', 'Experience with patient care', 'Flexible hours, Health benefits', 30000, 'images\\jobs\\it-professional-works-startup-project.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills_tbl`
--

CREATE TABLE `skills_tbl` (
  `Skill_Id` int NOT NULL,
  `Skill_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills_tbl`
--

INSERT INTO `skills_tbl` (`Skill_Id`, `Skill_Name`) VALUES
(4, 'Java'),
(1, 'JavaScript'),
(2, 'Python'),
(5, 'ReactJS'),
(3, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `User_Id` int NOT NULL,
  `User_Type` enum('Admin','Jobseeker','Employer') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Jobseeker',
  `Company_Id` int DEFAULT NULL,
  `Branch_Id` int DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Image` text NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Register_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`User_Id`, `User_Type`, `Company_Id`, `Branch_Id`, `Name`, `Email`, `DOB`, `Gender`, `City`, `State`, `Country`, `Mobile`, `Image`, `Password`, `Register_Date`) VALUES
(1, 'Jobseeker', NULL, NULL, 'Rixit Dobaeriya', 'janujkumar409@rku.ac.in', '2024-10-29', 'Male', 'Surat', 'Gujarat', 'TPX@GMAIL.COM', '8732965892', 'rixit-dobariya.jpg', 'ANUJ@111', '2024-11-26 09:33:32'),
(2, 'Jobseeker', NULL, NULL, 'Dobariya', 'rixitdobariya@gmail.com', '2024-11-01', 'Male', 'Surat', 'GUJARAT', 'India', '8732965891', 'images/user-img/user-profile/67454df2a5b583.32821259rixit-dobariya.jpg', 'qwertyui', '2024-11-26 10:29:32'),
(3, 'Jobseeker', NULL, NULL, 'John Doe', 'john.doe@example.com', '1990-05-15', 'Male', 'New York', 'New York', 'USA', '1234567890', 'image_path.jpg', 'password123', '2024-11-26 10:39:46'),
(4, 'Employer', NULL, NULL, 'Jane Smith', 'jane.smith@company.com', '1985-10-30', 'Female', 'Los Angeles', 'California', 'USA', '9876543210', 'image_path2.jpg', 'password456', '2024-11-26 10:39:46'),
(5, 'Jobseeker', NULL, NULL, 'Dobariya Rixit', 'rixitdobariya07@gmail.com', '2004-02-10', 'Male', 'Amreli', 'GUJARAT', 'India', '8732965892', 'images/user-img/user-profile/6745d6eb1ad3e8.80780342rixit-dobariya.jpg', 'Tpxitahi', '2024-11-26 19:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills_tbl`
--

CREATE TABLE `user_skills_tbl` (
  `User_Id` int NOT NULL,
  `Skill_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_skills_tbl`
--

INSERT INTO `user_skills_tbl` (`User_Id`, `Skill_Id`) VALUES
(1, 1),
(5, 1),
(2, 2),
(5, 2),
(2, 3),
(5, 3),
(1, 4),
(5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_tbl`
--
ALTER TABLE `application_tbl`
  ADD PRIMARY KEY (`Application_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Job_Id` (`Job_Id`);

--
-- Indexes for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  ADD PRIMARY KEY (`Branch_Id`),
  ADD KEY `Company_Id` (`Company_Id`);

--
-- Indexes for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD PRIMARY KEY (`Company_Id`);

--
-- Indexes for table `education_tbl`
--
ALTER TABLE `education_tbl`
  ADD PRIMARY KEY (`Education_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  ADD PRIMARY KEY (`Experience_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Company_Id` (`Company_Id`),
  ADD KEY `Branch_Id` (`Branch_Id`);

--
-- Indexes for table `job_list_tbl`
--
ALTER TABLE `job_list_tbl`
  ADD PRIMARY KEY (`Job_Id`),
  ADD KEY `Company_Id` (`Company_Id`),
  ADD KEY `Branch_Id` (`Branch_Id`),
  ADD KEY `Posted_By` (`Posted_By`);

--
-- Indexes for table `skills_tbl`
--
ALTER TABLE `skills_tbl`
  ADD PRIMARY KEY (`Skill_Id`),
  ADD UNIQUE KEY `Skill_Name` (`Skill_Name`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `user_skills_tbl`
--
ALTER TABLE `user_skills_tbl`
  ADD PRIMARY KEY (`User_Id`,`Skill_Id`),
  ADD KEY `Skill_Id` (`Skill_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_tbl`
--
ALTER TABLE `application_tbl`
  MODIFY `Application_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  MODIFY `Branch_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `Company_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education_tbl`
--
ALTER TABLE `education_tbl`
  MODIFY `Education_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  MODIFY `Experience_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_list_tbl`
--
ALTER TABLE `job_list_tbl`
  MODIFY `Job_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills_tbl`
--
ALTER TABLE `skills_tbl`
  MODIFY `Skill_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `User_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_tbl`
--
ALTER TABLE `application_tbl`
  ADD CONSTRAINT `application_tbl_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users_tbl` (`User_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `application_tbl_ibfk_2` FOREIGN KEY (`Job_Id`) REFERENCES `job_list_tbl` (`Job_Id`) ON DELETE CASCADE;

--
-- Constraints for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  ADD CONSTRAINT `branch_tbl_ibfk_1` FOREIGN KEY (`Company_Id`) REFERENCES `company_tbl` (`Company_Id`) ON DELETE CASCADE;

--
-- Constraints for table `education_tbl`
--
ALTER TABLE `education_tbl`
  ADD CONSTRAINT `education_tbl_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users_tbl` (`User_Id`) ON DELETE CASCADE;

--
-- Constraints for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  ADD CONSTRAINT `experience_tbl_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users_tbl` (`User_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experience_tbl_ibfk_2` FOREIGN KEY (`Company_Id`) REFERENCES `company_tbl` (`Company_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experience_tbl_ibfk_3` FOREIGN KEY (`Branch_Id`) REFERENCES `branch_tbl` (`Branch_Id`) ON DELETE CASCADE;

--
-- Constraints for table `job_list_tbl`
--
ALTER TABLE `job_list_tbl`
  ADD CONSTRAINT `job_list_tbl_ibfk_1` FOREIGN KEY (`Company_Id`) REFERENCES `company_tbl` (`Company_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_list_tbl_ibfk_2` FOREIGN KEY (`Branch_Id`) REFERENCES `branch_tbl` (`Branch_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_list_tbl_ibfk_3` FOREIGN KEY (`Posted_By`) REFERENCES `users_tbl` (`User_Id`) ON DELETE CASCADE;

--
-- Constraints for table `user_skills_tbl`
--
ALTER TABLE `user_skills_tbl`
  ADD CONSTRAINT `user_skills_tbl_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users_tbl` (`User_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_skills_tbl_ibfk_2` FOREIGN KEY (`Skill_Id`) REFERENCES `skills_tbl` (`Skill_Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

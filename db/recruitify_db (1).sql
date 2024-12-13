-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2024 at 02:49 AM
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
-- Table structure for table `about_page_details_tbl`
--

CREATE TABLE `about_page_details_tbl` (
  `about_for` varchar(10) NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_page_details_tbl`
--

INSERT INTO `about_page_details_tbl` (`about_for`, `about_content`) VALUES
('employer', '<p>&lt;h2&gt;Welcome to Recrutify\'s Employer Portal&lt;/h2&gt;<br>&lt;p&gt;At &lt;strong&gt;Recrutify&lt;/strong&gt;, we understand that finding the right talent is the cornerstone of every successful business. Our platform is tailored to simplify your hiring process and connect you with exceptional candidates ready to contribute to your company\'s growth and success.&lt;/p&gt;<br>&lt;p&gt;&lt;strong&gt;Why choose Recrutify?&lt;/strong&gt;&lt;/p&gt;<br>&lt;ul&gt;<br>&nbsp; &nbsp;&lt;li&gt;Access to a vast and diverse pool of skilled professionals across various industries.&lt;/li&gt;<br>&nbsp; &nbsp;&lt;li&gt;Intuitive tools to post job openings, manage applications, and streamline your recruitment process.&lt;/li&gt;<br>&nbsp; &nbsp;&lt;li&gt;Detailed insights and analytics to make informed hiring decisions.&lt;/li&gt;<br>&nbsp; &nbsp;&lt;li&gt;Dedicated support to ensure a seamless experience for all employers.&lt;/li&gt;<br>&lt;/ul&gt;<br>&lt;p&gt;Join thousands of employers who trust Recrutify to build their dream teams. Together, we can create a workforce that drives innovation and excellence!&lt;/p&gt;<br>&nbsp;</p>'),
('jobseeker', '<p>&lt;h2&gt;Welcome to Recrutify\'s Jobseeker Portal&lt;/h2&gt;<br>&lt;p&gt;At &lt;strong&gt;Recrutify&lt;/strong&gt;, we believe in empowering individuals to achieve their career aspirations. Our platform is designed to connect you with top employers who value your skills and potential.&lt;/p&gt;<br>&lt;p&gt;&lt;strong&gt;Why start your journey with Recrutify?&lt;/strong&gt;&lt;/p&gt;<br>&lt;ul&gt;<br>&nbsp; &nbsp;&lt;li&gt;Explore a wide range of job opportunities across various industries and roles.&lt;/li&gt;<br>&nbsp; &nbsp;&lt;li&gt;Build a standout profile to showcase your expertise and achievements.&lt;/li&gt;<br>&nbsp; &nbsp;&lt;li&gt;Receive personalized job recommendations that align with your skills and interests.&lt;/li&gt;<br>&nbsp; &nbsp;&lt;li&gt;Access career resources and tips to enhance your job search and professional growth.&lt;/li&gt;<br>&lt;/ul&gt;<br>&lt;p&gt;Whether you\'re starting your career or looking to take the next big step, Recrutify is here to support you every step of the way. Let’s turn your ambitions into achievements!&lt;/p&gt;<br>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `application_tbl`
--

CREATE TABLE `application_tbl` (
  `Application_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Job_Id` int NOT NULL,
  `Status` enum('Pending','Accepted','Rejected') NOT NULL DEFAULT 'Pending',
  `Application_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, 1, 'Albany', 'New York', 'New York', 'USA', '123-456-7891', 'newyork@techsolutions.com'),
(2, 2, 'Los Angeles', 'Los Angeles', 'California', 'USA', '987-654-3211', 'la@healthcare.com'),
(5, 1, 'Kotdapitha', 'Amreli', 'GUJARAT', 'India', '8732965892', 'rixitdobariya05@gmail.com'),
(6, 5, 'Ohio', 'Ohio', 'Ohio', 'USA', '98798798979', 'rixitdobariya05@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `Company_Id` int NOT NULL,
  `Posted_by` int NOT NULL DEFAULT '6',
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
(1, 2, 'Google', 'A leading software development company.', 'IT & Software', '2010', 'www.google.com', '123-456-7890', 'contact@google.com', 'images/logos/google.png', 1),
(2, 2, 'Meta', 'Providing top-notch healthcare services.', 'IT & Software\n', '2005', 'www.meta.com', '987-654-3210', 'contact@meta.com', 'images\\logos\\meta.png', NULL),
(4, 6, 'RKU', 'Education', 'Education', '2000', 'rku.ac.in', '8732965892', 'rku@contact.com', 'images/logos/rku.jpeg', NULL),
(5, 2, 'Paypal', 'Fienance', 'Company', '2000', 'paypal.com', '9999999999', 'paypal@company.com', 'images/logos/paypal.png', 6);

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
(2, 2, 'Nursing', 'Health University', 'Los Angeles', '2010-09-01', '2014-06-01'),
(3, 2, 'MCA', 'RK university', 'Rajkot', '2020-06-16', NULL),
(9, 10, 'Master of Computer Application', 'RK University', 'Rajkot', '2024-07-02', '2026-06-03'),
(10, 10, 'Bachelor of Computer Application', 'RK University', 'Rajkot', '2021-08-09', '2024-04-25');

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
(3, 2, 0, 1, 1, 'Software engineer', '2024-11-28', '2024-11-30'),
(4, 2, 1, 2, 2, 'Doctor', '2024-10-30', NULL),
(7, 10, 1, 1, 1, 'Web Designer', '2023-10-12', NULL),
(10, 10, 0, 4, 0, 'Lab Assistant', '2023-06-13', '2024-07-11');

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
  `Is_Internship` tinyint(1) NOT NULL DEFAULT '0',
  `Status` enum('Active','Deleted') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `Response_Id` int NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `responses_tbl`
--

INSERT INTO `responses_tbl` (`Response_Id`, `Name`, `Email`, `Message`) VALUES
(1, 'Rixit Dobaeriya', 'rixitdobariya05@gmail.com', 'dvd'),
(2, 'Rixit Dobaeriya', 'rixitdobariya05@gmail.com', 'dvd'),
(6, 'Rixit Dobaeriya', 'janujkumar409@rku.ac.in', 'qwe');

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
  `User_Type` enum('Admin','Jobseeker','Employer') NOT NULL DEFAULT 'Jobseeker',
  `Company_Id` int DEFAULT NULL,
  `Branch_Id` int DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Image` text,
  `Password` varchar(15) NOT NULL,
  `Status` enum('Active','Deleted') NOT NULL DEFAULT 'Active',
  `Register_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`User_Id`, `User_Type`, `Company_Id`, `Branch_Id`, `Name`, `Email`, `DOB`, `Gender`, `City`, `State`, `Country`, `Mobile`, `Image`, `Password`, `Status`, `Register_Date`) VALUES
(2, 'Jobseeker', NULL, NULL, 'Dobariya', 'rixitdobariya@gmail.com', '2024-11-01', 'Male', 'Surat', 'GUJARAT', 'India', '8732965891', 'images/user-img/user-profile/67454df2a5b583.32821259rixit-dobariya.jpg', 'qwertyui', 'Deleted', '2024-11-26 10:29:32'),
(4, 'Employer', 1, 1, 'Jane Smith', 'jane.smith@company.com', '1985-10-30', 'Female', 'New York', 'New York', 'USA', '9876543210', 'images/user-img/user-profile/UseCaseDiagram1.png', 'password456', 'Active', '2024-11-26 10:39:46'),
(5, 'Jobseeker', NULL, NULL, 'Dobariya Rixit', 'rixitdobariya07@gmail.com', '2004-02-10', 'Male', 'Amreli', 'GUJARAT', 'India', '8732965892', 'images/user-img/user-profile/6745d6eb1ad3e8.80780342rixit-dobariya.jpg', 'Tpxitahi', 'Active', '2024-11-26 19:41:31'),
(6, 'Admin', NULL, NULL, 'Admin', 'admin@admin.com', NULL, NULL, '', '', '', '', '', 'admin', 'Active', '2024-11-27 03:51:49'),
(10, 'Jobseeker', NULL, NULL, 'Kishan Vekariya', 'kishanpatel17100@gmail.com', '2003-10-17', 'Male', 'KotdaPitha', 'Gujarat', 'India', '8798673490', 'images/user-img/user-profile/675af6deec9417.13315653KishanVekariya21FOTCA11265.jpg', 'kishan123', 'Active', '2024-12-12 20:15:16'),
(11, 'Employer', NULL, NULL, 'Virat Kohli', 'busyman2561@gmail.com', '1988-11-05', 'Male', 'Mumbai', 'Maharashtra', 'India', '8938747809', 'images/user-img/user-profile/675afa58161380.49969348virat.jpeg', 'virat123', 'Active', '2024-12-12 20:30:39');

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
(5, 1),
(2, 2),
(5, 2),
(2, 3),
(5, 3),
(10, 3),
(5, 5),
(10, 5);

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
-- Indexes for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  ADD PRIMARY KEY (`Response_Id`);

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
  MODIFY `Application_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  MODIFY `Branch_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `Company_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education_tbl`
--
ALTER TABLE `education_tbl`
  MODIFY `Education_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `experience_tbl`
--
ALTER TABLE `experience_tbl`
  MODIFY `Experience_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_list_tbl`
--
ALTER TABLE `job_list_tbl`
  MODIFY `Job_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills_tbl`
--
ALTER TABLE `skills_tbl`
  MODIFY `Skill_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `User_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `experience_tbl_ibfk_2` FOREIGN KEY (`Company_Id`) REFERENCES `company_tbl` (`Company_Id`) ON DELETE CASCADE;

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

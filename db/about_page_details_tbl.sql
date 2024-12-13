-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2024 at 05:26 PM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

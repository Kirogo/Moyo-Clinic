-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 12:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trialbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(80) NOT NULL,
  `messages` varchar(8000) NOT NULL,
  `responses` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `messages`, `responses`) VALUES
(1, 'hi|hello|hey|heeey|hay', 'Hi there, how can I help you today?'),
(2, 'how are you? | how are you doing?', 'I\'m doing good | I\'m well'),
(3, 'What is your name? | Who are you', 'I\'m an artificial intelligence designed to help you through this website, but you can call me Maya. How can I help you'),
(4, 'I want to take the heart diagnostic test | Can I test for heart disease | Test me for heart disease', 'Okay. We\'ll begin right away. State your symptoms'),
(5, 'chest pain & heart attack & indigestion & nausea & sweating & fast heart rate', 'This indicates all the signs of Coronary Artery Disease. For more information,  it is advisable to visit your nearest local medical authority'),
(6, 'loss of consciousness & unresponsiveness', 'These are the main signs of Cardiac Arrest.  For more information,  it is advisable to visit your nearest local medical authority'),
(7, 'Shortness of breath & fatigue & swollen legs & rapid heartbeat', 'This indicates that you might have Congestive Heart Failure.  For more information,  it is advisable to visit your nearest local medical authority'),
(8, 'Fluttering in the chest & chest pain & dizziness & fainting', 'These symptoms show all indications that you may have Arrhythmia.  For more information,  it is advisable to visit your nearest local medical authority');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

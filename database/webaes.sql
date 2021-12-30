-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 02:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webaes`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `test_ID` int(3) NOT NULL,
  `student_ID` char(9) NOT NULL,
  `answer_1` varchar(5000) NOT NULL,
  `answer_2` varchar(5000) NOT NULL,
  `answer_3` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_ID` int(5) NOT NULL,
  `password` varchar(20) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_ID`, `password`, `faculty_name`, `email`, `mobile`) VALUES
(11904, 'faculty@123', 'Naveen Kumar', 'naveen.kumar11904@webaes.ac.in', '8879588000');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_ID` int(3) NOT NULL,
  `prompt` varchar(1000) NOT NULL,
  `expected_answer` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_ID`, `prompt`, `expected_answer`) VALUES
(1, 'Give PEAS description for medical diagnosis system.', 'The performance measure for medical diagnosis system may include the number of patients healed by correctly and accurately diagnosing diseases. For example, the performance measure may be the percentage of cases diagnosed correctly by the system. The environment for a medical diagnosis system includes patients and their vital signs. This environment is fully observable, dynamic and complete. The actuators include display screens and alert systems that send feedback to doctors. Sensors include equipment including medical sensors as well as medical images.'),
(6, 'Explain the different domains of Artificial Intelligence.', 'The different domains of Artificial Intelligence include machine learning, neural networks, robotics, expert systems, fuzzy logic, and natural language processing.\r\nMachine Learning is the science of getting computers to act by feeding them data so that they can learn a few tricks on their own, without being explicitly programmed to do so.\r\nNeural Networks are a set of algorithms and techniques, modelled in accordance with the human brain. Neural Networks are designed to solve complex and advanced machine learning problems.\r\nRobotics is a subset of AI, which includes different branches and application of robots. These Robots are artificial agents acting in a real-world environment. An AI Robot works by manipulating the objects in its surrounding, by perceiving, moving and taking relevant actions.\r\nAn expert system is a computer system that mimics the decision-making ability of a human. It is a computer program that uses artificial intelligence (AI) technologies to simulate the judgment and behaviour of a human or an organization that has expert knowledge and experience in a particular field.\r\nFuzzy logic is an approach to computing based on “degrees of truth” rather than the usual “true or false” (1 or 0) Boolean logic on which the modern computer is based. Fuzzy logic Systems can take imprecise, distorted, noisy input information.\r\nNatural Language Processing (NLP) refers to the Artificial Intelligence method that analyses natural human language to derive useful insights in order to solve problems.'),
(7, 'Explain how deep learning works.', 'Deep Learning is based on the basic unit of a brain called a brain cell or a neuron. Inspired from a neuron, an artificial neuron or a perceptron was developed.\r\nA biological neuron has dendrites which are used to receive inputs.\r\nSimilarly, a perceptron receives multiple inputs, applies various transformations and functions and provides an output.\r\nJust like how our brain contains multiple connected neurons called neural network, we can also have a network of artificial neurons called perceptron’s to form a Deep neural network.\r\nAn Artificial Neuron or a Perceptron models a neuron which has a set of inputs, each of which is assigned some specific weight. The neuron then computes some function on these weighted inputs and gives the output.');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `test_id` int(3) NOT NULL,
  `student_ID` char(9) NOT NULL,
  `score` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_ID` char(9) NOT NULL,
  `password` varchar(20) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_ID`, `password`, `student_name`, `email`, `mobile`) VALUES
('18BCE0343', 'password$1', 'Pratham Sharma', 'pratham.sharma2018@webaes.ac.in', '9898300200'),
('18BCE0380', 'Sp4ndy', 'Spandan Dasgupta', 'spandan.dasgupta2018@webaes.ac.in', '9898300255'),
('18BCE0477', 'mirzabaig', 'Mirza Aarish Baig', 'mirzaaarish.baig2018@webaes.ac.in', '9898300266');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_ID` int(3) NOT NULL,
  `test_name` varchar(20) NOT NULL,
  `question1_ID` int(3) NOT NULL,
  `question2_ID` int(3) NOT NULL,
  `question3_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_ID`, `test_name`, `question1_ID`, `question2_ID`, `question3_ID`) VALUES
(3, 'CSE3013 AI CAT-1', 1, 6, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

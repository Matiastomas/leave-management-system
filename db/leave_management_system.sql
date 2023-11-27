-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 14:19
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `leave_management_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `employmentNumber` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `vacation_leave` int(50) NOT NULL,
  `compassionate_leave` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `employee`
--

INSERT INTO `employee` (`employee_id`, `username`, `employee_password`, `department`, `employmentNumber`, `contact`, `vacation_leave`, `compassionate_leave`) VALUES
(9, 'Matias ', '12345', 'Accounting', '9998888', '081678756', -1, 10),
(10, 'jhon', '123456', 'Accounting', '2023-0111', '0816956542', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hr_manager`
--

CREATE TABLE `hr_manager` (
  `hr_manager_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hr_mangerpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hr_manager`
--

INSERT INTO `hr_manager` (`hr_manager_id`, `username`, `hr_mangerpassword`) VALUES
(1, 'Doe', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leave_application`
--

CREATE TABLE `leave_application` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `Leavestatus` varchar(255) DEFAULT NULL,
  `hr_manager_comments` text DEFAULT NULL,
  `application_date` date NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `numDays` int(50) NOT NULL,
  `certificate_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `leave_application`
--

INSERT INTO `leave_application` (`leave_id`, `employee_id`, `startdate`, `enddate`, `leave_type`, `Leavestatus`, `hr_manager_comments`, `application_date`, `employee_name`, `numDays`, `certificate_path`) VALUES
(1, 1, '2023-10-25', '2023-10-28', 'maternity', 'Approved', '', '2023-10-23', 'jhon', 0, ''),
(2, NULL, '2023-10-24', '2023-10-28', 'sick_leave', 'Pending', 'bbbbb', '0000-00-00', 'jhon', 0, ''),
(3, NULL, '2023-10-25', '2023-10-28', 'sick_leave', NULL, NULL, '0000-00-00', 'jhon', 0, ''),
(4, NULL, '2023-11-23', '2023-12-22', 'vacation_leave', 'Approved', 'Application approved ', '2023-11-22', 'Matias ', 0, ''),
(5, NULL, '2023-11-27', '2023-12-03', 'vacation_leave', NULL, NULL, '2023-11-26', 'jhon', 7, ''),
(6, NULL, '2023-11-27', '2023-11-27', 'study_leave', NULL, NULL, '2023-11-26', 'jhon', 7, ''),
(7, NULL, '2023-11-27', '2023-11-03', 'vacation_leave', NULL, NULL, '2023-11-26', 'jhon', 7, ''),
(8, NULL, '2023-11-27', '2023-12-03', 'compassionate_leave', NULL, NULL, '2023-11-26', 'jhon', 7, ''),
(9, NULL, '2023-11-27', '2023-12-03', 'compassionate_leave', NULL, NULL, '2023-11-26', 'jhon', 7, ''),
(10, NULL, '2023-11-29', '2023-11-30', 'compassionate_leave', NULL, NULL, '2023-11-27', 'jhon', 7, 'Elandshof 107.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `overtime_application`
--

CREATE TABLE `overtime_application` (
  `overtime_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `application_status` varchar(255) DEFAULT NULL,
  `hr_manager_comments` text DEFAULT NULL,
  `employee_name` varchar(255) NOT NULL,
  `publish_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `overtime_application`
--

INSERT INTO `overtime_application` (`overtime_id`, `employee_id`, `application_date`, `starttime`, `end_time`, `reason`, `application_status`, `hr_manager_comments`, `employee_name`, `publish_at`) VALUES
(1, 1, '2023-10-23', '08:00:00', '12:00:00', 'Working on a special project', 'Approved', 'Your overtime was approved ', 'John Doe', '2023-10-23'),
(2, 2, '2023-10-23', '14:00:00', '18:00:00', 'Client meeting', 'Approved', 'No comments', 'Jane Smith', '2023-10-23'),
(3, 3, '2023-10-24', '10:30:00', '15:30:00', 'Training session', 'Pending', 'Under review', 'Bob Johnson', '2023-10-24'),
(4, NULL, '2023-10-04', '00:00:00', '00:00:00', '', NULL, NULL, 'jhon', '0000-00-00'),
(5, NULL, '0000-00-00', '00:00:00', '00:00:00', '', NULL, NULL, 'jhon', '2023-10-25'),
(6, NULL, '0000-00-00', '00:00:00', '00:00:00', '', NULL, NULL, 'jhon', '2023-10-25'),
(7, NULL, '2023-10-26', '09:00:00', '17:00:00', 'bbbbbbbbbb', NULL, NULL, 'jhon', '2023-10-25'),
(8, NULL, '2023-11-23', '09:00:00', '17:00:00', 'Reason  ooo ', 'Approved', 'Application', 'Matias ', '2023-11-22');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Índices para tabela `hr_manager`
--
ALTER TABLE `hr_manager`
  ADD PRIMARY KEY (`hr_manager_id`);

--
-- Índices para tabela `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`leave_id`);

--
-- Índices para tabela `overtime_application`
--
ALTER TABLE `overtime_application`
  ADD PRIMARY KEY (`overtime_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `hr_manager`
--
ALTER TABLE `hr_manager`
  MODIFY `hr_manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `overtime_application`
--
ALTER TABLE `overtime_application`
  MODIFY `overtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

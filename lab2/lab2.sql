-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Õîñò: 127.0.0.1:3306
-- Âðåìÿ ñîçäàíèÿ: Àïð 02 2019 ã., 13:21
-- Âåðñèÿ ñåðâåðà: 5.6.38
-- Âåðñèÿ PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Áàçà äàííûõ: `lab_2`
--

DELIMITER $$
--
-- Ïðîöåäóðû
--
CREATE DEFINER=`root`@`%` PROCEDURE `addClient` (IN `f_cl` VARCHAR(100), IN `p_cl` VARCHAR(100))  INSERT INTO `client` (`fio_client`, `phone_client`) VALUES (f_cl, p_cl)$$

CREATE DEFINER=`root`@`%` PROCEDURE `addRequest` (IN `cl_id` INT)  INSERT INTO `request` (`client_id`) VALUES (cl_id)$$

CREATE DEFINER=`root`@`%` PROCEDURE `addRequestService` (IN `req_id` INT, IN `serv_id` INT)  INSERT INTO `request_service` (request_id, service_id) VALUES (req_id, serv_id)$$

CREATE DEFINER=`root`@`%` PROCEDURE `addService` (IN `serv_name` VARCHAR(100))  INSERT INTO `service` (`name_service`) VALUES (serv_name)$$

CREATE DEFINER=`root`@`%` PROCEDURE `deleteClient` (IN `id_cl` INT)  DELETE FROM `client` WHERE `id_client` = id_cl$$

CREATE DEFINER=`root`@`%` PROCEDURE `deleteRequest` (IN `id_req` INT)  DELETE FROM `request` WHERE `id_request`= id_req$$

CREATE DEFINER=`root`@`%` PROCEDURE `deleteService` (IN `id_serv` INT)  DELETE FROM `service` WHERE `id_service` = id_serv$$

CREATE DEFINER=`root`@`%` PROCEDURE `deleteServiceFromRequest` (IN `req_id` INT, IN `serv_id` INT)  DELETE FROM `request_service` WHERE `request_id` = req_id AND `service_id` = serv_id$$

CREATE DEFINER=`root`@`%` PROCEDURE `editClient` (IN `cl_id` INT, IN `f_cl` VARCHAR(100), IN `p_cl` VARCHAR(100))  UPDATE `client` SET `fio_client` = f_cl,`phone_client` = p_cl WHERE `id_client`=cl_id$$

CREATE DEFINER=`root`@`%` PROCEDURE `editRequest` (IN `id_req` INT, IN `cl_id` INT)  UPDATE `request` SET `client_id`=cl_id WHERE `id_request`=id_req$$

CREATE DEFINER=`root`@`%` PROCEDURE `editRequestService` (IN `req_id` INT, IN `serv_id` INT, IN `nserv_id` INT)  UPDATE `request_service` SET `service_id` = nserv_id WHERE `request_id` = req_id AND `service_id` = serv_id$$

CREATE DEFINER=`root`@`%` PROCEDURE `editService` (IN `id_serv` INT, IN `new_name` VARCHAR(100))  UPDATE `service` SET `name_service` = new_name WHERE `id_service`=id_serv$$

CREATE DEFINER=`root`@`%` PROCEDURE `getClient` (IN `cl_id` INT)  SELECT * FROM `client` WHERE `id_client`=cl_id$$

CREATE DEFINER=`root`@`%` PROCEDURE `getClients` ()  SELECT * FROM `client`$$

CREATE DEFINER=`root`@`%` PROCEDURE `getRequest` (IN `id_req` INT)  SELECT * FROM `request` WHERE `id_request` = id_req$$

CREATE DEFINER=`root`@`%` PROCEDURE `getRequests` ()  SELECT * FROM `request`$$

CREATE DEFINER=`root`@`%` PROCEDURE `getRequestServices` ()  SELECT * FROM `request_service`$$

CREATE DEFINER=`root`@`%` PROCEDURE `getService` (IN `id_serv` INT)  SELECT * FROM `service` WHERE `id_service` = id_serv$$

CREATE DEFINER=`root`@`%` PROCEDURE `getServices` ()  SELECT * FROM `service`$$

CREATE DEFINER=`root`@`%` PROCEDURE `getServicesByRequest` (IN `id_req` INT)  SELECT `service_id` FROM `request_service` WHERE `request_id` = id_req$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Ñòðóêòóðà òàáëèöû `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `fio_client` varchar(100) NOT NULL,
  `phone_client` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Äàìï äàííûõ òàáëèöû `client`
--

INSERT INTO `client` (`id_client`, `fio_client`, `phone_client`) VALUES
(1, 'Юмалиева Любовь', '89094893098'),
(2, 'Морева Анастасия', '89378740987'),
(3, 'Андриенко Елена', '8933765625639'),
(12, 'Жилин Даниил', '89367820816'),
(13, 'Панфилов Денис', '83675437809');

-- --------------------------------------------------------

--
-- Ñòðóêòóðà òàáëèöû `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Äàìï äàííûõ òàáëèöû `request`
--

INSERT INTO `request` (`id_request`, `client_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Ñòðóêòóðà òàáëèöû `request_service`
--

CREATE TABLE `request_service` (
  `request_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Äàìï äàííûõ òàáëèöû `request_service`
--

INSERT INTO `request_service` (`request_id`, `service_id`) VALUES
(1, 1),
(1, 5);

-- --------------------------------------------------------

--ы
-- Ñòðóêòóðà òàáëèöû `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `name_service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Äàìï äàííûõ òàáëèöû `service`
--

INSERT INTO `service` (`id_service`, `name_service`) VALUES
(1, 'Маникюр'),
(2, 'Педикюр'),
(3, 'Ламинирование ресниц'),
(4, 'Оформление бровей'),
(5, 'Окрашивание бровей');

--
-- Èíäåêñû ñîõðàí¸ííûõ òàáëèö
--

--
-- Èíäåêñû òàáëèöû `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Èíäåêñû òàáëèöû `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Èíäåêñû òàáëèöû `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- AUTO_INCREMENT äëÿ ñîõðàí¸ííûõ òàáëèö
--

--
-- AUTO_INCREMENT äëÿ òàáëèöû `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT äëÿ òàáëèöû `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT äëÿ òàáëèöû `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-18 03:50:02
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `list`
--

-- --------------------------------------------------------

--
-- 資料表結構 `information`
--

CREATE TABLE `information` (
  `會員編號` int(10) NOT NULL,
  `姓名` varchar(15) NOT NULL,
  `性別` enum('男','女','其他') NOT NULL,
  `生日` date NOT NULL,
  `郵箱` varchar(500) NOT NULL,
  `電話` int(20) NOT NULL,
  `帳號` varchar(100) NOT NULL,
  `密碼` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `information`
--

INSERT INTO `information` (`會員編號`, `姓名`, `性別`, `生日`, `郵箱`, `電話`, `帳號`, `密碼`) VALUES
(85, '小美', '女', '2022-06-02', 'may@gmail.com', 900000123, 'may', '$2y$10$W2EBp6OdYqu08OL3l3LCle.I0kbACETEJcOu7FiI6VWZVfgUg5uhe'),
(86, '小明', '男', '2022-05-29', 'min@gmail.com', 934578124, 'min', '$2y$10$98Der.0Qbd.4VdLEBH0oReIWELyQbPzqj4cAQh8RgpwpsMFczE5GW'),
(87, '阿華', '女', '2022-06-04', 'hua@gmail.com', 912345432, 'hua', '$2y$10$15gbgvFybwEh.3IK0JlW2u1VWw.E6tDdOKOZIDupcZtFiZrGE.nrO');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`會員編號`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `information`
--
ALTER TABLE `information`
  MODIFY `會員編號` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

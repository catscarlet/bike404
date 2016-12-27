-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2016-12-27 09:54:19
-- 服务器版本： 5.6.26
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newProject`
--

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(11) NOT NULL,
  `title` varchar(80) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '标题，目前为空',
  `keyword` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '关键词，目前自动生成',
  `area` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '市级地区',
  `brand` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '品牌，如：美利达',
  `sub_brand` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '次级品牌，如：付利威',
  `color` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `alerted_police` int(4) NOT NULL DEFAULT '0' COMMENT '是否已报警',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT 'status：丢失状态。 - 0为未找回 - 1为已由自己找回 - 2为已通过本站信息找回 - 3为通过公安找回 - 4为通过其他网站找回 - 5为自己购回',
  `info` text CHARACTER SET utf8mb4,
  `image` text CHARACTER SET utf8mb4,
  `user` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '用户的昵称（不保存用户的真实姓名）',
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `descrpition` text CHARACTER SET utf8mb4,
  `uuid` varchar(36) CHARACTER SET utf8mb4 DEFAULT '00000000-0000-0000-0000-000000000000',
  `lost_time` timestamp NULL DEFAULT NULL COMMENT '丢车时间',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `mailpool`
--

CREATE TABLE IF NOT EXISTS `mailpool` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0未发送，1已发送，2发送失败',
  `desc` text COLLATE utf8mb4_unicode_ci,
  `update-time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `report_lost`
--

CREATE TABLE IF NOT EXISTS `report_lost` (
  `id` int(11) NOT NULL,
  `area` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '市级地区',
  `brand` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '品牌，如：美利达',
  `color` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `alerted_police` int(4) NOT NULL DEFAULT '0' COMMENT '是否已报警',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT 'status：丢失状态。 - 0为未找回 - 1为已由自己找回 - 2为已通过本站信息找回 - 3为通过公安找回 - 4为通过其他网站找回 - 5为自己购回',
  `info` text CHARACTER SET utf8mb4,
  `user` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '用户的昵称（不保存用户的真实姓名）',
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 DEFAULT '00000000-0000-0000-0000-000000000000',
  `lost_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '丢车时间',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `img_info_id` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COMMENT '后台备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailpool`
--
ALTER TABLE `mailpool`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `report_lost`
--
ALTER TABLE `report_lost`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailpool`
--
ALTER TABLE `mailpool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report_lost`
--
ALTER TABLE `report_lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

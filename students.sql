-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 26 日 12:57
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `class` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stu_num` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `grade` int(10) NOT NULL,
  PRIMARY KEY (`stu_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `students`
--

INSERT INTO `students` (`class`, `name`, `stu_num`, `gender`, `grade`) VALUES
('1', 'MiaoHang', '0001', 'F', 75),
('1', 'ZhouLiang', '0003', 'M', 95),
('2', 'YuJianyang', '0002', 'M', 98),
('3', 'XuChang', '0004', 'F', 95),
('2', 'XuHengru', '0006', 'M', 89),
('5', 'KeYongning', '0008', 'M', 75),
('3', 'JingTian', '0025', 'M', 89),
('5', 'LiuChengjun', '0005', 'F', 76),
('7', 'ZhaoWei', '0032', 'M', 81),
('2', 'WangDefu', '0020', 'F', 73),
('2', 'LuChengyao', '0007', 'M', 87),
('3', 'ZhangYan', '0016', 'F', 75),
('1', 'WangMeng', '0037', 'M', 82),
('3', 'WangLanlan', '0017', 'F', 91),
('5', 'XuJicheng', '0021', 'M', 85),
('3', 'XinMing', '0014', 'F', 92),
('3', 'DaGou', '0030', 'M', 80),
('4', 'Bosh', '0019', 'F', 93),
('3', 'James', '0022', 'M', 87),
('3', 'James', '0023', 'M', 87),
('4', 'Wade', '0027', 'M', 97);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

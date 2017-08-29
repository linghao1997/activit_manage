-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?08 �?29 �?05:47
-- 服务器版本: 5.5.53
-- PHP 版本: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `activity_manage`
--

-- --------------------------------------------------------

--
-- 表的结构 `sw_active`
--

CREATE TABLE IF NOT EXISTS `sw_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitid` int(11) NOT NULL DEFAULT '0',
  `activename` varchar(255) NOT NULL DEFAULT '' COMMENT '活动名称',
  `activeinfo` varchar(255) NOT NULL DEFAULT '' COMMENT '活动简介',
  `activecontact` varchar(255) NOT NULL DEFAULT '' COMMENT '活动内容',
  `people` varchar(255) NOT NULL DEFAULT '' COMMENT '活动负责人',
  `pic` varchar(255) NOT NULL DEFAULT '' COMMENT '活动图片',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '活动缩略图',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `holdtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '举办时间',
  `endtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fieldid` int(11) NOT NULL DEFAULT '0',
  `planmoney` double NOT NULL DEFAULT '0' COMMENT '活动经费',
  `enterid` varchar(255) NOT NULL DEFAULT '' COMMENT '报名用户id',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '活动状态(1结束)(0正在)(-1草稿箱)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活动表' AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `sw_active`
--

INSERT INTO `sw_active` (`id`, `unitid`, `activename`, `activeinfo`, `activecontact`, `people`, `pic`, `thumb`, `createtime`, `holdtime`, `endtime`, `fieldid`, `planmoney`, `enterid`, `status`) VALUES
(19, 0, 'house365', '365大家庭', '推广365', 'xx', 'Uploads/Activity/2017-08-16/5993eed2d03ec.jpg', 'Uploads/Activity/2017-08-16/thumb_5993eed2d03ec.jpg', '2017-08-16 07:05:55', '2017-08-16 09:00:00', '2017-08-20 09:00:00', 0, 2000, '29,33,', 1),
(21, 0, '365网', '365大家庭', '365活动', 'kkk', 'Uploads/Activity/2017-08-23/599ce2a0be90c.jpg', 'Uploads/Activity/2017-08-23/thumb_599ce2a0be90c.jpg', '2017-08-23 02:04:17', '2017-08-28 15:00:00', '2017-08-31 17:00:00', 0, 2000, '', 0),
(20, 0, '前端部', '技术开发', '前端开发', 'kkk', 'Uploads/Activity/2017-08-17/59953a6dc6f89.jpg', 'Uploads/Activity/2017-08-17/thumb_59953a6dc6f89.jpg', '2017-08-17 06:40:46', '2017-08-17 09:00:00', '2017-08-25 09:00:00', 0, 2000, '34,', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sw_admin`
--

CREATE TABLE IF NOT EXISTS `sw_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(255) NOT NULL DEFAULT '0' COMMENT '密码',
  `root` tinyint(3) NOT NULL DEFAULT '1' COMMENT '标志',
  `contactway` varchar(255) NOT NULL DEFAULT '' COMMENT '联系方式',
  `activeid` int(11) NOT NULL COMMENT '活动ID',
  `joinactive` varchar(255) NOT NULL DEFAULT '' COMMENT '参与活动',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `sw_admin`
--

INSERT INTO `sw_admin` (`id`, `username`, `password`, `root`, `contactway`, `activeid`, `joinactive`, `createtime`) VALUES
(14, 'admin', '3fde45c2682be7379bd488c465daea21', 0, '18726632355', 16, '', '2017-08-14 02:34:25'),
(33, 'house', '0', 1, '18012341234', 19, '', '2017-08-17 06:14:58'),
(34, '杨', '0', 1, '14212341234', 20, '', '2017-08-17 06:54:46'),
(26, 'house365', '0', 1, '14112341234', 19, '', '2017-08-16 07:30:48'),
(23, '365', '0', 1, '14712341234', 16, '', '2017-08-16 06:19:22');

-- --------------------------------------------------------

--
-- 表的结构 `sw_const`
--

CREATE TABLE IF NOT EXISTS `sw_const` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT =A_I ',
  `activeid` int(11) NOT NULL COMMENT '活动id',
  `goodsname` varchar(255) NOT NULL COMMENT '商品名称',
  `goodsnum` int(11) NOT NULL COMMENT '商品数量',
  `goodsprice` double NOT NULL COMMENT '商品价格',
  `sumprice` double NOT NULL COMMENT '其他费用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `sw_const`
--

INSERT INTO `sw_const` (`id`, `activeid`, `goodsname`, `goodsnum`, `goodsprice`, `sumprice`) VALUES
(23, 0, 'yy', 23, 45, 3),
(2, 12, '纪念品', 100, 200, 300),
(25, 19, 'uu', 50, 25, 1250),
(28, 21, 'hh', 8, 20, 240),
(27, 21, 'kk', 3, 60, 180),
(19, 11, '饮料', 20, 5, 300),
(36, 20, 'hh', 18, 100, 1800),
(35, 19, 'yg', 15, 95, 1425);

-- --------------------------------------------------------

--
-- 表的结构 `sw_manager`
--

CREATE TABLE IF NOT EXISTS `sw_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitid` int(11) NOT NULL DEFAULT '0' COMMENT '发布活动用户id',
  `activeid` int(11) NOT NULL DEFAULT '0' COMMENT '活动id',
  `backfield` varchar(255) NOT NULL DEFAULT '' COMMENT '活动场地',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `sw_manager`
--

INSERT INTO `sw_manager` (`id`, `unitid`, `activeid`, `backfield`, `createtime`) VALUES
(14, 0, 17, '建邺区', '2017-08-15 02:24:51'),
(16, 0, 20, '建邺区', '2017-08-17 06:40:46'),
(17, 0, 21, '鼓楼区', '2017-08-23 02:04:17'),
(8, 0, 11, 'tyut', '2017-08-09 08:42:04'),
(9, 0, 12, 'mmm', '2017-08-10 00:53:54'),
(10, 0, 13, 'll', '2017-08-10 06:54:28'),
(11, 0, 14, '3000', '2017-08-10 07:02:49'),
(12, 0, 15, 'kkkk', '2017-08-10 07:52:20'),
(13, 0, 16, '鼓楼区', '2017-08-10 07:55:35'),
(15, 0, 19, '秦淮区', '2017-08-16 07:05:55');

-- --------------------------------------------------------

--
-- 表的结构 `sw_userstatus`
--

CREATE TABLE IF NOT EXISTS `sw_userstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT =A_I ',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `activeid` int(11) NOT NULL COMMENT '活动ID',
  `userstatus` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1表示未签到，0表示签到',
  `moneystatus` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1表示未支付费用，0已支付',
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `sw_userstatus`
--

INSERT INTO `sw_userstatus` (`id`, `uid`, `activeid`, `userstatus`, `moneystatus`, `createtime`) VALUES
(16, 29, 19, 1, 1, '0000-00-00 00:00:00'),
(15, 28, 19, 1, 1, '0000-00-00 00:00:00'),
(8, 14, 16, 0, 0, '2017-08-16 15:35:27'),
(6, 14, 11, 1, 1, '0000-00-00 00:00:00'),
(9, 11, 16, 1, 1, '0000-00-00 00:00:00'),
(10, 16, 16, 1, 1, '0000-00-00 00:00:00'),
(11, 22, 16, 1, 1, '0000-00-00 00:00:00'),
(17, 33, 19, 0, 0, '2017-08-18 13:08:50'),
(18, 34, 20, 0, 0, '2017-08-29 09:09:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

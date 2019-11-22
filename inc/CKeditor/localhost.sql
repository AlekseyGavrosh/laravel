-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2011 at 05:16 PM
-- Server version: 5.1.40
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `editor`
--
CREATE DATABASE `editor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `editor`;

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE IF NOT EXISTS `editor` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `text`) VALUES
(1, '<p>\r\n	<strong><a class="fb" href="/upload/image/koala.jpg" title="koala"><img alt="" src="/upload/image/koala.jpg" style="width: 150px; height: 113px; float: right; margin-left: 5px; margin-right: 5px;" /></a>Lorem</strong> ipsum dolor sit amet, <em>consectetur adipiscing</em> elit. Donec tincidunt mollis malesuada. Suspendisse potenti. Fusce id elit risus, et congue nisl. Aenean quis diam ac augue blandit tincidunt et at velit. Duis ut nisi felis, et gravida elit. Cras iaculis, lectus eget venenatis laoreet, nunc ante pellentesque elit, et sollicitudin est magna varius lectus. In a dolor sed nisl tempor consequat non in urna. Praesent iaculis scelerisque consectetur. Maecenas ac felis tortor. Donec venenatis mi vitae nibh cursus pretium. Proin lacinia leo et neque scelerisque sit amet porta nulla euismod. Praesent egestas justo eu purus bibendum id condimentum nibh cursus.</p>\r\n<p>\r\n	<u>Quisque pulvinar</u> mattis lorem sed dapibus. <span style="color:#b22222;">Nulla neque</span> orci, vulputate tristique ultrices placerat, laoreet vitae nunc. Praesent ac felis turpis, vel feugiat mi. Nam mi est, elementum non congue et, consequat in lorem. Duis massa urna, bibendum in facilisis sit amet, feugiat a risus. Praesent quis elementum eros. Aliquam volutpat porta metus. Aenean viverra elit id massa luctus mollis. Duis egestas lacinia ornare. Aliquam aliquet diam at tellus vestibulum pulvinar. Nullam eget cursus sapien. Ut mi quam, ultricies sagittis consequat in, porta sit amet turpis. Vestibulum in sem in elit tincidunt pharetra. Aliquam ac ligula eget augue facilisis posuere.</p>\r\n<p>\r\n	Maecenas molestie eleifend tristique. Etiam molestie turpis in orci laoreet accumsan. Vivamus euismod odio id metus ultrices ut euismod augue consectetur. Pellentesque nulla eros, semper vel bibendum non, faucibus a nulla. Morbi sed urna metus, luctus tempor purus. Aliquam egestas vehicula tempor. Nulla lacinia rutrum condimentum.</p>\r\n<p>\r\n	Nunc elementum, ante et mollis tincidunt, neque nibh posuere lectus, a imperdiet libero mauris non lectus. Aliquam mauris metus, gravida ac aliquam id, tristique non odio. Aenean nulla tortor, iaculis vel interdum nec, ultricies pretium urna. Pellentesque quis ligula nec felis volutpat hendrerit nec interdum eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a quam nisi, eu mollis augue. Aenean non tempus leo. Nullam viverra euismod magna et consectetur. Morbi condimentum viverra elit, eu mollis urna aliquet non. Morbi augue nibh, varius eu fringilla sit amet, ullamcorper non risus. Curabitur et leo et nisi auctor dapibus. Donec convallis ultricies lacinia. Vestibulum ut purus ornare dolor iaculis commodo. Integer volutpat lorem sed nibh volutpat mattis.</p>\r\n<p>\r\n	Aliquam eu purus odio. Aliquam at lectus turpis. Quisque scelerisque lectus id ante varius porttitor. In arcu ligula, convallis non iaculis ut, venenatis eget tellus. Nulla ut orci sapien, sed tristique risus. Sed venenatis volutpat nisi ultrices fermentum. Aliquam dictum tincidunt arcu eu tristique. Aenean nulla leo, luctus id mollis sit amet, faucibus mattis risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>\r\n');

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 06:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amiticorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_category`
--

CREATE TABLE `ac_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_category`
--

INSERT INTO `ac_category` (`id`, `name`) VALUES
(1, 'Tech Solution'),
(2, 'Innovation'),
(3, 'Worforce');

-- --------------------------------------------------------

--
-- Table structure for table `ac_posts`
--

CREATE TABLE `ac_posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` enum('published','draft','archived','') NOT NULL DEFAULT 'published',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_posts`
--

INSERT INTO `ac_posts` (`id`, `title`, `message`, `category_id`, `userid`, `status`, `created`, `updated`) VALUES
(1, 'What is PHP?', 'PHP  (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML. \r\n\r\nThe standard PHP interpreter, powered by the Zend Engine, is free software released under the PHP License. PHP has been widely ported and can be deployed on most web servers on almost every operating system and platform, free of charge.[10]\r\n\r\nThe PHP language evolved without a written formal specification or standard until 2014, with the original implementation acting as the de facto standard which other implementations aimed to follow. Since 2014, work has gone on to create a formal PHP specification.[11]\r\n\r\nAs of September 2019, over 60% of sites on the web using PHP are still on discontinued/&quot;EOLed&quot;[12] version 5.6 or older;[13] versions prior to 7.1 are no longer officially supported by The PHP Development Team,[14] but security support is provided by third parties, such as Debian.\r\n\r\nPHP development began in 1994 when Rasmus Lerdorf wrote several Common Gateway Interface (CGI) programs in C,[16][17][18] which he used to maintain his personal homepage. He extended them to work with web forms and to communicate with databases, and called this implementation &quot;Personal Home Page/Forms Interpreter&quot; or PHP/FI.\r\n\r\nPHP/FI could be used to build simple, dynamic web applications. To accelerate bug reporting and improve the code, Lerdorf initially announced the release of PHP/FI as &quot;Personal Home Page Tools (PHP Tools) version 1.0&quot; on the Usenet discussion group comp.infosystems.www.authoring.cgi on June 8, 1995.[19][20] This release already had the basic functionality that PHP has today. This included Perl-like variables, form handling, and the ability to embed HTML. The syntax resembled that of Perl, but was simpler, more limited and less consistent.\r\n\r\nDuring 2014 and 2015, a new major PHP version was developed, which was numbered PHP 7. The numbering of this version involved some debate.[46] While the PHP 6 Unicode experiment had never been released, several articles and book titles referenced the PHP 6 name, which might have caused confusion if a new release were to reuse the name.[47] After a vote, the name PHP 7 was chosen.[48]\r\n\r\nThe foundation of PHP 7 is a PHP branch that was originally dubbed PHP next generation (phpng). It was authored by Dmitry Stogov, Xinchen Hui and Nikita Popov,[49] and aimed to optimize PHP performance by refactoring the Zend Engine while retaining near-complete language compatibility.[50] As of 14 July 2014, WordPress-based benchmarks, which served as the main benchmark suite for the phpng project, showed an almost 100% increase in performance. Changes from phpng are also expected to make it easier to improve performance in the future, as more compact data structures and other changes are seen as better suited for a successful migration to a just-in-time (JIT) compiler.[51] Because of the significant changes, the reworked Zend Engine is called Zend Engine 3, succeeding Zend Engine 2 used in PHP 5.[52]\r\n\r\nBecause of major internal changes in phpng it must receive a new major version number of PHP, rather than a minor PHP 5 release, according to PHP\'s release process.[53] Major versions of PHP are allowed to break backward-compatibility of code and therefore PHP 7 presented an opportunity for other improvements beyond phpng that require backward-compatibility breaks. In particular, it involved the following changes:\r\n\r\nSource: https://en.wikipedia.org/wiki/PHP\r\n', 1, 1, 'published', '2020-10-31 10:07:15', '2020-11-01 00:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `ac_user`
--

CREATE TABLE `ac_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_user`
--

INSERT INTO `ac_user` (`id`, `first_name`, `last_name`, `email`, `password`, `type`, `deleted`) VALUES
(1, 'admin', '', 'admin@amiticorp.com', '202cb962ac59075b964b07152d234b70', 1, 0),
(2, 'user', '', 'user@amiticorp.com', '202cb962ac59075b964b07152d234b70', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_category`
--
ALTER TABLE `ac_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_posts`
--
ALTER TABLE `ac_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_user`
--
ALTER TABLE `ac_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_category`
--
ALTER TABLE `ac_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ac_posts`
--
ALTER TABLE `ac_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ac_user`
--
ALTER TABLE `ac_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

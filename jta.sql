-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2017 at 11:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bagasoo_simca_itraqs`
--

-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_its_disciplines`
--

DROP TABLE IF EXISTS `jos_ion_cts_its_disciplines`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_its_disciplines` (
  `disc_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_code` varchar(100) NOT NULL DEFAULT '',
  `disc_title` varchar(100) NOT NULL DEFAULT '',
  `createdby_id` int(11) NOT NULL DEFAULT '0',
  `date_entered` date NOT NULL DEFAULT '0000-00-00',
  `modifiedby_id` int(11) NOT NULL DEFAULT '0',
  `date_modified` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`disc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_its_disciplines`
--

INSERT INTO `jos_ion_cts_its_disciplines` (`disc_id`, `disc_code`, `disc_title`, `createdby_id`, `date_entered`, `modifiedby_id`, `date_modified`) VALUES
(1, 'AIR', 'Airworthiness', 62, '2004-11-12', 0, '0000-00-00'),
(2, 'OPS', 'Operations', 62, '2004-11-12', 0, '0000-00-00'),
(9, 'SUP', 'Supervisory', 62, '2004-11-12', 62, '2014-07-15'),
(3, 'AGA', 'Aerodromes', 62, '2012-11-01', 0, '0000-00-00'),
(4, 'ANT', 'Aeronautical Telecommunication Service', 62, '2014-07-15', 62, '2014-07-17'),
(5, 'AIS', 'Aeronautical Information Service', 62, '2014-07-15', 62, '2014-07-15'),
(6, 'ATS', 'Air Traffic Services', 62, '2014-07-15', 62, '2014-07-30'),
(7, 'MET', 'Aeronautical Meteorology', 62, '2014-07-15', 0, '0000-00-00'),
(8, 'PEL', 'Personnel Licensing', 62, '2015-02-25', 0, '0000-00-00');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_its_coursecat`
--

DROP TABLE IF EXISTS `jos_ion_cts_its_coursecat`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_its_coursecat` (
  `coursecat_id` int(11) NOT NULL AUTO_INCREMENT,
  `coursecat_code` int(11) NOT NULL DEFAULT '0',
  `coursecat_name` varchar(200) NOT NULL DEFAULT '',
  `createdby_id` int(11) NOT NULL DEFAULT '0',
  `date_entered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedby_id` int(11) NOT NULL DEFAULT '0',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`coursecat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_its_coursecat`
--

INSERT INTO `jos_ion_cts_its_coursecat` (`coursecat_id`, `coursecat_code`, `coursecat_name`, `createdby_id`, `date_entered`, `modifiedby_id`, `date_modified`) VALUES
(1, 1000, 'General Administrative and Technical', 62, '2004-11-12 06:05:00', 71, '2016-04-29 18:51:40'),
(2, 2000, 'Service Provider Certification and Authorization', 62, '2004-11-12 06:05:00', 71, '2016-04-27 11:29:53'),
(3, 3000, 'Special Certification and Authorization', 62, '2004-11-12 06:05:00', 71, '2016-04-27 11:29:53'),
(4, 4000, 'Personnel-Licensing/Competence Assessment', 62, '2004-11-12 06:05:00', 71, '2016-04-27 11:29:53'),
(5, 5000, 'Emerging Technologies Approval', 62, '2004-11-12 06:05:00', 62, '2016-04-28 14:55:55'),
(6, 6000, 'Specialised Job Tasks', 62, '2004-11-12 06:05:00', 62, '2016-04-28 14:55:55'),
(7, 7000, 'Surveillance', 62, '2004-11-12 06:05:00', 71, '2016-04-27 11:29:53'),
(8, 8000, 'Resolution of Safety Issues', 62, '2004-11-12 06:05:00', 71, '2016-04-28 09:22:36'),
(9, 9000, 'Management', 62, '2004-11-12 06:05:00', 0, '0000-00-00 00:00:00');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_itraqs_jta_rating_difficulty`
--

DROP TABLE IF EXISTS `jos_ion_cts_itraqs_jta_rating_difficulty`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_itraqs_jta_rating_difficulty` (
  `jta_diff_id` int(11) NOT NULL AUTO_INCREMENT,
  `jta_diff_code` varchar(5) DEFAULT '',
  `jta_diff_title` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`jta_diff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_itraqs_jta_rating_difficulty`
--

INSERT INTO `jos_ion_cts_itraqs_jta_rating_difficulty` (`jta_diff_id`, `jta_diff_code`, `jta_diff_title`) VALUES
(1, 'L', 'Low'),
(2, 'M', 'Moderate'),
(3, 'H', 'High');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_itraqs_jta_rating_importance`
--

DROP TABLE IF EXISTS `jos_ion_cts_itraqs_jta_rating_importance`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_itraqs_jta_rating_importance` (
  `jta_impt_id` int(11) NOT NULL AUTO_INCREMENT,
  `jta_impt_code` varchar(5) DEFAULT '',
  `jta_impt_title` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`jta_impt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_itraqs_jta_rating_importance`
--

INSERT INTO `jos_ion_cts_itraqs_jta_rating_importance` (`jta_impt_id`, `jta_impt_code`, `jta_impt_title`) VALUES
(1, 'N', 'Non-Critical'),
(2, 'S', 'Semi-Critical'),
(3, 'C', 'Critical');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_gen_time_frequency`
--

DROP TABLE IF EXISTS `jos_ion_cts_gen_time_frequency`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_gen_time_frequency` (
  `frq_id` int(11) NOT NULL AUTO_INCREMENT,
  `frq_code` varchar(5) DEFAULT '',
  `frq_title` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`frq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_gen_time_frequency`
--

INSERT INTO `jos_ion_cts_gen_time_frequency` (`frq_id`, `frq_code`, `frq_title`) VALUES
(1, '', 'Daily'),
(2, '', 'Weekly'),
(3, '', 'Monthly'),
(4, '', 'Quarterly'),
(5, '', 'Semi-Annually'),
(6, '', 'Annually'),
(7, '', 'On-Demand'),
(8, '', 'N/A');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_itraqs_jta`
--

DROP TABLE IF EXISTS `jos_ion_cts_itraqs_jta`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_itraqs_jta` (
  `jta_id` int(11) NOT NULL AUTO_INCREMENT,
`jta_code` varchar(50) DEFAULT '0' COMMENT 'Job Task Code',
`jta_title` varchar(220) DEFAULT '0' COMMENT 'Job Task Title',
`jta_validation_date` date DEFAULT '0000-00-00' COMMENT 'Job Task Validation Date',
`jta_approval_date` date DEFAULT '0000-00-00' COMMENT 'Job Task Approval Date',
`jta_comments` mediumtext COMMENT 'Comments',
`jta_sponsor` varchar(200) DEFAULT '' COMMENT 'Job Task Sponsor',
`jta_series` varchar(200) DEFAULT '' COMMENT 'Job Task Series',
`jta_specialty_id` int(11) DEFAULT '0' COMMENT 'Job Task Specialty or Discipline',
`jta_cat_id` int(11) DEFAULT '0' COMMENT 'Job Function / Category',
`jta_rating_diff_id` int(11) DEFAULT '0' COMMENT 'Job Task Rating Difficulty',
`jta_impt_id` int(11) DEFAULT '0' COMMENT 'Job Task Rating Importance',
`jta_time_days` int(11) DEFAULT '0' COMMENT 'Time to Accomplish (Days)',
`jta_time_hours` int(11) DEFAULT '0' COMMENT 'Time to Accomplish (Hours)',
`jta_time_mins` int(11) DEFAULT '0' COMMENT 'Time to Accomplish (Minutes)',
`jta_time_var` int(11) DEFAULT '0' COMMENT 'Time to Accomplish (Variables in Seconds)',
`jta_frq_id` int(11) DEFAULT '0' COMMENT 'Frequency of Task',
`jta_reg_req` varchar(200) DEFAULT '' COMMENT 'Regulatory Requirement',
`jta_forms` varchar(200) DEFAULT '' COMMENT 'Forms',
`jta_guidance` varchar(200) DEFAULT '' COMMENT 'Other Guidance',
  PRIMARY KEY (`jta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_itraqs_jta`
--

-- INSERT INTO `jos_ion_cts_itraqs_jta` (`jta_id`, `jta_code`, `jta_title`, `jta_validation_date`, `jta_approval_date`, `jta_comments`, `jta_sponsor`, `jta_series`, `jta_specialty_id`, `jta_cat_id`, `jta_rating_diff_id`, `jta_impt_id`, `jta_time_days`, `jta_time_hours`, `jta_time_mins`, `jta_time_var`, `jta_frq_id`, `jta_reg_req`, `jta_forms`,`jta_guidance`) VALUES (1, '', '', '', '', '', '');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_itraqs_jta_course_map`
--

DROP TABLE IF EXISTS `jos_ion_cts_itraqs_jta_course_map`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_itraqs_jta_course_map` (
  `jta_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `jta_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent JTA Record',
  `jta_course_title` varchar(200) NOT NULL DEFAULT 'Course Number and Title',
  `jta_course_provider` varchar(200) DEFAULT 'Training Provider',
  `jta_course_location` varchar(200) DEFAULT 'Training Location',
  PRIMARY KEY (`jta_map_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_itraqs_jta_course_map`
--

-- INSERT INTO `jos_ion_cts_gen_time_frequency` (`jta_course_id`, `jta_id`, `jta_course_title`, `jta_course_provider`, `jta_course_location`) VALUES (1, '', '', '', '', '', '');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_itraqs_jta_activity_map`
--

DROP TABLE IF EXISTS `jos_ion_cts_itraqs_jta_activity_map`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_itraqs_jta_activity_map` (
  `jta_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `jta_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent JTA Record',
  `jta_activity_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent JTA Record',
  `jta_activity_code` varchar(200) NOT NULL DEFAULT '' COMMENT 'ISATS Activity Code',
  PRIMARY KEY (`jta_map_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_itraqs_jta_activity_map`
--

-- INSERT INTO `jos_ion_cts_itraqs_jta_activity_map` (`jta_course_id`, `jta_course_title`, `jta_course_provider`, `jta_course_location`) VALUES (1, '', '', '', '', '', '');


-- --------------------------------------------------------

--
-- Table structure for table `jos_ion_cts_itraqs_jta_sub_task_map`
--

DROP TABLE IF EXISTS `jos_ion_cts_itraqs_jta_sub_task_map`;
CREATE TABLE IF NOT EXISTS `jos_ion_cts_itraqs_jta_sub_task_map` (
  `jta_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `jta_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Parent JTA Record',
  `jta_sub_task_title` varchar(200) NOT NULL DEFAULT '',
  `jta_sub_task_performance` varchar(200) DEFAULT '',
  `jta_sub_task_conditions` varchar(200) DEFAULT '',
  `jta_sub_task_standards` varchar(200) DEFAULT '',
  `jta_sub_task_knowledge` varchar(200) DEFAULT '',
  PRIMARY KEY (`jta_map_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_ion_cts_itraqs_jta_sub_task_map`
--

-- INSERT INTO `jos_ion_cts_gen_time_frequency` (`jta_sub_task_id`, `jta_id`, `jta_sub_task_title`, `jta_sub_task_performance`, `jta_sub_task_conditions`, `jta_sub_task_standards`, `jta_sub_task_knowledge`) VALUES (1, '', '', '', '', '', '');


-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg09.eigbox.net
-- Generation Time: Nov 21, 2012 at 12:35 PM
-- Server version: 5.0.91
-- PHP Version: 4.4.9
-- 
-- Database: `pa_members`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `about`
-- 

CREATE TABLE `about` (
  `idnum` int(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(3) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pay` int(255) NOT NULL,
  `hourly` tinyint(1) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transportation` tinyint(1) NOT NULL default '0',
  `relocate` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`idnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `about`
-- 

INSERT INTO `about` VALUES (5, 'Public Policy, Government, Law', 'Brookfield', 'WI', 'United States', 0, 0, 'Employed', 0, 0);
INSERT INTO `about` VALUES (13, 'Public Policy, Government, Law', 'Brookfield', 'WI', 'United States', 50000, 0, 'Summer Internship', 0, 1);
INSERT INTO `about` VALUES (23, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (20, 'Mechanical Engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (27, 'Engineering, Information Technology', 'Nashville', 'TN', 'United States', 0, 0, 'Summer Internship', 0, 1);
INSERT INTO `about` VALUES (9, 'Computer Science', 'Pensacola', 'FL', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (29, 'Civil Engineering ', 'Nashville', 'SC', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (30, 'Human Organizational Development and Corporate Strategy', 'Nashville', 'Tn', 'United States', 0, 0, 'Employed', 0, 0);
INSERT INTO `about` VALUES (167, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (31, 'Mechanical Engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (32, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (33, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (34, '', '', '', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (35, 'Engineering, Information Technology', 'Nashville', 'TN', 'United States', 0, 0, 'Summer Internship', 0, 0);
INSERT INTO `about` VALUES (36, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (37, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (38, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (39, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (40, 'Communications/Public Relations', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (41, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (42, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (43, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (44, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (45, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (46, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (47, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (48, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (49, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (50, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (51, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (52, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (53, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (54, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (55, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (56, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (57, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (58, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (59, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (60, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (62, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (63, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (64, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (65, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (66, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (7, 'Computer Science', 'Brookfield', 'Wis', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (67, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (68, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (122, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (70, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (71, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (72, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (73, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (74, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (75, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (123, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (78, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (79, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (80, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (81, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (82, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (83, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (84, 'biomedical engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (85, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (86, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (87, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (88, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (89, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (90, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (91, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (92, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (93, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (94, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (95, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (96, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (97, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (98, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (99, 'Political Science, Fine Arts, Studio Arts', '', '', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (100, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (101, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (102, 'English; Financial Economics; Corporate Strategy', 'Oak Park', 'Il', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (103, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (104, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (105, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (106, '', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (107, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (108, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (109, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (110, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (111, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (112, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (113, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (114, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (115, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (116, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (117, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (118, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (119, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (120, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (121, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (124, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (125, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (126, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (127, '', '', '', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (128, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (129, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (130, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (131, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (132, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (133, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (134, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (135, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (136, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (137, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (138, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (139, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (140, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (141, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (142, 'Biology, Business', 'Franktown', 'CO', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (143, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (144, '', 'Coronado', 'CA', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (145, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (146, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (147, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (148, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (149, '', 'Springfield', 'VA', 'United States', 0, 1, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (150, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (151, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (152, 'Marketing, Advertising, Public Relations', '', '', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (153, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (154, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (155, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (156, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (157, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (159, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (160, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (172, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (162, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (164, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (165, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (166, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (168, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (169, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (170, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (171, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (183, '', 'Greenfield ', 'WI', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (174, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (175, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (176, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (177, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (178, 'Biology', 'Berkeley', 'CA', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (179, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (180, 'Finance ', 'Nashville ', 'TN', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (186, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (182, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (184, '', '', '', 'United States', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (185, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (187, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);
INSERT INTO `about` VALUES (188, '', '', '', '', 0, 0, 'Searching for Internship', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `accepted`
-- 

CREATE TABLE `accepted` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `accepted`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `available_slots`
-- 

CREATE TABLE `available_slots` (
  `slot_id` int(255) NOT NULL auto_increment,
  `r_id` int(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `user_id` int(255) NOT NULL default '0',
  PRIMARY KEY  (`slot_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `available_slots`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `b_interested`
-- 

CREATE TABLE `b_interested` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `interview` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `b_interested`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `business_structure`
-- 

CREATE TABLE `business_structure` (
  `b_id` int(255) NOT NULL,
  `idnum` int(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY  (`b_id`,`idnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `business_structure`
-- 

INSERT INTO `business_structure` VALUES (1, 30, '');
INSERT INTO `business_structure` VALUES (2, 30, '');
INSERT INTO `business_structure` VALUES (4, 168, 'CEO');
INSERT INTO `business_structure` VALUES (3, 164, 'President');
INSERT INTO `business_structure` VALUES (2, 5, 'CEO');
INSERT INTO `business_structure` VALUES (5, 27, '');
INSERT INTO `business_structure` VALUES (5, 186, 'Human Resources');

-- --------------------------------------------------------

-- 
-- Table structure for table `businesses`
-- 

CREATE TABLE `businesses` (
  `b_id` int(20) NOT NULL auto_increment,
  `company_name` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `company_overview` varchar(2048) NOT NULL,
  `description` text NOT NULL,
  `mission` text NOT NULL,
  `awards` text NOT NULL,
  `products` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `creator` int(255) NOT NULL default '0',
  `picture` varchar(512) NOT NULL,
  `founded` date NOT NULL,
  PRIMARY KEY  (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `businesses`
-- 

INSERT INTO `businesses` VALUES (1, 'Ingram Industries', 'Book', '', 'Ingram Industries is a company based in Nashville founded by the late Erskine Bronson Ingram and still owned and run by the Ingram family. Ingram Barge Company was founded by his father, Orrin Henry Ingram. Since the death of Erskine in 1995, Ingram Industries has been run by his widow Martha Rivers Ingram and their sons Orrin and John.', '', '', '', 'La Vergne', 'TN', 30, 'business_img/1.gif', '1970-01-01');
INSERT INTO `businesses` VALUES (2, 'Professional Archives', 'Internet', '', 'Here at ProArcs we are just trying to make the job process easier for employers and candidates. Let us start matching you with interns/internships today!', '', '', '', 'Nashville', 'TN', 27, '/business_img/27.png', '0000-00-00');
INSERT INTO `businesses` VALUES (3, 'Goldenstone Automation Co.', '', '', '', '', '', '', 'Greenfield', 'WI', 164, '', '0000-00-00');
INSERT INTO `businesses` VALUES (4, 'Pinpoint Interests', '', '', '', '', '', '', 'Nashville', 'TN', 168, '/business_img/168.jpg', '0000-00-00');
INSERT INTO `businesses` VALUES (5, 'Epic', 'Healthcare Software', '', 'Epic makes software for mid-size and large medical groups, hospitals and integrated healthcare organizations working with customers that include community hospitals, academic facilities, children''s organizations, safety net providers and multi-hospital systems. Our integrated software spans clinical, access and revenue functions and extends into the home. Epic is a national leader in software development for healthcare systems. We create and implement a wide range of integrated software for many of the largest healthcare organizations in the country. Our software improves patient care and reduces costs. Over the last 15 years we have seen steady growth, and currently, organizations using our software care for about 140 million people across the United States. That means that 1 in 3 people in the U.S. are directly affected by the work we do. Beyond all of that Epic is an exciting, innovative place to work.', '', '', '', 'Verona', 'WI', 27, '/business_img/6.jpg', '0000-00-00');

-- --------------------------------------------------------

-- 
-- Table structure for table `c_applied_1`
-- 

CREATE TABLE `c_applied_1` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `interview` tinyint(2) NOT NULL default '0',
  `group` varchar(255) NOT NULL default 'None',
  `priority` int(3) NOT NULL default '2',
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `c_applied_1`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `c_applied_2`
-- 

CREATE TABLE `c_applied_2` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `interview` tinyint(2) NOT NULL default '0',
  `group` varchar(255) NOT NULL default 'None',
  `priority` int(3) NOT NULL default '2',
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `c_applied_2`
-- 

INSERT INTO `c_applied_2` VALUES (20, 1, 0, 0, 'None', 3);
INSERT INTO `c_applied_2` VALUES (155, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (155, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (155, 5, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (155, 3, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (5, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (20, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (36, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (5, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (27, 1, 0, 0, 'None', 1);
INSERT INTO `c_applied_2` VALUES (9, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (29, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (30, 5, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (31, 3, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (33, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (37, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (43, 3, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (35, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (41, 1, 0, 0, 'None', 0);
INSERT INTO `c_applied_2` VALUES (30, 3, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (31, 2, 0, 0, 'None', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `c_applied_3`
-- 

CREATE TABLE `c_applied_3` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `interview` tinyint(2) NOT NULL default '0',
  `group` varchar(255) NOT NULL default 'None',
  `priority` int(3) NOT NULL default '2',
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `c_applied_3`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `c_applied_5`
-- 

CREATE TABLE `c_applied_5` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `interview` tinyint(2) NOT NULL default '0',
  `group` varchar(255) NOT NULL default 'None',
  `priority` int(3) NOT NULL default '2',
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `c_applied_5`
-- 

INSERT INTO `c_applied_5` VALUES (5, 6, 0, 0, 'None', 3);
INSERT INTO `c_applied_5` VALUES (20, 6, 0, 0, 'None', 3);
INSERT INTO `c_applied_5` VALUES (25, 6, 0, 0, 'None', 2);
INSERT INTO `c_applied_5` VALUES (29, 6, 0, 0, 'None', 1);
INSERT INTO `c_applied_5` VALUES (31, 6, 0, 0, 'None', 1);
INSERT INTO `c_applied_5` VALUES (35, 6, 0, 0, 'None', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `c_top_2`
-- 

CREATE TABLE `c_top_2` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `is_resumed` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `c_top_2`
-- 

INSERT INTO `c_top_2` VALUES (5, 1, 0, 0);
INSERT INTO `c_top_2` VALUES (60, 1, 0, 0);
INSERT INTO `c_top_2` VALUES (41, 1, 0, 0);
INSERT INTO `c_top_2` VALUES (108, 1, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `c_top_5`
-- 

CREATE TABLE `c_top_5` (
  `idnum` int(255) NOT NULL,
  `jid` int(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `is_resumed` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`idnum`,`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `c_top_5`
-- 

INSERT INTO `c_top_5` VALUES (5, 6, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `calendar`
-- 

CREATE TABLE `calendar` (
  `cid` int(255) NOT NULL auto_increment,
  `idnum` int(255) NOT NULL,
  `event` varchar(2048) NOT NULL,
  `description` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `calendar`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `careers`
-- 

CREATE TABLE `careers` (
  `jid` int(255) NOT NULL auto_increment,
  `company_name` varchar(255) NOT NULL,
  `b_id` int(255) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `major` varchar(512) NOT NULL,
  `job_description` text NOT NULL,
  `qualifications` text NOT NULL,
  `pay` int(255) NOT NULL,
  `rate` varchar(100) NOT NULL default 'annual',
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `internship` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`jid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `careers`
-- 

INSERT INTO `careers` VALUES (1, 'Professional Archives', 2, 'Internet Engineer', 'Computer Science, Computer Engineering', '', '', 60000, '', 'Nashville', 'TN', 'United States', 1);
INSERT INTO `careers` VALUES (2, 'Professional Archives', 2, 'Marketing ', 'Economics, HOD', '', '', 40000, '', 'Nashville', 'TN', 'United States', 1);
INSERT INTO `careers` VALUES (3, 'Professional Archives', 2, 'Web Design Intern', 'Computer Science, Computer Engineering', 'Web Design Intern', '', 20, 'Hourly', 'Nashville', 'TN', 'United States', 0);
INSERT INTO `careers` VALUES (7, 'Epic', 5, 'Software Development Intern', 'Computer Science', '', '', 0, 'Annual/Total', 'Madison', 'WI', 'United States', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `connections`
-- 

CREATE TABLE `connections` (
  `from_idnum` int(255) NOT NULL,
  `to_idnum` int(255) NOT NULL,
  PRIMARY KEY  (`from_idnum`,`to_idnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `connections`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `education_data`
-- 

CREATE TABLE `education_data` (
  `eid` int(255) unsigned NOT NULL auto_increment,
  `idnum` int(255) unsigned NOT NULL,
  `type` tinyint(2) NOT NULL default '1',
  `college` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `major` varchar(512) NOT NULL,
  `minor` varchar(512) NOT NULL,
  `college_start` date NOT NULL,
  `college_end` date NOT NULL,
  `gpa` float NOT NULL,
  `honors` text NOT NULL,
  PRIMARY KEY  (`eid`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

-- 
-- Dumping data for table `education_data`
-- 

INSERT INTO `education_data` VALUES (1, 5, 1, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science', '', '2010-08-01', '2014-05-01', 3.71, 'Dean''s List');
INSERT INTO `education_data` VALUES (2, 20, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering', '', '2010-08-01', '2014-05-01', 3.94, '');
INSERT INTO `education_data` VALUES (3, 25, 1, 'Vanderbilt University', 'Bachelor of Arts', 'German', '', '0000-00-00', '0000-00-00', 3.17, '');
INSERT INTO `education_data` VALUES (4, 27, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering ', '', '2010-08-01', '2014-05-01', 2.8, '');
INSERT INTO `education_data` VALUES (5, 28, 1, 'Vanderbilt University', 'Bachelor of Arts', '', '', '0000-00-00', '0000-00-00', 0, '');
INSERT INTO `education_data` VALUES (6, 29, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil Engineering', '', '0000-00-00', '0000-00-00', 3.6, 'KA');
INSERT INTO `education_data` VALUES (7, 31, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering, Finance', '', '0000-00-00', '0000-00-00', 3.9, '');
INSERT INTO `education_data` VALUES (8, 32, 1, 'Vanderbilt University', 'Bachelor of Science', 'Economics', '', '0000-00-00', '0000-00-00', 3, '');
INSERT INTO `education_data` VALUES (9, 33, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Finance, Corporate Strategy', '', '0000-00-00', '0000-00-00', 3.88, '');
INSERT INTO `education_data` VALUES (10, 34, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Premed', '', '2010-08-01', '2012-01-01', 3.44, '');
INSERT INTO `education_data` VALUES (11, 36, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Business, Spanish', '', '0000-00-00', '0000-00-00', 3.481, '');
INSERT INTO `education_data` VALUES (12, 35, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Engineering', '', '2010-08-01', '2014-05-01', 3.9, 'National Merit Scholar, Dean''s List');
INSERT INTO `education_data` VALUES (13, 39, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, HOD, Financial Economics', '', '0000-00-00', '0000-00-00', 3.56, '');
INSERT INTO `education_data` VALUES (14, 40, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Communication Studies', '', '2010-08-01', '2014-05-01', 3.313, '');
INSERT INTO `education_data` VALUES (15, 41, 1, 'Duke University', 'Bachelor of Arts', 'Economics', '', '0000-00-00', '0000-00-00', 3.5, '');
INSERT INTO `education_data` VALUES (16, 43, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human & Organizational Development, Spanish', '', '0000-00-00', '0000-00-00', 3.42, '');
INSERT INTO `education_data` VALUES (17, 44, 1, 'Vanderbilt University', 'Bachelor of Science', 'Neuroscience, Linguistics', '', '0000-00-00', '0000-00-00', 3.65, '');
INSERT INTO `education_data` VALUES (18, 46, 1, 'Vanderbilt University', 'Bachelor of Arts', 'History, Spanish, Corporate Strategy', '', '0000-00-00', '0000-00-00', 0, '');
INSERT INTO `education_data` VALUES (19, 47, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Chemistry', '', '0000-00-00', '0000-00-00', 3.84, '');
INSERT INTO `education_data` VALUES (20, 48, 1, 'Lyon College', 'Bachelor of Arts', 'History', '', '0000-00-00', '0000-00-00', 3.61, '');
INSERT INTO `education_data` VALUES (21, 50, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Science, Math', '', '0000-00-00', '0000-00-00', 3.9, '');
INSERT INTO `education_data` VALUES (22, 51, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '0000-00-00', '0000-00-00', 3.8, '');
INSERT INTO `education_data` VALUES (23, 52, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Medicine, Health, and Society and Psychology ', '', '0000-00-00', '0000-00-00', 3.1, '');
INSERT INTO `education_data` VALUES (24, 53, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Human & Organizational Development', '', '0000-00-00', '0000-00-00', 2.67, '');
INSERT INTO `education_data` VALUES (25, 54, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '0000-00-00', '0000-00-00', 3.628, '');
INSERT INTO `education_data` VALUES (26, 57, 1, 'Vanderbilt University', 'Bachelor of Arts', 'sociology', '', '0000-00-00', '0000-00-00', 0, '');
INSERT INTO `education_data` VALUES (27, 59, 1, 'University of South Carolina', 'Bachelor of Science', 'Biological Science/Pre-Med, Southern Studies', '', '0000-00-00', '0000-00-00', 3.65, '');
INSERT INTO `education_data` VALUES (28, 60, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Biomedical Engineering/Pre-Med', '', '0000-00-00', '0000-00-00', 3.931, '');
INSERT INTO `education_data` VALUES (29, 150, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science, Anthropology', '', '2010-08-01', '2014-05-01', 3.4, 'National Merit Scholarship Recipient ');
INSERT INTO `education_data` VALUES (30, 63, 1, 'University of Virginia', 'Bachelor of Nursing', 'Nursing', '', '2010-08-01', '2014-05-01', 3.558, '');
INSERT INTO `education_data` VALUES (31, 65, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Biology, Economics', '', '1990-01-01', '1990-01-01', 2.6, '');
INSERT INTO `education_data` VALUES (32, 7, 1, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science', '', '2010-08-01', '2014-05-01', 3.705, '');
INSERT INTO `education_data` VALUES (33, 69, 1, 'Harvard College', 'Bachelor of Arts', 'Portuguese', '', '2010-11-01', '2014-05-01', 3.705, '');
INSERT INTO `education_data` VALUES (34, 70, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science ', '', '2009-08-01', '2013-05-01', 2.96, '');
INSERT INTO `education_data` VALUES (35, 71, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil Engineering', 'Material Science, ', '2010-08-01', '2014-05-01', 2.65, '');
INSERT INTO `education_data` VALUES (36, 122, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil Engineering', '', '2010-08-01', '2014-05-01', 3.85, 'Dean''s List');
INSERT INTO `education_data` VALUES (37, 78, 1, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science', '', '2010-08-01', '2014-03-01', 3.3, 'Independent Study');
INSERT INTO `education_data` VALUES (38, 80, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering', '', '2010-08-01', '2014-05-01', 2.78, 'Alpha Tau Omega Fraternity, HOPE scholarship, ');
INSERT INTO `education_data` VALUES (39, 81, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Science', '', '2011-08-01', '2015-05-01', 4, '');
INSERT INTO `education_data` VALUES (40, 82, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Human and Organizational Development', '', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (41, 83, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering, Math', '', '2010-08-01', '2014-05-01', 3.421, 'Dean''s List, Theta Tau (new member educator), Alpha Omicron Pi (Keeper of the Ritual)');
INSERT INTO `education_data` VALUES (42, 84, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Biomedical Engineering', '', '2010-08-01', '2014-05-01', 3.085, '');
INSERT INTO `education_data` VALUES (43, 85, 1, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science, Math', '', '2008-08-01', '2012-05-01', 3.68, 'VSVS, Dean''s List, Tau Beta Pi');
INSERT INTO `education_data` VALUES (44, 86, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Sociology, Spanish', '', '2011-09-01', '2013-05-01', 3.5, 'Dean''s list \r\nNewspaper\r\nHer Campus Online Magazine\r\nPencil Pals \r\nMANNA High School Tutoring\r\nAlpha Phi Omega Volunteer Fraternity');
INSERT INTO `education_data` VALUES (45, 87, 1, 'Vanderbilt University', 'Bachelor of Science', 'Medicine, Health, and Society; Nursing', '', '2010-08-01', '2014-05-01', 2.74, 'Alpha Phi Omega\r\nComplete Capture\r\nVanderbuddies\r\nCafe Con Leche\r\nAmerican Red Cross Internship\r\nPREP\r\n\r\n');
INSERT INTO `education_data` VALUES (46, 88, 1, 'Vanderbilt University', 'Bachelor of Science', 'Psychology, Pre-medical', '', '2010-08-01', '2014-05-01', 2.8, 'National Merit Scholarship, Leadership Hall, Youth Encouragement Services, Minority Association of Pre-Health Students, Alpha Phi Omega ');
INSERT INTO `education_data` VALUES (47, 89, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Biological Sciences, Economics', '', '2007-08-01', '2013-05-01', 2.006, '');
INSERT INTO `education_data` VALUES (48, 90, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science, Spanish, Italian', '', '2008-08-01', '2012-05-01', 3.61, 'Alpha Phi Omega, Alternative Winter Break, Alternative Spring Break, Vanderbilt VIEW, Vanderbilt VISAGE Cost Rica, Vanderbilt PREP');
INSERT INTO `education_data` VALUES (49, 91, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2011-08-01', '2014-05-01', 3.25, '');
INSERT INTO `education_data` VALUES (50, 92, 1, 'Vanderbilt University', 'Bachelor of Science', 'Child Studies, Pre-Med', '', '2011-08-01', '2015-05-01', 0, '');
INSERT INTO `education_data` VALUES (51, 94, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Public Policy Studies', '', '2009-09-01', '2013-05-01', 3.86, 'Vanderbilt Undergraduate Advisory Board, Dean''s List, Alpha Phi Omega, Vanderbilt Off-Broadway, Vanderbilt Undergraduate Concert Choir, Alternative Spring Break, Alternative Summer Break, Vanderbilt Internship Experience in Washington D.C.');
INSERT INTO `education_data` VALUES (52, 95, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil & Environmental Engineering', '', '1990-01-01', '1990-01-01', 3.548, 'Dean''s List (Spring 2010, Fall 2011), Chi Epsilon Civil Engineering Honor Society');
INSERT INTO `education_data` VALUES (53, 96, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Psychology', '', '2011-08-01', '2015-05-01', 3.821, 'Dean''s List, VOCE A Capella, APO, Habitat for Humanity, ACE Design Team');
INSERT INTO `education_data` VALUES (54, 99, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science, Studio Art', '', '2010-08-01', '2013-05-01', 3.287, 'Recipient of Provost award at Richmond the American International University in London. Received Spring 2010\r\n');
INSERT INTO `education_data` VALUES (55, 101, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, General', '', '1990-01-01', '1990-01-01', 2.74, 'Alpha Phi Omega, Cafe Con Leche, PREP Program, Calling Center, Front Desk Reeve');
INSERT INTO `education_data` VALUES (56, 103, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2010-08-01', '2014-05-01', 3.68, 'Dean''s List all semesters\r\nSigma Nu Fraternity\r\nVanderbilt Student Government- Peabody Council Member');
INSERT INTO `education_data` VALUES (57, 105, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics/Chinese', '', '2011-08-01', '2013-08-01', 3.5, 'Alpha Phi Omega\r\nGlobal China Connection\r\nIntramural');
INSERT INTO `education_data` VALUES (58, 106, 1, 'University of Alabama', 'Bachelor of Science', 'Finance and Economics', '', '2010-08-01', '2014-05-01', 3.68, 'Dean''s List, University Honors College, Golden Key International Honour Society, Phi Eta Sigma National Honor Society, The National Society of Collegiate Scholars');
INSERT INTO `education_data` VALUES (59, 113, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, HOD', '', '2011-08-01', '2015-05-01', 0, 'Vanderbilt Dodecaphonics, Mosaic');
INSERT INTO `education_data` VALUES (60, 102, 1, 'Vanderbilt University', 'Bachelor of Arts', 'English; Financial Economics; Corporate Strategy', '', '1990-01-01', '1990-01-01', 3.64, 'Dean''s List');
INSERT INTO `education_data` VALUES (61, 108, 1, 'Duke University', 'Associate', 'Information Technology', '', '2019-12-01', '1990-01-01', 1.2, 'FRAT');
INSERT INTO `education_data` VALUES (62, 109, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Corporate Strategy, French', '', '2010-08-01', '2014-05-01', 3.38, 'Dean''s List');
INSERT INTO `education_data` VALUES (63, 30, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human Organizational Development', 'Managerial Studies: Corporate Strategy', '2010-08-01', '2012-05-01', 3, '');
INSERT INTO `education_data` VALUES (64, 116, 1, '', 'Bachelor of Arts', 'Communication Studies, Italian', '', '2011-08-01', '2014-05-01', 3.5, 'Member of Kappa Kappa Gamma');
INSERT INTO `education_data` VALUES (65, 118, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development; Economics', '', '2010-08-01', '2014-05-01', 3.52, 'Dean''s List, Phi Sigma Pi National Honor Fraternity, Vanderbilt Club Hockey, Young Americans for Liberty.');
INSERT INTO `education_data` VALUES (66, 119, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2011-08-01', '2012-02-01', 3.55, 'Dean''s List');
INSERT INTO `education_data` VALUES (67, 120, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development, Corporate Strategy', '', '2010-08-01', '2014-05-01', 3.88, '');
INSERT INTO `education_data` VALUES (68, 121, 1, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science & Philosophy', '', '2011-08-01', '2014-05-01', 3.7, 'Vanderbilt Mobile Applications Team\r\nVanderbilt Model United Nations\r\nCTO of Solution Pack Nonprofit Organization\r\nServer Administrator for Dept. of Chemical Engineering');
INSERT INTO `education_data` VALUES (69, 123, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '2010-08-01', '2014-05-01', 2.9, '');
INSERT INTO `education_data` VALUES (70, 124, 1, 'Vanderbilt University', 'Bachelor of Science', 'ajifo', '', '1990-12-01', '1990-01-01', 3.2, 'aijdsf');
INSERT INTO `education_data` VALUES (71, 126, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human & Organizational Development', '', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (72, 127, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '1993-08-01', '1997-05-01', 3.85, 'Dean''s List, National Merit Scholarship');
INSERT INTO `education_data` VALUES (73, 131, 1, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2010-08-01', '2014-05-01', 3.3, 'Dean''s List Sophomore Fall');
INSERT INTO `education_data` VALUES (74, 133, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Corporate Strategy Minor', '', '2010-09-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (75, 135, 1, 'University of Tennessee Knoxville', 'Bachelor of Arts', 'Finance', '', '2010-08-01', '2014-05-01', 3.4, 'Dean''s List');
INSERT INTO `education_data` VALUES (76, 136, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Communication Studies', '', '2008-08-01', '2012-05-01', 0, '');
INSERT INTO `education_data` VALUES (77, 139, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Medicine', '', '2009-08-01', '2012-12-01', 3.5, 'Dean''s List');
INSERT INTO `education_data` VALUES (78, 141, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '2011-08-01', '2015-05-01', 0, '');
INSERT INTO `education_data` VALUES (79, 142, 1, 'Vanderbilt University', 'Bachelor of Science', 'Molecular and Cellular Biology', 'Corporate Strategy, Leadership and Organization', '2010-08-01', '2014-05-01', 3.2, '');
INSERT INTO `education_data` VALUES (80, 144, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Managerial Studies', '', '2011-08-01', '2014-05-01', 0, 'Ã¢â‚¬Â¢Phi Eta Sigma Honor Society for Freshmen (Tulane, 2010-2011)\r\nÃ¢â‚¬Â¢Alpha Lamba Delta National Honor Society (Tulane, 2010-2011)\r\nÃ¢â‚¬Â¢National Honors Society (9th Ã¢â‚¬â€œ 12th Grade)\r\nÃ¢â‚¬Â¢Honor Roll (9th  - 12th Grade)\r\n');
INSERT INTO `education_data` VALUES (81, 145, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Science, Math', '', '2010-08-01', '2014-05-01', 3.22, '');
INSERT INTO `education_data` VALUES (82, 146, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering, Engineering Management', '', '2008-08-01', '2012-05-01', 2.875, 'National Merit Scholar');
INSERT INTO `education_data` VALUES (83, 147, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Human and Organizational Development', '', '2010-08-01', '2014-05-01', 3.79, 'Dean''s List');
INSERT INTO `education_data` VALUES (84, 148, 1, 'University of Virginia', 'Bachelor of Engineering', 'Systems Engineering', '', '2010-09-01', '2014-05-01', 3, '');
INSERT INTO `education_data` VALUES (85, 149, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Philosophy', '', '2010-08-01', '2014-05-01', 3.77, 'Dean''s List');
INSERT INTO `education_data` VALUES (86, 151, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Electrical Engineering', '', '2011-08-01', '2015-05-01', 3.67, 'Dean''s List');
INSERT INTO `education_data` VALUES (87, 152, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Marketing, Chinese', '', '2010-08-01', '2014-05-01', 3.6, 'Dean''s List');
INSERT INTO `education_data` VALUES (88, 154, 1, 'Vanderbilt University', 'Bachelor of Science', 'Elementary Education, Math & Science Studies', '', '2007-08-01', '2011-12-01', 0, '');
INSERT INTO `education_data` VALUES (89, 157, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Corporate Strategy, Art History', '', '2010-08-01', '2014-05-01', 3.8, 'Dean''s List;\r\nAlpha Lambda Delta Honorary Society;\r\nPhi Eta Sigma Honorary Society\r\n\r\n');
INSERT INTO `education_data` VALUES (90, 159, 1, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering', '', '2010-08-01', '2015-05-01', 0, '');
INSERT INTO `education_data` VALUES (91, 162, 1, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science, Mathematics', '', '2010-08-01', '2013-05-01', 3.12, '');
INSERT INTO `education_data` VALUES (92, 9, 1, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science, Math', 'Theatre', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (93, 164, 1, 'Shanghai University', 'Bachelor of Engineering', 'Electrical Engineering', '', '1990-01-01', '1990-01-01', 0, '');
INSERT INTO `education_data` VALUES (94, 165, 1, 'Vanderbilt University', 'Bachelor of Arts', 'ji', '', '1990-01-01', '1990-01-01', 0, 'fin');
INSERT INTO `education_data` VALUES (95, 170, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Huh?', '', '1990-01-01', '1990-01-01', 0, '');
INSERT INTO `education_data` VALUES (96, 171, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Psychology, Corporate Strategy', '', '2010-08-01', '2014-04-01', 3.37, '');
INSERT INTO `education_data` VALUES (97, 178, 1, 'University of California at Berkeley', 'Bachelor of Arts', 'Immunology and Pathogenesis, French', '', '2010-08-01', '2014-05-01', 3.26, '');
INSERT INTO `education_data` VALUES (98, 179, 1, 'University of Virginia', 'Bachelor of Nursing', 'nursing', '', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (99, 180, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '2010-09-01', '2014-05-01', 3.87, 'Dean''s List');
INSERT INTO `education_data` VALUES (100, 186, 1, 'Brigham Young University', 'Bachelor of Arts', 'Chinese', '', '2001-08-01', '2007-05-01', 0, 'all of them');
INSERT INTO `education_data` VALUES (101, 182, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Psychology', '', '2011-08-01', '2015-05-01', 3.92, 'Dean''s List ');
INSERT INTO `education_data` VALUES (102, 183, 1, 'Milwaukee School of Engineering', 'Bachelor of Science', 'BioMolecular Engineering', '', '2010-09-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (103, 184, 1, 'Sewanee: The University of the South', 'Bachelor of Arts', 'Philosophy, Political Science', '', '2010-08-01', '2012-08-01', 3.2, '');
INSERT INTO `education_data` VALUES (104, 187, 1, 'Stanford University', 'Bachelor of Engineering', 'Management Science and Engineering', 'Computer Science', '2011-09-01', '2015-06-01', 3.9, 'National Merit Scholarship');
INSERT INTO `education_data` VALUES (105, 189, 1, 'Wake Forest University', 'Bachelor of Science', 'Computer Science, Math', '', '2009-08-01', '2013-06-01', 3.7, 'Dean''s List, George Hankins Scholar, Graduated with Honors in CS');
INSERT INTO `education_data` VALUES (106, 191, 1, 'Vanderbilt University', 'Bachelor of Arts', 'Finance and Business Development', '', '2010-08-01', '2014-05-01', 3.2, 'Member of Vanderbilt Baseball Team 2011-12\r\nMember of College World Series Team 2011\r\nSEC All Academic Honor Roll 2011, 2012\r\nEagle Scout');
INSERT INTO `education_data` VALUES (107, 192, 1, 'Stanford University', 'Associate', 'Women''s Studies', '', '2019-12-01', '1993-02-01', 4, 'Woman of the Year');
INSERT INTO `education_data` VALUES (108, 193, 0, 'Stanford University', 'Adjunct Professor', '', '', '1990-01-01', '1990-01-01', 5, 'Professor of Year, 2012\r\nHot Dog Eating Contest 2nd Place, 2003');
INSERT INTO `education_data` VALUES (109, 0, 1, 'Northwestern University', 'YTDbzZMPjIqLAMLgH', 'EKjYIupnxDlugfXGkB', 'rWeRxUIC', '0000-00-00', '0000-00-00', 0, 'It''s a pelasrue to find someone who can think so clearly');
INSERT INTO `education_data` VALUES (110, 196, 1, 'Georgia Institute of Technology', 'Bachelor of Engineering', 'Computer Science', '', '2011-08-01', '2012-12-01', 3.75, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `education_general`
-- 

CREATE TABLE `education_general` (
  `eid` int(11) NOT NULL auto_increment,
  `college` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `statistics` text NOT NULL,
  `rankings` text NOT NULL,
  PRIMARY KEY  (`eid`),
  UNIQUE KEY `college` (`college`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `education_general`
-- 

INSERT INTO `education_general` VALUES (1, 'Vanderbilt University', 'Nashville', 'TN', '', '');
INSERT INTO `education_general` VALUES (2, 'Duke University', 'Durham', 'NC', '', '');
INSERT INTO `education_general` VALUES (3, 'University of Notre Dame', 'Notre Dame', 'IN', '', '');
INSERT INTO `education_general` VALUES (4, 'Northwestern University', 'Evanston', 'IL', '', '');
INSERT INTO `education_general` VALUES (5, 'University of Chicago', 'Chicago', 'IL', '', '');
INSERT INTO `education_general` VALUES (6, 'University of North Carolina', 'Chapel Hill', 'NC', '', '');
INSERT INTO `education_general` VALUES (7, 'Washington University', 'St. Louis', 'MO', '', '');
INSERT INTO `education_general` VALUES (8, 'University of Virginia', 'Charlottesville', 'VA', '', '');
INSERT INTO `education_general` VALUES (9, 'University of Alabama', 'Tuscaloosa', 'AL', '', '');
INSERT INTO `education_general` VALUES (10, 'Stanford University', 'Stanford', 'CA', '', '');
INSERT INTO `education_general` VALUES (11, 'Wake Forest University', 'Winston-Salem', 'NC', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `friends`
-- 

CREATE TABLE `friends` (
  `r_id` int(255) NOT NULL auto_increment,
  `from_id` int(255) NOT NULL,
  `to_id` int(255) NOT NULL,
  `friends_since` date NOT NULL,
  `groups` varchar(255) NOT NULL,
  PRIMARY KEY  (`r_id`),
  UNIQUE KEY `iddifferent` (`from_id`,`to_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `friends`
-- 

INSERT INTO `friends` VALUES (4, 5, 23, '0000-00-00', '');
INSERT INTO `friends` VALUES (2, 5, 20, '0000-00-00', 'Vanderbilt');
INSERT INTO `friends` VALUES (3, 5, 27, '0000-00-00', 'Vanderbilt');
INSERT INTO `friends` VALUES (5, 5, 29, '0000-00-00', '');
INSERT INTO `friends` VALUES (6, 5, 13, '0000-00-00', '');
INSERT INTO `friends` VALUES (7, 5, 9, '0000-00-00', '');
INSERT INTO `friends` VALUES (8, 5, 30, '0000-00-00', '');
INSERT INTO `friends` VALUES (9, 5, 35, '2012-01-22', '');
INSERT INTO `friends` VALUES (10, 70, 7, '2012-01-30', '');
INSERT INTO `friends` VALUES (11, 27, 5, '2012-07-01', '');
INSERT INTO `friends` VALUES (12, 13, 5, '2012-07-02', '');
INSERT INTO `friends` VALUES (13, 192, 5, '2012-09-16', '');
INSERT INTO `friends` VALUES (14, 192, 9, '2012-09-16', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `leadership_data`
-- 

CREATE TABLE `leadership_data` (
  `l_id` int(255) NOT NULL auto_increment,
  `idnum` int(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `present` tinyint(1) NOT NULL,
  `achievement` text NOT NULL,
  PRIMARY KEY  (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

-- 
-- Dumping data for table `leadership_data`
-- 

INSERT INTO `leadership_data` VALUES (1, 5, 'Alpha Phi Omega', 'Sergeant-At-Arms', '2011-11-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (2, 83, 'Alpha Omicron Pi', 'Keeper of the Ritual', '2012-01-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (3, 84, 'Next Step', 'Ambassador', '2010-08-01', '2012-05-01', 1, 'tutor students with mental disabilities that are taking Vanderbilt classes');
INSERT INTO `leadership_data` VALUES (4, 99, 'Alpha Phi Omega; Theta Mu:', '', '2011-01-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (5, 99, 'Pencil Projects Tutoring', '', '2010-08-01', '2011-01-01', 0, '');
INSERT INTO `leadership_data` VALUES (6, 102, 'Alpha Epsilon Pi Fraternity', 'Director of Philanthropy ', '2009-09-01', '2013-05-01', 1, 'Raised over $20,000 last year (2011) for Vanderbilt University Dance Marathon. \r\n\r\nWorked with Healthy Head Start and other local Nashville charitable organizations. \r\n\r\n');
INSERT INTO `leadership_data` VALUES (7, 106, 'Alabama Finance Association', '', '2012-01-01', '2014-05-01', 0, '');
INSERT INTO `leadership_data` VALUES (8, 106, 'Sigma Alpha Epsilon', '', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `leadership_data` VALUES (9, 109, 'Big Brothers Big Sister', 'Mentor', '2011-10-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (10, 109, 'Delta Delta Delta Sorority', 'Member', '1990-01-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (11, 109, 'Big Brothers Big Sister', 'Mentor', '1990-01-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (12, 109, 'Vanderbilt University Dance Marathon', 'Entertainment Committee', '2011-10-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (13, 30, 'Invisible Children Dodgeball Tournament', 'Co-Head', '2010-01-01', '2012-01-01', 0, 'Raised money for Invisible Children benefitting those affected by the war in Northern Uganda');
INSERT INTO `leadership_data` VALUES (14, 30, 'Putney Student Travel', '', '2008-06-01', '2008-08-01', 0, 'Intensive Study Abroad throughout Spain and backpacked Spanish Pyrenese ');
INSERT INTO `leadership_data` VALUES (15, 30, 'National Highschool Institute Theatre Program', '', '2010-06-01', '2010-07-01', 0, '160 candidates chosen from nearly two-thousand who applied');
INSERT INTO `leadership_data` VALUES (16, 122, 'Kappa Alpha Order', '', '2010-12-01', '2011-01-01', 0, 'Primary Risk Manager Officer for active chapter.');
INSERT INTO `leadership_data` VALUES (17, 122, 'American Society of Civil Engineers', '', '2010-08-01', '1990-01-01', 1, 'Member of the local chapter');
INSERT INTO `leadership_data` VALUES (23, 127, 'Lumberjacks', 'Apple Picker', '2002-06-01', '1990-01-01', 1, 'Picks apples.\r\nCuts down trees.');
INSERT INTO `leadership_data` VALUES (22, 5, 'Engineers Without Borders', 'Publicity Chair', '2011-11-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (24, 127, 'US Government', 'Horseback Riding', '1998-01-01', '2002-06-01', 0, 'Rode a lot of horses.');
INSERT INTO `leadership_data` VALUES (25, 63, 'Kappa Kappa Gamma', 'Philanthropy Chair ', '2011-01-01', '2012-12-01', 1, '');
INSERT INTO `leadership_data` VALUES (26, 63, 'Kappa Kappa Gamma', 'Philanthropy Chair', '2011-01-01', '2012-12-01', 0, '');
INSERT INTO `leadership_data` VALUES (27, 139, '', 'Founder and Director', '2008-08-01', '1990-01-01', 0, '');
INSERT INTO `leadership_data` VALUES (28, 141, '', 'Worship Team', '2012-01-01', '2012-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (29, 142, 'Inter-American Health Alliance', 'Research and Technology Co-Chair', '2011-03-01', '2012-03-01', 0, 'Started work with Owen graduate students on TrueWater project.\r\nProvided Primeros Pasos with research and brochures for clinical use.');
INSERT INTO `leadership_data` VALUES (31, 144, 'California Scholarship Foundation', '', '2007-09-01', '2010-05-01', 0, '');
INSERT INTO `leadership_data` VALUES (32, 147, '', 'VP of Chapter Relations and Standards', '2012-01-01', '2012-02-01', 1, '');
INSERT INTO `leadership_data` VALUES (33, 149, 'Phi Kappa Psi', '', '2011-09-01', '2012-05-01', 1, '');
INSERT INTO `leadership_data` VALUES (34, 152, 'Swingin'' Dores (Vanderbilt''s all-female a capella group)', 'Director', '2011-08-01', '2012-02-01', 1, '');
INSERT INTO `leadership_data` VALUES (35, 152, 'Kappa Delta Sorority', '', '2011-01-01', '2014-05-01', 1, '');
INSERT INTO `leadership_data` VALUES (36, 9, 'The Original Cast', 'Business Manager, Webmaster, Former Patrons Director', '2010-08-01', '1990-01-01', 1, 'http://studentorgs.vanderbilt.edu/originalcast');
INSERT INTO `leadership_data` VALUES (37, 178, 'Rosa Parks Elementary School', 'Volunteer/Mentor', '2012-01-01', '2012-05-01', 0, 'Assist teacher in a fourth and fifth grade science class\r\nOrganize experiments');
INSERT INTO `leadership_data` VALUES (38, 178, 'Emerson Elementary School', 'Volunteer', '2010-08-01', '2010-12-01', 0, 'Helped students with reading');
INSERT INTO `leadership_data` VALUES (39, 180, 'Vanderbilt Entrepreneurial Society', 'Business Plan Competition Committee ', '2011-09-01', '2012-05-01', 0, 'Member of leadership team that increased club participation and expanded the scope of events \r\nAttended guest speaker panels featuring successful entrepreneurs in the Southeast \r\nNarrowed down a business plan competition with Vanderbilt faculty and area business leaders judging students for a $3,500 award to start up their entrepreneurial venture  \r\n');
INSERT INTO `leadership_data` VALUES (40, 180, 'Sigma Alpha Epsilon Fraternity', '', '2011-01-01', '2012-05-01', 0, 'Helped organize and run Kickoff Cookout Fundraiser\r\nVolunteered at Beaman Park in Nashville to enhance their nature center ');
INSERT INTO `leadership_data` VALUES (41, 157, 're{cycle}', 'Co-Founder, Co-Owner, President', '2011-10-01', '1990-01-01', 1, 'Winner of Vanderbilt Ventures Competition; Vanderbilt Green Fund Grant Recipient');
INSERT INTO `leadership_data` VALUES (42, 157, 'Honor Council', 'Member', '2012-02-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (43, 157, 'Vanderbilt Entrepreneurial Society', 'Vice President', '2011-09-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (44, 157, 'Kickoff Cookoff', 'Co-Chair Entertainment Committee ', '2011-06-01', '2011-09-01', 0, '');
INSERT INTO `leadership_data` VALUES (45, 182, 'L.I.F.E. Project', 'Mentor', '2012-01-01', '2012-05-01', 0, 'Served as a mentor to help the high school female mentee adjust and have a better idea of the college admission process. Met with high school mentee weekly and participated together in discussions not only about preparing for college, but also relationships, and issues concerning specifically young women (self-defense, safety). ');
INSERT INTO `leadership_data` VALUES (46, 142, 'Inter-American Health Alliance', 'Co-President', '2012-03-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (47, 142, 'Dance Marathon Technology Committee', 'Committee Member', '2010-09-01', '2012-04-01', 0, 'Created videos and slideshows for various events. Recorded video and took pictures during all events.');
INSERT INTO `leadership_data` VALUES (49, 142, 'Vanderbilt Biology Department', 'Undergraduate Researcher', '2012-08-01', '1990-01-01', 1, 'Part of Molecular Biology degree requirements.\r\nWill choose own project, research, and write a paper.');
INSERT INTO `leadership_data` VALUES (48, 142, 'Dance Marathon', 'Technology Chair', '2012-04-01', '1990-01-01', 1, 'Create and coordinate videos, slideshows, and various materials for events and promotional purposes. \r\nKeep website, photo database, and social media sites up to date. \r\nManage all listservs and mass emails.');
INSERT INTO `leadership_data` VALUES (50, 142, 'WRVU Radio', 'Radio DJ', '2012-01-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (51, 142, 'Dance Marathon', 'Technology Chair', '2012-04-01', '1990-01-01', 1, 'Responsible for maintaining website as well as social media sites. \r\nManage listserves.\r\nTake photos and videos at all events.\r\nMake slideshows, videos, and other media for all events.');
INSERT INTO `leadership_data` VALUES (52, 187, 'Business Association of Stanford Entrepreneurial Students', '', '2012-04-01', '1990-06-01', 1, '');
INSERT INTO `leadership_data` VALUES (53, 189, 'WFU Aikido Club', 'President', '2009-08-01', '1990-01-01', 1, '');
INSERT INTO `leadership_data` VALUES (54, 193, 'Vanderbilt Mobile Apps Team', 'Founder', '1990-01-01', '1990-01-01', 0, 'I run this shit');
INSERT INTO `leadership_data` VALUES (55, 193, 'Sigma Beta Rho', 'treasurer', '1990-01-01', '1990-01-01', 1, 'Contributed to many innovations in the field, notably the "brown lizard" ');
INSERT INTO `leadership_data` VALUES (56, 0, 'sNdYAxGv', 'xqcbFAcbDLqo', '0000-00-00', '0000-00-00', 0, 'asuuh yum bainaa.minii fcboaoekd manai ehner baihgvi,ehneriin maani facebookt bi baihgvi bolchloo.ene ymar tohirgoo hiih we.search hiigeed ch yagaad ch oldohgvi baina.garch irehgvi baina yahuu');

-- --------------------------------------------------------

-- 
-- Table structure for table `majors`
-- 

CREATE TABLE `majors` (
  `major` varchar(255) NOT NULL,
  `common` varchar(255) NOT NULL,
  PRIMARY KEY  (`major`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `majors`
-- 

INSERT INTO `majors` VALUES ('Biological Sciences', '');
INSERT INTO `majors` VALUES ('Computer Science', '');
INSERT INTO `majors` VALUES ('Biomedical Engineering', '');
INSERT INTO `majors` VALUES ('Chemical Engineering', '');
INSERT INTO `majors` VALUES ('Civil Engineering', '');
INSERT INTO `majors` VALUES ('Mechanical Engineering', '');
INSERT INTO `majors` VALUES ('Biomolecular Engineering', '');
INSERT INTO `majors` VALUES ('Computer Engineering', '');
INSERT INTO `majors` VALUES ('Human & Organizational Development', 'Business');

-- --------------------------------------------------------

-- 
-- Table structure for table `notifications`
-- 

CREATE TABLE `notifications` (
  `nid` int(255) NOT NULL auto_increment,
  `message` varchar(2048) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `type` varchar(255) NOT NULL,
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `notifications`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `personnel_email`
-- 

CREATE TABLE `personnel_email` (
  `mid` int(20) NOT NULL auto_increment,
  `subject` varchar(1024) character set utf8 NOT NULL,
  `body` varchar(4096) character set utf8 NOT NULL,
  `from_id` int(255) NOT NULL,
  `to_id` int(255) NOT NULL,
  `time_sent` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- 
-- Dumping data for table `personnel_email`
-- 

INSERT INTO `personnel_email` VALUES (5, 'what is up', 'yo what is up sonn', 2, 5, '2012-01-02 00:00:00', 0);
INSERT INTO `personnel_email` VALUES (1, 'who', 'ahgidson isdfa p', 3, 5, '2012-01-03 01:07:29', 0);
INSERT INTO `personnel_email` VALUES (6, 'hey', 'wow', 20, 5, '2012-01-05 16:13:31', 1);
INSERT INTO `personnel_email` VALUES (7, 'fsfa', 'sfs', 20, 5, '0000-00-00 00:00:00', 1);
INSERT INTO `personnel_email` VALUES (8, 'fsfa', 'sfs', 20, 5, '2012-01-06 17:21:52', 1);
INSERT INTO `personnel_email` VALUES (9, 'sub', 'mes', 5, 20, '2012-01-06 17:28:14', 1);
INSERT INTO `personnel_email` VALUES (10, 'hey mama', 'hey mama you so sexy ', 20, 5, '2012-01-06 17:28:51', 1);
INSERT INTO `personnel_email` VALUES (11, 'hey baby', ' ', 20, 5, '2012-01-11 01:22:53', 1);
INSERT INTO `personnel_email` VALUES (13, 'yo', 'yo whats up my homie how you been?', 5, 5, '2012-01-20 17:44:17', 1);
INSERT INTO `personnel_email` VALUES (14, 'Hey', 'Hey mama what up', 23, 5, '2012-01-21 15:40:49', 1);
INSERT INTO `personnel_email` VALUES (15, 'hi', '', 5, 158, '2012-04-10 00:04:57', 0);
INSERT INTO `personnel_email` VALUES (16, 'r', '', 5, 158, '2012-04-10 00:09:27', 0);
INSERT INTO `personnel_email` VALUES (17, '5', '', 5, 158, '2012-04-10 00:13:00', 0);
INSERT INTO `personnel_email` VALUES (18, '5', '', 5, 5, '2012-04-10 00:20:43', 1);
INSERT INTO `personnel_email` VALUES (19, 'Phone Interview: Professional Archives', '', 27, 158, '2012-04-18 14:46:03', 0);
INSERT INTO `personnel_email` VALUES (20, 'Phone Interview: Professional Archives', '', 27, 158, '2012-05-18 21:49:03', 0);
INSERT INTO `personnel_email` VALUES (21, 'punk', '', 27, 5, '2012-05-18 21:49:37', 1);
INSERT INTO `personnel_email` VALUES (22, 'Phone Interview: Professional Archives', '', 27, 158, '2012-05-18 21:51:27', 0);
INSERT INTO `personnel_email` VALUES (23, 'Howdy', '', 27, 26, '2012-05-18 23:07:42', 0);
INSERT INTO `personnel_email` VALUES (24, 'hey rui', '', 27, 158, '2012-05-19 00:33:06', 0);
INSERT INTO `personnel_email` VALUES (25, 'Hey', 'Hey whats up grub?', 27, 27, '2012-05-19 23:39:19', 1);
INSERT INTO `personnel_email` VALUES (26, 'fdk;a', 'hello friend', 30, 27, '2012-05-21 22:48:30', 1);
INSERT INTO `personnel_email` VALUES (27, 'testing', 'testing', 27, 27, '2012-05-29 20:06:30', 1);
INSERT INTO `personnel_email` VALUES (28, 'testing', 'testing', 27, 5, '2012-05-29 20:06:30', 1);
INSERT INTO `personnel_email` VALUES (29, 'Phone Interview: Professional Archives', 'Thank you for sending in your application to Professional Archives. We are pleased with what we see on your resume and would like to schedule a phone interview with you. The following times are available, please let us know what works best for you.', 5, 5, '2012-06-27 00:28:55', 1);
INSERT INTO `personnel_email` VALUES (30, 'Professional Archives ', 'I just added you as my friend, but I think we should talk a little more before we actually become friends. ', 27, 5, '2012-07-01 22:28:12', 1);
INSERT INTO `personnel_email` VALUES (31, 'Phone Interview: Epic', 'Thank you for sending in your application to Epic. We are pleased with what we see on your resume and would like to schedule a phone interview with you. The following times are available, please let us know what works best for you.', 27, 5, '2012-08-19 21:57:30', 1);
INSERT INTO `personnel_email` VALUES (32, 'Phone Interview: Epic', 'Thank you for sending in your application to Epic. We are pleased with what we see on your resume and would like to schedule a phone interview with you. The following times are available, please let us know what works best for you.', 27, 20, '2012-08-19 21:57:30', 0);
INSERT INTO `personnel_email` VALUES (34, '', '', 5, 0, '2012-10-01 02:13:05', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `privacy`
-- 

CREATE TABLE `privacy` (
  `idnum` int(255) NOT NULL,
  `notification` char(2) NOT NULL default 'ET',
  `basic_information` int(4) NOT NULL default '15',
  `graduation` int(4) NOT NULL default '15',
  `status` int(4) NOT NULL default '15',
  `picture` int(4) NOT NULL default '15',
  `education` int(4) NOT NULL default '15',
  `gpa` int(4) NOT NULL,
  `work_experience` int(4) NOT NULL,
  `extracurricular` int(4) NOT NULL,
  `skills` int(4) NOT NULL,
  `message` int(4) NOT NULL,
  PRIMARY KEY  (`idnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `privacy`
-- 

INSERT INTO `privacy` VALUES (27, 'DE', 15, 15, 15, 15, 15, 0, 0, 0, 0, 0);
INSERT INTO `privacy` VALUES (5, 'DE', 0, 0, 0, 0, 0, 4, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `requests`
-- 

CREATE TABLE `requests` (
  `rid` int(255) NOT NULL auto_increment,
  `subject` varchar(1024) NOT NULL,
  `body` varchar(4096) NOT NULL,
  `time` datetime default NULL,
  `from_bid` int(255) NOT NULL,
  `to_id` int(255) NOT NULL,
  `time_sent` datetime NOT NULL,
  `priority` int(3) NOT NULL default '1',
  `is_read` int(1) NOT NULL default '0',
  PRIMARY KEY  (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `requests`
-- 

INSERT INTO `requests` VALUES (1, 'Phone Interview: Professional Archives', '<p>	Thank you for sending in your application to Professional Archives. We are pleased with what we see on your resume and would like to schedule a phone interview with you. The following times are available, please let us know what works best for you.</p>', NULL, 2, 5, '2012-11-19 17:49:08', 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `sid_to_bid`
-- 

CREATE TABLE `sid_to_bid` (
  `b_id` int(255) NOT NULL,
  `s_id` int(255) NOT NULL auto_increment,
  `form_name` varchar(255) NOT NULL,
  `form_description` text NOT NULL,
  PRIMARY KEY  (`b_id`,`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `sid_to_bid`
-- 

INSERT INTO `sid_to_bid` VALUES (2, 18, 'hiofhae', 'hiaohfhdif');
INSERT INTO `sid_to_bid` VALUES (0, 2, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 3, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 4, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 5, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 6, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 7, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 8, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 9, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (0, 10, 'aifjsif', 'adfiopasif');
INSERT INTO `sid_to_bid` VALUES (2, 19, 'wfhio', 'hiaosfhad');

-- --------------------------------------------------------

-- 
-- Table structure for table `supplemental`
-- 

CREATE TABLE `supplemental` (
  `sid` int(255) NOT NULL auto_increment,
  `q_number` int(255) NOT NULL,
  `question` varchar(4096) NOT NULL,
  `type` int(3) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `supplemental`
-- 

INSERT INTO `supplemental` VALUES (10, 4, 'wow', 3, 'a|b|c|');
INSERT INTO `supplemental` VALUES (9, 1, 'ho', 3, '');
INSERT INTO `supplemental` VALUES (11, 1, '', 1, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `idnum` int(255) unsigned NOT NULL auto_increment,
  `email` varchar(255) character set utf8 NOT NULL,
  `password` varchar(255) character set utf8 NOT NULL,
  `first_name` varchar(15) character set utf8 NOT NULL,
  `last_name` varchar(15) character set utf8 NOT NULL,
  `picture` varchar(255) character set utf8 default NULL,
  `resume` varchar(512) default NULL,
  `field` varchar(255) character set utf8 NOT NULL,
  `city` varchar(255) character set utf8 NOT NULL,
  `state` varchar(255) character set utf8 NOT NULL,
  `country` varchar(255) character set utf8 NOT NULL,
  `pay` int(255) NOT NULL,
  `hourly` tinyint(1) NOT NULL default '0',
  `status` varchar(255) NOT NULL default 'Searching for Internship',
  `skills` text NOT NULL,
  `last_logged_in` datetime NOT NULL default '2012-06-28 10:38:00',
  `disabled` tinyint(1) NOT NULL default '0',
  `summer` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`idnum`)
) ENGINE=MyISAM AUTO_INCREMENT=198 DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (5, 'jjin3298@yahoo.com', 'cce81b5cf49a9f7864186dc616093abc9e552cc5', 'Nanhua', 'Jin', '/images/5.jpg', '', 'Computer Science', 'Nashotah', 'WI', 'United States', 70000, 0, 'Employed', 'PHP, mySQL, Javascript', '2012-11-21 11:07:08', 0, 1);
INSERT INTO `users` VALUES (13, 'lmathson@sbcglobal.net', 'ac29eac4d2463413227f8b0a0a9f24bfa79cb3a6', 'Leslie', 'Mathson', NULL, '', 'Electrical Engineer', 'Brookfield', 'WI', 'United States', 50000, 0, 'Searching for Internship', 'Audio-video systems, telecom and fiber networks, RF and 2-way radio applications and practices.', '2012-09-04 15:31:07', 0, 0);
INSERT INTO `users` VALUES (23, 'vankegel@yahoo.com', 'c8fd40db3226a3ddab62fc32c505feab426870ed', 'Van', 'Kegel', NULL, '', '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (20, 'collin.h.grimes@vanderbilt.edu', 'c5c524e87447bc3df969662f65d4b8c56f11623c', 'Collin', 'Grimes', '/images/20.jpg', '', 'Mechanical Engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (27, 'alex_smith_2010@hotmail.com', '5c4962622ecb7d0f392719bfd89040e2b64732f5', 'Alex', 'Smith', '/images/27.jpg', '', '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-10-27 23:09:14', 0, 1);
INSERT INTO `users` VALUES (9, 'seth.n.friedma@vanderbilt.edu', '5b2ff4c2d9b8f4982de0336ec842dd9f6b5e8521', 'Seth', 'Friedman', '/images/9.jpeg', '', 'Computer Science', 'Pensacola', 'FL', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 1, 0);
INSERT INTO `users` VALUES (29, 'tszurcher@gmail.com', '76ab4f3ccab0b37a78ea395523f3206d3c41f22b', 'Taylor', 'Zurcher', NULL, '', 'Civil Engineering ', 'Nashville', 'SC', 'United States', 0, 0, 'Searching for Internship', '', '2012-10-03 12:20:48', 0, 0);
INSERT INTO `users` VALUES (30, 'christina.c.chapman@vanderbilt.edu', '42dc244f40234f944013d72260908f4b30752ac3', 'Christina', 'Chapman', '/images/30.jpeg', '', 'Human Organizational Development and Corporate Strategy', 'Nashville', 'Tn', 'United States', 0, 0, 'Employed', 'Microsoft Excel, FishBowl Inventory', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (167, 'david.m.dipanfilo@vanderbilt.edu', 'fad8273d503eca0197bb884e566725c18e3c08c2', 'David', 'DiPanfilo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (31, 'van.p.kegel@vanderbilt.edu', 'c8fd40db3226a3ddab62fc32c505feab426870ed', 'Van', 'Kegel', '/images/31.jpg', NULL, 'Mechanical Engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (32, 'robert.a.cannell@vanderbilt.edu', 'cb95a7ce65b212bd6767c6856ceccdb8e93c9fcd', 'Robert', 'Cannell', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (33, 'jessie.lambing@vanderbilt.edu', '69933dd6543a340562e1ef2a29282c2818c22104', 'Jessie', 'Lambing', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (34, 'Blake.a.thompson@vanderbilt.edu', 'aebe46f865c6b569179ac9595b14d3bafa22e47e', 'Blake', 'Thompson', NULL, NULL, '', '', '', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (35, 'andrew.g.hamilton@vanderbilt.edu', 'c90483e55a79f88cabab574facb599c57e84640c', 'Drew', 'Hamilton', '/images/35.jpg', NULL, 'Computer engineering', 'Chicago', 'Illinois', 'United States', 0, 0, 'Searching for Internship', '', '2012-09-13 00:34:10', 0, 0);
INSERT INTO `users` VALUES (36, 'abigail.b.shuster@Vanderbilt.edu', 'a6e5b9b0b5c1764131eeaf674db72b75dc54d68e', 'Abby', 'Shuster', '/images/36.JPG', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (37, 'stuart.m.dickerson@gmail.com', 'bffee836e3c8a1d4d039fbbad6b30c6d594cee67', 'Stuart', 'Dickerson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (38, 'trevor.k.tait@vanderbilt.edu', 'b831a637f8ce938ea526529f72fc3f665d25d972', 'Trevor', 'Tait', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (39, 'sean.k.murphy@vanderbilt.edu', '301995764d36e7325ec96410d7754d1a01f8a96f', 'sean', 'murphy', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (40, 'kileigh.a.barringer@vanderbilt.edu', '2a6e52f6029f212debdec9ec0bfbef7f6452ed18', 'Kileigh', 'Barringer', '/images/40.jpg', NULL, 'Communications/Public Relations', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (41, 'tyler.brock@gmail.com', '90b629570ec1081a31962fec2eabe7552589d117', 'Tyler', 'Brock', '/images/41.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (42, 'Kornsuwann@hotmail.com', '8abac22556aa55886a99bb8d5684e1a727580ce8', 'Nutcha', 'Kornsuwan', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (43, 'john.l.ormerod@vanderbilt.edu', '245bdfa2a012905f745014c62d21ecd80f228416', 'Logan', 'Ormerod', '/images/43.jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (44, 'zach.blume@vanderbilt.edu', '82114d5b6448f5e5ff95d152eac84e2f5ec79463', 'Zach', 'Blume', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-08-20 22:05:46', 0, 0);
INSERT INTO `users` VALUES (45, 'graham.b.gaylor@vanderbilt.edu', '5c0ef4deb84a823e1ca318b77bdd7a0a3ee206e0', 'Graham', 'Gaylor', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (46, 'margaret.m.mccain@vanderbilt.edu', '8b77bc2940d0dded91e3c899f18faf8b776a7480', 'Margaret', 'McCain', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (47, 'arjun.pillai10@gmail.com', '1c529785882ca369537fba5c0665a71559f87b41', 'Arjun', 'Pillai', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (48, 'np3543@lyon.edu', '2a99f1de29f20045de2b069a0b23d219b47ccfe5', 'Nathaniel', 'Pyle', '/images/48.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (49, 'kleinbd20@uww.edu', '489d2ac1c18495eb2d15c58f1e080a86d3d57378', 'Brian', 'Klein', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (50, 'zhening.luo@vanderbilt.edu', '7e5ec6ab395a1e732ceabadd01cbb2ea451a47c7', 'Zhening', 'Luo', '/images/50.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (51, 'jdelehey@gmail.com', 'b6f4efd84f28a41a0d0d394d5e0f35e9bbeb5511', 'Jack', 'Delehey', '/images/51.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (52, 'copelandra@gmail.com', 'bab21cf303cce49f59792fe6a085f7771f99c91c', 'Rebecca', 'Copeland', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (53, 'garrett.k.nondorf@vanderbilt.edu', '386812c15fae632307f1371beef3eeb75eccdc59', 'Garrett', 'Nondorf', '/images/53.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (54, 'mia.m.cleary@vanderbilt.edu', '30d5c3c03bcde57800f7498ae91410c0b0018583', 'Mia', 'Cleary', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (55, 'isabel.t.ross@vanderbilt.edu', 'f2e2377286af96829a9e134149fe6331b3894188', 'Isabel', 'Ross', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (56, 'alxdavol@gmail.com', 'dd6559f96a803c18d5f2d08664b9bc3330aaa9cb', 'alexa', 'chapman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (57, '', '', 'Kate', 'Trotter', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (58, 'matthew.r.damstrom@vanderbilt.edu', 'ba4cc8ff4320d7f98a652c1cc91b384853d1c187', 'Matt', 'Damstrom', '/images/58.jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (59, 'johndjgregg@gmail.com', 'b2d164470cba35b4f05fb847966775bd1be5552e', 'John David', 'Gregg', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (60, 'mary.m.scott@vanderbilt.edu', 'f82c5bde36dbad207755c592375567153e3e41f8', 'Mary Morgan', 'Scott', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (62, 'gabriella.e.dicarlo@vanderbilt.edu', 'b98caf314eacd2c45331f14980c64bf32fd0a755', 'Gabriella', 'DiCarlo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (63, 'ckay8971@gmail.com', 'cf0a86f5c7bc1d3f86a1567ea1c03dcf9438e994', 'Caroline', 'Kay', '/images/63.Jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (64, 'henry.t.roberts@vanderbilt.edu', '4d66afe0e354e0a54ac41f69f4cf9ecd0487ab23', 'Henry', 'Roberts', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (65, 'daniel.e.pereira@vanderbilt.edu', 'ded308e6ea0175f9b1ac0e34fa132e85e8924313', 'Daniel', 'Pereira', '/images/65.', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (66, 'savannah.l.pidcock@vanderbilt.edu', 'c161f6da59bbd3cbf7c65501f2ad6079a417324e', 'Savannah', 'Pidcock', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (7, 'jinw91@sbcglobal.net', 'cce81b5cf49a9f7864186dc616093abc9e552cc5', 'Nanhua', 'Jin', '/images/7.jpg', NULL, 'Computer Science', 'Brookfield', 'Wisconsin', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (67, 'tony.h.an@vanderbilt.edu', 'aa9d81130517d16eab9744fdcd9c92044d5247c6', 'Tony', 'An', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (68, 'tmerr3@aol.com', '72bf135684e9d5510556668e41d796065b79ef1e', 'Tom ', 'Belikove', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (122, 'taylor.sean.zurcher@vanderbilt.edu', 'cce81b5cf49a9f7864186dc616093abc9e552cc5', 'Taylor', 'Zurcher', '/images/122.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (70, 'hirak.pati@vanderbilt.edu', '2ea5d9c1058dc6abb98f4851a3fca09854a9ffcb', 'Hirak', 'Pati', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (71, 'Theodore.p.swift@vanderbilt.edu', 'fc408e16857087cd0907337d55bc0a65f8e2b596', 'Teddy', 'Swift', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (72, 'jacobbumpus@gmail.com', '34ad4220573f2dcff66560c77346f4526d2f1eda', 'Jake', 'B', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (73, 'abbaggott@gmail.com', 'a5770e40c640367e8781234dfd040b87e6d052e9', 'Allyson', 'Baggott', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (74, 'anurag.bose@vanderbilt.edu', '291be11223821cbba42acc5182ad7c7d88eb8f69', 'Anurag', 'Bose', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (75, 'kristen.l.sheft@vanderbilt.edu', '86b75c7f48c3e66750b598661ed91f5f4a4203ad', 'Kristen', 'Sheft', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (123, 'jlow@gmail.com', 'cce81b5cf49a9f7864186dc616093abc9e552cc5', 'John', 'Lowe', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (78, 'octavio.d.roscioli@vanderbilt.edu', '6a9eb496cb02b19fad1fc0be0804f4beccbfdecc', 'Octavio', 'Roscioli', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (79, 'brian.s.walsh@vanderbilt.edu', '672bb90fc81dbc13a512bb62fd12a8a410a83f80', 'Brian', 'Walsh', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (80, 'Scott.j.kudialis@vanderbilt.edu', 'ff023f249dea86925f094bd665ecdd86e47dc3a0', 'Scott', 'Kudialis', '/images/80.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (81, 'Temitope.o.obanla@vanderbilt.edu', '5c46a5fb50f964b49248463edf7d64e9d1d4ffb5', 'Temitope ', 'Obanla', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (82, 'david.r.mendel@vanderbilt.edu', '7e5d54c5e03e984e3257c919aa0c730e19f50588', 'David', 'Mendel', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (83, 'elizabeth.c.hill@vanderbilt.edu', '94dc9eb586c395511338fdcf5019afc97c4d5a0f', 'Elizabeth', 'Hill', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (84, 'samantha.a.munoz@vanderbilt.edu', 'dd21284a53d5d6823ff84adbfbb7003672f2e303', 'Samantha', 'Munoz', '', NULL, 'biomedical engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', 'basic laboratory skills, some Matlab and mathematica programming skills, ', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (85, 'parker.h.bossier@vanderbilt.edu', '0b4f0325feded4d9cb9ef9d56681104bec191502', 'Parker', 'Bossier', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (86, 'Jessica.e.pawlarczyk@vanderbilt.edu', '0376f782037fc738e356e67e78b91bb57ab92886', 'Jessica', 'Pawlarczyk', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (87, 'Katherine.d.booker@vanderbilt.edu', 'f5f2424e3559df87a5b2b2e0eb2cec29a6a2a6f1', 'Katherine', 'Booker', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (88, 'gabrielle.m.brown@vanderbilt.edu', '37bdee561d283754bc78d62cd85e02fd0f486daa', 'Gabrielle', 'Brown', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (89, 'g.wakefield@vanderbilt.edu', 'c1b4d9350df61eae789588a40b73422caef4ffdf', 'Gerald', 'Wakefield', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (90, 'courtney.j.marshall@gmail.com', 'f97f138d49b717a0f13aa40ba7f9878c81e6b66d', 'Courtney', 'Marshall', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (91, 'sivagami.suppiah@vanderbilt.edu', '1f9ed2c788aa92b7f82eeb3b864712b926ac62b7', 'Sivu', 'Suppiah', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (92, 'madhu.govind@vanderbilt.edu', '0b12303402e0747aabc50a60a90fc2f19cd421a7', 'Madhu', 'Govind', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (93, 'lusi.zheng@vanderbilt.edu', 'c48cec4db6b366c36a78e3f4cd7c0a7b4d5ae6a5', 'Lusi', 'Zheng', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (94, 'tessa.c.chillemi@vanderbilt.edu', '9c0a9ea69f5d8dc9178117d4e2400e9831d346ee', 'Tessa', 'Chillemi', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (95, 'katherine.s.lopez@vanderbilt.edu', 'f4c43937000c8b8a4dcda166bd08d27855f59288', 'Katie', 'Lopez', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (96, 'julia.q.zhu93@gmail.com', 'da98407e3c3ba781af6b13115291169b263d2345', 'Julia', 'Zhu', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (97, 'kelsey.d.dreier@vanderbilt.edu', 'e8414f8ac1422ea3a3a89d26bf6ae5ddc6b6ada4', 'Kelsey', 'Dreier', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (98, 'megan.a.humburg@vanderbilt.edu', '4e2f2a2376a0c8fb216d8503bdedb00c0df275d6', 'Megan', 'Humburg', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (99, 'ariela.m.atwell@vanderbilt.edu', '015a56a84f48861eb321e00e60ff4bea454b70a4', 'Ariela', 'Atwell', '/images/99.jpg', NULL, 'Political Science, Fine Arts, Studio Arts', '', '', 'United States', 0, 0, 'Searching for Internship', '\r\nI am currently enrolled as an active student at Vanderbilt University, but I transferred to Vanderbilt my Sophomore year after having attended Richmond the American International University in London. I am well versed in English, Spanish, and a small bit of French. Both my Job experience and international background make me a top candidate for positions that involve good communication skills, interactions with strangers, and maintaining composure in high pressure situations. My past job experience has also equip me with skills in \r\nthe understanding of both MAC and Windows. I have become very skilled in the areas of Apple Final Cut Pro, Color, MS Word, Access, Excel, PowerPoint and the Adobe Creative Suite. As the current Curator of the Vanderbilt Fine Arts Student Gallery, I have been given the opportunity to retain such a huge responsibility, which has undoubtedly given me the and experience and ability to know how to utilize and optimize my organizational and time management skills. I am highly determined and very driven, especially when I see my hard work as a major opportunity in mapping out my future. ', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (100, 'emaurice1@gmail.com', '72780f9e9725ee00c32d8e8dc6512042a873cb56', 'Etienne', 'Maurice', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (101, 'tariq.k.simpkins@vanderbilt.edu', '043c5821378f0043e2d5b2b28ff7b379e0d0e3c5', 'Tariq', 'Simpkins', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (102, 'Andrew.p.samuels@vanderbilt.edu', 'ddda1786447c30002d427c4c7118bfaa1298be9e', 'Andrew', 'Samuels', NULL, NULL, 'English; Financial Economics; Corporate Strategy', 'Oak Park', 'Il', 'United States', 0, 0, 'Searching for Internship', 'Microsoft Excel\r\nPowerPoint', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (103, 'ian.bellah@vanderbilt.edu', '1e904fcdd98fc1e75e52442f3e079bfbf24bd2d4', 'Ian', 'Bellah', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (104, 'Vincent.casha@gmail.com', '3ca31c69f1c0c088cb45a08c315dc52f78d70cbe', 'Vincent', 'Casha', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (105, 'nathaniel.r.cameron@vanderbilt.edu', 'd0cdfe6296bb87fd9791ee3e375e3be1921557f8', 'Nathaniel', 'Cameron', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (106, 'michaelgis@comcast.net', '636e65d5e05a298c9f2b7f583ce8d64ec2447919', 'Michael', 'Gibson', NULL, NULL, '', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '', '2012-10-29 03:21:18', 0, 0);
INSERT INTO `users` VALUES (107, 'ojharris@crimson.ua.edu', '5c8db2d49849ea8e80260435006b7d692640029e', 'Jordan', 'Harris', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (108, 'b7755599@nwldx.com', '601429f36a4beb7c663c299e24a6a1a5b0db9ff6', 'Jimmy', 'Luo', '/images/108.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (109, 'hannah.j.kim@vanderbilt.edu', '2a999b6c12067e41cdb90787dc8a474c89fbab33', 'Hannah', 'Kim', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (110, 'lucy.meadors@uky.edu', '3896169cda0efb917ec816098dd6ce3e751ab189', 'lucy', 'meadors', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (111, 'kevin.p.jaeger@vanderbilt.edu', '21fb4c2c42347940864847cfa5646fecd732dfa7', 'Kevin', 'Jaeger', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (112, 'amber.n.strohauer@vanderbilt.edu', 'bfbd1f97231dc571351e66cc16ddf7e1ee573ce1', 'Amber', 'Strohauer', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (113, 'gregory.m.resnick@vanderbilt.edu', '8ab0bd0063532180809a59ca06cf641e0e7b2f77', 'Gregory', 'Resnick', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (114, 'Laureneperlman@gmail.com', 'ba77becb9db22e9382f09b5d60eccf67e6632083', 'Lauren', 'Perlman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (115, 'jbell@gmail.com', '589eeb2262f8986f07a15d0eede5e1b441abc7e2', 'John', 'Bell', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (116, 'tkimbrell@smu.edu', '10696b89713b9b9c292ef5f2e1b6b84c11d2496d', 'Terah', 'Kimbrell', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (117, 'wellsjohnston@gmail.com', 'bdef4d668907746041466a649d4b8d6ae794201d', 'wells', 'johnston', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (118, 'michael.a.gangemi@vanderbilt.edu', '0e88553eb3a90bd75c0cb40459403671ae7469a0', 'Michael', 'Gangemi', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (119, 'sean.c.bartlett@vanderbilt.edu', 'a1fa08209aaacb40ada7b36f578a2d761f8c4f16', 'Sean', 'Bartlett', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (120, 'clare.c.healy@vanderbilt.edu', 'd4bd6fe6d0559fba429cd46f3f236c7e0fa8c15b', 'Clare', 'Healy', '/images/120.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (121, 'matthew.m.eller@vanderbilt.edu', '3cbcbb4d33324b42cb3b970ab52d532c0d8d0d1f', 'Matthew', 'Eller', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (124, 'aifn', '1b0ef815b8a3371a185cd8c9d2e81e479197534d', 'hfai', 'ainfo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (125, 'nutbuster@gmail.com', '8e166526b4848e210100a8872c1fc8b0664d5a44', 'bigmama', 'fatsack', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (126, 'julia.m.peredo@vanderbilt.edu', 'c51d430a95691338da6a2455353eb0ab5fe08ef6', 'Julia', 'Peredo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (127, 'george.washington@vanderbilt.edu', 'cce81b5cf49a9f7864186dc616093abc9e552cc5', 'George', 'Washington', '/images/127.jpg', NULL, '', '', '', 'United States', 0, 0, 'Searching for Internship', 'Microsoft Excel, Farming, C++, Public Speaking', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (128, 'skylordsbh@aol.com', '7be98e0a8261e1afe84dcce9067129c609100572', 'Skyler', 'Hutto', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (129, 'isak.kurbasic@trincoll.edu', '73a632de0c2f328c921655bd41cbab8dc9f0488c', 'Isak', 'Kurbasic', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (130, 'kenneth.a.mahung@vanderbilt.edu', 'c8b11d9130827a491d1e8072de73615941ef1b54', 'JR', 'Mahung', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (131, 'dylan.s.tracy@vanderbilt.edu', '495ecc73d7b1f47cb7c69cbac3d84da8cb2f0dd0', 'Dylan', 'Tracy', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (132, 'a.rog33@gmail.com', '3d4f63fec5f743d5bd7d39141d8276bd0a5a9b26', 'Alexandra', 'Rogers', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (133, 'cam@camelbackmusic.com', '8afa19fb59a130f9bed1bba01c9e2eab880ba818', 'Cameron', 'Mullen', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (134, 'zksherm@gmail.com', '90b629570ec1081a31962fec2eabe7552589d117', 'Zach', 'Sherman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (135, 'kevinryan389@yahoo.com', '4741d987da43b6e2df29efc07bd39ca84e441d3d', 'Kevin', 'Ryan', '/images/135.jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (136, 'candace.l.barbour@vanderbilt.edu', 'da786471b44781e4ca1a3792c704697c07887d1a', 'Candace', 'Barbour', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (137, 'SLS0029@auburn.edu', 'ad11d286adcfa658cdc02f59cbed308d8528b80f', 'Shelby', 'Smith', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (138, 'Catherine.l.frediani@vanderbilt.edu', 'b97af0d47909181cb62cdd7c181a955ce2e1c36d', 'Catherine', 'Frediani', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (139, 'salem.a.vanderstel@vanderbilt.edu', 'c30e8cdf2b63bf32acbf05e0d9c52251f7a059b4', 'Salem', 'VanderStel', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (140, 'James.a.varlan@vanderbilt.edu', '0eb635c3284e90f67d0071402289a791d19bdc02', 'James', 'Varlan', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (141, 'elliot.w.huck@vanderbilt.edu', '44c88217e6138056e8acbe9d38350792fd278294', 'Elliot', 'Huck', '/images/141.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (142, 'grace.c.randazzo@vanderbilt.edu', 'a17b5e731fd52265e7a814d2182f7af00337b49a', 'Grace', 'Randazzo', NULL, NULL, 'Biology, Business', 'Franktown', 'CO', 'United States', 0, 0, 'Searching for Internship', 'Photoshop,\r\nMicrosoft Excel and Word,\r\niWork (Pages, Keynote, Numbers)\r\n', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (143, 'nicolette.v.siringo@vanderbilt.edu', 'bb70149ff88df3dedfd5dd482fc8401fddee312e', 'Nicolette', 'Siringo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (144, 'mrowe.ar@gmail.com', '42fb1abd3b87d3668135dd5d48bf4c8778423406', 'Amanda', 'Rowe', '/images/144.jpg', NULL, '', 'Coronado', 'CA', 'United States', 0, 0, 'Searching for Internship', 'â€¢	Licensed to work all Microsoft Programs\r\nâ€¢	Taken Principles of Real Estate and Property Management classes\r\nâ€¢	Experienced with QuickBooks Accounting Program\r\nâ€¢	Always well organized and good customer service skills\r\n', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (145, 'graham.gaylor@gmail.com', 'ed11e58a6c8712b837bd5070c7b20bd5aa6a4dea', 'Graham', 'Gaylor', '', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (146, 'alexander.g.yurevitch@vanderbilt.edu', '67d56dc789ca761f2818eb7ea5202c9355598034', 'Alexander', 'Yurevitch', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (147, 'kristina.j.murray@vanderbilt.edu', 'b0daaf6225714b82f37a4616de9658c42c9e83ec', 'Kristina', 'Murray', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (148, 'ecs4pv@virginia.edu', '6a69460a56ee176559cc9af12038eacfdacae3b9', 'Carson', 'Stettinius', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (149, 'farmerlax@gmail.com', 'bd5a15ad941299dfca76a4a9cd301473bca95b7f', 'Arthur', 'Farmer', NULL, NULL, '', 'Springfield', 'VA', 'United States', 0, 1, 'Searching for Internship', 'Microsoft Office', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (150, 'courtney.s.hulse@vanderbilt.edu', '8899b99e5174c764127e9ce168c11185f76163c5', 'Courtney', 'Hulse', '/images/150.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (151, 'john.m.boyd@vanderbilt.edu', 'e038a883ddc30c95f38a04a7ccb87c098f4fd80e', 'John', 'Boyd', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (152, 'alexandra.b.burke@vanderbilt.edu', 'd6cfba07c2861b4c9d5280de22c7583a3a7b6a5f', 'Alexandra', 'Burke', NULL, NULL, 'Marketing, Advertising, Public Relations', '', '', 'United States', 0, 0, 'Searching for Internship', 'Proficient in Mandarin Chinese, speaking, reading, writing. \r\nProficient with MS Word, Excel, Powerpoint, and online survey tools. \r\nBasic Programming capabilities with Matlab, Lisp, Easy-C\r\n', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (153, 'emmacarpenter884@yahoo.com', 'f88088a1b0aa4e4417351cff30c6f75a11ad15e0', 'Emma', 'Carpenter', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (154, 'csandfly@hotmail.com', '4de566528596f8e8409f19a045846eab97347066', 'Carrie', 'Sanders', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (155, 'buckniggz@fuckyou.xxx', '31bd0ba347ed4100d556d1a2578327c7f3a16928', 'NiggaMama', 'GrapeDrink', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (156, 'samantha.p.orland@vanderbilt.edu', '6ec1aba8a911bd6f8aa45b77618bbc338b99d4d0', 'Samantha', 'Orland', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (157, 'john.b.ratliff@vanderbilt.edu', 'b55c44b8a2d9a2991166118a8afb924bfb94becb', 'John', 'Ratliff', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (159, 'andrew.r.bridges@vanderbilt.edu', '055e792db7a86b7a211fa2406919946e73132df9', 'Andrew', 'Bridges', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (160, 'Wisconsin@wisconsin.com', '13bdfb63cc0d1b8b90412d0bc0349bf2f4fcc180', 'Nanhua', 'Jin', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (172, 'cynthia.b.paschal@vanderbilt.edu', 'ef79e8b516eae65a4e4293adb41d1be4d6673546', 'Cynthia', 'Paschal', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (162, 'andrew.lum@Vanderbilt.Edu', 'abfb583db44d55da3fa694efe1ba4f2d278cd1e0', 'Andrew', 'Lum', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (164, 'jinyaohua@sbcglobal.net', '4fa218051248d34ae9420630ab4a961190624af0', 'Yaohua', 'Jin', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (165, 'jdoe2@hotmail.com', '912eb78413fa264d3b9130233c5a1f5f3d51f17b', 'John', 'Doe', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (166, 'Csande29@utk.edu', '1f287b374940c592cf02ec6de9f0c583a051951b', 'Cara', 'Sanders', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (168, 'joe@pinpointprofiles.net', '3b70051a196ef7407f90cde623833ff167c4bf54', 'Joe', 'Thompson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (169, 'alex.b.meadow@vanderbilt.edu', '210a7d05f7225623f41cd3180c6bb2ce28f23c7f', 'Alex', 'Meadow', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (170, 'jjfurson@yahoo.com', 'bc569075137a9e80783a8e6e13d417b914e4402e', 'Tanika', 'Jefferson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (171, 'kevin.j.jaburek@vanderbilt.edu', '63a3035ebeaeaf0c572d1bc13d1eb8a891aff2e8', 'Kevin', 'Jaburek', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (183, 'mikulskib@msoe.edu', '2183feb5097635c1cfd669a63e8c232b33b475fa', 'Brandon', 'Mikulski', NULL, NULL, '', 'Greenfield ', 'WI', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (174, '595676587@qq.com', '595809f7d0d537752b8aa9f0db99b05d639ec1a1', 'qunxian', 'li', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (175, 'Ktolman@fau.edu', '1a3d892ed79ff98404da53e9944c9410730092eb', 'Katie', 'Tolman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (176, 'faithlobelson@yahoo.com', 'b5f331f90d924f67448aaf18d5e23ae418b8784e', 'Faith', 'Lobelson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (177, 'rui.jiang@vanderbilt.edu', '1bbf911afe731cf153a59be5206c446060d47847', 'Rui', 'Jiang', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (178, 'aeggillespie@gmail.com', 'd4feb420f08004b444602b6580a3bb9a11185f48', 'Abigail', 'Gillespie', NULL, NULL, 'Biology', 'Berkeley', 'CA', 'United States', 0, 0, 'Searching for Internship', 'Possess basic laboratory techniques after four semesters of lab experience in general chemistry, organic chemistry, and general biology; experienced with Photoshop and Microsoft Excel', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (179, 'cck3af@virginia.edu', 'cf0a86f5c7bc1d3f86a1567ea1c03dcf9438e994', '', '', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (180, 'patrick.m.healy@vanderbilt.edu', 'a11871a43fb627ff3abfe26362ebf5434f5fb84b', 'Patrick ', 'Healy', NULL, NULL, 'Finance ', 'Nashville ', 'TN', 'United States', 0, 0, 'Searching for Internship', 'Some experience with Microsoft Excel and Bloomberg Terminal', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (186, 'devin@epic.com', '56c7d2a6dd8a03f761b4cc488e8ad96e4df390af', 'Devin', 'Soelberg', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (182, 'bo.y.ihn@vanderbilt.edu', 'f344f7fbe83ee9a9d9c2825baf3a9525719e5555', 'Bo Yeon', 'Ihn', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (184, 'kelleev0@sewanee.edu', '7c4c72430bfa26995104864676c0b293aaf248e1', 'Erin', 'Kelley', NULL, NULL, '', '', '', 'United States', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (185, 'mayur.kmt@gmail.com', 'cb71d8547c6bafd38ddc8c4f744330a1a5a08d49', 'Mayur', 'Kamat', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (187, 'jmckinnon99@gmail.com', 'db238ff18d8b953d5574564928a8f9fed0da9e5c', 'Jake', 'McKinnon', '/images/187.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-08-15 16:40:06', 0, 0);
INSERT INTO `users` VALUES (188, 'somasundarambk@gmail.com', '3adf38f3ca212c793c763435e1083f738058c7fb', 'Somasundaram', 'Beerana', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (189, 'theborg3of5@gmail.com', 'acedcba8b2aa920152d9bad7da962602b8a0f4c4', 'Gavin', 'Borg', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-08-20 23:09:09', 0, 0);
INSERT INTO `users` VALUES (191, 'willjohnson0892@sprynet.com', '89ca8df982272d8d63a11e9c9d45bb8bdac89cc0', 'Will', 'Johnson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-09-08 18:27:29', 0, 0);
INSERT INTO `users` VALUES (190, 'jackkuhl@vanderbilt.edu', 'cce81b5cf49a9f7864186dc616093abc9e552cc5', 'Jack', 'Kuhl', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);
INSERT INTO `users` VALUES (192, 'n347110@rtrtr.com', '1d1ce6feb1af4cf8c4152ea681b88adf92ad55ac', 'Andrew', 'Lum', '/images/192.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-09-16 00:59:30', 0, 0);
INSERT INTO `users` VALUES (193, 'bigthaiboi@gmail.com', '2f027752a76ce8b5090fd2aca7e1586fb2627129', 'Tom', 'Nguyen', '/images/193.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', 'very skilled negotiator;\r\nonce shook Jimmy Carter''s hand', '2012-09-16 01:12:17', 0, 0);
INSERT INTO `users` VALUES (194, 'nicholas.herbach@gmail.com', '8f52c02f11fdc0d09f3b995215356efa1e80911b', 'Nicholas', 'Herbach', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-09-20 22:48:38', 0, 0);
INSERT INTO `users` VALUES (195, 'glee1@caesars.com', 'a4a3d979ee950ddc7072c710fd0fa87ab79a6d17', 'Gene', 'Lee', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-10-19 13:16:17', 0, 0);
INSERT INTO `users` VALUES (196, 'ameyazambre@gmail.com', '0fad61a0eecb7ab0e871a155baf3d01cb01e6bef', 'Ameya', 'Zambre', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-11-02 23:49:42', 0, 1);
INSERT INTO `users` VALUES (197, 'ahcmfq@jbsbdd.com', 'e5137f062cf63be5b7e8c5be2c17a59e057f76b6', 'yyleaj', 'yyleaj', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '', '2012-06-28 10:38:00', 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `viewed`
-- 

CREATE TABLE `viewed` (
  `v_id` int(255) NOT NULL auto_increment,
  `from_id` int(255) NOT NULL,
  `to_id` int(255) NOT NULL,
  `viewed` date NOT NULL,
  PRIMARY KEY  (`v_id`),
  UNIQUE KEY `diff` (`from_id`,`to_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

-- 
-- Dumping data for table `viewed`
-- 

INSERT INTO `viewed` VALUES (1, 5, 5, '2012-02-18');
INSERT INTO `viewed` VALUES (2, 5, 20, '2012-02-17');
INSERT INTO `viewed` VALUES (3, 30, 30, '2012-02-17');
INSERT INTO `viewed` VALUES (4, 9, 9, '2012-01-27');
INSERT INTO `viewed` VALUES (5, 31, 31, '2012-02-17');
INSERT INTO `viewed` VALUES (6, 5, 34, '2012-01-29');
INSERT INTO `viewed` VALUES (7, 36, 36, '2012-02-05');
INSERT INTO `viewed` VALUES (8, 35, 35, '2012-02-15');
INSERT INTO `viewed` VALUES (9, 38, 38, '2012-01-31');
INSERT INTO `viewed` VALUES (10, 40, 40, '2012-01-27');
INSERT INTO `viewed` VALUES (11, 41, 41, '2012-01-23');
INSERT INTO `viewed` VALUES (12, 44, 44, '2012-02-16');
INSERT INTO `viewed` VALUES (13, 5, 42, '2012-01-22');
INSERT INTO `viewed` VALUES (14, 5, 43, '2012-01-23');
INSERT INTO `viewed` VALUES (15, 46, 46, '2012-01-22');
INSERT INTO `viewed` VALUES (16, 5, 48, '2012-01-28');
INSERT INTO `viewed` VALUES (17, 50, 50, '2012-02-02');
INSERT INTO `viewed` VALUES (18, 0, 0, '2012-01-22');
INSERT INTO `viewed` VALUES (19, 5, 37, '2012-01-23');
INSERT INTO `viewed` VALUES (20, 51, 51, '2012-02-13');
INSERT INTO `viewed` VALUES (21, 54, 54, '2012-02-05');
INSERT INTO `viewed` VALUES (22, 5, 55, '2012-01-23');
INSERT INTO `viewed` VALUES (23, 5, 39, '2012-01-23');
INSERT INTO `viewed` VALUES (24, 5, 27, '2012-02-06');
INSERT INTO `viewed` VALUES (25, 5, 13, '2012-01-23');
INSERT INTO `viewed` VALUES (26, 5, 49, '2012-01-28');
INSERT INTO `viewed` VALUES (27, 5, 52, '2012-01-23');
INSERT INTO `viewed` VALUES (28, 56, 56, '2012-01-27');
INSERT INTO `viewed` VALUES (29, 57, 57, '2012-01-28');
INSERT INTO `viewed` VALUES (30, 5, 53, '2012-02-13');
INSERT INTO `viewed` VALUES (31, 60, 60, '2012-01-23');
INSERT INTO `viewed` VALUES (32, -1, -1, '2012-01-24');
INSERT INTO `viewed` VALUES (33, 61, 61, '2012-01-28');
INSERT INTO `viewed` VALUES (34, 5, 29, '2012-01-28');
INSERT INTO `viewed` VALUES (35, 58, 58, '2012-01-27');
INSERT INTO `viewed` VALUES (36, 5, 63, '2012-02-15');
INSERT INTO `viewed` VALUES (37, 65, 65, '2012-01-27');
INSERT INTO `viewed` VALUES (38, 5, 23, '2012-01-28');
INSERT INTO `viewed` VALUES (39, 66, 66, '2012-01-28');
INSERT INTO `viewed` VALUES (40, 7, 7, '2012-01-30');
INSERT INTO `viewed` VALUES (41, 7, 45, '2012-01-28');
INSERT INTO `viewed` VALUES (42, 67, 67, '2012-01-29');
INSERT INTO `viewed` VALUES (43, 69, 69, '2012-01-30');
INSERT INTO `viewed` VALUES (44, 70, 70, '2012-01-30');
INSERT INTO `viewed` VALUES (45, 72, 72, '2012-02-03');
INSERT INTO `viewed` VALUES (46, 5, 71, '2012-01-30');
INSERT INTO `viewed` VALUES (47, 73, 73, '2012-01-31');
INSERT INTO `viewed` VALUES (48, 77, 77, '2012-02-11');
INSERT INTO `viewed` VALUES (49, 78, 78, '2012-02-17');
INSERT INTO `viewed` VALUES (50, 82, 82, '2012-02-13');
INSERT INTO `viewed` VALUES (51, 83, 83, '2012-02-13');
INSERT INTO `viewed` VALUES (52, 84, 84, '2012-02-16');
INSERT INTO `viewed` VALUES (53, 90, 90, '2012-02-14');
INSERT INTO `viewed` VALUES (54, 92, 92, '2012-02-14');
INSERT INTO `viewed` VALUES (55, 94, 94, '2012-02-14');
INSERT INTO `viewed` VALUES (56, 95, 95, '2012-02-14');
INSERT INTO `viewed` VALUES (57, 5, 91, '2012-02-14');
INSERT INTO `viewed` VALUES (58, 99, 99, '2012-02-15');
INSERT INTO `viewed` VALUES (59, 106, 106, '2012-02-16');
INSERT INTO `viewed` VALUES (60, 102, 102, '2012-02-15');
INSERT INTO `viewed` VALUES (61, 108, 108, '2012-02-16');
INSERT INTO `viewed` VALUES (62, 109, 109, '2012-02-16');
INSERT INTO `viewed` VALUES (63, 110, 110, '2012-02-16');
INSERT INTO `viewed` VALUES (64, 111, 111, '2012-02-16');
INSERT INTO `viewed` VALUES (65, 115, 115, '2012-02-16');
INSERT INTO `viewed` VALUES (66, 117, 117, '2012-02-16');
INSERT INTO `viewed` VALUES (67, 118, 118, '2012-02-16');
INSERT INTO `viewed` VALUES (68, 5, 98, '2012-02-16');
INSERT INTO `viewed` VALUES (69, 5, 103, '2012-02-16');
INSERT INTO `viewed` VALUES (70, 0, 120, '2012-02-17');
INSERT INTO `viewed` VALUES (71, 5, 81, '2012-02-18');

-- --------------------------------------------------------

-- 
-- Table structure for table `work_data`
-- 

CREATE TABLE `work_data` (
  `w_id` int(255) unsigned NOT NULL auto_increment,
  `idnum` int(255) unsigned NOT NULL,
  `company_name` varchar(255) character set utf8 NOT NULL,
  `b_id` int(255) NOT NULL,
  `title` varchar(255) character set utf8 NOT NULL,
  `company_start` date NOT NULL,
  `company_end` date NOT NULL,
  `present` tinyint(1) NOT NULL default '0',
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `achievement` mediumtext NOT NULL,
  `start_salary` int(11) NOT NULL,
  `end_salary` int(11) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `coworkers` text NOT NULL,
  PRIMARY KEY  (`w_id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

-- 
-- Dumping data for table `work_data`
-- 

INSERT INTO `work_data` VALUES (8, 69, 'Jump', 0, 'High', '1990-01-01', '2010-01-01', 0, '', '', 'None', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (7, 5, 'Quality Manufacturing Systems Inc.', 0, 'Software Engineer', '2011-05-01', '2011-08-01', 0, 'Nashville', 'TN', 'Direct printer communication with Kyocera, Intermec and Datamax printers.\r\nFinished multiple maintenance programs for the software installed on a new site.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (9, 69, 'Adidas', 0, 'Salesman', '1997-01-01', '1998-10-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (6, 5, 'Wisconsin State Fair', 0, 'Impark', '2010-08-01', '2010-08-01', 0, 'Milwaukee', 'WI', 'Directed 20 cars.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (10, 69, 'jisof', 0, 'asdonf', '2010-09-01', '2010-10-01', 0, '', '', 'asdf', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (11, 69, 'afojs', 0, 'asiofj', '1990-04-01', '2010-09-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (12, 69, 'aoifh', 0, 'qifnsio', '2000-01-01', '2000-02-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (14, 30, 'Kimberly McDonald', 0, 'Designer and Assistant to CEO', '2010-01-01', '1990-01-01', 1, '', '', 'January of 2010 to Present', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (38, 5, 'Sieve Networks', 0, 'Programmer Intern', '2009-01-01', '2009-06-01', 0, 'Wauwatosa', 'WI', 'Troubleshoot network security.\r\nProgrammed software pertaining to phone security.\r\nCollected data using TShark and performed data analysis on phone calls.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (36, 30, 'Co-Founder of Professional Archives', 0, 'Design', '2011-12-01', '2012-02-01', 0, 'Nashville', 'Tn', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (17, 80, 'Quicken Loans', 0, 'Intern', '2011-07-01', '2011-08-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (18, 82, '', 0, '', '1990-01-01', '1990-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (19, 83, 'The Dockside', 0, 'Server', '2011-05-01', '2011-08-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (20, 85, 'PlanJar', 0, 'Co-Founder/Software Architect', '2011-02-01', '2012-01-01', 0, '', '', '400+ registered users, 3 months from line 1 to completion', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (21, 87, 'Sodexo Sports and Leisure', 0, 'Supervisor', '2011-01-01', '2014-12-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (22, 87, 'Sodexo Sports and Leisure', 0, 'Supervisor', '2011-01-01', '2014-12-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (23, 87, 'Sodexo Sports and Leisure', 0, 'Supervisor', '2011-01-01', '2014-12-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (24, 91, 'Kumon, Inc. ', 0, 'Upper Level Math Teacher', '2008-08-01', '2011-06-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (25, 94, 'American Red Cross', 0, 'Government Relations Intern', '2011-06-01', '2011-07-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (26, 99, 'Tennessee Democratic Party ', 0, 'Field Canvasser', '2011-05-01', '2011-08-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (27, 99, 'Separation Systems', 0, 'Junior Assistant to the VP of International Business Development', '2009-05-01', '2009-08-01', 0, 'Gulf Breeze', 'FL', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (28, 99, 'Vanderbilt Fine Arts Department', 0, 'Curator of the Student Gallery', '2011-12-01', '1990-01-01', 1, 'Nashville', 'TN', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (29, 99, 'Vanderbilt Fine Arts Department', 0, 'Student worker and assitant to building manager', '2011-08-01', '1990-01-01', 1, 'Nashville', 'TN', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (30, 103, 'The First Tee Organization', 0, 'Coach/Volunteer', '2003-01-01', '2011-08-01', 0, '', '', 'Ace Certification\r\nWalmart First Tee Open at Pebble Beach (2 years)\r\nFuture Leaders Forum\r\nLifeskill''s Leadership Academies', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (31, 31, 'Revolution Prep', 0, 'Branch Manager, Southwest Region', '2011-04-01', '2011-08-01', 0, 'Louisville', 'KY', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (35, 108, 'Jimbo Sex Blog', 0, 'Sexologist', '2019-01-01', '1990-01-01', 0, '', '', 'http://jimbosexadvice.wordpress.com/', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (33, 106, 'Yawn Sheffield Welch Wealth Management Group LLC', 0, 'Investment Management Intern', '2011-06-01', '2011-08-01', 0, 'Nashville', 'TN', 'Worked alongside members of the group for a few hours a day three times a week examining clientsâ€™ portfolios\r\nResearched mutual funds, the stock and bond markets, and asset allocation in order to understand multiple investing strategies and techniques\r\nAttended a business seminar and met with several members in this field to gather information about different methods of investing', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (34, 102, 'Merrill Lynch', 0, 'Global Wealth Management Intern', '2011-05-01', '2011-08-01', 0, 'Oak Brook', 'IL', 'Identified and monetized expiring annuities\r\n\r\nDeveloped and implemented a marketing plan to acquire new clientele within the medical field.\r\n\r\nCreated a database of prospective clients. \r\n\r\nCreated proforma''s for clients. \r\n\r\nConducted stock evaluations.\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (37, 5, 'Goldenstone Automation Co.', 0, 'Computer Technician', '2007-09-01', '2010-12-01', 0, 'Milwaukee', 'WI', 'Troubleshoot office computers.\r\nTechnical support for computers and printers.\r\nMaintain network security.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (39, 118, 'Revolution Prep', 0, 'Director', '2011-04-01', '2012-02-01', 1, '', '', 'Invited back as Director; started a branch of SAT prep business; averaged 250 points improvement for all students.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (40, 118, 'Vector Marketing', 0, 'Independent Contractor', '2009-04-01', '2009-08-01', 0, 'Cohasset', 'MA', 'Developed sales skills and drove over $10,000 in revenue.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (41, 122, 'Civil Engineering Consulting Services', 0, 'Summer Intern', '2011-05-01', '2011-08-01', 0, 'Columbia', 'SC', 'Worked as an intern for a civil engineering consulting firm, a company that provides engineering services to state, county, city, and local governments as well as private sector clients.\r\nAssisted in editing/reconstructing Microstation drawings.\r\nAssisted in mapping hydrology of ten mile stretch of interstate for a future project through field work and Microsoft Excel calculations.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (42, 123, 'First Management Services', 0, 'Intern', '2011-03-01', '2011-08-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (43, 71, 'Clynk', 0, 'Waste Manager', '1990-01-01', '1990-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (44, 71, 'Nonesuch Oar and Paddle Club', 0, 'Junior Manager', '2011-06-01', '2011-08-01', 0, 'Scarborough', 'ME', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (45, 127, 'JP Morgan', 0, 'Analyst', '1995-09-01', '1998-05-01', 0, 'New York City', 'NY', 'Youngest person to climb Mt. Everest.\r\nWorked as Facebook IPO\r\nAssisted the president in completing projects.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (46, 127, 'Google', 0, 'Programmer', '1996-05-01', '2000-12-01', 0, 'San Jose', 'CA', 'Doubled the views to Google.\r\nHelped create Google+.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (47, 127, 'United States', 0, 'President', '2001-01-01', '2006-12-01', 0, '', '', 'First President of the United States', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (48, 135, 'YMCA', 0, 'Lifeguard', '2011-05-01', '2011-08-01', 0, 'Nashville', 'TN', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (49, 135, 'UPS', 0, 'Driver Helper', '2009-12-01', '2010-01-01', 0, '', '', 'Delivered packages during busy holiday season', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (50, 63, 'Kay, Griffin, Enkema, & Colbert PLLC', 0, 'Runner ', '2008-06-01', '2011-08-01', 0, 'Nashville', 'TN', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (51, 144, 'Josh Anderson Realty', 0, 'Fall Intern', '2011-08-01', '2012-02-01', 0, 'Nashville', 'TN', 'Computer based work: list management and marketing\r\nContact: Marcie@joshandersonrealestate.com\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (52, 144, 'Simcal Properties', 0, 'Property Manager', '2010-05-01', '2012-02-01', 0, 'Coronado', 'CA', 'Collection of rent \r\nTenant management and apartment turnovers\r\nWorking with invoices, vendors, and financial data\r\nCan work with the QuickBooks database\r\nContact: (619) 364-4268, Carmen Chavez\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (53, 144, 'Senator Robert Menendez', 0, 'Winter Intern', '2010-02-01', '2010-02-01', 0, 'Washington ', 'D.C.', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (54, 144, 'Advanced Realty', 0, 'Summer Intern', '2011-05-01', '2011-08-01', 0, 'Coronado', 'CA', 'Leaned about marketing and investments\r\nPayment scheduling and extensions\r\nFiling, organizing, faxing \r\nContact: (619) 365-4321, Jim Rowe\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (55, 144, 'Bistro d'' Asia', 0, 'Hostess', '2009-01-01', '2011-07-01', 0, '', '', 'â€¢	Customer service and seating\r\nâ€¢	Preparation of to-go orders\r\nâ€¢	Contact: (619) 437-6678, Alaa Elsadek\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (56, 144, 'Vanderbilt Student Recreation', 0, 'Equipement Manager', '2011-08-01', '2011-12-01', 0, 'Nashville', 'TN', 'Working cashier\r\nRenting and selling equipment\r\nInteraction with student, teachers, and adults\r\nManaging inventory\r\nContact: (615) 343-6627, Calvin\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (57, 145, 'Seismic Exchange Inc', 0, 'Development Intern', '2011-05-01', '2010-07-01', 0, '', '', 'Cleaned up Delphi code\r\nCleaned up SQL code\r\nWrote VBA programs', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (58, 146, 'Hunter Roberts Construction Group', 0, 'Intern', '2010-06-01', '2010-08-01', 0, 'New York', 'NY', 'Managed construction of a $48 million public school in Brooklyn', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (59, 146, 'Hunter Roberts Construction Group', 0, 'Estimating Intern', '2011-06-01', '2011-08-01', 0, '', '', 'Estimated projects of up to $200 million to bid on.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (60, 149, 'Insurance Institute for Highway Safety', 0, 'Research Assistant', '2008-06-01', '2011-08-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (61, 150, 'J. Crew', 0, 'Sales Associate', '2011-05-01', '2011-08-01', 0, 'Short Hills', 'NJ', 'Navigated computer inventory and payment programs, communicated with customers', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (62, 150, 'WRVU, Campus Radio Station', 0, 'Radio Intern, DJ', '2010-09-01', '2011-05-01', 0, 'Nashville', 'TN', 'Interned on weekly radio show, programmed and reviewed CDs, earned solo show', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (63, 150, 'Jamaican Me Crazy, Island Fun Store', 0, 'Sales Associate', '2010-05-01', '2010-08-01', 0, 'Margate', 'NJ', 'Designed displays, restocked merchandise, communicated with customers', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (64, 150, 'Sum It Up For Girls, Camps and Clinics', 0, 'Coach, Counselor', '2008-05-01', '2009-11-01', 0, 'Summit', 'NJ', 'Mentored elementary-aged girls, taught basic lacrosse and team-building skills, organized participant information and registration, updated membership database', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (65, 152, 'Arrow Electronics, Inc.', 0, 'Marketing Intern', '2011-05-01', '2011-08-01', 0, 'Englewood', 'Colorado', 'Led social media strategy for division\r\nConducted primary and secondary research\r\nPresented recommendation to senior team\r\nAsked to re-present to global marketing team\r\nRunner up intern competition for presentation on internal social media solution', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (66, 157, 'Capital Strategies Partners', 0, 'Intern', '2012-06-01', '2012-07-01', 0, 'Madrid', 'Spain', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (94, 58, 'Michael Stapleton Associates', 0, 'Intelligence Analyst', '2012-05-01', '2012-07-01', 0, 'New York', 'NY', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (75, 9, 'Uloop', 0, 'Mobile Software Engineering Intern', '2012-05-01', '2012-08-01', 1, 'Chicago', 'IL', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (69, 164, 'Goldenstone Automation Co.', 0, 'President', '1990-01-01', '2019-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (70, 165, '', 0, '', '1990-01-01', '1990-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (71, 35, 'LECO Corporation', 0, 'Cooperative student intern in computer science', '2011-06-01', '2011-08-01', 0, 'Saint Joseph', 'MI', 'Implemented continuous build integration system using TeamCity', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (72, 35, 'Institute for Software Integrated Systems', 0, 'Undergraduate research assistant', '2012-02-01', '2012-05-01', 1, 'Nashville', 'TN', 'Implemented transmission between computer and Arduino microprocessor\r\nMade real-time GUI using Qt for remote-control car', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (73, 171, 'D. Jaburek Billiards', 0, 'Sales Associate', '2008-06-01', '2011-08-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (76, 9, 'CTS America Inc.', 0, 'Software Engineering Intern', '2011-05-01', '2011-08-01', 0, 'Pensacola', 'FL', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (77, 178, 'The Harpeth Hall School Summer Camp', 0, 'Tennis Camp Counselor', '2010-06-01', '2010-07-01', 0, 'Nashville', 'TN', 'Taught tennis at an all girls day camp (Ages 7-12)', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (78, 178, 'CBS', 0, 'Intern/Assistant ', '2010-01-01', '2010-02-01', 0, 'New York City', 'NY', 'Compiled relevant articles for CBS News\r\nScribed for Various television shows\r\nBlogged on social media websites for "NCIS"\r\nPitched article ideas to CBS Watch! Magazine', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (79, 178, 'Dr. William H. Polk, General Surgeon at Centennial Hospital', 0, 'Intern', '2009-01-01', '2009-02-01', 0, 'Nashville', 'TN', 'Observed numerous surgeries including thoracotomy, coronary artery bypass, prostatectomy, and laparoscopic gall bladder removal\r\nWorked with patients in an office atmosphere\r\nLearned skills in stitching', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (80, 180, 'Jefferies Group Inc. ', 0, 'Equity Research Intern', '2011-09-01', '2012-05-01', 0, '', '', 'Assisted analysts in compiling The Script, a weekly publication covering roughly 40 health care companies\r\nAssisted analysts in creating put-call ratio analysis on excel for the health care companies they cover\r\nResearched and created excel models on assigned companies. This included creating an excel model of financial statements and developing a growth multiplier\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (81, 180, 'Wilmette Park District', 0, 'Summer Sailing Camp Instructor', '2011-05-01', '2011-08-01', 0, 'Wilmette', 'IL', 'Level One Certified Instructor through US Sailing \r\nWorked specifically with the more advanced students in teaching new techniques and skills\r\nProvided private lessons outside of the camp\r\nAssisted camp directors in scheduling events, creating programs, and administrative tasks\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (82, 157, 'Chesapeake Energy Co.', 0, 'Intern-Land', '2011-05-01', '2011-08-01', 0, 'Oklahoma City', 'Oklahoma', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (83, 13, 'AT&T', 0, 'Premises Technician', '2012-01-01', '1990-01-01', 1, 'Waukesha', 'WI', '3rd best tech in the garage.\r\nEarned 5-star the first month of work.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (84, 13, 'Quantum L.S.', 0, 'Sales', '2011-03-01', '2011-07-01', 0, 'Milwaukee', 'WI', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (85, 180, 'Little Traverse Sailors ', 0, 'Summer Sailing Camp Instructor', '2007-06-01', '2010-08-01', 0, 'Harbor Springs ', 'MI', 'Level One Certified Instructor through US Sailing\r\nWorked specifically with the more advanced students in teaching new techniques and skills\r\nProvided private lessons outside of the camp\r\nAssisted camp directors in scheduling events, creating programs, and administrative tasks\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (92, 186, 'Epic', 0, 'Project Manager', '2007-05-01', '1990-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (87, 144, 'Senator Robert Menedez ', 0, 'Student Intern', '2010-01-01', '2010-02-01', 0, 'Washington D.C.', '', 'Worked closely with the Chief of staff, filed papers and answered phones', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (93, 58, 'Breezy Point Cooperative', 0, 'Lifeguard', '2011-06-01', '2011-08-01', 0, 'Breezy Point', 'NY', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (89, 142, 'The Wildlife Experience', 0, 'Visitor Experience Respresentative', '2011-05-01', '1990-01-01', 1, 'Parker', 'CO', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (90, 142, 'Vanderbilt Biology Department', 0, 'Undergraduate Research Assistant', '2011-08-01', '2012-05-01', 0, 'Nashville', 'TN', 'Bred fish weekly and sorted embryos for experiments.\r\nLearned further lab techniques.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (91, 142, 'Vanderbilt Neuroscience Department', 0, 'Undergraduate Assistant', '2010-09-01', '2011-04-01', 0, 'Nashville', 'TN', 'Learned basic lab techniques and equipment (agarose gel preparation and use, transform bacteria, purify DNA).\r\nOrganized oligonucleotide and vector databases.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (95, 58, 'Breezy Point Cooperative', 0, 'Lifeguard', '2012-06-01', '2012-08-01', 0, 'Breezy Point', 'NY', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (96, 188, 'Intel', 0, 'Software Development Engineer', '2009-01-01', '2012-07-01', 0, '', '', 'Received "Bravo" Award', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (104, 5, '', 0, '', '1990-01-01', '1990-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (105, 5, '', 0, '', '1990-01-01', '1990-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (99, 189, 'Shodor Education Foundation', 0, 'Software Development Intern', '2005-01-01', '2012-02-01', 0, 'Durham', 'NC', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (100, 189, 'Epic', 0, 'Research and Development Intern', '2012-05-01', '2012-08-01', 0, 'Madison', 'WI', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (103, 191, 'William Johnson Management', 0, 'Manager and Owner', '2011-01-01', '2014-05-01', 0, 'Austin/Nashville', 'TX/TN', 'â€¢	Developed opportunity for film composer client to become finalist for the lead Composer in Lucas Filmâ€™s recent hit movie â€œRed Tailsâ€\r\nâ€¢	Identified and developed opportunities for multiple clients to appear on TV shows such as NCIS and various independent films in the Austin, Texas area\r\n', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (101, 0, '', 0, '', '1990-01-01', '1990-01-01', 0, '', '', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (106, 192, 'ProArcs', 0, 'Lead Developer', '2016-10-01', '2015-05-01', 0, '', '', 'Founded the company!', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (107, 193, 'Imports/Exports', 0, 'Field-Jockey', '1990-01-01', '1990-01-01', 0, 'Bamfcock', 'Thailand', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (108, 5, 'Epic', 0, 'Software Developer Intern', '2012-06-01', '2012-08-01', 0, 'Madison', 'WI', '', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (110, 0, 'npupsdUUgqKrcGa', 0, 'zcGWaOOFKt', '0000-00-00', '0000-00-00', 0, 'SbfaIkpKbAQ', 'DEGlByEHsNGIQsSAI', 'it was metrically and coneuptcally excellent.  A gold-glow day, that was.  How I valued your approval..As â€œTo every coin â€¦.â€, so to every situation:  the pluses and minuses.  The upsetting minus of you working at 3 or 4 am Florida-time meant that your nights, in fact, were disrupted rather than restful..On more than one such no-sleep occasion, we joked about King Davidâ€™s influence on you, adapting Psalm 57:7-9.  Like King David, your.07: [...] heart is ever steadfast..And like King David, you  .08: [â€¦] wake the dawn.09: (to) celebrate you, Lord,      among the people; and sing      your praise among the nations..But the plus of those sleep-arrested nights meant that the time differences between us seemingly dissipated, and emails could fly back and forth.  A 3 a.m. mail from you was a  welcome midmorning coffee break for me.  And how could it be anything but welcome?    this respite, full of mind teasing, brain twisting, and word tweaking, a stimulating flurry of exchanges. Combat over the difference between awe â€“ yirâ€™AH,   fulfilling G-dâ€™s laws through our observation of His wondrous works in our surroundings, and fear    PAâ€™khad â€“ keeping G-dâ€™s laws only to avoid punishment, and the implications of each  of these words in the texts.  Battles over the fine line between mercy and pity.  Tug-o-war over â€˜loving-kindnessâ€™ â€“ what does one do with such a long and awkward word?    which incidentally is quite short in the original: KHESSâ€™edd.   But which also raises the issue of synonymsâ€¦ and the fact that a synonym in English isnâ€™t necessarily so in Hebrew.  Bit by bit, you prized the treasure chest open, Alan, its trove of prizes being polished by your special touch..And there was plain old fun teasing too.  Lots of it.  Like the time you advised that youâ€™d come up with a great solution to Psalm 68:4 after extensive debate, but that you wanted to think it over for a day before releasing it.  Another brilliant clinch in the offing â€¦. The suspense was too much â€“ were there 2 or 3 or more whining requests from me: oy vey, no, no, please   send   now!  You sent it shortly afterwards, of course, flourished your trademark  â€˜hehâ€™:.04: Sing unto God and laud his name.      Prepare the way for the skyâ€™s rider.      His name is LORD. Exult before him..Though vital to your health, paradoxically you often viewed medical appointments as another setback in this race against time.  When the second half of your week hadnâ€™t been easy, following treatment, you sadly let me know it would not be possible to finish the particular psalm we were working on before the Sabbath commenced.  With your keen sensitivity to wording, even when I mentioned no names in brief messages, you learned to identify which of my children would be coming home, and wish us a restful Shabbat..Luckily, unproductive â€˜long weekendsâ€™ were not too common.  Instead, there were many other evenings when, around midnight or later as I was about to close the computer and go to sleepâ€¦ ping!  Who can resist the tantalizing ping of the inbox!  OK, skim through, acknowledge: Iâ€™ll check first thing tomorrow.  But this work was so rewarding for us both that it was impossible to ignore your draft until the next morning, especially knowing that youâ€™d probably have time to review response notes that very same day if you received them back immediately..So: coffee, close reading, corrections;  and 30 to 40 minutes later, sometimes an hour for a longer or more complex piece, back the notes went.  Always considerate of my schedules, you would add something like: Itâ€™s very late for you now.  Donâ€™t stay up for the sake of this draft.  But the beauty of the project burned within our hearts, yes, like a kind of love, and who can turn away from love?************.How many parallel experiences we discovered in our lives, Alan, from puppies to orchards and growing up near large bodies of water.  Both of us, sticklers for accuracy in our work; both of us sharing two pet peeves, â€˜proactiveâ€™, and â€˜impactâ€™ as a proactive(!) verb; both of us loving our language of preference..We worked well together because we truly admired each otherâ€™s spheres of knowledge.  Your gratitude was warmly sincere.   And your  humility in the face of the powerful poetry woven into these ancient words made working with you a delight.  You tackled the raw material, hammering at it until you spun   as described in Psalm 12:6 â€“silver, refined in earthâ€™s crucible,strained and purified seven times over..I was awed by how you approached the work, and told you what a privilege it was to observe the process closely, from the inside out, as it were.  We both felt privileged by this versified translation, the chance, as  Psalm 33 says, to -03:      Sing a new song to the Lord.           Play it with skill and verve..In psalm 9 verse 12, King David delineates how G-d[â€¦] recalls them:      he never forgets the cry of the meek..We weighed the inferences of  recall, and never forget, the first being active, a purposeful raising into the conscious mind, by stating and restating; the second being more passive, an undertone or background; we explored how these words connected with that core of Bible, the Ten Commandments.  Working intensively with you this past year-plus leaves me with so many funny or special shared moments and anecdotes; I will never forget them.  As for classes on Davidic Psalms and their link to principles of Torah, I will keep my promise to you, Alan, and dedicate them in your name, this year, next year, whenever I give such classes, thereby actively, publicly recalling â€“ for, as we discussed in Psalm 86, a name mentioned in connection with study of Bible gladdens the namesake''s soul..Throughout, your achievement was a source of encouragement to many, as we watched you determinedly gain time with the psalms. It was only recently that you wrote the following:.When we got done with 145, I had no idea so much work might still remain. It is daunting, but it has gone well, I think, and it certainly motivates me to stay alert and fight through my medical troubles. I shall be grateful to let go when the time comes. I am so tired. But not yet..And still you managed to edit so many of the psalms since that note, even completely recasting some of them.  But with every day that passed since your hospitalization, and no email winging into my inbox, my heart fractured that bit more.  You could, chronologically, have been my older brother, and what a wonderful older brother you often seemed to be throughout this laden but beautiful year of working together.  Who better to express how I feel now, than King David in  Psalm 22:14    I am spilled like water. / All my bones disjointed; / my heart is beeswax, / melting within.   This, because I mourn you as only a close Elder Sister can.***.Alan         May your  insightfulness be a long-lived tribute to your depth of thinking;.May your keen learning that so enhanced our working together, and the many other traits of character that we all respect and admire, infuse our memories with hues of love;.May these, and so much more, be a comfort to all who were close to you.And may these words which I have spoken stand as testimony in your good stead before God..Alan, dear spirit-kin, if I have unthinkingly offended you or been inconsiderate in any way, I ask your forgiveness..Letâ€™s  turn again to Psalm Eleven, the psalm that brought us together:.01: I hope in the Lord.      Would you wish of my soul      be off like a bird â€¦...May your soul, like the bird, be off      to settle beneath wings of everlasting peace and blessed rest.    ta''NOOâ€™akh    baâ€™shaâ€™LOM.   [rest peacefully]   Amen.', 0, 0, 0, '');
INSERT INTO `work_data` VALUES (111, 196, 'Epic Systems', 0, 'Software Developer Intern', '2012-05-01', '2012-07-01', 0, 'Madison', 'Wisconsin (WI)', '', 0, 0, 0, '');

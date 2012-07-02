-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg09.eigbox.net
-- Generation Time: Jul 01, 2012 at 10:34 PM
-- Server version: 5.0.91
-- PHP Version: 4.4.9
-- 
-- Database: `pa_members`
-- 

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

-- --------------------------------------------------------

-- 
-- Table structure for table `businesses`
-- 

CREATE TABLE `businesses` (
  `b_id` int(20) NOT NULL auto_increment,
  `company_name` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `creator` int(255) NOT NULL,
  `picture` varchar(512) NOT NULL,
  `founded` date NOT NULL,
  PRIMARY KEY  (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `businesses`
-- 

INSERT INTO `businesses` VALUES (1, 'Ingram Industries', 'Book', 'Ingram Industries is a company based in Nashville founded by the late Erskine Bronson Ingram and still owned and run by the Ingram family. Ingram Barge Company was founded by his father, Orrin Henry Ingram. Since the death of Erskine in 1995, Ingram Industries has been run by his widow Martha Rivers Ingram and their sons Orrin and John.', 'La Vergne', 'TN', 30, 'business_img/1.gif', '1970-01-01');
INSERT INTO `businesses` VALUES (2, 'Professional Archives', 'Internet', 'Here at ProArcs we are just trying to make the job process easier for employers and candidates. Let us start matching you with interns/internships today!', 'Nashville', 'TN', 27, '/business_img/27.png', '0000-00-00');
INSERT INTO `businesses` VALUES (3, 'Goldenstone Automation Co.', '', '', 'Greenfield', 'WI', 164, '', '0000-00-00');
INSERT INTO `businesses` VALUES (4, 'Pinpoint Interests', '', '', 'Nashville', 'TN', 168, '/business_img/168.jpg', '0000-00-00');
INSERT INTO `businesses` VALUES (5, 'Epic', 'Healthcare Software', 'Epic makes software for mid-size and large medical groups, hospitals and integrated healthcare organizations working with customers that include community hospitals, academic facilities, children''s organizations, safety net providers and multi-hospital systems. Our integrated software spans clinical, access and revenue functions and extends into the home. Epic is a national leader in software development for healthcare systems. We create and implement a wide range of integrated software for many of the largest healthcare organizations in the country. Our software improves patient care and reduces costs. Over the last 15 years we have seen steady growth, and currently, organizations using our software care for about 140 million people across the United States. That means that 1 in 3 people in the U.S. are directly affected by the work we do. Beyond all of that Epic is an exciting, innovative place to work.', 'Verona', 'WI', 27, '/business_img/6.jpg', '0000-00-00');

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

INSERT INTO `c_applied_2` VALUES (20, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (155, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (155, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (155, 5, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (155, 3, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (5, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (20, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (36, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (5, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (27, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (9, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (29, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (30, 5, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (31, 3, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (33, 1, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (37, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (43, 3, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (35, 2, 0, 0, 'None', 2);
INSERT INTO `c_applied_2` VALUES (41, 1, 0, 0, 'None', 2);
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

INSERT INTO `c_applied_5` VALUES (5, 6, 0, 0, 'None', 2);
INSERT INTO `c_applied_5` VALUES (20, 6, 0, 0, 'None', 2);
INSERT INTO `c_applied_5` VALUES (25, 6, 0, 0, 'None', 2);
INSERT INTO `c_applied_5` VALUES (29, 6, 0, 0, 'None', 2);
INSERT INTO `c_applied_5` VALUES (31, 6, 0, 0, 'None', 2);
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
INSERT INTO `c_top_2` VALUES (0, 1, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `careers`
-- 

INSERT INTO `careers` VALUES (1, 'Professional Archives', 2, 'Internet Engineer', 'Computer Science, Computer Engineering', '', '', 60000, '', 'Nashville', 'TN', 'United States', 1);
INSERT INTO `careers` VALUES (2, 'Professional Archives', 2, 'Marketing ', 'Economics, HOD', '', '', 40000, '', 'Nashville', 'TN', 'United States', 1);
INSERT INTO `careers` VALUES (3, 'Professional Archives', 2, 'Web Design Intern', 'Computer Science, Computer Engineering', 'Web Design Intern', '', 0, 'Hourly', 'Nashville', 'TN', 'United States', 1);
INSERT INTO `careers` VALUES (6, 'Epic', 5, 'Software Development Co-op', 'Computer Science, Software Engineering, Mathematics, or a related field (with more than one semester left)', 'Work on a project that makes an impact in healthcare over just a semester. You will receive mentoring from brilliant colleagues, and learn about the software development industry from the experts. We have an entrepreneurial mentality, so you''ll see everything that goes into software development from user requirement gathering, design, testing, documentation, customer support, and user interface design-this is more than coding.\r\n\r\nWe''ll give you a lot to do, and we''ll expect you to deliver something great.\r\n\r\nDevelopers'' work directly impacts the way one in three Americans receives healthcare - in fact, it''s likely affecting the life of someone close to you. Working at the juncture of two growing fields, medicine and computer science, you''ll help create the best software for your users'' needs. Epic is located in Madison, Wisconsin, a city regularly ranked as one of America''s best places to live.', 'Currently attending school in the US, Willing to work full-time for at least one semester, A history of academic success, Visa sponsorship is available.', 0, 'Annual/Total', 'Verona', 'WI', 'United States', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `education_data`
-- 

CREATE TABLE `education_data` (
  `idnum` int(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `title` varchar(255) character set utf8 NOT NULL,
  `major` varchar(512) character set utf8 NOT NULL,
  `minor` varchar(512) NOT NULL,
  `college_start` date NOT NULL,
  `college_end` date NOT NULL,
  `gpa` float NOT NULL,
  `honors` text NOT NULL,
  PRIMARY KEY  (`idnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `education_data`
-- 

INSERT INTO `education_data` VALUES (5, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science', '', '2010-08-01', '2014-05-01', 3.71, 'Dean''s List');
INSERT INTO `education_data` VALUES (20, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering', '', '2010-08-01', '2014-05-01', 3.94, '');
INSERT INTO `education_data` VALUES (25, 'Vanderbilt University', 'Bachelor of Arts', 'German', '', '0000-00-00', '0000-00-00', 3.17, '');
INSERT INTO `education_data` VALUES (27, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering ', '', '2010-08-01', '2014-05-01', 2.8, '');
INSERT INTO `education_data` VALUES (28, 'Vanderbilt University', 'Bachelor of Arts', '', '', '0000-00-00', '0000-00-00', 0, '');
INSERT INTO `education_data` VALUES (29, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil Engineering', '', '0000-00-00', '0000-00-00', 3.6, 'KA');
INSERT INTO `education_data` VALUES (31, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering, Finance', '', '0000-00-00', '0000-00-00', 3.9, '');
INSERT INTO `education_data` VALUES (32, 'Vanderbilt University', 'Bachelor of Science', 'Economics', '', '0000-00-00', '0000-00-00', 3, '');
INSERT INTO `education_data` VALUES (33, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Finance, Corporate Strategy', '', '0000-00-00', '0000-00-00', 3.88, '');
INSERT INTO `education_data` VALUES (34, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Premed', '', '2010-08-01', '2012-01-01', 3.44, '');
INSERT INTO `education_data` VALUES (36, 'Vanderbilt University', 'Bachelor of Arts', 'Business, Spanish', '', '0000-00-00', '0000-00-00', 3.481, '');
INSERT INTO `education_data` VALUES (35, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Engineering', '', '2010-08-01', '2014-05-01', 3.9, 'National Merit Scholar, Dean''s List');
INSERT INTO `education_data` VALUES (39, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, HOD, Financial Economics', '', '0000-00-00', '0000-00-00', 3.56, '');
INSERT INTO `education_data` VALUES (40, 'Vanderbilt University', 'Bachelor of Arts', 'Communication Studies', '', '2010-08-01', '2014-05-01', 3.313, '');
INSERT INTO `education_data` VALUES (41, 'Duke University', 'Bachelor of Arts', 'Economics', '', '0000-00-00', '0000-00-00', 3.5, '');
INSERT INTO `education_data` VALUES (43, 'Vanderbilt University', 'Bachelor of Science', 'Human & Organizational Development, Spanish', '', '0000-00-00', '0000-00-00', 3.42, '');
INSERT INTO `education_data` VALUES (44, 'Vanderbilt University', 'Bachelor of Science', 'Neuroscience, Linguistics', '', '0000-00-00', '0000-00-00', 3.65, '');
INSERT INTO `education_data` VALUES (46, 'Vanderbilt University', 'Bachelor of Arts', 'History, Spanish, Corporate Strategy', '', '0000-00-00', '0000-00-00', 0, '');
INSERT INTO `education_data` VALUES (47, 'Vanderbilt University', 'Bachelor of Arts', 'Chemistry', '', '0000-00-00', '0000-00-00', 3.84, '');
INSERT INTO `education_data` VALUES (48, 'Lyon College', 'Bachelor of Arts', 'History', '', '0000-00-00', '0000-00-00', 3.61, '');
INSERT INTO `education_data` VALUES (50, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Science, Math', '', '0000-00-00', '0000-00-00', 3.9, '');
INSERT INTO `education_data` VALUES (51, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '0000-00-00', '0000-00-00', 3.8, '');
INSERT INTO `education_data` VALUES (52, 'Vanderbilt University', 'Bachelor of Arts', 'Medicine, Health, and Society and Psychology ', '', '0000-00-00', '0000-00-00', 3.1, '');
INSERT INTO `education_data` VALUES (53, 'Vanderbilt University', 'Bachelor of Arts', 'Human & Organizational Development', '', '0000-00-00', '0000-00-00', 2.67, '');
INSERT INTO `education_data` VALUES (54, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '0000-00-00', '0000-00-00', 3.628, '');
INSERT INTO `education_data` VALUES (57, 'Vanderbilt University', 'Bachelor of Arts', 'sociology', '', '0000-00-00', '0000-00-00', 0, '');
INSERT INTO `education_data` VALUES (59, 'University of South Carolina', 'Bachelor of Science', 'Biological Science/Pre-Med, Southern Studies', '', '0000-00-00', '0000-00-00', 3.65, '');
INSERT INTO `education_data` VALUES (60, 'Vanderbilt University', 'Bachelor of Engineering', 'Biomedical Engineering/Pre-Med', '', '0000-00-00', '0000-00-00', 3.931, '');
INSERT INTO `education_data` VALUES (150, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science, Anthropology', '', '2010-08-01', '2014-05-01', 3.4, 'National Merit Scholarship Recipient ');
INSERT INTO `education_data` VALUES (63, 'University of Virginia', 'Bachelor of Nursing', 'Nursing', '', '2010-08-01', '2014-05-01', 3.558, '');
INSERT INTO `education_data` VALUES (65, 'Vanderbilt University', 'Bachelor of Arts', 'Biology, Economics', '', '1990-01-01', '1990-01-01', 2.6, '');
INSERT INTO `education_data` VALUES (7, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science', '', '2010-08-01', '2014-05-01', 3.705, '');
INSERT INTO `education_data` VALUES (69, 'Harvard College', 'Bachelor of Arts', 'Portuguese', '', '2010-11-01', '2014-05-01', 3.705, '');
INSERT INTO `education_data` VALUES (70, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science ', '', '2009-08-01', '2013-05-01', 2.96, '');
INSERT INTO `education_data` VALUES (71, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil Engineering', 'Material Science, ', '2010-08-01', '2014-05-01', 2.65, '');
INSERT INTO `education_data` VALUES (122, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil Engineering', '', '2010-08-01', '2014-05-01', 3.85, 'Dean''s List');
INSERT INTO `education_data` VALUES (78, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science', '', '2010-08-01', '2014-03-01', 3.3, 'Independent Study');
INSERT INTO `education_data` VALUES (80, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering', '', '2010-08-01', '2014-05-01', 2.78, 'Alpha Tau Omega Fraternity, HOPE scholarship, ');
INSERT INTO `education_data` VALUES (81, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Science', '', '2011-08-01', '2015-05-01', 4, '');
INSERT INTO `education_data` VALUES (82, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Human and Organizational Development', '', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (83, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering, Math', '', '2010-08-01', '2014-05-01', 3.421, 'Dean''s List, Theta Tau (new member educator), Alpha Omicron Pi (Keeper of the Ritual)');
INSERT INTO `education_data` VALUES (84, 'Vanderbilt University', 'Bachelor of Engineering', 'Biomedical Engineering', '', '2010-08-01', '2014-05-01', 3.085, '');
INSERT INTO `education_data` VALUES (85, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science, Math', '', '2008-08-01', '2012-05-01', 3.68, 'VSVS, Dean''s List, Tau Beta Pi');
INSERT INTO `education_data` VALUES (86, 'Vanderbilt University', 'Bachelor of Arts', 'Sociology, Spanish', '', '2011-09-01', '2013-05-01', 3.5, 'Dean''s list \r\nNewspaper\r\nHer Campus Online Magazine\r\nPencil Pals \r\nMANNA High School Tutoring\r\nAlpha Phi Omega Volunteer Fraternity');
INSERT INTO `education_data` VALUES (87, 'Vanderbilt University', 'Bachelor of Science', 'Medicine, Health, and Society; Nursing', '', '2010-08-01', '2014-05-01', 2.74, 'Alpha Phi Omega\r\nComplete Capture\r\nVanderbuddies\r\nCafe Con Leche\r\nAmerican Red Cross Internship\r\nPREP\r\n\r\n');
INSERT INTO `education_data` VALUES (88, 'Vanderbilt University', 'Bachelor of Science', 'Psychology, Pre-medical', '', '2010-08-01', '2014-05-01', 2.8, 'National Merit Scholarship, Leadership Hall, Youth Encouragement Services, Minority Association of Pre-Health Students, Alpha Phi Omega ');
INSERT INTO `education_data` VALUES (89, 'Vanderbilt University', 'Bachelor of Arts', 'Biological Sciences, Economics', '', '2007-08-01', '2013-05-01', 2.006, '');
INSERT INTO `education_data` VALUES (90, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science, Spanish, Italian', '', '2008-08-01', '2012-05-01', 3.61, 'Alpha Phi Omega, Alternative Winter Break, Alternative Spring Break, Vanderbilt VIEW, Vanderbilt VISAGE Cost Rica, Vanderbilt PREP');
INSERT INTO `education_data` VALUES (91, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2011-08-01', '2014-05-01', 3.25, '');
INSERT INTO `education_data` VALUES (92, 'Vanderbilt University', 'Bachelor of Science', 'Child Studies, Pre-Med', '', '2011-08-01', '2015-05-01', 0, '');
INSERT INTO `education_data` VALUES (94, 'Vanderbilt University', 'Bachelor of Arts', 'Public Policy Studies', '', '2009-09-01', '2013-05-01', 3.86, 'Vanderbilt Undergraduate Advisory Board, Dean''s List, Alpha Phi Omega, Vanderbilt Off-Broadway, Vanderbilt Undergraduate Concert Choir, Alternative Spring Break, Alternative Summer Break, Vanderbilt Internship Experience in Washington D.C.');
INSERT INTO `education_data` VALUES (95, 'Vanderbilt University', 'Bachelor of Engineering', 'Civil & Environmental Engineering', '', '1990-01-01', '1990-01-01', 3.548, 'Dean''s List (Spring 2010, Fall 2011), Chi Epsilon Civil Engineering Honor Society');
INSERT INTO `education_data` VALUES (96, 'Vanderbilt University', 'Bachelor of Arts', 'Psychology', '', '2011-08-01', '2015-05-01', 3.821, 'Dean''s List, VOCE A Capella, APO, Habitat for Humanity, ACE Design Team');
INSERT INTO `education_data` VALUES (99, 'Vanderbilt University', 'Bachelor of Arts', 'Political Science, Studio Art', '', '2010-08-01', '2013-05-01', 3.287, 'Recipient of Provost award at Richmond the American International University in London. Received Spring 2010\r\n');
INSERT INTO `education_data` VALUES (101, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, General', '', '1990-01-01', '1990-01-01', 2.74, 'Alpha Phi Omega, Cafe Con Leche, PREP Program, Calling Center, Front Desk Reeve');
INSERT INTO `education_data` VALUES (103, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2010-08-01', '2014-05-01', 3.68, 'Dean''s List all semesters\r\nSigma Nu Fraternity\r\nVanderbilt Student Government- Peabody Council Member');
INSERT INTO `education_data` VALUES (105, 'Vanderbilt University', 'Bachelor of Arts', 'Economics/Chinese', '', '2011-08-01', '2013-08-01', 3.5, 'Alpha Phi Omega\r\nGlobal China Connection\r\nIntramural');
INSERT INTO `education_data` VALUES (106, 'University of Alabama', 'Bachelor of Science', 'Finance and Economics', '', '2010-08-01', '2014-05-01', 3.68, 'Dean''s List, University Honors College, Golden Key International Honour Society, Phi Eta Sigma National Honor Society, The National Society of Collegiate Scholars');
INSERT INTO `education_data` VALUES (113, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, HOD', '', '2011-08-01', '2015-05-01', 0, 'Vanderbilt Dodecaphonics, Mosaic');
INSERT INTO `education_data` VALUES (102, 'Vanderbilt University', 'Bachelor of Arts', 'English; Financial Economics; Corporate Strategy', '', '1990-01-01', '1990-01-01', 3.64, 'Dean''s List');
INSERT INTO `education_data` VALUES (108, 'Duke University', 'Associate', 'Information Technology', '', '2019-12-01', '1990-01-01', 1.2, 'FRAT');
INSERT INTO `education_data` VALUES (109, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Corporate Strategy, French', '', '2010-08-01', '2014-05-01', 3.38, 'Dean''s List');
INSERT INTO `education_data` VALUES (30, 'Vanderbilt University', 'Bachelor of Science', 'Human Organizational Development', 'Managerial Studies: Corporate Strategy', '2010-08-01', '2012-05-01', 3, '');
INSERT INTO `education_data` VALUES (116, '', 'Bachelor of Arts', 'Communication Studies, Italian', '', '2011-08-01', '2014-05-01', 3.5, 'Member of Kappa Kappa Gamma');
INSERT INTO `education_data` VALUES (118, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development; Economics', '', '2010-08-01', '2014-05-01', 3.52, 'Dean''s List, Phi Sigma Pi National Honor Fraternity, Vanderbilt Club Hockey, Young Americans for Liberty.');
INSERT INTO `education_data` VALUES (119, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2011-08-01', '2012-02-01', 3.55, 'Dean''s List');
INSERT INTO `education_data` VALUES (120, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development, Corporate Strategy', '', '2010-08-01', '2014-05-01', 3.88, '');
INSERT INTO `education_data` VALUES (121, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science & Philosophy', '', '2011-08-01', '2014-05-01', 3.7, 'Vanderbilt Mobile Applications Team\r\nVanderbilt Model United Nations\r\nCTO of Solution Pack Nonprofit Organization\r\nServer Administrator for Dept. of Chemical Engineering');
INSERT INTO `education_data` VALUES (123, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '2010-08-01', '2014-05-01', 2.9, '');
INSERT INTO `education_data` VALUES (124, 'Vanderbilt University', 'Bachelor of Science', 'ajifo', '', '1990-12-01', '1990-01-01', 3.2, 'aijdsf');
INSERT INTO `education_data` VALUES (126, 'Vanderbilt University', 'Bachelor of Science', 'Human & Organizational Development', '', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (127, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '1993-08-01', '1997-05-01', 3.85, 'Dean''s List, National Merit Scholarship');
INSERT INTO `education_data` VALUES (131, 'Vanderbilt University', 'Bachelor of Science', 'Human and Organizational Development', '', '2010-08-01', '2014-05-01', 3.3, 'Dean''s List Sophomore Fall');
INSERT INTO `education_data` VALUES (133, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Corporate Strategy Minor', '', '2010-09-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (135, 'University of Tennessee Knoxville', 'Bachelor of Arts', 'Finance', '', '2010-08-01', '2014-05-01', 3.4, 'Dean''s List');
INSERT INTO `education_data` VALUES (136, 'Vanderbilt University', 'Bachelor of Arts', 'Communication Studies', '', '2008-08-01', '2012-05-01', 0, '');
INSERT INTO `education_data` VALUES (139, 'Vanderbilt University', 'Bachelor of Arts', 'Medicine', '', '2009-08-01', '2012-12-01', 3.5, 'Dean''s List');
INSERT INTO `education_data` VALUES (141, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '2011-08-01', '2015-05-01', 0, '');
INSERT INTO `education_data` VALUES (142, 'Vanderbilt University', 'Bachelor of Science', 'Molecular and Cellular Biology', 'Corporate Strategy, Leadership and Organization', '2010-08-01', '2014-05-01', 3.2, '');
INSERT INTO `education_data` VALUES (144, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Managerial Studies', '', '2011-08-01', '2014-05-01', 0, 'â€¢Phi Eta Sigma Honor Society for Freshmen (Tulane, 2010-2011)\r\nâ€¢Alpha Lamba Delta National Honor Society (Tulane, 2010-2011)\r\nâ€¢National Honors Society (9th â€“ 12th Grade)\r\nâ€¢Honor Roll (9th  - 12th Grade)\r\n');
INSERT INTO `education_data` VALUES (145, 'Vanderbilt University', 'Bachelor of Engineering', 'Computer Science, Math', '', '2010-08-01', '2014-05-01', 3.22, '');
INSERT INTO `education_data` VALUES (146, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering, Engineering Management', '', '2008-08-01', '2012-05-01', 2.875, 'National Merit Scholar');
INSERT INTO `education_data` VALUES (147, 'Vanderbilt University', 'Bachelor of Arts', 'Human and Organizational Development', '', '2010-08-01', '2014-05-01', 3.79, 'Dean''s List');
INSERT INTO `education_data` VALUES (148, 'University of Virginia', 'Bachelor of Engineering', 'Systems Engineering', '', '2010-09-01', '2014-05-01', 3, '');
INSERT INTO `education_data` VALUES (149, 'Vanderbilt University', 'Bachelor of Arts', 'Philosophy', '', '2010-08-01', '2014-05-01', 3.77, 'Dean''s List');
INSERT INTO `education_data` VALUES (151, 'Vanderbilt University', 'Bachelor of Engineering', 'Electrical Engineering', '', '2011-08-01', '2015-05-01', 3.67, 'Dean''s List');
INSERT INTO `education_data` VALUES (152, 'Vanderbilt University', 'Bachelor of Arts', 'Marketing, Chinese', '', '2010-08-01', '2014-05-01', 3.6, 'Dean''s List');
INSERT INTO `education_data` VALUES (154, 'Vanderbilt University', 'Bachelor of Science', 'Elementary Education, Math & Science Studies', '', '2007-08-01', '2011-12-01', 0, '');
INSERT INTO `education_data` VALUES (157, 'Vanderbilt University', 'Bachelor of Arts', 'Economics, Corporate Strategy, Art History', '', '2010-08-01', '2014-05-01', 3.8, 'Dean''s List;\r\nAlpha Lambda Delta Honorary Society;\r\nPhi Eta Sigma Honorary Society\r\n\r\n');
INSERT INTO `education_data` VALUES (159, 'Vanderbilt University', 'Bachelor of Engineering', 'Mechanical Engineering', '', '2010-08-01', '2015-05-01', 0, '');
INSERT INTO `education_data` VALUES (162, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science, Mathematics', '', '2010-08-01', '2013-05-01', 3.12, '');
INSERT INTO `education_data` VALUES (9, 'Vanderbilt University', 'Bachelor of Science', 'Computer Science, Math', 'Theatre', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (164, 'Shanghai University', 'Bachelor of Engineering', 'Electrical Engineering', '', '1990-01-01', '1990-01-01', 0, '');
INSERT INTO `education_data` VALUES (165, 'Vanderbilt University', 'Bachelor of Arts', 'ji', '', '1990-01-01', '1990-01-01', 0, 'fin');
INSERT INTO `education_data` VALUES (170, 'Vanderbilt University', 'Bachelor of Arts', 'Huh?', '', '1990-01-01', '1990-01-01', 0, '');
INSERT INTO `education_data` VALUES (171, 'Vanderbilt University', 'Bachelor of Arts', 'Psychology, Corporate Strategy', '', '2010-08-01', '2014-04-01', 3.37, '');
INSERT INTO `education_data` VALUES (178, 'University of California at Berkeley', 'Bachelor of Arts', 'Immunology and Pathogenesis, French', '', '2010-08-01', '2014-05-01', 3.26, '');
INSERT INTO `education_data` VALUES (179, 'University of Virginia', 'Bachelor of Nursing', 'nursing', '', '2010-08-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (180, 'Vanderbilt University', 'Bachelor of Arts', 'Economics', '', '2010-09-01', '2014-05-01', 3.87, 'Dean''s List');
INSERT INTO `education_data` VALUES (186, 'Brigham Young University', 'Bachelor of Arts', 'Chinese', '', '2001-08-01', '2007-05-01', 0, 'all of them');
INSERT INTO `education_data` VALUES (182, 'Vanderbilt University', 'Bachelor of Arts', 'Psychology', '', '2011-08-01', '2015-05-01', 3.92, 'Dean''s List ');
INSERT INTO `education_data` VALUES (183, 'Milwaukee School of Engineering', 'Bachelor of Science', 'BioMolecular Engineering', '', '2010-09-01', '2014-05-01', 0, '');
INSERT INTO `education_data` VALUES (184, 'Sewanee: The University of the South', 'Bachelor of Arts', 'Philosophy, Political Science', '', '2010-08-01', '2012-08-01', 3.2, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `education_general`
-- 

CREATE TABLE `education_general` (
  `college` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY  (`college`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `education_general`
-- 

INSERT INTO `education_general` VALUES ('Vanderbilt University', 'Nashville', 'TN');
INSERT INTO `education_general` VALUES ('Duke University', 'Durham', 'NC');
INSERT INTO `education_general` VALUES ('University of Notre Dame', 'Notre Dame', 'IN');
INSERT INTO `education_general` VALUES ('Northwestern University', 'Evanston', 'IL');
INSERT INTO `education_general` VALUES ('University of Chicago', 'Chicago', 'IL');
INSERT INTO `education_general` VALUES ('University of North Carolina', 'Chapel Hill', 'NC');
INSERT INTO `education_general` VALUES ('Washington University', 'St. Louis', 'MO');
INSERT INTO `education_general` VALUES ('University of Virginia', 'Charlottesville', 'VA');
INSERT INTO `education_general` VALUES ('University of Alabama', 'Tuscaloosa', 'AL');

-- --------------------------------------------------------

-- 
-- Table structure for table `friends`
-- 

CREATE TABLE `friends` (
  `r_id` int(255) NOT NULL auto_increment,
  `from_id` int(255) NOT NULL,
  `to_id` int(255) NOT NULL,
  `friends_since` date NOT NULL,
  PRIMARY KEY  (`r_id`),
  UNIQUE KEY `iddifferent` (`from_id`,`to_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `friends`
-- 

INSERT INTO `friends` VALUES (4, 5, 23, '0000-00-00');
INSERT INTO `friends` VALUES (2, 5, 20, '0000-00-00');
INSERT INTO `friends` VALUES (3, 5, 27, '0000-00-00');
INSERT INTO `friends` VALUES (5, 5, 29, '0000-00-00');
INSERT INTO `friends` VALUES (6, 5, 13, '0000-00-00');
INSERT INTO `friends` VALUES (7, 5, 9, '0000-00-00');
INSERT INTO `friends` VALUES (8, 5, 30, '0000-00-00');
INSERT INTO `friends` VALUES (9, 5, 35, '2012-01-22');
INSERT INTO `friends` VALUES (10, 70, 7, '2012-01-30');
INSERT INTO `friends` VALUES (11, 27, 5, '2012-07-01');

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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

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
  `nid` int(255) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `is_read` tinyint(1) NOT NULL default '0',
  `type` varchar(255) NOT NULL,
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `personnel_email`
-- 

INSERT INTO `personnel_email` VALUES (5, 'what is up', 'yo what is up sonn', 2, 5, '2012-01-02 00:00:00', 0);
INSERT INTO `personnel_email` VALUES (1, 'who', 'ahgidson isdfa p', 3, 5, '2012-01-03 01:07:29', 0);
INSERT INTO `personnel_email` VALUES (6, 'hey', 'wow', 20, 5, '2012-01-05 16:13:31', 0);
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
INSERT INTO `personnel_email` VALUES (30, 'Professional Archives ', 'I just added you as my friend, but I think we should talk a little more before we actually become friends. ', 27, 5, '2012-07-01 22:28:12', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `privacy`
-- 

CREATE TABLE `privacy` (
  `idnum` int(255) NOT NULL,
  `notification` char(2) NOT NULL default 'ET',
  `gpa` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`idnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `privacy`
-- 

INSERT INTO `privacy` VALUES (27, 'DE', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `requests`
-- 

CREATE TABLE `requests` (
  `mid` int(255) NOT NULL,
  `subject` varchar(1024) NOT NULL,
  `body` varchar(4096) NOT NULL,
  `time` datetime default NULL,
  `from_bid` int(255) NOT NULL,
  `to_id` int(255) NOT NULL,
  `time_sent` datetime NOT NULL,
  `priority` int(3) NOT NULL default '1',
  `is_read` int(1) NOT NULL default '0',
  PRIMARY KEY  (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `requests`
-- 


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
  PRIMARY KEY  (`idnum`)
) ENGINE=MyISAM AUTO_INCREMENT=187 DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (5, 'jjin3298@yahoo.com', 'asdfjkl;', 'Nanhua', 'Jin', '/images/5.jpg', '', 'Computer Science', 'Nashotah', 'WI', 'United States', 30000, 0, 'Employed', 'HTML, CSS, JavaScript, Java');
INSERT INTO `users` VALUES (13, 'lmathson@sbcglobal.net', 'channel37', 'Leslie', 'Mathson', NULL, '', 'Electrical Engineer', 'Brookfield', 'WI', 'United States', 50000, 0, 'Searching for Internship', 'Audio-video systems, telecom and fiber networks, RF and 2-way radio applications and practices.');
INSERT INTO `users` VALUES (23, 'vankegel@yahoo.com', 'kitty123', 'Van', 'Kegel', NULL, '', '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (20, 'collin.h.grimes@vanderbilt.edu', 'Wolfpack17', 'Collin', 'Grimes', '/images/20.jpg', '', 'Mechanical Engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (27, 'alex_smith_2010@hotmail.com', 'stx2010', 'Alex', 'Smith', '/images/27.jpg', '', '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (9, 'seth.n.friedma@vanderbilt.edu', 'snf@123', 'Seth', 'Friedman', '/images/9.jpeg', '', 'Computer Science', 'Pensacola', 'FL', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (29, 'tszurcher@gmail.com', '8torn3zZ', 'Taylor', 'Zurcher', NULL, '', 'Civil Engineering ', 'Nashville', 'SC', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (30, 'christina.c.chapman@vanderbilt.edu', 'Verizon_91', 'Christina', 'Chapman', '/images/30.jpeg', '', 'Human Organizational Development and Corporate Strategy', 'Nashville', 'Tn', 'United States', 0, 0, 'Employed', 'Microsoft Excel, FishBowl Inventory');
INSERT INTO `users` VALUES (167, 'david.m.dipanfilo@vanderbilt.edu', 'Fightforit3', 'David', 'DiPanfilo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (31, 'van.p.kegel@vanderbilt.edu', 'kitty123', 'Van', 'Kegel', '/images/31.jpg', NULL, 'Mechanical Engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (32, 'robert.a.cannell@vanderbilt.edu', 'Smokey112591', 'Robert', 'Cannell', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (33, 'jessie.lambing@vanderbilt.edu', 'ellise13', 'Jessie', 'Lambing', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (34, 'Blake.a.thompson@vanderbilt.edu', 'bathompson', 'Blake', 'Thompson', NULL, NULL, '', '', '', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (35, 'andrew.g.hamilton@vanderbilt.edu', 'passive8', 'Drew', 'Hamilton', '/images/35.jpg', NULL, 'Computer engineering', 'Chicago', 'Illinois', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (36, 'abigail.b.shuster@Vanderbilt.edu', 'sebago', 'Abby', 'Shuster', '/images/36.JPG', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (37, 'stuart.m.dickerson@gmail.com', '2319mQVS', 'Stuart', 'Dickerson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (38, 'trevor.k.tait@vanderbilt.edu', 'Hello123', 'Trevor', 'Tait', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (39, 'sean.k.murphy@vanderbilt.edu', 'Ovechkin8', 'sean', 'murphy', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (40, 'kileigh.a.barringer@vanderbilt.edu', 'twig16', 'Kileigh', 'Barringer', '/images/40.jpg', NULL, 'Communications/Public Relations', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (41, 'tyler.brock@gmail.com', 'test', 'Tyler', 'Brock', '/images/41.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (42, 'Kornsuwann@hotmail.com', 'student1', 'Nutcha', 'Kornsuwan', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (43, 'john.l.ormerod@vanderbilt.edu', 'c071787*', 'Logan', 'Ormerod', '/images/43.jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (44, 'zach.blume@vanderbilt.edu', 'mitzvah1!', 'Zach', 'Blume', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (45, 'graham.b.gaylor@vanderbilt.edu', 'ccjxhq00', 'Graham', 'Gaylor', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (46, 'margaret.m.mccain@vanderbilt.edu', 'trevor248', 'Margaret', 'McCain', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (47, 'arjun.pillai10@gmail.com', 'iMAB321', 'Arjun', 'Pillai', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (48, 'np3543@lyon.edu', 'jonathan', 'Nathaniel', 'Pyle', '/images/48.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (49, 'kleinbd20@uww.edu', 'byjtfv20', 'Brian', 'Klein', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (50, 'zhening.luo@vanderbilt.edu', '6sideddice', 'Zhening', 'Luo', '/images/50.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (51, 'jdelehey@gmail.com', 'redhed', 'Jack', 'Delehey', '/images/51.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (52, 'copelandra@gmail.com', 'abigail1', 'Rebecca', 'Copeland', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (53, 'garrett.k.nondorf@vanderbilt.edu', 'xyz123', 'Garrett', 'Nondorf', '/images/53.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (54, 'mia.m.cleary@vanderbilt.edu', 'Mmc021092', 'Mia', 'Cleary', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (55, 'isabel.t.ross@vanderbilt.edu', 'Itr171866', 'Isabel', 'Ross', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (56, 'alxdavol@gmail.com', 'waffles89', 'alexa', 'chapman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (57, 'kate.s.trotter@vanderbilt.edu', 'iluvmen', 'Kate', 'Trotter', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (58, 'matthew.r.damstrom@vanderbilt.edu', 'Md5648564', 'Matt', 'Damstrom', '/images/58.jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (59, 'johndjgregg@gmail.com', '25gfup6d', 'John David', 'Gregg', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (60, 'mary.m.scott@vanderbilt.edu', 'mittens92', 'Mary Morgan', 'Scott', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (62, 'gabriella.e.dicarlo@vanderbilt.edu', 'bella90', 'Gabriella', 'DiCarlo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (63, 'ckay8971@gmail.com', 'pacsrock', 'Caroline', 'Kay', '/images/63.Jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (64, 'henry.t.roberts@vanderbilt.edu', '3Threes', 'Henry', 'Roberts', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (65, 'daniel.e.pereira@vanderbilt.edu', 'paperplate', 'Daniel', 'Pereira', '/images/65.', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (66, 'savannah.l.pidcock@vanderbilt.edu', 'loveylovey', 'Savannah', 'Pidcock', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (7, 'jinw91@sbcglobal.net', 'asdfjkl;', 'Nanhua', 'Jin', '/images/7.jpg', NULL, 'Computer Science', 'Brookfield', 'Wisconsin', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (67, 'tony.h.an@vanderbilt.edu', 'funfun31', 'Tony', 'An', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (68, 'tmerr3@aol.com', 'tweak', 'Tom ', 'Belikove', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (122, 'taylor.sean.zurcher@vanderbilt.edu', 'asdfjkl;', 'Taylor', 'Zurcher', '/images/122.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (70, 'hirak.pati@vanderbilt.edu', 'gogol18?', 'Hirak', 'Pati', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (71, 'Theodore.p.swift@vanderbilt.edu', 'canada1', 'Teddy', 'Swift', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (72, 'jacobbumpus@gmail.com', 'jmb^proarcs^127', 'Jake', 'B', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (73, 'abbaggott@gmail.com', 'UTvols123', 'Allyson', 'Baggott', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (74, 'anurag.bose@vanderbilt.edu', 'kittu91a', 'Anurag', 'Bose', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (75, 'kristen.l.sheft@vanderbilt.edu', 'Cricketkls$4', 'Kristen', 'Sheft', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (123, 'jlow@gmail.com', 'asdfjkl;', 'John', 'Lowe', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (78, 'octavio.d.roscioli@vanderbilt.edu', 'octavio', 'Octavio', 'Roscioli', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (79, 'brian.s.walsh@vanderbilt.edu', 'cowboys09', 'Brian', 'Walsh', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (80, 'Scott.j.kudialis@vanderbilt.edu', 'baerdae', 'Scott', 'Kudialis', '/images/80.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (81, 'Temitope.o.obanla@vanderbilt.edu', 'Temitope@931', 'Temitope ', 'Obanla', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (82, 'david.r.mendel@vanderbilt.edu', 'bentley', 'David', 'Mendel', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (83, 'elizabeth.c.hill@vanderbilt.edu', 'Doggie721', 'Elizabeth', 'Hill', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (84, 'samantha.a.munoz@vanderbilt.edu', 'purple49', 'Samantha', 'Munoz', '', NULL, 'biomedical engineering', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', 'basic laboratory skills, some Matlab and mathematica programming skills, ');
INSERT INTO `users` VALUES (85, 'parker.h.bossier@vanderbilt.edu', 'parkdude', 'Parker', 'Bossier', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (86, 'Jessica.e.pawlarczyk@vanderbilt.edu', 'Usa6142013', 'Jessica', 'Pawlarczyk', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (87, 'Katherine.d.booker@vanderbilt.edu', 'TLC4ever', 'Katherine', 'Booker', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (88, 'gabrielle.m.brown@vanderbilt.edu', 'meant4so', 'Gabrielle', 'Brown', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (89, 'g.wakefield@vanderbilt.edu', 'GNRUvBXET6i0lPb7', 'Gerald', 'Wakefield', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (90, 'courtney.j.marshall@gmail.com', '820595cm!', 'Courtney', 'Marshall', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (91, 'sivagami.suppiah@vanderbilt.edu', 'adhitya1', 'Sivu', 'Suppiah', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (92, 'madhu.govind@vanderbilt.edu', 'natyam8', 'Madhu', 'Govind', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (93, 'lusi.zheng@vanderbilt.edu', 'whisper', 'Lusi', 'Zheng', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (94, 'tessa.c.chillemi@vanderbilt.edu', 'treasure*13', 'Tessa', 'Chillemi', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (95, 'katherine.s.lopez@vanderbilt.edu', '5340Lawn', 'Katie', 'Lopez', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (96, 'julia.q.zhu93@gmail.com', 'jz19930816', 'Julia', 'Zhu', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (97, 'kelsey.d.dreier@vanderbilt.edu', 'gizmo@77', 'Kelsey', 'Dreier', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (98, 'megan.a.humburg@vanderbilt.edu', 'shmoes77', 'Megan', 'Humburg', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (99, 'ariela.m.atwell@vanderbilt.edu', '11ariela!', 'Ariela', 'Atwell', '/images/99.jpg', NULL, 'Political Science, Fine Arts, Studio Arts', '', '', 'United States', 0, 0, 'Searching for Internship', '\r\nI am currently enrolled as an active student at Vanderbilt University, but I transferred to Vanderbilt my Sophomore year after having attended Richmond the American International University in London. I am well versed in English, Spanish, and a small bit of French. Both my Job experience and international background make me a top candidate for positions that involve good communication skills, interactions with strangers, and maintaining composure in high pressure situations. My past job experience has also equip me with skills in \r\nthe understanding of both MAC and Windows. I have become very skilled in the areas of Apple Final Cut Pro, Color, MS Word, Access, Excel, PowerPoint and the Adobe Creative Suite. As the current Curator of the Vanderbilt Fine Arts Student Gallery, I have been given the opportunity to retain such a huge responsibility, which has undoubtedly given me the and experience and ability to know how to utilize and optimize my organizational and time management skills. I am highly determined and very driven, especially when I see my hard work as a major opportunity in mapping out my future. ');
INSERT INTO `users` VALUES (100, 'emaurice1@gmail.com', 'coolfool1', 'Etienne', 'Maurice', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (101, 'tariq.k.simpkins@vanderbilt.edu', 'cloudnine29', 'Tariq', 'Simpkins', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (102, 'Andrew.p.samuels@vanderbilt.edu', 'w43mfaqR', 'Andrew', 'Samuels', NULL, NULL, 'English; Financial Economics; Corporate Strategy', 'Oak Park', 'Il', 'United States', 0, 0, 'Searching for Internship', 'Microsoft Excel\r\nPowerPoint');
INSERT INTO `users` VALUES (103, 'ian.bellah@vanderbilt.edu', 'sapp88', 'Ian', 'Bellah', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (104, 'Vincent.casha@gmail.com', 'Belmont17', 'Vincent', 'Casha', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (105, 'nathaniel.r.cameron@vanderbilt.edu', 'SPArta1414', 'Nathaniel', 'Cameron', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (106, 'michaelgis@comcast.net', 'yanks21', 'Michael', 'Gibson', NULL, NULL, '', 'Nashville', 'TN', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (107, 'ojharris@crimson.ua.edu', 'jordan1992', 'Jordan', 'Harris', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (108, 'b7755599@nwldx.com', 'jimmydeluxe69', 'Jimmy', 'Luo', '/images/108.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (109, 'hannah.j.kim@vanderbilt.edu', 'needs9ismylove', 'Hannah', 'Kim', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (110, 'lucy.meadors@uky.edu', 'reesew', 'lucy', 'meadors', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (111, 'kevin.p.jaeger@vanderbilt.edu', 'sniperrifle', 'Kevin', 'Jaeger', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (112, 'amber.n.strohauer@vanderbilt.edu', 'si2014', 'Amber', 'Strohauer', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (113, 'gregory.m.resnick@vanderbilt.edu', 'gresnick', 'Gregory', 'Resnick', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (114, 'Laureneperlman@gmail.com', 'Lauren09', 'Lauren', 'Perlman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (115, 'jbell@gmail.com', 'jbell', 'John', 'Bell', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (116, 'tkimbrell@smu.edu', 'tshea1012', 'Terah', 'Kimbrell', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (117, 'wellsjohnston@gmail.com', '1346Wellsjo', 'wells', 'johnston', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (118, 'michael.a.gangemi@vanderbilt.edu', 'proarcs', 'Michael', 'Gangemi', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (119, 'sean.c.bartlett@vanderbilt.edu', 'bartlett92', 'Sean', 'Bartlett', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (120, 'clare.c.healy@vanderbilt.edu', 'cch219jezebel', 'Clare', 'Healy', '/images/120.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (121, 'matthew.m.eller@vanderbilt.edu', 'Mev1sw3dsm', 'Matthew', 'Eller', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (124, 'aifn', 'aisndf', 'hfai', 'ainfo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (125, 'nutbuster@gmail.com', 'terran', 'bigmama', 'fatsack', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (126, 'julia.m.peredo@vanderbilt.edu', 'aaaaa', 'Julia', 'Peredo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (127, 'george.washington@vanderbilt.edu', 'asdfjkl;', 'George', 'Washington', '/images/127.jpg', NULL, '', '', '', 'United States', 0, 0, 'Searching for Internship', 'Microsoft Excel, Farming, C++, Public Speaking');
INSERT INTO `users` VALUES (128, 'skylordsbh@aol.com', 'cocky007', 'Skyler', 'Hutto', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (129, 'isak.kurbasic@trincoll.edu', 'breast92', 'Isak', 'Kurbasic', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (130, 'kenneth.a.mahung@vanderbilt.edu', 'thenry14', 'JR', 'Mahung', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (131, 'dylan.s.tracy@vanderbilt.edu', 'tracidee219', 'Dylan', 'Tracy', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (132, 'a.rog33@gmail.com', 'kisses27', 'Alexandra', 'Rogers', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (133, 'cam@camelbackmusic.com', 'cameron1', 'Cameron', 'Mullen', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (134, 'zksherm@gmail.com', 'test', 'Zach', 'Sherman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (135, 'kevinryan389@yahoo.com', 'speckers123', 'Kevin', 'Ryan', '/images/135.jpeg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (136, 'candace.l.barbour@vanderbilt.edu', 'candilb17', 'Candace', 'Barbour', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (137, 'SLS0029@auburn.edu', 'kenny016', 'Shelby', 'Smith', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (138, 'Catherine.l.frediani@vanderbilt.edu', 'E3VUCP3S', 'Catherine', 'Frediani', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (139, 'salem.a.vanderstel@vanderbilt.edu', 'Epiphone19', 'Salem', 'VanderStel', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (140, 'James.a.varlan@vanderbilt.edu', 'Knox1990', 'James', 'Varlan', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (141, 'elliot.w.huck@vanderbilt.edu', 'e23huck', 'Elliot', 'Huck', '/images/141.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (142, 'grace.c.randazzo@vanderbilt.edu', 'noodsaur19', 'Grace', 'Randazzo', NULL, NULL, 'Biology, Business', 'Franktown', 'CO', 'United States', 0, 0, 'Searching for Internship', 'Photoshop,\r\nMicrosoft Excel and Word,\r\niWork (Pages, Keynote, Numbers)\r\n');
INSERT INTO `users` VALUES (143, 'nicolette.v.siringo@vanderbilt.edu', 'abc123', 'Nicolette', 'Siringo', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (144, 'mrowe.ar@gmail.com', 'schmooze', 'Amanda', 'Rowe', '/images/144.jpg', NULL, '', 'Coronado', 'CA', 'United States', 0, 0, 'Searching for Internship', 'â€¢	Licensed to work all Microsoft Programs\r\nâ€¢	Taken Principles of Real Estate and Property Management classes\r\nâ€¢	Experienced with QuickBooks Accounting Program\r\nâ€¢	Always well organized and good customer service skills\r\n');
INSERT INTO `users` VALUES (145, 'graham.gaylor@gmail.com', 'muiyxn32', 'Graham', 'Gaylor', '', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (146, 'alexander.g.yurevitch@vanderbilt.edu', 'corvettekid428', 'Alexander', 'Yurevitch', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (147, 'kristina.j.murray@vanderbilt.edu', 'DOORCO9', 'Kristina', 'Murray', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (148, 'ecs4pv@virginia.edu', 'calripken', 'Carson', 'Stettinius', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (149, 'farmerlax@gmail.com', 'xxbbql4y-', 'Arthur', 'Farmer', NULL, NULL, '', 'Springfield', 'VA', 'United States', 0, 1, 'Searching for Internship', 'Microsoft Office');
INSERT INTO `users` VALUES (150, 'courtney.s.hulse@vanderbilt.edu', 'vanderbilt', 'Courtney', 'Hulse', '/images/150.jpg', NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (151, 'john.m.boyd@vanderbilt.edu', '12WiCfIaTg12', 'John', 'Boyd', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (152, 'alexandra.b.burke@vanderbilt.edu', 'lucy0330', 'Alexandra', 'Burke', NULL, NULL, 'Marketing, Advertising, Public Relations', '', '', 'United States', 0, 0, 'Searching for Internship', 'Proficient in Mandarin Chinese, speaking, reading, writing. \r\nProficient with MS Word, Excel, Powerpoint, and online survey tools. \r\nBasic Programming capabilities with Matlab, Lisp, Easy-C\r\n');
INSERT INTO `users` VALUES (153, 'emmacarpenter884@yahoo.com', 'lion', 'Emma', 'Carpenter', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (154, 'csandfly@hotmail.com', 'palabra', 'Carrie', 'Sanders', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (155, 'buckniggz@fuckyou.xxx', 'pussypoppin', 'NiggaMama', 'GrapeDrink', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (156, 'samantha.p.orland@vanderbilt.edu', 'samantha972', 'Samantha', 'Orland', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (157, 'john.b.ratliff@vanderbilt.edu', 'Thunderup2', 'John', 'Ratliff', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (159, 'andrew.r.bridges@vanderbilt.edu', 'fourenine', 'Andrew', 'Bridges', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (160, 'Wisconsin@wisconsin.com', 'qwerty', 'Nanhua', 'Jin', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (172, 'cynthia.b.paschal@vanderbilt.edu', '1234asdf', 'Cynthia', 'Paschal', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (162, 'andrew.lum@Vanderbilt.Edu', 'NanhuaJin1', 'Andrew', 'Lum', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (164, 'jinyaohua@sbcglobal.net', 'kyy504', 'Yaohua', 'Jin', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (165, 'jdoe2@hotmail.com', 'jdoe2', 'John', 'Doe', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (166, 'Csande29@utk.edu', 'cara2836', 'Cara', 'Sanders', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (168, 'joe@pinpointprofiles.net', 'Newpath11', 'Joe', 'Thompson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (169, 'alex.b.meadow@vanderbilt.edu', 'meadow72', 'Alex', 'Meadow', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (170, 'jjfurson@yahoo.com', 'yahoo', 'Tanika', 'Jefferson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (171, 'kevin.j.jaburek@vanderbilt.edu', 'K-jab2010', 'Kevin', 'Jaburek', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (183, 'mikulskib@msoe.edu', '10030gms', 'Brandon', 'Mikulski', NULL, NULL, '', 'Greenfield ', 'WI', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (174, '595676587@qq.com', 'b6546a', 'qunxian', 'li', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (175, 'Ktolman@fau.edu', 'Ket72299', 'Katie', 'Tolman', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (176, 'faithlobelson@yahoo.com', 'mmkayy2', 'Faith', 'Lobelson', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (177, 'rui.jiang@vanderbilt.edu', 'Whysoserious64', 'Rui', 'Jiang', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (178, 'aeggillespie@gmail.com', 'Abbyspie4', 'Abigail', 'Gillespie', NULL, NULL, 'Biology', 'Berkeley', 'CA', 'United States', 0, 0, 'Searching for Internship', 'Possess basic laboratory techniques after four semesters of lab experience in general chemistry, organic chemistry, and general biology; experienced with Photoshop and Microsoft Excel');
INSERT INTO `users` VALUES (179, 'cck3af@virginia.edu', 'pacsrock', '', '', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (180, 'patrick.m.healy@vanderbilt.edu', 'Patrick2', 'Patrick ', 'Healy', NULL, NULL, 'Finance ', 'Nashville ', 'TN', 'United States', 0, 0, 'Searching for Internship', 'Some experience with Microsoft Excel and Bloomberg Terminal');
INSERT INTO `users` VALUES (186, 'devin@epic.com', 'cat', 'Devin', 'Soelberg', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (182, 'bo.y.ihn@vanderbilt.edu', 'bo070193', 'Bo Yeon', 'Ihn', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (184, 'kelleev0@sewanee.edu', 'tigercheer123', 'Erin', 'Kelley', NULL, NULL, '', '', '', 'United States', 0, 0, 'Searching for Internship', '');
INSERT INTO `users` VALUES (185, 'mayur.kmt@gmail.com', 'Drag0nBa1l', 'Mayur', 'Kamat', NULL, NULL, '', '', '', '', 0, 0, 'Searching for Internship', '');

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
  `title` varchar(255) character set utf8 NOT NULL,
  `company_start` date NOT NULL,
  `company_end` date NOT NULL,
  `present` tinyint(1) NOT NULL default '0',
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `achievement` mediumtext NOT NULL,
  PRIMARY KEY  (`w_id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

-- 
-- Dumping data for table `work_data`
-- 

INSERT INTO `work_data` VALUES (8, 69, 'Jump', 'High', '1990-01-01', '2010-01-01', 0, '', '', 'None');
INSERT INTO `work_data` VALUES (7, 5, 'Quality Manufacturing Systems Inc.', 'Software Engineer', '2011-05-01', '2011-08-01', 0, 'Nashville', 'TN', 'Direct printer communication with Kyocera, Intermec and Datamax printers.\r\nFinished multiple maintenance programs for the software installed on a new site.');
INSERT INTO `work_data` VALUES (9, 69, 'Adidas', 'Salesman', '1997-01-01', '1998-10-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (6, 5, 'Wisconsin State Fair', 'Impark', '2010-08-01', '2010-08-01', 0, 'Milwaukee', 'WI', 'Directed 20 cars.');
INSERT INTO `work_data` VALUES (10, 69, 'jisof', 'asdonf', '2010-09-01', '2010-10-01', 0, '', '', 'asdf');
INSERT INTO `work_data` VALUES (11, 69, 'afojs', 'asiofj', '1990-04-01', '2010-09-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (12, 69, 'aoifh', 'qifnsio', '2000-01-01', '2000-02-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (14, 30, 'Kimberly McDonald', 'Designer and Assistant to CEO', '2010-01-01', '1990-01-01', 1, '', '', 'January of 2010 to Present');
INSERT INTO `work_data` VALUES (38, 5, 'Sieve Networks', 'Programmer Intern', '2009-01-01', '2009-06-01', 0, 'Wauwatosa', 'WI', 'Troubleshoot network security.\r\nProgrammed software pertaining to phone security.\r\nCollected data using TShark and performed data analysis on phone calls.');
INSERT INTO `work_data` VALUES (36, 30, 'Co-Founder of Professional Archives', 'Design', '2011-12-01', '2012-02-01', 0, 'Nashville', 'Tn', '');
INSERT INTO `work_data` VALUES (17, 80, 'Quicken Loans', 'Intern', '2011-07-01', '2011-08-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (18, 82, '', '', '1990-01-01', '1990-01-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (19, 83, 'The Dockside', 'Server', '2011-05-01', '2011-08-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (20, 85, 'PlanJar', 'Co-Founder/Software Architect', '2011-02-01', '2012-01-01', 0, '', '', '400+ registered users, 3 months from line 1 to completion');
INSERT INTO `work_data` VALUES (21, 87, 'Sodexo Sports and Leisure', 'Supervisor', '2011-01-01', '2014-12-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (22, 87, 'Sodexo Sports and Leisure', 'Supervisor', '2011-01-01', '2014-12-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (23, 87, 'Sodexo Sports and Leisure', 'Supervisor', '2011-01-01', '2014-12-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (24, 91, 'Kumon, Inc. ', 'Upper Level Math Teacher', '2008-08-01', '2011-06-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (25, 94, 'American Red Cross', 'Government Relations Intern', '2011-06-01', '2011-07-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (26, 99, 'Tennessee Democratic Party ', 'Field Canvasser', '2011-05-01', '2011-08-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (27, 99, 'Separation Systems', 'Junior Assistant to the VP of International Business Development', '2009-05-01', '2009-08-01', 0, 'Gulf Breeze', 'FL', '');
INSERT INTO `work_data` VALUES (28, 99, 'Vanderbilt Fine Arts Department', 'Curator of the Student Gallery', '2011-12-01', '1990-01-01', 1, 'Nashville', 'TN', '');
INSERT INTO `work_data` VALUES (29, 99, 'Vanderbilt Fine Arts Department', 'Student worker and assitant to building manager', '2011-08-01', '1990-01-01', 1, 'Nashville', 'TN', '');
INSERT INTO `work_data` VALUES (30, 103, 'The First Tee Organization', 'Coach/Volunteer', '2003-01-01', '2011-08-01', 0, '', '', 'Ace Certification\r\nWalmart First Tee Open at Pebble Beach (2 years)\r\nFuture Leaders Forum\r\nLifeskill''s Leadership Academies');
INSERT INTO `work_data` VALUES (31, 31, 'Revolution Prep', 'Branch Manager, Southwest Region', '2011-04-01', '2011-08-01', 0, 'Louisville', 'KY', '');
INSERT INTO `work_data` VALUES (35, 108, 'Jimbo Sex Blog', 'Sexologist', '2019-01-01', '1990-01-01', 0, '', '', 'http://jimbosexadvice.wordpress.com/');
INSERT INTO `work_data` VALUES (33, 106, 'Yawn Sheffield Welch Wealth Management Group LLC', 'Investment Management Intern', '2011-06-01', '2011-08-01', 0, 'Nashville', 'TN', 'Worked alongside members of the group for a few hours a day three times a week examining clientsâ€™ portfolios\r\nResearched mutual funds, the stock and bond markets, and asset allocation in order to understand multiple investing strategies and techniques\r\nAttended a business seminar and met with several members in this field to gather information about different methods of investing');
INSERT INTO `work_data` VALUES (34, 102, 'Merrill Lynch', 'Global Wealth Management Intern', '2011-05-01', '2011-08-01', 0, 'Oak Brook', 'IL', 'Identified and monetized expiring annuities\r\n\r\nDeveloped and implemented a marketing plan to acquire new clientele within the medical field.\r\n\r\nCreated a database of prospective clients. \r\n\r\nCreated proforma''s for clients. \r\n\r\nConducted stock evaluations.\r\n');
INSERT INTO `work_data` VALUES (37, 5, 'Goldenstone Automation Co.', 'Computer Technician', '2007-09-01', '2010-12-01', 0, 'Milwaukee', 'WI', 'Troubleshoot office computers.\r\nTechnical support for computers and printers.\r\nMaintain network security.');
INSERT INTO `work_data` VALUES (39, 118, 'Revolution Prep', 'Director', '2011-04-01', '2012-02-01', 1, '', '', 'Invited back as Director; started a branch of SAT prep business; averaged 250 points improvement for all students.');
INSERT INTO `work_data` VALUES (40, 118, 'Vector Marketing', 'Independent Contractor', '2009-04-01', '2009-08-01', 0, 'Cohasset', 'MA', 'Developed sales skills and drove over $10,000 in revenue.');
INSERT INTO `work_data` VALUES (41, 122, 'Civil Engineering Consulting Services', 'Summer Intern', '2011-05-01', '2011-08-01', 0, 'Columbia', 'SC', 'Worked as an intern for a civil engineering consulting firm, a company that provides engineering services to state, county, city, and local governments as well as private sector clients.\r\nAssisted in editing/reconstructing Microstation drawings.\r\nAssisted in mapping hydrology of ten mile stretch of interstate for a future project through field work and Microsoft Excel calculations.');
INSERT INTO `work_data` VALUES (42, 123, 'First Management Services', 'Intern', '2011-03-01', '2011-08-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (43, 71, 'Clynk', 'Waste Manager', '1990-01-01', '1990-01-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (44, 71, 'Nonesuch Oar and Paddle Club', 'Junior Manager', '2011-06-01', '2011-08-01', 0, 'Scarborough', 'ME', '');
INSERT INTO `work_data` VALUES (45, 127, 'JP Morgan', 'Analyst', '1995-09-01', '1998-05-01', 0, 'New York City', 'NY', 'Youngest person to climb Mt. Everest.\r\nWorked as Facebook IPO\r\nAssisted the president in completing projects.');
INSERT INTO `work_data` VALUES (46, 127, 'Google', 'Programmer', '1996-05-01', '2000-12-01', 0, 'San Jose', 'CA', 'Doubled the views to Google.\r\nHelped create Google+.');
INSERT INTO `work_data` VALUES (47, 127, 'United States', 'President', '2001-01-01', '2006-12-01', 0, '', '', 'First President of the United States');
INSERT INTO `work_data` VALUES (48, 135, 'YMCA', 'Lifeguard', '2011-05-01', '2011-08-01', 0, 'Nashville', 'TN', '');
INSERT INTO `work_data` VALUES (49, 135, 'UPS', 'Driver Helper', '2009-12-01', '2010-01-01', 0, '', '', 'Delivered packages during busy holiday season');
INSERT INTO `work_data` VALUES (50, 63, 'Kay, Griffin, Enkema, & Colbert PLLC', 'Runner ', '2008-06-01', '2011-08-01', 0, 'Nashville', 'TN', '');
INSERT INTO `work_data` VALUES (51, 144, 'Josh Anderson Realty', 'Fall Intern', '2011-08-01', '2012-02-01', 0, 'Nashville', 'TN', 'Computer based work: list management and marketing\r\nContact: Marcie@joshandersonrealestate.com\r\n');
INSERT INTO `work_data` VALUES (52, 144, 'Simcal Properties', 'Property Manager', '2010-05-01', '2012-02-01', 0, 'Coronado', 'CA', 'Collection of rent \r\nTenant management and apartment turnovers\r\nWorking with invoices, vendors, and financial data\r\nCan work with the QuickBooks database\r\nContact: (619) 364-4268, Carmen Chavez\r\n');
INSERT INTO `work_data` VALUES (53, 144, 'Senator Robert Menendez', 'Winter Intern', '2010-02-01', '2010-02-01', 0, 'Washington ', 'D.C.', '');
INSERT INTO `work_data` VALUES (54, 144, 'Advanced Realty', 'Summer Intern', '2011-05-01', '2011-08-01', 0, 'Coronado', 'CA', 'Leaned about marketing and investments\r\nPayment scheduling and extensions\r\nFiling, organizing, faxing \r\nContact: (619) 365-4321, Jim Rowe\r\n');
INSERT INTO `work_data` VALUES (55, 144, 'Bistro d'' Asia', 'Hostess', '2009-01-01', '2011-07-01', 0, '', '', 'â€¢	Customer service and seating\r\nâ€¢	Preparation of to-go orders\r\nâ€¢	Contact: (619) 437-6678, Alaa Elsadek\r\n');
INSERT INTO `work_data` VALUES (56, 144, 'Vanderbilt Student Recreation', 'Equipement Manager', '2011-08-01', '2011-12-01', 0, 'Nashville', 'TN', 'Working cashier\r\nRenting and selling equipment\r\nInteraction with student, teachers, and adults\r\nManaging inventory\r\nContact: (615) 343-6627, Calvin\r\n');
INSERT INTO `work_data` VALUES (57, 145, 'Seismic Exchange Inc', 'Development Intern', '2011-05-01', '2010-07-01', 0, '', '', 'Cleaned up Delphi code\r\nCleaned up SQL code\r\nWrote VBA programs');
INSERT INTO `work_data` VALUES (58, 146, 'Hunter Roberts Construction Group', 'Intern', '2010-06-01', '2010-08-01', 0, 'New York', 'NY', 'Managed construction of a $48 million public school in Brooklyn');
INSERT INTO `work_data` VALUES (59, 146, 'Hunter Roberts Construction Group', 'Estimating Intern', '2011-06-01', '2011-08-01', 0, '', '', 'Estimated projects of up to $200 million to bid on.');
INSERT INTO `work_data` VALUES (60, 149, 'Insurance Institute for Highway Safety', 'Research Assistant', '2008-06-01', '2011-08-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (61, 150, 'J. Crew', 'Sales Associate', '2011-05-01', '2011-08-01', 0, 'Short Hills', 'NJ', 'Navigated computer inventory and payment programs, communicated with customers');
INSERT INTO `work_data` VALUES (62, 150, 'WRVU, Campus Radio Station', 'Radio Intern, DJ', '2010-09-01', '2011-05-01', 0, 'Nashville', 'TN', 'Interned on weekly radio show, programmed and reviewed CDs, earned solo show');
INSERT INTO `work_data` VALUES (63, 150, 'Jamaican Me Crazy, Island Fun Store', 'Sales Associate', '2010-05-01', '2010-08-01', 0, 'Margate', 'NJ', 'Designed displays, restocked merchandise, communicated with customers');
INSERT INTO `work_data` VALUES (64, 150, 'Sum It Up For Girls, Camps and Clinics', 'Coach, Counselor', '2008-05-01', '2009-11-01', 0, 'Summit', 'NJ', 'Mentored elementary-aged girls, taught basic lacrosse and team-building skills, organized participant information and registration, updated membership database');
INSERT INTO `work_data` VALUES (65, 152, 'Arrow Electronics, Inc.', 'Marketing Intern', '2011-05-01', '2011-08-01', 0, 'Englewood', 'Colorado', 'Led social media strategy for division\r\nConducted primary and secondary research\r\nPresented recommendation to senior team\r\nAsked to re-present to global marketing team\r\nRunner up intern competition for presentation on internal social media solution');
INSERT INTO `work_data` VALUES (66, 157, 'Capital Strategies Partners', 'Intern', '2012-06-01', '2012-07-01', 0, 'Madrid', 'Spain', '');
INSERT INTO `work_data` VALUES (75, 9, 'Uloop', 'Mobile Software Engineering Intern', '2012-05-01', '2012-08-01', 1, 'Chicago', 'IL', '');
INSERT INTO `work_data` VALUES (69, 164, 'Goldenstone Automation Co.', 'President', '1990-01-01', '2019-01-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (70, 165, '', '', '1990-01-01', '1990-01-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (71, 35, 'LECO Corporation', 'Cooperative student intern in computer science', '2011-06-01', '2011-08-01', 0, 'Saint Joseph', 'MI', 'Implemented continuous build integration system using TeamCity');
INSERT INTO `work_data` VALUES (72, 35, 'Institute for Software Integrated Systems', 'Undergraduate research assistant', '2012-02-01', '2012-05-01', 1, 'Nashville', 'TN', 'Implemented transmission between computer and Arduino microprocessor\r\nMade real-time GUI using Qt for remote-control car');
INSERT INTO `work_data` VALUES (73, 171, 'D. Jaburek Billiards', 'Sales Associate', '2008-06-01', '2011-08-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (76, 9, 'CTS America Inc.', 'Software Engineering Intern', '2011-05-01', '2011-08-01', 0, 'Pensacola', 'FL', '');
INSERT INTO `work_data` VALUES (77, 178, 'The Harpeth Hall School Summer Camp', 'Tennis Camp Counselor', '2010-06-01', '2010-07-01', 0, 'Nashville', 'TN', 'Taught tennis at an all girls day camp (Ages 7-12)');
INSERT INTO `work_data` VALUES (78, 178, 'CBS', 'Intern/Assistant ', '2010-01-01', '2010-02-01', 0, 'New York City', 'NY', 'Compiled relevant articles for CBS News\r\nScribed for Various television shows\r\nBlogged on social media websites for "NCIS"\r\nPitched article ideas to CBS Watch! Magazine');
INSERT INTO `work_data` VALUES (79, 178, 'Dr. William H. Polk, General Surgeon at Centennial Hospital', 'Intern', '2009-01-01', '2009-02-01', 0, 'Nashville', 'TN', 'Observed numerous surgeries including thoracotomy, coronary artery bypass, prostatectomy, and laparoscopic gall bladder removal\r\nWorked with patients in an office atmosphere\r\nLearned skills in stitching');
INSERT INTO `work_data` VALUES (80, 180, 'Jefferies Group Inc. ', 'Equity Research Intern', '2011-09-01', '2012-05-01', 0, '', '', 'Assisted analysts in compiling The Script, a weekly publication covering roughly 40 health care companies\r\nAssisted analysts in creating put-call ratio analysis on excel for the health care companies they cover\r\nResearched and created excel models on assigned companies. This included creating an excel model of financial statements and developing a growth multiplier\r\n');
INSERT INTO `work_data` VALUES (81, 180, 'Wilmette Park District', 'Summer Sailing Camp Instructor', '2011-05-01', '2011-08-01', 0, 'Wilmette', 'IL', 'Level One Certified Instructor through US Sailing \r\nWorked specifically with the more advanced students in teaching new techniques and skills\r\nProvided private lessons outside of the camp\r\nAssisted camp directors in scheduling events, creating programs, and administrative tasks\r\n');
INSERT INTO `work_data` VALUES (82, 157, 'Chesapeake Energy Co.', 'Intern-Land', '2011-05-01', '2011-08-01', 0, 'Oklahoma City', 'Oklahoma', '');
INSERT INTO `work_data` VALUES (83, 13, 'AT&T', 'Premises Technician', '2012-01-01', '1990-01-01', 1, 'Waukesha', 'WI', '3rd best tech in the garage.\r\nEarned 5-star the first month of work.');
INSERT INTO `work_data` VALUES (84, 13, 'Quantum L.S.', 'Sales', '2011-03-01', '2011-07-01', 0, 'Milwaukee', 'WI', '');
INSERT INTO `work_data` VALUES (85, 180, 'Little Traverse Sailors ', 'Summer Sailing Camp Instructor', '2007-06-01', '2010-08-01', 0, 'Harbor Springs ', 'MI', 'Level One Certified Instructor through US Sailing\r\nWorked specifically with the more advanced students in teaching new techniques and skills\r\nProvided private lessons outside of the camp\r\nAssisted camp directors in scheduling events, creating programs, and administrative tasks\r\n');
INSERT INTO `work_data` VALUES (92, 186, 'Epic', 'Project Manager', '2007-05-01', '1990-01-01', 0, '', '', '');
INSERT INTO `work_data` VALUES (87, 144, 'Senator Robert Menedez ', 'Student Intern', '2010-01-01', '2010-02-01', 0, 'Washington D.C.', '', 'Worked closely with the Chief of staff, filed papers and answered phones');
INSERT INTO `work_data` VALUES (89, 142, 'The Wildlife Experience', 'Visitor Experience Respresentative', '2011-05-01', '1990-01-01', 1, 'Parker', 'CO', '');
INSERT INTO `work_data` VALUES (90, 142, 'Vanderbilt Biology Department', 'Undergraduate Research Assistant', '2011-08-01', '2012-05-01', 0, 'Nashville', 'TN', 'Bred fish weekly and sorted embryos for experiments.\r\nLearned further lab techniques.');
INSERT INTO `work_data` VALUES (91, 142, 'Vanderbilt Neuroscience Department', 'Undergraduate Assistant', '2010-09-01', '2011-04-01', 0, 'Nashville', 'TN', 'Learned basic lab techniques and equipment (agarose gel preparation and use, transform bacteria, purify DNA).\r\nOrganized oligonucleotide and vector databases.');

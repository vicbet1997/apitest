SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `applic_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id_c` int(10) NOT NULL,
  `user_id_c` int(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `applimsg` text(150) NOT NULL,
  `app_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`applic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `noti_id` int(10) NOT NULL AUTO_INCREMENT,
  `pos_id` int(10) NOT NULL,
  `post_usr` int(10) NOT NULL,
  `cont_user` int(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `applimsg` text(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`noti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `usr_id_p` int(10) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `descriptions` varchar(200) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Table structure for table `offences`
--

CREATE TABLE IF NOT EXISTS `offences` (
  `offence_id` int(10) NOT NULL AUTO_INCREMENT,
  `offence` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `carreg` varchar(200) NOT NULL,
  `evidence` varchar(200) NOT NULL,
  `parties` varchar(200) NOT NULL,
  PRIMARY KEY (`offence_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `usr_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` varchar(20) DEFAULT 'NORMAL',
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


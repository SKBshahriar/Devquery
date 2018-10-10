-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 09:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devquery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_description` text NOT NULL,
  `comment_time` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_description`, `comment_time`, `post_id`, `user_name`) VALUES
(1, 'Laravel is the best framework', '2018-09-05 00:00:00', 2, 'sakib_shahriar'),
(10, 'JavaFX is best', '2018-09-06 00:00:00', 3, 'sakib_shahriar'),
(11, 'Python is better than java', '2018-09-05 00:00:00', 3, 'sakib_shahriar'),
(15, 'asdasdasd', '2018-09-09 21:40:26', 2, 'sakib_shahriar'),
(16, 'agree', '2018-09-10 00:37:42', 13, 'sakib_shahriar'),
(17, 'java is better', '2018-09-10 01:14:21', 1, 'sakib_shahriar'),
(23, 'I like C#', '2018-09-17 21:07:19', 1, 'sakim_ahmed'),
(24, 'MySQL is a powerful database management system used for organizing and retrieving data. To install MySQL, open terminal and type in these commands: sudo apt-get install mysql-server libapache2-mod-auth-mysql During the installation,', '2018-09-17 21:15:45', 15, 'sakim_ahmed'),
(25, 'thnx, that was so informative\r\n', '2018-09-17 22:17:30', 18, 'sakib_shahriar'),
(26, 'very good\r\n', '2018-09-18 07:30:24', 18, 'sakib_shahriar'),
(27, 'very good\r\n', '2018-09-18 07:30:45', 18, 'sakib_shahriar'),
(28, 'ow', '2018-09-18 07:31:20', 4, 'sakib_shahriar'),
(29, 'It is very important for all of us.', '2018-09-18 12:19:48', 15, 'sakib_shahriar'),
(30, 'Google it. ', '2018-09-18 19:16:23', 15, 'Oeshi_Jannat'),
(31, 'Django is a framework of python', '2018-09-18 19:54:11', 20, 'Oeshi_Jannat'),
(32, 'google it', '2018-09-18 20:29:58', 30, 'sakib_shahriar'),
(33, 'Google it', '2018-09-18 20:47:38', 21, 'sakib_shahriar');

-- --------------------------------------------------------

--
-- Table structure for table `comment_vote`
--

CREATE TABLE `comment_vote` (
  `user_name` varchar(255) NOT NULL,
  `vote_direction` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `community_id` int(11) NOT NULL,
  `community_title` varchar(255) NOT NULL,
  `community_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`community_id`, `community_title`, `community_description`) VALUES
(1, 'Java', 'This is java community. The main purpose of this community is to help java developers.Java is a programming language and computing platform. There are lots of applications and websites that will not work unless you have Java installed, and more are created every day. '),
(2, 'Python', 'This is python community. The main purpose of this community is to help developers.Python can be easy to pick up whether you\'re a first time programmer or you\'re experienced with other languages. The following pages are a useful first step to get on your way for Python!'),
(4, 'Ruby', 'This is Ruby community. The main purpose of this community is to help those people interested in this field. In Ruby, everything is an object. Every information and code can be given their properties .Object-oriented programming calls properties by the name instance are known as methods. '),
(5, 'Raspberry Pi', 'This is Raspberry Pi community. The main purpose of this community is to help C# developers.Our mission is to put the power of computing and digital making into the hands of people all over the world. We do this so that more people are able to harness the power of computing'),
(6, 'Angular', 'This is Angular community. The main purpose of this is to help those people interested in this field.AngularJS is a framework for dynamic web apps. It lets you use HTML as your template language and lets you extend HTML\'s syntax to express your application\'s components clearly.'),
(7, 'Laravel', 'This is Laravel community. The main purpose of this community is to help those people who are interested in this field.Laravel is a open-source PHP web framework, created by Taylor Otwell for the development of web applications following the MVC architectural pattern.');

-- --------------------------------------------------------

--
-- Table structure for table `community_follower`
--

CREATE TABLE `community_follower` (
  `community_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_follower`
--

INSERT INTO `community_follower` (`community_id`, `user_name`) VALUES
(1, 'Morshed_Khan'),
(1, 'Oeshi_Jannat'),
(1, 'sakib_shahriar'),
(2, 'fariha_muna'),
(2, 'Morshed_Khan'),
(2, 'Oeshi_Jannat'),
(2, 'sakib_shahriar'),
(4, 'Morshed_Khan'),
(4, 'Oeshi_Jannat'),
(4, 'sakib_shahriar'),
(5, 'Morshed_Khan'),
(5, 'Oeshi_Jannat'),
(5, 'sakib_shahriar'),
(6, 'Morshed_Khan'),
(6, 'Oeshi_Jannat'),
(7, 'Morshed_Khan'),
(7, 'Oeshi_Jannat'),
(7, 'sakib_shahriar');

-- --------------------------------------------------------

--
-- Table structure for table `community_post`
--

CREATE TABLE `community_post` (
  `post_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_post`
--

INSERT INTO `community_post` (`post_id`, `community_id`, `user_name`) VALUES
(3, 1, 'sakib_shahriar'),
(4, 1, 'sakib_shahriar'),
(13, 1, 'sakib_shahriar'),
(29, 2, 'Oeshi_Jannat'),
(30, 2, 'fariha_muna');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `user_name1` varchar(255) NOT NULL,
  `user_name2` varchar(255) NOT NULL,
  `conversation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE `follower` (
  `follower_user_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`follower_user_name`, `user_name`) VALUES
('sakib_shahriar', 'Chris_Jhon');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `following_user_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`following_user_name`, `user_name`) VALUES
('Chris_Jhon', 'fariha_muna'),
('Chris_Jhon', 'Oeshi_Jannat'),
('Chris_Jhon', 'sakib_shahriar'),
('fariha_muna', 'sakib_shahriar'),
('java_boss', 'sakib_shahriar'),
('Morshed_Khan', 'fariha_muna'),
('Morshed_Khan', 'Oeshi_Jannat'),
('Morshed_Khan', 'sakib_shahriar'),
('Oeshi_Jannat', 'Oeshi_Jannat'),
('Oeshi_Jannat', 'sakib_shahriar'),
('sakib123', 'fariha_muna'),
('sakib123', 'Morshed_Khan'),
('sakib123', 'Oeshi_Jannat'),
('sakib_shahriar', 'fariha_muna'),
('sakib_shahriar', 'Morshed_Khan'),
('sakib_shahriar', 'Oeshi_Jannat'),
('sakim_ahmed', 'sakib_shahriar');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `tag_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`tag_name`, `user_name`) VALUES
('ajax', 'Morshed_Khan'),
('c', 'Oeshi_Jannat'),
('c#', 'sakib_shahriar'),
('django', 'fariha_muna'),
('java', 'java_boss'),
('java', 'Oeshi_Jannat'),
('java', 'sakib_shahriar'),
('java', 'sakim_ahmed'),
('javascript', 'Oeshi_Jannat'),
('laravel', 'sakib123'),
('laravel', 'sakib_shahriar'),
('ruby', 'sakim_ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `my_post`
--

CREATE TABLE `my_post` (
  `post_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_post`
--

INSERT INTO `my_post` (`post_id`, `user_name`) VALUES
(1, 'Chris_Jhon'),
(2, 'Chris_Jhon'),
(15, 'sakib_shahriar'),
(17, 'sakim_ahmed'),
(18, 'sakim_ahmed'),
(19, 'sakim_ahmed'),
(20, 'Morshed_Khan'),
(21, 'Oeshi_Jannat');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `notification_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_description` text NOT NULL,
  `img` int(1) NOT NULL,
  `posted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_description`, `img`, `posted_on`) VALUES
(1, 'Java or C#?', 'As similar as the two languages are in terms of purpose, it’s important to remember that C# holds its origins in Microsoft’s desire to have a proprietary “Java-like” language of their own for the .NET framework. Since C# wasn’t created in a vacuum, new features were added and tweaked to solve issues Microsoft developers ran into when they initially tried to base their platform on Visual J++. At the same time, Java’s open-source community continued to grow, and a technical arms race developed between the two languages. These are some of the major differences between C# and Java.', 1, '2018-09-19 00:00:00'),
(2, 'Laravel', 'Classifying big data is a challenging and difficult task, as\r\nthere are thousands/ millions of instances in the data and we\r\ncannot analysis and store the full data at a time. The most\r\ncommon problem to deal with big data is to store the total data\r\ninto the computer memory as big data are so big. Therefore,\r\nparallel and distributed computing becomes very useful for\r\nhanding big data. In general, big data is divided into several\r\nsmall sub-sets that we can deal with and each of which fits into\r\nthe computer memory. Most real-world datasets are unlabelled\r\nand labelling data is very costly and time consuming. Most of\r\nthe time human experts label the unlabelled the data instances.\r\nIn this paper, we have proposed an approach for classifying\r\nbig data employing classification by clustering (CbC) method\r\nthat does not consider the class labels of data instances for\r\nbuilding classifiers. Initially, the big data is divided into several\r\nsmall sub-datasets. Then clustering technique is applied to\r\neach sub-dataset for cluster the data. The proposed method\r\nused similarity-based clustering algorithm, which is a robust\r\nmethod for clustering instances based on the similarities. The\r\nsimilarity-based clustering method automatically generates the\r\ncluster numbers and form different volumes of clusters. After\r\nthat, several decision trees are built from sub-datasets. Finally,\r\nall the decision trees are examined and analysed to form a single\r\ndecision tree that turns out to be very close to the tree that\r\nwould have been generated if the big data had fit in memory.\r\nTo select an informative attribute/ feature for constructing a\r\ndecision tree, we can use any attribute selection techniques,\r\ne.g. ID3 (Iterative Dichotomiser 3), C4.5 (extension of ID3\r\nalgorithm), and CART (Classification & Regression Tree).\r\nAlgorithm 1, outlines the proposed algorithm for classifying\r\nunlabelled big data using similarity-based clustering with decision\r\ntree.\r\nThe proposed algorithm is an adaptive and scalable approach.\r\nIt can take new instances and update the decision\r\ntree to reflect the changes in data without constructing a new\r\ndecision tree from the scratch. The main idea of this paper is\r\nto build a scalable and adaptive classification model for mining\r\nbig data based on the similarities of the instances instead of', 1, '2018-09-12 00:00:00'),
(3, 'Problems with JavaFx Dialogue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna.', 1, '2018-09-13 00:00:00'),
(4, 'Which is best? Swing or JavaFX', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna.', 1, '2018-09-04 00:00:00'),
(13, 'best community', 'this is the best java community', 1, '2018-09-10 00:35:19'),
(15, 'Ruby on Rails Database', 'I am new in Ruby on Rails framework of Ruby, can you guys help me to connect database in this framework?', 1, '2018-09-17 19:18:34'),
(17, 'Ajax in Javascript', 'Think to a time you\'ve used Facebook or Gmail. You\'ve performed actions without reloading an entire page. You\'ve left comments that post instantly while you\'re on the same page, for example. That\'s what AJAX allows!', 1, '2018-09-17 21:28:56'),
(18, 'File in C', 'The last chapter explained the standard input and output devices handled by C programming language. This chapter cover how C programmers can create, open, close text or binary files for their data storage.', 1, '2018-09-17 21:36:27'),
(19, 'Model in Django', 'A model is the single, definitive source of information about your data. It contains the essential fields and behaviors of the data youâ€™re storing. Generally, each model maps to a single database table.', 1, '2018-09-17 21:39:27'),
(20, 'Django', 'What is Django?', 1, '2018-09-18 14:49:26'),
(21, 'Routing in laravel', 'How to create routing in laravel?\r\nPlease help  me out. ', 1, '2018-09-18 19:12:49'),
(29, 'Function in python', 'How to define function in python?', 1, '2018-09-18 19:52:16'),
(30, 'Constructor ', 'How to create constructor in  python class? ', 1, '2018-09-18 20:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `tag_name` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`tag_name`, `post_id`) VALUES
('ajax', 17),
('c', 18),
('c#', 1),
('django', 19),
('java', 1),
('laravel', 2),
('laravel', 20),
('laravel', 21),
('python', 19),
('python', 20),
('ruby', 15);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `reply_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE `saved` (
  `post_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_name`) VALUES
('ajax'),
('c'),
('c#'),
('django'),
('java'),
('javascript'),
('jsp'),
('laravel'),
('python'),
('ruby');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `date_of_join` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `user_name`, `password`, `date_of_join`, `email`, `profile_tag`) VALUES
('Chris', 'Jhon', 'Chris_Jhon', '1234', '2018-09-12', 'chris@gmail.com', 'developer'),
('Fariha', 'Muna', 'fariha_muna', '1234', '2018-09-18', 'muna@gmail.com', 'Database Designer'),
('java', 'boss', 'java_boss', '1234', '2018-09-18', 'javaboss@gmail.com', 'Java Boss'),
('Morshed', 'Khan', 'Morshed_Khan', '1234', '2018-09-18', 'morshed@gmail.com', 'programmer'),
('Miftahul', 'Jannat', 'Oeshi_Jannat', '1234', '2018-09-18', 'oeshi2271@gmail.com', 'Programmer'),
('sakib', 'Ahmed', 'sakib123', '1234', '2018-09-18', 'sakib123@gmail.com', 'developer'),
('sakib', 'shahriar', 'sakib_shahriar', '1234', '2018-09-04', 'sakibnx@gmail.com', 'programmer'),
('Sakim', 'Ahmed', 'sakim_ahmed', '1234', '2018-09-17', 'sakim@gmail.com', 'Web designer');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `post_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `vote_direction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`post_id`, `user_name`, `vote_direction`) VALUES
(1, 'fariha_muna', 'plus'),
(1, 'sakib_shahriar', 'plus'),
(1, 'sakim_ahmed', 'plus'),
(2, 'fariha_muna', 'plus'),
(2, 'sakib_shahriar', 'plus'),
(4, 'Oeshi_Jannat', 'plus'),
(4, 'sakib_shahriar', 'plus'),
(13, 'sakib_shahriar', 'plus'),
(15, 'fariha_muna', 'plus'),
(15, 'Morshed_Khan', 'plus'),
(15, 'Oeshi_Jannat', 'plus'),
(15, 'sakib_shahriar', 'plus'),
(15, 'sakim_ahmed', 'plus'),
(17, 'sakib_shahriar', 'plus'),
(18, 'sakib_shahriar', 'plus'),
(19, 'sakib_shahriar', 'plus'),
(19, 'sakim_ahmed', 'minus'),
(20, 'fariha_muna', 'plus'),
(20, 'Morshed_Khan', 'minus'),
(20, 'Oeshi_Jannat', 'plus'),
(20, 'sakib_shahriar', 'plus'),
(21, 'sakib_shahriar', 'plus'),
(29, 'Oeshi_Jannat', 'plus'),
(29, 'sakib_shahriar', 'plus'),
(30, 'sakib_shahriar', 'plus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_fk0` (`post_id`),
  ADD KEY `user_id` (`user_name`);

--
-- Indexes for table `comment_vote`
--
ALTER TABLE `comment_vote`
  ADD PRIMARY KEY (`user_name`,`vote_direction`,`comment_id`),
  ADD KEY `comment_vote_fk1` (`comment_id`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`community_id`);

--
-- Indexes for table `community_follower`
--
ALTER TABLE `community_follower`
  ADD PRIMARY KEY (`community_id`,`user_name`),
  ADD KEY `community_follower_fk1` (`user_name`);

--
-- Indexes for table `community_post`
--
ALTER TABLE `community_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `community_post_fk1` (`community_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`),
  ADD KEY `conversation_fk0` (`user_name1`),
  ADD KEY `conversation_fk1` (`user_name2`);

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`follower_user_name`,`user_name`),
  ADD KEY `follower_fk1` (`user_name`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`following_user_name`,`user_name`),
  ADD KEY `following_fk1` (`user_name`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`tag_name`,`user_name`),
  ADD KEY `interest_fk1` (`user_name`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_fk0` (`conversation_id`);

--
-- Indexes for table `my_post`
--
ALTER TABLE `my_post`
  ADD PRIMARY KEY (`post_id`,`user_name`),
  ADD KEY `my_post_fk1` (`user_name`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notification_fk0` (`user_name`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`tag_name`,`post_id`),
  ADD KEY `post_tag_fk1` (`post_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `reply_fk0` (`comment_id`),
  ADD KEY `reply_fk1` (`user_name`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`post_id`,`user_name`),
  ADD KEY `saved_fk1` (`user_name`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`post_id`,`user_name`,`vote_direction`),
  ADD KEY `vote_fk1` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `community_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_fk0` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `comment_vote`
--
ALTER TABLE `comment_vote`
  ADD CONSTRAINT `comment_vote_fk0` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`),
  ADD CONSTRAINT `comment_vote_fk1` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`);

--
-- Constraints for table `community_follower`
--
ALTER TABLE `community_follower`
  ADD CONSTRAINT `community_follower_fk0` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`),
  ADD CONSTRAINT `community_follower_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `community_post`
--
ALTER TABLE `community_post`
  ADD CONSTRAINT `community_post_fk0` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `community_post_fk1` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`);

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_fk0` FOREIGN KEY (`user_name1`) REFERENCES `user` (`user_name`),
  ADD CONSTRAINT `conversation_fk1` FOREIGN KEY (`user_name2`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `follower`
--
ALTER TABLE `follower`
  ADD CONSTRAINT `follower_fk0` FOREIGN KEY (`follower_user_name`) REFERENCES `user` (`user_name`),
  ADD CONSTRAINT `follower_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_fk0` FOREIGN KEY (`following_user_name`) REFERENCES `user` (`user_name`),
  ADD CONSTRAINT `following_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_fk0` FOREIGN KEY (`tag_name`) REFERENCES `tags` (`tag_name`),
  ADD CONSTRAINT `interest_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_fk0` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`conversation_id`);

--
-- Constraints for table `my_post`
--
ALTER TABLE `my_post`
  ADD CONSTRAINT `my_post_fk0` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `my_post_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_fk0` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_fk0` FOREIGN KEY (`tag_name`) REFERENCES `tags` (`tag_name`),
  ADD CONSTRAINT `post_tag_fk1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_fk0` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`),
  ADD CONSTRAINT `reply_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `saved_fk0` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `saved_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_fk0` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `vote_fk1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

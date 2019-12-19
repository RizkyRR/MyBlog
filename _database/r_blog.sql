-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 09:58 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `short_content` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `pending` tinyint(4) NOT NULL,
  `public` tinyint(4) NOT NULL,
  `active` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `category_id`, `title`, `slug`, `picture`, `short_content`, `content`, `created_at`, `updated_at`, `pending`, `public`, `active`) VALUES
(1558381220, 'Rizky Rahmadianto', 2, 'Applikasi Keuangan Sederhana', 'applikasi-keuangan-sederhana', 'content_1576740133.png', '<p xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidi', '<p xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pulvinar mattis nunc sed blandit libero. Adipiscing at in tellus integer feugiat scelerisque. Faucibus scelerisque eleifend donec pretium vulputate sapien. Pharetra massa massa ultricies mi. Lacus sed turpis tincidunt id. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Adipiscing tristique risus nec feugiat in fermentum posuere. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Vitae et leo duis ut diam quam nulla. Aliquet sagittis id consectetur purus ut faucibus.</p>\r\n\r\n<p xss=removed>Auctor neque vitae tempus quam pellentesque nec nam aliquam. Tincidunt arcu non sodales neque sodales ut. Ac placerat vestibulum lectus mauris. Adipiscing elit duis tristique sollicitudin. Tempor id eu nisl nunc mi ipsum faucibus vitae. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Enim nunc faucibus a pellentesque sit amet porttitor eget dolor. Aliquet risus feugiat in ante metus dictum at tempor commodo. In pellentesque massa placerat duis ultricies lacus sed. Sed risus pretium quam vulputate dignissim suspendisse in est. Nam at lectus urna duis convallis convallis tellus. Quis ipsum suspendisse ultrices gravida dictum. Urna et pharetra pharetra massa. Dolor sit amet consectetur adipiscing.</p>\r\n', '2019-12-19 07:22:13', '0000-00-00 00:00:00', 0, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `blog_profile`
--

CREATE TABLE `blog_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `about` text NOT NULL,
  `icon` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_profile`
--

INSERT INTO `blog_profile` (`id`, `name`, `email`, `phone`, `about`, `icon`) VALUES
(1, 'MyBlog', 'rahmadianto018@gmail.com', '081111111111', '&lt;p&gt;&lt;strong&gt;Lorem &lt;/strong&gt;ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!&lt;/p&gt;', 'fas fa-robot');

-- --------------------------------------------------------

--
-- Table structure for table `blog_profile_detail`
--

CREATE TABLE `blog_profile_detail` (
  `blog_profile_id` int(11) NOT NULL,
  `link_blog_profile_id` int(11) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_profile_detail`
--

INSERT INTO `blog_profile_detail` (`blog_profile_id`, `link_blog_profile_id`, `url`) VALUES
(1, 2, 'https://www.facebook.com/rizky.rahmadianto'),
(1, 1, 'https://twitter.com/RR_Rizky');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `slug`, `visible`) VALUES
(2, 'Multiple Access', 'multiple-access', 1),
(1, 'Single Access', 'single-access', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_blog`
--

CREATE TABLE `category_blog` (
  `category_blog_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_blog`
--

INSERT INTO `category_blog` (`category_blog_id`, `category_id`, `blog_id`) VALUES
(2, 2, '1558381219');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_blog`
--

CREATE TABLE `comment_blog` (
  `comment_blog_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `link_blog_profile`
--

CREATE TABLE `link_blog_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `icon` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link_blog_profile`
--

INSERT INTO `link_blog_profile` (`id`, `name`, `icon`) VALUES
(1, 'twitter', 'fab fa-twitter'),
(2, 'facebook', 'fab fa-facebook-f'),
(3, 'instagram', 'fab fa-instagram'),
(4, 'github', 'fab fa-github'),
(5, 'youtube', 'fab fa-youtube'),
(6, 'linkedin', 'fab fa-linkedin-in'),
(7, 'tumblr', 'fab fa-tumblr');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(6, 'Extras'),
(2, 'Master'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `message_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `level`) VALUES
(1, 3, 'Management Menu', 'menu', 'fas fa-minus', 1, 'menu'),
(2, 3, 'Management Sub Menu', 'menu/submenu', 'fas fa-bars', 1, 'menu/submenu'),
(3, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1, 'admin'),
(4, 1, 'Blog Profile', 'blog_profile', 'far fa-building', 1, 'blog_profile'),
(5, 2, 'Category', 'category', 'fas fa-tags', 1, 'category'),
(6, 2, 'Post', 'post', 'fas fa-blog', 1, 'post'),
(7, 6, 'Comment Section', 'comment', 'fas fa-comments', 1, 'comment'),
(8, 6, 'Message', 'message', 'fas fa-envelope', 1, 'message');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`) VALUES
(1, 'Rizky Rahmadianto', 'admin@admin.com', 'autodraw_6-5-2017_11_39_30.png', '$2y$10$ojVg/Mvr9wpLnHNd.9AxXOlpSEWuivT9dQDbnoZx5Hw9MLaCFjmWK');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `title` (`title`),
  ADD KEY `slug` (`slug`,`picture`,`created_at`,`updated_at`,`pending`,`public`,`active`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `blog_profile`
--
ALTER TABLE `blog_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`name`,`slug`,`visible`);

--
-- Indexes for table `category_blog`
--
ALTER TABLE `category_blog`
  ADD PRIMARY KEY (`category_blog_id`),
  ADD KEY `category` (`category_id`,`blog_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`,`datetime`);

--
-- Indexes for table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD PRIMARY KEY (`comment_blog_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `link_blog_profile`
--
ALTER TABLE `link_blog_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu` (`menu`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`,`title`,`url`,`icon`,`is_active`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `image` (`image`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1558381221;

--
-- AUTO_INCREMENT for table `blog_profile`
--
ALTER TABLE `blog_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_blog`
--
ALTER TABLE `category_blog`
  MODIFY `category_blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_blog`
--
ALTER TABLE `comment_blog`
  MODIFY `comment_blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link_blog_profile`
--
ALTER TABLE `link_blog_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

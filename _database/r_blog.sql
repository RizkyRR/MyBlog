-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2020 at 08:01 AM
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `blog_views` int(11) NOT NULL,
  `pending` tinyint(4) NOT NULL,
  `public` tinyint(4) NOT NULL,
  `active` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `category_id`, `title`, `slug`, `picture`, `short_content`, `content`, `created_at`, `updated_at`, `blog_views`, `pending`, `public`, `active`) VALUES
(1, 'Rizky Rahmadianto', 2, 'Applikasi Keuangan Sederhana', 'applikasi-keuangan-sederhana', 'autodraw_6-5-2017_11_32_35.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pulvinar mattis nunc sed blandit libero. Adipiscing at in tellus integer feugiat scelerisque. Faucibus scelerisque eleifend donec pretium vulputate sapien. Pharetra massa massa ultricies mi. Lacus sed turpis tincidunt id. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Adipiscing tristique risus nec feugiat in fermentum posuere. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Vitae et leo duis ut diam quam nulla. Aliquet sagittis id consectetur purus ut faucibus.</p>\r\n\r\n<p>Auctor neque vitae tempus quam pellentesque nec nam aliquam. Tincidunt arcu non sodales neque sodales ut. Ac placerat vestibulum lectus mauris. Adipiscing elit duis tristique sollicitudin. Tempor id eu nisl nunc mi ipsum faucibus vitae. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Enim nunc faucibus a pellentesque sit amet porttitor eget dolor. Aliquet risus feugiat in ante metus dictum at tempor commodo. In pellentesque massa placerat duis ultricies lacus sed. Sed risus pretium quam vulputate dignissim suspendisse in est. Nam at lectus urna duis convallis convallis tellus. Quis ipsum suspendisse ultrices gravida dictum. Urna et pharetra pharetra massa. Dolor sit amet consectetur adipiscing.</p>\r\n', '2020-01-01 12:50:03', '2019-12-29 08:45:15', 1, 0, 1, 'Active'),
(1558381221, 'Rizky Rahmadianto', 2, 'asdasd', 'asdasd', 'content_1577279481.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Semper quis lectus nulla at volutpat diam ut. Varius sit amet mattis vulputate enim nulla aliquet porttitor lacus. Id diam vel quam elementum pulvinar etiam non quam. Purus sit amet luctus venenatis. Nullam ac tortor vitae purus. Adipiscing at in tellus integer feugiat scelerisque varius morbi. Ut porttitor leo a diam sollicitudin tempor. Vulputate ut pharetra sit amet aliquam id diam maecenas. Nunc faucibus a pellentesque sit amet porttitor eget. Sit amet consectetur adipiscing elit ut aliquam purus sit. Metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Eu scelerisque felis imperdiet proin fermentum leo vel orci. Convallis tellus id interdum velit laoreet. Tempus urna et pharetra pharetra massa. Id aliquet risus feugiat in.</p>\r\n', '2020-01-01 00:41:19', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(1558381223, 'Rizky Rahmadianto', 2, 'Coba Aja Untuk Cek Timestamp Created At', 'coba-aja-untuk-cek-timestamp-created-at', 'content_1577858329.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nunc non blandit massa enim nec dui. Lectus sit amet est placerat in egestas erat. Sapien nec sagittis aliquam malesuada bibendum arcu vitae elementum. Eu nisl nunc mi ipsum. Duis at tellus at urna condimentum. Bibendum arcu vitae elementum curabitur vitae. Platea dictumst quisque sagittis purus sit amet volutpat. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Aliquam nulla facilisi cras fermentum. Dui accumsan sit amet nulla facilisi morbi tempus.</p>\r\n\r\n<p>Lectus magna fringilla urna porttitor rhoncus dolor purus non enim. Pellentesque diam volutpat commodo sed. A arcu cursus vitae congue. Augue mauris augue neque gravida in fermentum et sollicitudin ac. Vitae semper quis lectus nulla at volutpat diam. Risus commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Viverra justo nec ultrices dui sapien eget mi. Condimentum lacinia quis vel eros donec ac odio tempor orci. Convallis posuere morbi leo urna molestie. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Facilisis sed odio morbi quis commodo odio aenean sed adipiscing. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt id. Gravida cum sociis natoque penatibus et magnis dis. Bibendum est ultricies integer quis auctor elit sed. Morbi tempus iaculis urna id. Quam elementum pulvinar etiam non quam lacus suspendisse faucibus.</p>\r\n\r\n<p>Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Sagittis orci a scelerisque purus semper eget duis at. Lorem donec massa sapien faucibus et molestie. Neque convallis a cras semper. Dapibus ultrices in iaculis nunc sed augue lacus viverra vitae. Sed viverra ipsum nunc aliquet bibendum enim. Porttitor leo a diam sollicitudin tempor. Porta nibh venenatis cras sed felis eget velit aliquet. Nec feugiat in fermentum posuere urna nec tincidunt. Ultricies integer quis auctor elit sed vulputate mi. Tortor dignissim convallis aenean et tortor at risus viverra adipiscing. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Nisl condimentum id venenatis a condimentum vitae sapien. Lobortis feugiat vivamus at augue eget. Donec et odio pellentesque diam. Netus et malesuada fames ac turpis egestas maecenas pharetra convallis. Sit amet facilisis magna etiam tempor orci. Eget velit aliquet sagittis id consectetur purus ut faucibus pulvinar.</p>\r\n\r\n<p>Nunc eget lorem dolor sed viverra. Ridiculus mus mauris vitae ultricies leo integer. Risus viverra adipiscing at in tellus. At consectetur lorem donec massa sapien faucibus. Tristique senectus et netus et malesuada fames ac turpis egestas. Lorem donec massa sapien faucibus et. Et ultrices neque ornare aenean euismod elementum nisi quis eleifend. Sed libero enim sed faucibus turpis in eu mi bibendum. Tincidunt vitae semper quis lectus nulla at. Lorem dolor sed viverra ipsum nunc aliquet.</p>\r\n\r\n<p>Scelerisque purus semper eget duis at. In vitae turpis massa sed elementum tempus. Tempus quam pellentesque nec nam aliquam sem. Turpis egestas maecenas pharetra convallis posuere. Lobortis scelerisque fermentum dui faucibus in ornare quam. Nisl rhoncus mattis rhoncus urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. Vitae sapien pellentesque habitant morbi tristique. Dignissim suspendisse in est ante. Convallis posuere morbi leo urna molestie at elementum eu facilisis. Turpis egestas sed tempus urna et pharetra pharetra massa. Elementum pulvinar etiam non quam.</p>\r\n', '2020-01-01 12:58:49', '2020-01-01 13:36:18', 1, 0, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `blog_image`
--

CREATE TABLE `blog_image` (
  `id` int(11) NOT NULL,
  `blog_profile_id` int(11) NOT NULL,
  `image_1` varchar(256) NOT NULL,
  `image_2` varchar(256) NOT NULL,
  `image_3` varchar(256) NOT NULL,
  `image_4` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_image`
--

INSERT INTO `blog_image` (`id`, `blog_profile_id`, `image_1`, `image_2`, `image_3`, `image_4`) VALUES
(1, 1, 'home-bg.jpg', 'about-bg.jpg', 'post-bg.jpg', 'contact-bg.jpg');

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
  `icon` varchar(256) NOT NULL,
  `visitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_profile`
--

INSERT INTO `blog_profile` (`id`, `name`, `email`, `phone`, `about`, `icon`, `visitor`) VALUES
(1, 'MyBlog', 'rahmadianto018@gmail.com', '081111111111', '<p><strong>Lorem </strong>ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt.</p>\r\n\r\n<p>Numquam at quae voluptatum in officia voluptas voluptatibus, minus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>\r\n', 'fas fa-robot', 0);

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
  `blog_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` longtext NOT NULL,
  `is_hide` tinyint(1) NOT NULL,
  `is_reply` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `blog_id`, `username`, `datetime`, `content`, `is_hide`, `is_reply`) VALUES
(1, 1, 'Agus Cebong', '2019-12-21 11:22:09', 'Ini kritik yang sangat membangun', 0, 0);

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
(6, 'Comment'),
(2, 'Master'),
(3, 'Menu'),
(7, 'Message');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_reply` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `message_content`, `created_at`, `is_reply`) VALUES
(1, 'Rizky Rahmadianto', 'rahmadianto018@gmail.com', '08111112233', 'Maaf mengganggu jika tidak apa ya sudah', '2019-12-26 12:01:09', 0),
(2, 'Rahmad Rizky', '111201408226@mhs.dinus.ac.id', '089321456978', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Neque ornare aenean euismod elementum nisi quis eleifend. Fringilla ut morbi tincidunt augue interdum velit euismod in pellentesque. Enim sed faucibus turpis in eu mi. Sit amet tellus cras adipiscing. Maecenas pharetra convallis posuere morbi leo. Eros donec ac odio tempor orci dapibus ultrices. Cursus mattis molestie a iaculis at erat. Nunc pulvinar sapien et ligula ullamcorper malesuada proin libero. Neque ornare aenean euismod elementum nisi. Faucibus nisl tincidunt eget nullam non. Eu lobortis elementum nibh tellus molestie nunc non blandit. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra. Ultrices gravida dictum fusce ut placerat orci nulla pellentesque dignissim. Eget aliquet nibh praesent tristique. Orci sagittis eu volutpat odio facilisis. Ut enim blandit volutpat maecenas volutpat blandit.', '2019-12-26 12:30:29', 1),
(53, 'Rizky Ja', 'rahmadianto018@gmail.com', '08132643222', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas maecenas pharetra convallis posuere morbi. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Risus viverra adipiscing at in tellus integer feugiat. Bibendum arcu vitae elementum curabitur vitae nunc. Velit scelerisque in dictum non consectetur a erat nam. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Platea dictumst vestibulum rhoncus est. Ut pharetra sit amet aliquam id diam maecenas ultricies. Sed risus pretium quam vulputate dignissim suspendisse. Ornare quam viverra orci sagittis eu volutpat odio. Vitae justo eget magna fermentum iaculis eu non. Viverra accumsan in nisl nisi. Curabitur gravida arcu ac tortor dignissim convallis aenean et.', '2019-12-31 15:53:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `message_reply` longtext NOT NULL,
  `reply_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`id`, `message_id`, `message_reply`, `reply_at`) VALUES
(7, 2, '<p>Baik terima kasih !</p>\r\n', '2019-12-26 12:30:29');

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
(8, 7, 'Message', 'message', 'fas fa-envelope', 1, 'message'),
(9, 6, 'Comment Reply', 'comment_reply', 'fas fa-reply', 1, 'comment_reply'),
(10, 7, 'Message Sent', 'message_sent', 'fas fa-reply', 1, 'message_sent');

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
-- Indexes for table `blog_image`
--
ALTER TABLE `blog_image`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `user_id` (`username`,`datetime`),
  ADD KEY `blog_id` (`blog_id`);

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
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
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
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1558381224;

--
-- AUTO_INCREMENT for table `blog_image`
--
ALTER TABLE `blog_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 04:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_blog`
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
(1558381224, 'Rizky Rahmadianto', 2, 'Lorem Ipsum', 'lorem-ipsum', 'content_1578748678.png', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy d', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n\r\n<h2>Mengapa kita menggunakannya?</h2>\r\n\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Dari mana asalnya?</h2>\r\n\r\n<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n', '2020-01-11 20:17:58', '0000-00-00 00:00:00', 0, 0, 1, 'Active'),
(1558381225, 'Rizky Rahmadianto', 2, 'Lorem Ipsum 2', 'lorem-ipsum-2', 'content_1578748763.png', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy d', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n\r\n<h2>Mengapa kita menggunakannya?</h2>\r\n\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Dari mana asalnya?</h2>\r\n\r\n<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n', '2020-01-11 20:19:23', '0000-00-00 00:00:00', 1, 0, 1, 'Active'),
(1558381226, 'Rizky Rahmadianto', 2, 'Lorem Ipsum 3', 'lorem-ipsum-3', 'content_1578748785.png', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy d', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n\r\n<h2>Mengapa kita menggunakannya?</h2>\r\n\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Dari mana asalnya?</h2>\r\n\r\n<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n', '2020-01-11 20:19:45', '0000-00-00 00:00:00', 0, 0, 1, 'Active'),
(1558381227, 'Rizky Rahmadianto', 2, 'Lorem Ipsum 4', 'lorem-ipsum-4', 'content_1578748802.png', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy d', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n\r\n<h2>Mengapa kita menggunakannya?</h2>\r\n\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Dari mana asalnya?</h2>\r\n\r\n<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n', '2020-01-11 20:20:02', '0000-00-00 00:00:00', 0, 1, 1, 'Active'),
(1558381228, 'Rizky Rahmadianto', 2, 'Lorem Ipsum 5', 'lorem-ipsum-5', 'content_1578748828.png', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy d', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n\r\n<h2>Mengapa kita menggunakannya?</h2>\r\n\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Dari mana asalnya?</h2>\r\n\r\n<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n', '2020-01-11 20:20:28', '0000-00-00 00:00:00', 0, 1, 1, 'Active'),
(1558381229, 'Rizky Rahmadianto', 1, 'Lorem Ipsum 6', 'lorem-ipsum-6', 'content_1578748845.png', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy d', '<h2>Apakah Lorem Ipsum itu?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n\r\n<p><a href=\"https://i.postimg.cc/yNY4CfZX/admin-21.png\"><img alt=\"\" src=\"https://i.postimg.cc/yNY4CfZX/admin-21.png\" xss=removed></a></p>\r\n\r\n<h2>Mengapa kita menggunakannya?</h2>\r\n\r\n<p>Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>\r\n\r\n<p> </p>\r\n\r\n<h2>Dari mana asalnya?</h2>\r\n\r\n<p>Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n', '2020-01-11 20:20:45', '2020-01-18 21:51:03', 0, 1, 1, 'Active'),
(1558381230, 'Rizky Rahmadianto', 2, 'Lorem Ipsum 7', 'lorem-ipsum-7', 'content_1578804970.png', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered al', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', '2020-01-12 11:56:10', '0000-00-00 00:00:00', 0, 1, 1, 'Active'),
(1558381231, 'Rizky Rahmadianto', 2, 'Lorem Ipsum 8', 'lorem-ipsum-8', 'content_1578804988.png', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered al', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', '2020-01-12 11:56:29', '0000-00-00 00:00:00', 0, 1, 1, 'Active'),
(1558381232, 'Rizky Rahmadianto', 2, 'Lorem Ipsum 9', 'lorem-ipsum-9', 'content_1578805006.png', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered al', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', '2020-01-12 11:56:46', '0000-00-00 00:00:00', 0, 1, 1, 'Active');

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
(1, 'Rizky Rahmadianto', 'rahmadianto018@gmail.com', '081111111111', '<p>My name is Rizky Rahmadianto and I am a graduate of Dian Nuswantoro University. My study field is Informatics Engineering and I have an interest with website developers / back-end dev. And I once made a thesis entitled \"Implementasi Pengolahan Citra dan Klasifikasi K-Nearest Neighbor untuk Mendeteksi Kualitas Telur Ayam\". </p>\r\n\r\n<p>I am remember of the first website I visited, Yahoo. A website that provides online mail services. I began to admire the website can be used to send, make, and delete letters. And that&#39;s where I have an interest in the website. Besides being interested in websites, I am also interested in drawing, music, and photography.</p>\r\n\r\n<p>I made this blog with CodeIgniter framework and for the template or display I get from Bootstrap with some parts that I have changed. And for pictures, I got it from Unsplash. I chose Unsplash because it provides good quality images and can be used freely. Because I don&#39;t have a schedule to go to Mars, so I made my own website with ❤️. And the website that I created this took approximately 1 month.</p>\r\n', 'fas fa-robot', 0);

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
(1, 1, 'https://twitter.com/RR_Rizky'),
(1, 4, 'https://github.com/RizkyRR'),
(1, 6, 'https://www.linkedin.com/in/rizky-rahmadianto-719925129/');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `visible` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `slug`, `visible`) VALUES
(11, 'asdasdsad', 'asdasdsad', 'invisible'),
(2, 'Multiple Access', 'multiple-access', 'visible'),
(14, 'qweqweqwe', 'qweqweqwe', 'invisible'),
(1, 'Single Access', 'single-access', 'visible'),
(0, 'Uncategory', 'uncategory', 'visible'),
(15, 'zxczxczxc', 'zxczxczxc', 'invisible');

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
(5, 2, 'Category', 'category-menu', 'fas fa-tags', 1, 'category-menu'),
(6, 2, 'Post', 'blog-post-menu', 'fas fa-blog', 1, 'blog-post-menu'),
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
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1558381253;

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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

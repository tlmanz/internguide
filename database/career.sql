-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2020 at 06:44 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.3.14-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(1000) DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `aphoto` varchar(1000) DEFAULT 'adminImages/default.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `name`, `lastname`, `phone`, `password`, `aphoto`, `created_at`) VALUES
(2, 'Tharuka', 'superadmin@mail.com', 'Tharuka', 'Mannapperuma', '0767745119', '$2y$10$rPCIJ2OLBp1tpNUmFYnmNOGM31nU44r0ZpTVxkDadL8d6QOs/kL92', 'adminImages/Tharuka.png', '2019-12-27 18:30:00'),
(10, 'Lakshan', 'lakshan@mail.com', 'Lakshan', 'Mannapperuma', '0710640571', '$2y$10$FHvN9KHwTCAXDI21S/hVGeci3zoR8S090n8LVGVHQGrhF7DjrwST2', 'adminImages/1580581740Lakshan.png', '2020-02-01 18:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE `customer_account` (
  `cid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 DEFAULT 'UPDATE YOUR PROFILE FIRST',
  `lastname` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(100) DEFAULT NULL,
  `nic` varchar(100) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `field` varchar(1000) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `linkedin` varchar(1000) DEFAULT '#',
  `web` varchar(1000) DEFAULT '#',
  `description1` varchar(2000) DEFAULT NULL,
  `cphoto` varchar(1000) DEFAULT 'userImages/default.png',
  `cv` varchar(1000) DEFAULT '#',
  `accept` varchar(1000) DEFAULT 'dummy',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`cid`, `username`, `firstname`, `lastname`, `dob`, `age`, `nic`, `gender`, `field`, `address`, `telephone`, `email`, `password`, `gpa`, `linkedin`, `web`, `description1`, `cphoto`, `cv`, `accept`, `created_at`) VALUES
(1, 'Shehan', 'Shehan', 'Ruchira', '1996-05-20', 24, '96004500v', 'm', 'Electronic and Telecommunication Engineering', 'No.10, \r\nGalle road, \r\nMoratuwa', '0704561237', 'shehan@mail.com', '$2y$10$ycSCZDFSYEVb8u3GhjvgReSryB9YYONa3rpQuLzikgbYjC03IdK1W', 3.7502, 'www.linkedin.com', '#', 'To be a decent person who is respected by family, friends, loved ones and my chosen communities. I am here to make a positive difference despite being imperfect. My work reflects my values and enables me to travel widely and enhance the lives of others. People will remember me for being there to lend a hand, keeping an open mind, and for getting involved in issues that matter most to me', 'userImages/Shehan.png', 'studentCV/Shehan.pdf', 'dummy,paraqumtech,wso2', '2020-02-01 08:02:47'),
(2, 'Savindi', 'Savindi', 'Sathsarani', '1997-03-25', 23, '974002987v', 'f', 'Bio Medical Engineering', 'No.2/3, Kandy road, Mawanella', '0776545789', 'savindi@mail.com', '$2y$10$r4U4ZLrFSW1Im2cAFBrGfezKYBBgqUs76ottH9HTqgVBuOuOjgt2W', 3.7825, '#', '#', 'â€œMy life purpose, to love and honor God, is foundational. My professional purpose is to be a â€˜Builderâ€™ of a future that transcends ways of working for the wellbeing of people and businesses throughout the world.â€', 'userImages/Savindi.jpg', 'studentCV/Savindi.pdf', 'dummy', '2020-02-01 08:44:49'),
(3, 'Kavidu', 'Kavidu', 'Ruwan', '2004-12-28', 12, '976554432V', 'm', 'Chemical and Process Engineering', 'Ihala Kootte\r\nColombo 4', '0767745119', 'kavidu@mail.com', '$2y$10$IGi4Xt.2mJEVeUhWG7MKx.3npMBHddGmTFdDNnySWFNLNPV6RaRXu', 3.2, '#', '#', 'Nothing', 'userImages/default.png', 'studentCV/Kavidu.pdf', 'dummy,wso2', '2020-02-01 11:52:04'),
(4, 'Gayan', 'Gayan', ' Chathuranga', '1997-04-15', 23, '976566654V', 'm', 'Other', 'Ehelagaha Hena\r\nGalbadagama', '0765565442', 'gayan@mail.com', '$2y$10$POvBlGAfuQ.lCjjR3B.gD.CjRL/86PEN.USOENn00MMqfwmZBRdFO', 3.2, 'www.linkein.com/gayanchathuranga', '#', 'I\'m a Student at Agriculture School Labuduuwa', 'userImages/Gayan.jpg', '#', 'dummy', '2020-02-01 20:14:54'),
(5, 'Amila', 'Amila', 'Chinthaka', '1997-02-16', 22, '970470375v', 'm', 'Electronic and Telecommunication Engineering', 'Galle Road, Moratuwa.', '0766077839', 'acamilachinthaka@gmail.cm', '$2y$10$rOCFkgrQ6JrvsdItGS9rsOScd7ETuBDMKT8zcEZkg2LVAlwBoPzU.', 3.4, '#', '#', 'Test', 'userImages/default.png', '#', 'dummy', '2020-02-02 08:00:10'),
(6, 'harindu.ravin@gmail.com', 'UPDATE YOUR PROFILE FIRST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'harindu.ravin@gmail.com', '$2y$10$U4RxFgzS75rGPf3lr15Lpu2MlGiW2Oc0bnuXSbuRCn1eAs5SfcwDm', NULL, '#', '#', NULL, 'userImages/default.png', '#', 'dummy', '2020-02-02 08:38:54'),
(7, 'Achira Sandeepa', 'UPDATE YOUR PROFILE FIRST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'achira611@gmail.com', '$2y$10$QYvYQ34Up14EsLHYN.M0MOnjFXYbCIlDWX9CPBSLkw68lvynvPA7y', NULL, '#', '#', NULL, 'userImages/default.png', '#', 'dummy', '2020-02-02 08:42:48'),
(8, 'Janith', 'Janith', 'Gimhana', '1997-12-05', 23, '972007987v', 'm', 'Civil Engineering', 'No.100, Puththalama Road, Waththala', '0714567891', 'janithg@stu.com', '$2y$10$iK1YOAM2Tj6wmY.sxgfQHe1ZnJOF7j7kexRCb0ngAOczA9VB1ftje', 3.78, '#', '#', 'I\'m me!', 'userImages/Janith.jpg', 'studentCV/Janith.pdf', 'dummy', '2020-02-11 17:54:16'),
(9, 'Shehs', 'UPDATE YOUR PROFILE FIRST', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123456789@gmsil.com', '$2y$10$TEbeKIwiwVgADrIz0szKNOAPqEcvKkuwkpp2dP4UQg7khwW1do2Ya', NULL, '#', '#', NULL, 'userImages/default.png', '#', 'dummy', '2020-03-10 09:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(3000) DEFAULT 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  `ename` varchar(100) CHARACTER SET latin1 DEFAULT 'UPDATE YOUR PROFILE FIRST',
  `phone` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `mainfield` varchar(500) DEFAULT NULL,
  `field` varchar(1000) DEFAULT NULL,
  `introduction` varchar(3000) CHARACTER SET latin1 DEFAULT NULL,
  `vision` varchar(1000) DEFAULT NULL,
  `mission` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) CHARACTER SET latin1 DEFAULT 'companyImages/default.png',
  `photo2` varchar(1000) DEFAULT 'companyImages/default2.png',
  `photo3` varchar(1000) DEFAULT 'companyImages/default3.png',
  `photo4` varchar(1000) DEFAULT 'companyImages/default4.png',
  `photo5` varchar(500) DEFAULT 'companyImages/default5.png',
  `photo6` varchar(500) DEFAULT 'companyImages/default6.png',
  `pin` varchar(1000) DEFAULT NULL,
  `linkedin` varchar(1000) DEFAULT NULL,
  `facebook` varchar(1000) DEFAULT NULL,
  `twitter` varchar(1000) DEFAULT NULL,
  `student` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `email`, `password`, `description`, `ename`, `phone`, `address`, `mainfield`, `field`, `introduction`, `vision`, `mission`, `image`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`, `pin`, `linkedin`, `facebook`, `twitter`, `student`, `created_at`) VALUES
(1, 'paraqumtech', 'paraqum@mail.com', '$2y$10$OTpeMQYrpYif.3NsN7o0UesBCWSKsveYjyw8btbxJupDzr8TIWcTu', 'Paraqum Technologies provides cutting-edge, high-performance products and solutions for Network traffic analysis and control. We specialize in providing the right kind of network intelligence to boost the productivity of your organization. Whatever the size and shape of your business, we have the right solution for you.', 'Paraqum Technologies', '0716470902', 'Paraqum Technologies (Pvt) Ltd, 106, Bernard Botejue Business Park,', 'Electronic and Telecommunication', 'Robotics,Electronics,Software', 'Paraqum Technologies was found in 2013 as part of an initiative by the Department of Electronic and Telecommunication Engineering, University of Moratuwa as means of expanding the Electronic industry in Sri Lanka. We were one of the first companies to start developing Video compression solutions based on the latest High Efficiency Video Coding (HEVC) standard which was published in January 2013. By December 2014, Paraqum Technologies became the first to demonstrate 4K real-time HEVC decoding on a commercial grade FPGA ï¿½ breaking the frequency barrier to decode 4K in real-time at less than 150 MHz. Simultaneously we were developing real-time Network Analytics solutions based on Deep Packet Inspection technology which can analyze high speed network traffic in real-time up to the application level. In early 2016, Paraqum Technologies released the first of a series of Network Analytic products which provide real-time visibility in high-speed networks up to application level. These network analytic products give the user unprecedented visibility on whatï¿½s happening in his network at any given moment. This was later followed by the release of the Traffic Shaper product series, which not only provides visibility but also gives the user the ability to exercise unprecedented control over the usage of his network, which in turn brings about a host of advantages that increases productivity. With this networking product lineup, Paraqum Technologies is able to provide a complete network management solution to a broader customer segment ranging from small scale businesses to large enterprises as well as Internet Service Providers and Telecom Operators. By now our product line up has been revamped through integration of advanced features and performance optimization to meet the heightened customer demands!', 'Make a better world for everyone.', 'To beat Elon Musk.', 'companyImages/paraqumtechlogo.jpg', '../admin/src/assets/../assets/companyImages/slider/paraqumtechslide1.jpg', '../admin/src/assets/../assets/companyImages/slider/paraqumtechslide2.jpg', '../admin/src/assets/../assets/companyImages/slider/paraqumtechslide3.jpg', '../admin/src/assets/../assets/companyImages/slider/paraqumtechslide4.jpg', '../admin/src/assets/../assets/companyImages/slider/paraqumtechslide5.jpg', 'www.paraqum.com', 'No Linkedin', 'https://www.facebook.com/paraqum', 'https://twitter.com/paraqum', 'Janith,Kavidu,Savindi,Shehan,', '2020-01-26 18:30:00'),
(17, 'MIT', 'mit@mail.com', '$2y$10$JXP2IEsHfm5NyVo0QZxzmubKGJThsCya1RrgRmbRnZNCuQ0Zx1zQi', 'Business at the speed of what’s next.\r\nMillenniumIT ESP has always stood for purpose-driven technology solutions for businesses across the globe. We offer agile, adaptive and rapidly evolving System Integration Solutions that anticipate and solve both current and future business challenges.\r\nWe deliver solutions that accelerate and optimize every aspect of your business and can be tailored to the individual needs of your business.\r\n\r\nWe partner with you in transforming your technology architecture so that it is seamlessly aligned to a digitally empowered future. But most of all, we deliver the ability to delight, reduce effort, improve efficiency, answer wants and not just needs, for your stakeholders, employees and customers.', 'Millennium IT', '0117484000', '48 Sir Marcus Fernando Road, Colombo 00700', 'Electronic and Telecommunication', 'Banking and Finance,Telecommunication,Manufacturing', 'MillenniumIT is a Sri Lanka-based information technology firm that specialises in electronic trading systems, and capital market technology solutions, and is headquartered in Colombo, Sri Lanka', 'Reimagine today. Reinvent tomorrow.', 'We are pre-emptive to foresee opportunities.', 'companyImages/MITlogo.png', '', '', '', '', '', 'www.millenniumitesp.com', 'www.linkedin.com/company/millenniumit', 'www.facebook.com/millenniumitsolutions/', 'www.twitter.com/millenniumit', 'Shehan,', '2020-02-01 11:40:20'),
(18, 'wso2', 'wso2@mail.com', '$2y$10$RR8H57NcPQiO2WHXX3k1WOjfnKyji6NJZQkugYm5MszKtUd53ycBi', 'WSO2 is the world’s #\'1 open source integration vendor, helping digitally driven organizations become integration agile. Customers choose us for our broad, integrated platform approach to open source and agile transformation methodology. The company’s hybrid platform to develop, re-use, run and manage integrations prevents lock-in through open source running on-premises or in the cloud. Today, 100s of leading brands and 1,000s of global projects execute 5 trillion transactions annually using WSO2 integration technologies. Visit https://wso2.com to learn more.', 'WSO2', '0112322123', '20, Palm Grove,\r\nColombo 3.', 'Electronic and Telecommunication', 'SOA, Middleware Platform, API Management, Apache Software Foundation, Enterprise solutions, Enterprise Integration, Platform-as-a-Service, Open Source, Cloud Computing, Identity and Access Management , Security, Analytics', 'WSO2 enables the composable enterprise. Our open-source, API-first, and decentralized approach helps developers and architects to be more productive and rapidly build digital products to meet demand.', 'Make Life Better', 'World With Better Outcomes', 'companyImages/1580559696wso2logo.png', 'companyImages/default2.png', 'companyImages/default3.png', 'companyImages/default4.png', 'companyImages/default5.png', 'companyImages/default6.png', 'www.wso2.com', 'www.linkedin.com/company/wso2', 'www.facebook.com/WSO2Inc/', 'www.twitter.com/wso2', 'Janith,Shehan,Kavidu,', '2020-02-01 12:21:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`cid`,`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer_account`
--
ALTER TABLE `customer_account`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

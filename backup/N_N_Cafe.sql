-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 06:41 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `N&N_Cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `message` varchar(500) COLLATE utf8_bin NOT NULL,
  `greeting` int(6) UNSIGNED DEFAULT '0',
  `problem` int(6) UNSIGNED DEFAULT '0',
  `orders` int(6) UNSIGNED DEFAULT '0',
  `search` int(6) UNSIGNED DEFAULT '0',
  `types` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `answer` varchar(500) COLLATE utf8_bin NOT NULL,
  `id` int(6) UNSIGNED NOT NULL,
  `sub_feature` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`message`, `greeting`, `problem`, `orders`, `search`, `types`, `answer`, `id`, `sub_feature`, `count`) VALUES
('เร้าเตอร์ไฟขึ้นสีแดง เข้าอินเตอร์เน็ตไม่ได้', 2, 8, 0, 2, 'problem', 'ลองปิดแล้วเปิดใหม่ดูนะคะ', 3, 'เร้า ตอ ไฟ ขึ้น สีแดง เข้า อินเตอร์เน็ต ไม่ได้ ', 0),
('มีไหมครับ', 2, 3, 1, 3, 'search', 'มีค่ะ (ส่งลิงค์)', 7, 'มี ไหม ครับ ', 0),
('มี มั๊ยคะ', 1, 1, 0, 2, 'search', 'รุ่นนี้ของหมดแล้วะ', 8, 'มี คะ ', 2),
('หวัดดี', 2, 1, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับค่ะ', 16, 'หวัด ดี ', 2),
('เครื่องมีอาการติดๆ ดับๆ ครับผมควรทำอย่างไรดี', 3, 10, 0, 1, 'problem', 'ลองปิดเครื่องสัก 30 นาทีแล้วค่อยเปิดใหม่ค่ะ', 23, 'เครื่อง มี อาการ ติดๆ ดับ ครับผม ควร ทำ อย่างไร ดี ', 0),
('หวัดดีจ้า', 3, 1, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับค่ะ', 33, 'หวัด ดี จ้า ', 0),
('หวัดดีค้าบ', 3, 1, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับค่ะ', 37, 'หวัด ดี ค้าบ ', 0),
('ดีคร้าบ', 2, 1, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับ', 99, 'ดี คร้าบ ', 1),
('เร้าเตอร์ไฟติดครบหมด แต่ใช้เน็ตไม่ได้', 3, 10, 0, 2, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 100, 'เร้า ตอ ไฟ ติด ครบ หมด แต่ ใช้ เน็ต ไม่ได้ ', 0),
('ใช้เน็ตไม่ได้ครับ', 1, 4, 1, 1, 'problem', 'ไม่ทราบว่าไฟที่ตัวเร้าเตอร์ติดกี่ดวงคะ มีไฟสีแดงรึเปล่า', 118, 'ใช้ เน็ต ไม่ได้ ครับ ', 0),
('ดีฮะ', 2, 1, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับสู่ร้าน NJ Network Devices ไม่ทราบว่ามีอะไรให้ช่วยคะ', 119, 'ดี ฮะ ', 0),
('ดีจ้า', 2, 1, 0, 0, 'greeting', 'ดีครัช', 132, 'ดี จ้า ', 2),
('Hello', 1, 0, 0, 0, 'greeting', 'ยินดีต้อนรับสู่ร้าน NJ Network Devices ค่ะ ', 133, 'Hello ', 1),
('ดีจ่ะ', 1, 1, 0, 0, 'greeting', 'ยินดีต้อนรับสู่ร้าน NJ Network Devices ค่ะ ', 135, 'ดี ', 0),
('หวัดดีครัฟ', 2, 1, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับ:;สวัสดีค่ะ ไม่ทราบว่ามีอะไรให้ช่วยคะ:;สวัสดีครับ NJ Network Devices ยินดีให้บริการครับ:;', 143, 'หวัด ดี ', 16),
('เร้าเตอร์ใช้เน็ตไม่ได้อะครับควรทำไงดีมีคำแนะนำไหมครับ', 6, 15, 2, 6, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 162, 'เร้า ตอ ใช้ เน็ต ไม่ได้ อะ ครับ ควร ทำ ไง ดี มี คำแนะนำ ไหม ครับ ', 0),
('มีปัญหาเล่นเน็ตwifiบ้านไม่ได้เลยค่ะ คือเครื่องเร้าเตอร์รับwifiปกติดี ที่มือถือกะคอมไฟขึ้น แต่เล่นเน็ตเข่าเว๊ปไม่ได้เลย ส่งได้แต่ข้อความไลน์เป็นพักๆ', 3, 34, 0, 4, 'problem', 'ลองปิดแล้วเปิดใหม่ดูนะคะ', 164, 'มีปัญหา เล่น เน็ต wifi บ้าน ไม่ได้ เลย ค่ะ คือ เครื่อง เร้า ตอ รับ wifi ปกติ ดี ที่ มือถือ กะ คอม ไฟ ขึ้น แต่ เล่น เน็ต เข่า ไม่ได้ เลย ส่ง ได้ แต่ ข้อความ ไลน์ เป็นพักๆ ', 1),
('เกิดอาการไฟ DSL ของrouter กระพริบบ่อยมาก ทำให้ต่อเน็ทไม่ได้ ต้องปิดแล้วเปิดใหม่ บางครั้งปิดเปิดแล้วก็ยังกระพริบอยู่เหมือนเดิม', 1, 26, 0, 2, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ:;ลองปิดแล้วเปิดใหม่ดูนะคะ:;', 166, 'เกิด อาการ ไฟ DSL ของ router กระพริบ บ่อย มาก ทำให้ ต่อ เน็ท ไม่ได้ ต้อง ปิด แล้ว เปิด ใหม่ บางครั้ง ปิด เปิด แล้วก็ ยัง กระพริบ อยู่ เหมือนเดิม ', 0),
('อินเตอร์เน็ตจะติดๆดับๆครับ ไฟที่เร้าเตอร์ตรง Internet ก็จะติดๆดับๆ\nถ้าไม่ติดๆดับๆ', 3, 19, 1, 4, 'problem', 'ลองปิดแล้วเปิดใหม่ดูนะคะ', 167, 'อินเตอร์เน็ต จะ ติดๆ ดับ ครับ ไฟ ที่ เร้า ตอ ตรง Internet ก็ จะ ติดๆ ดับ ถ้า ไม่ ติดๆ ดับ ', 0),
('เกิดอาการไฟ DSL ของrouter กระพริบบ่อยมาก ทำให้ต่อเน็ทไม่ได้ ต้องปิดแล้วเปิดใหม่\nบางครั้งปิดเปิดแล้วก็ยังกระพริบอยู่เหมือนเดิม', 1, 26, 0, 2, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ:;ลองปิดแล้วเปิดใหม่ดูนะคะ:;', 168, 'เกิด อาการ ไฟ DSL ของ router กระพริบ บ่อย มาก ทำให้ ต่อ เน็ท ไม่ได้ ต้อง ปิด แล้ว เปิด ใหม่ บางครั้ง ปิด เปิด แล้วก็ ยัง กระพริบ อยู่ เหมือนเดิม ', 0),
('มีของไหมนิ', 1, 3, 0, 3, 'search', 'มีค่ะ ขิ้นไหนค่ะ', 171, 'มี ของ ไหม ', 0),
('เร้าเตอร์เปิดแล้วเน็ตใช้ไม่ค่อยได้เลยทำไงดี', 3, 13, 0, 2, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 172, 'เร้า ตอ เปิด แล้ว เน็ต ใช้ ไม่ ค่อย ได้ เลย ทำ ไง ดี ', 0),
('อยากได้เร้าเตอร์', 1, 2, 0, 3, 'search', 'แนะนำรุ่นนี้เลยค่ะ ASUS Dual-band Wireless-AC1200 router RT-AC1200G+', 176, 'อยากได้ เร้า ตอ ', 0),
('ของที่ซื้อไปมีปัญหาอ่ะครับ มันต่อเน็ตไม่ได้อ่ะ ทำไงดี?', 3, 15, 1, 3, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 179, 'ของ ที่ ซื้อ ไป มีปัญหา อ่ะ ครับ มัน ต่อ เน็ต ไม่ได้ อ่ะ ทำ ไง ดี ', 1),
('ของที่ซื้อไปมันมีปัญหา ต่อเน็ตไม่ได้ ทำไงดี', 2, 12, 0, 2, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 180, 'ของ ที่ ซื้อ ไป มัน มีปัญหา ต่อ เน็ต ไม่ได้ ทำ ไง ดี ', 0),
('เร้าเตอร์ใช้งานติดๆ ดับๆ เน็ตเหวี่ยงมากทำอย่างไรดีครับ', 4, 12, 1, 3, 'problem', 'ลองปิดเครื่องสัก 30 นาทีแล้วค่อยเปิดใหม่ค่ะ', 185, 'เร้า ตอ ใช้งาน ติดๆ ดับ เน็ต เหวี่ยง มาก ทำ อย่างไร ดี ครับ ', 0),
('ดีจร้าา', 2, 1, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับค่ะเปิดใหม่ค่ะ', 194, 'ดี จร ', 0),
('ไฟขึ้นครบแต่เข้าอินเตอร์เน็ตไม่ได้ครับ', 2, 8, 1, 1, 'problem', 'ลองปิดแล้วเปิดใหม่ดูก่อนนะคะ:;', 201, 'ไฟ ขึ้น ครบ แต่ เข้า อินเตอร์เน็ต ไม่ได้ ครับ ', 0),
('ไฟเร้าเตอร์มีสีแดงไม่สามารถเข้าอินเตอร์เน็ตได้ทำไงดีอะครับมีคำแนะนำอะรไหม', 7, 19, 1, 6, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 203, 'ไฟ เร้า ตอ มี สีแดง ไม่ สามารถ เข้า อินเตอร์เน็ต ได้ ทำ ไง ดี อะ ครับ มี คำแนะนำ อะ ไหม ', 1),
('ไฟเร้าเตอร์ไม่ติดมีไฟสีแดงขึ้น', 5, 9, 0, 3, 'problem', 'ลองปิดแล้วเปิดใหม่ดูนะคะ', 229, 'ไฟ เร้า ตอ ไม่ ติด มี ไฟ สีแดง ขึ้น ', 0),
('สวัสดี', 1, 0, 0, 0, 'greeting', 'สวัสดีค่ะ ยินดีต้อนรับค่ะ', 237, 'สวัสดี ', 17),
('ของที่ซื้อไปมีปัญหาอ่ะครับ มันต่อเน็ตไม่ได้อ่ะ ทำไงดี? แงงงงงงงง', 3, 15, 1, 3, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 246, 'ของ ที่ ซื้อ ไป มีปัญหา อ่ะ ครับ มัน ต่อ เน็ต ไม่ได้ อ่ะ ทำ ไง ดี แง งง งง งง ', 0),
('ของ ที่ ซื้อ ไป มีปัญหา อ่ะ มัน ต่อ เน็ต ไม่ได้ ', 0, 10, 0, 2, 'problem', 'เดี๋ยวทางเราจะตรวจสอบ หากแก้ไขได้แล้วจะแจ้งให้ทราบนะคะ', 373, 'ของ ที่ ซื้อ ไป มีปัญหา อ่ะ มัน ต่อ เน็ต ไม่ได้ ', 0),
('ขอบใจ', 1, 0, 0, 0, 'greeting', '', 414, 'ขอบใจ ', 0),
('มีเร้าเตอร์สัญญานรองรับ', 2, 4, 0, 6, 'search', 't e S t', 415, 'มี เร้า ตอ สัญญา นร รับ ', 0),
('มีสินค้าที่เกี่ยวกับ ไหม', 1, 3, 0, 5, 'search', 'มีเยอะเลย', 417, 'มี สินค้า ที่ เกี่ยวกับ ไหม ', 0),
('ร้านนี้ขายอะไรครับ?', 1, 1, 5, 1, 'order', 'ขายเร้าเตอร์ครับผมลูกค้าสามารถสอบถามรุ่นได้เลยครับผม', 423, 'ร้าน นี้ ขาย อะไร ครับ ', 0),
('มีรุ่นอะไรบ้างครับ', 5, 2, 1, 2, 'greeting', 'ตามนี้เลยครับผม  http://35.220.204.174/WebProject/index.php#:;', 424, 'มี นอ ไร บ้าง ครับ ', 0),
('ASUS Dual-band Wireless-AC1200 router RT-AC1200G+', 0, 0, 0, 0, 'search', 'test', 429, '', 0),
('ASUS Dual-band Wireless-AC1200 router RT-AC1200G+asdasdasd', 0, 0, 0, 0, 'search', 'test', 430, '', 0),
('linksys lss-ea9300-ah max-stream ac4000 tri-band wi-fi router', 0, 0, 0, 0, 'search', 'asdasd:;', 433, 'linksys lss ea9300 ah max stream ac4000 tri band wi fi router ', 0),
('D-Link COVR-C1203 COVR AC1200 Dual Band Whole Home Wi-Fi System', 0, 0, 0, 0, 'search', 'test', 437, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `types` varchar(500) COLLATE utf8_bin NOT NULL,
  `features` varchar(500) COLLATE utf8_bin NOT NULL,
  `sub_features` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`types`, `features`, `sub_features`) VALUES
('greeting', 'หวัด ดี หวัด ดี จ้า หวัด ดี ค้าบ ดี คร้าบ ดี ฮะ ดี จ้า Hello ดี หวัด ดี ดี จร ไฟ เร้า ต้อ ม่าย ติด รัช ทำ งา ดี อ่า สวัสดี ขอบใจ มี นอ ไร บ้าง ครับ ', 'ม่าย นอ หวัด จ้า จร ต้อ มี ไร บ้าง ครับ ค้าบ ฮะ งา สวัสดี ดี Hello อ่า รัช ทำ ขอบใจ คร้าบ ไฟ เร้า ติด '),
('order', 'ร้าน นี้ ขาย อะไร ครับ ', 'ร้าน นี้ ขาย อะไร ครับ '),
('problem', 'เร้า ตอ ไฟ ขึ้น สีแดง เข้า อินเตอร์เน็ต ไม่ได้ ไฟ ขึ้น ครบ แต่ เข้า อินเตอร์เน็ต ไม่ได้ ครับ เครื่อง มี อาการ ติดๆ ดับ ครับผม ควร ทำ อย่างไร ดี เร้า ตอ ไฟ ติด ครบ หมด แต่ ใช้ เน็ต ไม่ได้ ใช้ เน็ต ไม่ได้ ครับ เร้า ตอ ใช้ เน็ต ไม่ได้ อะ ครับ ควร ทำ ไง ดี มี คำแนะนำ ไหม ครับ ', 'แล้ว บ่อย อย่างไร ดี แล้วก็ เหมือนเดิม เร้า เน็ต wifi คือ มือถือ ใหม่ เครื่อง บ้าน อยู่ สามารถ ดับ สีแดง อินเตอร์เน็ต ทำ อะ ที่ เน็ท ต้อง ตอ ควร มีปัญหา ติดๆ แต่ ซื้อ ครับผม คำแนะนำ ค่ะ กะ ข้อความ มาก เปิด ใช้ ติด หมด กระพริบ อาการ เล่น ทำให้ ต่อ บางครั้ง ตรง ไม่ อ่ะ ส่ง รับ เกิด ค่อย ขึ้น มี ครบ ครับ ไง ปกติ คอม เข่า เข้า ไลน์ เหวี่ยง ได้ เป็นพักๆ ยัง Internet ถ้า มัน ไม่ได้ router ไป ของ ไหม เลย DSL ปิด จะ ก็ ใช้งาน ไฟ '),
('search', 'มี ไหม ครับ มี คะ มี ของ ไหม อยากได้ เร้า ตอ d link dap 1665 wireless ac1200 mu mimo dual band range extender access point 7in1 multi mode device มี d link ไหม ครับ edimax br 6428ns 300mbps wireless broadband router linksys lss ea9300 ah max stream ac4000 tri band wi fi router มี เร้า ตอ สัญญา นร รับ มี สินค้า ที่ เกี่ยวกับ ไหม d link covr 3902 ac3900 covr wi fi system ', 'mimo stream covr เกี่ยวกับ ac3900 ครับ wireless multi broadband ah fi ตอ extender access edimax สัญญา สินค้า นร link dual device br 300mbps max 1665 ac1200 point router tri system ไหม คะ band range 6428ns ac4000 linksys รับ มี อยากได้ เร้า d 7in1 mode ที่ 3902 ของ dap mu lss ea9300 wi ');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `des` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `des`, `img`, `amount`) VALUES
(49, 'D-Link COVR-3902 AC3900 COVR Wi-Fi System', 6990, 'ประสิทธิภาพสูง : AC3900 Wi-Fi สามารถส่งสัญญาณได้แรง เร็ว และไกล สำหรับการสตรีมมิ่งวีดีโอ 4Kและเหมาะกับการเล่นเกม โดยเราท์เตอร์รุ่นนี้รองรับคลื่นความถี่ทั้ง 2.4Ghz และ 5Ghz', './img/D-Link COVR-3902 AC3900 COVR Wi-Fi System.jpg', 2),
(50, 'D-Link DAP-1665 Wireless AC1200 MU-MIMO Dual Band Range Extender Access Point (7in1 Multi-Mode Device)', 2890, 'DAP-1665 Wireless Access Point Dual Band(2.4Ghz and 5Ghz) AC1200 เพิ่มความเร็วโดยเทคโนโลยี 802.11ac ล่าสุดมอบความเร็วสูงถึง 1200 Mbps ดังนั้นคุณสามารถถ่ายโอนไฟล์ขนาดใหญ่อย่างรวดเร็ว', './img/D-Link DAP-1665 Wireless AC1200 MU-MIMO Dual Band Range Extender Access Point (7in1 Multi-Mode Device).jpg', 1),
(51, 'Linksys LSS-EA9300-AH Max-Stream AC4000 Tri-Band Wi-Fi Router', 9990, 'Linksys LSS-EA9300-AH Max-Stream AC4000 เราท์เตอร์รุ่นนี้รองรับการใช้งานสองคลื่นความถี่ คือ 2.4Ghz และ 5Ghz สามารถส่งสัญญาณได้ไกล', './img/Linksys LSS-EA9300-AH Max-Stream AC4000 Tri-Band Wi-Fi Router.jpg', 2),
(52, 'Edimax BR-6428NS 300Mbps Wireless Broadband Router', 1070, 'EDIMAX BR-6428nS ถูกออกแบบด้วยกรีนเทคโนโลยี ด้วยการตรวจจับการถ่ายโอนข้อมูล เมื่อมีการถ่ายโอนข้อมูลเราท์เตอร์จึงจะใช้พลังงาน โดยเราท์เตอร์นี้สามารถใช้ประสิทธิภาพได้สูงสุดในขณะที่ลดการใช้พลังงานได้ 66% \r\nและขณะ full loading ใช้พลังงานเพียง 50% ของเราท์เตอร์ทั่วไป เราท์เตอร์รุ่นนี้รองรับคลื่นความถี่ 2.4Ghz', './img/Edimax BR-6428NS 300Mbps Wireless Broadband Router.jpg', 5),
(53, 'ASUS Dual-band Wireless-AC1200 router RT-AC1200G+', 3890, 'ASUS RT-AC1200G+ is Router/Access Point that use AC technology or 5Ghz 1167 Mbps, Gigabit one WAN interface, \r\nand four 100/1000 Mbps LAN interface, four 5 dBi antenna (unremovable) support Wireless AC at 300 Mbps on 2.4GHz and 867 Mbps \r\non 5GHz, with Wireless Router mode and Access Point mode.', './img/ASUS Dual-band Wireless-AC1200 router RT-AC1200G+.jpg', 5),
(54, 'CS@ AmpliFi Mesh Wi-Fi System', 15900, 'The AmpliFiâ„¢ HD (High Density) System includes a router base station and two wireless super mesh points for maximum Wi-Fi coverage throughout your home.', '/WebProjectTest/img/CS@ AmpliFi Mesh Wi-Fi System.jpg', 5),
(55, 'TP-Link Access Point TL-WA801ND Wireless N 300Mbps', 890, 'Wireless max speed up to 300Mbps, for videos streaming, sound streaming, and online game. support multiple modes, AP Mode, Multi-SSID Mode, Client Mode, Repeater Mode (WDS / Universal), Bridge Mode', '/WebProject/img/TP-Link Access Point TL-WA801ND Wireless N 300Mbps.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oldmsg`
--

CREATE TABLE `oldmsg` (
  `id` varchar(20) COLLATE utf8_bin NOT NULL,
  `message` varchar(535) COLLATE utf8_bin NOT NULL,
  `status` int(11) DEFAULT NULL,
  `orderold` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `oldmsg`
--

INSERT INTO `oldmsg` (`id`, `message`, `status`, `orderold`) VALUES
('1868064243272013', 'โน๊ตบุ๊ก', 0, 'ชื่อสินค้า : D-Link COVR-3902 AC3900 COVR Wi-Fi System\nเป็นจำนวน : 3\nราคารวมทั้งหมด 20970'),
('2062155400528237', 'มีเลขธนาคารไหม', 0, 'ชื่อสินค้า : Edimax BR-6428NS 300Mbps Wireless Broadband Router\nเป็นจำนวน : 3\nราคารวมทั้งหมด 3210'),
('2147298558689835', 'ลดราคาได้ไหมครับ', 0, 'ชื่อสินค้า : D-Link DAP-1665 Wireless AC1200 MU-MIMO Dual Band Range Extender Access Point (7in1 Multi-Mode Device)\nเป็นจำนวน : 1000\nราคารวมทั้งหมด 2890000'),
('2195244300499005', 'มีเร้าเตอร์สัญญานไกลๆไหม', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `store_info`
--

CREATE TABLE `store_info` (
  `id` int(11) NOT NULL,
  `store_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `bank_path` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `store_info`
--

INSERT INTO `store_info` (`id`, `store_name`, `bank_path`) VALUES
(1, 'View Shoes', './bank/bank_pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`) VALUES
(1, 'Nuttapol Phongudom', 'admin', '12345', 'admin'),
(2, 'Pawan Panphinit', 'nont', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wordrank`
--

CREATE TABLE `wordrank` (
  `id` int(20) NOT NULL,
  `word` varchar(3000) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wordrank`
--

INSERT INTO `wordrank` (`id`, `word`) VALUES
(10, 'wireless mbps router 4ghz network 5ghz technology support point mode '),
(11, 'wireless power 4ghz network router technology support latest performance dual '),
(12, 'wireless network router power 4ghz br-6428ns wi-fi dual latest 5ghzthe '),
(13, 'wireless router power network 4ghz wi-fi dual latest performance technology '),
(14, 'สวัสดีครับสวัสดีค่ะเร้าเตอร์ไฟขึ้นสีแดง เข้าอินเตอร์เน็ตไม่ได้ไฟขึ้นครบแต่เข้าอินเตอร์เน็ตไม่ได้ครับอยากได้เร้าเตอร์ที่ส่งสัญญาณได้ไกลๆอยากได้เร้าเตอร์ที่ส่งสัญญาณ 5ghz ได้ครับมี rt-ac1200g+ ไหมครับมี asus d-link covr-3902 มั๊ยคะ '),
(15, 'เข้าอินเตอร์เน็ตไม่ได้ไฟขึ้นครบแต่เข้าอินเตอร์เน็ตไม่ได้ครับอยากได้เร้าเตอร์ที่ส่งสัญญาณได้ไกลๆอยากได้เร้าเตอร์ที่ส่งสัญญาณ 5ghz asus ไหมครับมี d-link covr-3902 เร้าเตอร์ไฟขึ้นสีแดง rt-ac1200g+ มั๊ยคะ ได้ครับมี '),
(16, 'เร้าเตอร์ไฟขึ้นสีแดง ได้ครับมี rt-ac1200g+ ไหมครับมี มั๊ยคะ เข้าอินเตอร์เน็ตไม่ได้ไฟขึ้นครบแต่เข้าอินเตอร์เน็ตไม่ได้ครับอยากได้เร้าเตอร์ที่ส่งสัญญาณได้ไกลๆอยากได้เร้าเตอร์ที่ส่งสัญญาณ 5ghz asus d-link covr-3902 '),
(17, 'wireless router network power 4ghz latest technology br-6428ns support performance ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `message_2` (`message`),
  ADD UNIQUE KEY `message_4` (`message`),
  ADD KEY `message_3` (`message`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`types`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oldmsg`
--
ALTER TABLE `oldmsg`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `store_info`
--
ALTER TABLE `store_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wordrank`
--
ALTER TABLE `wordrank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `store_info`
--
ALTER TABLE `store_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wordrank`
--
ALTER TABLE `wordrank`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

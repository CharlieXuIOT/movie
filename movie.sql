-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.8-MariaDB
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `movie`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `cash` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `permission` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `token` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `account`, `password`, `cash`, `permission`, `token`) VALUES
(41, '123', '$2y$10$3igD8jnaT/yNww3amN7Dmu6zdw7iZppcaWBBvcVS2uq96/W/PdPSq', 0, 1, ''),
(44, '456', '$2y$10$Dv1HZM6PhwEIgLSVOpMOfuptrklq0sw7/kV.pyVykecVZ31RGelOe', 0, 1, '');

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_tw` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 NOT NULL,
  `intro` varchar(2000) NOT NULL,
  `img` varchar(65) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name_tw`, `name_en`, `intro`, `img`, `create_at`, `status`) VALUES
(63, '決戰中途島', 'MIDWAY', '★ 根據史實拍攝 經典戰役再度搬上大銀幕\r\n★《ID4星際重生》《2012》《明天過後》億萬大導羅蘭艾默瑞奇最新鉅作\r\n★ 眾星雲集 《出神入化》伍迪哈里遜挑戰演出\r\n\r\n此片重演1942年二次世界大戰期間，著名的太平洋戰爭中一場關鍵性戰役——史上聞名的「中途島戰役」，此戰發生於珍珠港事變後，並被認為是大戰中扭轉局勢的轉捩點！而《決戰中途島》集結好萊塢重量級卡司一同參與，將成為 年度壓軸重量級戰爭動作片。', 'film_20191028050.jpg', '2019-11-26 17:49:58', 1),
(64, '紫羅蘭永恆花園外傳 –永遠與自動手記人偶–', 'VIOLET EVERGARDEN ETERNITY AND THE AUTO MEMO', '★「京都動畫」虐心打造，催淚更勝《電影版聲之形》！\r\n★ 集結石川由依、壽美菜子、悠木碧等超人氣聲優陣容擔綱配音！\r\n★ 全台動畫迷爭相傳頌「人類聖經」、「宇宙神作」的感人物語！\r\n★ 一位對活著感到絕望的少女，一段找到「永恆」的感動故事！\r\n★ 京都動畫大賞輕小說獲獎作品改編，充滿人情味的暖心感動新篇章！\r\n★ 全新角色登場，女主角薇爾莉特的嶄新造型，勢必讓觀眾驚艷連連！\r\n★ 美不勝收的場面、扣人心弦的故事，唯美悠揚的音樂，聲優精湛的表現！\r\n★ 人氣聲優茅原實里擔任配音，並優揚獻唱量身打造專屬主題曲〈艾咪〉！\r\n★ 日本上映10天，票房勇破1.4億台幣，觀眾力讚：「滿滿的催淚感動！」\r\n\r\n為了守護重要的事物，我把我的未來給賣了…\r\n一間盛開著白色山茶花的女子貴族學校，但看在伊莎貝拉約克（壽美菜子配音）眼中，這個以高牆隔絕外界的校園，就彷彿是「牢籠」般的存在…。這時，提供「自動手記人偶」服務的薇爾莉特伊芙加登（石川由依配音），受到約克家雇用，來到這所校園，協助她在社交圈的首次亮相能夠圓滿成功。然而這位陷入絕望的少女，似乎有一段埋藏在心中的過去。究竟，薇爾莉特將如何為她敞開心扉呢？\r\n\r\n【關於電影】\r\n\r\n「京都動畫」虐心打造，催淚更勝《電影版聲之形》！\r\n《紫羅蘭永恆花園》由日本知名優質動畫品牌「京都動畫」打造，改編自曉佳奈創作、榮獲第5屆京都動畫大獎的輕小說作品，也是京都動畫大獎有史以來，唯一獲得「大賞獎」的作品（其餘幾屆的大賞獎都從缺）。本作女主角「薇爾莉特伊芙加登」，是位擁有金髮藍眼的美麗少女。身為孤兒的她，父母、年紀不詳，然而與她美貌相反的，是她那罕見的戰鬥能力。也因為她在戰爭時期的強大戰力，讓她被軍中同袍無視為人類，反而視為「武器」般的存在。之後因為戰爭失去雙手，薇爾莉特離開軍隊，並裝上義肢，開始在C·H郵政社擔任起「自動手記人偶」的代筆工作。這位像人偶般清澈無暇、沒有多餘感情少女，為了想要理解當時戰場上重要之人，對她所要傳達的話語，她不斷前往各地，踏上一段尋找何謂「愛」的旅程。透過一次次為不同委託人工作，她與各式各樣的人們相遇，並將對方無法言說的話語，或是綿密的思念，化作一封又一封的書信，將重要之言給投遞出去。她也從這些人身上，逐漸學會人與人之間的相處與情感，並逐漸開始懂得什麼是「愛」…。\r\n\r\n電視動畫於2018年1月10日起播出，一播出就引發極大轟動與討論，甚至被網友高度讚譽為「人類聖經」、「宇宙神作」。尤其電視動畫以劇場版的製作品質來打造，也再度證明京都動畫的誠意與製作實力。也因為電視動畫的轟動，讓製作團隊繼續在2019年推出劇場版動畫《紫羅蘭永恆花園外傳－永遠與自動手記人偶－》。故事將延續電視動畫的架構，以全新故事內容，透過一位陷入絕望的少女「伊莎貝拉」展開，並將舞台設定在一所被她視為「牢籠」的女子貴族學校。薇爾莉特這回將化身訓練師，一方面要協助她可以圓滿在社交圈首次亮相，另方面還要幫她敞開封閉的心扉，甚至牽起一段埋藏在伊莎貝拉心中的遺憾過往。\r\n\r\n透過京都動畫美不勝收的作畫品質、原著作者曉佳奈扣人心弦的故事、唯美悠揚的音樂，以及石川由依、壽美菜子、悠木碧等人氣聲優們的精湛配音表現，為觀眾帶來充滿人情味的暖心感動！值得一提的是，本片不僅有全新角色登場，女主角薇爾莉特更將以有別於電視動畫的嶄新服裝造型亮相，勢必讓觀眾驚艷連連！這也讓本片在日本上映10天，就勇破1.4億台幣票房佳績。觀眾更在觀賞後力讚：「內斂又細緻的感動！」「慢慢堆疊到最後，讓我在最後流下感動的淚水！」「催淚更勝《電影版聲之形》！」如今本片終於在台灣絲的千呼萬喚之下，確定將在11月1日於全台感動獻映。', 'film_20191028052.jpg', '2019-11-26 17:53:51', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`);

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

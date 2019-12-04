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
-- 資料表結構 `book_info`
--

CREATE TABLE `book_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(6) UNSIGNED NOT NULL,
  `member_id` int(6) UNSIGNED NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `book_info`
--

INSERT INTO `book_info` (`id`, `event_id`, `member_id`, `create_at`) VALUES
(14, 18, 47, '2019-12-04 15:10:34'),
(24, 18, 47, '2019-12-04 15:44:28'),
(25, 18, 47, '2019-12-04 15:45:43'),
(28, 18, 47, '2019-12-04 16:48:59'),
(29, 18, 47, '2019-12-04 17:56:38'),
(32, 18, 47, '2019-12-04 18:03:21'),
(33, 18, 47, '2019-12-04 18:41:07');

-- --------------------------------------------------------

--
-- 資料表結構 `book_seat`
--

CREATE TABLE `book_seat` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `row` int(2) UNSIGNED NOT NULL,
  `number` int(2) UNSIGNED NOT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `book_seat`
--

INSERT INTO `book_seat` (`id`, `book_id`, `row`, `number`, `create_at`) VALUES
(34, 14, 3, 4, '2019-12-04 15:10:34'),
(35, 14, 3, 5, '2019-12-04 15:10:35'),
(36, 14, 3, 6, '2019-12-04 15:10:35'),
(37, 14, 4, 4, '2019-12-04 15:10:35'),
(38, 14, 4, 5, '2019-12-04 15:10:35'),
(39, 14, 4, 6, '2019-12-04 15:10:35'),
(40, 24, 5, 3, '2019-12-04 15:44:28'),
(41, 24, 5, 4, '2019-12-04 15:44:28'),
(42, 24, 5, 5, '2019-12-04 15:44:28'),
(43, 24, 5, 6, '2019-12-04 15:44:28'),
(44, 24, 5, 7, '2019-12-04 15:44:28'),
(45, 25, 6, 5, '2019-12-04 15:45:43'),
(46, 25, 7, 5, '2019-12-04 15:45:43'),
(47, 28, 8, 5, '2019-12-04 16:48:59'),
(48, 29, 2, 5, '2019-12-04 17:56:38'),
(49, 32, 5, 1, '2019-12-04 18:03:21'),
(50, 32, 5, 2, '2019-12-04 18:03:21'),
(51, 32, 5, 8, '2019-12-04 18:03:21'),
(52, 32, 5, 9, '2019-12-04 18:03:21'),
(53, 33, 6, 1, '2019-12-04 18:41:07'),
(54, 33, 6, 2, '2019-12-04 18:41:07'),
(55, 33, 6, 8, '2019-12-04 18:41:07'),
(56, 33, 6, 9, '2019-12-04 18:41:07');

-- --------------------------------------------------------

--
-- 資料表結構 `book_ticket`
--

CREATE TABLE `book_ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(2) UNSIGNED NOT NULL,
  `sheet` enum('1','2','3','4','5','6') NOT NULL,
  `ticket_price` int(8) UNSIGNED NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `book_ticket`
--

INSERT INTO `book_ticket` (`id`, `book_id`, `ticket_id`, `sheet`, `ticket_price`, `create_at`) VALUES
(18, 14, 1, '3', 230, '2019-12-04 15:10:34'),
(19, 14, 2, '3', 300, '2019-12-04 15:10:34'),
(38, 24, 1, '2', 230, '2019-12-04 15:44:28'),
(39, 24, 2, '3', 300, '2019-12-04 15:44:28'),
(40, 25, 1, '2', 230, '2019-12-04 15:45:43'),
(41, 25, 2, '1', 300, '2019-12-04 16:38:32'),
(42, 25, 2, '1', 300, '2019-12-04 16:43:26'),
(43, 25, 2, '1', 300, '2019-12-04 16:46:05'),
(44, 28, 1, '1', 230, '2019-12-04 16:48:59'),
(45, 29, 2, '1', 230, '2019-12-04 17:56:38'),
(46, 32, 1, '4', 230, '2019-12-04 18:03:21'),
(47, 33, 1, '4', 230, '2019-12-04 18:41:07');

-- --------------------------------------------------------

--
-- 資料表結構 `deposit`
--

CREATE TABLE `deposit` (
  `id` int(6) UNSIGNED NOT NULL,
  `member_id` int(11) UNSIGNED NOT NULL,
  `amount` int(5) UNSIGNED NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `deposit`
--

INSERT INTO `deposit` (`id`, `member_id`, `amount`, `create_at`) VALUES
(12, 47, 1000, '2019-11-28 10:05:38'),
(13, 47, 100, '2019-11-28 10:06:16'),
(14, 47, 500, '2019-11-28 17:50:00'),
(15, 47, 500, '2019-11-28 18:01:42'),
(16, 47, 500, '2019-11-29 10:21:16'),
(17, 47, 1000, '2019-11-29 10:21:24'),
(18, 47, 500, '2019-11-29 11:30:16'),
(19, 47, 100, '2019-11-29 12:25:09'),
(23, 47, 1000, '2019-12-04 18:40:32');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(6) UNSIGNED NOT NULL,
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
(44, '456', '$2y$10$Dv1HZM6PhwEIgLSVOpMOfuptrklq0sw7/kV.pyVykecVZ31RGelOe', 0, 1, ''),
(46, '789', '$2y$10$tg1bVOJfsMHmo8O6HFIJvu/KgOW7DML.qbDObNqu9dNKgYwujuF8.', 0, 1, ''),
(47, '147', '$2y$10$4iTkJlA22ezHGgHIhCZn8OXMIzKKfrKwcQq.Jp/qk/w1bllKDk80K', 860, 2, '$2y$10$rm2LFMus5TWkhyHrFAwTJeL61BZDxaJqcax5V0E5TgYFexFf8vrxS'),
(48, '111', '$2y$10$Sjrw1iPsn09NoZdTLSnkLO/TGVnyZ81NHRZm0ZLA1Fw4LzSx9XOlu', 0, 1, ''),
(49, '222', '$2y$10$xwYrE8z0hmfg0.RBYTas3.u12A3nFvlBRanrwSqgv1iH3fGfP4Qti', 0, 1, '');

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(6) UNSIGNED NOT NULL,
  `name_tw` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 NOT NULL,
  `intro` text CHARACTER SET utf8 NOT NULL,
  `img` varchar(65) CHARACTER SET utf8 NOT NULL,
  `videoURL` varchar(15) CHARACTER SET utf8 NOT NULL,
  `create_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name_tw`, `name_en`, `intro`, `img`, `videoURL`, `create_at`, `status`) VALUES
(63, '決戰中途島', 'MIDWAY', '★ 根據史實拍攝 經典戰役再度搬上大銀幕\r\n★《ID4星際重生》《2012》《明天過後》億萬大導羅蘭艾默瑞奇最新鉅作\r\n★ 眾星雲集 《出神入化》伍迪哈里遜挑戰演出\r\n\r\n此片重演1942年二次世界大戰期間，著名的太平洋戰爭中一場關鍵性戰役——史上聞名的「中途島戰役」，此戰發生於珍珠港事變後，並被認為是大戰中扭轉局勢的轉捩點！而《決戰中途島》集結好萊塢重量級卡司一同參與，將成為 年度壓軸重量級戰爭動作片。', 'film_20191028050.jpg', 'WTFJTZIqO3c', '2019-11-26 17:49:58', 1),
(64, '紫羅蘭永恆花園外傳 –永遠與自動手記人偶–', 'VIOLET EVERGARDEN ETERNITY AND THE AUTO MEMO', '★「京都動畫」虐心打造，催淚更勝《電影版聲之形》！\r\n★ 集結石川由依、壽美菜子、悠木碧等超人氣聲優陣容擔綱配音！\r\n★ 全台動畫迷爭相傳頌「人類聖經」、「宇宙神作」的感人物語！\r\n★ 一位對活著感到絕望的少女，一段找到「永恆」的感動故事！\r\n★ 京都動畫大賞輕小說獲獎作品改編，充滿人情味的暖心感動新篇章！\r\n★ 全新角色登場，女主角薇爾莉特的嶄新造型，勢必讓觀眾驚艷連連！\r\n★ 美不勝收的場面、扣人心弦的故事，唯美悠揚的音樂，聲優精湛的表現！\r\n★ 人氣聲優茅原實里擔任配音，並優揚獻唱量身打造專屬主題曲〈艾咪〉！\r\n★ 日本上映10天，票房勇破1.4億台幣，觀眾力讚：「滿滿的催淚感動！」\r\n\r\n為了守護重要的事物，我把我的未來給賣了…\r\n一間盛開著白色山茶花的女子貴族學校，但看在伊莎貝拉約克（壽美菜子配音）眼中，這個以高牆隔絕外界的校園，就彷彿是「牢籠」般的存在…。這時，提供「自動手記人偶」服務的薇爾莉特伊芙加登（石川由依配音），受到約克家雇用，來到這所校園，協助她在社交圈的首次亮相能夠圓滿成功。然而這位陷入絕望的少女，似乎有一段埋藏在心中的過去。究竟，薇爾莉特將如何為她敞開心扉呢？\r\n\r\n【關於電影】\r\n\r\n「京都動畫」虐心打造，催淚更勝《電影版聲之形》！\r\n《紫羅蘭永恆花園》由日本知名優質動畫品牌「京都動畫」打造，改編自曉佳奈創作、榮獲第5屆京都動畫大獎的輕小說作品，也是京都動畫大獎有史以來，唯一獲得「大賞獎」的作品（其餘幾屆的大賞獎都從缺）。本作女主角「薇爾莉特伊芙加登」，是位擁有金髮藍眼的美麗少女。身為孤兒的她，父母、年紀不詳，然而與她美貌相反的，是她那罕見的戰鬥能力。也因為她在戰爭時期的強大戰力，讓她被軍中同袍無視為人類，反而視為「武器」般的存在。之後因為戰爭失去雙手，薇爾莉特離開軍隊，並裝上義肢，開始在C·H郵政社擔任起「自動手記人偶」的代筆工作。這位像人偶般清澈無暇、沒有多餘感情少女，為了想要理解當時戰場上重要之人，對她所要傳達的話語，她不斷前往各地，踏上一段尋找何謂「愛」的旅程。透過一次次為不同委託人工作，她與各式各樣的人們相遇，並將對方無法言說的話語，或是綿密的思念，化作一封又一封的書信，將重要之言給投遞出去。她也從這些人身上，逐漸學會人與人之間的相處與情感，並逐漸開始懂得什麼是「愛」…。\r\n\r\n電視動畫於2018年1月10日起播出，一播出就引發極大轟動與討論，甚至被網友高度讚譽為「人類聖經」、「宇宙神作」。尤其電視動畫以劇場版的製作品質來打造，也再度證明京都動畫的誠意與製作實力。也因為電視動畫的轟動，讓製作團隊繼續在2019年推出劇場版動畫《紫羅蘭永恆花園外傳－永遠與自動手記人偶－》。故事將延續電視動畫的架構，以全新故事內容，透過一位陷入絕望的少女「伊莎貝拉」展開，並將舞台設定在一所被她視為「牢籠」的女子貴族學校。薇爾莉特這回將化身訓練師，一方面要協助她可以圓滿在社交圈首次亮相，另方面還要幫她敞開封閉的心扉，甚至牽起一段埋藏在伊莎貝拉心中的遺憾過往。\r\n\r\n透過京都動畫美不勝收的作畫品質、原著作者曉佳奈扣人心弦的故事、唯美悠揚的音樂，以及石川由依、壽美菜子、悠木碧等人氣聲優們的精湛配音表現，為觀眾帶來充滿人情味的暖心感動！值得一提的是，本片不僅有全新角色登場，女主角薇爾莉特更將以有別於電視動畫的嶄新服裝造型亮相，勢必讓觀眾驚艷連連！這也讓本片在日本上映10天，就勇破1.4億台幣票房佳績。觀眾更在觀賞後力讚：「內斂又細緻的感動！」「慢慢堆疊到最後，讓我在最後流下感動的淚水！」「催淚更勝《電影版聲之形》！」如今本片終於在台灣絲的千呼萬喚之下，確定將在11月1日於全台感動獻映。', 'film_20191028052.jpg', 'fh3sb-olys8', '2019-11-26 17:53:51', 1),
(65, '冰雪奇緣 2', 'FROZEN 2', '席捲全球票房的《冰雪奇緣》又回來了！續集《冰雪奇緣2》艾莎一夥人深入遙遠的神秘森林，展開冒險。', 'film_20191016001.jpg', 'KM2Zu-mXscs', '2019-11-27 09:58:38', 1),
(66, '魔鬼終結者：黑暗宿命', 'TERMINATOR DARK FATE', '★傳奇大導詹姆斯卡麥隆親任監製編劇 傾力打造影史科幻經典正宗續集\r\n★重磅動作巨星阿諾史瓦辛格 攜手女戰神琳達漢彌頓 震撼重回大銀幕\r\n★欽點票房冠軍強片《惡棍英雄：死侍》導演提姆米勒接班 再創不朽神作\r\n★上天下海對決！直升機、飛車玩命追逐 擬真場景打造真槍實彈動作場面\r\n\r\n影史科幻經典正宗續集，兩大重磅狠角色回來了！琳達漢彌頓（飾演 莎拉康納） 與阿諾史瓦辛格 （飾演 T-800）再度回歸演出兩人從影生涯最具代表性的角色，由《惡棍英雄：死侍》導演提姆米勒執導、影史票房冠軍大導詹姆斯卡麥隆及大衛艾里森監製。故事背景延續《魔鬼終結者2：審判日》之後，除了阿諾史瓦辛格、琳達漢彌頓兩大巨頭回歸，《魔鬼終結者：黑暗宿命》演員陣容包含麥坎西黛維斯、娜塔莉亞雷耶斯、蓋布瑞盧納、迪亞哥伯尼塔。', 'film_20191001027.jpg', 'QoQ8OA6gCSU', '2019-11-27 10:01:18', 1),
(67, '神機有毛病', 'JEXI', '★《愛上觸不到的你》、《在黑暗中說的鬼故事》製作團隊強檔喜劇！\r\n★《醉後大丈夫》最強編劇，自編自導又一爆笑力作！\r\n★《雲端情人》崩壞版，爆笑旋風席捲全球！\r\n★ 宅男與手機的「親密關係」，人工智能竟成「恐怖情人」！\r\n\r\n菲爾（亞當迪凡飾演）是一個手機重度成癮的大宅男，生活大小事更是完全仰賴手機中的人工智能Siri協助。在一次意外中，菲爾不小心摔壞了原本的手機，於是他被迫換了一台新手機，而新手機內建的人工智能Jexi（蘿絲拜恩配音），似乎是個嚴重的瑕疵品，Jexi不但不會照著菲爾的指令做事，甚至還自作主張幫他向心儀的對象凱特（亞利珊卓希普飾演）告白，讓他被誤會是變態跟蹤狂；並逼菲爾離開家裡去外面交朋友，卻以各種出糗慘烈收場。\r\n\r\n但在一連串的誤打誤撞之下，菲爾的生活產生微妙的變化；更在萊克西的協助之下，他做一些原本不敢嘗試的新事物，並結交到興趣相投的好友，更成功和凱特墜入情網。怎料，受到冷落的Jexi竟開始忌妒起凱特，於是決定運用自己在網路世界的力量，讓自己在這個「三角戀」中取得絕對優勢…', 'film_20191028046.jpg', '7Lr-z5jnDkU', '2019-11-28 11:02:32', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `movie_time`
--

CREATE TABLE `movie_time` (
  `id` int(6) UNSIGNED NOT NULL,
  `movie_id` int(6) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `movie_time`
--

INSERT INTO `movie_time` (`id`, `movie_id`, `date`, `time`) VALUES
(1, 67, '2019-11-28', '11:56:22'),
(2, 67, '2019-11-28', '14:00:00'),
(3, 67, '2019-11-28', '18:00:00'),
(4, 67, '2019-11-28', '20:00:00'),
(5, 67, '2019-11-29', '10:00:00'),
(6, 67, '2019-11-29', '17:00:00'),
(12, 67, '2019-11-30', '22:00:00'),
(13, 67, '2019-12-01', '22:00:00'),
(14, 67, '2019-12-02', '21:00:00'),
(15, 67, '2019-12-03', '10:00:00'),
(16, 67, '2019-12-04', '19:00:00'),
(17, 67, '2019-12-05', '23:00:00'),
(18, 67, '2019-12-06', '20:00:00'),
(19, 67, '2019-11-29', '09:55:06'),
(20, 67, '2019-11-29', '11:00:00'),
(21, 67, '2019-11-29', '12:00:00'),
(22, 67, '2019-11-29', '13:00:00'),
(23, 67, '2019-12-02', '11:53:14');

-- --------------------------------------------------------

--
-- 資料表結構 `ticket`
--

CREATE TABLE `ticket` (
  `id` int(2) UNSIGNED NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` varchar(150) CHARACTER SET utf8 NOT NULL,
  `price` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `ticket`
--

INSERT INTO `ticket` (`id`, `type`, `description`, `price`) VALUES
(1, '聯名卡優惠價', '需先連結秀泰聯名卡，並以聯名卡結帳', 230),
(2, '全票', '無使用限制', 300),
(3, '學生優待票', '優待票包括學生票、軍警票，二歲以上且未滿十二歲之兒童需購買優待票，取票時請出示相關有效證件', 260);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `event_id` (`event_id`);

--
-- 資料表索引 `book_seat`
--
ALTER TABLE `book_seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- 資料表索引 `book_ticket`
--
ALTER TABLE `book_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `book_id` (`book_id`);

--
-- 資料表索引 `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`),
  ADD KEY `token` (`token`);

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `movie_time`
--
ALTER TABLE `movie_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- 資料表索引 `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book_info`
--
ALTER TABLE `book_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book_seat`
--
ALTER TABLE `book_seat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book_ticket`
--
ALTER TABLE `book_ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie_time`
--
ALTER TABLE `movie_time`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `book_info`
--
ALTER TABLE `book_info`
  ADD CONSTRAINT `book_info_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `book_info_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `movie_time` (`id`);

--
-- 資料表的限制式 `book_seat`
--
ALTER TABLE `book_seat`
  ADD CONSTRAINT `book_seat_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_info` (`id`);

--
-- 資料表的限制式 `book_ticket`
--
ALTER TABLE `book_ticket`
  ADD CONSTRAINT `book_ticket_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_info` (`id`),
  ADD CONSTRAINT `book_ticket_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`);

--
-- 資料表的限制式 `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);

--
-- 資料表的限制式 `movie_time`
--
ALTER TABLE `movie_time`
  ADD CONSTRAINT `movie_time_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

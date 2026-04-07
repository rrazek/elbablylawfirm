-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2022 at 07:19 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19707199_elbably`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) COLLATE utf16_bin NOT NULL,
  `Law_Type` varchar(255) COLLATE utf16_bin NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Content` text COLLATE utf16_bin NOT NULL,
  `Image` varchar(255) COLLATE utf16_bin NOT NULL DEFAULT 'img/single.jpg',
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf16_bin NOT NULL,
  `Description` text COLLATE utf16_bin NOT NULL,
  `Cat` int(255) NOT NULL,
  `Image` varchar(255) COLLATE utf16_bin NOT NULL,
  `Date` date DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`ID`, `Name`, `Description`, `Cat`, `Image`, `Date`, `Status`) VALUES
(2, 'قضية الدويقة', 'بتاريخ 6/1/2010 أصدرت النيابة العامة قرارها بقيد الأوراق جنحة بالمادتين 238، 244 من قانون العقوبات ضد\r\n1-	   		                     	(نائب المحافظ للجهة الغربية)\r\nوآخرين على زعم أنهم فى غضون عامي 2007، 2008 بدائرة قسم منشأة ناصر – محافظة القاهرة.\r\n1.	تسببوا خطأ فى موت محمد عبد العزيز محمد وآخرين عددهم مائة وثمانية عشر شخصاً مبينة أسماؤهم بالتحقيقات وكان ذلك ناشئاً عن إهمالهم وإخلالهم إخلالاً جسيماً بما تفرضه عليهم أصول وظائفهم وعدم مراعاتهم للقوانين والقرارات واللوائح والأنظمة بأن أهمل المتهم الأول فى إتخاذ الإجراءات القانونية والإدارية الواجبة لإزالة المساكن المقامة عشوائياً بدون ترخيص على الصخرة الكائنة أعلى شارع السلام – عزبة بخيت – بمنطقة الجورة وتقاعس عن نقل أصحابها لمساكن بديلة رغم توافر تلك المساكن البديلة لدى المحافظة.\r\n2.	تسببوا خطأ فى إصابة لطيفة عويس عثمان وآخرين عددهم أربعة وخمسين شخصاً مبينة أسماؤهم بالتحقيقات وكان ذلك ناشئا ً عن إهمالهم وإخلالهم إخلالاً جسيماً بما تفرض عليهم أصول وظائفهم وعدم مراعاتهم للقوانين والقرارات واللوائح والأنظمة على النحو المبين بالتهمة السابقة مما ترتب عليه وقوع الحادث وإصابة المجنى عليهم بالإصابات الموصوفة بالتقارير الطبية المرفقة.\r\nوقد حكم في القضية ببراءة موكلنا نائب المحافظ', 1, 'uploads/cases/1664618208portfolio-5.jpg', '2010-01-06', 1),
(19, 'إتحاد شاغلين مركز مارينا العلمين السياحي', 'صدر قرار بإنقضاء إتحاد شاغلين مركز مارينا العلمين السياحي وتم الطعن علي القرار الإداري وصدر الحكم بتاريخ 27/12/2020 برفض الدعوي \r\nقام مكتبنا بالطعن علي الحكم الصادر عن الدائرة 43 أفراد الأسكندرية ومطروح أمام المحكمة الإدارية العليا وإحيلت الدعوي للمفوضين وأودع التقرير بتاريخ يونيو 2022 الذي إنتهي إلي قبول الطعن شكلاً وفي الموضوع إلغاء قرار رئيس جهاز القري السياحية رقم 9 لسنة 2019', 3, 'uploads/cases/1664618208portfolio-5.jpg', '2021-02-24', 1),
(20, 'القضية المعروفة إعلامياً بموقعة الجمل', 'ما أثبته قرار الإحالة من أن المتهمون جميعا :\r\n\r\nأولاً :- \r\n    فريق منهم من أركان نظام الحكم السابق بحكم مواقعهم في الحزب الحاكم أو السلطتين التشريعية والتنفيذية  والفريق الآخر ممن صنعوا أسماءهم ونجوميتهم في أحضان النظام السابق ورعايته وإن تظاهروا بمعارضته . يطلقهم وقتما يشاء للترويج له ولإفضاله والتسبيح بمننه ونعمائه . \r\n        وفور إنتهاء الرئيس السابق من خطابه يوم ۲۰۱۱/۲/۱ أراد الفريق الأول الدفاع عن بقاء النظام السابق استمرارا لمواقعهم فيه . وأراد الفريق الثاني تقديم قرابين الولاء والطاعة حتى يستمر تحت عباءته ورضاء النظام السابق في قابل الأيام بعد أن إعتقدوا أن الأمر سيستتب له عقب ذلك الخطاب .\r\n 	   فتلاقت و إتفقت إرادة جميع المتهمين و إتحدت نيتهم من خلال اتصالات هاتفية جرت بينهم على إرهاب وإيذاء المتظاهرين بميدان التحرير - المحتجين سلميا على سوء وتردي الأوضاع السياسية والاقتصادية والاجتماعية والأمنية بالبلاد مطالبين برحيل الرئيس السابق وتغير نظام الحكم - وتوافقوا على الاعتداء على حرياتهم الشخصية والعامة في التعبير عن رأيهم والتي كفلها لهم الدستور والقانون وإرهابهم مستخدمين في ذلك القوة والعنف والترويع والتهديد قاصدين إشاعة الخوف بينهم وفض تظاهرهم السلمي وإخراجهم من الميدان بالقوة والعنف ولو إقتضى ذلك قتلهم و إحداث إصابات بهم معرضين بذلك سلامتهم وسلامة المجتمع وأمنه للخطر وتنفيذاً لهذا الغرض الإرهابي الإجرامي نظموا و أقتادوا عصابات وجماعات إرهابية مؤلفة من مجهولين من الخارجين على القانون والبلطجية - جلبوهم من دوائرهم الانتخابية ومن أماكن أخرى وأنقدوهم أموالا ووعدوهم بالمزيد منها وبفرص عمل ووفروا الهم وسائل الانتقال وأمدوهم ببعض الأسلحة والأدوات والدواب - ومن بعض أفراد الشرطة .', 1, 'uploads/cases/1664618208portfolio-5.jpg', '2013-01-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Case_Category`
--

CREATE TABLE `Case_Category` (
  `id` int(11) NOT NULL,
  `CatName` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `Case_Category`
--

INSERT INTO `Case_Category` (`id`, `CatName`) VALUES
(1, 'جنائي'),
(2, 'تجاري'),
(3, 'مجلس الدولة');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `bio` varchar(255) COLLATE utf16_bin NOT NULL,
  `type` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- --------------------------------------------------------

--
-- Table structure for table `client_cat`
--

CREATE TABLE `client_cat` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `client_cat`
--

INSERT INTO `client_cat` (`id`, `cat_name`) VALUES
(1, 'الاستثمار'),
(2, 'السياحة'),
(3, 'التنمية العقارية'),
(4, 'التعليم'),
(5, 'تكنولوجيا المعلومات'),
(6, 'الطاقة'),
(7, 'الزراعة'),
(8, 'الأبنية الخضراء'),
(9, 'المياه');

-- --------------------------------------------------------

--
-- Table structure for table `law_cat`
--

CREATE TABLE `law_cat` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `law_cat`
--

INSERT INTO `law_cat` (`id`, `Name`) VALUES
(1, 'القوانين'),
(2, 'دفوع قانونية'),
(3, 'احكام نقض'),
(4, 'نماذج');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `ID` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf16_bin NOT NULL,
  `file_path` varchar(255) COLLATE utf16_bin NOT NULL,
  `law_cat` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`ID`, `file_name`, `file_path`, `law_cat`, `date`, `status`) VALUES
(10, 'قانون العقوبات المصري', 'uploads/libs/1666127645_58_1937.rtf', 1, '2022-10-18 21:14:05', 1),
(11, 'قانون الإجراءات الجنائية', 'uploads/libs/1666127690_150_1950.rtf', 1, '2022-10-18 21:14:50', 1),
(19, 'قانون البنك المركزي', 'uploads/lib/ البنك المركزي.docx', 1, '2022-10-19 15:26:07', 1),
(20, 'التعاون الزراعي 122 لسنة  1980', 'uploads/lib/ التعاون الزراعي.docx', 1, '2022-10-19 15:27:02', 1),
(21, 'قانون المرافعات', 'uploads/lib/ المرافعات.docx', 1, '2022-10-19 15:27:45', 1),
(22, 'مذكرة في التقادم بمضي المدة', 'uploads/lib/ في التقادم.pdf', 4, '2022-10-19 16:02:50', 1),
(23, 'مذكرة في جنحة نصب', 'uploads/lib/ في جنحة نصب.pdf', 4, '2022-10-19 16:12:02', 1),
(24, 'مذكرة دفاع في جريمة قتل خطأ أمام المحكمة العسكرية العليا', 'uploads/lib/ في جريمة قتل خطأ .pdf', 4, '2022-10-19 17:24:12', 1),
(25, 'قانون غسل الأموال', 'uploads/lib/ مكافحة غسل الأموال.pdf', 1, '2022-10-20 10:58:10', 1),
(26, 'قانون تنظيم الجامعات', 'uploads/lib/ تنظيم الجامعات.docx', 1, '2022-10-20 10:59:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf16_bin NOT NULL,
  `bio` varchar(255) COLLATE utf16_bin NOT NULL,
  `Position` varchar(255) COLLATE utf16_bin NOT NULL,
  `Twitter` varchar(255) COLLATE utf16_bin NOT NULL,
  `Facebook` varchar(255) COLLATE utf16_bin NOT NULL,
  `LinkedIn` varchar(255) COLLATE utf16_bin NOT NULL,
  `Whatsapp` varchar(255) COLLATE utf16_bin NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `Name`, `bio`, `Position`, `Twitter`, `Facebook`, `LinkedIn`, `Whatsapp`, `Status`, `image`) VALUES
(2, 'علي محمود السيد مندور', 'محامي بالنقض والإدارية والدستورية العليا', 'مدير المكتب لقسم القضايا - عضو', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://wa.me/2https://wa.me/2https://wa.me/2https://wa.me/201142413991', 1, 'uploads/emps/1666106334Aly mandour.jpg'),
(3, 'محمد كمال محمد أبو السعود', 'محامي بالنقض والإدارية والدستورية العليا', 'مدير المكتب - قسم الشركات - عضو', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://wa.me/2https://wa.me/2https://wa.me/201120999936', 1, 'uploads/emps/1666106463Kamal.jpg'),
(4, 'أحمد محمد عبدالعظيم', 'المحامي بالإستئناف العالي ومجلس الدولة', 'عضو', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://wa.me/2https://wa.me/201120999937', 1, 'uploads/emps/1666106650Abd Elazeem.jpg'),
(5, 'أحمد فرج أحمد عبد المنعم', 'محامي بالاستئناف العالي ومجلس الدولة', 'عضو', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://wa.me/2https://wa.me/201003888087', 1, 'uploads/emps/1666106820Elbadrachiny.jpg'),
(7, 'محمود هاني إسماعيل معروف', 'محامي بالاستئناف العالي ومجلس الدولة', 'عضو', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://wa.me/2https://wa.me/20 1144333316.', 1, 'uploads/emps/1666106942marouf.jpg'),
(8, 'علاءالدين سيد خليل', 'المحامي', 'عضو', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://wa.me/2https://wa.me/201147477690', 1, 'uploads/emps/1666107043Alaa.jpg'),
(9, 'سامي محمد فاروق شاهين', 'المحامي', 'عضو', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://wa.me/2tps://wa.me/2https://wa.me/2https://wa.me/201120999935', 1, 'uploads/emps/1666107209Samy.jpg'),
(12, 'رنا هشام حسن', 'محامي امام المحاكم الابتدائية', 'عضو', '', '', '', 'https://wa.me/201120999934', 1, 'uploads/emps/1666107336Rana.jpg'),
(13, 'آيه محمد عبدالحميد', 'محامي امام المحاكم الجزئية', 'عضو', '', '', '', 'https://wa.me/201144333317', 1, 'uploads/emps/1666107442Ayah.jpg'),
(14, 'نورهان إبراهيم كامل', '', 'مدير إداري', '', '', '', 'https://wa.me/201144448781', 1, 'uploads/emps/1666107567Nour.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `phone` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL,
  `type` varchar(255) COLLATE utf16_bin NOT NULL,
  `message` text COLLATE utf16_bin NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `type`, `message`, `seen`, `date`) VALUES
(1, 'test 1', '', '', '', '', 0, '2022-10-01 11:06:14'),
(2, 'test 2', '', '', '', '', 1, '2022-10-01 11:06:25'),
(3, 'Moamen', '01009450710', 'moamen.zaher@icloud.com', 'new', 'iuashdiuah', 0, '2022-10-01 11:30:03'),
(4, 'Tester', '011', 'raghda.essam1@gmail.com', 'qanoneya', 'Testing', 0, '2022-10-17 15:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `Id` int(11) NOT NULL,
  `StateName` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`Id`, `StateName`) VALUES
(1, 'Shown On Website'),
(2, 'Hidden from Website');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `username` varchar(255) COLLATE utf16_bin NOT NULL,
  `password` varchar(255) COLLATE utf16_bin NOT NULL,
  `email` varchar(255) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Samir EL Bably', 'Selbably', 'b4e0a31cd9b4b95f1619564443283213', 'Selbably@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Case_Category`
--
ALTER TABLE `Case_Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `client_cat`
--
ALTER TABLE `client_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `law_cat`
--
ALTER TABLE `law_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Case_Category`
--
ALTER TABLE `Case_Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_cat`
--
ALTER TABLE `client_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `law_cat`
--
ALTER TABLE `law_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

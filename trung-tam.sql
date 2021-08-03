-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 03, 2021 lúc 07:34 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trung-tam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adminEmail` varchar(150) CHARACTER SET utf8 NOT NULL,
  `adminUser` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adminPass` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_class`
--

CREATE TABLE `tbl_class` (
  `classId` int(11) UNSIGNED NOT NULL,
  `className` varchar(255) NOT NULL,
  `coursesId` int(11) NOT NULL,
  `classDesc` text NOT NULL,
  `classTime` date DEFAULT NULL,
  `classLesson` int(11) NOT NULL,
  `classLearnTime` text NOT NULL,
  `classAddress` text NOT NULL,
  `classPrice` varchar(255) NOT NULL,
  `classTeacher` varchar(255) NOT NULL,
  `classMentor` varchar(255) NOT NULL,
  `classTeacherAvatar` varchar(255) NOT NULL,
  `classMentorAvatar` varchar(255) NOT NULL,
  `classTeacherIntro` text NOT NULL,
  `classMentorIntro` text NOT NULL,
  `classTeacherDesc` varchar(255) NOT NULL,
  `classMentorDesc` varchar(255) NOT NULL,
  `classStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_class`
--

INSERT INTO `tbl_class` (`classId`, `className`, `coursesId`, `classDesc`, `classTime`, `classLesson`, `classLearnTime`, `classAddress`, `classPrice`, `classTeacher`, `classMentor`, `classTeacherAvatar`, `classMentorAvatar`, `classTeacherIntro`, `classMentorIntro`, `classTeacherDesc`, `classMentorDesc`, `classStatus`) VALUES
(1, 'Anh Ngữ Mẫu Giáo SMARTKIDS Khóa 1', 1, '                                Từ 4 đến 6 tuổi là độ tuổi vàng cho trẻ em để bắt đầu học tiếng Anh.\r\nTrẻ tiếp thu tiếng Anh một cách tự nhiên, phát âm chuẩn, phản xạ nhanh và dễ dàng hình thành đam mê học tiếng Anh ngay từ tuổi mẫu giáo.                                ', '2021-07-07', 1, 'Thứ 2,3,4 trong tuần từ 16h đến 17h30', 'Trung Tâm Anh Ngữ ED ', '100000', 'MS.Jenny', 'Mr.Khuu Thanh Tung', 'db885578eecR2zIrMeFU.jpg', 'db885578eeiVhaGHwtDj.jpg', 'Là giáo viên đến từ đất nước Mỹ. Có hơn 10 năm kinh nghiệm giảng dạy. ', 'Là giáo viên trẻ đầy đam mê, nhiệt huyết. Tốt nghiệp với điểm tiếng anh 10. ', 'Giáo viên đến từ nước ngoài.', 'Là giáo viên trẻ đầy đam mê, nhiệt huyết', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contactId` int(11) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactPhone` int(11) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactTitle` text NOT NULL,
  `contactContent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`contactId`, `contactName`, `contactPhone`, `contactEmail`, `contactTitle`, `contactContent`) VALUES
(1, 'Hà Anh Tài', 111, 'taiha@gmail.com', 'EDDDDD', 'xin chào ED tôi là Hà Anh Tài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `coursesId` int(11) NOT NULL,
  `coursesName` varchar(255) NOT NULL,
  `coursesDesc` varchar(255) NOT NULL,
  `coursesImage` varchar(255) NOT NULL,
  `coursesStatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_courses`
--

INSERT INTO `tbl_courses` (`coursesId`, `coursesName`, `coursesDesc`, `coursesImage`, `coursesStatus`) VALUES
(1, 'Tiếng Anh Trẻ Em (4 - 11 Tuổi)', 'KHÓA HỌC TIẾNG ANH DÀNH CHO TRẺ EM TỪ 4 - 11 TUỔI', '644c65149aaBAUIZv1tS.jpg', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lesson`
--

CREATE TABLE `tbl_lesson` (
  `lessonId` int(11) NOT NULL,
  `lessonName` varchar(255) NOT NULL,
  `lessonDesc` text NOT NULL,
  `classId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_lesson`
--

INSERT INTO `tbl_lesson` (`lessonId`, `lessonName`, `lessonDesc`, `classId`) VALUES
(1, 'Làm quen với giáo viên', 'Trò chuyện, giao lưu và làm quen với các giáo viên.', 1),
(2, 'Cho trẻ nhận biết Tiếng Anh', 'Cho trẻ nhận biết Tiếng Anh, nắm rõ, tìm được niềm vui trong môn học.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_register`
--

CREATE TABLE `tbl_register` (
  `registerId` int(11) NOT NULL,
  `registerName` varchar(255) NOT NULL,
  `registerEmail` varchar(255) NOT NULL,
  `registerPhone` varchar(255) NOT NULL,
  `registerPayment` bit(1) NOT NULL,
  `registerDesire` varchar(255) NOT NULL,
  `registerStatus` bit(1) NOT NULL,
  `classId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_register`
--

INSERT INTO `tbl_register` (`registerId`, `registerName`, `registerEmail`, `registerPhone`, `registerPayment`, `registerDesire`, `registerStatus`, `classId`) VALUES
(1, 'Trần Hoàng Gia Bảo', 'baotran@gmail.com', '000xxx000', b'0', 'Em mong muốn có bạn trai <3 ', b'0', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderImage`) VALUES
(1, '9bd035229a5soIHXQfnG.jpg'),
(2, 'c74e5037f94xm03SaGUg.jpg'),
(3, 'a1dd2feb54ciDN1yWEa7.jpg'),
(4, '9ef60805305YTrjhi387.jpg'),
(5, 'bcc014f5c0rXUsnSBC9e.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_team`
--

CREATE TABLE `tbl_team` (
  `teamId` int(11) NOT NULL,
  `teamName` varchar(255) NOT NULL,
  `teamDesc` varchar(255) NOT NULL,
  `teamImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_testimonial_slider`
--

CREATE TABLE `tbl_testimonial_slider` (
  `testimonial_sliderId` int(11) NOT NULL,
  `testimonial_sliderName` varchar(255) NOT NULL,
  `testimonial_sliderPosition` varchar(255) NOT NULL,
  `testimonial_sliderDesc` text NOT NULL,
  `testimonial_sliderImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_testimonial_slider`
--

INSERT INTO `tbl_testimonial_slider` (`testimonial_sliderId`, `testimonial_sliderName`, `testimonial_sliderPosition`, `testimonial_sliderDesc`, `testimonial_sliderImage`) VALUES
(1, 'Anh NGUYỄN VĂN CHIẾN', 'Phụ huynh', 'Mình thấy ED có chất lượng giảng dạy uy tín nên chọn cho con học. Trong quá trình học, gia đình thấy cháu có tiến bộ rõ rệt, hiện đang là một trong những học sinh giỏi Anh văn lớp chuyên của trường.', '152a75ea25DirxhvLVdk.jpg'),
(2, 'Chị LÊ ANH THƯ', '(Phụ huynh)', 'Tại ED , giáo viên được tuyển chọn kỹ lưỡng, đảm bảo chất lượng giảng dạy, nhiều cấp độ dành cho mọi độ tuổi, giúp con học tiếng Anh xuyên suốt. Tôi rất hài lòng khi thấy con tiến bộ  vượt bậc, đạt kết quả cao trong các kỳ thi Anh ngữ.', 'af60eff2ddg7dZny3bkM.jpg'),
(3, 'Em ĐẶNG GIA CHÍ', 'Học Viên KET 148', 'Từ khi học ED, con thấy tự tin hơn trong giao tiếp vì có nhiều cơ hội trò chuyện với thầy cô người nước ngoài. Thầy cô bản ngữ nên luôn được chỉnh sửa khi có lỗi phát âm. Điều này giúp con rèn luyện được cách phát âm của mình và nói tốt hơn rất nhiều.', 'e4bbe4b76cOG7PdgxEHz.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Chỉ mục cho bảng `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`classId`),
  ADD KEY `coursesId` (`coursesId`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Chỉ mục cho bảng `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`coursesId`);

--
-- Chỉ mục cho bảng `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD PRIMARY KEY (`lessonId`),
  ADD KEY `classId` (`classId`);

--
-- Chỉ mục cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`registerId`),
  ADD KEY `classId` (`classId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`teamId`);

--
-- Chỉ mục cho bảng `tbl_testimonial_slider`
--
ALTER TABLE `tbl_testimonial_slider`
  ADD PRIMARY KEY (`testimonial_sliderId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `classId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `coursesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  MODIFY `lessonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `registerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_testimonial_slider`
--
ALTER TABLE `tbl_testimonial_slider`
  MODIFY `testimonial_sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `tbl_class_ibfk_1` FOREIGN KEY (`coursesId`) REFERENCES `tbl_courses` (`coursesId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD CONSTRAINT `tbl_lesson_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `tbl_class` (`classId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `tbl_register_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `tbl_class` (`classId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

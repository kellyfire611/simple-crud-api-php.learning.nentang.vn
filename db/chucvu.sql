-- 4 CHỨC VỤ
CREATE TABLE CHUCVU(
	CV_MA NCHAR(5) PRIMARY KEY,
	CV_TEN NVARCHAR(150)NOT NULL,
	CV_TILE INT NOT NULL,
	CV_NAMAPDUNG NCHAR(5) NOT NULL,
	CV_GHICHU NCHAR(150)
);

INSERT INTO CHUCVU Values ('CV001',N'Hiệu trưởng',15,'2015','');
INSERT INTO CHUCVU Values ('CV002',N'Phó Hiệu trưởng',20,'2015','');

INSERT INTO CHUCVU Values ('CV003',N'Trưởng phòng',25,'2015',N'Không phải là đơn vị đào tạo');
INSERT INTO CHUCVU Values ('CV004',N'Trưởng ban',25,'2015',N'Không phải là đơn vị đào tạo');
INSERT INTO CHUCVU Values ('CV005',N'Trưởng trung tâm',25,'2015',N'Không phải là đơn vị đào tạo');

INSERT INTO CHUCVU Values ('CV006',N'Phó phòng',30,'2015',N'Không phải là đơn vị đào tạo');
INSERT INTO CHUCVU Values ('CV007',N'Phó ban',30,'2015',N'Không phải là đơn vị đào tạo');
INSERT INTO CHUCVU Values ('CV008',N'Phó trung tâm',30,'2015',N'Không phải là đơn vị đào tạo')	;

INSERT INTO CHUCVU Values ('CV009',N'Trưởng khoa trực thuộc Trường',75,'2015',N'Đơn vị đào tạo < 40 giảng viên hoặc < 800 người học');
INSERT INTO CHUCVU Values ('CV010',N'Trưởng khoa trực thuộc Trường',70,'2015',N'Đơn vị đào tạo >= 40 giảng viên hoặc >= 800 người học');
INSERT INTO CHUCVU Values ('CV011',N'Trưởng khoa trực thuộc Trường',65,'2015',N'Đơn vị đào tạo >= 80 giảng viên hoặc >= 1.600 người học');
INSERT INTO CHUCVU Values ('CV012',N'Trưởng khoa trực thuộc Trường',60,'2015',N'Đơn vị đào tạo >=120 giảng viên hoặc > 5.000 người học');
INSERT INTO CHUCVU Values ('CV013',N'Trưởng khoa trực thuộc Trường',55,'2015',N'Đơn vị đào tạo >=150 giảng viên hoặc >= 10.000 người học');

INSERT INTO CHUCVU Values ('CV014',N'Trưởng viện trực thuộc Trường',75,'2015',N'Đơn vị đào tạo < 40 giảng viên hoặc < 800 người học');
INSERT INTO CHUCVU Values ('CV015',N'Trưởng viện trực thuộc Trường',70,'2015',N'Đơn vị đào tạo >= 40 giảng viên hoặc >= 800 người học');
INSERT INTO CHUCVU Values ('CV016',N'Trưởng viện trực thuộc Trường',65,'2015',N'Đơn vị đào tạo >= 80 giảng viên hoặc >= 1.600 người học');
INSERT INTO CHUCVU Values ('CV017',N'Trưởng viện trực thuộc Trường',60,'2015',N'Đơn vị đào tạo >=120 giảng viên hoặc > 5.000 người học');
INSERT INTO CHUCVU Values ('CV018',N'Trưởng viện trực thuộc Trường',55,'2015',N'Đơn vị đào tạo >=150 giảng viên hoặc >= 10.000 người học');

INSERT INTO CHUCVU Values ('CV019',N'Trưởng trung tâm trực thuộc Trường',75,'2015',N'Đơn vị đào tạo < 40 giảng viên hoặc < 800 người học');
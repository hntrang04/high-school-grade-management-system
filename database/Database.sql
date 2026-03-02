CREATE TABLE ACCOUNT (
  ID VARCHAR(20) PRIMARY KEY,
  USERNAME VARCHAR(255) NOT NULL,
  PASSWORD VARCHAR(255) NOT NULL
);


CREATE TABLE HOCSINH (
  MAHS VARCHAR(20) PRIMARY KEY,
  HOTEN VARCHAR(50) NOT NULL,
  GIOITINH VARCHAR(6) NOT NULL,
  NGSINH DATE NOT NULL,
  DIACHI VARCHAR(255),
  MALOP VARCHAR(255)
);


CREATE TABLE LOPHOC (
  MALOP VARCHAR(20) PRIMARY KEY,
  SISO INT NOT NULL,
  NAMHOC INT NOT NULL,
  MAGV_CNHIEM VARCHAR(20) NOT NULL,
  MAGV_BOMON1 VARCHAR(20),
  MAGV_BOMON2 VARCHAR(20)
);


CREATE TABLE GIAOVIEN (
  MAGV VARCHAR(20) PRIMARY KEY,
  HOTEN VARCHAR(50) NOT NULL,
  GIOITINH CHAR(6) NOT NULL,
  NGSINH DATE NOT NULL,
  SDT VARCHAR(20),
  HOCVI VARCHAR(50),
  LOPHOC_ID VARCHAR(20),
  MAMH VARCHAR(20) NOT NULL,
  ACCOUNT_ID VARCHAR(20) NOT NULL
);


CREATE TABLE MONHOC (
  MAMH VARCHAR(20) PRIMARY KEY,
  TENMH VARCHAR(50) NOT NULL,
  MOTA VARCHAR(255)
);

CREATE TABLE DIEMMONHOC (
  MAHS VARCHAR(20) NOT NULL,
  MALOP VARCHAR(20) NOT NULL,
  MAMH VARCHAR(20) NOT NULL,
  HOCKY INT NOT NULL,
  NAMHOC INT NOT NULL,
  DIEMHS1_1 DECIMAL(5,2),
  DIEMHS1_2 DECIMAL(5,2),
  DIEMHS1_3 DECIMAL(5,2),
  DIEMHS2_1 DECIMAL(5,2),
  DIEMHS2_2 DECIMAL(5,2),
  DIEMHS3 DECIMAL(5,2),
  DTBMH DECIMAL(5,2),  
  PRIMARY KEY (MAHS, MALOP, MAMH, HOCKY, NAMHOC),
  FOREIGN KEY (MAHS) REFERENCES HOCSINH(MAHS),
  FOREIGN KEY (MALOP) REFERENCES LOPHOC(MALOP),
  FOREIGN KEY (MAMH) REFERENCES MONHOC(MAMH)
);

CREATE TABLE HANHKIEM (
  MAHS VARCHAR(20) NOT NULL,
  MALOP VARCHAR(20) NOT NULL,
  LOAIHK CHAR(1) NOT NULL,
  HOCKY INT NOT NULL,
  NAMHOC INT NOT NULL,
  PRIMARY KEY (MAHS, MALOP, LOAIHK, HOCKY, NAMHOC)
);


CREATE TABLE HOCBAHOCKI (
  MAHS VARCHAR(20) NOT NULL,
  MALOP VARCHAR(20) NOT NULL,
  NAMHOC INT NOT NULL,
  HOCKY INT NOT NULL,
  DTBTOANHK DECIMAL(2,1),
  DTBVANHK DECIMAL(2,1),
  DTBANHHK DECIMAL(2,1),
  DTBHK DECIMAL(2,1),
  LOAIHK CHAR(1),
  LOAIHL CHAR(1),
  PRIMARY KEY (MAHS, MALOP)
);

CREATE TABLE HOCBANAMHOC (
  MAHS VARCHAR(20) NOT NULL,
  MALOP VARCHAR(20) NOT NULL,
  NAMHOC INT NOT NULL,
  DTBTOANNH DECIMAL(2,1),
  DTBVANNH DECIMAL(2,1),
  DTBANHNH DECIMAL(2,1),
  DTBNAM DECIMAL(2,1),
  LOAIHK CHAR(1),
  LOAIHL CHAR(1),
  PRIMARY KEY (MAHS, MALOP)
);

ALTER TABLE DIEMMONHOC 
ADD CONSTRAINT FK_DIEMMONHOC_HOCSINH FOREIGN KEY (MAHS) REFERENCES HOCSINH(MAHS);
ALTER TABLE DIEMMONHOC 
ADD CONSTRAINT FK_DIEMMONHOC_LOPHOC FOREIGN KEY (MALOP) REFERENCES LOPHOC(MALOP);
ALTER TABLE DIEMMONHOC 
ADD CONSTRAINT FK_DIEMMONHOC_MONHOC FOREIGN KEY (MAMH) REFERENCES MONHOC(MAMH);

ALTER TABLE HOCSINH 
ADD CONSTRAINT FK_LOPHOC_HOCSINH FOREIGN KEY (MALOP) REFERENCES LOPHOC(MALOP);


ALTER TABLE LOPHOC 
ADD CONSTRAINT FK_LOPHOC_GIAOVIEN FOREIGN KEY (MAGV_CNHIEM) REFERENCES GIAOVIEN(MAGV);
ALTER TABLE LOPHOC
ADD CONSTRAINT FK_LOPHOC_GIAOVIEN FOREIGN KEY (MAGV_BOMON1) REFERENCES GIAOVIEN(MAGV);
ALTER TABLE LOPHOC
ADD CONSTRAINT FK_LOPHOC_GIAOVIEN FOREIGN KEY (MAGV_BOMON2) REFERENCES GIAOVIEN(MAGV);

ALTER TABLE GIAOVIEN
ADD CONSTRAINT FK_ACCOUNT_GIAOVIEN FOREIGN KEY (ACCOUNT_ID) REFERENCES ACCOUNT(ID);
ALTER TABLE GIAOVIEN
ADD CONSTRAINT FK_LOPHOC_GIAOVIEN FOREIGN KEY (MALOP) REFERENCES LOPHOC(MALOP);
ALTER TABLE GIAOVIEN
ADD CONSTRAINT FK_MONHOC_GIAOVIEN FOREIGN KEY (MAMH) REFERENCES MONHOC(MAMH);

ALTER TABLE HANHKIEM 
ADD CONSTRAINT FK_HANHKIEM_HOCSINH FOREIGN KEY (MAHS) REFERENCES HOCSINH(MAHS);
ALTER TABLE HANHKIEM 
ADD CONSTRAINT FK_HANHKIEM_LOPHOC FOREIGN KEY (MALOP) REFERENCES LOPHOC(MALOP);

ALTER TABLE HOCBAHOCKI 
ADD CONSTRAINT FK_HOCBAHOCKI_HOCSINH FOREIGN KEY (MAHS) REFERENCES HOCSINH(MAHS);
ALTER TABLE HOCBAHOCKI 
ADD CONSTRAINT FK_HOCBAHOCKI_LOPHOC FOREIGN KEY (MALOP) REFERENCES LOPHOC(MALOP);

ALTER TABLE HOCBANAMHOC
ADD CONSTRAINT FK_HOCBANAMHOC_HOCSINH FOREIGN KEY (MAHS) REFERENCES HOCSINH(MAHS);
ALTER TABLE HOCBANAMHOC 
ADD CONSTRAINT FK_HOCBANAMHOC_LOPHOC FOREIGN KEY (MALOP) REFERENCES LOPHOC(MALOP);

-- INSERT DỮ LIỆU

-- Chèn dữ liệu vào bảng TAIKHOAN
INSERT INTO TAIKHOAN VALUES ('TK001' , 'GV1'  , '123456'  );
INSERT INTO TAIKHOAN VALUES ('TK002' , 'GV2'  , '000000'  );
INSERT INTO TAIKHOAN VALUES ('TK003' , 'GV3'  , '987654'  );
INSERT INTO TAIKHOAN VALUES ('Tk004' , 'GV4'  , '666666'  );
INSERT INTO TAIKHOAN VALUES ('TK005' , 'GV5'  , '024689'  );
INSERT INTO TAIKHOAN VALUES ('TK006' , 'GV6'  , '147369'  );
INSERT INTO TAIKHOAN VALUES ('TK007' , 'GV7'  , '222222'  );
INSERT INTO TAIKHOAN VALUES ('TK008' , 'GV8'  , '123987'  );
INSERT INTO TAIKHOAN VALUES ('TK009' , 'GV9'  , '036425'  );
INSERT INTO TAIKHOAN VALUES ('TK010' , 'GV10' , '014598'  );
INSERT INTO TAIKHOAN VALUES ('TK011' , 'GV11' , '758693'  );
INSERT INTO TAIKHOAN VALUES ('TK012' , 'GV12' , '142123'  );
INSERT INTO TAIKHOAN VALUES ('TK013' , 'GV13' , '000001'  );
INSERT INTO TAIKHOAN VALUES ('TK014' , 'GV14' , '036311'  );
INSERT INTO TAIKHOAN VALUES ('TK015' , 'GV15' , '966969'  );



-- Chèn dữ liệu vào bảng HOCSINH
INSERT INTO HOCSINH VALUES ('HS001','Trần Bình Minh','Nam',TO_DATE('2004-01-01', 'YYYY-MM-DD'),' Lê Lợi', 'LP001');
INSERT INTO HOCSINH VALUES ('HS002','Giang Mỹ Tiên','Nữ',TO_DATE('2004-06-01', 'YYYY-MM-DD'),' Quang Trung', 'LP002');
INSERT INTO HOCSINH VALUES ('HS003','Võ Đức Trung','Nam',TO_DATE('2004-07-11', 'YYYY-MM-DD'),' Kha Vạn Cân', 'LP003');
INSERT INTO HOCSINH VALUES ('HS004','Lâm Tuấn Thịnh','Nam',TO_DATE('2004-02-09', 'YYYY-MM-DD'),' Thống Nhất', 'LP004');
INSERT INTO HOCSINH VALUES ('HS005','Trần Nguyễn Bảo Trâm','Nữ',TO_DATE('2004-10-25', 'YYYY-MM-DD'),' Hai Bà Trưng', 'LP005');
INSERT INTO HOCSINH VALUES ('HS006','Nguyễn Văn Thắng','Nam',TO_DATE('2004-03-06', 'YYYY-MM-DD'),' Cộng Hòa', 'LP006');
INSERT INTO HOCSINH VALUES ('HS007','Nguyễn Văn Thái Mạnh','Nam',TO_DATE('2004-08-10', 'YYYY-MM-DD'),' Nguyễn Oanh', 'LP007');
INSERT INTO HOCSINH VALUES ('HS008','Hoàng Xuân Thủy','Nam',TO_DATE('2004-10-08', 'YYYY-MM-DD'),' Nguyễn Xí', 'LP008');
INSERT INTO HOCSINH VALUES ('HS009','Phạm Đức Mạnh','Nam',TO_DATE('2004-09-07', 'YYYY-MM-DD'),' Trần Duy Hưng', 'LP009');
INSERT INTO HOCSINH VALUES ('HS010','Nguyễn Duy Tân','Nam',TO_DATE('2004-09-28', 'YYYY-MM-DD'),'Lê Đức Thọ', 'LP001');
INSERT INTO HOCSINH VALUES ('HS011','Vũ Thúy Vi','Nữ',TO_DATE('2004-02-04', 'YYYY-MM-DD'),' Phan Chu Trinh ', 'LP0011');
INSERT INTO HOCSINH VALUES ('HS012','Bùi Hữu Nghĩa','Nam',TO_DATE('2004-12-01', 'YYYY-MM-DD'),'Thảo Điền', 'LP0012');
INSERT INTO HOCSINH VALUES ('HS013','Nguyễn Thanh Tuấn','Nam',TO_DATE('2004-11-10', 'YYYY-MM-DD'),' Nguyễn Đình Chiểu', 'LP0013');
INSERT INTO HOCSINH VALUES ('HS014','Nguyễn Thị Thanh Thúy','Nữ',TO_DATE('2004-05-08', 'YYYY-MM-DD'),'  Trần Não', 'LP0014');
INSERT INTO HOCSINH VALUES ('HS015','Trịnh Xuân Thiện','Nam',TO_DATE('2004-11-30', 'YYYY-MM-DD'),' Nguyễn Du ', 'LP0015');

-- Chèn dữ liệu vào bảng LOPHOC
INSERT INTO LOPHOC VALUES ('LP001','45','2024', 'GV001' , 'GV004', 'GV0015');
INSERT INTO LOPHOC VALUES ('LP002','48','2024', 'GV002' , 'GV001', 'GV0014');
INSERT INTO LOPHOC VALUES ('LP003','41','2024', 'GV003' , 'GV005', 'GV0013');
INSERT INTO LOPHOC VALUES ('LP004','40','2024', 'GV004' , 'GV0014', 'GV0012');
INSERT INTO LOPHOC VALUES ('LP005','50','2024', 'GV005' , 'GV008', 'GV0011');
INSERT INTO LOPHOC VALUES ('LP006','52','2024', 'GV006' , 'GV002', 'GV0010');
INSERT INTO LOPHOC VALUES ('LP007','43','2024', 'GV007' , 'GV001', 'GV009');
INSERT INTO LOPHOC VALUES ('LP008','39','2024', 'GV008' , 'GV009', 'GV007');
INSERT INTO LOPHOC VALUES ('LP009','41','2024', 'GV009' , 'GV007', 'GV008');
INSERT INTO LOPHOC VALUES ('LP010','46','2024', 'GV0010', 'GV0015', 'GV006');
INSERT INTO LOPHOC VALUES ('LP011','38','2024', 'GV0011', 'GV0013', 'GV005');
INSERT INTO LOPHOC VALUES ('LP012','51','2024', 'GV0012', 'GV003', 'GV004');
INSERT INTO LOPHOC VALUES ('LP013','47','2024', 'GV0013', 'GV006', 'GV003');
INSERT INTO LOPHOC VALUES ('LP014','37','2024', 'GV0014', 'GV0011', 'GV002');
INSERT INTO LOPHOC VALUES ('LP015','49','2024', 'GV0015', 'GV0012', 'GV001');


-- Chèn dữ liệu vào bảng GIAOVIEN
INSERT INTO GIAOVIEN VALUES ('GV001','Trần Thị Mai','Nữ',TO_DATE( '1980-05-10'),'0976834512','Thạc sĩ', 'LP001', 'MH001', 'TK001');
INSERT INTO GIAOVIEN VALUES ('GV002','Trần Văn Toàn','Nam',TO_DATE( '1988-01-11'),'0156437289','Thạc sĩ', 'LP002', 'MH002', 'TK002');
INSERT INTO GIAOVIEN VALUES ('GV003','Nguyễn Bá Hưng','Nam',TO_DATE( '1979-12-10'),'0154372894','Thạc sĩ', 'LP004', 'MH003', 'TK003');
INSERT INTO GIAOVIEN VALUES ('GV004','Tạ Việt Phương','Nam',TO_DATE( '1983-07-14'),'0864312785','Tiến sĩ', 'LP005', 'MH004', 'TK004');
INSERT INTO GIAOVIEN VALUES ('GV005','Lương Văn Đại','Nam',TO_DATE( '1977-01-29'),'0976431285','Thạc sĩ', 'LP006', 'MH005', 'TK005');
INSERT INTO GIAOVIEN VALUES ('GV006','Nguyễn Bình Minh','Nam',TO_DATE( '1984-09-01'),'0283469710','Thạc sĩ', 'LP002', 'MH006', 'TK006');
INSERT INTO GIAOVIEN VALUES ('GV007','Nguyễn Thị Loan','Nữ',TO_DATE( '1979-04-09'),'0687412598','Tiến sĩ', 'LP003', 'MH007', 'TK007');
INSERT INTO GIAOVIEN VALUES ('GV008','Phạm Thị Mai','Nữ',TO_DATE( '1981-01-10'),'0687412574','Thạc sĩ', 'LP001', 'MH008', 'TK008');
INSERT INTO GIAOVIEN VALUES ('GV009','Trần Văn Vinh','Nam',TO_DATE( '1978-10-08'),'0987658791','Tiến sĩ', 'LP001', 'MH009', 'TK009');
INSERT INTO GIAOVIEN VALUES ('GV0010','Đỗ Thị Thu','Nữ',TO_DATE( '1982-09-27'),'0312467668','Cứ Nhân', 'LP007', 'MH001', 'TK0010');
INSERT INTO GIAOVIEN VALUES ('GV0011','Hồ Như Ý','Nữ',TO_DATE( '1976-11-15'),'0687458731','Cử Nhân', 'LP006', 'MH003', 'TK0011');
INSERT INTO GIAOVIEN VALUES ('GV0012','Trương Đại Quý','Nam',TO_DATE( '1980-04-28'),'0654312876','Thạc sĩ', 'LP004', 'MH002', 'TK0012');
INSERT INTO GIAOVIEN VALUES ('GV0013','Vũ Minh Sang','Nam',TO_DATE( '1980-05-30'),'0654378111','Thạc sĩ', 'LP003', 'MH005', 'TK0013');
INSERT INTO GIAOVIEN VALUES ('GV0014','Ngô Thị Anh Thư','Nữ',TO_DATE( '1980-05-07'),'0673124577','Tiến sĩ', 'LP001', 'MH006', 'TK0014');
INSERT INTO GIAOVIEN VALUES ('GV0015','Hồ Bích Loan','Nữ',TO_DATE( '1980-07-07'),'0334457699','Cử Nhân', 'LP002', 'MH007', 'TK0015');

-- Chèn dữ liệu vào bảng MONHOC
INSERT INTO MONHOC VALUES ('MH001','Toán học','Môn Toán là nền tảng của các môn khoa học tự nhiên khác');
INSERT INTO MONHOC VALUES ('MH002','Vật Lý','Môn Vật Lý là nền tảng của các môn khoa học tự nhiên khác');
INSERT INTO MONHOC VALUES ('MH003','Hóa học','Môn Hóa là nền tảng của các môn khoa học tự nhiên khác');
INSERT INTO MONHOC VALUES ('MH004','Anh Văn','Môn Anh Văn là nền tảng của ngoại ngữ');
INSERT INTO MONHOC VALUES ('MH005','Văn học','Môn Toán là nền tảng của tiếng Việt');
INSERT INTO MONHOC VALUES ('MH006','Sinh học','Môn Sinh là nền tảng của các môn khoa học tự nhiên khác');
INSERT INTO MONHOC VALUES ('MH007','Tin học','Môn Toán là nền tảng của công nghệ thông tin');
INSERT INTO MONHOC VALUES ('MH008','Lịch Sử','Môn Lịch Sử là nền tảng của các môn khoa học xã hội khác');
INSERT INTO MONHOC VALUES ('MH009','Địa Lí','Môn Địa Lí là nền tảng của các môn khoa học xã hội khác');

--Chèn dữ liệu vào bảng DIEMMONHOC
INSERT INTO DIEMMONHOC VALUES ('HS001', 'LP001', 'MH001', 1, 2024,JSON_ARRAY(8.5, 9.0, 9.5), JSON_ARRAY(7.5, 8.0), 9.5, 8.67);
INSERT INTO DIEMMONHOC VALUES ('HS008', 'LP006', 'MH001', 1, 2024,JSON_ARRAY(8.5, 9.0, 9.5), JSON_ARRAY(7.5, 8.5), 9.4, 8.73);
INSERT INTO DIEMMONHOC VALUES ('HS002', 'LP005', 'MH003', 1, 2024,JSON_ARRAY(8.0, 7.3, 9.2), JSON_ARRAY(8.2, 7.8), 8.5, 8.17);
INSERT INTO DIEMMONHOC VALUES ('HS003', 'LP005', 'MH002', 1, 2024,JSON_ARRAY(9.6, 8.9, 7.4), JSON_ARRAY(8.6, 8.4), 9.1, 8.67);
INSERT INTO DIEMMONHOC VALUES ('HS006', 'LP011', 'MH006', 1, 2024,JSON_ARRAY(9.4, 9.1, 6.7), JSON_ARRAY(8.4, 9.1), 9.8, 8.75);
INSERT INTO DIEMMONHOC VALUES ('HS011', 'LP014', 'MH001', 1, 2024,JSON_ARRAY(7.0, 7.7, 9.8), JSON_ARRAY(8.2, 9.6), 9.4, 8.62);
INSERT INTO DIEMMONHOC VALUES ('HS015', 'LP007', 'MH004', 1, 2024,JSON_ARRAY(6.0, 6.7, 9.6), JSON_ARRAY(7.4, 9.0), 8.8, 7.92);
INSERT INTO DIEMMONHOC VALUES ('HS002', 'LP002', 'MH005', 1, 2024,JSON_ARRAY(9.2, 8.9, 9.2), JSON_ARRAY(9.1, 9.4), 7.9, 8.95);
INSERT INTO DIEMMONHOC VALUES ('HS004', 'LP008', 'MH008', 1, 2024,JSON_ARRAY(8.8, 7.6, 9.4), JSON_ARRAY(6.4, 8.0), 9.3, 8.25);
INSERT INTO DIEMMONHOC VALUES ('HS005', 'LP015', 'MH009', 1, 2024,JSON_ARRAY(7.8, 9.5, 8.0), JSON_ARRAY(8.6, 7.0), 8.6, 8.25);

--Chèn dữ liệu vào bảng HANHKIEM
INSERT INTO HANHKIEM VALUES ('HS001', 'LP001', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS002', 'LP005', 'K', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS003', 'LP005', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS004', 'LP008', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS005', 'LP003', 'K', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS006', 'LP011', 'K', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS007', 'LP015', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS008', 'LP003', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS009', 'LP012', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS010', 'LP014', 'K', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS011', 'LP014', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS012', 'LP020', 'T', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS013', 'LP014', 'K', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS014', 'LP009', 'K', 1, 2024);
INSERT INTO HANHKIEM VALUES ('HS015', 'LP007', 'T', 1, 2024);

CREATE OR REPLACE TRIGGER DIEMTRUNGBINHTOAN
AFTER INSERT OR UPDATE ON DIEMMONHOC
FOR EACH ROW
BEGIN
  DECLARE AVGTOAN DECIMAL(5,2);
  SELECT SUM(COALESCE(DIEMHS1_1, 0)+ COALESCE(DIEMHS1_2, 0)+ COALESCE(DIEMHS1_3, 0)+ COALESCE(DIEMHS2_1, 0)*2 + COALESCE(DIEMHS2_2, 0)*2 + COALESCE(DIEMHS3, 0)*3) / 10
  INTO AVGTOAN
  FROM DIEMMONHOC
  WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
    AND MAMH = 'TOAN'; 
UPDATE HOCBAHOCKI 
SET DTBTOAN = AVGTOAN
WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC;
END;

CREATE OR REPLACE TRIGGER DIEMTRUNGBINHVAN
AFTER INSERT OR UPDATE ON DIEMMONHOC
FOR EACH ROW
BEGIN

  DECLARE AVGVAN DECIMAL(5,2);
  SELECT SUM(COALESCE(DIEMHS1_1, 0)+ COALESCE(DIEMHS1_2, 0)+ COALESCE(DIEMHS1_3, 0)+ COALESCE(DIEMHS2_1, 0)*2 + COALESCE(DIEMHS2_2, 0)*2 + COALESCE(DIEMHS3, 0)*3) / 10
  INTO AVGVAN
  FROM DIEMMONHOC
  WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC AND MAMH = 'VAN';
UPDATE HOCBAHOCKI 
SET DTBVAN = AVGVAN
WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC;
END;


CREATE OR REPLACE TRIGGER DIEMTRUNGBINHANH
AFTER INSERT OR UPDATE ON DIEMMONHOC
FOR EACH ROW
BEGIN
  DECLARE AVGANH DECIMAL(5,2);
  SELECT SUM(COALESCE(DIEMHS1_1, 0)+ COALESCE(DIEMHS1_2, 0)+ COALESCE(DIEMHS1_3, 0)+ COALESCE(DIEMHS2_1, 0)*2 + COALESCE(DIEMHS2_2, 0)*2 + COALESCE(DIEMHS3, 0)*3) / 10
  INTO AVGANH
  FROM DIEMMONHOC
  WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
    AND MAMH = 'ANH';  -- Replace 'PHYSICS' with the actual subject code for Physics
UPDATE HOCBAHOCKI 
SET DTBANH = AVGANH 
WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC;
END;

CREATE OR REPLACE TRIGGER UPDATE_DTBHK
AFTER UPDATE ON HOCBAHOCKI
FOR EACH ROW
DECLARE
  v_dtb_hocki DECIMAL(5,2);
BEGIN
  -- Calculate overall semester average (assuming DTBVAN, DTBANH are already populated)
  SELECT (NEW.DTBVAN + NEW.DTBANH + NEW.DTBTOAN) / 3
  INTO v_dtb_hocki
  FROM HOCBAHOCKI
  WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC;

  -- Update DTBHK (overall semester average) in HOCBAHOCKI
  UPDATE HOCBAHOCKI
  SET DTBHK = v_dtb_hocki
  WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC;

  COMMIT; -- Commit the transaction within the trigger
END;

CREATE OR REPLACE TRIGGER DIEMTRUNGBINHNAMHOC
AFTER INSERT OR UPDATE ON HOCBAHOCKI
FOR EACH ROW
BEGIN
  DECLARE total_dtbhk DECIMAL(4,2);
  DECLARE final_score DECIMAL(2,1);

  -- Get sum of DTBHK for all semesters in a year for the student
  SELECT SUM(CASE WHEN HOCKY = 1 THEN DTBHK ELSE DTBHK * 2 END)
  INTO total_dtbhk
  FROM HOCBAHOCKI
  WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC;

  -- Calculate final score (DTBNAM) by averaging DTBHKs
  DECLARE final_score DECIMAL(2,1) := total_dtbhk / 2;

  -- Update DTBNAM in HOCBANAMHOC table
  UPDATE HOCBANAMHOC
  SET DTBNAM = final_score
  WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC;
END;
/

CREATE OR REPLACE TRIGGER update_achievement_after_delete_diemmonhoc
AFTER DELETE ON DIEMMONHOC
FOR EACH ROW
DECLARE
  v_mahs VARCHAR(20);
  v_malop VARCHAR(20);
  v_hocky INT;
  v_namhoc INT;
  v_count_diemmonhoc INTEGER;
  v_count_hocki INTEGER;
  v_count_namhoc INTEGER;
BEGIN
  -- Get details of the deleted record
  v_mahs := :OLD.MAHS;
  v_malop := :OLD.MALOP;
  v_hocky := :OLD.HOCKY;
  v_namhoc := :OLD.NAMHOC;

  -- Check if any exam scores remain for the student, class, and semester
  SELECT COUNT(*) INTO v_count_diemmonhoc
  FROM DIEMMONHOC
  WHERE MAHS = v_mahs
    AND MALOP = v_malop
    AND HOCKY = v_hocky
    AND NAMHOC = v_namhoc;

  -- Check if any exam scores remain for the student, class, and year
  SELECT COUNT(*) INTO v_count_namhoc
  FROM DIEMMONHOC
  WHERE MAHS = v_mahs
    AND MALOP = v_malop
    AND NAMHOC = v_namhoc;

  -- Update HOCBAHOCKI if no scores remain for the semester
  IF v_count_diemmonhoc = 0 THEN
    SELECT COUNT(*) INTO v_count_hocki
    FROM DIEMMONHOC
    WHERE MAHS = v_mahs
      AND MALOP = v_malop
      AND HOCKY = v_hocky;

    IF v_count_hocki = 0 THEN  -- No scores for the entire semester
      UPDATE HOCBAHOCKI
      SET DTBTOANHK = NULL,  -- Update to your desired value (e.g., NULL)
          DTBVANHK = NULL,
          DTBANHHK = NULL,
          DTBHK = NULL,
          LOAIHK = NULL,
          LOAIHL = NULL
      WHERE MAHS = v_mahs
        AND MALOP = v_malop
        AND HOCKY = v_hocky
        AND NAMHOC = v_namhoc;
    END IF;
  END IF;

  -- Update HOCBANAMHOC if no scores remain for the year
  IF v_count_namhoc = 0 THEN
    UPDATE HOCBANAMHOC
    SET DTBTOANNH = NULL,  -- Update to your desired value (e.g., NULL)
        DTBVANNH = NULL,
        DTBANHNH = NULL,
        DTBNAM = NULL,
        LOAIHK = NULL,
        LOAIHL = NULL
    WHERE MAHS = v_mahs
      AND MALOP = v_malop
      AND NAMHOC = v_namhoc;
  END IF;

  COMMIT; -- Commit the transaction within the trigger
END;
/


CREATE OR REPLACE TRIGGER update_HOCLUCHOCKI
AFTER UPDATE ON HANHKIEM
FOR EACH ROW
BEGIN
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Gioi'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 8;  -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Kha'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 6.5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 3.5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Kha'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 8; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Kha'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 6.5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 3.5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 8; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 6.5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 3.5; -- Only if semester average (DTBHK) is greater than 8
    IF NEW.HOCKY = 1 AND NEW.LOAIHK = 'Y' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBAHOCKI
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >=3.5; -- Only if semester average (DTBHK) is greater than 8
  END IF;
END;
/

CREATE OR REPLACE TRIGGER update_HOCLUCNAMHOC
AFTER UPDATE ON HANHKIEM
FOR EACH ROW
BEGIN
  IF NEW.HOCKY = 2 AND NEW.LOAIHK = 'T' THEN  -- Check if semester 2 conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHK = 'G'  -- Set overall conduct (LOAIHK) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC;

    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Gioi'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
    AND DTBHK >= 8;  -- Only if semester average (DTBHK) is greater than 8
    
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Kha'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 6.5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'T' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 3.5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Kha'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 8; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Kha'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 6.5; -- Only if semester average (DTBHK) is greater than 8
     ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'K' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 3.5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 8; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 6.5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Trung binh'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'TB' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND NAMHOC = NEW.NAMHOC
      AND DTBHK >= 3.5; -- Only if semester average (DTBHK) is greater than 8
    ELSEIF NEW.HOCKY = 2 AND NEW.LOAIHK = 'Y' THEN  -- Check if semester conduct (LOAIHK) is "T?t" (Good)
    UPDATE HOCBANAMHOC
    SET LOAIHL = 'Yeu'  -- Set overall conduct (LOAIHL) to "Gi?i" (Excellent)
    WHERE MAHS = NEW.MAHS AND MALOP = NEW.MALOP AND HOCKY = NEW.HOCKY AND NAMHOC = NEW.NAMHOC
      AND DTBHK >=3.5; -- Only if semester average (DTBHK) is greater than 8
  END IF;
END;
/

CREATE OR REPLACE TRIGGER delete_hocsinh_cascade
AFTER DELETE ON HOCSINH
FOR EACH ROW
BEGIN
  -- Delete related records from DIEMMONHOC
  DELETE FROM DIEMMONHOC
  WHERE MAHS = :OLD.MAHS;

  -- Delete related records from HANHKIEM
  DELETE FROM HANHKIEM
  WHERE MAHS = :OLD.MAHS;

  -- Delete related records from HOCBAHOCKI
  DELETE FROM HOCBAHOCKI
  WHERE MAHS = :OLD.MAHS;

  -- Delete related records from HOCBANAMHOC
  DELETE FROM HOCBANAMHOC
  WHERE MAHS = :OLD.MAHS;

  -- You can add similar logic to delete from other related tables if needed
END;
/

CREATE OR REPLACE TRIGGER update_hk_hl_after_delete
AFTER DELETE ON HANHKIEM
FOR EACH ROW
DECLARE
  v_count INTEGER;
BEGIN
  -- Check if any conduct records remain for the student, class, semester, and year
  SELECT COUNT(*) INTO v_count
  FROM HANHKIEM
  WHERE MAHS = :OLD.MAHS
    AND MALOP = :OLD.MALOP
    AND HOCKY = :OLD.HOCKY
    AND NAMHOC = :OLD.NAMHOC;

  -- If no records remain, update LOAIHK and LOAIHL in HOCBAHOCKI and HOCBANAMHOC
  IF v_count = 0 THEN
    UPDATE HOCBAHOCKI
    SET LOAIHK = 'NULL',  -- Update to your desired value
        LOAIHL = 'NULL'  -- Update to your desired value
    WHERE MAHS = :OLD.MAHS
      AND MALOP = :OLD.MALOP
      AND HOCKY = :OLD.HOCKY
      AND NAMHOC = :OLD.NAMHOC;

    UPDATE HOCBANAMHOC
    SET LOAIHK = 'NULL',  -- Update to your desired value
        LOAIHL = 'NULL'  -- Update to your desired value
    WHERE MAHS = :OLD.MAHS
      AND MALOP = :OLD.MALOP
      AND NAMHOC = :OLD.NAMHOC;

    COMMIT; -- Commit the transaction within the trigger
  END IF;
END;
/

CREATE TRIGGER delete_teacher_from_class
AFTER DELETE ON GIAOVIEN
FOR EACH ROW
BEGIN
  DELETE FROM LOPHOC
  WHERE MAGV_CNHIEM = OLD.MAGV OR MAGV_BOMON1 = OLD.MAGV OR MAGV_BOMON2 = OLD.MAGV;
END;
/




--HOCSINH
    --THEM HOCSINH
  CREATE OR REPLACE PROCEDURE INSERT_HOCSINH(
  p_mahs IN VARCHAR(20),
  p_hoten_hs NVARCHAR(50),
  p_gioitinh_hs IN CHAR(1),
  p_ngaysinh_hs IN DATE,
  p_diachi NVARCHAR(255)
  )
  IS 
  BEGIN 
  INSERT INTO HOCSINH (MAHS, HOTEN, GIOITINH, NGSINH, DIACHI)
  VALUES (p_mahs, p_hoten, p_gioitinh, p_ngsinh, p_diachi);
     COMMIT; -- Commit the transaction
END INSERT_HOCSINH;


    --SUA HOCSINH
  CREATE OR REPLACE PROCEDURE UPDATE_HOCSINH(
  p_mahs IN VARCHAR(20),
  p_hoten_hs NVARCHAR(50),
  p_gioitinh_hs IN CHAR(1),
  p_ngaysinh_hs IN DATE,
  p_diachi NVARCHAR(255)
  )
  IS
  BEGIN 
  UPDATE HOCSINH
  SET HOTEN = p_hoten_hs,
      GIOITINH = p_gioitinh_hs,
      NGSINH = p_ngaysinh_hs,
      DIACHI = p_diachi
  WHERE MAHS = p_mahs;
     COMMIT; -- Commit the transaction
END UPDATE_HOCSINH;


      --XOA HOCSINH
  CREATE OR REPLACE PROCEDURE DELETE_HOCSINH(
  p_mahs IN VARCHAR(20)
  )
  IS
  v_HS_DAXOA NUMBER;
  BEGIN
  DELETE FROM HOCSINH
  WHERE MAHS = p_mahs
  RETURNING INTO v_HS_DAXOA ROWCOUNT;

  IF v_HS_DAXOA > 0 THEN
    DBMS_OUTPUT.PUT_LINE('Xóa h?c sinh thành công!');
  ELSE
    DBMS_OUTPUT.PUT_LINE('Không tìm th?y h?c sinh v?i mã ' || p_mahs);
  END IF;
   COMMIT; -- Commit the transaction
END DELETE_HOCSINH;




--GIAOVIEN 
      --THEM GIAOVIEN
CREATE OR REPLACE PROCEDURE INSERT_GIAOVIEN(
  p_magv VARCHAR(20),
  p_hoten_gv NVARCHAR(50),
  p_gioitinh_gv CHAR(1),
  p_ngaysinh_gv DATE,
  p_sdt VARCHAR(20),
  p_hocvi NVARCHAR(50),
  p_lophoc_id VARCHAR2(20),
  p_mamh VARCHAR2(20),
  p_account_id VARCHAR2(20)
)
IS
BEGIN
  INSERT INTO GIAOVIEN (MAGV, HOTEN, GIOITINH, NGAYSINH, SDT, HOCVI, LOPHOC_ID, MAMH, ACCOUNT_ID)
  VALUES (p_magv, p_hoten_gv, p_gioitinh_gv, p_ngaysinh_gv, p_sdt, p_hocvi, p_lophoc_id, p_mamh, p_account_id);
  COMMIT; -- Commit the transaction
END INSERT_GIAOVIEN;

CREATE OR REPLACE PROCEDURE UPDATE_GIAOVIEN(
  p_magv IN VARCHAR(20),
  p_hoten_gv IN NVARCHAR(50),
  p_gioitinh_gv IN CHAR(1),
  p_ngaysinh_gv IN DATE,
  p_sdt VARCHAR(20),
  p_hocvi NVARCHAR(50),
  p_lophoc_id VARCHAR2(20),
  p_mamh VARCHAR2(20),
  p_account_id VARCHAR2(20)
)
IS
BEGIN
  UPDATE GIAOVIEN
  SET HOTEN = p_hoten_gv,
      GIOITINH = p_gioitinh_gv,
      NGSINH = p_ngaysinh_gv,
      SDT = p_sdt,
      HOCVI = p_hocvi,
      LOPHOC_ID = p_lophoc_id,
      MAMH = p_mamh,
      ACCOUNT_ID = p_account_id
  WHERE MAGV = p_magv;
  COMMIT; -- Commit the transaction
END UPDATE_GIAOVIEN;

CREATE OR REPLACE PROCEDURE DELETE_GIAOVIEN(
  p_magv IN VARCHAR(20)
)
IS
BEGIN
  DELETE FROM GIAOVIEN
  WHERE MAGV = p_magv;

  IF SQL%FOUND THEN
    DBMS_OUTPUT.PUT_LINE('Xóa giáo viên thành công!');
  ELSE
    IF p_magv IS NOT NULL THEN
      DBMS_OUTPUT.PUT_LINE('Không tìm th?y giáo viên v?i mã ' || p_magv);
    END IF;
  END IF;
  COMMIT; -- Commit the transaction
END DELETE_GIAOVIEN;

  
--LOPHOC  
      --THEM LOPHOC
CREATE OR REPLACE PROCEDURE INSERT_LOPHOC (
  p_malop VARCHAR(20),
  p_siso INT,
  p_namhoc INT,
  p_magv_cnhiem VARCHAR2(20),
  p_magv_bomon1 VARCHAR2(20)  -- Optional parameter, can be NULL
, p_magv_bomon2 VARCHAR2(20)  -- Optional parameter, can be NULL
)
IS
BEGIN
  INSERT INTO LOPHOC (MALOP, SISO, NAMHOC, MAGV_CNHIEM, MAGV_BOMON1, MAGV_BOMON2)
  VALUES (p_malop, p_siso, p_namhoc, p_magv_cnhiem, p_magv_bomon1, p_magv_bomon2);
  COMMIT; -- Commit the transaction
END INSERT_LOPHOC;


      --SUA LOPHOC
      CREATE OR REPLACE PROCEDURE UPDATE_LOPHOC (
  p_malop IN VARCHAR(20),
  p_siso IN INT,
  p_namhoc IN INT,
  p_magv_cnhiem IN VARCHAR2(20),
  p_magv_bomon1 IN VARCHAR2(20),  -- Optional parameter, can be NULL
  p_magv_bomon2 IN VARCHAR2(20)  -- Optional parameter, can be NULL
)
IS
BEGIN
  UPDATE LOPHOC
  SET SISO = p_siso,
      NAMHOC = p_namhoc,
      MAGV_CNHIEM = p_magv_cnhiem,
      MAGV_BOMON1 = p_magv_bomon1,
      MAGV_BOMON2 = p_magv_bomon2
  WHERE MALOP = p_malop;
  COMMIT; -- Commit the transaction
END UPDATE_LOPHOC;

      --XOA LOPHOC
      CREATE OR REPLACE PROCEDURE DELETE_LOPHOC (
  p_malop IN VARCHAR(20)
)
IS
BEGIN
  DELETE FROM LOPHOC
  WHERE MALOP = p_malop;

  IF SQL%FOUND THEN
    DBMS_OUTPUT.PUT_LINE('Xóa l?p h?c thành công!');
  ELSE
    IF p_malop IS NOT NULL THEN
      DBMS_OUTPUT.PUT_LINE('Không tìm th?y l?p h?c v?i mã ' || p_magv);
    END IF;
  END IF;
  COMMIT; -- Commit the transaction
END DELETE_LOPHOC;


CREATE OR REPLACE PROCEDURE INSERT_HANHKIEM (
  p_mahs VARCHAR(20),
  p_malop VARCHAR(20),
  p_loaihk CHAR(1),
  p_hocky INT,
  p_namhoc INT
)
IS
  v_count INTEGER;
BEGIN
  -- Check if student and class exist
  SELECT COUNT(*) INTO v_count
  FROM HOCSINH h
  JOIN LOPHOC l ON (h.MALOP = l.MALOP)
  WHERE h.MAHS = p_mahs AND l.MALOP = p_malop;

  IF v_count = 0 THEN
    DBMS_OUTPUT.PUT_LINE('Không tìm th?y h?c sinh ho?c l?p h?c!');
    RETURN; -- Exit the procedure if student or class not found
  END IF;

  -- Insert conduct record
  INSERT INTO HANHKIEM (MAHS, MALOP, LOAIHK, HOCKY, NAMHOC)
  VALUES (p_mahs, p_malop, p_loaihk, p_hocky, p_namhoc);

  COMMIT; -- Commit the transaction
END INSERT_HANHKIEM;

CREATE OR REPLACE PROCEDURE UPDATE_HANHKIEM (
  p_mahs VARCHAR(20),
  p_malop VARCHAR(20),
  p_loaihk CHAR(1),  -- Consider using a more descriptive data type for conduct type (e.g., VARCHAR(50))
  p_hocky INT,
  p_namhoc INT,
  p_new_loaihk CHAR(1)  -- Optional parameter for updating conduct type
)
IS
  v_count INTEGER;
BEGIN
  -- Check if student, class, and existing record exist
  SELECT COUNT(*) INTO v_count
  FROM HANHKIEM
  WHERE MAHS = p_mahs
    AND MALOP = p_malop
    AND LOAIHK = p_loaihk
    AND HOCKY = p_hocky
    AND NAMHOC = p_namhoc;

  IF v_count = 0 THEN
    DBMS_OUTPUT.PUT_LINE('Không tìm th?y b?n ghi h?nh ki?m!');
    RETURN; -- Exit the procedure if record not found
  END IF;

  -- Update conduct type if provided
  IF p_new_loaihk IS NOT NULL THEN
    UPDATE HANHKIEM
    SET LOAIHK = p_new_loaihk
    WHERE MAHS = p_mahs
      AND MALOP = p_malop
      AND LOAIHK = p_loaihk
      AND HOCKY = p_hocky
      AND NAMHOC = p_namhoc;
  END IF;

  COMMIT; -- Commit the transaction
END UPDATE_HANHKIEM;

CREATE OR REPLACE PROCEDURE INSERT_DIEMMONHOC (
  p_mahs VARCHAR(20),
  p_malop VARCHAR(20),
  p_mamh VARCHAR(20),
  p_hocky INT,
  p_namhoc INT,
  p_diemhs1_1 DECIMAL(5,2),
  p_diemhs1_2 DECIMAL(5,2),
  p_diemhs1_3 DECIMAL(5,2),
  p_diemhs2_1 DECIMAL(5,2),
  p_diemhs2_2 DECIMAL(5,2),
  p_diemhs3 DECIMAL(5,2)
)
IS
  v_count INTEGER;
BEGIN
  -- Check if student, class, and subject exist
  SELECT COUNT(*) INTO v_count
  FROM HOCSINH h
  JOIN LOPHOC l ON (h.MALOP = l.MALOP)
  WHERE h.MAHS = p_mahs AND l.MALOP = p_malop;

  IF v_count = 0 THEN
    DBMS_OUTPUT.PUT_LINE('Không tìm th?y h?c sinh ho?c l?p h?c!');
    RETURN; -- Exit the procedure if student or class not found
  END IF;

  SELECT COUNT(*) INTO v_count
  FROM MONHOC
  WHERE MAMH = p_mamh;

  IF v_count = 0 THEN
    DBMS_OUTPUT.PUT_LINE('Không tìm th?y môn h?c!');
    RETURN; -- Exit the procedure if subject not found
  END IF;

  -- Insert scores if student, class, and subject exist
  INSERT INTO DIEMMONHOC (MAHS, MALOP, MAMH, HOCKY, NAMHOC, DIEMHS1_1, DIEMHS1_2, DIEMHS1_3, DIEMHS2_1, DIEMHS2_2, DIEMHS3)
  VALUES (p_mahs, p_malop, p_mamh, p_hocky, p_namhoc, p_diemhs1_1, p_diemhs1_2, p_diemhs1_3, p_diemhs2_1, p_diemhs2_2, p_diemhs3);

  COMMIT; -- Commit the transaction
END INSERT_DIEMMONHOC;

CREATE OR REPLACE PROCEDURE UPDATE_DIEMMONHOC (
  p_mahs VARCHAR(20),
  p_malop VARCHAR(20),
  p_mamh VARCHAR(20),
  p_hocky INT,
  p_namhoc INT,
  p_diemhs1_1 DECIMAL(5,2),
  p_diemhs1_2 DECIMAL(5,2),
  p_diemhs1_3 DECIMAL(5,2),
  p_diemhs2_1 DECIMAL(5,2),
  p_diemhs2_2 DECIMAL(5,2),
  p_diemhs3 DECIMAL(5,2)
)
IS
  v_count INTEGER;
BEGIN
  -- Check if student, class, subject, and record exist
  SELECT COUNT(*) INTO v_count
  FROM DIEMMONHOC
  WHERE MAHS = p_mahs
    AND MALOP = p_malop
    AND MAMH = p_mamh
    AND HOCKY = p_hocky
    AND NAMHOC = p_namhoc;

  IF v_count = 0 THEN
    DBMS_OUTPUT.PUT_LINE('Không tìm th?y b?n ghi ?i?m thi!');
    RETURN; -- Exit the procedure if record not found
  END IF;

  -- Update exam score record
  UPDATE DIEMMONHOC
  SET DIEMHS1_1 = p_diemhs1_1,
      DIEMHS1_2 = p_diemhs1_2,
      DIEMHS1_3 = p_diemhs1_3,
      DIEMHS2_1 = p_diemhs2_1,
      DIEMHS2_2 = p_diemhs2_2,
      DIEMHS3 = p_diemhs3
  WHERE MAHS = p_mahs
    AND MALOP = p_malop
    AND MAMH = p_mamh
    AND HOCKY = p_hocky
    AND NAMHOC = p_namhoc;

  COMMIT; -- Commit the transaction
END UPDATE_DIEMMONHOC;


CREATE OR REPLACE PROCEDURE DELETE_DIEMMONHOC (
  p_mahs VARCHAR(20),
  p_malop VARCHAR(20),
  p_mamh VARCHAR(20),
  p_hocky INT,
  p_namhoc INT
)
IS
  v_count INTEGER;
BEGIN
  -- Check if record exists
  SELECT COUNT(*) INTO v_count
  FROM DIEMMONHOC
  WHERE MAHS = p_mahs
    AND MALOP = p_malop
    AND MAMH = p_mamh
    AND HOCKY = p_hocky
    AND NAMHOC = p_namhoc;

  IF v_count = 0 THEN
    DBMS_OUTPUT.PUT_LINE('Không tìm th?y b?n ghi ?i?m thi!');
    RETURN; -- Exit the procedure if record not found
  END IF;

  -- Delete the record
  DELETE FROM DIEMMONHOC
  WHERE MAHS = p_mahs
    AND MALOP = p_malop
    AND MAMH = p_mamh
    AND HOCKY = p_hocky
    AND NAMHOC = p_namhoc;

  COMMIT; -- Commit the transaction
END DELETE_DIEMMONHOC;
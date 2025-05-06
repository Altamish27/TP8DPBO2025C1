-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS TP8;
USE TP8;

-- Create Study Program (Prodi) Table
CREATE TABLE `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Students Table
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `join_date` date NOT NULL,
  `prodi_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`),
  KEY `fk_student_prodi` (`prodi_id`),
  CONSTRAINT `fk_student_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Courses (Mata Kuliah) Table
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `credits` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Student Course Registration (KRS) Table
CREATE TABLE `student_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `academic_year` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_registration` (`student_id`,`course_id`,`semester`,`academic_year`),
  KEY `fk_krs_student` (`student_id`),
  KEY `fk_krs_course` (`course_id`),
  CONSTRAINT `fk_krs_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_krs_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data into Prodi table
INSERT INTO `prodi` (`code`, `name`) VALUES
('TI', 'Teknik Informatika'),
('SI', 'Sistem Informasi'),
('MI', 'Manajemen Informatika'),
('KA', 'Komputerisasi Akuntansi'),
('DKV', 'Desain Komunikasi Visual');

-- Insert sample data into Students table
INSERT INTO `students` (`name`, `nim`, `phone`, `join_date`, `prodi_id`) VALUES
('Budi Santoso', '2021001', '081234567890', '2021-09-01', 1),
('Ani Wijaya', '2021002', '081234567891', '2021-09-01', 2),
('Dedi Cahyono', '2021003', '081234567892', '2021-09-01', 1),
('Eka Putri', '2021004', '081234567893', '2021-09-01', 3),
('Fandi Ahmad', '2021005', '081234567894', '2021-09-01', 4),
('Gita Nirmala', '2021006', '081234567895', '2021-09-01', 5),
('Hadi Prasetyo', '2021007', '081234567896', '2021-09-01', 1),
('Indah Permata', '2021008', '081234567897', '2021-09-01', 2),
('Joko Widodo', '2021009', '081234567898', '2021-09-01', 3),
('Kartika Sari', '2021010', '081234567899', '2021-09-01', 4);

-- Insert sample data into Courses table
INSERT INTO `courses` (`code`, `name`, `credits`) VALUES
('MK001', 'Pemrograman Dasar', 3),
('MK002', 'Algoritma dan Struktur Data', 4),
('MK003', 'Basis Data', 3),
('MK004', 'Pemrograman Web', 3),
('MK005', 'Jaringan Komputer', 3),
('MK006', 'Sistem Operasi', 3),
('MK007', 'Kecerdasan Buatan', 3),
('MK008', 'Analisis dan Desain Sistem', 4),
('MK009', 'Pemrograman Mobile', 3),
('MK010', 'Keamanan Informasi', 3);

-- Insert sample data into Student Courses (KRS) table
INSERT INTO `student_courses` (`student_id`, `course_id`, `semester`, `academic_year`) VALUES
(1, 1, 'Ganjil', '2021/2022'),
(1, 2, 'Ganjil', '2021/2022'),
(1, 3, 'Ganjil', '2021/2022'),
(2, 1, 'Ganjil', '2021/2022'),
(2, 3, 'Ganjil', '2021/2022'),
(2, 5, 'Ganjil', '2021/2022'),
(3, 2, 'Ganjil', '2021/2022'),
(3, 4, 'Ganjil', '2021/2022'),
(3, 6, 'Ganjil', '2021/2022'),
(4, 1, 'Ganjil', '2021/2022'),
(4, 3, 'Ganjil', '2021/2022'),
(4, 5, 'Ganjil', '2021/2022'),
(5, 7, 'Ganjil', '2021/2022'),
(5, 8, 'Ganjil', '2021/2022'),
(5, 9, 'Ganjil', '2021/2022'),
(6, 2, 'Ganjil', '2021/2022'),
(6, 4, 'Ganjil', '2021/2022'),
(6, 10, 'Ganjil', '2021/2022'),
(7, 1, 'Ganjil', '2021/2022'),
(7, 3, 'Ganjil', '2021/2022'),
(7, 5, 'Ganjil', '2021/2022'),
(8, 6, 'Ganjil', '2021/2022'),
(8, 8, 'Ganjil', '2021/2022'),
(8, 10, 'Ganjil', '2021/2022'),
(9, 1, 'Ganjil', '2021/2022'),
(9, 3, 'Ganjil', '2021/2022'),
(9, 7, 'Ganjil', '2021/2022'),
(10, 2, 'Ganjil', '2021/2022'),
(10, 4, 'Ganjil', '2021/2022'),
(10, 9, 'Ganjil', '2021/2022');
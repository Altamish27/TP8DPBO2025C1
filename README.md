# TP8
## Saya Hasbi Haqqul Fikri dengan NIM 2309245 mengerjakan soal TP 8 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Program
Program ini adalah aplikasi berbasis web yang menangani data terkait **Prodi (Program Studi)**, **Mahasiswa**, **Mata Kuliah**, dan **Registrasi Mata Kuliah Mahasiswa (KRS)**. Aplikasi ini dibangun dengan mengikuti pola arsitektur **Model-View-Controller (MVC)** untuk memisahkan logika aplikasi, tampilan, dan interaksi dengan database.

### Arsitektur Program
- **Model**: Berhubungan langsung dengan database untuk operasi CRUD (Create, Read, Update, Delete).
- **View**: Menampilkan data kepada pengguna dalam bentuk HTML.
- **Controller**: Mengatur logika aplikasi, menerima input dari pengguna, dan mengarahkan data ke View.

## Alur Kerja Program

1. **Proses Permintaan Pengguna**
   - Pengguna mengakses aplikasi melalui browser dan melakukan permintaan untuk melihat, menambah, mengedit, atau menghapus data.
   - Permintaan tersebut diterima oleh **Controller** yang sesuai, misalnya `ProdiController`, `StudentController`, atau `StudentCourseController`.

2. **Controller Mengelola Logika Aplikasi**
   - Controller bertugas memproses permintaan, berinteraksi dengan **Model** untuk mendapatkan atau memodifikasi data.
   - Setelah data diperoleh atau dimodifikasi, Controller akan mengarahkan data tersebut ke **View** untuk ditampilkan kepada pengguna.

3. **Model Berinteraksi dengan Database**
   - **Model** menangani semua interaksi dengan database, seperti menambah, memperbarui, menghapus, dan mengambil data dari tabel.
   - Koneksi database diatur di **database.php**, dan Model menggunakan koneksi ini untuk mengeksekusi query SQL.

4. **View Menampilkan Data**
   - Setelah data diterima dari Controller, **View** akan menampilkan data tersebut dalam format HTML yang mudah dipahami oleh pengguna.

## Struktur Program

### 1. **Controllers**
   - **Controller.php**: Controller utama yang menangani permintaan pengguna umum.
   - **ProdiController.php**: Controller untuk operasi terkait Program Studi (Prodi).
   - **StudentController.php**: Controller untuk operasi terkait Mahasiswa.
   - **StudentCourseController.php**: Controller untuk operasi terkait Registrasi Mata Kuliah Mahasiswa (KRS).

### 2. **Models**
   - **CourseModel.php**: Model untuk berinteraksi dengan tabel Mata Kuliah.
   - **ProdiModel.php**: Model untuk berinteraksi dengan tabel Program Studi (Prodi).
   - **StudentModel.php**: Model untuk berinteraksi dengan tabel Mahasiswa.
   - **StudentCourseModel.php**: Model untuk berinteraksi dengan tabel Registrasi Mata Kuliah Mahasiswa (KRS).

### 3. **Views**
   - **courses/**: Direktori untuk tampilan yang berhubungan dengan Mata Kuliah (create.php, edit.php, index.php, view.php).
   - **prodi/**: Direktori untuk tampilan yang berhubungan dengan Program Studi (create.php, edit.php, index.php, view.php).
   - **students/**: Direktori untuk tampilan yang berhubungan dengan Mahasiswa (create.php, edit.php, index.php, view.php).
   - **student_courses/**: Direktori untuk tampilan yang berhubungan dengan KRS (student_courses.php, course_students.php, create.php, edit.php, index.php).

### 4. **Layouts**
   - **header.php**: Bagian header untuk setiap halaman aplikasi.
   - **footer.php**: Bagian footer untuk setiap halaman aplikasi.

## Desain Database

Program ini memiliki beberapa tabel utama yang saling berhubungan di database:

### 1. **Tabel prodi**
   - `id`: ID Program Studi (Primary Key)
   - `code`: Kode Program Studi
   - `name`: Nama Program Studi
   - `created_at`: Timestamp ketika data dibuat

### 2. **Tabel students**
   - `id`: ID Mahasiswa (Primary Key)
   - `name`: Nama Mahasiswa
   - `nim`: Nomor Induk Mahasiswa
   - `phone`: Nomor Telepon Mahasiswa
   - `join_date`: Tanggal Bergabung
   - `prodi_id`: ID Program Studi (Foreign Key ke tabel `prodi`)

### 3. **Tabel courses**
   - `id`: ID Mata Kuliah (Primary Key)
   - `code`: Kode Mata Kuliah
   - `name`: Nama Mata Kuliah
   - `credits`: Jumlah SKS Mata Kuliah

### 4. **Tabel student_courses**
   - `id`: ID Registrasi (Primary Key)
   - `student_id`: ID Mahasiswa (Foreign Key ke tabel `students`)
   - `course_id`: ID Mata Kuliah (Foreign Key ke tabel `courses`)
   - `semester`: Semester pendaftaran
   - `academic_year`: Tahun akademik

## Proses Penggunaan Aplikasi

### 1. **Melihat Data**
   - Pengguna dapat melihat data dari tabel Prodi, Mahasiswa, Mata Kuliah, dan KRS melalui halaman **index** masing-masing.

### 2. **Menambah Data**
   - Pengguna dapat menambah data baru ke tabel Mahasiswa, Mata Kuliah, atau Prodi melalui form yang disediakan pada halaman **create**.

### 3. **Mengedit Data**
   - Pengguna dapat mengedit data yang sudah ada pada tabel Mahasiswa, Mata Kuliah, atau Prodi melalui form **edit**.

### 4. **Menghapus Data**
   - Pengguna dapat menghapus data yang tidak dibutuhkan lagi melalui halaman **delete**.

#DOKUMENTASI PROGRAM

Uploading Screen Recording 2025-05-06 220624.mp4…



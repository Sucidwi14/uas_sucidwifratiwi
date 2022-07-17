## UJIAN AKHIR SEMESTER

Nama : Komarudin <p>
NIM  : 312010068 <p>
Kelas : TI.20.D.1 <p>
Matkul : Sistem Basis Data <p>
Dosen : Muhammad Najamuddin Dwi Miharja, S.Kom, M.kom <p>

## Membuat Sistem Informasi Klinik.

### Tampilan Login.
![image](https://user-images.githubusercontent.com/101499377/179018250-e1e850a8-84f5-4988-87a2-b0c4bcaacd00.png)<p>
### Tampilan Data Pasien.
![image](https://user-images.githubusercontent.com/101499377/179018616-e3e4ab77-fbbd-40b8-8f1b-ff475b76e447.png)<p>
Dalam tabel pasien saya bisa menambahkan, mengedit dan menghapus data. Contohnya sebagai berikut :<p>
### Tampilan Menambah Pasien.
![image](https://user-images.githubusercontent.com/101499377/179041949-13664779-462f-43bc-922f-f989e2c22251.png)<p>
![image](https://user-images.githubusercontent.com/101499377/179042185-4bbe6e57-87e8-4d53-9268-42d796c3f1f7.png)<p>
### Tampilan Edit Pasien.
![image](https://user-images.githubusercontent.com/101499377/179042281-a661f8b1-2cfc-4dd3-99af-4dbf5728ca25.png)<p>
![image](https://user-images.githubusercontent.com/101499377/179042500-19eccb56-e140-4375-82f7-7f71be81e535.png)<p>
### Tampilan Hapus Pasien.
![image](https://user-images.githubusercontent.com/101499377/179042819-36d4297c-c6c3-4764-9556-468bf7f9bbfb.png)<p>
![image](https://user-images.githubusercontent.com/101499377/179042945-9bd618e2-7f87-4d29-8a89-76608bb98e19.png)<p>
### Tampilan Data Dokter.
![image](https://user-images.githubusercontent.com/101499377/179019566-681be3dd-4374-4be8-b25b-5d9150f95bff.png)<p>
Data dokter juga di berikan perintah tambah, hapus dan juga edit.<p>
### Tampilan Data Obat.
![image](https://user-images.githubusercontent.com/101499377/179020012-62315ede-bf57-48b5-bd04-101d1f56df7b.png)<p>
Didalam modul data obat saya memberikan <b> Trigger </b>
create table log_obat(id_log int(100) auto_increment primary key, id_obat int(10), nama_obat_lama varchar(100), nama_obat_baru varchar(100), waktu date not null)<p>
create trigger update_nama_obat before update on obat for each row insert into log_obat set id_obat=old.id_obat, nama_obat_lama = old.nama_obat, nama_obat_baru=new.nama_obat, waktu = now();<p>
![image](https://user-images.githubusercontent.com/101499377/179020339-68dd4bb5-f045-460a-b1a5-8b2562a66026.png)<p>
Fungsi dari triger disini untuk menampilkan perubahan nama obat setelah dilakukan proses update.<p>
### Tampilan Data User.
Fungsi User yaitu untuk melakukan proses login.
![image](https://user-images.githubusercontent.com/101499377/179020756-80a90d72-4e4e-4b63-8c0c-4f3f90210db4.png)<p>
### Implementasi Fungsi.
Mengimplementasikan Fungsi untuk menampilkan total data :<p>
CREATE FUNCTION fn_totalUsers() RETURNS INT(11) UNSIGNED NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER RETURN (SELECT COUNT(id_pasien) FROM pasien)<p>
![image](https://user-images.githubusercontent.com/101499377/179035276-e72461ca-1785-4471-a17e-79a643c71a97.png)<p>
### Implementasi View.
CREATE VIEW viewPenyakit AS SELECT a.id_berobat, b.nama_pasien, b.jenis_kelamin, b.umur, a.keluhan_pasien, a.hasil_diagnosa, a.tgl_berobat, c.nama_dokter FROM berobat a JOIN pasien b ON a.id_pasien=b.id_pasien JOIN dokter c ON a.id_dokter=c.id_dokter WHERE b.jenis_kelamin='L'<p>
![image](https://user-images.githubusercontent.com/101499377/179035347-80bd15f4-4c0d-4c5a-b06c-b6f5a6c74737.png)<p>

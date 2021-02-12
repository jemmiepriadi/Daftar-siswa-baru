Sebuah apilikasi Website untuk Pendaftaran Siswa Baru menggunakan Laravel PHP, MySQL database, dan Bootstrap.

Disini untuk melakukan Testing terhadap REST API, saya menggunakan tools Postman sebagai Testing Tools untuk REST API saya.

Jadi pertama buka XAMPP dan klik start untuk Apache dan MySQL.

Lalu buka localhost/phpmyadmin dan buat database baru bernama laravel-crud, setelah itu buka project nya, buka terminal dan ketik php artisan migrate untuk melakukan migration ke database. Tetapi pastikan di file .env memiliki nama DB_DATABASE yang sama dengan nama database nya yaitu laravel-crud. untuk username dan passwordnya sesuaikan dengan konfigurasi database Anda pribadi.

Setelah dimigrate, buka terminal dan ketik php artisan serve untuk menjalankan projectnya. Setelah itu kita akan diberikan sebuah link yang berdasarkan IP kita pribadi. Misalkan di saya yaitu http://http://127.0.0.1:8000. Setelah itu, copy link tersebut sesuai dengan IP anda, lalu buka browser dan paste link tersebut. Setelah terbuka, klik tulisan Home untuk diredirect ke page siswa yang berisi list dari data siswa. Atau kita juga bisa menggunakan http://<ip_link>/siswa , contoh di saya http://http://127.0.0.1:8000/siswa.

Setelah itu tabel berisi list dari data siswa akan muncul pada page tersebut. Namun karena kita belum mengisi database apa apa, maka akan kosong, dan kita perlu membuat dan mengisi kolom-kolom tersebut. Klik tombol Tambah Data Siswa pada kanan atas. Setelah itu, akan muncul sebuah form yang nanti kita akan isi untuk nantinya dimasukan ke database dan ditampilkan di tabel nya

lalu setelah memasukan beberapa data, kita bisa melihat 3 tombol di kolom aksi.

//edit siswa di database by ID untuk mengedit dan mengupdate data pada siswa tertentu, atau pada ini id tertentu, klik tombol edit, maka kita akan di pindahkan ke page http://<ip_link>/siswa/{id}/edit atau pada saya yaitu http://127.0.0.1:8000/siswa/{id}/edit , misalnya http://127.0.0.1:8000/siswa/1/edit dimana angka 1 adalah id yang nantinya akan ada form pada page tersebut. kita bisa mengedit dan mengubah data form tersebut sesuai dengan id siswa yang telah dipilih atau juga sesuai dengan id yang ada di link tersebut. Setelah kita submit, maka kita akan di kembalikan ke page http://127.0.0.1:8000/siswa untuk melihat list dari data siswa.

//delete siswa di database by ID kita bisa menghapus data siswa berdasarkan id di kolomnya dengan klik tombol delete. nanti kita akan diberikan sebuah pilihan "yakin ingin menghapus?", lalu klik ya untuk menghapus data siswa tersebut.

//get Data Siswa By ID di database dengan melakukan klik pada tombol Info, kita akan di redirect ke page /siswa/{id} atau http://127.0.0.1:8000/siswa/{id} dimana kita bisa melihat hanya ada data siswa berdasarkan id yang telah kita tentukan di link atau yang telah kita klik di tombol Info tadi.

fitur-fitur diatas menggunakan database untuk memanipulasi data, kali ini kita akan menggunakan REST API untuk memanipulasi data tersebut.

Karena saya menggunakan Postman sebagai testing tools API saya , maka kita akan menggunakan Postman untuk melakukan testing pada REST API kita.

Untuk pemula pengguna Postman, kita hanya perlu membuka tab API di sebelah paling kiri, lalu di tengah nantinya akan ada tab Overview, klik icon '+' di sebelah kanannya. Lalu akan muncul sebuah Method seperti GET,POST,PUT,DELETE yang nanti tinggal kita pilih sesuai kebutuhan kita. Lalu di sebelahnya ada sebuah space yang digunakan untuk memasukan BASE_url dari REST API yang akan kita gunakan nantinya.

//GET LIST REST API DATA Untuk mendapatkan list dari semua data di REST API kita, pilih method GET, masukan http://<ip_link>/api/siswa. Sebagai contoh saya akan memasukan http://127.0.0.1:8000/api/siswa. Selanjutnya klik send, maka Postman akan mengirimkan request ke REST API tersebut dan REST API akan memberikan response list-list dari data siswa yang ada dalam format JSON.

//GET DATA SISWA BY ID FROM REST API Untuk mendapatkan data siswa berdasarkan ID nya, caranya hampir sama seperti cara GET di atas, kita hanya perlu menambahkan /{id} di link tadi. misalkan http://<ip_link>/api/siswa/{id} atau seperti di saya contohnya http://127.0.0.1:8000/api/siswa/{id} (id terserah kita sesuai dengan kemauan kita ingin menampilkan data dari id mana). Bila gagal kita akan mendapat response "message":"Student not found"

//POST DATA SISWA WITH REST API Untuk membuat data siswa dengan REST API, kita perlu menggunakan method post. Maka dari itu, ganti method GET ke method POST. Masukan url http://127.0.0.1:8000/api/siswa/create (Seperti yang dibilang sebelumnya, ikuti ip address masing-masing, misal ip anda adalah 8080, maka gunakan 8080 , bukan 8000 sebagai contoh) , lalu dibawah nya pilih tab body, lalu klik raw, dan pilih dari Text menjadi JSON di sebelah kanan raw. Lalu kita bisa membuat data baru dengan format JSON sepert ini: { "nama_depan":"Salim", "nama_belakang":"Sudhoyono", "jenis_kelamin":"L", "agama":"Islam", "alamat":"Jakarta" } lalu klik send. Maka REST API akan memberikan response "message" : "student record created" bila berhasil. silahkan gunakan method GET untuk memastikan dan melakukan cek apakah data masuk.

//PUT DATA SISWA BY ID WITH REST API kita bisa update data siswa tersebut dengan menggunakan method PUT di REST API. Pilih method sebelumnya menjadi PUT dan masukan URL nya menjadi http://127.0.0.1:8000/api/siswa/{id} (seperti biasa, ikuti IP anda). lalu klik raw, dan pilih dari Text menjadi JSON di sebelah kanan raw. Lalu kita bisa melakukan update dengan format JSON. ID di sini harus sesuai dengan ID data siswa yang ingin kita update. Silahkan gunakan method GET untuk mengetahui id dari siswa tertentu. Gunakan format JSON. Contohnya bila kita ingin update data Salim Sudhyono di atas maka masukan id Salim Sudhyono di link yang dimasukan di method PUT tadi. Update bisa dilakukan seperti ini: { "alamat":"Bekasi" } Maka bila berhasil, REST API akan memberikan response "message":"records updated successfully", bila gagal maka kita akan mendapatkan response "message":"Student not found". Bila berhasil maka data Salim Sudhoyono akan menjadi seperti ini { "nama_depan":"Salim", "nama_belakang":"Sudhoyono", "jenis_kelamin":"L", "agama":"Islam", "alamat":"Bekasi" } Silahkan membuka method GET untuk memastikan apakah data tersebut sudah terupdate atau belum.

//DELETE DATA SISWA BY ID WITH REST API Kita bisa menghapus data sisa tertentu berdasarkan id nya dengan menggantikan method sebelumnya menjadi method DELETE. Lalu masukan URL http://<ip_link>/api/siswa/{id} (lakukan seperti biasa misalnya di saya http://127.0.0.1:8000/api/siswa/{id}). lalu klik send, maka Postman akan mengirimkan request DELETE ke REST API dan bila berhasil kita akan mendapatkan response "message":"records deleted". Bila gagal kita akan mendapat response "message":"siswa not found". Silahkan gunakan method GET untuk memastikan apakah data tersebut sudah terhapus atau tidak.

Demikianlah Dokumentasi apilikasi dari saya. Atas perhatiannya, saya ucapkan terimakasih.

# Website Sederhada Penghitung Harga Sampah

_Website ini diperuntukan untuk melakukan coding test pada peserta recruitment sebagai web developer di Pt. Transindo Data Perkasa yang nantinya akan ditempatkan di RSUD Genteng Kota Banyuwangi_

### Configurasi Back-End

-   _Download project dengan cara buka terminal ketikan :_

    `git clone git@github.com:bogaZ/back-end-bookioApp.git`

-   _Membuat database dengan nama bebas misal :_ **laravel_bookio**
-   _Membuat file_ `.env`_lalu copy semua isi dari file_ `.env.example` _ke file_ `.env`
-   _Configurasi_ `DB_DATABASE=laravel_bookio` _pada file_ `.env` _sesuai dengan nama database_
-   _Buka terminal masuk ke folder_ **back-end-bookioApp** _dan jalankan perintah :_

    `composer update`

    `php artisan migrate:refresh --seed`

    `php artisan passport:install --force`

    `php artisan serve`

-   _Lalu akses aplikasi sesuai nama domain misal :_ http://localhost:8000/
-   _Halaman website akan error dikarenakan anda harus meregenerate APP Keys_
-   **Generate APP KEYS**
-   _Akses kembali website sesuai nama domain misal :_ http://localhost:8000/
-   _Jika berhasil anda akan diarahkan ke login admin_
-   _Login ke dashboard admin dengan menggunakan :_
-   _Username :_ **adminbookio@gmail.com**
-   _Masuk ke pengaturan lalu tambahkan_ **Pembayaran**
-   _Password :_ **12345678**

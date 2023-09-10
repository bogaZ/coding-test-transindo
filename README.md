# Website Sederhada Penghitung Harga Sampah

_Website ini diperuntukan untuk melakukan coding test pada peserta recruitment sebagai web developer di Pt. Transindo Data Perkasa yang nantinya akan ditempatkan di RSUD Genteng Kota Banyuwangi_

### Configurasi

-   _Clone project dengan cara buka terminal ketikan :_

    `git clone git@github.com:bogaZ/coding-test-transindo.git`

-   _Membuat database dengan nama bebas misal :_ **kalkulator_bank_sampah**
-   _Membuat file_ `.env`_lalu copy semua isi dari file_ `.env.example` _ke file_ `.env`
-   _Configurasi_ `DB_DATABASE=kalkulator_bank_sampah` _pada file_ `.env` _sesuai dengan nama database_
-   _Buka terminal masuk ke folder_ **back-end-bookioApp** _dan jalankan perintah :_

    `composer update`

    `php artisan migrate:refresh --seed`

    `php artisan serve`

-   _Lalu akses aplikasi sesuai nama domain misal :_ http://localhost:8000/
-   _Halaman website akan error dikarenakan anda harus meregenerate APP Keys_
-   **Generate APP KEYS**
-   _Akses kembali website sesuai nama domain misal :_ http://localhost:8000/
-   _Jika berhasil anda akan diarahkan ke halaman home_
-   _Login ke dashboard admin dengan menggunakan :_
-   _Username :_ **admin@gmail.com**
-   _Password :_ **12345678**

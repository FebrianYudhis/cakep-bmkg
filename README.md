## Tentang

Cakep (CAtatan KEhadiran Pegawai) ini dimaksudkan sebagai aplikasi absensi untuk PPNPN BMKG H.Asan Kotawaringin Timur

## Jenis Repository

Repo ini memiliki prefix "rp" yang berarti "repository pribadi".
Artinya repository ini di khususkan penggunaan pribadi pemilik repository.
Berada di github publik sebagai bentuk arsip.
Jika ingin melakukan modifikasi silahkan sesuaikan dengan environment anda.

## Persyaratan

- Webserver (apache,nginx)
- Database SQL (mysql,mariadb)
- PHP >= 7.3
- PHP Ekstensi (BCMath,Ctype,Fileinfo,JSON,Mbstring,OpenSSL,PDO,Tokenizer,XML)
- Package Manager PHP (composer) 


## Instalasi

- Jalankan di terminal "git clone https://github.com/FebrianYudhis/rp-cakep.git"
- Jalankan di terminal "composer install"
- Rename .env.example menjadi .env dan sesuaikan dengan environment anda
- Jalankan di terminal "php artisan key:generate"
- Jalankan di terminal "php artisan migrate"
- Jalankan di terminal "php artisan db:seed"

## Penggunaan
Setiap pengguna dapat mendaftarkan akunnya, akan tetapi akun dilock.
Peran admin dapat mengelola pada link "/kelola" kemudian login menggunakan akun default dengan username : admin, password : admin123.
Admin dapat membuka kunci pada akun yang baru didaftarkan.

Apabila akun gagal login, maka admin dapat mereset masuk akun tersebut.

## License

The MIT License (MIT).

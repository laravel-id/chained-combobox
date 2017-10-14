# Tentang Repositori
Repositori ini merupakan contoh aplikasi dari pos [Membuat Chained Combobox di Laravel Menggunakan VueJS](https://www.laravel.web.id/2017/05/04/membuat-chained-combobox-di-laravel-menggunakan-vuejs/).

[![deepin-screen-recorder_Select_area_20171014104420.gif](https://s1.postimg.org/6aujydvkcf/deepin-screen-recorder_Select_area_20171014104420.gif)](https://postimg.org/image/2glsffdmez/)

## Mengimpor Pangkalan Data (Database)
Pangkalan data dapat diambil dari tautan berikut: https://github.com/edwardsamuel/Wilayah-Administratif-Indonesia/blob/master/mysql/indonesia.sql.

Terima kasih kepada [Edward Samuel Pasaribu](https://github.com/edwardsamuel) yang telah menyediakan data geografis Indonesia dalam bentuk pangkalan data SQL.

## Instalasi Laravel
- Fork (opsional) dan clone [repositori](https://github.com/laravel-id/chained-combobox.git).
- Masuk ke direkori tempat aplikasi di-clone. 
- Salin berkas ```env.example``` menjadi ```.env```.
- Atur koneksi pangkalan data pada berkas ```.env```
- Update package menggunakan Composer dengan perintah: ```composer update -vvv```.
- Generate key baru dengan perintah: ```php artisan key:generate```.

## Instalasi Laravel Mix dan Kompilasi Asset
- Pastikan NodeJS dan NPM sudah terinstal di mesin lokal.
- Dari direktori root aplikasi, update Node package dengan perintah: ```npm install```.
- Jalankan perintah ```npm run dev``` untuk mengkompilasi ulang asset jika ada perubahan. Baca sekilas tentang [Laravel Mix](https://www.laravel.web.id/2017/02/13/laravel-mix-untuk-stand-alone-project/).

## Menjalankan Aplikasi
Aplikasi berbasis Laravel dapat dijalankan menggunakan built-in web server yang ada di PHP. Pada direktori root aplikasi, jalankan perintah: ```php artisan serve```. Kemudian akses aplikasi dari peramban (browser) dengan tautan ```localhost:8000```.

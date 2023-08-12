
# BURGER KING REPLICATE TEST

sebuah projek replika burgerking yang dibangun dengan menggunakan laravel, livewire, javascript. oleh Widianto Eka Saputro


## Reference

 - [Burger King Delivery Official Website ID](https://bkdelivery.co.id/)
 - [Laravel](https://laravel.com/)
 - [Livewire](https://livewire.laravel.com/)


## Authors

- [Widiskel Github](https://www.github.com/widiskel)
- [Linkedin Github](https://www.linkedin.com/in/widianto-eka-saputro-5b7a3b168/)
- [Website](https://widiskel.site)


## Demo

ada 2 user demo pada projek ini

Superadmin:
```
email : superadmin@admin.com
password : password
```

Customer:
```
email : user@user.com
password : password
```

## Requirement

untuk menyiapkan projek ini ada beberapa hal yang harus anda siapkan

- composer
- php > 8.0
- node (saya menggunakan v18.16.1)
- mysql (saya menggunakan v8)


## Installation & Setup

untuk melakukan instalasi dan set-up projek ini ada beberapa tahap dan perintah yang harus anda jalankan

### step 1
buat database dengan nama yang anda inginkan, contoh disini saya menggunakan database dengan nama  ``` burger ```
### step 2
buka terminal anda dan jalankan perintah perintah berikut secara berurutan
```bash
    cd [project]
    cp .env.example .env
```
### step 3
siapkan file .env , ubah bagian database sesuai dengan yang anda gunakan
```
    nano .env
```
### step 4
jalankan perintah - perintah berikut
```
    composer install
    npm install
    npm run build
    php artisan key:generate
    php artisan storage:link
    php artisan migrate --seed
```
### Final Step
untuk menjalankan projek ini anda bisa menggunakan perintah
```
    php artisan serve
```
jika anda ingin memantai secara realtime langsung selama proses development , anda bisa menjalankan vite untuk hotreload project selama tahap development dengan perintah
```
    npm run dev
```

### installation note
harap dipastikan APP_URL pada ```.env``` sesuai dengan port dimana anda menjalankan project ini, contoh ```APP_URL=http://localhost:8000```

## Optimizations

Projek ini tidak mereplika sepenuhnya website burger king, ,ada beberapa fitur dan halaman yang belum dibuat. sehingga jika anda menjalankan projek ini mungkin ada tombol atau anchor yang tidak bekerja.  


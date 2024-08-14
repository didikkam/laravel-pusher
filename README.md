
# LARAVEL PUSHER - TODO LIST

## How To Install
Install PHP
```
PHP >= 8.1
sudo apt install -y php8.1 php8.1-fpm php8.1-ctype php8.1-curl php8.1-dom php8.1-fileinfo php8.1-mbstring php8.1-pdo php8.1-tokenizer php8.1-xml php8.1-zip php8.1-gd php8.1-mysql
```
Install Semua Dependensi
```
composer install
npm install
```
Copy .env.example menjadi .env
```
cp .env.example .env
```
sesuaikan konfigurasi .env
```
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=
```
Lakukan key:generate
```
php artisan key:generate
```
Lakukan migrasi
```
php artisan migrate
php artisan db:seed
```
Lakukan
```
php artisan storage:link
sudo chown 33:33 -R public/ storage/ bootstrap/
```
Jalankan
```
php artisan serve
npm run dev
```
# SIPOSYANDU

Siposyandu adalah sistem informasi pos pelayanan terpadu yang digunakan untuk memanajemen kegiatan posyandu. Proyek ini dikembangakan dengan framework PHP (Laravel) dengan beberapa package yakni breeze, livewire, dan spatie. Laravel digunakan karena mengikuti pola konsep MVC (Model, View, Controller). Laravel juga menyediakan lingkungan yang mendukung untuk pengembangan aplikasi dengan packagenya. Livewire digunakan pada proyek ini untuk menjadikan SPA. Breeze digunakan untuk autentikasi sedangkan spatie digunakan untuk role.

## How to Install and Run the Project

Clone repository

```sh
git clone https://github.com/auizadi/siposyandu.git
```

Install composer packages

```sh
composer install
```

Install npm

```sh
npm install
```

Copy .env file

```sh
cp .env.example .env
```

Generate key

```sh
php artisan key:generate
```

Run npm

```sh
npm run dev
```

Run project (run with different terminal)

```sh
php artisan serve
```

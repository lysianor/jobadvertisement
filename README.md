<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel 5.8

### Home Page

<img src="Prototype/Home_page.png" height="300px">

### Browse Jobs

<img src="Prototype/Browse_jobs.png" height="300px">

### Browse Companies

<img src="Prototype/Browse_companies.png" height="300px">

### Sign In Page

<img src="Prototype/Sign_in.png" height="300px">

### Sign Up Page

<img src="Prototype/Sign_up.png" height="300px">

## Demo

You can try the live demo : www.gainstrongm.xyz

You can check the Prototype here: https://github.com/lysianor/jobadvertisement/tree/master/Prototype


## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Insert your GOOGLE_RECAPTCHA_KEY RECAPATCHA v2
- Insert your GOOGLE_MAPS_API_KEY
- Insert your Smtp key
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- You can login to adminpanel by going go `/login` URL and login with credentials __admin@admin.com__ - __password__

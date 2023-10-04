# Vue.js with Laravel
```
cd ~/laravel
composer create-project --prefer-dist laravel/laravel vue_laravel
```
For this handout:
**&lt;main>** == ~/laravel/vue_laravel

### Install Laravel Breeze + Blade
```
composer require laravel/breeze --dev
php artisan breeze:install blade
```
By entering blade as an argument, you won't be prompted to select a framework.

Edit &lt;main>/resources/views/layouts/navigation.blade.php to remove all the 
links from the navigation where **auth** is called.  This is both for the 
desktop and the mobile menus.  Here is what the code looks like with 
those parts commented out.

**&lt;main>/resources/views/layouts/navigation.blade.php**
```html
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>               
    </div>
</nav>
```

For our routes, we only need one route to the index page.  Later we can use 
vue-router for the additional routes.

**&lt;main>/routes/web.php**
```php
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'dashboard')->name('dashboard');  // only one route defined
```

Next, we need to tell Vue where it will be **mounted**.  This will be the 
main element of the HTML structure.  So, Vue will live inside that element.
This will usually be one of the top &lt;div> elements in the main layout and 
we identify it by assigning 'id="app"' So, edit 
**&lt;main>/resources/views/layouts/app.blade.php:**

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
       <div class="min-h-screen bg-gray-100" id="app"> <!-- new line -->
       <!-- <div class="min-h-screen bg-gray-100"> -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
```

That sets up the Blade layout for the project at this point.

### Installing and Configuring Vue.js
Breeze installs Alpine.js, but we don't use it and it can 
be removed from package.json

Then, we can install Vue and Vue loader.
```
npm install vue@next vue-loader@next
```

Next, we install the Vue Vite plugin
```
npm install --save-dev @vitejs/plugin-vue
```

Modify **&lt;main>/vite.config.js** by adding some lines

**&lt;main>/vite.config.js** added lines 3, 14-21
```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
               transformAssetUrls: {
                  base: null,
                  includeAbsolute: false,
               },
            },
        }),
    ],
});
```

### Creating Vue Component
We want to create a **Vue** component to the Dashboard page.  In the 
future, this component will show the list of Posts, so we will 
call its HTML tag **&lt;posts-index>**

Edit **&lt;main>/resources/views/dashboard.blade.php** by deleting the 
line with "You're logged in!" and adding the &lt;posts-index> element.
```html
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <posts-index></posts-index>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

Now, we will create a Vue component using 
**&lt;main>/resources/js/components/Posts/Index.vue**  At this point
we will only put some dummy static text.
```html
<template>
    Table coming soon.
</template>
```

**Important**

For every Vue component, there will be two parts
```html
<script></script>

<template></template>
```
For our simple component here, there aren't any JavaScript operations 
so there is no &lt;script> element.

Recall that in **&lt;main>/resources/views/layouts/app.blade.php** we 
had the &lt;div> element with **id="app"**.  So, we will modify the 
**&lt;main>/resources/js/app.js** file.  For that file we can remove 
all the lines referring to Alpine.
```javascript
import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import PostsIndex from './components/Posts/Index.vue';

createApp({})
   .component('PostsIndex', PostsIndex)
   .mount('#app')
```

To summarize what we are doing, consider the following:

We create the **Vue** application using **createApp()**.  Note 
that this function is imported from 'vue'.

We attach a Vue component to the Vue application, importing it 
from the **&lt;main>/resources/js/components/Posts/Index.vue** file.  
We give this component the name **PostsIndex** when we do this.

Then, we mount the Vue application to the **id="app"** element in the 
main layout, the file **&lt;main>/resources/views/layouts/app.blade.php**

### Running the program
```
npm run dev
php artisan serve
```

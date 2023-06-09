<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Beranda',
        'active' => '/'
    ]);
});

Route::get('/disaster', function () {
    return view('disaster', [
        'title' => 'Data Bencana',
        'active' => 'disaster'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/agenda', function () {
    return view('agenda', [
        'title' => 'Agenda',
        'active' => 'agenda'
    ]);
});

Route::get('/profile', function () {
    return view('profile', [
        'title' => 'Profil',
        'active' => 'profile'
    ]);
});

Route::get('/galery', function () {
    return view('galery', [
        'title' => 'Galeri,',
        'active' => 'galery'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Kontak',
        'active' => 'contact'
    ]);
});

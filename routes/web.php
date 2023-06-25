<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DisasterController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminGalleryCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAgendaController;
use App\Http\Controllers\DashboardOrganizationController;
use App\Http\Controllers\DashboardDisasterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardGalleryController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\ProfileController;

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

// halaman home
Route::get('/', [HomeController::class, 'index']);

// halaman data bencana
Route::get('/disaster', [DisasterController::class, 'index']);

// halaman berita
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// halaman kategori
Route::get('/categories', [CategoryController::class, 'index']);

// halaman agenda
Route::get('/agenda', [AgendaController::class, 'index']);

// halaman profil
Route::resource('/profile', ProfileController::class);

Route::get('/galery', function () {
    return view('galery', [
        'title' => 'Galeri,',
        'active' => 'galery'
    ]);
});

Route::get('/member', function () {
    return view('member', [
        'title' => 'Anggota,',
        'active' => 'member'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Kontak',
        'active' => 'contact'
    ]);
});

// halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// halaman register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//  halaman dashboard user
Route::get('/dashboard/users', [DashboardUserController::class, 'index'])->middleware('auth');

// halaman dashboard berita
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// halaman  dashboard kategori
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// halaman dashboard organisasi
Route::get('/dashboard/organizations/checkSlug', [DashboardOrganizationController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/organizations', DashboardOrganizationController::class)->middleware('auth');

// halaman dashboard bencana
Route::get('/dashboard/disasters/checkSlug', [DashboardDisasterController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/disasters', DashboardDisasterController::class)->middleware('auth');

// halaman dashboard agenda
Route::get('/dashboard/agendas/checkSlug', [DashboardAgendaController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/agendas', DashboardAgendaController::class)->middleware('auth');

// halaman dashboard profil
Route::get('/dashboard/profiles/checkSlug', [DashboardProfileController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/profiles', DashboardProfileController::class)->middleware('auth');

// halaman dashboard galari
Route::get('/dashboard/galleries/checkSlug', [DashboardGalleryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/galleries', DashboardGalleryController::class)->middleware('auth');

// halaman kategori galeri
Route::get('/dashboard/gallery_categories/checkSlug', [AdminGalleryCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/gallery_categories', AdminGalleryCategoryController::class)->except('show')->middleware('admin');

// halaman kategori anggota
Route::get('/dashboard/members/checkSlug', [DashboardMemberController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/members', DashboardMemberController::class)->middleware('auth');



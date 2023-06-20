<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardOrganizationController;
use App\Http\Controllers\DashboardDisasterController;
use App\Http\Controllers\DashboardAgendaController;
use App\Http\Controllers\DashboardGaleryController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardAspirationController;
use App\Http\Controllers\DisasterController;
use App\Models\Disaster;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// halaman tampilan data bencana
Route::get('/disaster', [DisasterController::class, 'index']);

// halaman tampilan berita
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'Dashboard',
    ]);
})->middleware('auth');

Route::get('/dashboard/users', [DashboardUserController::class, 'index']);

// halaman berita
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// halaman kategory berita
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// halaman data organisasi
Route::get('/dashboard/organizations/checkSlug', [DashboardOrganizationController::class, 'checkSlug']);
Route::resource('/dashboard/organizations', DashboardOrganizationController::class)->middleware('auth');

// halaman data bencana
Route::get('/dashboard/disasters/checkSlug', [DashboardDisasterController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/disasters', DashboardDisasterController::class)->middleware('auth');



// Route::get('/dashboard/disaters', [DashboardDisasterController::class, 'index']);

// Route::get('/dashboard/agendas', [DashboardAgendaController::class, 'index']);

// Route::get('/dashboard/profiles', [DashboardProfileController::class, 'index']);

// Route::get('/dashboard/gelerys', [DashboardGaleryController::class, 'index']);

// Route::get('/dashboard/members', [DashboardMemberController::class, 'index']);

// Route::get('/dashboard/aspirations', [DashboardAspirationController::class, 'index']);
<?php

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HotlineController;
use App\Http\Controllers\Admin\JurnalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PoadcastController;
use App\Http\Controllers\PengajuanSertifikatController;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotline;
use App\Models\PengajuanSertifikat;
use Gallib\ShortUrl\Facades\ShortUrl;

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
Route::middleware('optimizeImages')->group(function () {
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //dashboard
    Route::get('/bem-admin', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth','roles:super admin,admin']], function () {
//profile
Route::put('/profile/update/{user:id}', [DashboardController::class, 'profile'])->name('profile.update');
Route::view('/profile', 'admin/profile/index')->name('profile');

//event
Route::post('/event/store', [DashboardController::class, 'store'])->name('event.store');
Route::put('/event/update/{event:id}', [DashboardController::class, 'update'])->name('event.update');
Route::post('/event/update/edit-date', [DashboardController::class, 'updateEventDate'])->name('edit-date');

// route role
Route::group(['middleware' => ['auth','roles:super admin']], function () {
    //user verif
    Route::get('/bem-admin/user', [UserController::class, 'index'])->name('user');
    Route::put('/bem-admin/user/verif/{user:id}', [UserController::class, 'verif'])->name('user.verif');
    Route::delete('/bem-admin/user/destroy/{user:id}', [UserController::class, 'destroy'])->name('user.destroy');
});

//blog
Route::get('/bem-admin/blog', [BlogController::class, 'index'])->name('blog-admin');
Route::get('/bem-admin/blog/create', [BlogController::class, 'create'])->name('blog-admin.create');
Route::get('/bem-admin/blog/edit/{post:pslug}', [BlogController::class, 'edit'])->name('blog-admin.edit');
Route::post('/bem-admin/blog/store', [BlogController::class, 'store'])->name('blog-admin.store');
Route::put('/bem-admin/blog/update/{post:pid}', [BlogController::class, 'update'])->name('blog-admin.update');
Route::delete('/bem-admin/blog/destroy/{post:pid}', [BlogController::class, 'destroy'])->name('blog-admin.destroy');

//hotlines
Route::get('/bem-admin/hotline', [HotlineController::class, 'index'])->name('hotline');
Route::delete('/bem-admin/hotline/destroy/{hotline:id}', [HotlineController::class, 'destroy'])->name('hotline.destroy');

//jurnal
Route::get('/bem-admin/jurnal', [JurnalController::class, 'index'])->name('jurnal');
Route::get('/bem-admin/jurnal/create', [JurnalController::class, 'create'])->name('jurnal.create');
Route::get('/bem-admin/jurnal/edit/{jurnal:id}', [JurnalController::class, 'edit'])->name('jurnal.edit');
Route::post('/bem-admin/jurnal/store', [JurnalController::class, 'store'])->name('jurnal.store');
Route::put('/bem-admin/jurnal/active/{jurnal:id}', [JurnalController::class, 'active'])->name('jurnal.active');
Route::put('/bem-admin/jurnal/nonaktif/{jurnal:id}', [JurnalController::class, 'nonaktif'])->name('jurnal.nonaktif');
Route::put('/bem-admin/jurnal/update/{jurnal:id}', [JurnalController::class, 'update'])->name('jurnal.update');
Route::delete('/bem-admin/jurnal/destroy/{jurnal:id}', [JurnalController::class, 'destroy'])->name('jurnal.destroy');

//poadcast

Route::get('/bem-admin/poadcast', [PoadcastController::class, 'index'])->name('poadcast');
Route::get('/bem-admin/poadcast/create', [PoadcastController::class, 'create'])->name('poadcast.create');
Route::get('/bem-admin/poadcast/edit/{poadcast:id}', [PoadcastController::class, 'edit'])->name('poadcast.edit');
Route::post('/bem-admin/poadcast/store', [PoadcastController::class, 'store'])->name('poadcast.store');
Route::put('/bem-admin/poadcast/active/{poadcast:id}', [PoadcastController::class, 'active'])->name('poadcast.active');
Route::put('/bem-admin/poadcast/nonaktif/{poadcast:id}', [PoadcastController::class, 'nonaktif'])->name('poadcast.nonaktif');
Route::put('/bem-admin/poadcast/update/{poadcast:id}', [PoadcastController::class, 'update'])->name('poadcast.update');
Route::delete('/bem-admin/poadcast/destroy/{poadcast:id}', [PoadcastController::class, 'destroy'])->name('poadcast.destroy');

//sertifikat

Route::get('/bem-admin/sertifikat-list', [PengajuanSertifikatController::class, 'index'])->name('sertifikat');
Route::delete('/bem-admin/sertifikat-list/destroy/{pengajuans:id}', [PengajuanSertifikatController::class, 'destroy'])->name('sertifikat.destroy');
Route::patch('/bem-admin/sertifikat-list/verifikasi/{pengajuans:id}', [PengajuanSertifikatController::class, 'verifikasi'])->name('sertifikat.verifikasi');
Route::get('/bem-admin/sertifikat-list/detail/{pengajuans:id}', [PengajuanSertifikatController::class, 'show'])->name('sertifikat.detail');
Route::get('/bem-admin/download/{filename}', [PengajuanSertifikatController::class, 'download']);

});

//lannding

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/blog/detail/{blog:pslug}', [MainController::class, 'BlogDetail'])->name('blog.detail');
Route::get('/blog/search', [MainController::class, 'blogSearch'])->name('blog.search');
Route::get('/program-kerja', [MainController::class, 'proker'])->name('program-kerja');
Route::get('/lembaga-mahasiswa', [MainController::class, 'lembaga'])->name('lembaga-mahasiswa');
Route::get('/ukm', [MainController::class, 'ukm'])->name('ukm');
Route::get('/ukm/detail/{ukm:slug}', [MainController::class, 'UkmDetail'])->name('ukm.detail');
Route::get('/paguyuban', [MainController::class, 'paguyuban'])->name('paguyuban');
Route::get('/paguyuban/detail/{paguyuban:slug}', [MainController::class, 'PaguyubanDetail'])->name('paguyuban.detail');
Route::post('/hotline/store', [MainController::class, 'store'])->name('hotline.store');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/kontak', 'contact')->name('kontak');
Route::view('/asrama', 'asrama')->name('asrama');

Route::group(['prefix'=>'bem-admin/shortlink','middleware' => 'auth'], function(){
ShortUrl::createRoutes();
ShortUrl::manageRoutes();

});
ShortUrl::redirectRoute();
});




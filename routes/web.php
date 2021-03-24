<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PostController;
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
    return view('landing');
});

Route::get('/addpost', function () {
    return view('add_post');
});

Route::get('/view', function () {
    return view('guest/view_post');
});

//Route::get('/showpost', function () {
//    return view('show-post');
//});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/postgo', [PostController::class, 'store']);
Route::get('/showpost', [PostController::class, 'show'])->name('show');

Route::get('/e-learning', [GuestController::class, 'elear'])->name('elear');
Route::get('view/{id}', [GuestController::class, 'view']);
Route::get('/download/{file}', [GuestController::class, 'download'])->name('download');
Route::get('/keanggotaan', [GuestController::class, 'member'])->name('member');
Route::get('/kegiatan_', [GuestController::class, 'activity'])->name('activity');
Route::get('/kegiatan_/view/{id}', [GuestController::class, 'view_activity'])->name('guest.activity.view');

Route::get('/tambah_anggota', [MemberController::class, 'add'])->name('add');
Route::post('/membgo', [MemberController::class, 'store']);
Route::get('/anggota', [MemberController::class, 'show'])->name('show');
Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
Route::get('/anggota/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
Route::post('/membup/{id}', [MemberController::class, 'update']);
Route::get('anggota/view/{id}', [MemberController::class, 'view'])->name('member.view');

Route::get('/tambah_periode', function () { return view('add_period'); });
Route::post('/perigo', [PeriodController::class, 'store']);
Route::get('/tabel_periode', [PeriodController::class, 'show'])->name('show');
Route::post('/set_active/{id}', [PeriodController::class, 'set_active'])->name('set_active');

Route::get('/tambah_transaksi', [BalanceController::class, 'add_trans'])->name('period_trans');
Route::post('/transgo', [BalanceController::class, 'trans']);
Route::get('/uang', [BalanceController::class, 'show_balances'])->name('show_balances');
Route::delete('/trans/{id}', [BalanceController::class, 'destroy_trans'])->name('trans.destroy');
Route::get('/uang/edit/{id}', [BalanceController::class, 'edit_trans'])->name('trans.edit');
Route::post('/transup/{id}', [BalanceController::class, 'update_trans']);
Route::get('uang/view/{id}', [BalanceController::class, 'view_trans'])->name('trans.view');

Route::get('/tambah_kegiatan', [ActivityController::class, 'add'])->name('add');
Route::post('/actigo', [ActivityController::class, 'store']);
Route::get('/kegiatan', [ActivityController::class, 'show'])->name('show');
Route::delete('/activity/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');
Route::get('/kegiatan/edit/{id}', [ActivityController::class, 'edit'])->name('activity.edit');
Route::post('/actiup/{id}', [ActivityController::class, 'update']);
Route::get('/kegiatan/view/{id}', [ActivityController::class, 'view'])->name('activity.view');

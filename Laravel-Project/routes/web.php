<?php

use App\Models\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BandwidthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoutersController;
use App\Http\Controllers\ViewCustomerController;
use GuzzleHttp\Middleware;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Models\Routers;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\TambahPaketController;
use App\Models\Bandwidth;
use App\Models\Customers;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HalamanCustomerController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LaporanHarianController;
use App\Http\Controllers\MasterController;

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


Route::get('/daftarbandwidth', function () {
    return view('daftarbandwidth');
})-> middleware('auth');

Route::get('/tambahpaketbaru', function () {
    return view('tambahpaketbaru');
})-> middleware('auth');

Route::get('/bandwithbaru', function () {
    return view('bandwithbaru');
})-> middleware('auth');

Route::get('/tambahpaketbaru', function () {
    return view('tambahpaketbaru');
})-> middleware('auth');

Route::get('/bandwithbaru', function () {
    return view('bandwithbaru');
})-> middleware('auth');

Route::get('/dashboard', function () {
    return view('beranda');
})-> middleware('auth');

//menampilkan jumlah pelanggan
Route::get('/dashboard', [BerandaController::class,'jumlahPelanggan', 'jumlahPengajuan'])->name('dashboard')->middleware('auth');

//test 2 class controller dalam 1 halaman
// Route::get('/dashboard', [HalamanCustomerController::class,'editNomorTelepon'])->middleware('auth');

// Route::get('/paketpppoe', function () {
//     return view('paketpppoe');
// })-> middleware('auth');


//ini udah pegang hanya super admin yang bisa
Route::get('/pengaturanadmin', [UserController::class, 'index'])->name('pengaturanadmin')-> middleware('auth', 'superadmin');

// Login Admin Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Add Admin Routes
Route::get('/tambahadmin', [AdminController::class, 'create'])->name('tambahadmin')-> middleware('auth', 'superadmin');;
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store')-> middleware('auth', 'superadmin');;

// Logout Routes
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/listKontak', [CustomersController::class, 'index'])->name('listKontak')-> middleware('auth');;

Route::get('/tambahkontakbaru', [CustomersController::class, 'create'])->name('tambahkontakbaru')-> middleware('auth');;
Route::post('/tambahkontakbaru', [CustomersController::class, 'store'])->name('tambahkontakbaru.store')-> middleware('auth');;
// Update-Delete Admin Routes

// Route::get('/admin/{id}', 'AdminController@editAdmin')->name('admin.edit');
// Route::put('/admin/{id}', 'AdminController@updateAdmin')->name('admin.update');


Route::get('/editadmin/{id}', [AdminController::class, 'edit'])->name('editadmin')-> middleware('auth', 'superadmin');
Route::put('/updateadmin/{id}', [AdminController::class, 'update'])->name('updateadmin')-> middleware('auth', 'superadmin');
Route::get('/deleteadmin/{id}', [AdminController::class, 'destroy'])->name('deleteadmin')-> middleware('auth', 'superadmin');

Route::get('/edittambahkontak/{id}', [CustomersController::class, 'edit'])->name('editKontak')-> middleware('auth');;
Route::put('/updateKontak/{id}', [CustomersController::class, 'update'])->name('updateKontak')-> middleware('auth');;
Route::get('/hapusKontak/{id}', [CustomersController::class, 'destroy'])->name('hapusKontak')-> middleware('auth');;


Route::get('/router', [RoutersController::class, 'index'])->name('router')->middleware('auth', 'teknisi');

//add routers
Route::get('/tambahrouter', [RoutersController::class, 'create'])->name('tambahrouter')->middleware('auth','teknisi');
Route::post('/store', [RoutersController::class, 'store'])->name('router.store')->middleware('auth','teknisi');

//crud routers
Route::get('/editrouter/{id}', [RoutersController::class, 'edit'])->name('editrouter')-> middleware('auth','teknisi');
Route::put('/updaterouter/{id}', [RoutersController::class, 'update'])->name('updaterouter')-> middleware('auth','teknisi');
Route::get('/deleterouter/{id}', [RoutersController::class, 'destroy'])->name('deleterouter')-> middleware('auth','teknisi');


Route::get('/ippool', [PoolController::class, 'index'])->name('ippool.index')->middleware('auth','teknisi');
Route::get('/tambahippool', [PoolController::class, 'create'])->name('tambahippool')->middleware('auth','teknisi');
Route::post('/tambahippool', [PoolController::class, 'store'])->name('tambahippool.store')->middleware('auth','teknisi');

// crud pool
Route::get('/editippool/{id}', [PoolController::class, 'edit'])->name('editippool')->middleware('auth','teknisi');
Route::put('/updateippool/{id}', [PoolController::class, 'update'])->name('updateippool')->middleware('auth','teknisi');
Route::get('/deleteippool/{id}', [PoolController::class, 'destroy'])->name('deleteippool')->middleware('auth','teknisi');

// Route::get('/cobarouter', [RoutersController::class, 'index']{
//     return view ('cobarouter');
// });
Route::get('/daftarbandwidth', [BandwidthController::class, 'index'])->name('bandwidth.index')->middleware('auth','teknisi');
Route::get('/bandwidthbaru', [BandwidthController::class, 'create'])->name('bandwidthbaru')->middleware('auth', 'teknisi');
Route::post('/bandwidthbaru', [BandwidthController::class, 'store'])->name('bandwidthbaru.store')->middleware('auth', 'teknisi');

Route::get('/editbandwidth/{id}', [BandwidthController::class,'edit'])->name('editbandwidth')->middleware('auth','teknisi');
Route::put('/updatebandwidth/{id}', [BandwidthController::class,'update'])->name('updatebandwidth')->middleware('auth','teknisi');
Route::get('/deletebandwidth/{id}', [BandwidthController::class,'destroy'])->name('deletebandwidth')->middleware('auth','teknisi');


//paket PPPoE
Route::get('/paketpppoe', [TambahPaketController::class, 'index'])->name('paketpppoe.index');
Route::get('/tambahpaketbaru', [TambahPaketController::class, 'create'])->name('tambahpaketbaru');
Route::post('/tambahpaketbaru', [TambahPaketController::class, 'store'])->name('tambahpaketbaru.store');

Route::get('/editPaketPPPoE/{id}', [TambahPaketController::class,'edit'])->name('editPaketPPPoE')->middleware('auth','teknisi');
Route::put('/updatePaketPPPoE/{id}', [TambahPaketController::class,'update'])->name('updatePaketPPPoE')->middleware('auth','teknisi');
Route::get('/deletePaketPPPoE/{id}', [TambahPaketController::class,'destroy'])->name('deletePaketPPPoE')->middleware('auth','teknisi');

// Route::get('/', function () {
//     return view('customers/index');
// })->name('home');


Route::get('/formpaket', function () {
    return view('paket/formpaket');
});

Route::post('/contact', [HalamanCustomerController::class, 'store'])->name('contact.store');

// Route::get('/formpaket', [PaketController::class, 'index'])->name('paket.index');
Route::post('/formpaket', [PaketController::class, 'store'])->name('paket.store');


Route::get('/laporankeuangan', function () {
    return view('laporankeuangan');
});
Route::get('/laporanharian', function () {
    return view('laporanharian');
});

Route::get('/laporanpengeluaran', function () {
    return view('laporanpengeluaran');
});

// routes update halaman
Route::get('/editAlamat', function () {
    return view('editAlamat');
});

Route::get('/editNomorTelepon', function () {
    return view('editNomorTelepon');
});

Route::get('/laporanpengeluaran', [PengeluaranController::class, 'index'])->name('laporanpengeluaran.index');
Route::get('/tambahpengeluaran', [PengeluaranController::class, 'create'])->name('tambahpengeluaran');
Route::post('/tambahpengeluaran', [PengeluaranController::class, 'store'])->name('tambahpengeluaran.store');


Route::get('/laporanpengeluaran/{id}', [PengeluaranController::class,'destroy'])->name('deletelaporanpengeluaran')->middleware('auth','teknisi');
//routes halaman customer
Route::get('/', [ViewCustomerController::class, 'index'])->name('customers.index');

//routes editalamat
Route::get('/editAlamat/1', [HalamanCustomerController::class, 'editAlamat'])->name('editAlamat');
Route::put('/editAlamat/1', [HalamanCustomerController::class, 'updateAlamat'])->name('updateAlamat');

//routes editNomorTelepon
Route::get('/editNomorTelepon/1', [HalamanCustomerController::class, 'editNomorTelepon'])->name('editNomorTelepon');
Route::put('/editNomorTelepon/1', [HalamanCustomerController::class, 'updateNomorTelepon'])->name('updateNomorTelepon');
Route::get('/laporanharian', [LaporanHarianController::class, 'index'])->name('laporanharian.index');

// Route::get('/pesanmasuk', function () {
//     return view('pesanmasuk');
// });
Route::get('/pengajuanpasang', function () {
    return view('pengajuanpasang');
});


//pengajuan pemasangan
Route::get('/pengajuanpasang', [PaketController::class, 'index'])->name('pengajuanpasang.index');
route::get('/deletePengajuan/{id}', [PaketController::class,'destroy'])->name('deletePengajuan');

//pesan Masuk
Route::get('/pesanmasuk', [HalamanCustomerController::class, 'pesanmasukIndexii'])->name('pesanmasuk.index');
route::get('/pesanmasuk/{id}', [HalamanCustomerController::class,'deletePesanMasuk'])->name('deletePesanMasuk');


//routes for master
Route::get('/master', [MasterController::class, 'pesanmasukIndex']);

//routes paket PPPOE
Route::get('/paketpppoe', [TambahPaketController::class, 'index'])->name('paketpppoe.index');
Route::get('/tambahpaketbaru', [TambahPaketController::class, 'create'])->name('tambahpaketbaru');
Route::post('/tambahpaketbaru', [TambahPaketController::class, 'store'])->name('tambahpaketbaru.store');

Route::get('/editPaketPPPoE/{id}', [TambahPaketController::class,'edit'])->name('editPaketPPPoE')->middleware('auth','teknisi');
Route::put('/updatePaketPPPoE/{id}', [TambahPaketController::class, 'update'])->name('updatePaketPPPoE')->middleware('auth', 'teknisi');
Route::get('/deletePaketPPPoE/{id}', [TambahPaketController::class,'destroy'])->name('deletePaketPPPoE')->middleware('auth','teknisi');
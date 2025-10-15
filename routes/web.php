<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

// basic
Route::get('about', function(){
    return '<h1>Hallo </h1>'.
            '<br> Selamat datang di perpustakan digital';
});

Route::get('perkenalan', function () {
    return '<h1>Hallo </h1>' .
        '<br>Nama: Derya <br>Kelas : XI RPL 3 <br>Alamat : Rancamanyar';
});

Route::get('buku', function () {
    return view('buku');
});

Route::get('menu', function () {
    $data = [
        ['alat_tulis' => 'Buku', 'Harga' => 5000, 'Jumlah' => 2],
        ['alat_tulis' => 'Pensil', 'Harga' => 2000, 'Jumlah' => 15],
        ['alat_tulis' => 'Penggaris', 'Harga' => 7500, 'Jumlah' => 5],
    ];

    $toko = "Toko";

    return view('menu', compact('data','toko'));
});

Route::get('books/{judul}', function ($a) {
    return 'Judul buku : ' .$a;
});

// Route::get('post/{title}/{category}', function($a, $b) {

//     return view('post',['judul'=>$a, 'cat' =>$b]);
// });

Route::get('profile/{nama?}',function($a = "guest"){
    return 'halo nama saya ' .$a;
});

Route::get('order/{item?}', function($a = "Nasi"){
    return view('order', compact('a'));
});


Route::get('menu', function () {
    $data = [
        ['alat_tulis' => 'Buku', 'Harga' => 15000, 'Jumlah' => 2],
        ['alat_tulis' => 'Pensil', 'Harga' => 3000, 'Jumlah' => 5],
        ['alat_tulis' => 'Penggaris', 'Harga' => 7000, 'Jumlah' => 1],
    ];

    $toko = "Toko";

    return view('menu', compact('data', 'toko'));
});

Route::get('nilai/{nama}/{mapel}/{nilai}', function($a, $b, $c){
    return view('nilai', ['nama' => $a, 'mapel' => $b, 'nilai' => $c]);
});

Route::get('grading/{nama?}/{nilai?}', function ($a = "Guest", $b = 0) {
    return view('grading', ['nama' => $a, 'nilai' => $b]);
});

Route::get('kelas/{andi?}/{budi?}/{citra?}', function ($a = 0, $b = 0, $c = 0) {
    return view('kelas', ['andi' => $a, 'budi' => $b, 'citra' => $c]);
});

Route::get('test-model', function(){
    $data = App\Models\Post::all();
    return $data;
});

Route::get('create-data', function(){
    $data = App\Models\Post::create([   
        'title'=>'Belajar nafas ',
        'content'=>'Sesak nafas',
    ]);
    return $data;
});

Route::get('show-data/{id}', function ($id) {
    $data = App\Models\Post::find($id);
    return $data;
});

Route::get('edit-data/{id}', function($id) {
    $data           = App\Models\Post::find($id);
    $data->title    = "Membangun Project dengan Laravel";
    $data->save();
    return $data;
});

Route::get('delete/{id}', function ($id) {
    $data = App\Models\Post::find($id);
    $data->delete();

    return redirect('test-model');
});

Route::get('search{cari}', function ($query) {
    $data = App\Models\Post::where('title', 'like', '%' . $query . '%')->get();
    return $data;
});

Route::get('greetings', [MyController::class, 'hello']);
Route::get('student', [Mycontroller::class, 'siswa']);

Auth::routes();

// post
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// edit data
Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');
// edit data
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');

Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');

// hapus data
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');

// model Produk
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

// model biodata

Route::resource('biodata', App\Http\Controllers\BiodataController::class)->middleware('auth');

// routes/web.php
use App\Http\Controllers\RelasiController;

Route::get('/one-to-one', [RelasiController::class, 'index']);

// routes/web.php
use App\Models\Wali;

Route::get('/wali-ke-mahasiswa', function () {
    $wali = Wali::with('mahasiswa')->first();
    return "{$wali->nama} adalah wali dari {$wali->mahasiswa->nama}";
});


Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);


use App\Models\Mahasiswa;

Route::get('/mahasiswa-ke-dosen', function () {
    $mhs = Mahasiswa::where('nim', '123456')->first();
    return "{$mhs->nama} dibimbing oleh {$mhs->dosen->nama}";
});


Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);
// routes/web.php

Route::get('eloquent', [RelasiController::class, 'eloquent']);

Route::get('/one-to-one', [RelasiController::class, 'oneToOne']);
use App\Models\Hobi;

Route::get('/hobi/bola', function () {
    $hobi = Hobi::where('nama_hobi', 'Bermain Bola')->first();
    foreach ($hobi->mahasiswas as $mhs) {
        echo $mhs->nama . '<br>';
    }
});
Route::get('eloquent', [RelasiController::class, 'eloquent']);

Route::resource('dosen', App\Http\Controllers\DosenController::class)->middleware('auth');

Route::resource('hobi', App\Http\Controllers\HobiController::class)->middleware('auth');




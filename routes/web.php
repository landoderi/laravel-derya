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
        'content'=>'Sesak nafas'
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
// hapus data
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');
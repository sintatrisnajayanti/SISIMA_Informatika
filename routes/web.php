<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('main', [
        "title" => "Main",
    ]);
});


Route::get('/dashboard', [PostController::class, 'index']); 
Route::get('/detailskripsi/{slug}', function ($slug) {
    $posts_skripsi =[
        [
            "judul" => "Sistem Pencarian Makeup Berbasis Ontologi",
            "slug" => "sistem-pencarian-makeup-berbasis-ontologi",
            "nama" => "Dinda Hartani",
            "tahun" => "2021",
            "nim" => "18181818818",
            "penjurusan" => "2021",
            "namapembimbing1" => "Pak Cok",
            "namapembimbing2" => "Pak Hendra",
            "emailpembimbing1" => "cokorda@unud.ac.id",
            "emailpembimbing2" => "hendra.suputra.ac.id",
            "metode" => "Methontology, Prototyping",
            "topik" => "Sosial",
            "abstrak" => "Handphone merupakan sebuah teknologi komunikasi elektroknik yang memiliki kemampuan dasar yang sama dengan telepon konvesional namun handphone lebih efisien dan dapat dibawak kemana saja serta memiliki kelebihan. eMarkerter mempublikasikan jumlah pengguna handphone di Indonesia meningkat hingga 37,1% dari tahun 2016-2019. Setelah dilakukan survey ulang, eMarkerter mempublikasikan kembali jumlah pengguna handphone di tahun 2015 sejumlah 65,2 juta pengguna, di tahun 2016 terdapat 65,2 juta pengguna, di tahun 2017 sejumlah 74,9 juta pengguna, di tahun 2018 sejumlah 83,5 juta pengguna dan pada tahun 2019 diperkirakan mencapai angka 92 juta pengguna handphone. Oleh karena itu, penelitian ini dilakukan pembangunan sistem rekomendasi pemilihan handphone yang dibangun dengan menggunakan Metode Simple Additive Weighting sebagai metode pembobotan dan Ontologi sebagai representasi terhadap pengetahuan atau informasi terkait handphone.",
    
        ],
        [
            "judul" => "SISTEM REKOMENDASI PEMILIHAN HANDPHONE MENGGUNAKAN METODE SIMPLE ADDITIVE WEIGHTING DENGAN PENDEKATAN ONTOLOGI",
            "slug" => "sistem-rekomendasi-pemilihan-handphone-menggunakan-metode-simple-addictive-weighting-dengan-pendekatan-ontologi",
            "nama" => "Indie Surya",
            "tahun" => "2021",
            "nim" => "18181818818",
            "penjurusan" => "2021",
            "namapembimbing1" => "Pak Cok",
            "namapembimbing2" => "Pak Hendra",
            "emailpembimbing1" => "cokorda@unud.ac.id",
            "emailpembimbing2" => "hendra.suputra.ac.id",
            "metode" => "Methontology, Prototyping",
            "topik" => "Sosial",
            "abstrak" => "Handphone merupakan sebuah teknologi komunikasi elektroknik yang memiliki kemampuan dasar yang sama dengan telepon konvesional namun handphone lebih efisien dan dapat dibawak kemana saja serta memiliki kelebihan. eMarkerter mempublikasikan jumlah pengguna handphone di Indonesia meningkat hingga 37,1% dari tahun 2016-2019. Setelah dilakukan survey ulang, eMarkerter mempublikasikan kembali jumlah pengguna handphone di tahun 2015 sejumlah 65,2 juta pengguna, di tahun 2016 terdapat 65,2 juta pengguna, di tahun 2017 sejumlah 74,9 juta pengguna, di tahun 2018 sejumlah 83,5 juta pengguna dan pada tahun 2019 diperkirakan mencapai angka 92 juta pengguna handphone. Oleh karena itu, penelitian ini dilakukan pembangunan sistem rekomendasi pemilihan handphone yang dibangun dengan menggunakan Metode Simple Additive Weighting sebagai metode pembobotan dan Ontologi sebagai representasi terhadap pengetahuan atau informasi terkait handphone.",
        ],
        ];
$detail_post =[];
foreach($posts_skripsi as $post){
    if($post["slug"] == $slug){
        $detail_post = $post;
    }
}
    return view('detailskripsi', [
        "title" => "Detail Dashboard",
        "post" => $detail_post,

    ]);
});


Route::get('/browsing', function () {
    return view('browsing', [
        "title" => "Browsing",
    ]);
});

Route::get('/searching', function () {
    return view('searching', [
        "title" => "Searching",
    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
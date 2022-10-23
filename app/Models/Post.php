<?php

namespace App\Models;

class Post
{
   private static $posts_skripsi =[
    [
        "judul" => "Sistem Pencarian Makeup Berbasis Ontologi",
        "slug" => "sistem-pencarian-makeup-berbasis-ontologi",
        "nama" => "Dinda Hartani",
        "tahun" => "2021",

    ],
    [
        "judul" => "SISTEM REKOMENDASI PEMILIHAN HANDPHONE MENGGUNAKAN METODE SIMPLE ADDITIVE WEIGHTING DENGAN PENDEKATAN ONTOLOGI",
        "slug" => "sistem-rekomendasi-pemilihan-handphone-menggunakan-metode-simple-addictive-weighting-dengan-pendekatan-ontologi",
        "nama" => "Indie Surya",
        "tahun" => "2021",
    ]];

    public static function all()
    {
        return self::$posts_skripsi;
    }

   
}
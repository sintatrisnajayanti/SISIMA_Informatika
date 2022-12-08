<?php

namespace App\Http\Controllers;
use EasyRdf\Http\Exception;

use Illuminate\Http\Request;

class TopikController extends Controller
{
    public function listTopik()
    {
        try {
        $topikpermasalahan = $this->sparql->query('SELECT * WHERE {?topik a sk:topik_permasalahan} ORDER BY ?topik');
        $hasiltopik = [];
        foreach($topikpermasalahan as $item){
            array_push($hasiltopik, [
                'id' => explode('#', $item->topik->getUri())[1],
                'nama'      =>ucwords(str_replace('_', ' ', explode('#', $item->topik->getUri())[1])),
            ]);
        }
        return view('topik.daftartopik', [
            'title' => 'Topik Permasalahan',
            'topikpermasalahan' => $hasiltopik]);
            
        } catch (Exception $e){
            dd($e);
        }
    }
    
    public function detailTopik($topikpermasalahan)
    {
        try {
         $skripsi = $this->sparql->query("SELECT * WHERE { ?judul sk:memiliki_topik sk:".$topikpermasalahan.". ?judul a sk:judul_skripsi ; sk:ditulis ?penulis. }");
         $detailtopik= [];
         foreach($skripsi as $item){
             array_push($detailtopik, [
                 'id' => $this->parseData($item->judul, true),
                 'judul' => str_replace('_', ' ',$this->parseData($item->judul, true)) ,
                 'penulis' =>  str_replace('_', ' ',$this->parseData($item->penulis, true)),
             ]);
         }
         return view('topik.detailtopik',[
            'title' =>  $topikpermasalahan,
            'list_skripsi' => $detailtopik,
        ]);
        } catch (Exception $e){
            dd($e);
        }
        
}
}

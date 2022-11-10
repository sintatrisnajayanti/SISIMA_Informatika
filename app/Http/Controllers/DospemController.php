<?php

namespace App\Http\Controllers;
use EasyRdf\Http\Exception;

use Illuminate\Http\Request;

class DospemController extends Controller
{
    public function listDospem()
    {
        try {
        $dosenpembimbing = $this->sparql->query('SELECT * WHERE {?dosen a sk:dosen_pembimbing} ORDER BY ?dosen');
        $hasildospem = [];
        foreach($dosenpembimbing as $item){
            array_push($hasildospem, [
                'id' => explode('#', $item->dosen->getUri())[1],
                'nama'      =>ucwords(str_replace('_', ' ', explode('#', $item->dosen->getUri())[1])),
            ]);
        }
        return view('dospem.daftardospem', [
            'title' => 'Dosen Pembimbing',
            'dosenpembimbing' => $hasildospem]);

    } catch (Exception $e){
        dd($e);
    }
    }

      
    public function detailDospem($dosenpembimbing)
    {
        try {
         $skripsimhs = $this->sparql->query("SELECT * WHERE { sk:".$dosenpembimbing." sk:memiliki_anak_bimbingan ?penulis .  ?penulis sk:menulis ?judul .}");
         $detaildospem= [];
         foreach($skripsimhs as $item){
             array_push($detaildospem, [
                 'id' => $this->parseData($item->judul, true),
                 'judul' => str_replace('_', ' ',$this->parseData($item->judul, true)) ,
                 'penulis' =>  str_replace('_', ' ',$this->parseData($item->penulis, true)),
             ]);
         }
         return view('dospem.detaildospem',[
            'title' => ucwords(str_replace('_', ' ', $dosenpembimbing)),
            'list_skripsi' => $detaildospem,
        ]);
        } catch (Exception $e){
            dd($e);
        }
        
}
}
    

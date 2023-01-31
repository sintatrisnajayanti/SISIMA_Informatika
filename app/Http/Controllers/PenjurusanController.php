<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyRdf\Http\Exception;

class PenjurusanController extends Controller
{
    public function listPenjurusan()
    {
        try {
        $penjurusan = $this->sparql->query('SELECT * WHERE {?jalur a sk:konsentrasi_jalur} ORDER BY ?jalur');
        $hasilpenjurusan = [];
        foreach($penjurusan as $item){
            array_push($hasilpenjurusan, [
                'id' => explode('#', $item->jalur->getUri())[1],
                'nama'      =>ucwords(str_replace('_', ' ', explode('#', $item->jalur->getUri())[1])),
            ]);
        }
        return view('penjurusan.daftarpenjurusan', [
            'title' => 'Penjurusan',
            'penjurusan' => $hasilpenjurusan]);
            
        } catch (Exception $e){
            dd($e);
        }
    }
    
    public function detailPenjurusan($penjurusan)
    {
        try {
         $getskripsi = $this->sparql->query("SELECT * WHERE { ?judul sk:koleksi_dari sk:".$penjurusan.". ?judul a sk:judul_skripsi ; sk:ditulis ?penulis. }");
         $sql = "SELECT * WHERE { ?judul sk:koleksi_dari sk:".$penjurusan.". ?judul a sk:judul_skripsi ; sk:ditulis ?penulis. }";
         $detailpenjurusan= [];
         foreach($getskripsi as $item){
             array_push($detailpenjurusan, [
                 'id' => $this->parseData($item->judul, true),
                 'judul' => str_replace('_', ' ',$this->parseData($item->judul, true)) ,
                 'penulis' =>  str_replace('_', ' ',$this->parseData($item->penulis, true)),
             ]);
         }
         return view('penjurusan.detailpenjurusan',[
            'title' => ucwords(str_replace('_', ' ', $penjurusan)),
            'list_skripsi' => $detailpenjurusan,
            'sql' => $sql,
        ]);
        } catch (Exception $e){
            dd($e);
        }
        
}
}

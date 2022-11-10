<?php

namespace App\Http\Controllers;
use EasyRdf\Http\Exception;

use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    public function listAngkatan()
    {
        try {
        $angkatan = $this->sparql->query('SELECT DISTINCT ?angkatan WHERE { ?mhs a sk:nama_mahasiswa ;sk:mahasiswa_angkatan ?angkatan }');
        $hasilangkatan = [];
        foreach($angkatan as $item){
            array_push($hasilangkatan, [
                'id' => $item->angkatan,
                'nama'      => $item->angkatan,
            ]);
        }
        return view('angkatan.daftarangkatan', [
            'title' => 'Mahasiswa Angkatan',
            'angkatan' => $hasilangkatan]);
            
        } catch (Exception $e){
            dd($e);
        }
    }

    public function detailAngkatan($angkatan)
    {
        try {
         $skripsiakt = $this->sparql->query("SELECT * WHERE { ?penulis sk:mahasiswa_angkatan '$angkatan' . ?penulis a sk:nama_mahasiswa ; sk:menulis ?judul. }");
         $detailangkatan= [];
         foreach($skripsiakt as $item){
             array_push($detailangkatan, [
                 'id' => $this->parseData($item->judul, true),
                 'judul' => str_replace('_', ' ',$this->parseData($item->judul, true)) ,
                 'penulis' =>  str_replace('_', ' ',$this->parseData($item->penulis, true)),
             ]);
         }
         return view('angkatan.detailangkatan',[
            'title' => $angkatan,
            'list_skripsi' => $detailangkatan,
        ]);
        } catch (Exception $e){
            dd($e);
        }
        
}
}

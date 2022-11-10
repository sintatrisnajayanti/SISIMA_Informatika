<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchingController extends Controller
{
    public function searching (Request $request)
    {
        $penjurusan = $this->sparql->query('SELECT * WHERE {?jalur a sk:konsentrasi_jalur} ORDER BY ?jalur');
        $dosenpembimbing = $this->sparql->query('SELECT * WHERE {?dosen a sk:dosen_pembimbing} ORDER BY ?dosen');
        $angkatan = $this->sparql->query('SELECT DISTINCT ?angkatan WHERE { ?mhs a sk:nama_mahasiswa ;sk:mahasiswa_angkatan ?angkatan }');

        $resultPenjurusan=[];
        $resultDosen=[];
        $resultAngkatan=[];

        foreach($penjurusan as $item){
            array_push($resultPenjurusan, [
                'jalur'      =>ucwords(str_replace('_', ' ', explode('#', $item->jalur->getUri())[1])),
            ]);
        }
        foreach($dosenpembimbing as $item){
            array_push($resultDosen, [
                'dosen' => $this->parseData($item->dosen->getUri())
            ]);
        }
        foreach($angkatan as $item){
            array_push($resultAngkatan, [
                'angkatan' => $item->angkatan
            ]);
        }
        $data = [
            'listPenjurusan' => $resultPenjurusan,
            'listDosen' => $resultDosen,
            'listAngkatan' => $resultAngkatan];
        
            return view('searching', [
                'title' => 'Searching',
                'list' =>  $data
            ]);
    }
}

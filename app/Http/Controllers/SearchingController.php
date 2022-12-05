<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyRdf\Http\Exception;

class SearchingController extends Controller
{
    public function index ()
    {
        $penjurusan = $this->sparql->query('SELECT * WHERE {?jalur a sk:konsentrasi_jalur} ORDER BY ?jalur');
        $dosenpembimbing = $this->sparql->query('SELECT * WHERE {?dosen a sk:dosen_pembimbing} ORDER BY ?dosen');
        $angkatan = $this->sparql->query('SELECT DISTINCT ?angkatan WHERE { ?mhs a sk:nama_mahasiswa ;sk:mahasiswa_angkatan ?angkatan }');

        $resultPenjurusan=[];
        $resultDosen=[];
        $resultAngkatan=[];

        foreach($penjurusan as $item){
            array_push($resultPenjurusan, [
                'id' => explode('#', $item->jalur)[1],
                'jalur'      =>ucwords(str_replace('_', ' ', explode('#', $item->jalur->getUri())[1])),
            ]);
        }
        foreach($dosenpembimbing as $item){
            array_push($resultDosen, [
                'id' => explode('#', $item->dosen)[1],
                'dosen' => $this->parseData($item->dosen->getUri())
            ]);
        }
        foreach($angkatan as $item){
            array_push($resultAngkatan, [
                'id' => $item->angkatan,
                'angkatan' => $item->angkatan
            ]);
        }       
        
        return view('searching',[
            'title' => 'Searching',
            'listPenjurusan' => $resultPenjurusan,
            'listDosen' => $resultDosen,
            'listAngkatan' => $resultAngkatan,
        ]);
    }

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
                'id' => explode('#', $item->jalur)[1],
                'jalur'      =>ucwords(str_replace('_', ' ', explode('#', $item->jalur->getUri())[1])),
            ]);
        }
        foreach($dosenpembimbing as $item){
            array_push($resultDosen, [
                'id' => explode('#', $item->dosen)[1],
                'dosen' => $this->parseData($item->dosen->getUri())
            ]);
        }
        foreach($angkatan as $item){
            array_push($resultAngkatan, [
                'id' => $item->angkatan,
                'angkatan' => $item->angkatan
            ]);
        }       
        // if(isset($_POST['cariSpesifikasi'])){
        //     $resp = 1;
            $sql = "SELECT * WHERE { ";

                if ($request->cariJurusan != '') {
                    $sql = $sql . " ?judul sk:koleksi_dari sk:$request->cariJurusan .  ?judul a sk:judul_skripsi ; sk:ditulis ?penulis. ";
                }
                else{
                    $sql = $sql;
                }

                if ($request->cariTahun != '') {
                    $sql = $sql . " ?penulis sk:mahasiswa_angkatan '$request->cariTahun' . ?penulis a sk:nama_mahasiswa ; sk:menulis ?judul. ";
                }
                else{
                    $sql = $sql;
                }

                if ($request->cariDosenPembimbing1 != '') {
                    $sql = $sql . " ?judul sk:memiliki_pembimbing1 sk:$request->cariDosenPembimbing1 . ?judul a sk:judul_skripsi ; sk:ditulis ?penulis. ";
                }
                else{
                $sql = $sql;
                }

                if ($request->cariDosenPembimbing2 != '') {
                    $sql = $sql . " ?judul sk:memiliki_pembimbing2 sk:$request->cariDosenPembimbing2 . ?judul a sk:judul_skripsi ; sk:ditulis ?penulis. ";
                }
                else{
                    $sql = $sql;
                }
   
            $sql = $sql . "}";
            $queryData = $this->sparql->query($sql);
                $resultSkripsi = [];
                    foreach ($queryData as $item) {
                        array_push($resultSkripsi, [
                            'judul' => str_replace('_', ' ',$this->parseData($item->judul, true)) ,
                            'penulis' =>  str_replace('_', ' ',$this->parseData($item->penulis, true)),
                        ]);
                    }
        
        // else if(isset($_POST['reset'])){
        //         header('Location: /searching');
        //         $resultSkripsi = [];
        //         $jumlahSkripsi = 0;
        //         $resp = 0;
        //         $sql=[];
        //     }
        // else{
        //         $resultSkripsi = [];
        //         $jumlahSkripsi = 0;
        //         $resp = 0;
        //         $sql=[];
        //     }
           
            //     'list_skripsi' => $resultSkripsi,
            //     'listPenjurusan' => $resultPenjurusan,
            //     'listDosen' => $resultDosen,
            //     'listAngkatan' => $resultAngkatan,
            //     'jumlahSkripsi' => $jumlahSkripsi,
            //     'resp' => $resp,
            //     'sql' => $sql

            // ];
                
            return view('searching',[
                'title' => 'Searching',
                'list_skripsi' => $resultSkripsi,
                'listPenjurusan' => $resultPenjurusan,
                'listDosen' => $resultDosen,
                'listAngkatan' => $resultAngkatan,                 
            ]);
        
    }
}

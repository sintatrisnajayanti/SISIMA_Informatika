<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyRdf\Http\Exception;

use function PHPUnit\Framework\isEmpty;

class SearchingController extends Controller
{
    public function index ()
    {
        $penjurusan = $this->sparql->query('SELECT * WHERE {?jalur a sk:konsentrasi_jalur} ORDER BY ?jalur');
        $dosenpembimbing = $this->sparql->query('SELECT * WHERE {?dosen a sk:dosen_pembimbing} ORDER BY ?dosen');
        $angkatan = $this->sparql->query('SELECT DISTINCT ?angkatan WHERE { ?mhs a sk:nama_mahasiswa ;sk:mahasiswa_angkatan ?angkatan } ORDER BY (?angkatan)');
        $topikpermasalahan = $this->sparql->query('SELECT * WHERE {?topik a sk:topik_permasalahan} ORDER BY ?topik');

        $resultPenjurusan=[];
        $resultDosen=[];
        $resultAngkatan=[];
        $resultTopik=[];

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
        foreach($topikpermasalahan as $item){
            array_push($resultTopik, [
                'id' => explode('#', $item->topik)[1],
                'topik' => $this->parseData($item->topik->getUri())
            ]);
        }         
        
        return view('searching',[
            'title' => 'Pencarian',
            'listPenjurusan' => $resultPenjurusan,
            'listDosen' => $resultDosen,
            'listAngkatan' => $resultAngkatan,
            'listTopik' => $resultTopik,
        ]);
    }

    public function searching (Request $request)
    {
    
        try {
        $penjurusan = $this->sparql->query('SELECT * WHERE {?jalur a sk:konsentrasi_jalur} ORDER BY ?jalur');
        $dosenpembimbing = $this->sparql->query('SELECT * WHERE {?dosen a sk:dosen_pembimbing} ORDER BY ?dosen');
        $angkatan = $this->sparql->query('SELECT DISTINCT ?angkatan WHERE { ?mhs a sk:nama_mahasiswa ;sk:mahasiswa_angkatan ?angkatan } ORDER BY (?angkatan)');
        $topikpermasalahan = $this->sparql->query('SELECT * WHERE {?topik a sk:topik_permasalahan} ORDER BY ?topik');

        $resultPenjurusan=[];
        $resultDosen=[];
        $resultAngkatan=[];
        $resultTopik=[];

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
        foreach($topikpermasalahan as $item){
            array_push($resultTopik, [
                'id' => explode('#', $item->topik)[1],
                'topik' => $this->parseData($item->topik->getUri())
            ]);
        }       
        if ($request->cariJurusan == '' && $request->cariTahun == '' && $request->cariDosenPembimbing == '' && $request->cariJangkaWaktu == '' && $request->cariTopik == '') {
            return view('searching',[
                'title' => 'Pencarian',
                'list_skripsi' => null,
                'listPenjurusan' => $resultPenjurusan,
                'listDosen' => $resultDosen,
                'listAngkatan' => $resultAngkatan,      
                'listTopik' => $resultTopik,    
                'isEmpty' => true          
            ]);
        }
            $sql = "SELECT ?penulis ?waktu ?judul WHERE { ";

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

                if ($request->cariDosenPembimbing != '') {
                    $sql = $sql . " sk:$request->cariDosenPembimbing sk:memiliki_anak_bimbingan ?penulis .  ?penulis sk:menulis ?judul . ";
                }
                else{
                $sql = $sql;
                }

                if ($request->cariJangkaWaktu != '') {
                    $sql = $sql . " ?judul sk:selesai_penelitian ?selesaipenelitian . ?judul sk:ditulis ?penulis .
                    ?judul sk:mulai_penelitian ?mulaipenelitian . ?judul sk:ditulis ?penulis .
                    bind( (month(?selesaipenelitian)- month(?mulaipenelitian)) + 12 * (year(?selesaipenelitian)- year(?mulaipenelitian)) as ?waktu ) . ";
                    if ($request->cariJangkaWaktu  == 'kurang-dari-setahun') {
                        $sql .= 'filter(?waktu < 12)';
                      } else if ($request->cariJangkaWaktu  == 'sama-dengan-setahun') {
                        $sql .= 'filter(?waktu = 12)';
                      } else if ($request->cariJangkaWaktu == 'lebih-dari-setahun') {
                        $sql .= 'filter(?waktu > 12)';
                      }
                }
                else{
                $sql = $sql;
                }
                
                if ($request->cariTopik != '') {
                    $sql = $sql . " ?judul sk:memiliki_topik sk:$request->cariTopik .  ?judul a sk:judul_skripsi ; sk:ditulis ?penulis. ";
                }
                else{
                    $sql = $sql;
                }
   
            $sql = $sql . "}";
            $queryData = $this->sparql->query($sql);
                $resultSkripsi = [];
                    foreach ($queryData as $item) {
                        array_push($resultSkripsi, [
                            'id' => $this->parseData($item->judul, true),
                            'judul' => str_replace('_', ' ',$this->parseData($item->judul, true)) ,
                            'penulis' =>  str_replace('_', ' ',$this->parseData($item->penulis, true)),
                        ]);
                    };

            return view('searching',[
                'title' => 'Pencarian',
                'list_skripsi' => $resultSkripsi,
                'listPenjurusan' => $resultPenjurusan,
                'listDosen' => $resultDosen,
                'listAngkatan' => $resultAngkatan,      
                'listTopik' => $resultTopik,    
                'isEmpty' => false               
            ]);
           
         } catch (Exception $e){
                dd($e);
            }
    }
}

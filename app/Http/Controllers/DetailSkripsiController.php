<?php

namespace App\Http\Controllers;
use EasyRdf\Http\Exception;
use Illuminate\Http\Request;

class DetailSkripsiController extends Controller
{
    public function detail($judul)
    {
        try{
            {
                $detailskripsi = $this->sparql->query('SELECT ?judul ?dospem1 ?dospem2 ?mulai ?jurusan ?penulis ?selesai ?angkatan ?emailp1 ?emailp2 ?nim 
                WHERE{VALUES ?judul {sk:'.$judul.'}.
                    ?judul sk:ditulis ?penulis .
                    ?judul sk:memiliki_pembimbing1 ?dospem1 .
                    ?judul sk:memiliki_pembimbing2 ?dospem2 .
                    ?judul sk:koleksi_dari ?jurusan .
                    ?judul sk:mulai_penelitian ?mulai .
                    ?judul sk:selesai_penelitian ?selesai .
                    ?judul sk:ditulis ?mhs . ?mhs sk:mahasiswa_angkatan ?angkatan .
                    ?judul sk:ditulis ?mahasiswa . ?mahasiswa sk:nim_mahasiswa ?nim .
                    ?judul sk:memiliki_pembimbing1 ?dosen . ?dosen sk:email_pembimbing ?emailp1 .
                    ?judul sk:memiliki_pembimbing2 ?dsn . ?dsn sk:email_pembimbing ?emailp2 .
            }');
                $hasildetail=[];
                foreach ($detailskripsi as $detail) {
                    $startDate = explode("T", str_replace('_', ' ',$this->parseData($detail->mulai, true)))[0];
                    $endDate = explode("T", str_replace('_', ' ', $this->parseData($detail->selesai, true)))[0];
                    array_push($hasildetail, [
                        'judul' => str_replace('_' , ' ', explode('#', $detail->judul)[1]),
                        'penulis' =>  str_replace('_', ' ',$this->parseData($detail->penulis, true)),
                        'mulai' =>  $startDate,
                        'selesai' => $endDate,
                        'dospem1' =>ucwords(str_replace('_', ' ', explode('#', $detail->dospem1->getUri())[1])),
                        'dospem2' =>ucwords(str_replace('_', ' ', explode('#', $detail->dospem2->getUri())[1])),
                        'penjurusan' =>ucwords(str_replace('_', ' ', explode('#', $detail->jurusan->getUri())[1])),
                        'angkatan' => $detail->angkatan,
                        'emailp1' => $detail->emailp1,
                        'emailp2' => $detail->emailp2,
                        'nim' => $detail->nim
                    ]);
                }
                return view('detailskripsi', [
                    "title" => 'Detail Skripsi',
                    "skripsimhs" => $hasildetail
                ]);
            }
        }
        catch (Exception $e){
            dd($e);

        }
    }
}

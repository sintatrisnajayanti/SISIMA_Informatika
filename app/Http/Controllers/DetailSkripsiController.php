<?php

namespace App\Http\Controllers;

use DateTime;
use EasyRdf\Http\Exception;
use Illuminate\Http\Request;


class DetailSkripsiController extends Controller
{
    public function detail($judul)
    {
        try{
            {
                $detailskripsi = $this->sparql->query('SELECT ?judul ?dospem1 ?dospem2 ?mulai ?jurusan ?penulis ?metode ?selesai ?angkatan ?emailp1 ?waktu ?emailp2 ?nim ?abstrak
                WHERE{VALUES ?judul {sk:'.$judul.'}.
                    ?judul sk:ditulis ?penulis .
                    ?judul sk:memiliki_pembimbing1 ?dospem1 .
                    ?judul sk:memiliki_pembimbing2 ?dospem2 .
                    ?judul sk:koleksi_dari ?jurusan .
                    OPTIONAL { ?judul sk:penggunaan_metode ?metode }
                    OPTIONAL {?judul sk:memiliki_abstrak ?abstrak }
                    ?judul sk:mulai_penelitian ?mulai .
                    ?judul sk:selesai_penelitian ?selesai .
                    ?judul sk:ditulis ?mhs . ?mhs sk:mahasiswa_angkatan ?angkatan .
                    ?judul sk:ditulis ?mahasiswa . ?mahasiswa sk:nim_mahasiswa ?nim .
                    ?judul sk:memiliki_pembimbing1 ?dosen . ?dosen sk:email_pembimbing ?emailp1 .
                    ?judul sk:memiliki_pembimbing2 ?dsn . ?dsn sk:email_pembimbing ?emailp2 .
                    ?judul sk:selesai_penelitian ?selesaipenelitian . ?judul sk:mulai_penelitian ?mulaipenelitian .
                    bind( (month(?selesaipenelitian)- month(?mulaipenelitian)) + 12 * (year(?selesaipenelitian)- year(?mulaipenelitian)) as ?waktu )
                  }
                    
            ');

                $hasildetail=[];
                foreach ($detailskripsi as $detail) {
                    $startDate = explode("T", str_replace('_', ' ',$this->parseData($detail->mulai, true)))[0];
                    $endDate = explode("T", str_replace('_', ' ', $this->parseData($detail->selesai, true)))[0];

                    $startDateTime = DateTime::createFromFormat('Y-m-d', $startDate);
                    $startDateString = $startDateTime->format('d F Y');

                    $endDateTime = DateTime::createFromFormat('Y-m-d', $endDate);
                    $endtDateString = $endDateTime->format('d F Y');

                    $waktu = $detail->waktu->getValue();
                    $year = floor($waktu / 12);
                    $month = $waktu % 12;
                    $jangkaWaktu = "$year Tahun $month Bulan";

                    array_push($hasildetail, [
                        'judul' => str_replace('_' , ' ', explode('#', $detail->judul)[1]),
                        'penulis' =>  str_replace('_', ' ',$this->parseData($detail->penulis, true)),
                        'mulai' =>  $startDateString,
                        'selesai' => $endtDateString,
                        'dospem1' =>ucwords(str_replace('_', ' ', explode('#', $detail->dospem1->getUri())[1])),
                        'dospem2' =>ucwords(str_replace('_', ' ', explode('#', $detail->dospem2->getUri())[1])),
                        'penjurusan' =>ucwords(str_replace('_', ' ', explode('#', $detail->jurusan->getUri())[1])),
                        'angkatan' => $detail->angkatan,
                        'metode' => property_exists($detail, 'metode') ? $detail->metode : '-',
                        'abstrak' => property_exists($detail, 'abstrak') ? $detail->abstrak : '-',
                        'emailp1' => $detail->emailp1,
                        'emailp2' => $detail->emailp2,
                        'nim' => $detail->nim,
                        'jangkawaktu' => $jangkaWaktu

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

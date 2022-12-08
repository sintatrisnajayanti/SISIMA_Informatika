<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsingController extends Controller
{
    public function browsing(){

        $penjurusan = $this->sparql->query('SELECT * WHERE {?penjurusan a sk:konsentrasi_jalur} ORDER BY ?penjurusan');
        $pembimbing = $this->sparql->query('SELECT * WHERE {?pembimbing a sk:dosen_pembimbing} ORDER BY ?pembimbing');
        $angkatan = $this->sparql->query('SELECT DISTINCT ?angkatan WHERE { ?mhs a sk:nama_mahasiswa ;sk:mahasiswa_angkatan ?angkatan }');
        $topik = $this->sparql->query('SELECT * WHERE {?topik a sk:topik_permasalahan} ORDER BY ?topik');
            $data = array(
                'jumlahpenjurusan'       => $penjurusan->numRows(),
                'jumlahpembimbing'       =>$pembimbing->numRows(),
                'jumlahangkatan'       => $angkatan->numRows(),
                'jumlahtopik'       => $topik->numRows(),
            );

        return view('browsing', 
        ['data' => $data, 
        'title' => 'Penelusuran',  ]);
    }
}

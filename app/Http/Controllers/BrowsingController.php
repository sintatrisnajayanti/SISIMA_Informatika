<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsingController extends Controller
{
    public function browsing(){

        $penjurusan = $this->sparql->query('SELECT * WHERE {?penjurusan a sk:konsentrasi_jalur} ORDER BY ?penjurusan');
        $pembimbing = $this->sparql->query('SELECT * WHERE {?pembimbing a sk:dosen_pembimbing} ORDER BY ?pembimbing');
        $angkatan = $this->sparql->query('SELECT DISTINCT ?angkatan WHERE { ?mhs a sk:nama_mahasiswa ;sk:mahasiswa_angkatan ?angkatan }');
                $data = array(
                'jumlahpenjurusan'       => $penjurusan->numRows(),
                'jumlahpembimbing'       =>$pembimbing->numRows(),
                'jumlahangkatan'       => $angkatan->numRows(),
            );

        return view('browsing', ['data' => $data, 'title' => 'Browsing',  ]);
    }
}

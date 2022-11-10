<?php

namespace App\Http\Controllers;

use EasyRdf\Http\Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $skripsi = $this->sparql->query('SELECT * WHERE { ?judul a sk:judul_skripsi ; sk:ditulis ?penulis }');
            $total = $this->sparql->query(' SELECT (count(?skripsi) as ?jumlahSkripsi) WHERE { ?skripsi a sk:judul_skripsi } ');
             
            $daftarSkripsi = [];
            $totalSkripsi = 0;

            foreach($skripsi as $sk){
                array_push($daftarSkripsi, [
                    'id' => $this->parseData($sk->judul, true),
                    'judul' => str_replace('_', ' ',$this->parseData($sk->judul, true)) ,
                    'penulis' =>  str_replace('_', ' ',$this->parseData($sk->penulis, true)),
                ]);
            }

            if($total->numRows()>0){
                $totalSkripsi = $total[0]->jumlahSkripsi;
            }
            
            return view('dashboard',[
                'title' => 'Dashboard',
                'total' => $totalSkripsi,
                'list_skripsi' => $daftarSkripsi,
            ]);
        } catch (Exception $e){
            dd($e);
        }
    }

    public function detail($judul)
    {
        dd($judul);
    }
}

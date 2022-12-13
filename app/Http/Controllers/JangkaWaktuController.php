<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyRdf\Http\Exception;

class JangkaWaktuController extends Controller
{
    public function listJangkaWaktu()
    {
        return view('jangkawaktu.daftarjangkawaktu', [
            'title' => 'Jangka Waktu Penelitian']);
            
    }

    public function detailJangkaWaktu($waktu)
    {
        try {

          $query = 'SELECT ?waktu ?judul ?penulis WHERE { 
            ?judul sk:selesai_penelitian ?selesaipenelitian . ?judul sk:ditulis ?penulis .
            ?judul sk:mulai_penelitian ?mulaipenelitian . ?judul sk:ditulis ?penulis .
            bind( (month(?selesaipenelitian)- month(?mulaipenelitian)) + 12 * (year(?selesaipenelitian)- year(?mulaipenelitian)) as ?waktu )';
          if ($waktu == 'kurang-dari-setahun') {
            $query .= 'filter(?waktu < 12)';
          } else if ($waktu == 'sama-dengan-setahun') {
            $query .= 'filter(?waktu = 12)';
          } else if ($waktu == 'lebih-dari-setahun') {
            $query .= 'filter(?waktu > 12)';
          }
        
          $query .= '}';
          $skripsidetail = $this->sparql->query($query);
         

         $detailwaktu= [];

         foreach($skripsidetail as $item){
           
             array_push($detailwaktu, [
                 'id' => $this->parseData($item->judul, true),
                 'judul' => str_replace('_', ' ',$this->parseData($item->judul, true)) ,
                 'penulis' =>  str_replace('_', ' ',$this->parseData($item->penulis, true)),
             ]);
         }

         return view('jangkawaktu.detailwaktu',[
            'title' => $waktu,
            'list_skripsi' => $detailwaktu,
        ]);
        
        } catch (Exception $e){
            dd($e);
        }
        
}
}

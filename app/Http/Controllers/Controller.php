<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $sparql;
    
    function __construct()
    {
        RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        RdfNamespace::set('rdfs' , 'http://www.w3.org/2000/01/rdf-schema#');
        RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
        RdfNamespace::set('sk', 'http://www.semanticweb.org/user/ontologies/2022/9/skripsi_mahasiswa#');

        $this->sparql = new Client('http://localhost:3030/SkripsiMahasiswa/');
    }
    
    public function parseData($data, $isRaw = false)
    {
        $result = explode('#', $data);
        $result = $result[count($result) - 1];

        if (!$isRaw) {
            $result = substr(preg_replace('/(?<!\ )[A-Z]/', ' $0', $result), 1);
            $result = explode('-', $result);
            $result = $result[0];
        }

        return $result;
    }
    
}

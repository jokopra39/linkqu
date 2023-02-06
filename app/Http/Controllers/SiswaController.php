<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function store(Request $request)
    {
        $datas = $request->data;
        // $obj = json_decode($datas, true);
        $container = array();
        foreach($datas as $data)
        {
            $ndata = Siswa::create([
                'name' => strtoupper($data['name']),
                'age' => $data['age'],
                'city' => strtoupper($data['city'])
            ]);

            array_push($container,$ndata);
        }
        return [
            "status" => 1,
            "data" => count($container),
        ];
    }
    
}
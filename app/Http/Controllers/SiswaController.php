<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'city' => 'required',
        ]);

        $siswa = Siswa::create([
            'name' => strtoupper($request->name),
            'age' => $request->age,
            'city' => strtoupper($request->city),
        ]);
        return [
            "status" => 1,
            "data" => $siswa
        ];
    }
    
}
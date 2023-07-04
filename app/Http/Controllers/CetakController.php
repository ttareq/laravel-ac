<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetak_pdf(){
        $data = Pegawai::all();
        // $pdf = PDF::loadView('cetak', [
        //     "title" => "Daftar Pegawai",
        //     "pegawai" => $data ]);
            
        // return $pdf->stream('pegawai.pdf');

        return view('cetak', [
            "title" => 'Daftar Pegawai',
            "pegawai" => $data
        ]);
    }
}

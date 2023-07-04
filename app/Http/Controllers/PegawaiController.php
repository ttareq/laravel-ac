<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Data;
use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pegawai $pegawai)
    {

        // $pegawai = Pegawai::all();
        // dd($pegawai);
        if (request('cari')) {
            // $data = Pegawai::where('jabatan', 'like', '%' .request('cari'). '%')->get();   // Bisa Jalan 
            // $data = $pegawai->where('jabatan', 'like', '%' . request('cari') . '%')->get();   // Bisa jalan


            // $cari = Data::Where('nama', 'like', '%' . request('cari') . '%')->first(); // First mendapatkan Objek
            // $data = Pegawai::Where('jabatan', 'like', '%' . request('cari') . '%')->get();  // GET mendapatkan Collection
            $data = Pegawai::Where('jabatan', 'like', '%' . request('cari') . '%')->paginate(5);  // GET mendapatkan Collection
            

            if (is_null($data)) {
                return redirect('/pegawai')->with('success', 'Data Tidak Ditemukan');
            } 

            // $data = Pegawai::Where('data_id', $cari->NIP )->get();


        }
        else {
            $data = Pegawai::paginate(5);
        }
        return view('index', [
            "title" => 'Daftar Pegawai',
            "pegawai" => $data

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            "title" => 'Tambah Pegawai'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validated = $request->validate([ // Validasi Data Pribadi
            'image' => 'image|file|max:2000', // $validated[image] berisi informasi gambar
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'npwp' => 'required',
            'jk' => 'required',
        ]);

        // Ubah Format Tanggal Lahir ke YY-mm-dd
        $date = explode('/', $validated['tanggal_lahir']);
        $date = [$date[2],$date[1],$date[0]];
        $validated['tanggal_lahir'] = implode('-', $date);

        // Simpan Image ke DB
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images'); /// $validated[image] sekarang berisi path/namafile
        }
        
        $data = Data::create($validated);
        
        $validated2 = $request->validate([ // Validasi Data Pegawai
            'jabatan' => 'required',
            'tempat_tugas' => 'required',
            'unit_kerja' => 'required',
        ]); 

        $validated3 = $request->validate([ // Validasi Data Pegawai -> Golongan
            'golongan' => 'required',
        ]);

        $golongan = Golongan::where('golongan', $validated3['golongan'])->first(); // Cari Id Golongan

        $validated2['data_id'] = $data['id']; // Masukkan User_id 
        $validated2['golongan_id'] = $golongan['id']; // Masukkan Golongan_id

        Pegawai::create($validated2);

        return redirect('pegawai')->with('success', 'Berhasil!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
      
            return view('show', [
                "title" => 'Info Pegawai',
                "pegawai" => $pegawai->load(['data', 'golongan'])
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai) // $pegawai berisi data salah satu pegawai dari tabel pegawai
    {

        // Pegawai::destroy($pegawai);
        Pegawai::where('NIP', $pegawai->NIP)->delete(); // Menghapus tanpa ID
        Data::where('id', $pegawai->data_id)->delete();

        return redirect('pegawai')->with('success', 'Berhasil Hapus!');

    }

    // public function cetak_pdf(){
    //     $data = Pegawai::all();
    //     dd($data);
    //     $pdf = PDF::loadView('index', [
    //         'title' => 'cetak_pdf',
    //         'pegawai'=>$data
    //         ]);
            
    // return $pdf->download('invoice.pdf');
    // }

}

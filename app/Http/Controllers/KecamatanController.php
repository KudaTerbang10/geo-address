<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Support\Facades\DB;
use App\Models\Kecamatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Query Builder
        $kecamatan = DB::table('m_kecamatan')
            ->leftJoin('m_kabupaten', 'm_kecamatan.id_kabupaten', '=', 'm_kabupaten.id_kabupaten')
            ->paginate(5);

        return view('kecamatan.index')->with('kecamatan', $kecamatan);
    }

    public function cetak_pdf()
    {
        $kecamatan = DB::table('m_kecamatan')
        ->leftJoin('m_kabupaten', 'm_kecamatan.id_kabupaten', '=', 'm_kabupaten.id_kabupaten')
        ->get();

        $pdf = Pdf::loadview('kecamatan/kecamatan_pdf', ['kecamatan' => $kecamatan]);
        return $pdf->stream('laporan-Data-Kecamatan-pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupaten = Kabupaten::all()->pluck('nama_kabupaten', 'id_kabupaten');
        return view('kecamatan/create', compact('kabupaten'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|unique:m_kecamatan'
            // 'id_kecamatan' => 'required|unique:m_kecamatan'
        ]
        );

        $kecamatan = new Kecamatan();
        $kecamatan->id_kecamatan = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kabupaten = $request->id_kabupaten;
        $kecamatan->save();
        return redirect('kecamatan')->with('flash_message', 'Kecamatan Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $kabupaten = Kabupaten::all()->pluck('nama_kabupaten','id_kabupaten'); //query untuk dropdown list
        $kecamatan = Kecamatan::find($id); //query untuk ambil data kecamatan
        $id_kabupaten = $kecamatan->id_kabupaten; //Kode untuk ambil data id kabupaten dalam row kecamatan
        $nama_kabupaten = Kabupaten::find($id_kabupaten); //query untuk nama kabupaten berdasarkan id_kabupaten dalam table kecamatan
        return view('kecamatan/edit', compact('kecamatan','kabupaten','nama_kabupaten'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('kecamatan.edit')->with('kecamatan', $kecamatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kecamatan' => 'required|unique:m_kecamatan'
        ]
        );

        $kecamatan = Kecamatan::find($id);
        $input = $request->all();
        $kecamatan->update($input);
        return redirect('kecamatan')->with('flash_message', 'Kecamatan Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kecamatan::destroy($id);
        return redirect('kecamatan')->with('flash_message', 'Kecamatan Deleted!');
    }
}

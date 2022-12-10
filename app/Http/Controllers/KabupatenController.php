<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kabupaten = Kabupaten::where('nama_kabupaten','ILIKE','%'.$request->search.'%')->paginate(5);
        } else {
            $kabupaten = Kabupaten::paginate(5); // variable = models::query
        }

        return view('kabupaten.index')->with('kabupaten', $kabupaten);
    }

    public function cetak_pdf()
    {
        $kabupaten = Kabupaten::all();

        $pdf = Pdf::loadview('kabupaten/kabupaten_pdf', ['kabupaten' => $kabupaten]);
        return $pdf->stream('laporan-Data-Kabupaten-pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kabupaten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nama_kabupaten' => 'required|unique:m_kabupaten'
            ]
        );

        $kabupaten = new Kabupaten();
        $kabupaten->id_kabupaten = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $kabupaten->nama_kabupaten = $request->nama_kabupaten;
        $kabupaten->save();
        return redirect('kabupaten')->with('flash_message', 'Kabupaten Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kabupaten = Kabupaten::find($id);
        return view('kabupaten/edit', compact('kabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabupaten $id_kabupaten)
    {
        // $kabupaten = Kabupaten::find($id_kabupaten);
        // return view('kabupaten.edit')->with('kabupaten', $kabupaten);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_kabupaten' => 'required|unique:m_kabupaten'
            ]
        );

        $kabupaten = Kabupaten::find($id);
        $input = $request->all();
        $kabupaten->update($input);
        return redirect('kabupaten')->with('flash_message', 'Kabupaten Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Kabupaten::destroy($id);
            return redirect('kabupaten')->with('flash_message', 'Kabupaten Deleted!');
        }
        catch (Exception) {

            return redirect('kabupaten')->with('constraint', 'Data Kabupaten sedang digunakan pada data kecamatan');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\geologi_fisik;
use App\Models\kemiringan_lereng;

class DataTitikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  data_titik::all();

        return view('admin.main.data-titik.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $geologiFisik = geologi_fisik::all();
        $kemiringanLereng = kemiringan_lereng::all();
        return view('admin.main.data-titik.create' , compact('geologiFisik', 'kemiringanLereng' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        data_titik::create([
            'kecamatan' => $request->kecamatan,
            'id_geologi_fisik' => $request->id_geologi_fisik,
            'id_kemiringan_lereng' => $request->id_kemiringan_lereng,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat' => $request->location,
        ]);

        return redirect()->route('data-titik.index')->with('success' , 'Data Berhasil DiTambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = data_titik::findorfail($id);

        return view('admin.main.data-titik.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = data_titik::where('id', $id)->first();
        $geologiFisik = geologi_fisik::all();
        $kemiringanLereng = kemiringan_lereng::all();

        return view('admin.main.data-titik.edit', compact('data', 'geologiFisik', 'kemiringanLereng'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        data_titik::where('id', $id)->update([
            'kecamatan' => $request->kecamatan,
            'id_geologi_fisik' => $request->id_geologi_fisik,
            'id_kemiringan_lereng' => $request->id_kemiringan_lereng,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect()->route('data-titik.index')->with('success' , 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        data_titik::findorfail($id)->delete();
        return redirect()->route('data-titik.index')->with(['success' =>  'Data Berhasil dihapus']);
    }
}

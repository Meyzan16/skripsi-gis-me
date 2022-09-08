<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_gempa;
use App\Models\calculasi_tipologi;


class DataGempaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  data_gempa::all();

        return view('admin.main.data-gempa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.main.data-gempa.create');
    }

    public function store(Request $request)
    {
        $latitude_dpn_koma = $request->latitude;
        $latitude_blk_koma = $request->latitude_blk_koma;
        $longitude_dpn_koma = $request->longitude;
        $longitude_blk_koma = $request->longitude_blk_koma;


        $a = '';
        $b = '';

        if($request->value_koor_lat == 'LS')
        {
            $a = '-';
        }else{
            $a = '';
        }

        if($request->value_koor_lng == 'BB')
        {
            $b = '-';
        }else{
            $b = '';
        }

        data_gempa::create([
            'tanggal' => $request->tanggal,
            'jam' => null,
            'latitude' => $a.$latitude_dpn_koma.'.'.$latitude_blk_koma,
            'label_koor_lintang' => $request->value_koor_lat,
            'longitude' => $b.$longitude_dpn_koma.'.'.$longitude_blk_koma,
            'label_koor_bujur' => $request->value_koor_lng,
            'magnitude' => $request->magnitude,
            'kedalaman' => $request->kedalaman,
            'wilayah' => $request->wilayah,
            'dirasakan' => null
        ]);

        return redirect()->route('data-gempa.index')->with('success' , 'Data Berhasil DiTambahkan');

    }

   
    public function show($id)
    {
        $data = data_gempa::findorfail($id);

        return view('admin.main.data-gempa.show', compact('data'));


    }

    public function destroy($id)
    {
        data_gempa::findorfail($id)->delete();
        calculasi_tipologi::where('id_gempa',$id)->delete();
        return redirect()->route('data-gempa.index')->with(['success' =>  'Data Berhasil dihapus']);
    }
}

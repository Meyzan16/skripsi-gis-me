<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\geologi_fisik;
use App\Models\kemiringan_lereng;
use App\Models\hasil_tipologi;
use App\Models\calculasi_tipologi;

class DataTitikController extends Controller
{
    
    public function index()
    {
        $data =  data_titik::all();

        return view('admin.main.data-titik.index', compact('data'));
    }

 
    public function create()
    {
        $string = json_decode(file_get_contents("bbbb.geojson"), true);
        // return $string;


        $geologiFisik = geologi_fisik::all();
        $kemiringanLereng = kemiringan_lereng::all();
        return view('admin.main.data-titik.create' , compact('geologiFisik', 'kemiringanLereng' , 'string' ));
    }

  
    public function store(Request $request)
    {      

        //geologi fisik
        $a = '';
        $a_lereng = '';
        if($request->kecamatan == 'Kec. Ratu Samban')
        {
            $a = 1;
            $a_lereng = 1;
        }elseif($request->kecamatan == 'Kec. Muara Bangka Hulu')
        {
            $a = 2;
            $a_lereng = 2;
        }elseif($request->kecamatan == 'Kec. Selebar')
        {
            $a = 3;
            $a_lereng = 3;
        }


        data_titik::create([
            'kecamatan' => $request->kecamatan,
            'id_geologi_fisik' => $a,
            'id_kemiringan_lereng' => $a_lereng,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat' => $request->location,
        ]);

    
        return redirect()->route('data-titik.index')->with('success' , 'Data Berhasil DiTambahkan');
    }

   
    public function show($id)
    {
        $data = data_titik::findorfail($id);

        return view('admin.main.data-titik.show', compact('data'));
    }


   
    public function destroy($id)
    {
        data_titik::findorfail($id)->delete();
        calculasi_tipologi::where('id_titik',$id)->delete();
        return redirect()->route('data-titik.index')->with(['success' =>  'Data Berhasil dihapus']);
    }

    
}

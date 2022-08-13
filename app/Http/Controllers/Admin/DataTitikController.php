<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\geologi_fisik;
use App\Models\kemiringan_lereng;
use App\Models\hasil_tipologi;

class DataTitikController extends Controller
{
    
    public function index()
    {
        $data =  data_titik::all();

        return view('admin.main.data-titik.index', compact('data'));
    }

 
    public function create()
    {
        $geologiFisik = geologi_fisik::all();
        $kemiringanLereng = kemiringan_lereng::all();
        return view('admin.main.data-titik.create' , compact('geologiFisik', 'kemiringanLereng' ));
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
        }elseif($request->kecamatan == 'Selebar')
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

        //ambil data terakhir yag diinputkan
        $datas = DB::table('data_titiks')->orderBy('id', 'desc')->limit(1)->get();
        foreach ($datas as $data) {
            $b = '';
            $c = '';

            if($data->id_geologi_fisik == 1 ){
                $b = '1a';
            }elseif($data->id_geologi_fisik == 2){
                $b = '1b';
            }elseif($data->id_geologi_fisik == 3){
                $b = '1c';
            }elseif($data->id_geologi_fisik == 4){
                $b = '1d';
            }

            if($data->id_kemiringan_lereng == 1){
                $c = '2a';
            }elseif($data->id_kemiringan_lereng == 2){
                $c = '2b';
            }elseif($data->id_kemiringan_lereng == 3){
                $c = '2c';
            }elseif($data->id_kemiringan_lereng == 4){
                $c = '2d';
            }


            hasil_tipologi::create([
                    'id_titik' =>   $data->id,     
                    'nilai_geologi_fisik' =>   $b,     
                    'nilai_kemiringan_lereng' =>   $c,     
            ]);

        }
        




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
        return redirect()->route('data-titik.index')->with(['success' =>  'Data Berhasil dihapus']);
    }

    
}

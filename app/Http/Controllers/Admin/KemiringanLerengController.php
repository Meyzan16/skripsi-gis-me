<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\kemiringan_lereng;

class KemiringanLerengController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kemiringan_lereng::orderBy('id_kemiringan_lereng', 'ASC')->get(); 
        
        return view('admin.main.kemiringanlereng.index',compact('data'));
    }

    
    public function update(Request $request, $id)
    {
        kemiringan_lereng::where('id_kemiringan_lereng', $id)->update([
            'kelas_informasi' => $request->kelas_informasi,
        ]);

        return redirect()->route('kemiringan-lereng.index')->with(['success' =>  'Data Berhasil diperbarui']);
    }

}




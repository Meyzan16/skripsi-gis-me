<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\geologi_fisik;

class GeologiFisikController extends Controller
{
  
    public function index()
    {
        $data = geologi_fisik::orderBy('id_geologi_fisik', 'ASC')->get(); 
        
        return view('admin.main.geologifisik.index',compact('data'));
    }

 
    public function update(Request $request, $id)
    {

        geologi_fisik::where('id_geologi_fisik', $id)->update([
            'kelas_informasi' => $request->kelas_informasi,
        ]);

        return redirect()->route('geologi-fisik.index')->with(['success' =>  'Data Berhasil diperbarui']);
    }

    
}

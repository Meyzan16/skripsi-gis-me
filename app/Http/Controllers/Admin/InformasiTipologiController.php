<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\informasi_tipologi;

class InformasiTipologiController extends Controller
{
    public function index()
    {
        $data = informasi_tipologi::all();
        return view('admin.main.informasi_tipologi.index', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $data = informasi_tipologi::where('id', $id)->first();        
        return view('admin.main.informasi_tipologi.edit', compact('data'));
    }

    public function update(Request $request , $id)
    {
        informasi_tipologi::where('id', $id)->update([
            'informasi_tipologi' => $request->informasi_tipologi,
        ]);

        return redirect()->route('admin.informasitipologi.index');
    }
}

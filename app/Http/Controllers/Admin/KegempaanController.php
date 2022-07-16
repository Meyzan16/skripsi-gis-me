<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\kegempaan;

class KegempaanController extends Controller
{
    
    public function index(){

        $data = kegempaan::all();

        return view('admin.main.kegempaan.index', compact('data'));

    }

}

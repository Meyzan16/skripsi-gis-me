<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\data_bobot;

use Illuminate\Http\Request;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //sadasds
    public function index()
    {
        $data = data_bobot::orderBy('id', 'ASC')->get(); 
        
        return view('admin.main.bobot.index',compact('data'));
    }


 

}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestDonovanController extends Controller
{
    public function index()
    {
       
       $x = pow(3.75+5.22, 2) * 111;
       $y = pow(102.27-102.95,2) * 111;

       $r1 = round($x,2);
       $r2 = round($y,2);

       $r1r2 = round(sqrt($r1+$r2),3);


       $Magnitude = (6.5 - 2.9)/0.56;

       $alfa = (1080 * EXP(0.5 * 6.5)) / pow($r1r2+25,1.32);

      //  $alfa = (1080 * EXP(0.5 * 8)) / pow(179+25,1.32); //test punya bapakk lindung

       //karena nilai alfa pada observasi memiliki satuan g(m/s2), maka nilai alfa yang dihasilkan
       //rumus empiris donovan di ubah menjadi satuanya menjadi g(m/s2) dengan cara di bagi 980
       //dikarenakan besaran umum gravitasi adalah 9.8 m/s2.
       $z = round($alfa,2)/980;
    //    /980;

       return round($z,2);

    //    return round($Magnitude,3);
    }
}

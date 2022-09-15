<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\data_titik;
use App\Models\data_gempa;
use App\Models\calculasi_tipologi;
use App\Charts\UserChart;



class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jml_titik = count(data_titik::all());
        $data_gempa = data_gempa::all();

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
        ];

        $usersChart = new UserChart;
        $usersChart->title('Gempa Belum Terpilih', 30, "rgb(255, 99, 132)", true);
        $usersChart->displaylegend(false);
        $usersChart->labels(['Rendah', 'Sedang', 'Tinggi']);
        $usersChart->dataset('Users by trimester', 'bar', [0, 0, 0])
            ->color($borderColors)
            ->backgroundcolor($fillColors)
            ->fill(true);

        return view('Admin.main.index', compact('jml_titik', 'data_gempa' ,'usersChart'));
       
    }

    public function chartDashboard(Request $request)
    {
        
        $jml_titik = count(data_titik::all());
        $data_gempa = data_gempa::all();

        $gempaTerpilih = data_gempa::where('id', $request->option_gempa)->first(); 
        $tgl = $gempaTerpilih->tanggal;
        $konversi = date("m F , Y", strtotime($tgl));
        
        $rendah = calculasi_tipologi::where('id_gempa', $request->option_gempa)->wherekategori('rendah')->count();
        $sedang = calculasi_tipologi::where('id_gempa', $request->option_gempa)->wherekategori('sedang')->count();
        $tinggi = calculasi_tipologi::where('id_gempa', $request->option_gempa)->wherekategori('tinggi')->count();

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
        ];

        $usersChart = new UserChart;
        $usersChart->title('Gempa  '. $konversi , 30, "rgb(255, 99, 132)", true);
        $usersChart->displaylegend(false);
        $usersChart->labels(['Rendah', 'Sedang', 'Tinggi']);
        $usersChart->dataset('Users by trimester', 'bar', [$rendah, $sedang, $tinggi])
            ->color($borderColors)
            ->backgroundcolor($fillColors)
            ->fill(true);
          

        return view('admin.main.index', [ 
            'chartTerpilih' => $usersChart,
            'jml_titik' => $jml_titik,
            'data_gempa' => $data_gempa,
        ] );
    }


}

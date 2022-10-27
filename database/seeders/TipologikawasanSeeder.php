<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tipologi_kawasan;
use App\Models\data_bobot;
use App\Models\kegempaan;
use App\Models\kemiringan_lereng;
use App\Models\geologi_fisik;
use App\Models\user;
use App\Models\informasi_tipologi;
use App\Models\struktur_geologi;
use App\Models\data_titik;
use App\Models\data_gempa;


class TipologikawasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tipologi A
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 31,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2b',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 31,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2a',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 31,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4b',
            'skor' => 31,
            'tipologi' => 1
        ]);



        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 32,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 32,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 32,
            'tipologi' => 1
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 33,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 33,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 33,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2a',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 33,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2a',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 33,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 33,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3a',
            'struktur_geologi' => '4a',
            'skor' => 33,
            'tipologi' => 1
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2a',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4b',
            'skor' => 34,
            'tipologi' => 1
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 35,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 35,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 35,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 35,
            'tipologi' => 1
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 35,
            'tipologi' => 1
        ]);



        //tipologi B
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 36,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 36,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 36,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 36,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2a',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 36,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2a',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 36,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 36,
            'tipologi' => 2
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 37,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' =>37,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' =>37,
            'tipologi' => 2
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 38,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 38,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 38,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 38,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 38,
            'tipologi' => 2
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 39,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 39,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2a',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 2
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 40,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 40,
            'tipologi' => 2
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 40,
            'tipologi' => 2
        ]);


        //tipologi C
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 41,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 41,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 41,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 41,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 41,
            'tipologi' => 3
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 42,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 42,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 42,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 42,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 42,
            'tipologi' => 3
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 43,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 43,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 43,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 43,
            'tipologi' => 3
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 44,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 44,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 44,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 44,
            'tipologi' => 3
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 45,
            'tipologi' => 3
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 45,
            'tipologi' => 3
        ]);


        //tipologi D
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 46,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 46,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 46,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 46,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 46,
            'tipologi' => 4
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 47,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 47,
            'tipologi' => 4
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 48,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 48,
            'tipologi' => 4
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 49,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 49,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 49,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 49,
            'tipologi' => 4
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 49,
            'tipologi' => 4
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 50,
            'tipologi' => 5
        ]);

        //tipologi E
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 51,
            'tipologi' => 5
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 51,
            'tipologi' => 5
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 52,
            'tipologi' => 5
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 52,
            'tipologi' => 5
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 52,
            'tipologi' => 5
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 52,
            'tipologi' => 5
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 54,
            'tipologi' => 5
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 54,
            'tipologi' => 5
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 55,
            'tipologi' => 5
        ]);


        //tipologi F
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 57,
            'tipologi' => 6
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 57,
            'tipologi' => 6
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 60,
            'tipologi' => 6
        ]);

        geologi_fisik::create([
            'kelas_informasi' => 'andesit, granit, diorit, metamorf, breksi volkanik, aglomerat, breksi sedimen dan konglomerat',
            'nilai_kemampuan' => 1,
        ]);
        geologi_fisik::create([
            'kelas_informasi' => 'batupasir, tuf kasar, batulanau,arkose, greywacke dan batugamping',
            'nilai_kemampuan' => 2,
        ]);
        geologi_fisik::create([
            'kelas_informasi' => 'pasir, lanau, batulumpur, napal, tuf halus dan serpih
            ',
            'nilai_kemampuan' => 3,
        ]);
        geologi_fisik::create([
            'kelas_informasi' => 'lempung, lumpur, lempung organik dan gambut',
            'nilai_kemampuan' => 4,
        ]);



        kemiringan_lereng::create([
            'kelas_informasi' => 'Datar – landai (0-7 %)',
            'nilai_kemampuan' => 1,
        ]);
        kemiringan_lereng::create([
            'kelas_informasi' => 'Miring – Agak Curam (7-30 %)',
            'nilai_kemampuan' => 2,
        ]);
        kemiringan_lereng::create([
            'kelas_informasi' => 'Curam – sangat curam (30 – 140 %)',
            'nilai_kemampuan' => 3,
        ]);
        kemiringan_lereng::create([
            'kelas_informasi' => 'Terjal(>140%)',
            'nilai_kemampuan' => 4,
        ]);


        kegempaan::create([
            'MMI' => 'i,ii,iii,iv,v',
            'PGA' => '< 0,05',
            'richter' => '< 5',
            'nilai_kemampuan' => 1,
        ]);
        kegempaan::create([
            'MMI' => 'vi,vii',
            'PGA' => '0,05 – 0,15',
            'richter' => '5 - 6',
            'nilai_kemampuan' => 2,
        ]);
        kegempaan::create([
            'MMI' => 'viii',
            'PGA' => '0,15 – 0,30 ',
            'richter' => '6 – 6,5',
            'nilai_kemampuan' => 3,
        ]);
        kegempaan::create([
            'MMI' => 'ix,x,xi,xii',
            'PGA' => '> 0,30 ',
            'richter' => '> 6,5',
            'nilai_kemampuan' => 4,
        ]);

        data_bobot::create([
            'nama_parameter' => 'Geologi Fisik',
            'bobot' => 3
        ]);
        data_bobot::create([
            'nama_parameter' => 'Kemiriang Lereng',
            'bobot' => 3
        ]);
        data_bobot::create([
            'nama_parameter' => 'Kegempaan',
            'bobot' => 5    
        ]);
        data_bobot::create([
            'nama_parameter' => 'Struktur Geologi',
            'bobot' => 4
        ]);


        User::create([
            'name' => 'Meyzan',
            'email' => 'meyzan1605@gmail.com',
            'username' => 'adzanmagrib',
            'password' => bcrypt('monmon16')
        ]);

        informasi_tipologi::create([
            'tipologi' => 'A',
            'informasi_tipologi' => 'informasi tentang tipoligi A'
        ]);
        informasi_tipologi::create([
            'tipologi' => 'B',
            'informasi_tipologi' => 'informasi tentang tipoligi B'
        ]);
        informasi_tipologi::create([
            'tipologi' => 'C',
            'informasi_tipologi' => 'informasi tentang tipoligi C'
        ]);
        informasi_tipologi::create([
            'tipologi' => 'D',
            'informasi_tipologi' => 'informasi tentang tipoligi D'
        ]);
        informasi_tipologi::create([
            'tipologi' => 'E',
            'informasi_tipologi' => 'informasi tentang tipoligi E'
        ]);
        informasi_tipologi::create([
            'tipologi' => 'F',
            'informasi_tipologi' => 'informasi tentang tipoligi F'
        ]);



        struktur_geologi::create([
            'kelas_informasi' => '> 1000 M jauh dari zoan sesar',
            'nilai_kemampuan' => 1,
        ]);
        struktur_geologi::create([
            'kelas_informasi' => 'Dekat dengan zona sesar (100 - 1000 M dai zona sesar)',
            'nilai_kemampuan' => 2,
        ]);
        struktur_geologi::create([
            'kelas_informasi' => 'Pada zona sesar (< 100 M )',
            'nilai_kemampuan' => 3,
        ]);

        

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 12,
            'jarak' => 2260,
            'derajat_kemiringan' => 0.531,
            'latitude' => -3.783957,
            'longitude' => 102.260669,
            'alamat' => "Jl. Sentot Alibasyah, Bajak, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu, Indonesia",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 13,
            'jarak' => 2370,
            'derajat_kemiringan' => 0.549,
            'latitude' => -3.790196,
            'longitude' => 102.251950,
            'alamat' => "Jl. Ahmad Yani, Ps. Jitra, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 16,
            'jarak' => 2020,
            'derajat_kemiringan' => 0.792,
            'latitude' => -3.792045,
            'longitude' => 102.255200,
            'alamat' => "Jl. Veteran 1, Ps. Jitra, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38113",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 17,
            'jarak' => 2380,
            'derajat_kemiringan' => 0.714,
            'latitude' => -3.787184,
            'longitude' => 102.264861,
            'alamat' => "6777+5WP, Jl. Bali, Kp. Bali, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 17,
            'jarak' => 2390,
            'derajat_kemiringan' => 0.711,
            'latitude' => -3.787376,
            'longitude' => 102.268241,
            'alamat' => "Jl. Padang - Bengkulu, Suka Merindu, Kec. Sungai Serut, Kota Bengkulu, Bengkulu, Indonesia",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 18,
            'jarak' => 1340,
            'derajat_kemiringan' => 1.343,
            'latitude' => -3.796967,
            'longitude' => 102.266405,
            'alamat' => "Simpang prapto depasn rs bhayangkara, Ps. Jitra, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38113",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 15,
            'jarak' => 1930,
            'derajat_kemiringan' => 0.777,
            'latitude' => -3.794687,
            'longitude' => 102.273432,
            'alamat' => "Jl. Cendana 1, Padang Jati, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 15,
            'jarak' => 2500,
            'derajat_kemiringan' => 0.6,
            'latitude' => -3.801584,
            'longitude' => 102.284372,
            'alamat' => "Jl. Merapi Raya No.12, Kebun Tebeng, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38223, Indonesia",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 19,
            'jarak' => 3730,
            'derajat_kemiringan' => 0.509,
            'latitude' => -3.805167,
            'longitude' => 102.278692,
            'alamat' => "Jl. S. Parman 27, Tanah Patah, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38223",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 4,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 22,
            'jarak' => 1370,
            'derajat_kemiringan' => 1.606,
            'latitude' => -3.801477,
            'longitude' => 102.274793,
            'alamat' => "Jl. S. Parman No.21, Kebun Kenanga, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38222, Indonesia",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 19,
            'jarak' => 1560,
            'derajat_kemiringan' => 1.218,
            'latitude' => -3.8056467,
            'longitude' => 102.276615,
            'alamat' => "Jl. Rafflesia 10, Nusa Indah, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38223",
        ]);
        data_titik::create([
            'id_geologi_fisik' => 2,
            'id_kemiringan_lereng' => 4,
            'bebatuan' => 'Batugamping terumbu',
            'ketinggian' => 11,
            'jarak' => 500,
            'derajat_kemiringan' => 2.2,
            'latitude' => -3.811224,
            'longitude' => 102.269498,
            'alamat' => "Jl. Putri Gading Cempaka, Penurunan, Kec. Ratu Samban, Kota Bengkulu, Bengkulu, Indonesia",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 20,
            'jarak' => 2870,
            'derajat_kemiringan' => 0.697,
            'latitude' => -3.815514,
            'longitude' => 102.287697,
            'alamat' => "Jl. Pembangunan No.14, Jemb. Kecil, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 15,
            'jarak' => 3270,
            'derajat_kemiringan' => 0.459,
            'latitude' => -3.823767,
            'longitude' => 102.288076,
            'alamat' => "Jl. Musi 52-44, Padang Harapan, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38225",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 14,
            'jarak' => 4500,
            'derajat_kemiringan' => 0.311,
            'latitude' => -3.832752,
            'longitude' => 102.292146,
            'alamat' => "Jl. Jenggalu, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu, Bengkulu, Indonesia",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 16,
            'jarak' => 5300 ,
            'derajat_kemiringan' => 0.302,
            'latitude' => -3.838792,
            'longitude' => 102.299706,
            'alamat' => "Jl. Citandui, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu, Bengkulu",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 1,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 7,
            'jarak' => 10710 ,
            'derajat_kemiringan' => 0.065,
            'latitude' => -3.888764,
            'longitude' => 102.316201,
            'alamat' => "4868+FHR, Sumber Jaya, Kec. Kp. Melayu, Kota Bengkulu, Bengkulu 38216",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 1,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 5,
            'jarak' => 11650  ,
            'derajat_kemiringan' => 0.043,
            'latitude' => -3.903379,
            'longitude' => 102.307383,
            'alamat' => "Jl. Ir. Rustandi Sugianto, Padang Serai, Kec. Kp. Melayu, Kota Bengkulu, Bengkulu 38216",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 1,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 5,
            'jarak' => 11720  ,
            'derajat_kemiringan' => 0.043,
            'latitude' => -3.90299850,
            'longitude' => 102.307408,
            'alamat' => "Jl. Ir. Rustandi Sugianto, Tlk. Sepang, Kec. Kp. Melayu, Kota Bengkulu, Bengkulu, Indonesia",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 8,
            'jarak' => 7620,
            'derajat_kemiringan' => 0.105,
            'latitude' => -3.856285,
            'longitude' => 102.312053,
            'alamat' => "Jl. Rustandi, Kandang Mas, Kec. Kp. Melayu, Kota Bengkulu, Bengkulu 38216",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 28,
            'jarak' => 10400,
            'derajat_kemiringan' => 0.269,
            'latitude' => -3.85881253,
            'longitude' => 102.34116417,
            'alamat' => "48RR+CJH, Pekan Sabtu, Selebar, Bengkulu City, Bengkulu 38213, Indonesia",
        ]);
        

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 23,
            'jarak' => 6280,
            'derajat_kemiringan' => 0.366,
            'latitude' => -3.833821,
            'longitude' => 102.313473,
            'alamat' => "Jl. Bhayangkara, Sido Mulyo, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38211",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Pasir, lanau, lempung dan kerikil',
            'ketinggian' => 26,
            'jarak' => 4680,
            'derajat_kemiringan' => 0.556,
            'latitude' => -3.81849810,
            'longitude' => 102.3036105,
            'alamat' => "Jl. Salak Raya, Lkr. Tim., Kec. Singaran Pati, Kota Bengkulu, Bengkulu, Indonesia",
        ]);


        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'Bongkah,kerikil,pasir,lanau,lumpur dan lempung',
            'ketinggian' => 29,
            'jarak' => 11630 ,
            'derajat_kemiringan' => 0.249,
            'latitude' => -3.817433,
            'longitude' => 102.310157,
            'alamat' => "Bengkulu, Tim. Indah, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 1,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Andesit',
            'ketinggian' => 31,
            'jarak' => 7520,
            'derajat_kemiringan' => 0.412,
            'latitude' => -3.834667,
            'longitude' => 102.325365,
            'alamat' => "588G+549, Jl. Raden Fatah, Pagar Dewa, Kec. Selebar, Kota Bengkulu, Bengkulu 38216",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 1,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Andesit',
            'ketinggian' => 43,
            'jarak' => 8610,
            'derajat_kemiringan' => 0.499,
            'latitude' => -3.831344,
            'longitude' => 102.345706,
            'alamat' => "Jl. Raden Fatah, Suka Rami, Kec. Selebar, Kota Bengkulu, Bengkulu, Indonesia",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'Pasir, lanau, lempung dan sisa tumbuhan',
            'ketinggian' => 11,
            'jarak' => 14690,
            'derajat_kemiringan' => 0.075,
            'latitude' => -3.797081,
            'longitude' => 102.326418,
            'alamat' => "Jl. Air Nakau - Sebakul, Surabaya, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 381198",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 4,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'Konglomerat aneka bahan,breksi,batugamping terumbu, batu lempung,tufan,berbatu apung,kayu,terkesikkan',
            'ketinggian' => 18,
            'jarak' => 7210,
            'derajat_kemiringan' => 0.25,
            'latitude' => -3.785450,
            'longitude' => 102.323542,
            'alamat' => "687F+Q9M, Surabaya, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 38119",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'bongkah,kerikil,pasir,lanau,lumpur dan lempung',
            'ketinggian' => 10,
            'jarak' => 12640 ,
            'derajat_kemiringan' => 0.079,
            'latitude' => -3.789276,
            'longitude' => 102.307858,
            'alamat' => "Jl. Irian 1, Surabaya, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 38119",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 4,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'Konglomerat aneka bahan,breksi,batugamping terumbu, batu lempung,tufan,berbatu apung,kayu,terkesikkan',
            'ketinggian' => 9,
            'jarak' => 5390 ,
            'derajat_kemiringan' => 0.167,
            'latitude' => -3.781959,
            'longitude' => 102.303479,
            'alamat' => "Jl. Korpri Raya 435, Bentiring, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu 38119",
        ]);

        data_titik::create([
            'id_geologi_fisik' => 4,
            'id_kemiringan_lereng' => 3,
            'bebatuan' => 'Konglomerat aneka bahan,breksi,batugamping terumbu, batu lempung,tufan,berbatu apung,kayu,terkesikkan',
            'ketinggian' => 27,
            'jarak' => 7000 ,
            'derajat_kemiringan' => 0.386,
            'latitude' => -3.7665844,
            'longitude' => 102.3108619,
            'alamat' => "68M6+989, Bentiring, Muara Bangka Hulu, Bengkulu City, Bengkulu 38119, Indonesia",
        ]);
        
        data_titik::create([
            'id_geologi_fisik' => 3,
            'id_kemiringan_lereng' => 2,
            'bebatuan' => 'Pasir,lanau,lempung dan kerikil',
            'ketinggian' => 16,
            'jarak' => 5400,
            'derajat_kemiringan' => 0.296,
            'latitude' => -3.75979560,
            'longitude' => 102.2724440,
            'alamat' => "Jl. WR. Supratman, Kandang Limun, Kec. Muara Bangka Hulu, Sumatera, Bengkulu 38371, Indonesia",
        ]);


        data_gempa::create([
            'tanggal' => '2000-06-07',
            'latitude' => -4.61200000,
            'label_koor_lintang' => 'LS',
            'longitude' => 101.90500000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 6.5,
            'kedalaman' => 33,
            'wilayah' => "Bengkulu",
            'dirasakan' => "Bengkulu, terasa juga di palembang, jakarta",
        ]);
        data_gempa::create([
            'tanggal' => '2000-06-04',
            'latitude' => -4.70000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 102.00000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 7.3,
            'kedalaman' => 33,
            'wilayah' => "Bengkulu",
            'dirasakan' => "Bengkulu, lampung dan palembang, jakarta, terasa juga di singapur, malaysia",
        ]);
        data_gempa::create([
            'tanggal' => '2001-01-16',
            'latitude' => -4.02200000,
            'label_koor_lintang' => 'LS',
            'longitude' => 101.77600000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 6.9,
            'kedalaman' => 28,
            'wilayah' => "Bengkulu",
            'dirasakan' => "Bengkulu : V , Jakarta",
        ]);
        data_gempa::create([
            'tanggal' => '2001-02-13',
            'latitude' => -4.68000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 102.56200000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 7.4,
            'kedalaman' => 36,
            'wilayah' => "Bengkulu",
            'dirasakan' => "Bengkulu : terasa kuat , Bengkulu - Jakarta : II",
        ]);
        data_gempa::create([
            'tanggal' => '2004-07-25',
            'latitude' => -2.42700000,
            'label_koor_lintang' => 'LS',
            'longitude' => 103.58200000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 7.3,
            'kedalaman' => 582,
            'wilayah' => "Bengkulu",
            'dirasakan' => "- Bengkulu : IV Bengkulu , Padangpanjang : III , Bandung,Bogor,Sawahan dan Sukabumi : III , Jakarta : II - Mataram, Lombok., Juga terasa di selatan Johor, Malaysia dan  Singapura",
        ]);
        data_gempa::create([
            'tanggal' => '2007-09-12',
            'latitude' => -4.59000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 101.22000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 7.9,
            'kedalaman' => 10,
            'wilayah' => "Bengkulu",
            'dirasakan' => "- Bengkulu : VI, Padang : V, Lampung, Palembang, Pekanbaru, dan Sibolga : IV, Jambi : III,Medan, Banten dan Serang : II,Duri : IV , ,Jakarta, Bekasi, Kuningan : III ,Malaysia,Singapura,,Bangkok,- Male ( Maladewa )",
        ]);

        data_gempa::create([
            'tanggal' => '2007-09-13',
            'latitude' => -2.22000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 99.41000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 7.1,
            'kedalaman' => 30,
            'wilayah' => "Kep.Mentawai",
            'dirasakan' => "Bengkulu dan Padang : III , Kapahiang dan Padangpanjang, Duri,  Palembang dan Pekanbaru : II , Kuala Lumpur, Johor Bahru (Malaysia) : II - Singapura : III",
        ]);

        data_gempa::create([
            'tanggal' => '2007-10-24',
            'latitude' => -4.18000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 100.70000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 7.0,
            'kedalaman' => 10,
            'wilayah' => "Lais",
            'dirasakan' => "- Argamakmur, Lais, Muaraaman, dan Muko-muko : IV , Kapahiang, Bengkulu, Jakarta : III , Singapura : III",
        ]);


        data_gempa::create([
            'tanggal' => '2008-02-24',
            'latitude' => -2.40500000,
            'label_koor_lintang' => 'LS',
            'longitude' => 99.93100000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 6.5,
            'kedalaman' => 22,
            'wilayah' => "Kep.Mentawai",
            'dirasakan' => "Padang : III, bengkulu, padang",
        ]);


        data_gempa::create([
            'tanggal' => '2008-09-09',
            'latitude' => -4.04000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 103.01000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 5.6,
            'kedalaman' => 10,
            'wilayah' => "Bengkulu",
            'dirasakan' => "Lahat, Kapahiang dan pagaralam, bengkulu",
        ]);


        data_gempa::create([
            'tanggal' => '2016-04-10',
            'latitude' => -4.37000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 102.07000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 5.8,
            'kedalaman' => 61,
            'wilayah' => "Pusat gempa berada dilaut 67 km barat daya bengkulu",
            'dirasakan' => "Bengkulu, kepahiang,seluma"
        ]);


        data_gempa::create([
            'tanggal' => '2017-08-13',
            'latitude' => -3.78000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 101.61000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 6.4,
            'kedalaman' => 35,
            'wilayah' => "Bengkulu Utara, bengkulu",
            'dirasakan' => "Pusat gempa berada di laut 71 km BD Bengkulu Utara - Bengkulu"
        ]);

        data_gempa::create([
            'tanggal' => '2017-12-06',
            'latitude' => -3.16000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 102.15000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 5.1,
            'kedalaman' => 10,
            'wilayah' => "Lebong, bengkulu",
            'dirasakan' => "Pusat gempa berada di darat 6 KM barat daya lebong-bengkulu"
        ]);


        

       

        






        
        

        
        


        
    }
}

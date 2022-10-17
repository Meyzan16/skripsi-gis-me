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
            'tanggal' => '2007-09-12',
            'latitude' => -4.51700000,
            'label_koor_lintang' => 'LS',
            'longitude' => 101.38200000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 8.4,
            'kedalaman' => 30,
            'wilayah' => "Tengah Laut",
            'dirasakan' => "seluruh area bengkuluuu sampai sumsel, jambi dan lampung",
        ]);
        

        
        data_gempa::create([
            'tanggal' => '2022-10-01',
            'latitude' => -3.77000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 101.84000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 4.6,
            'kedalaman' => 54,
            'wilayah' => "Pusat gempa berada di laut 54 km barat bengkulu utara",
            'dirasakan' => "II - III kota bengkulu, II Kepahiang, III Bengkulu Utara",
        ]);

        data_gempa::create([
            'tanggal' => '2022-08-23',
            'latitude' => -5.22000000,
            'label_koor_lintang' => 'LS',
            'longitude' => 102.95000000,
            'label_koor_bujur' => 'BT',
            'magnitude' => 6.5,
            'kedalaman' => 12,
            'wilayah' => "Pusat gempa berada di laut 64 km BaratDaya KAUR-BENGKULU",
            'dirasakan' => "III Martapura, III Panimbang , III Kec. Ngaras, III Bandar Lampung, III Muara Dua, III Semaka, III Pematang Sawah, II-III Bayah, II-III Malingping, II - III Ujung Kulon, II - III Kec. Pesisir Tengah, II Kerinci, II Padang, V Kaur, IV-V Liwa, IV Kepahiang, IV Rejang Lebong, IV Lebong, IV Enggano, III-IV Kota Bengkulu, III-IV Muko-muko, III-IV Argamakmur, III-IV Manna, III-IV Putri Hijau, III-IV Musi Rawas, III-IV Oku Selatan, III-IV Lubuk Linggau, III-IV Lahat, III-IV Pagar Alam",
        ]);
        






        
        

        
        


        
    }
}

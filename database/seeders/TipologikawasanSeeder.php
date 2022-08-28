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
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2b',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 31,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2a',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 31,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4b',
            'skor' => 31,
            'tipologi' => 'A'
        ]);



        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 32,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 32,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 32,
            'tipologi' => 'A'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 33,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 33,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 33,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2a',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 33,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2a',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 33,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 33,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3a',
            'struktur_geologi' => '4a',
            'skor' => 33,
            'tipologi' => 'A'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2a',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 34,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4b',
            'skor' => 34,
            'tipologi' => 'A'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 35,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 35,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 35,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 35,
            'tipologi' => 'A'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 35,
            'tipologi' => 'A'
        ]);



        //tipologi B
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 36,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 36,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 36,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 36,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2a',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 36,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2a',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 36,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 36,
            'tipologi' => 'B'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 37,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' =>37,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' =>37,
            'tipologi' => 'B'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 38,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 38,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 38,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 38,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4a',
            'skor' => 38,
            'tipologi' => 'B'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 39,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 39,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2a',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 39,
            'tipologi' => 'B'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 40,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 40,
            'tipologi' => 'B'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4a',
            'skor' => 40,
            'tipologi' => 'B'
        ]);


        //tipologi C
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 41,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 41,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 41,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 41,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 41,
            'tipologi' => 'C'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 42,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 42,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 42,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3a',
            'struktur_geologi' => '4c',
            'skor' => 42,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 42,
            'tipologi' => 'C'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 43,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 43,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 43,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 43,
            'tipologi' => 'C'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 44,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2b',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 44,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4b',
            'skor' => 44,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 44,
            'tipologi' => 'C'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 45,
            'tipologi' => 'C'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 45,
            'tipologi' => 'C'
        ]);


        //tipologi D
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 46,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 46,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 46,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 46,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 46,
            'tipologi' => 'D'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 47,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4b',
            'skor' => 47,
            'tipologi' => 'D'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 48,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4a',
            'skor' => 48,
            'tipologi' => 'D'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 49,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 49,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 49,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 49,
            'tipologi' => 'D'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 49,
            'tipologi' => 'D'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 50,
            'tipologi' => 'E'
        ]);

        //tipologi E
        tipologi_kawasan::create([
            'geologi_batuan' => '1a',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 51,
            'tipologi' => 'E'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 51,
            'tipologi' => 'E'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 52,
            'tipologi' => 'E'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3b',
            'struktur_geologi' => '4c',
            'skor' => 52,
            'tipologi' => 'E'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 52,
            'tipologi' => 'E'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4b',
            'skor' => 52,
            'tipologi' => 'E'
        ]);


        tipologi_kawasan::create([
            'geologi_batuan' => '1b',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 54,
            'tipologi' => 'E'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 54,
            'tipologi' => 'E'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3c',
            'struktur_geologi' => '4c',
            'skor' => 55,
            'tipologi' => 'E'
        ]);


        //tipologi F
        tipologi_kawasan::create([
            'geologi_batuan' => '1c',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 57,
            'tipologi' => 'F'
        ]);
        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2c',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 57,
            'tipologi' => 'F'
        ]);

        tipologi_kawasan::create([
            'geologi_batuan' => '1d',
            'lereng' => '2d',
            'kegempaan' => '3d',
            'struktur_geologi' => '4c',
            'skor' => 60,
            'tipologi' => 'F'
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




        
        

        
        


        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Bonsai;
use App\Models\Species;
use App\Models\Tipology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonsaiTipologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numero_bonsai = Bonsai::all();
        $numero_tipologie = Tipology::count();

        foreach ($numero_bonsai as $bonsai) {

            for($i = 1; $i <= rand(1, 3); $i++) {
                
                $bonsai->tipologies()->attach(rand(1, $numero_tipologie));

            }
        }
        
        $bonsai->save();

    }
}

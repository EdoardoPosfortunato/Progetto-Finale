<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('it_IT');

        $specie_botaniche = [
            'Ficus',
            'Pino Nero',
            'Ginepro Cinese',
            'Acero Giapponese',
            'Olmo Cinese',
            'Ligustro',
            'Serissa',
            'Carmona',
            'Bouganville',
            'Melo',
            'Ciliegio Giapponese',
            'Ulivo',
            'Bosso',
            'Zelkova',
            'Abete Rosso',
            'Tasso',
            'Glicine',
            'Azalea',
            'Biancospino',
            'Gelso Bianco',
        ];

        $descrizioni_specie = [
            'Ficus' => 'Specie tropicale, foglie lucide verdi',
            'Pino Nero' => 'Conifera giapponese, aghi scuri',
            'Ginepro Cinese' => 'Sempreverde, aghi compatti, resistente',
            'Acero Giapponese' => 'Foglie rosse in autunno, elegante',
            'Olmo Cinese' => 'Foglie piccole, crescita rapida',
            'Ligustro' => 'Sempreverde mediterraneo, foglie ovali',
            'Serissa' => 'Piccoli fiori bianchi, tropicale',
            'Carmona' => 'Fiori bianchi, foglie lucide',
            'Bouganville' => 'Fioritura colorata, tropicale',
            'Melo' => 'Frutti piccoli, fiori bianchi',
            'Ciliegio Giapponese' => 'Fioritura rosa, tipico giapponese',
            'Ulivo' => 'Mediterraneo, tronco nodoso grigio',
            'Bosso' => 'Sempreverde compatto, foglie piccole',
            'Zelkova' => 'Foglie dentellate, crescita vigorosa',
            'Abete Rosso' => 'Conifera alpina, aghi verdi scuri',
            'Tasso' => 'Conifera longeva, aghi sottili',
            'Glicine' => 'Rampicante, fiori viola a grappolo',
            'Azalea' => 'Fioritura abbondante, colori vivaci',
            'Biancospino' => 'Fiori bianchi, frutti rossi',
            'Gelso Bianco' => 'Foglie ampie, frutti bianchi dolci',
        ];

        foreach ($specie_botaniche as $specie_bonsai) {

            $specie = new Species();

            $specie->nome = $specie_bonsai; //specie
            $specie->descrizione = $descrizioni_specie[$specie_bonsai];

            $specie->save();
        }

    }
}

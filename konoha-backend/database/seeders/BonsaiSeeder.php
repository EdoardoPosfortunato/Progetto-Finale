<?php

namespace Database\Seeders;

use App\Models\Bonsai;
use App\Models\Species;
use App\Models\Tipology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BonsaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nomiBonsai = [
            'Shirohana',
            'Kuroki',
            'Momiji',
            'Yamato',
            'Kaede',
            'Sakura',
            'Tetsuya',
            'Hinoki',
            'Kagemaru',
            'Aokusa',
            'Mizuki',
            'Haruki',
            'Renji',
            'Tachibana',
            'Katsura',
            'Fujimoto',
            'Tsukiko',
            'Akihiro',
            'Yuzuki',
            'Rinzen'
        ];

        $paroleDescrizione = [
            'foglie lucide',
            'rami armoniosi',
            'crescita compatta',
            'tronco sinuoso',
            'radici esposte',
            'chioma densa',
            'stile elegante',
            'forma naturale',
            'presenza scenica',
            'cura semplice',
            'adatto agli interni',
            'resistente al freddo',
            'ideale per principianti',
            'richiede potature regolari',
            'bellezza senza tempo',
            'ispirazione zen',
            'equilibrio perfetto'
        ];

        $faker = Faker::create('it_IT');
        $numero_specie = Species::count();

        for ($i = 0; $i < 20; $i++) {

            $bonsai = new Bonsai();

            $bonsai->nome = $faker->randomElement($nomiBonsai);
            $bonsai->descrizione = implode(', ', $faker->randomElements($paroleDescrizione, rand(3, 6)));
            $bonsai->prezzo = $faker->numberBetween(30, 200);
            $bonsai->immagine = null;
            $bonsai->altezza_cm = $faker->numberBetween(30, 100);
            $bonsai->età_anni = $faker->numberBetween(0, 15);
            $bonsai->id_specie = $faker->numberBetween(1, $numero_specie);

            $bonsai->save();
        }



    }
}

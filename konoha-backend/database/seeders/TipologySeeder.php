<?php

namespace Database\Seeders;

use App\Models\Tipology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory;

class TipologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create('it_IT');

        $tipologieVarie = [
            'Indoor',               // Da interno
            'Outdoor',              // Da esterno
            'Da esposizione',       // Per mostre o eventi
            'Da collezione',        // Bonsai rari o pregiati
            'Da principiante',      // Facili da curare
            'Da esperto',           // Richiedono più competenze
            'Sempreverde',          // Es. pino, ginepro
            'Caducifoglia',         // Es. acero, olmo
            'Fiorito',              // Es. azalea, bougainvillea
            'Fruttifero',           // Es. melo, ciliegio
            'Tropicale',            // Es. ficus, serissa
            'Mediterraneo',         // Es. ulivo, mirto
            'Conifera',             // Es. pino, abete
            'Decoro zen',           // Per ambienti giapponesi
            'Miniatura',            // Bonsai molto piccoli
        ];

        $tipologie_descrizioni = [
            "Adatto ai principianti, richiede poche cure e cresce facilmente.",
            "Specie ideale per collezionisti esperti, molto ricercata e pregiata.",
            "Resistente e versatile, sopporta bene diverse condizioni climatiche.",
            "Predilige esposizione luminosa e annaffiature regolari.",
            "Perfetto per interni moderni o ambienti zen tradizionali.",
            "Molto ornamentale, apprezzato per la forma elegante e compatta.",
            "Specie rara che necessita di competenze avanzate nella cura.",
            "Cresce lentamente ma offre una chioma fitta e proporzionata.",
            "Ottima scelta per chi cerca un bonsai da esposizione o mostre.",
            "Caratterizzato da fioriture o frutti decorativi stagionali."
        ];


        foreach ($tipologieVarie as $tipologieBonsai) {

            $tipologie = new Tipology();

            $tipologie->nome = $tipologieBonsai; // tecnologie usate
            $tipologie->descrizione = $faker->randomElement($tipologie_descrizioni);

            $tipologie->save();
        }
    }
}

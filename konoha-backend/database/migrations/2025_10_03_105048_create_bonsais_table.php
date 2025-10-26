<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bonsais', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // es. "Ficus Retusa", "Pino Nero"
            $table->text('descrizione')->nullable();
            $table->decimal('prezzo', 8, 2)->nullable(); // es. 199.99
            $table->string('immagine')->nullable(); // path o URL immagine principale
            $table->float('altezza_cm')->nullable();
            $table->integer('età_anni')->nullable();

            // Foreign keys
            $table->unsignedBigInteger('id_specie')->nullable();

            $table->timestamps();

            // Definizione delle chiavi esterne
            $table->foreign('id_specie')->references('id')->on('species')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonsais');
    }
};

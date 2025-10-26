<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bonsais', function (Blueprint $table) {
            $table->renameColumn('id_specie', 'species_id');
        });
    }

    public function down()
    {
        Schema::table('bonsais', function (Blueprint $table) {
            $table->renameColumn('species_id', 'id_specie');
        });
    }

};

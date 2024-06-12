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
        Schema::table('projects', function (Blueprint $table) {
            // aggiungo la colonna
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            //defisco la relazione tra le tabelle
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
           // rimuovo il vincolo
           $table->dropForeign('projects_type_id_foreign'); //oppure (['type_id'])

        //    rimuovere la colonna type_id
            $table->dropColumn('type_id');
        });
    }
};

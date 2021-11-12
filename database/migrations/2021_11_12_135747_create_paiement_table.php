<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPersonnel')->constrained('personnel');
            $table->integer('montant');
            $table->date('datePaiement');
            $table->integer('mois');
            $table->integer('annee');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("personnel",function(Blueprint $table){
            $table->dropConstrainedForeignId("idPersonnel");
         });
      
        Schema::dropIfExists('paiement');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPersonnel')->constrained('personnel');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('motif');
            $table->integer('statut');
            $table->integer('nbJours');

        

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
        Schema::dropIfExists('conge');
    }
}

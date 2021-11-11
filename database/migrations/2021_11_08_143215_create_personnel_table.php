<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel', function (Blueprint $table) {
            $table->id();
            $table->foreignId("idPoste")->constrained("poste");
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateNaissance');
            $table->string('sexe')->nullable();
            $table->string('adresse');
            $table->string('cin');
            $table->string('telephone');
            $table->string('matricule');
            $table->string('email');
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
        Schema::table("poste",function(Blueprint $table){
            $table->dropConstrainedForeignId("idPoste");
         });

        Schema::dropIfExists('personnel');
    }
}

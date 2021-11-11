<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idPersonnel')->constrained('personnel');
            $table->date('datePointage')->format ('Y-m-d H:m');
            $table->string('type');
            $table->time('heureE');
            $table->time('heureS');
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
        Schema::dropIfExists('pointage');
    }
}

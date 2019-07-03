<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('particips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('inscription')->nullable()->useCurrent = true;
            $table->text('comment_particip')->nullable();
            $table->bigInteger('sor_id')->unsigned()->index()->nullable();;
            $table->bigInteger('user_id')->unsigned()->index()->nullable();;
            $table->string('typ')->default("typ");

            // ajout des liaisons entre tables
            //  foreign (..... ) ->onDelete('cascade') permet de sélectionner / supprimer les liens
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sor_id')->references('id')->on('sors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('particips');
    }
}

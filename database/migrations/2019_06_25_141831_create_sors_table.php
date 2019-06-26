<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('dat');
            $table->string('email')->nullable();
            $table->date('datemail')->nullable();
            $table->string('autemail')->default("normale");
            $table->text('commentmail')->nullable();
            $table->text('comment_sor')->nullable();
            $table->string('typ')->default("normale");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sors');
    }
}

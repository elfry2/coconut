<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnownCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('known_cases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('symptoms');
            $table->unsignedBigInteger('disease');
            $table->foreign('disease')->references('id')->on('diseases');
            $table->string('solutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('known_cases');
    }
}

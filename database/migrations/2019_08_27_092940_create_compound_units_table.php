<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompoundUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compound_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alias');
            $table->string('description');
            $table->integer('quantity');
            $table->string('symbol');
            $table->unsignedBigInteger('basic_unit_id');
            $table->foreign('basic_unit_id')->references('id')->on('basic_units')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compound_units');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalCompoundMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_compound_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('semi_compound_id');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('semi_compound_id')->references('id')->on('semi_finished_compound_materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('basic_units')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('final_compound_materials');
    }
}

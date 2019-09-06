<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompoundUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compound_units', function(Blueprint $table){
            $table->dropForeign('compound_units_basic_unit_id_foreign');
            $table->dropColumn('basic_unit_id');
            $table->addColumn('description')->after('alias');
           $table->unsignedBigInteger('first_unit_id');
           $table->unsignedBigInteger('second_unit_id');
           $table->foreign('first_unit_id')->references('id')->on('basic_units')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('second_unit_id')->references('id')->on('basic_units')->onDelete('cascade')->onUpdate('cascade');
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

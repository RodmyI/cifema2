<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialOutputmpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_outputmp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('outputmp_id')->unsigned();
            $table->string('quantity_standard')->nullable();
            $table->string('quantity_available')->nullable();
            $table->string('delivered_quantity')->nullable();
            $table->string('quantity_output')->nullable();
            $table->string('observation')->nullable();
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('outputmp_id')->references('id')->on('outputmps')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_outputmp');
    }
}

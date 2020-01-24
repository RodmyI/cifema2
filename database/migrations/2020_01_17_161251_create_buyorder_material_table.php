<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyorderMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyorder_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('buyorder_id')->unsigned();
            $table->string('quantity');
            $table->integer('class_item')->unsigned()->default(1);
            $table->string('observation')->nullable();
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buyorder_id')->references('id')->on('buyorders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyorder_material');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrympMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrymp_material', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('entrymp_id')->unsigned();
            $table->string('quantity');
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('entrymp_id')->references('id')->on('entrymps')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrymp_material');
    }
}

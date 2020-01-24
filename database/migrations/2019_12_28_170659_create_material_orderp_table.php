<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialOrderpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_orderp', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('material_id')->unsigned();
            $table->bigInteger('orderp_id')->unsigned();
            $table->string('quantity');
            $table->string('observation')->nullable();
            $table->string('missing_amount')->default(0);

            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('orderp_id')->references('id')->on('orderps')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_orderp');
    }
}

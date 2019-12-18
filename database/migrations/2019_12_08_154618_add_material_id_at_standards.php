<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaterialIdAtStandards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('standards', function(Blueprint $table){
            $table->bigInteger('material_id')->unsigned()->nullable()->after('id');

            $table->foreign('material_id')->references('id')->on('materials')->onUpdate('cascade');
            //->onDelete()->onUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

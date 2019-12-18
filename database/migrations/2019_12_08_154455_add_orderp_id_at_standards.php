<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderpIdAtStandards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('standards', function(Blueprint $table){
            $table->bigInteger('orderp_id')->unsigned()->nullable()->after('id');

            $table->foreign('orderp_id')->references('id')->on('orderps')->onUpdate('cascade');
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

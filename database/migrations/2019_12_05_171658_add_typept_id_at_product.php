<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeptIdAtProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table){
            $table->bigInteger('typept_id')->unsigned()->nullable()->after('id');

            $table->foreign('typept_id')->references('id')->on('typepts')->onDelete('set null')->onUpdate('cascade');
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

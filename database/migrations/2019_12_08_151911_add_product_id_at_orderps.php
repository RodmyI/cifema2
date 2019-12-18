<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductIdAtOrderps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orderps', function(Blueprint $table){
            $table->bigInteger('product_id')->unsigned()->nullable()->after('id');

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
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

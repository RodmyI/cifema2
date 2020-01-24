<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orderp_id')->unsigned()->nullable();
            $table->integer('number')->unsigned()->unique();
            $table->date('date_issue')->nullable();
            $table->string('reception_date')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            
            $table->foreign('orderp_id')->references('id')->on('orderps')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyorders');
    }
}
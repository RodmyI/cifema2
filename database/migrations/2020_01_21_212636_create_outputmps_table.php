<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputmps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orderp_id')->unsigned()->nullable();
            $table->integer('number')->unsigned()->unique();
            $table->date('date_output')->nullable();
            $table->integer('status')->defauly(0);
            $table->string('received_by');
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
        Schema::dropIfExists('outputmps');
    }
}

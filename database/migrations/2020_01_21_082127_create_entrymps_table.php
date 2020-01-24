<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrympsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrymps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->unsigned()->unique();
            $table->string('document_type')->nullable();
            $table->string('document_number')->nullable();
            $table->string('provider')->nullable();
            $table->date('date_entry')->nullable();
            $table->string('received_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrymps');
    }
}

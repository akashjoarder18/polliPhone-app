<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festons', function (Blueprint $table) {
            $table->id('feston_id');
            $table->string('feston_name');
            $table->date('date');
            $table->unsignedBigInteger('outlet_id');
            $table->foreign('outlet_id')->references('outlet_id')->on('outlets');
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
        Schema::dropIfExists('festons');
    }
}

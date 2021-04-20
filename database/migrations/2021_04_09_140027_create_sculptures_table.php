<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSculpturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sculptures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("lot_id")->unsigned();
            $table->foreign("lot_id")
                ->references('id')
                ->on('lots')->onDelete('cascade');
            $table->string("material");
            $table->double("weight");
            $table->double("width");
            $table->double("height");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sculptures');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrint001sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print001s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('printer_id');
            $table->integer('color_prints');
            $table->integer('black_prints');
            $table->integer('total_pages');
            $table->date('date_prints')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('print001s');
    }
}

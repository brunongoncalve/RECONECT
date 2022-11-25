<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItens001Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens001', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_item')->nullable();
            $table->string('responsible_in')->nullable();
            $table->date('dt_in')->nullable();
            $table->date('dt_out')->nullable();
            $table->string('responsible_out')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('itens001');
    }
}

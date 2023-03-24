<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRep001sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rep001s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('rep002s_id');
            $table->string('message')->nullable();
            $table->integer('status')->nullable();
            $table->date('date_post')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rep001s');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRep004sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rep004s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('rep001s_id');
            $table->text('comment')->nullable();
            $table->date('date_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rep004s');
    }
}

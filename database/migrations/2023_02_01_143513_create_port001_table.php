<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePort001Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('port001', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('users_id')->constrained();
            $table->integer('port002_id')->nullable();
            $table->string('car_in')->nullable();
            $table->string('plate_in')->nullable();
            $table->date('date_in')->nullable();
            $table->string('car_out')->nullable();
            $table->string('plate_out')->nullable();
            $table->date('date_out')->nullable();
            $table->integer('responsible')->nullable();
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
        Schema::dropIfExists('port001');
    }
}

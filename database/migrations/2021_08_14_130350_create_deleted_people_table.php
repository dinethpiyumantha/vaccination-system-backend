<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_people', function (Blueprint $table) {
            $table->id();
            $table->string('serialno');
            $table->string('name');
            $table->string('nic');
            $table->integer('age');
            $table->string('gender');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('district');
            $table->string('moh');
            $table->string('gn');
            $table->string('important')->nullable();
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
        Schema::dropIfExists('deleted_people');
    }
}

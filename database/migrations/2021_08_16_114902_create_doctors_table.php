<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nameFull');
            $table->string('slmcNo');
            $table->string('hospital');
            $table->string('address');
            $table->string('gender');
            $table->string('phoneNo')->nullable();
            $table->string('maritalStatus');
            $table->string('date');
            $table->string('venue');
            $table->timestamps();
        });
        // php artisan migrate
        // php artisan migrate:fresh
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}

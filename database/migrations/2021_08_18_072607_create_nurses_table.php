<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->String ('nurse_no');
            $table->String ('name');
            $table->String ('joined_date');
            $table->String ('NIC');
            $table->integer ('age');
            $table->String ('gender');
            $table->String ('phone_no');
            $table->String ('email')->nullable();
            $table->String ('nurse_type');
            $table->String ('working_hospital');
            $table->text ('permanent_address');
            $table->String ('Shift');
            $table->String ('From');
            $table->String ('To');
            $table->text ('specialNote')->nullable();
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
        Schema::dropIfExists('nurses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('name');
            $table->bigInteger('major_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table -> foreign('major_id')
                   -> references('id')
                   ->on('majors')
                   ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

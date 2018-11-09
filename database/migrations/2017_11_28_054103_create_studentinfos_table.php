<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentinfos', function (Blueprint $table) {
            $table->increments('id')
            $table->string('name');
            $table->string('department');
            $table->string('hall_name');
            $table->string('advisor');
            $table->string('level');
            $table->string('term');
            $table->string('student_type');
            $table->string('nationality');
            $table->string('hall_transaction');
            $table->string('course_transection');
            $table->string('status');
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
        Schema::dropIfExists('studentinfos');
    }
}

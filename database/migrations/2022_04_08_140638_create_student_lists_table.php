<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('course_id');
            $table->unsignedbigInteger('section_id');
            $table->string('student_name');
            $table->string('campus');
            $table->string('course');
            $table->string('section');
            $table->string('email');
            $table->string('address');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('age');
            $table->string('number');


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
        Schema::dropIfExists('student_lists');
    }
};

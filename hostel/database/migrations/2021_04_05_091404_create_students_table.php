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
            $table->increments('sid');
             $table->string('enrollId')->nullable; 
             $table->string('fname');
             $table->string('mname')->nullable;
             $table->string('lname');
             $table->string('address');
             $table->string('s_course');
             $table->string('dob');
             $table->string('contact');
             $table->string('email');
             $table->string('password');
             $table->string('ename');
             $table->string('econtact');
             $table->boolean('role');
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
        Schema::dropIfExists('students');
    }
}

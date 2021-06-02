<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('fname');
            $table->string('mname')->nullable;
            $table->string('lname');
            $table->string('eid');
            $table->string('rno');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            
            $table->dropColumn('fname');
            $table->dropColumn('mname');
            $table->dropColumn('lname');
            $table->dropColumn('eid');
            $table->dropColumn('rno');

        });
    }
}

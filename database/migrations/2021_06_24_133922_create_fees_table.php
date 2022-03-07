<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('amount',8,2);
            $table->unsignedBigInteger('Grade_id');
            $table->unsignedBigInteger('Classroom_id');
//            $table->foreignId('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
//            $table->foreignId('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('year');
            $table->integer('Fees_type');
            $table->timestamps();
        });
        //This is to make foreign key
        Schema::table('fees', function (Blueprint $table) {
            $table->foreign('Grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}

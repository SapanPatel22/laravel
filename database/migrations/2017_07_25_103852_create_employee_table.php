<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            
            $table->enum('prefix', ['Mr.', 'Mrs.']);
            $table->string('first_name', 20);
            $table->string('middle_name', 20)->nullable();
            $table->string('last_name', 20);
            $table->enum('gender', ['M', 'F']);
            $table->string('email', 50);
            $table->string('password', 255);
            $table->string('marital_status', 20)->nullable();
            $table->string('photo_path', 255)->nullable();
            $table->text('extra_note')->nullable();
            $table->string('dob', 10)->nullable();
            $table->integer('stack_id')->nullable()->unsigned();

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
        Schema::dropIfExists('employee');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmployeeCommunicationAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_communication', function (Blueprint $table) {
            $table->integer('fk_employee_id')->unsigned();
            $table->foreign('fk_employee_id')->references('id')->on('employee');
        });
        Schema::table('employee_communication', function (Blueprint $table) {
            $table->integer('fk_communication_id')->unsigned();
            $table->foreign('fk_communication_id')->references('id')->on('communication');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_communication', function (Blueprint $table) {
            if (Schema::hasColumn('employee_communication', 'fk_employee_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_employee_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
        Schema::table('employee_communication', function (Blueprint $table) {
            if (Schema::hasColumn('employee_communication', 'fk_communication_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_communication_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
    }
}

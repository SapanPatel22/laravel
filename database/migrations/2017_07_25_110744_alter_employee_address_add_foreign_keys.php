<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmployeeAddressAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address', function (Blueprint $table) {
            $table->integer('fk_employee_id')->unsigned();
            $table->foreign('fk_employee_id')->references('id')->on('employee');
        });
         Schema::table('address', function (Blueprint $table) {
            $table->integer('fk_city_id')->unsigned();
            $table->foreign('fk_city_id')->references('id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address', function (Blueprint $table) {
            if (Schema::hasColumn('address', 'fk_employee_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_employee_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
        Schema::table('address', function (Blueprint $table) {
            if (Schema::hasColumn('address', 'fk_city_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_city_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
    }
}

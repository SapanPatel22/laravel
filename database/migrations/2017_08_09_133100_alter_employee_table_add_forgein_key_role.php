<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmployeeTableAddForgeinKeyRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->integer('fk_roles_id')->unsigned()->nullable();
            $table->foreign('fk_roles_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee', function (Blueprint $table) {

            if (Schema::hasColumn('employee', 'fk_roles_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_roles_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
    }
}

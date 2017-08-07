<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmployeeAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->integer('fk_company_id')->nullable()->unsigned();
            $table->foreign('fk_company_id')->references('id')->on('company');

            $table->integer('fk_role_id')->nullable()->unsigned();
            $table->foreign('fk_role_id')->references('id')->on('role');
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
            Schema::disableForeignKeyConstraints();

            if (Schema::hasColumn('employee', 'fk_company_id')) {
                $table->dropForeign(['fk_company_id']);
            }

            if (Schema::hasColumn('employee', 'fk_role_id')) {
                $table->dropForeign(['fk_role_id']);
            }

            Schema::enableForeignKeyConstraints();
        });
    }
}

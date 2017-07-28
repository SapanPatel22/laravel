<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompanyRoleAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_role', function (Blueprint $table) {
            $table->integer('fk_company_id')->unsigned();
            $table->foreign('fk_company_id')->references('id')->on('company');
        });
        Schema::table('company_role', function (Blueprint $table) {
            $table->integer('fk_role_id')->unsigned();
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
        Schema::table('company_role', function (Blueprint $table) {
            if (Schema::hasColumn('company_role', 'fk_company_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_company_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
        Schema::table('company_role', function (Blueprint $table) {
            if (Schema::hasColumn('company_role', 'fk_role_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_role_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
    }
}

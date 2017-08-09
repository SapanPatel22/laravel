<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPermissionsTableAddForgeinKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('fk_roles_id')->references('id')->on('roles');

            $table->foreign('fk_resources_id')->references('id')->on('resources');

            $table->foreign('fk_operations_id')->references('id')->on('operations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {

            if (Schema::hasColumn('permissions', 'fk_roles_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_roles_id']);
                Schema::enableForeignKeyConstraints();
            }

             if (Schema::hasColumn('permissions', 'fk_resources_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_resources_id']);
                Schema::enableForeignKeyConstraints();
            }

             if (Schema::hasColumn('permissions', 'fk_operations_id')) {
                Schema::disableForeignKeyConstraints();
                $table->dropForeign(['fk_operations_id']);
                Schema::enableForeignKeyConstraints();
            }
        });
    }
}

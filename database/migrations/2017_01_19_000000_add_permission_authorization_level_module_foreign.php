<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionAuthorizationLevelModuleForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('authorization_level_id')
                      ->references('id')
                      ->on('authorization_levels');
            $table->foreign('module_id')
                      ->references('id')
                      ->on('modules');
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
            $table->dropForeign(['authorization_level_id']);
            $table->dropForeign(['module_id']);
        });
    }
}

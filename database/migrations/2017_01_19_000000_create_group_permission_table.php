<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_permission', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
            $table->integer('permission_id')->unsigned();
                
            $table->primary(['group_id','permission_id']);
            $table->foreign('group_id')
                      ->references('id')
                      ->on('groups');
            $table->foreign('permission_id')
                      ->references('id')
                      ->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_permission', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropForeign(['permission_id']);
        });
        
        Schema::dropIfExists('group_permission');
    }
}

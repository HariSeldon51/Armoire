<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_module', function (Blueprint $table) {
            $table->integer('module_id')->unsigned();
            $table->integer('dashboard_id')->unsigned();
            $table->integer('order');
            
            $table->primary(['module_id','dashboard_id']);   
            $table->foreign('module_id')
                      ->references('id')
                      ->on('modules');
            $table->foreign('dashboard_id')
                      ->references('id')
                      ->on('dashboards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dashboard_module', function (Blueprint $table) {
            $table->dropForeign(['dashboard_id']);
            $table->dropForeign(['module_id']);
        });
        
        Schema::dropIfExists('dashboard_module');
    }
}

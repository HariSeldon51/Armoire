<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_module', function (Blueprint $table) {
            $table->integer('child_module_id')->unsigned();
            $table->integer('parent_module_id')->unsigned();
            
            $table->primary(['child_module_id','parent_module_id']);
            $table->foreign('child_module_id')
                      ->references('id')
                      ->on('modules');
            $table->foreign('parent_module_id')
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
        Schema::table('module_module', function (Blueprint $table) {
            $table->dropForeign(['child_module_id']);
            $table->dropForeign(['parent_module_id']);
        });
        
        Schema::dropIfExists('module_module');
    }
}

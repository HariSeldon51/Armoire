<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_widget', function (Blueprint $table) {
            $table->integer('dashboard_id')->unsigned();
            $table->integer('widget_id')->unsigned();
            $table->integer('order');
            
            $table->primary(['dashboard_id','widget_id']);
            $table->foreign('dashboard_id')
                      ->references('id')
                      ->on('dashboards');
            $table->foreign('widget_id')
                      ->references('id')
                      ->on('widgets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dashboard_widget', function (Blueprint $table) {
            $table->dropForeign(['dashboard_id']);
            $table->dropForeign(['widget_id']);
        });
        
        Schema::dropIfExists('dashboard_widget');
    }
}

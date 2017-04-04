<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWidgetDataTemplateForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('widgets', function (Blueprint $table) {
            $table->foreign('template_id')
                      ->references('id')
                      ->on('templates');
            $table->foreign('data_id')
                      ->references('id')
                      ->on('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('widgets', function (Blueprint $table) {
            $table->dropForeign(['template_id']);
            $table->dropForeign(['data_id']);
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('domain_id')->unsigned();
            
            $table->primary(['user_id','domain_id']);
            $table->foreign('user_id')
                      ->references('id')
                      ->on('users');
            $table->foreign('domain_id')
                      ->references('id')
                      ->on('domains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domain_user', function (Blueprint $table) {
            $table->dropForeign(['domain_id']);
            $table->dropForeign(['user_id']);
        });
        
        Schema::dropIfExists('domain_user');
    }
}

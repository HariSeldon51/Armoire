<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainDomainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_domain', function (Blueprint $table) {
            $table->integer('child_domain_id')->unsigned();
            $table->integer('parent_domain_id')->unsigned();
            
            $table->primary(['child_domain_id','parent_domain_id']); 
            $table->foreign('child_domain_id')
                      ->references('id')
                      ->on('domains');
            $table->foreign('parent_domain_id')
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
        Schema::table('domain_domain', function (Blueprint $table) {
            $table->dropForeign(['child_domain_id']);
            $table->dropForeign(['parent_domain_id']);
        });
        
        Schema::dropIfExists('domain_domain');
    }
}

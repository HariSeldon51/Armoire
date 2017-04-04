<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Authorization_Level;

class InitializeAuthorizationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Authorization_Level::createAuthorizationLevel("Guest",
                                                      "User can only view public data.");
        
        Authorization_Level::createAuthorizationLevel("Reviewer",
                                                      "User can view all data specific to their domain(s).");
        
        Authorization_Level::createAuthorizationLevel("Contributor",
                                                      "User can view all data specific to their domain(s), but can only create or modify that data using form widgets.");
        
        Authorization_Level::createAuthorizationLevel("Author",
                                                      "User can view all data specific to their domain(s), as well as create and modify that data using form and table widgets.");
        
        Authorization_Level::createAuthorizationLevel("Publisher",
                                                      "User can view all data specific to their domain(s), create and modify that data using form and table widgets, and assign reviewer rights and share using widgets to other users.");
        
        Authorization_Level::createAuthorizationLevel("Owner",
                                                      "User can view all data specific to their domain(s), create and modify that data using form and table widgets, and assign reviewer/contributor/author rights and share using widgets to other users.");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {    }
}

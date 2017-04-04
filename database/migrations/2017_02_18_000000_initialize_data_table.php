<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Data;

class InitializeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Data::createData("account_statii",
                         "The statuses for user accounts.",
                         true);
        
        Data::createData("authorization_levels",
                         "Authorization levels available for permissions.",
                         true);
        
        Data::createData("dashboards",
                         "Listing of all dashboards in the system.",
                         true);
        
        Data::createData("data",
                         "Contains a listing of all datatables available to utilize.",
                         true);
        
        Data::createData("domains",
                         "All domains available in the system.",
                         true);
        
        Data::createData("groups",
                         "Listing of groups available to handle user permissions.",
                         true);
        
        Data::createData("modules",
                         "Listing of all modules available in the system.",
                         true);
        
        Data::createData("permissions",
                         "Listing of all permissions available.",
                         true);
        
        Data::createData("templates",
                         "Listing of all templates available for use by widgets.",
                         true);
        
        Data::createData("users",
                         "All users registered in the system.",
                         true);
        
        Data::createData("widgets",
                         "All widgets available in the system.",
                         true);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {    }
}

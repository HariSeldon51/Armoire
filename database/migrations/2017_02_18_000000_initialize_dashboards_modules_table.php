<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Dashboard;
use App\Module;

class InitializeDashboardsModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminModule = Module::createModule("Administration",
                             "Modules group together various Dashboards and Widgets, as well as allow Users to be granted permissions per module. All granted modules will be available from the menu that pulls out from the left side of the Portex app. Manage your platform Modules here.",
                             "icons:settings-applications");
        
        $dataModule = Module::createModule("Data Management",
                             "Manage your data on the Portex platform.",
                             "device:storage",
                             $adminModule);
        
        $guiModule = Module::createModule("GUI Management",
                             "Manage the Portex platform web components.",
                             "icons:view-quilt",
                             $adminModule);
        
        $userModule = Module::createModule("User Management",
                             "Manage users, groups, and permissions.",
                             "social:person",
                             $adminModule);
        
        Module::createModule("Data",
                             "Manage all Portex data.",
                             "icons:cloud-done",
                             $dataModule);
            
        Module::createModule("Domains",
                             "Manage Domains on the Portex platform.",
                             "icons:store",
                             $dataModule);
        
        Module::createModule("Dashboards",
                             "Manage module dashboards",
                             "icons:dashboard",
                             $guiModule);
        
        Module::createModule("Modules",
                             "Manage Modules available within the Portex platform.",
                             "icons:extension",
                             $guiModule);
        
        Module::createModule("Templates",
                             "Design and manage widget templates available on the Portex platform.",
                             "icons:code",
                             $guiModule);
        
        Module::createModule("Widgets",
                             "Manage Widgets available to users within the Portex platform.",
                             "icons:assessment",
                             $guiModule);
        
        Module::createModule("Groups",
                             "Manage User Groups on the Portex platform.",
                             "icons:group-work",
                             $userModule);
        
        Module::createModule("Permissions",
                             "View Permissions available on the Portex platform.",
                             "icons:verified-user",
                             $userModule);
        
        $iModule = Module::createModule("Users",
                             "Manage Users on the Portex platform.",
                             "icons:supervisor-account",
                             $userModule);
        
        Dashboard::createDashboard("Glance", 
                             "Understand your portal users at a glance.",
                             $iModule);
        
        Dashboard::createDashboard("Browse", 
                             "Browse your portal users.",
                             $iModule);
        
        Dashboard::createDashboard("Explore", 
                             "Look at individual portal users in-depth.",
                             $iModule);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Group;
use App\Permission;

class InitializeGroupPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $initGroup = Group::where('group_name', 'Global Administrators')->first();
        $initPerm = Permission::where('permission_name', 'Administration Owner')->first();
        
        $initGroup->permissions()->attach($initPerm);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Account_Status;

class InitializeAccountStatiiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Account_Status::createAccountStatus("Registered",
                             "User has registered, but has not yet been activated. May have limited permissions and access.");
        
        Account_Status::createAccountStatus("Active",
                             "User is active. Permissions and access depend on permissions and domains assigned to the user.");
        
        Account_Status::createAccountStatus("Inactive",
                             "User has been deactivated. Will have limited permissions but no access.");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {    }
}

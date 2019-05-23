<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\tbluser;

class AddCollumToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbluser', function (Blueprint $table) {
            //
            $table->string('provider')->after('remember_token');
            $table->string('provider_id')->after('provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbluser', function (Blueprint $table) {
            //
            $table->dropCollumn('provider');
            $table->dropColumn('provider_id');
        });
    }
}

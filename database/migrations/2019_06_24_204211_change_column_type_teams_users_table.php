<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypeTeamsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams_users', function (Blueprint $table) {
              $table->integer('team_id')->unsigned()->change();
              $table->integer('user_id')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams_users', function (Blueprint $table) {
            $table->string('team_id')->change();
              $table->string('user_id')->change();
        });
    }
}

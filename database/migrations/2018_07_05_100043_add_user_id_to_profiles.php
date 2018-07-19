<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints('profiles', function($table) {
        $table->integer('user_id')->unsigned()->after('id');
        $table->foreign('user_id')->references('id')->on('users');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('profiles', function(Blueprint $table){

        $table->dropForeign('profiles_user_id_foreign');
        $table->dropColumn('user_id');

    });
    }
}

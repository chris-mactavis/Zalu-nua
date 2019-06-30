<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserinfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userinfos', function (Blueprint $table) {
            $table->string('city')->nullable()->change();
            $table->string('state_id')->nullable()->change();
            $table->string('lga')->nullable()->change();
            $table->string('city_alt')->nullable()->after('city');
            $table->string('state_alt')->nullable()->after('state_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userinfos', function (Blueprint $table) {
            $table->string('city')->change();
            $table->integer('state_id')->nullable()->change();
            $table->integer('lga')->nullable()->change();
            $table->dropColumn('city_alt');
            $table->dropColumn('state_alt');
        });
    }
}

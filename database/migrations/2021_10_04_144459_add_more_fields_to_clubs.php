<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToClubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->text('date')->nullable()->after('name');
            $table->text('category')->nullable()->after('date');
            $table->text('zone')->nullable()->after('category');
            $table->text('advisor')->nullable()->after('zone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('email');
            $table->dropColumn('socialmedia');
        });
    }
}

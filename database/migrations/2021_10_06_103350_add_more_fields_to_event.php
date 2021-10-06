<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event', function (Blueprint $table) {
            $table->text('eventname')->nullable()->after('date');
            $table->text('category')->nullable()->after('eventname');
            $table->text('level')->nullable()->after('category');
            $table->text('organizer')->nullable()->after('level');
            $table->text('location')->nullable()->after('organizer');
            $table->text('link')->nullable()->after('location');
            $table->text('fundcash')->nullable()->after('link');
            $table->text('fundtransport')->nullable()->after('fundcash');
            $table->text('note')->nullable()->after('description');
            $table->string('poster')->nullable()->after('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event', function (Blueprint $table) {
            $table->dropColumn('venue');
            $table->dropColumn('eventpic');
        });
    }
}

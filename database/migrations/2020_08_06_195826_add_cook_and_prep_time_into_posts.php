<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCookAndPrepTimeIntoPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('htime');
            $table->integer('mtime');
            $table->integer('stime');
            $table->integer('hcook');
            $table->integer('mcook');
            $table->integer('scook');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('htime');
            $table->dropColumn('mtime');
            $table->dropColumn('stime');
            $table->dropColumn('hcook');
            $table->dropColumn('mcook');
            $table->dropColumn('scook');
        });
    }
}

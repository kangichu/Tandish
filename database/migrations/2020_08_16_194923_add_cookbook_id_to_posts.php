<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCookbookIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
           /*$table->unsignedBigInteger('cookbook_id')->nullable();
           $table->foreign('cookbook_id')->references('id')->on('cookbooks')->onDelete('SET NULL');*/
           $table->foreignId('cookbook_id')->nullable()->constrained()->onDelete('SET NULL');
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
            $table->dropColumn('cookbook_id');
        });
    }
}

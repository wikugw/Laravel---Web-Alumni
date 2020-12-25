<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ceritas', function (Blueprint $table) {
            $table->integer('happy_reaction_count')->default('0');
            $table->integer('sad_reaction_count')->default('0');
            $table->integer('visited_count')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ceritas', function (Blueprint $table) {
            $table->dropColumn('happy_reaction_count');
            $table->dropColumn('sad_reaction_count');
            $table->dropColumn('visited_count');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
            $table->string('min_from_station')->after('fee');
            $table->text('target')->after('content');
            $table->string('address_room')->after('address_detail');
            $table->string('address_url')->after('address_room');
            $table->integer('max_num')->after('fee');
            $table->string('youtube_url')->after('content');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
            $table->dropColumn('min_from_station');
            $table->dropColumn('target');
            $table->dropColumn('address_room');
            $table->dropColumn('address_url');
            $table->dropColumn('max_num');
            // $table->dropColumn('youtube_url');
        });
    }
}

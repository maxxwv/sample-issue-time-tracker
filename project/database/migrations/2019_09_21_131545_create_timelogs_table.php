<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timelogs', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('user');
            $table->bigInteger('issue');
            $table->bigInteger('seconds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timelogs', function () {
            Schema::dropIfExists('timelogs');
        });
    }
}

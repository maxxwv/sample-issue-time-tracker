<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssueComponents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issue_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('issue');
            $table->bigInteger('component');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issue_components', function (Blueprint $table) {
            Schema::dropIfExists('issue_components');
        });
    }
}

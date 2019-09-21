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
        Schema::create('issue_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('issue_id');
            $table->bigInteger('component_id');
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
        Schema::table('issue_components', function (Blueprint $table) {
            Schema::dropIfExists('issue_components');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_runs', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'runUuid' )->nullable();
            $table->string( 'testListUrl' )->nullable();
            $table->longText( 'testLists' )->nullable();
            $table->index('runUuid');

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
        Schema::dropIfExists('test_runs');
    }
}

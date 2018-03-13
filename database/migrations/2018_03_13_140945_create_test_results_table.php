<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string( 'startUrl' )->nullable();
            $table->string( 'runUuid' )->nullable();
            $table->boolean( 'passed' )->nullable();
            $table->string( 'testId' )->nullable();
            $table->timestamps();

            $table->index('runUuid');
            $table->index('testId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}

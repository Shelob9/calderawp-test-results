<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hi', function () {
    return response()->json([
        'hi' => 'Roy',
    ]);
});


Route::group(['middleware' => ['auth']], function () {
    //Test Results
    Route::get( '/api/v1/test-results/byTestId/{testId}', 'TestResults@byTestId');
    Route::get( '/api/v1/test-results/byRunUuid/{runUuid}', 'TestResults@byRunUuid');
    Route::get( '/api/v1/test-results/{id}', 'TestResult@read' );
    Route::get( '/api/v1/test-results/', 'TestResults@index');

    //Test Runs
    Route::get( '/api/v1/test-run/{id}', 'TestRun@read' );
    Route::get( '/api/v1/test-run', 'TestRun@index' );
    Route::get( '/api/v1/test-run/byRunUuid', 'TestRun@byRunUuid' );

});

Route::group(['startTests' => ['auth']], function () {
    //Test Results
    Route::post( '/api/v1/test-results', 'TestResult@create' );

    //Test Runs
    Route::post( '/api/v1/test-run', 'TestRun@create' );
});








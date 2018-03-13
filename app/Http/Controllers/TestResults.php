<?php


namespace App\Http\Controllers;

use \App\TestResult;
use Illuminate\Http\Request;


class TestResults extends Controller
{

    /**
     * Respond to /api/v1/test-results/byTestId/{testId}
     *
     * @param Request $request
     * @param string $testId
     * @return mixed
     */
    public function byTestId(Request $request, string $testId )
    {
        $tests = TestResult::where( 'testId', $testId )->get();
        return $this->respondWithCollection( $tests );

    }

    /**
     * Respond to /api/v1/test-results/byTestId/{runUuid}
     *
     * @param Request $request
     * @param string $runUuid
     * @return mixed
     */
    public function byRunUuid(Request $request, string $runUuid )
    {
        $tests = TestResult::where( 'runUuid', $runUuid )->get();
        return $this->respondWithCollection( $tests );
    }

    /**
     * Respond to GET /api/v1/test-results/
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(Request $request ){
        return TestResult::all();
    }


}
<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\TestResult as Model;

class TestResult extends Controller
{

    /**
     * Respond to POST /api/v1/test-results
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request){
        $args =  [
            'startUrl' => $request->input( 'strartUrl', 'google' ),
            'runUuid' => $request->input( 'runUuid', '' ),
            'passed' => (int)$request->input( 'passed', 'false' ),
            'testId' => $request->input( 'testId', '' )
        ];
        $testResult = new Model($args);
        $testResult->save();
        return response()->json($testResult);
    }

    /**
     * Respond to GET /api/v1/test-results/{id}
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function read(Request $request, $id ){
        $testResult = Model::find( $id );
        if ($testResult) {
            return response()->json($testResult->toArray());
        } else {
            return response( "not found", 404)->json(['message' => 'Not found', 'error' => true ] );
        }
    }
}
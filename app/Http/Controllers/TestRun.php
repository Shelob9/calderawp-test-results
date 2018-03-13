<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\TestRun as Model;
class TestRun extends Controller
{

    /**
     * Respond to POST /api/v1/test-run
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create( Request $request )
    {

        $args = [
            'runUuid' => $request->json( 'runUuid', '' ),
            'testListUrl' =>  $request->json( 'testListUrl', ''),
        ];

        $testRun = new Model( $args );
        $testRun->save();
        return $this->returnWithModel( $testRun );

    }

    /**
     * Respond to GET /api/v1/test-run
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index( Request $request ){
        return $this->respondWithCollection( Model::all() );
    }

    /**
     * Respond to GET /api/v1/test-run/byRunUuid
     *
     * @param Request $request
     * @param string $runUuid
     * @return mixed
     */
    public function byRunUuid(Request $request, string $runUuid )
    {
        return $this->respondWithCollection( Model::where( 'runUuid', $runUuid )->get() );
    }

    /**
     * Respond to GET /api/v1/test-run/{id}
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function read(Request $request, $id )
    {
        return $this->returnWithModel( Model::find( $id ) );
    }
}
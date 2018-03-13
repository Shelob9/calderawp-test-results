<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function respondWithCollection(Collection $collection = null, $status = 200  )
    {

        $headers = $this->makeHeaders();
        if( $collection && $collection->count() ){
            return response( $collection->toJson(), $status, $headers  );
        }else{
            return response( json_encode( ['message' => 'Not found' ]), 404, $headers  );

        }

    }

    protected function returnWithModel( Model $model, $status = 200 )
    {
        return response( $model->toJson(), $status, $this->makeHeaders()  );
    }
    /**
     * @return array
     */
    protected function makeHeaders(): array
    {
        $headers = [
            'content-type' => 'application/json'
        ];
        return $headers;
    }


}

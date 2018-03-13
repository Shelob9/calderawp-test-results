<?php


namespace App;


abstract class Model extends \Illuminate\Database\Eloquent\Model implements LaravelModelCanDecorateInteropModel
{

    /**
     * @var \calderawp\interop\Models\Model
     */
    protected $interopModel;


    /**
     * @return \calderawp\interop\Models\Model
     */
    public function asInteropModel() : \calderawp\interop\Models\Model
    {
        return $this->interopModel;
    }

    /**
     * @return \calderawp\interop\Entities\Entity
     */
    public function asInteropEntity() : \calderawp\interop\Entities\Entity
    {
        return $this->asInteropModel()->getEntity();
    }

}
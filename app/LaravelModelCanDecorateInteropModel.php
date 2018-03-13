<?php


namespace App;

/**
 * Interface LaravelModelCanDecorateInteropModel
 *
 * Interface that an Eloquent (Laravel) Model MUST impliment when it decorates an interoperable model
 * @package App
 */
interface LaravelModelCanDecorateInteropModel
{

    /**
     * Get model as an iterop model
     *
     * @return \calderawp\interop\Models\Model
     */
    public function asInteropModel() : \calderawp\interop\Models\Model;
    //phpcs:disable
    //This is type hinting an abstract class, not an interface, BAD SMELL
    //phpcs:enable

    /**
     * Get the entity from the decorated Interop mdoel
     *
     * @return \calderawp\interop\Entities\Entity
     */
    public function asInteropEntity() : \calderawp\interop\Entities\Entity;
    //phpcs:disable
    //This is type hinting an abstract class, not an interface, BAD SMELL
    //phpcs:enable
}
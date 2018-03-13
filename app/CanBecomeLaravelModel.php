<?php


namespace App;

/**
 * Interface CanBecomeLaravelModel
 *
 * Interface that all interoperable models that become Eloquent (Laravel) models MUST impliment
 * @package App
 */
interface CanBecomeLaravelModel
{

    /**
     * Creates a Laravel Eloquent\Model from an interoperable model
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function toLaravelModel() : \Illuminate\Database\Eloquent\Model;

}
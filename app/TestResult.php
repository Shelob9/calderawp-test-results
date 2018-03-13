<?php


namespace App;


class TestResult extends \Illuminate\Database\Eloquent\Model
{
    /** @inheritdoc */
    protected $fillable = [
        'startUrl',
        'runUuid',
        'passed',
        'testId'
    ];

    /** @inheritdoc */
    protected $casts = [
        'startUrl' => 'string',
        'runUuid' => 'string',
        'passed' => 'boolean',
        'testId' => 'string'
    ];



}
<?php


namespace App;

use App\Observers\WatchTestRun;
use \Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Notifications\Notifiable;

class TestRun extends Model
{
    use Notifiable;

    /** @inheritdoc */
    protected $fillable = [
        'runUuid',
        'testListUrl',
        'testLists'
    ];

    protected $casts = [
        'testLists' => 'json'
    ];


}
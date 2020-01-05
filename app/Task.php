<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // use UtfDecoder;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task';

    protected $primaryKey = 'TID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

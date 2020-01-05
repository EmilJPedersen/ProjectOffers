<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    // use UtfDecoder;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'template';

    protected $primaryKey = 'TempID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

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
}

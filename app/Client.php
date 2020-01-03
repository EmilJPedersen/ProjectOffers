<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // use UtfDecoder;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Client';

    protected $primaryKey = 'OID';
}

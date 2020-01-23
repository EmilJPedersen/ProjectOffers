<?php

namespace App;

use App\Project\UtfDecoder;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'client';

    protected $primaryKey = 'OID';

    public $timestamps = false;
}

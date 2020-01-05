<?php

namespace App;

use App\Project\UtfDecoder;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use UtfDecoder;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'client';

    protected $primaryKey = 'OID';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

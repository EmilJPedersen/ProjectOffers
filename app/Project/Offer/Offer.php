<?php

namespace App;

use App\Project\UtfDecoder;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use UtfDecoder;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Offer';

    protected $primaryKey = 'OID';
}

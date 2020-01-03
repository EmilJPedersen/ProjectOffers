<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project\UtfDecoder;

class Offer extends Model
{
    use UtfDecoder;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offer';
}

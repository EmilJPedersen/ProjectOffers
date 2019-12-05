<?php

namespace App\Project\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';

    protected $primaryKey = 'address_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function getAddress($client_id)
    {
        return Address::where('owner_id', $client_id)->first();
    }
}


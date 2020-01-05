<?php

namespace App\Project\Client;

use App\Project\Enum\AccountTypeEnum;
use App\Project\UtfDecoder;
use App\Project\Address\Address;
use App\Project\Contact\Contact;
use App\Project\Project\Project;
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
    // protected $appends = [
    //     'path',
	// 	'accountTypeName'
    // ];




	public function getaccountTypeNameAttribute()
	{
		if (is_numeric($this->account_type)){
			return AccountTypeEnum::$arr[$this->account_type];
		}else{
			return null; //TODO RM: fejler på timesheet hvis jeg ikke laver dette fiks. Spørg de kloge!
		}
		//return $this->account_type;
	}


    public function getPathAttribute()
    {
        return route('client.show', $this->id);
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('enabled', 1);
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'cust_id', 'id');
    }

	 public function activeProjects()
    {
        return $this->hasMany(Project::class, 'cust_id', 'id')->where('statusKey', '<', 100);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'cust_id', 'id');
    }



    /**
     * Find all active clients
     * @return mixed
     */
    public static function getAll()
    {
        return Client::active()->orderBy('name', 'ASC')->get();
    }

    public function getActiveProjects()
    {
        return $this->projects()->where('statusKey', '<', '100')->get();
    }

    public static function findClientByEconomicId($id){
        return Client::where('regnskab_kundeid', $id)->first();
    }
}

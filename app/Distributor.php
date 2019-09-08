<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Distributor extends Eloquent implements Authenticatable
{
    use AuthenticableTrait; 
    use Notifiable;

    protected $connection = "mongodb";
	protected $guarded = [];
    

    /**
     * Get the user that owns the taks.
     */
    public function taks()
    {
        return $this->hasMany('App\Taks','tak_id','_id');
    }
}

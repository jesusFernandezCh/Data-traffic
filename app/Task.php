<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class Task extends Eloquent
{
	protected $connection = "mongodb";
	protected $guarded = [];
    

    /**
     * Get the account for the blog distribuidor.
     */
    public function distribuidor()
    {
        return $this->belongsTo('App\Distributor', 'distribuidor_id',"_id");
    }
}

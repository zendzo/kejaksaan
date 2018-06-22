<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function user()
    {
    	return $this->hasOne('App\User'.'gender_id');
    }

    public function pengaduan()
    {
    	return $this->hasOne('App\Pengaduan'.'gender_id');
    }
}

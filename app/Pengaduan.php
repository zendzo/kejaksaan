<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengaduan extends Model
{

	protected $fillable = [
		'no_ktp',
		'name',
		'gender_id',
		'birth_date',
		'phone',
		'email',
		'address',
		'title_pengaduan',
		'content_pengaduan',
		'status',
	];


	public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d/m/Y',$value)->toDateString();
    }

    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }
}

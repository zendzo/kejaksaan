<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'role_id',
        'birth_date',
        'gender_id',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d/m/Y',$value)->toDateString();
    }

    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
	   
    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id');
    }

    public function team()
    {
        return $this->belongsToMany(Pengaduan::class)->withPivot([
			'supervisior_id',
			'supervisior_name',
			'supervisior_email',
			'supervisior_occupation'
			]);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}

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
		'attachment',
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
	
	public function comments()
	{
		return $this->morphMany(Comment::class,'commentable');
	}

	public function team()
	{
		return $this->belongsToMany(User::class)->withPivot([
			'supervisior_id',
			'supervisior_name',
			'supervisior_email',
			'supervisior_occupation'
			]);
	}

	public function report()
	{
		return $this->hasOne(Report::class);
	}

	public function idUserInTeam($id)
	{
		$pengaduan = $this->findOrFail($id);
		$userAlreadyInTeam = [];
		// get the users id which already assing as team member for pengaduan
		// store in array $userAlreadyInTeam for filter collection to prevent double assign the same user
		// loop $team->whereNotIn('id',$pengaduan->idUserInTeam($pengaduan->id)) in team_modal
            if (isset($pengaduan->team)) {
					foreach ($pengaduan->team as $team) {
						$userAlreadyInTeam[] = $team->id;
					}
					return $userAlreadyInTeam;
				}
	}
}

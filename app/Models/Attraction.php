<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
	protected $fillable = [
		'name',
		'age_limit',
		'start_time',
		'end_time',
		'capacity',
		'picture',
		'etc'
	];
    use HasFactory;
}

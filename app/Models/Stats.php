<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'attraction_id',
		'run_day',
		'customer_cnt'
	];
}

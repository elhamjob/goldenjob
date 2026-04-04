<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class studentattendance extends Model
{
	 protected $connection = 'mysql1';
     protected $table = 'daily_attendance';
}

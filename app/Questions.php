<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
	protected $primaryKey = 'questions_id';

    protected $fillable = ['question', 'user_id', 'multiple_answer'];
}

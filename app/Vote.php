<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vote';

    protected $primaryKey = 'vote_id';

    protected $fillable = ['choice_id', 'user_id', 'user_ip'];

}

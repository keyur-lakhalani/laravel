<?php

namespace App\Facades;

Class CommonHelperClass extends \Illuminate\Support\Facades\Facade{

	protected static function getFacadeAccessor(){
		return 'commonHelper';
	}
}

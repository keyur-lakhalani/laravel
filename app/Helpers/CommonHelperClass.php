<?php

namespace App\Helpers;

#use file;

class CommonHelperClass {

	public function sizeFilter( $bytes )
	{
    	$label = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB' );
    	for( $i = 0; $bytes >= 1024 && $i < ( count( $label ) -1 ); $bytes /= 1024, $i++ );
    	return( round( $bytes, 2 ) . " " . $label[$i] );
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class String_lib  
{
	
	function balik($data){
		$output = '';
		$temp = str_split($data);
		for ($i = count($temp) - 1; $i >= 0 ; $i--) { 
			$output = $output.$temp[$i];
		}
		return $output;
	}
}
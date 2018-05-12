<?php
	function calc($bytes){
		if($bytes > 1048576)
			return number_format(($bytes/pow(2, 20)), 2) . " Mb";
		elseif($bytes > 1024)
			return number_format(($bytes/pow(2, 20)), 2) . " Kb";
		else
			return $bytes . "b";
	}
?>
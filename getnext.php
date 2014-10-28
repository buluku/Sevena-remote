<?php
	$current = $_GET['current'];
	
	//current is of the form "images/<n>/<l>.png"
	//where <n> the number of the alphabet and
	//<l> is the letter
	//the function will return the similar string where l is incremented by 1.
	$next = $current;
	$e = explode("/", $current);
	$n = (int) $e[1]; //the current number of the alphabet
		
	$found = false;
	while (!$found) {
		$n++;
		if ($n > 7) $n = 1;
		$e[1] = $n;
		$next = implode("/", $e);
		$found = file_exists($next);
	};
	
	echo "$next";

?>
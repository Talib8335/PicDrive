<?php
	
	$pattern = "GA0a!b1|cBdN@efg2hCiH3`jkD#lP4OmM%n^JVo\Q5pRE_<q=)SIK9rs6&tT*uUF,L-(vZ/7w~Wx+8yX>zY";

	$length = strlen($pattern)-1;

	$i;
	$password = [];

	for($i=0;$i<8;$i++)
	{
		$indexing_number = rand(0,$length);
		$password[] = $pattern[$indexing_number];

	}

	echo implode($password);





?>
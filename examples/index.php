<?php

require_once '../vendor/autoload.php';

use Darraghb\Bottler\Bottler;

$bottler = new Bottler(
	['unit' => 'seconds', 
	'fileName' => __FILE__]);

$bottler->staticPerformance('mySlowTest', 20, 5000);


function myTest()
{
	$ans = '';
	for ($i=0; $i < 1000; $i++) { 
		$ans = $i;
	}

	return $ans;
}


function mySlowTest($start= false, $loop = false)
{
	$ans = '';
	for ($i=0; $i < $loop; $i++) { 
		$ans = $i;
	}
}
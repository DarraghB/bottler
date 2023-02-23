<?php

require_once '../vendor/autoload.php';

use Darraghb\Bottler\Bottler;

class Test 
{

pulic function __construct()
{
	$bottler = new Bottler(
	['unit' => 'seconds', 
	'fileName' => __FILE__],
	'this' => $this);
}

function myTest()
{
	$bottler->performance('mySlowTest', 20, 500000);
}


function mySlowTest($start= false, $loop = false)
{
	$ans = '';
	for ($i=0; $i < $loop; $i++) { 
		$ans = $i;
	}
}

}
<?php

require_once '../vendor/autoload.php';

use Darraghb\Bottler\Bottler;

class Test 
{

function __construct()
{
	$this->bottler = new Bottler(
	['unit' => 'seconds', 
	'fileName' => __FILE__,
	'this' => $this]);

	$bottler = $this->bottler;
}

public function myTest()
{
	$this->bottler->performance('mySlowTestOOP', 20, 500000);
}


public function mySlowTestOOP($start= false, $loop = false)
{
	$ans = '';
	for ($i=0; $i < $loop; $i++) { 
		$ans = $i;
	}
}

}

$test = new Test();
echo $test->myTest();
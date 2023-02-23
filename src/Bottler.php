<?php

namespace Darraghb\Bottler;

class Bottler{

	protected $name;
	protected $unit;
	protected $fileName;

function __construct($args){

	$this->unit = $args['unit'] ?? 'seconds';
	$this->fileName = $args['fileName'];
	$this->origClass = $args['this'] ?? null;

	require_once $this->fileName;

}

public function staticPerformance($functionName = null)
{
	if(!isset($functionName)){
		echo "You must specify a function name!";
		die();
	}
	try{

	//remove function name
	$args = func_get_args();
	array_shift($args);
		
	$start = microtime(true);

	call_user_func_array($functionName, $args);

	$end = microtime(true);

	return $this->calculateTime($end, $start, $functionName);

	}catch(Exception $e){
		$e->getMessage();
	}
	
}

public function performance($functionName = null)
{
	if(!isset($functionName)){
		echo "You must specify a function name!";
		die();
	}
	try{

	//remove function name

	$args = func_get_args();
	array_shift($args);

	$start = microtime(true);
    $reflection = new \ReflectionClass($this->origClass);

	call_user_func_array([$reflection->newInstanceWithoutConstructor(), $functionName], $args);

	$end = microtime(true);

	return $this->calculateTime($end, $start, $functionName);

	}catch(Exception $e){
		$e->getMessage();
	}
	
}

private function calculateTime($end, $start, $functionName = false)
{

	switch ($this->unit) {
		case 'seconds':
			echo $functionName . ' takes '.(round($end - $start, 5)).' seconds! <br>'.PHP_EOL;
			break;
		case 'nanoseconds':
			echo $functionName . ' takes '.(round($end - $start, 5) * 10000).' nanoseconds! <br>'.PHP_EOL;
			break;
		
		default:
			echo $functionName . ' takes '.(round($end - $start, 5) * 1000).' seconds! <br>'.PHP_EOL;
			break;
	}

}

}
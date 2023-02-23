# Bottler 8-)
### A package to time test the performance of functions 

## Usage
``` php

$bottler->staticPerformance('methodName', 'arg1', 'arg2');

```
### Setup

``` bash
composer require darraghb/bottler
```

## Initialize bottler 
``` php
require_once '../vendor/autoload.php';

use Darraghb\Bottler\Bottler;

#Initialize bottler and specify the unit of measurement (seconds|nanoseconds)

$bottler = new Bottler(
	['unit' => 'seconds', 
	'fileName' => __FILE__]);

```

## Run a test on a static method 
``` php
$bottler->staticPerformance('mySlowTest', 20, 5000);

function mySlowTest($start= false, $loop = false)
{
	$ans = '';
	for ($i=0; $i < $loop; $i++) { 
		$ans = $i;
	}
}
```
## Run a test on a method within a class
### make sure to include $this in the initializer
``` php
$bottler = new Bottler(
	['unit' => 'seconds', 
	'fileName' => __FILE__,
	'this' => $this]);

$bottler->performance('methodName', 20, 5000);

```
## Output
### The package will output the function name and the number of seconds it takes to run.


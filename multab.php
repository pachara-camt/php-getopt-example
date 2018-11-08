<?php
	// extract options
	$opts = getopt("s:e:h",
		['start:', 'end:', 'help'],
		$optind
	);
	
	// extract arguments
	$args = array_slice($_SERVER['argv'], $optind);
	
	// merge short name to long name
	if(!array_key_exists('start', $opts) && array_key_exists('s', $opts))
		$opts['start'] = $opts['s'];
	
	if(!array_key_exists('end', $opts) && array_key_exists('e', $opts))
		$opts['end'] = $opts['e'];
	
	if(!array_key_exists('help', $opts) && array_key_exists('h', $opts))
		$opts['help'] = $opts['h'];
	
	// set default value to options;
	$opts['start'] = (array_key_exists('start', $opts))? (int)$opts['start'] : 1;
	$opts['end'] = (array_key_exists('end', $opts))? (int)$opts['end'] : 12;
	
	// options and arugments validation
	$invalid = false;
	if(
		!array_key_exists('help', $opts) && (    // just check if no 'help' options
			(count($args) != 1) ||               // checking number of arguments
			((int)$args[0] < 2) ||               // checking valid argument value
			($opts['start'] > $opts['end']) ||   // checking start and end
			false                                // easy for extend
		)
	) $invalid = true;
	
	// if argument invalid print
	if($invalid) {
		// use $_SERVER['argv'][0] for program name
		echo <<<EOT
Invalid arguments!!!
Usage the following command for help.
{$_SERVER['argv'][0]} -h
EOT;
		exit(-1);
	}
	
	// print manual if needed
	if(array_key_exists('help', $opts)) {
		// use $_SERVER['argv'][0] for program name
		echo <<<EOT

Usage: {$_SERVER['argv'][0]} [options] [--] n

Options:
  -s|--start=start_from  starting multiplier, default 1.
  -e|--end=end_with      ending multiplier, default 12.
  -h|--help              print this manual.

Arguments:
  n                      maximum number of multiplication table.

EOT;
		exit(0);
	}
	
	// real process
	$n = (int)$args[0];
	for($j = $opts['start']; $j < $opts['end']; $j++) {
		for($i = 2; $i <= $n; $i++) {
			printf("%5d", $i * $j);
		}
		printf("\n");
	}

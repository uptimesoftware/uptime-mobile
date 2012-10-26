<?php

// Remote Custom Script
// This script just opens a TCP socket to the agent and writes and reads some text output to/from the agent
// Written in PHP to get around any Netcat antivirus false-positive issues
// Joel Pereira

function agentcmdold($host, $port, $cmd, $timeout = 55) {
	$errorno = '';
	$errorstr = '';
	$rv = '';

	try {
		$resource = fsockopen($host, $port, $errorno, $errorstr, $timeout);
		//Attempt to establish a connection to agent on port 9998. On error, place the error number into $errorno, and a string response to $errorstr. Timeout after 10 seconds.
		if (!$resource) {
			//fsockopen failed
			echo "No connection established. Error: " . $errorstr . "[" . $errorno . "]\n";
		} else {
			// successfully opened a socket
			fwrite($resource, $cmd);
			//while there is data to read from $resource…
			while (!feof($resource)) {
				//read the data, 1024 bytes at a time and echo it out to stdout
				$rv .= fgets($resource, 1024);
			}
			//no more data to read, close the resource
			fclose($resource);
		}
	} catch (Exception $e) {
		print "Error:";
		var_dump($e->getMessage());
	}
	return $rv;
}
function agentcmd($url) {
	try {
		$ch = curl_init ($url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);	// return the data instead of just displaying it to the screen
		$output = curl_exec ($ch);
	} catch (Exception $e) {
		print "Error:";
		var_dump($e->getMessage());
	}
	return $output;
}?>
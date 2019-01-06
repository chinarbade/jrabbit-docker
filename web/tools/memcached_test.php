<?php

	echo '<h1>Memcached Connection Test - START</h1>';

	$MEMCACHED_HOST = 'jrabbit-memcached';
	$MEMCACHED_PORT = '11211';

	echo '<p>Obtaining connection to Memcached Docker Container<br><br>'.
	'<h3>Connection Params</h3><br>'.
	"<b>Memcached Host :</b> $MEMCACHED_HOST : $MEMCACHED_PORT<br>".
	'<br></p>';
	try{
		echo '<p>Adding Docker Container "jrabbit-memcached" to Memcached<br><br>';
		$memcached = new Memcached();
		$memcached->addServer('jrabbit-memcached', 11211);
		echo 'Done...</p>';
		echo '<p>Setting test-key -> test-val pair in Memcached<br><br>';
		$memcached->set('test-key', 'test-val', 86400);
		echo 'Done...</p>';
		//Allow some time for the value to get set in Memcached before getting it
		sleep(2);
		$testVal = $memcached->get('test-key');
		echo "<p>Got \"{$testVal}\" value for \"test-key\" from Memcached<br><br>";
	}catch(Exception $ex){
		echo "<p><h3>EXCEPTION MSG : </h3>".$ex->getMessage().'<br><br>';
		echo "<h3>EXCEPTION CODE : </h3>".$ex->getCode().'</p>';
	}

	echo '<h1>Memcached Connection Test - END</h1>';
?>
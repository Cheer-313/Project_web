<?php 
	require_once('db.php');
	/*$classname = 'Lap trinh web t4c3';
	$subject = 'Lap trinh web';
	$classroom = 'C401';
	$email = 'hhung@gmail.com';
	$chooseImage = '/img.png';*/
	/*$email = 'hhung@gmail.com';

	$result = var_dump(load_data_home('blightmedison313@gmail.com', 0));
	$s = load_data_home($email, get_permission($email));
	while ( $row = $s->fetch_assoc()) {
		# code...
		print_r($row);
	}*/
	$name = "Nguen Van A";
	echo <<<EOT
	My name is "$name". I am printing some food.
	Now, I am printing some food.
	This should print a capital 'A': \x41
	EOT;
 ?>
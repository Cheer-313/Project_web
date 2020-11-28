<?php 
	require_once('db.php');
	/*$classname = 'Lap trinh web t4c3';
	$subject = 'Lap trinh web';
	$classroom = 'C401';
	$email = 'hhung@gmail.com';
	$chooseImage = '/img.png';*/

	$data =login('hhung2', '123456');
	$_SESSION['data'] = $data;
	$data1 = $_SESSION['data'];
	$result = var_dump($data1['hoten']);
	return $result;
 ?>
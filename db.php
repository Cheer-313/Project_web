<?php 
	define('HOST', '127.0.0.1');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'web');

	function open_db(){
		$conn = new mysqli(HOST, USER, PASS, DB);
		if($conn->connect_error){
			die('Connect error: '.$conn->connect_error);
		}
		return $conn;
	}

	function login($username, $password){
		$sql = "select * from user where username = ?";
		$conn = open_db();

		$stm = $conn->prepare($sql);
		$stm->bind_param('s', $username);

		if(!$stm->execute()){
			return null;
		}

		$result =  $stm->get_result();
		if ($result->num_rows == 0) {
			return null;
		}
		$data = $result->fetch_assoc();

		$hashed_password = $data['password'];
		if(!password_verify("$password", "$hashed_password")){
			return null;
		}
		else return $data;
	}

	function is_email_exists($email){
		$sql = 'select username from user where email = ?';
		$conn = open_db();

		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$email);

		if(!$stm->execute()){
			die ('Error: '.$stm->error);
		}

		$result = $stm->get_result();
		if($result->num_rows > 0){
			return true;
		}
		else return false;
	}

	function is_username_exists($username){
		$sql = 'select username from user where username = ?';
		$conn = open_db();

		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$username);

		if(!$stm->execute()){
			die ('Error: '.$stm->error);
		}

		$result = $stm->get_result();
		if($result->num_rows > 0){
			return true;
		}
		else return false;
	}

	function signUp($username, $password, $fullname, $dateofbirth, $email, $phone){
		if(is_email_exists($email)){
			return array('code' => 1, 'error' => 'Email exists');
		}

		if(is_username_exists_exists($username)){
			return array('code' => 3, 'error' => 'Username exists');
		}

		$permission = 2;
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$rand = random_int(0, 1000);
		$token = md5($username.'+'.$rand);
		$sql = 'INSERT INTO user(username, password, hoten, ngaysinh, email, sdt, token, permission) VALUES (?,?,?,?,?,?,?,?)';

		$conn = open_db();
		$stm = $conn->prepare($sql);
		$stm->bind_param('sssssssi',$username, $hash, $fullname, $dateofbirth, $email, $phone, $token, $permission);

		if(!$stm->execute()){
			return array('code' => 2, 'error' => 'Cant Execute');
		}

		return array('code' => 0, 'error' => 'Succesful');
	}
 ?>
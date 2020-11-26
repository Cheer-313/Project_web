<?php
	function database(){
	$conn= new mysqli(SERVER,USER,PASS,DB);
	if($conn->connect_error){
		die(" ko the ket noi den database".$conn->connect_error);
		}
		return $conn;
	}
	function redirect($page){
		header("Location: ".HOST.'/'.$page);
	}//chuyen trang 

	function getProduce($db){
		$sql= "select * from product";
		$result = $db->query($sql);
		return $result;
	}

	function addProduct($id,$name,$price,$image,$decription){
		
	    $sql= "insert into product values(?,?,?,?,?)";
	     $db=database();
	    $sta= $db->prepare($sql);
	    $sta->bind_param('ssiss',$id,$name,$price,$image,$decription);// trước là kiểu dữ liệu sau là các biến tượng trưng
	    $result= $sta->execute();
	    $sta->close();
	    return $result;
	}
	function getProductByID($id){
		$db= database();
		$sql= "select * from product where id=?";
		$sta=$db->prepare($sql);
		$sta->bind_param('s',$id);// trước là kiểu dữ liệu sau là các biến tượng trưng
	    $status= $sta->execute();
	    if($status){


	   		 $data=$sta->get_result();
	    	return $data;
	    }
	    else{
	    $sta->close();
	    return null;
	}
	}
?>
<?php 
	
	require '../models/user.php';

	if ($_SERVER["REQUEST_METHOD"] === "GET") {

		$key = sanitize($_GET['email']);
		$res = search($key);
		
		$arr1 = array();
		while($row = mysqli_fetch_assoc($res)) {
			array_push($arr1, array("email" => $row['email'],));
		}
	
		if(empty($arr1)){
            echo 'user not found';
           
        } else{
            header("Location: ../views/forget_password_view.php");

        }
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
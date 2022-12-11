<?php 


function search ($email) {

	$conn = mysqli_connect("localhost", "root", "", "rms_restaurant");
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}

	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, "SELECT id, email, password FROM restaurants WHERE email like ?");
	$email = "%" . $email . "%";
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	return $result;
}

?>
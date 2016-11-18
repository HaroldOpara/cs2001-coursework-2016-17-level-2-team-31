<?php
	$con=mysqli_connect("localhost","my_user","my_password","my_db");


	$password = $_POST["password"];	
	$username = $_POST["username"];
	
	$statement = mysqli_prepare($con, "SELECT * FROM User WHERE username = ? AND password = ?");
	mysql_stmt_bind_param($statement, "ss", $username, $password);
	mysql_stmt_execute($statement);

	mysql_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $name, $username, $password);
	
	$user = array();

	while(mysqli_stmt_fetch($statement))
{
	$user[name] = $name;
	$user[username] = $username;
	$user[password] = $password;
}

	echo json_encode($user);

	mysqli_stmt_close($statement);


	mysqli_close($con);
?>
	
<?php
//include base conroller (includes configs,$user variable, constants, convinient functions and starts php session)
include_once('controller.php');

//don not cache page
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

$page_title = "Login";

//if user is already logged in, redierect them
if(sessionHasAuthenticatedUser())
{
  //redirect to dashboard page
	header("Location: dashboard.php");
}

//assertion: user is not authenticated.

if(!empty($_POST)){
	//assertion: user submitted the login form

  //connect to db
  $conn = new mysqli($db_host_name, $db_username, $db_pass, $db_name);

  // check connection
  if ($conn->connect_error) {
    //thow error and stop php script execution
    die("Connection failed: " . $conn->connect_error);
  }

	//set prefered connection encoding
	$conn -> set_charset('utf8');

  $email     = $_POST["email"]??NULL;
  $pass      = $_POST["password"]??NULL;
	$user_type = $_POST["user_type"]??NULL;

	// The first argument to bind_param may be one of four types for each param:
	// 	i - integer
	// 	d - double
	// 	s - string
	// 	b - BLOB

	switch ($user_type) {
			case 'administrator':
			$role = 'administrator';
			break;
			case 'researcher':
			$role = 'researcher';
			break;
			case 'reviewer':
			$role = 'reviewer';
			break;
			case 'editor':
			$role = 'editor';
			break;
		  default:
			$role = 'administrator';
			break;
	}

 //NOTE: we skip additional server side input validation and delegate it to the DB, html5 form validation is used on client side.

 $statement = $conn -> prepare("SELECT usr.*,role.id as role_id FROM `user` AS usr,`$role` as role WHERE `email` = ? AND `password` = ? AND usr.id = role.user_id");
 $statement -> bind_param("ss", $email, $pass);
 //run the sql
 $statement -> execute();
 $query_result = $statement -> get_result();

 if($query_result -> num_rows > 0){
	 //assertion: user is authenticated
   //get the first row in the result as an associative array
   $account = $query_result -> fetch_assoc();
   //start keeping track of the user (log user into the application)
   addUserToSession($account, $role);
   //redirect to dashboard page
   header("Location: dashboard.php?tab=1");
 }else{
   //add one time alert to session
   addErrorAlertToSession("Invalid email/password combination for $user_type.");
 }
 $statement -> close();

 //close db connection
 $conn->close();
}

?>

<?php
//include base conroller (includes configs,$user variable, constants, convinient functions and starts php session)
include_once('controller.php');

//don not cache page
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

//if user is not already logged in
if(!sessionHasAuthenticatedUser())
{
  //redirect to login page
	header("Location: index.php");
}

$page_title = ucfirst($user['role'])." Dashboard";

//assertion: user is authenticated.

//connect to db
$conn = new mysqli($db_host_name, $db_username, $db_pass, $db_name);

// check connection
if ($conn->connect_error) {
	//thow error and stop php script execution
	die("Connection failed: " . $conn->connect_error);
}

///assertion: user is authorized to perform this action.

//set prefered connection encoding
$conn -> set_charset('utf8');

//user is trying to perform some action.
if(!empty($_POST)){

	//check to see if user is autorized to perform this post action
	if(!authorized($_POST, $user['role'])){
		//assertion: user is not authorized
		header('HTTP/1.0 403 Forbidden');
		die('You are not autorized to perform this action.');
	}

	// The first argument to bind_param may be one of four types for each param:
	// 	i - integer
	// 	d - double
	// 	s - string
	// 	b - BLOB

	$user_id = $user['data']['id'];
	$pid     = $_POST["paper_id"]??NULL;
	$comment = $_POST["comment"]??NULL;
	$table   = "paper_{$user['role']}";
	$col_fk  = "{$user['role']}_id";

	//check to see if the user was assigned to the paper.
	$statement = $conn -> prepare("SELECT * FROM  `$table` WHERE `paper_id` = ?  AND `$col_fk` = ?");
	$statement -> bind_param("ii", $pid, $user['data']['role_id']);
	$statement -> execute();
	if ($statement -> get_result() -> num_rows < 1) {
		$statement -> close();
		$conn -> close();
		//assertion: user is not assigned
		header('HTTP/1.0 403 Forbidden');
		die("You are not assigned to this resource.");
	}

	//assertion: user is assigned to resource.

	$statement = $conn -> prepare("INSERT INTO `comment`(`user_id`, `paper_id`,`comment`) VALUES (?, ?, ?)");
	$statement -> bind_param("iis", $user_id, $pid, $comment);
	//run the sql
	if($statement -> execute() === TRUE){
		//add one time alert to session
		addSuccessAlertToSession("Comment added to paper by. ". ucfirst($user['role']));
	}else{
		//add one time alert to session
		addErrorAlertToSession("Unable to add comment to paper. {$conn->error}");
	}
	$statement -> close();
	doExitRedirect("paper-comments.php?paper_id=".$pid, $conn);

}

if(!empty($_GET['paper_id']??'')){
	$pid = $_GET['paper_id'];
	$statement = $conn -> prepare("SELECT * FROM  `paper` WHERE `id` = ?");
	$statement -> bind_param("i", $pid);
	$statement -> execute();
	$paper = $statement -> get_result() -> fetch_assoc();
	if(isset($paper)){
		//fetch comments and attach user role ids
		$comments = $conn -> query("SELECT c.comment,c.created_at,u.name,r.id AS reviewer_id,e.id AS editor_id
		FROM `comment` AS c
		INNER JOIN user AS u ON c.paper_id = {$paper['id']} AND u.id = c.user_id
		LEFT JOIN reviewer AS r ON u.id = r.user_id
		LEFT JOIN editor AS e ON u.id = e.user_id ORDER BY c.created_at DESC");
	}
	$statement -> close();
}
//close db connection
$conn -> close();
?>

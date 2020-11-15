<?php

	//don not cache page
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
  //destroy user session and cookies
	session_start();
	session_unset();//remove sesssion variables
	session_destroy();  //destroy session
	header("Location: index.php");//redirect to index page

?>

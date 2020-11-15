<?php
		// server should keep session data for AT LEAST 24 hour
		ini_set('session.gc_maxlifetime', 3600 *24);
		// each client should remember their session id for EXACTLY 24 hour
		session_set_cookie_params(3600 * 24);
		session_start();
		$stime = $_SERVER["REQUEST_TIME"];
		/**
		 * for a 24 hour timeout, specified in seconds
		 */
		$stimeout_duration = 3600 * 24;
		
		/**
		 * Here we look for the user"s LAST_ACTIVITY timestamp. If
		 * it"s set and indicates our $stimeout_duration has passed, 
		 * blow away any previous $_SESSION data and start a new one.
		 */
		if (isset($_SESSION["LAST_ACTIVITY"]) && ($stime - $_SESSION["LAST_ACTIVITY"]) > $stimeout_duration) {
		  session_unset();     
		  session_destroy();
		  session_start();    
		}
			
		/**
		 * Finally, update LAST_ACTIVITY so that our timeout 
		 * is based on it and not the user"s login time.
		 */
		$_SESSION["LAST_ACTIVITY"] = $stime;
?>
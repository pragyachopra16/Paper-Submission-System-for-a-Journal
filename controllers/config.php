<?php

//website config file

$DATABASE_URL = parse_url(getenv("JAWSDB_URL"));
if(!array_key_exists("host", $DATABASE_URL)){
  $DATABASE_URL = null;
}



$db_host_name = $DATABASE_URL?$DATABASE_URL["host"]:"localhost";
$db_name      = $DATABASE_URL?ltrim($DATABASE_URL["path"], "/"):"uofw_journal";
$db_username  = $DATABASE_URL?$DATABASE_URL["user"]:"root";
$db_pass      = $DATABASE_URL?$DATABASE_URL["pass"]:"open1234";


$app_name       = "UofW Journal";
$upload_path    = "img/uploads/";
$notify_email   = "aberefajames@yahoo.com";

?>

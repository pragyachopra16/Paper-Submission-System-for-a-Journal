<?php
include_once("start_session.php");
include_once("config.php");


//request methods include
//POST: store data request, results in an Insert operation
//GET: fetch data request, results in a retrive operation
//PUT: update data request, result in a update operation
//DELETE: delete data request, results in a delete operation
//specify a request method using _method(not required for GET and normal POST request)
//in your forms so that the server knows how to respond. See crud controllers for example.

if(empty($_POST)){
  $request_method = 'GET';
}else if(isset($_POST['_method']) && strtolower($_POST['_method']) == 'put'){
  $request_method = 'PUT';
}else if(isset($_POST['_method']) && strtolower($_POST['_method']) == 'delete'){
$request_method = 'DELETE';
}else{
  $request_method = 'POST';
}


//process/cleanup post data
foreach ($_POST as $key => $value) {
  $data = is_string($value) ? trim($value) : $value; //remove trailing spaces from form data
  $data = $data == '' ? NULL : $data; // convert all empty fields to NULL
  $_POST[$key] = $data;
}


$user = getAuthenticatedUser();

//here we define certain actions each logged in user can perform.
$autorizations = [
  'administrator' => ['create_user','delete_user','assign_editor','unassign_editor'],
  'researcher' => ['create_paper'],
  'editor' => ['assign_reviewer','unassign_reviewer','update_paper','post_comment'],
  'reviewer' => ['post_comment']
];


function doExitRedirect($location, $conn = NULL){
  //close any open db connection
  if(isset($conn)) $conn -> close();
  //redirect
  header("Location: $location");
  //stop execution of script
  exit();
}

function authorized(Array $post, $role){
  global $autorizations;
  return isset($autorizations[$role]) && in_array($post['action']??'', $autorizations[$role]);
}

function addSuccessAlertToSession($success_msg){
   if(isset($_SESSION["success"])){
     array_push($_SESSION["success"], $success_msg);
   }else{
     //add success message to session
     $_SESSION["success"] = [$success_msg];
   }
}

function addErrorAlertToSession($success_msg){
   if(isset($_SESSION["errors"])){
     array_push($_SESSION["errors"], $success_msg);
   }else{
     //add success message to session
     $_SESSION["errors"] = [$success_msg];
   }
}

//returns an Array or NULL
function getAndDeleteSessionSuccessAlerts(){
  $alerts = $_SESSION["success"]??NULL;
  $_SESSION["success"] = NULL;
  return $alerts;
}

//returns an Array or NULL
function getAndDeleteSessionErrorAlerts(){
  $alerts = $_SESSION["errors"]??NULL;
  $_SESSION["errors"] = NULL;
  return $alerts;
}

function sessionHasAuthenticatedUser(){
  if(isset($_SESSION["user"])) return true;

  return false;
}

function addUserToSession($data, $role){
  $_SESSION["user"]['data'] = $data;
  $_SESSION["user"]['role'] = $role;
}

function getAuthenticatedUser(){
  if(sessionHasAuthenticatedUser()){
    return $_SESSION["user"];
  }
  return NULL;
}

?>

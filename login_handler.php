<?php
session_start();
require_once 'KLogger.php';
$logger = new KLogger ( "log.txt" , KLogger::WARN );

$username = $_POST['login'];
$password = $_POST['password'];

// $valid = $dao->isValidUser($username, $password);

$valid = false;
if ($username == "conradkennington@gmail.com" && $password == "abc123") {
  $valid = true;
}

$logger->LogDebug("Clearing the session array");
$_SESSION = array();
if ($valid) {
   $_SESSION['logged_in'] = true;
   $logger->LogInfo("User login successful [{$username}]");
   header("Location: http://cs401/granted.php");
   exit;
} else {
   $logger->LogWarn("User login failed [{$username}]");

   $_SESSION['message'] = "Invalid username or password";
   header("Location: http://cs401/login.php");
   exit;
}
<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include "../functions.php";
  include "../global.php";

  session_start();

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $accNumber = $_POST["accountNumber"];
    if(isClientExist($accNumber, $clientDB)) {
      updateCleintInformation($clientDB, $accNumber,
      $_POST["fname"], $_POST["lname"], $_POST["age"],
      $_POST["address"], $_POST["phone"], $_POST["accountBalance"]);

      operationTrue("../updateClient.php");
    } else {
      operationFalse("../updateClient.php");
    }
  }
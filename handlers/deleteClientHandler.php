<?php 

  include "../functions.php";
  include "../global.php";

  session_start();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accNumber = $_POST['accNumber'];

    if(isClientExist($accNumber, $clientDB)) {
      deleteClient($accNumber, $clientDB);
      operationTrue("../client/deleteClient.php");
    } else {
      operationFalse("../client/deleteClient.php");
    }
  }
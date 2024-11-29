<?php
include "classes/clsBankClient.php";
include "classes/clsBankUser.php";
// include "global.php";
function convertObjectToRecord($object, $delemeter = "//"): string
{
  $record = $object->getAccountNumber() . $delemeter;
  $record .= $object->getFName() . $delemeter;
  $record .= $object->getLName() . $delemeter;
  $record .= $object->getAge() . $delemeter;
  $record .= $object->getAddress() . $delemeter;
  $record .= $object->getPhone() . $delemeter;
  $record .= $object->getAccountBalance();

  return $record;
}

function addClientToDB($record, $DBPath)
{
  $file = fopen($DBPath, "a");

  if ($file) {
    fwrite($file, $record . "\n");
    fclose($file);
  }
}

function convertRecordToObject($record)
{
  $arr = explode("//", trim($record));

  $object = new client(
    $arr[1],
    $arr[2],
    $arr[3],
    $arr[4],
    $arr[5],
    $arr[0],
    $arr[6]
  );

  return $object;
}

function loadDataFromDBToArray($DBPath)
{
  $arr = [];

  $file = fopen($DBPath, "r");

  if ($file) {
    while (($line = fgets($file)) !== false) {
      array_push($arr, convertRecordToObject($line));
    }
    fclose($file);
  }

  return $arr;
}

function isClientExist($accNumber, $DBPath)
{
  $clients = loadDataFromDBToArray($DBPath);

  foreach ($clients as $client) {
    if ($client->getAccountNumber() == $accNumber) {
      return true;
    }
  }
  return false;
}

function operationTrue($redirectPath)
{
  $_SESSION['popStatus'] = 'true';
  header("Location: " . $redirectPath);
  exit();
}

function operationFalse($redirectPath)
{
  $_SESSION['popStatus'] = 'false';
  header("Location: " . $redirectPath);
  exit();
}

function operationDefault()
{
  $_SESSION['popStatus'] = 'idel';
}

function checkOperationStatus()
{
  if ($_SESSION['popStatus'] == 'true') {
    echo "<script>
    window.onload = function() { 
      showSuccessModal();
    };
    </script>";
  } else if ($_SESSION['popStatus'] == 'false') {
    echo "<script>
    window.onload = function() { 
      showFailureModal();
    };
    </script>";
  }
}

function updateDB($arr, $DBPath)
{
  $file = fopen($DBPath, "w");

  if ($file) {
    foreach ($arr as $item) {
      fwrite($file, convertObjectToRecord($item) . "\n");
    }
    fclose($file);
  }
}

function deleteClient($accNumber, $DBPath)
{
  $arr = loadDataFromDBToArray($DBPath);
  $newArr = [];

  foreach ($arr as $item) {
    if ($item->getAccountNumber() != $accNumber) {
      array_push($newArr, $item);
    }
  }

  updateDB($newArr, $DBPath);
}

function getAllMatch(&$result, $arr, $fullName, $accountNumber)
{
  $counter = 0;
  foreach ($arr as $item) {
    if ($item->getAccountNumber() == $accountNumber || $item->fullName() == $fullName) {
      $counter++;
      array_push($result, $item);
    }
  }
}

function displayClient($arr, $mode = "Box")
{
  if ($mode == "Box") {
    if (count($arr) > 0) {
      foreach ($arr as $item) {
        $fullName = $item->fullName();
        $age = $item->getAge();
        $address = $item->getAddress();
        $phone = $item->getPhone();
        $accNumber = $item->getAccountNumber();
        $accBalance = $item->getAccountBalance();

        echo <<<"clientCard"
      <div class="clientCard">
        <h3>Client</h3>
        <span>Name: $fullName</span>
        <span>Age: $age</span>
        <span>Address: $address</span>
        <span>Phone: $phone</span>
        <span>Account Number: $accNumber</span>
        <span>Account Balance: $accBalance</span>
      </div>
      clientCard;
      }
    } else {
      echo "No Matching!";
    }
  } else if ($mode == "Table") {
    foreach ($arr as $item) {
      $fullName = $item->fullName();
      $age = $item->getAge();
      $address = $item->getAddress();
      $phone = $item->getPhone();
      $accNumber = $item->getAccountNumber();
      $accBalance = $item->getAccountBalance();

      echo <<<"tableRow"
      <tr class="clientCard">
      <td>$accNumber</td>
      <td>$fullName</td>
      <td>$age</td>
      <td>$address</td>
      <td>$phone</td>
      <td>$accBalance</td>
      </tr>
      tableRow;
    }
  }
}

function updateCleintInformation($DB, $accNumber, $fName, $lName, $age, $address, $phone, $accBalance)
{
  $clients = loadDataFromDBToArray($DB);

  foreach ($clients as &$c) {
    if ($c->getAccountNumber() == $accNumber) {
      $c->setFName($fName);
      $c->setLName($lName);
      $c->setAge($age);
      $c->setAddress($address);
      $c->setPhone($phone);
      $c->setAccountBalance($accBalance);
      updateDB($clients, $DB);
      return;
    }
  }
}

function encryption($data)
{
  $resutl = '';

  for ($i = 0; $i < strlen($data); $i++) {
    $resutl .= chr(ord($data[$i]) + 5);
  }

  return $resutl;
}

function dencryption($data)
{
  $resutl = '';

  for ($i = 0; $i < strlen($data); $i++) {
    $resutl .= chr(ord($data[$i]) - 5);
  }

  return $resutl;
}


function convertUserRecordToObject($record)
{
  $arr = explode("//", trim($record));

  $object = new user($arr[0], $arr[1], $arr[2]);

  return $object;
}

function loadUserDataFromDBToArray($DBPath)
{
  $arr = [];

  $file = fopen($DBPath, "r");

  if ($file) {
    while (($line = fgets($file)) !== false) {
      array_push($arr, convertUserRecordToObject($line));
    }
    fclose($file);
  }

  return $arr;
}

function displayUsers($DBPath)
{
  $users = loadUserDataFromDBToArray($DBPath);

  foreach ($users as &$user) {
    echo $user->getUsername() . '<br>';
    echo $user->getPassowrd() . '<br>';
    echo $user->getPermission() . '<br>';
  }
}

function isUserExist($username, $DBPath, $password = 'null', &$currUser = null)
{
  $users = loadUserDataFromDBToArray($DBPath);

  foreach ($users as &$user) {
    if ($password != 'null') {
      if ($user->getUsername() == $username && $user->getPassword() == $password) {
        $currUser = $user;
        return true;
      }
    } else {
      if ($user->getUsername() == $username) {
        return true;
      }
    }
  }

  return false;
}

function isUsernameUsed($DBPath, $username)
{
  $users = loadUserDataFromDBToArray($DBPath);

  foreach ($users as &$user) {
    if ($user->getUsername() === $username) {
      return true;
    }
  }

  return false;
}

function addUserToDB($record, $DBPath)
{
  $file = fopen($DBPath, "a");

  if ($file) {
    fwrite($file, $record . "\n");
    fclose($file);
  }
}

function finalyPermitionCode($perrArr)
{
  $permCode = '';

  if (strtolower($perrArr['addClient']) == 'true') {
    $permCode .= '1';
  } else {
    $permCode .= '0';
  }

  if (strtolower($perrArr['deleteClient']) == 'true') {
    $permCode .= '1';
  } else {
    $permCode .= '0';
  }

  if (strtolower($perrArr['searchClient']) == 'true') {
    $permCode .= '1';
  } else {
    $permCode .= '0';
  }

  if (strtolower($perrArr['viewClient']) == 'true') {
    $permCode .= '1';
  } else {
    $permCode .= '0';
  }

  if (strtolower($perrArr['updateClient']) == 'true') {
    $permCode .= '1';
  } else {
    $permCode .= '0';
  }

  if (strtolower($perrArr['users']) == 'true') {
    $permCode .= '1';
  } else {
    $permCode .= '0';
  }

  return $permCode;
}

function convertUserObjectToRecord($object, $delemeter = "//"): string
{
  $record = $object->getUsername() . $delemeter;
  $record .= $object->getPassword() . $delemeter;
  $record .= $object->getPermission();

  return $record;
}

function updateDBU($arr, $DBPath)
{
  $file = fopen($DBPath, "w");

  if ($file) {
    foreach ($arr as $item) {
      fwrite($file, convertUserObjectToRecord($item) . "\n");
    }
    fclose($file);
  }
}

function deleteUser($username, $DBPath)
{
  $users = loadUserDataFromDBToArray($DBPath);
  $updateUsers = [];

  foreach ($users as &$user) {
    if ($user->getUsername() != $username) {
      array_push($updateUsers, $user);
    }
  }

  updateDBU($updateUsers, $DBPath);
}

function updateUserData($usersDB, $username, $password, $perrArr, $newPassword)
{
  if (isUserExist($username, $usersDB, $password)) {
    $users = loadUserDataFromDBToArray($usersDB);
    foreach ($users as &$user) {
      if ($user->getUsername() == $username && $user->getPassword() == $password) {
        $newPerrCode = finalyPermitionCode($perrArr);
        $user->setPassword($newPassword);
        $user->setPermission($newPerrCode);
        break;
      }
    }

    updateDBU($users, $usersDB);

    return true;
  }

  return false;
}
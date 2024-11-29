<?php
include "functions.php";

session_start();

if ($_SESSION['login'] != 'true') {
  header('Location: login.php');
}

checkOperationStatus();

operationDefault();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank Management System</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style/main.css">
  <style>
    .username {
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 10px 20px;
      background-color: #F44336;
      color: white;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="username">
    <?php
    $username = $_SESSION['username'];
    echo <<<grateUser
      Welcome: <span>$username</span>
    grateUser;
    ?>
  </div>
  <div class="container">
    <header>
      <h1>Bank Management System</h1>
    </header>
    <nav>
      <ul>
        <li><a href="clientManagment.php">Client Managment</a></li>
        <li><a href="userManagment.php">User Managment</a></li>
      </ul>
    </nav>
    <main>
      <h2>Welcome to the Bank Management System</h2>
      <p>Select an option from the menu to manage records.</p>
    </main>
    <footer>
      <p>&copy; 2024 Bank Management System</p>
    </footer>

  </div>
  <!-- Success Modal -->
  <div id="successModal" class="modal">
    <div class="modal-content success">
      <span class="close" onclick="closeSuccessModal()">&times;</span>
      <h2>Success!</h2>
      <p>Login Successfuly.</p>
    </div>
  </div>

  <script src="js/main.js"></script>
</body>

</html>
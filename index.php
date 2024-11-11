<?php
  session_start();
  $_SESSION['popStatus'] = 'idel';

?>

<!DOCTYPE html>
<html lang="en">
  <l>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
  </l>
<body>
    <div class="container">
      <header>
        <h1>Bank Management System</h1>
      </header>
      <nav>
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="addClient.php">Add Client</a></li>
          <li><a href="deleteClient.php">Delete Client</a></li>
          <li><a href="searchClient.php">Search On Client</a></li>
          <li><a href="viewClients.php">View All Clients</a></li>
          <li><a href="updateClient.php">Update Client</a></li>
        </ul>
      </nav>
      <main>
        <h2>Welcome to the Bank Management System</h2>
        <p>Select an option from the menu to manage client records.</p>
      </main>
      <footer>
        <p>&copy; 2024 Bank Management System</p>
      </footer>

      <a href="login.php">login</a>
    </div>

  <script src="js/main.js"></script>
</body>
</html>

<?php
  include "../functions.php";

  session_start();
  
  checkOperationStatus();

  operationDefault();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Client</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">
  </head>
  <body>
    <div class="container">
      <header>
        <h1>Delete Client</h1>
      </header>
      <nav>
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../clientManagment.php">Welcome Page</a></li>
          <li><a href="addClient.php">Add Client</a></li>
          <li><a class="active" href="deleteClient.php">Delete Client</a></li>
          <li><a href="searchClient.php">Search On Client</a></li>
          <li><a href="viewClients.php">View All Clients</a></li>
          <li><a href="updateClient.php">Update Client</a></li>
        </ul>
      </nav>
      <main>
        <h2>Delete Client</h2>
        <form action="../handlers/deleteClientHandler.php" method="POST">
          <label for="AccNumber">Client Account Number:</label>
          <input type="text" id="AccNumber" name="accNumber" required>

          <button type="submit">Delete Client</button>
        </form>
      </main>
      <footer>
        <p>&copy; 2024 Bank Management System</p>
      </footer>

      <!-- Success Modal -->
      <div id="successModal" class="modal">
        <div class="modal-content success">
          <span class="close" onclick="closeSuccessModal()">&times;</span>
          <h2>Success!</h2>
          <p>Client Deleted Successfly.</p>
        </div>
      </div>

      <!-- Failure Modal -->
      <div id="failureModal" class="modal">
        <div class="modal-content failure">
          <span class="close" onclick="closeFailureModal()">&times;</span>
          <h2>Failure!</h2>
          <p>The Account Number Is Not Exist!</p>
        </div>
      </div>
    </div>
    <script src="../js/main.js"></script>
  </body>
</html>

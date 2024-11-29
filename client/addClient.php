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
  <title>Add Client</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/main.css">
  <!-- <script>showSuccessModal();</script> -->
  </head>
  <body>
      <div class="container">
          <header>
              <h1>Add Client</h1>
          </header>
          <nav>
              <ul>
              <li><a href="../index.php">Home</a></li>
              <li><a href="../clientManagment.php">Welcome Page</a></li>
              <li><a class="active" href="addClient.php">Add Client</a></li>
              <li><a href="deleteClient.php">Delete Client</a></li>
              <li><a href="searchClient.php">Search On Client</a></li>
              <li><a href="viewClients.php">View All Clients</a></li>
              <li><a href="updateClient.php">Update Client</a></li>
              </ul>
          </nav>
          <main>
              <h2>Client Information</h2>
              
                <form action="../handlers/addClientHandler.php" method="POST" class="addClientForm">
                  <div class="grid">
                    <div>
                      <label for="fname">First Name:</label>
                      <input type="text" id="fname" name="fname" required>
                    </div>

                      <div>
                        <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" required>
                      </div>

                      <div>
                        <label for="age">Age:</label>
                        <input type="text" id="age" name="age" required>
                      </div>

                      <div>
                      <label for="address">Address:</label>
                      <input type="text" id="address" name="address" required>
                    </div>

                      <div>
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" required>
                      </div>

                      <div>
                        <label for="accNumber">Account Number:</label>
                        <input type="text" id="accNumber" name="accountNumber" required>
                      </div>

                    <div>
                      <label for="accBalance">Account Balance:</label>
                      <input type="text" id="accBalance" name="accountBalance" required>
                    </div>

                    </div>
                    <button type="submit">Add Client</button>
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
          <p>Client Add Successfly.</p>
        </div>
      </div>

      <!-- Failure Modal -->
      <div id="failureModal" class="modal">
        <div class="modal-content failure">
          <span class="close" onclick="closeFailureModal()">&times;</span>
          <h2>Failure!</h2>
          <p>The Client Account Number Is Already Exist.
            <br>Try Another Account Number!</p>
        </div>
      </div>
      </div>
      <script src="../js/main.js"></script>
  </body>
</html>

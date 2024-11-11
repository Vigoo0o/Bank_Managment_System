<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // include "classes/clsBankClient.php";
  include "functions.php";
  include "global.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>View All Clients</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="style/main.css">
      <style>
          table {
              width: 100%;
              border-collapse: collapse;
              margin-top: 20px;
          }

          th, td {
              padding: 10px;
              text-align: left;
              border-bottom: 1px solid #ccc;
          }

          th {
              background: #35424a;
              color: #ffffff;
          }

          tr {
            transition: .2s;
          }

          tr:hover {
              background: #f2f2f2;
          }
      </style>
  </head>
  <body>
    <div class="container">
        <header>
            <h1>View All Clients</h1>
        </header>
        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="addClient.php">Add Client</a></li>
            <li><a href="deleteClient.php">Delete Client</a></li>
            <li><a href="searchClient.php">Search On Client</a></li>
            <li><a class="active" href="viewClients.php">View All Clients</a></li>
            <li><a href="updateClient.php">Update Client</a></li>
            </ul>
        </nav>
      <main>
        <h2>Client List</h2>
        <table>
          <thead>
            <tr>
              <th>Acc Number</th>
              <th>Name</th>
              <th>Age</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Acc Balance</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $arr = loadDataFromDBToArray($clientDB);
            displayClient($arr, "Table");
          ?>
          </tbody>
        </table>
      </main>
      <footer>
        <p>&copy; 2024 Bank Management System</p>
      </footer>
    </div>
  </body>
</html>

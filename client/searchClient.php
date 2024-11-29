<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search On Client</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">
    <style>
    .result {
      margin-top: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
    }

    .clientCard {
      background: #e9ecef;
      border-radius: 10px;
      padding: 15px;
      text-align: left;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .clientCard h3 {
      margin: 0 0 10px;
      color: #35424a;
    }

    .clientCard span {
      display: block;
      margin: 5px 0;
      color: #555;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
          <h1>Search On Client</h1>
      </header>
      <nav>
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../clientManagment.php">Welcome Page</a></li>
          <li><a href="addClient.php">Add Client</a></li>
          <li><a href="deleteClient.php">Delete Client</a></li>
          <li><a class="active" href="searchClient.php">Search On Client</a></li>
          <li><a href="viewClients.php">View All Clients</a></li>
          <li><a href="updateClient.php">Update Client</a></li>
        </ul>
      </nav>
      <main>
        <h2>Search Client</h2>
        <form action="" method="POST">
            <label for="search_query">Enter Client Name Or Account Number:</label>
            <input type="text" id="search_query" name="search_query" required>

            <button type="submit">Search Client</button>
        </form>
        <div class="result">
        <?php
          include "../functions.php";
          // include "classes/clsBankClient.php";
          include "../global.php";

          if(isset($_POST['search_query'])) {
            $arr = loadDataFromDBToArray($clientDB);
            $resultArr = [];
            getAllMatch($resultArr, $arr, $_POST['search_query'], $_POST['search_query']);

            displayClient($resultArr);
          }
        ?>
        </div>
      </main>
      <footer>
        <p>&copy; 2024 Bank Management System</p>
      </footer>
    </div>
  </body>
</html>

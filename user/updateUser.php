<?php
include '../functions.php';

session_start();

checkOperationStatus();

operationDefault();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Update User</h1>
        </header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../userManagment.php">Wlcome Page</a></li>
                <li><a href="addUser.php">Add User</a></li>
                <li><a href="deleteUser.php">Delete User</a></li>
                <li><a href="searchUser.php">Search User</a></li>
                <li><a href="viewUsers.php">View All Users</a></li>
                <li><a class="active" href="updateUser.php">Update User</a></li>
            </ul>
        </nav>
        <main>
            <form action="../handlers/updateUserHandeler.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="curr-pass">Current Password:</label>
                <input type="text" id="curr-pass" name="curr-pass" required>

                <label for="new-pass">New Password:</label>
                <input type="text" id="new-pass" name="new-pass" required>

                <label for="permitions-addClient">Give Add Client Permition: (True or False) </label>
                <input type="text" id="permitions-addClient" name="permitions-addClient" required>

                <label for="permitions-deleteClient">Give Delete Client Permition: (True or False) </label>
                <input type="text" id="permitions-deleteClient" name="permitions-deleteClient" required>

                <label for="permitions-seacrhClient">Give Search On Client Permition: (True or False) </label>
                <input type="text" id="permitions-searchClient" name="permitions-searchClient" required>

                <label for="permitions-viewClient">Give View Client Permition: (True or False) </label>
                <input type="text" id="permitions-viewClient" name="permitions-viewClient" required>

                <label for="permitions-updateClient">Give Update Client Permition: (True or False) </label>
                <input type="text" id="permitions-updateClient" name="permitions-updateClient" required>

                <label for="permitions-Users">Give Users Screen Permition: (True or False) </label>
                <input type="text" id="permitions-Users" name="permitions-Users" required>

                <button type="submit">Update User</button>
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
                <p>User Update Successfly.</p>
            </div>
        </div>

        <!-- Failure Modal -->
        <div id="failureModal" class="modal">
            <div class="modal-content failure">
                <span class="close" onclick="closeFailureModal()">&times;</span>
                <h2>Failure!</h2>
                <p>The Username/Password Is Wronning.
                    <br>Try Again With Correct Username/Password
                </p>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>
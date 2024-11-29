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
    <title>Delete User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Delete User</h1>
        </header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../userManagment.php">Welcome Page</a></li>
                <li><a href="addUser.php">Add User</a></li>
                <li><a class="active" href="deleteUser.php">Delete User</a></li>
                <li><a href="searchUser.php">Search User</a></li>
                <li><a href="viewUsers.php">View All Users</a></li>
                <li><a href="updateUser.php">Update User</a></li>
            </ul>
        </nav>
        <main>
            <form action="../handlers/deleteUserHandler.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <button type="submit">Delete User</button>
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
                <p>User Deleted Successfly.</p>
            </div>
        </div>

        <!-- Failure Modal -->
        <div id="failureModal" class="modal">
            <div class="modal-content failure">
                <span class="close" onclick="closeFailureModal()">&times;</span>
                <h2>Failure!</h2>
                <p>The Username Is Not Exist.
                </p>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>
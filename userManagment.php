<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>User Management</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="userManagment.php">Welcome Page</a></li>
                <li><a href="user/addUser.php">Add User</a></li>
                <li><a href="user/deleteUser.php">Delete User</a></li>
                <li><a href="user/searchUser.php">Search User</a></li>
                <li><a href="user/viewUsers.php">View All Users</a></li>
                <li><a href="user/updateUser.php">Update User</a></li>
            </ul>
        </nav>
        <main>
            <h2>Welcome to the User Management Panel</h2>
            <p>Select an option from the menu to manage user records.</p>
        </main>
        <footer>
            <p>&copy; 2024 Bank Management System</p>
        </footer>
    </div>
    <script src="js/main.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
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
            <h1>All Users</h1>
        </header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../userManagment.php">Welcome Page</a></li>
                <li><a href="addUser.php">Add User</a></li>
                <li><a href="deleteUser.php">Delete User</a></li>
                <li><a href="searchUser.php">Search User</a></li>
                <li><a class="active" href="viewUsers.php">View All Users</a></li>
                <li><a href="updateUser.php">Update User</a></li>
            </ul>
        </nav>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Permitions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../functions.php';
                    include '../global.php';

                    $users = loadUserDataFromDBToArray($userDB);
                    foreach ($users as &$user) {
                        $username = $user->getUsername();
                        $perm = $user->getPermission();
                        echo <<<usersInfo
                        <tr>
                            <td>$username</td>
                            <td>$perm</td>
                        </tr>
                        usersInfo;
                    }
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
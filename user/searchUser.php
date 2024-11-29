<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/main.css">
    <style>
        .result {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .userCard {
            background: #e9ecef;
            border-radius: 10px;
            padding: 15px;
            text-align: left;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .userCard h3 {
            margin: 0 0 10px;
            color: #35424a;
        }

        .userCard span {
            display: block;
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Search User</h1>
        </header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../userManagment.php">Welcome Page</a></li>
                <li><a href="addUser.php">Add User</a></li>
                <li><a href="deleteUser.php">Delete User</a></li>
                <li><a class="active" href="searchUser.php">Search User</a></li>
                <li><a href="viewUsers.php">View All Users</a></li>
                <li><a href="updateUser.php">Update User</a></li>
            </ul>
        </nav>
        <main>
            <form method="POST">
                <label for="search">Search by Username or Email:</label>
                <input type="text" id="search" name="searchQuery" required>

                <button type="submit">Search User</button>
            </form>
            <div class="result">
                <?php
                include '../functions.php';
                include '../global.php';

                if (isset($_POST['searchQuery'])) {
                    if (isUserExist($_POST['searchQuery'], $userDB)) {
                        $users = loadUserDataFromDBToArray($userDB);
                        foreach ($users as &$user) {
                            if ($user->getUsername() == $_POST['searchQuery']) {
                                $username = $user->getUsername();
                                $perm = $user->getPermission();
                                echo <<<userInfo
                            <div class="userCard">
                                <span>Name: $username</span>
                                <span>Name: $perm</span>
                            </div>
                            userInfo;
                                break;
                            }
                        }
                    } else {
                        echo '<span>User Not Found</span>';
                    }
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User Page</title>
    <link rel="stylesheet" href="dashboard_menu_style.css">
    <link rel="stylesheet" href="./style.css">
</head>
<?php //@session_start();
?>

<body>
    <?php
        include("dashboard_menu.php");
    ?>

    <div class="content-center">
        <h2 class="title">Login <span class="main-color">User</span></h2><br>
        <form id='login' action="login.php" method='post' accept-charset='UTF-8' class="index-form">

            <label for='username'>UserName:</label>
            <input type='text' name='userName' id='username' maxlength="50" required placeholder="Enter UserName...">

            <label for='password'>Password:</label>
            <input type='password' name='password' id='password' maxlength="50" required placeholder="Enter Password...">

            <button type='submit' class="submit-btn" name='Submit'>Login</button>

        </form>


        <!--
    Test data:</br>
    userName: admin</br>
    password: admin</br>
-->

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "post") {
            //Database Authentication
            require("DBInfo.inc");

            // Server side code
            //Read form submit info post request
            $userName = $_POST['userName'];
            $password = $_POST['password'];

            //Not secure post call
            if (!empty($userName) and !empty($password)) {
                //connect to database
                $connect = mysqli_connect($hostDB, $userDB, $passwordDB, $databaseDB);
                if (mysqli_connect_errno()) {
                    die(" cannot connect to database " . mysqli_connect_error());
                }

                $query = "select * from login  where userName='" .
                    $userName . "' and password='" . $password . "'";

                $result = mysqli_query($connect, $query);
                if (!$result) {
                    die(' Error cannot run query');
                }

                $loginInUser = null;
                while ($row = mysqli_fetch_assoc($result)) {
                    $loginInUser = $row["userName"];
                    break; // to be save
                }

                mysqli_free_result($result);
                mysqli_close($connect);

                echo "<pre>";
                echo "Server data:</br>";
                echo "username: " . $userName . "</br>";
                echo "password: " . $password . "</br>";
                echo "query: " . $query . "</br>";
                if (! empty($loginInUser)) {

                    // $_SESSION["userName"] = $loginInUser;

                    echo "</br><div class=\"alert alert-success\">Database Message: Success login with user name (" . $loginInUser . ")";
                    echo "</br></br><a class=\"btn btn-success\" href='myActivities.php?userName=" . $loginInUser . "'> My Activities</a>";
                    echo "</div>";
                } else {
                    echo "</br><div class=\"alert alert-danger\">Database Message: Fail login</div>";
                }
                echo "</pre>";
            }
        }
        ?>

        <div class="blur top-left"></div>
        <div class="blur bottom-right"></div>
    </div>

    <script src="./main.js"></script>
</body>
</html>
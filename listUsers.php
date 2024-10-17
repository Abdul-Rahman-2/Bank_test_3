<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users Page</title>
    <link rel="stylesheet" href="./dashboard_menu_style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
        include("dashboard_menu.php");
    ?>

    <div class="content-center">
        <h1 class="title">List of <span class="main-color">Users</span></h1>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <td> UserID </td>
                        <td> UserName</td>
                        <td> Password</td>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    //Database Authentication
                    require("DBInfo.inc");

                    //connect to database
                    $connect = mysqli_connect($hostDB, $userDB, $passwordDB, $databaseDB);
                    if (mysqli_connect_errno()) {
                        die(" cannot connect to database " . mysqli_connect_error());
                    }

                    $query = "select * from login ";

                    $result = mysqli_query($connect, $query);
                    if (!$result) {
                        die(' Error cannot run query');
                    }

                    $userInfo = array();
                    $loginInUser = null;
                    while ($row = mysqli_fetch_assoc($result)) {
                        //$userInfo[]= $row ;
                        echo " <tr>";
                        echo " <td>" . $row["userID"] . " </td>";
                        echo " <td>" . $row["userName"] . "</td>";
                        echo " <td>" . $row["password"] . "</td>";
                        echo " </tr>";
                    }

                    mysqli_free_result($result);
                    mysqli_close($connect);



                    ?>

                </tbody>
            </table>
        </div>
        <div class="blur top-left"></div>
        <div class="blur bottom-right"></div>
    </div>

    <script src="main.js"></script>
</body>

</html>
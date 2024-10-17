<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Page</title>
    <link rel="stylesheet" href="dashboard_menu_style.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <?php
        include("dashboard_menu.php");
    ?>

    <div class="content-center full-height gap-lg">
        <h2 class="title"><span class="main-color">Add </span>User</h2>
        <form id='login' action="addUser.php" method='post' accept-charset='UTF-8' class="add-user-form">
            
                <label for='username'>UserName:</label>
                <input type='text' name='userName' id='username' maxlength="50" required placeholder="Enter UserName...">
                
                <label for='password'>Password:</label>
                <input type='password' name='password' id='password' maxlength="50" required placeholder="Enter Password...">

                <button type='submit' class="submit-btn" name='Submit' id='submit'>Add</button>

                <hr>
                
                <a href="listUsers.php" class="auther-link"> List all users</a>
        </form>
        <div class="blur top-left"></div>
        <div class="blur bottom-right"></div>
    </div>


    <?php
    //Database Authentication
    require("DBInfo.inc");

    // Server side code
    //Read form submit info post request
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    //Not secure post call
    //if(!empty($userName) and !empty($password)) {


    //connect to database
    $connect = mysqli_connect($hostDB, $userDB, $passwordDB, $databaseDB);
    if (mysqli_connect_errno()) {
        die(" cannot connect to database " . mysqli_connect_error());
    }

    $query = "Insert into login(userName,password) VALUES ('" .
        $userName . "','" . $password . "')";

    $result = mysqli_query($connect, $query);
    if (!$result) {
        die(' Error cannot run query');
    }

    mysqli_close($connect);

    //}
    ?>

    <script>
        var myInput = document.getElementById("password");
        var submitBtn = document.getElementById("submit");;
        submitBtn.disabled = true;
        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            submitBtn.disabled = true;
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (!myInput.value.match(lowerCaseLetters)) {
                return;
            }
            if (myInput.value.length > 5) {
                submitBtn.disabled = false;
            }
        }
    </script>

    <script src="./main.js"></script>
</body>
</html>
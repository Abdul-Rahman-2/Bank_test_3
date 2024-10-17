<?php
    require("DBInfo.inc");
?>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- ====== Meta Tags ====== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Page For A Bank Web...">

    <!-- ====== Title Of The Page ====== -->
    <title>Chat Page</title>

    <!-- Dashboard Menu Style -->
    <link rel="stylesheet" href="./dashboard_menu_style.css">

    <!-- ====== Main Style Link ====== -->
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>

    <?php
        include("dashboard_menu.php");
    ?>

    <div class="chat-container w-100" style="padding: 0 10px;">

        </br>

        <h2 class="title">What's Your Opinion <br> <span class="main-color">About Us</span></h2>
        
        <form class="chat-form" id='login' action='chat.php' method='post' accept-charset='UTF-8'>

            <label for="comment">Comment:</label>
            <textarea name="chatText" id="comment" placeholder="Your Comment Here..." required></textarea>

            <button type='submit' name='Submit' class="submit-btn w-100">Send</button>
            
        </form>
        
        </br>

        <div class="panel">
            <div class="panel-heading">
                Chat Room 
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                    <path d="M320-520q17 0 28.5-11.5T360-560q0-17-11.5-28.5T320-600q-17 0-28.5 11.5T280-560q0 17 11.5 28.5T320-520Zm160 0q17 0 28.5-11.5T520-560q0-17-11.5-28.5T480-600q-17 0-28.5 11.5T440-560q0 17 11.5 28.5T480-520Zm160 0q17 0 28.5-11.5T680-560q0-17-11.5-28.5T640-600q-17 0-28.5 11.5T600-560q0 17 11.5 28.5T640-520ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
                </svg>
            </div>

            <div class="panel-body">

            <?php
                    $connect = mysqli_connect($hostDB, $userDB, $passwordDB, $databaseDB);
                    if (mysqli_connect_errno()) {
                        die(" cannot connect to database " . mysqli_connect_error());
                    }

                    //Insert chat text
                    if (!empty($_POST['chatText'])) {
                        $chatText = mysqli_real_escape_string($connect, $_POST['chatText']);
                        $query = "INSERT INTO chating (chatText) VALUES ('$chatText')";
                        mysqli_query($connect, $query);
                    }

                    //Get chat room text
                    $query = "SELECT * FROM chating";
                    $result = mysqli_query($connect, $query);

                    if (!$result) {
                        die('Error cannot run query');
                    }

                    // Check if there are messages
                    if (mysqli_num_rows($result) > 0) {
                        echo "<ul class=\"list-group\">";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li class=\"list-group-item\">" . htmlspecialchars($row["chatText"]) . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        // If no messages, display the default message
                        echo <<< H_doc
                        <ul class="list-group">
                            <li class="list-group-item" style="display: flex; justify-content: center; align-items: center; height: 25vh; width: 100%;">
                                Your Message Will Display Here!
                            </li>
                        </ul>
                        H_doc;
                    }

                    mysqli_free_result($result);
                    mysqli_close($connect);
                ?>

            </div>
        </div>
    </div>

    <script src="./main.js" defer></script>
    <script>
        var name = '<?= $_GET["name"] ?>';
        document.write(name);
    </script>
</body>
</html>
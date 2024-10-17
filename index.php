<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ====== Meta Tags ====== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Page For A Bank Web...">

    <!-- ====== Title Of The Page ====== -->
    <title>Post and Get Example</title>

    <!-- ====== Main Style Link ====== -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container content-center full-height gap-lg">
    <h2 class="title">Basic <span class="main-color">Form</span></h2>
    <form action="dashboard.php" method="post" class="index-form">

        <label>Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email..." name="email">

        <label>Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter Password..." name="pwd">

        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>

        <button type="submit" class="submit-btn">Submit</button>
        
    </form>
    <div class="blur top-left"></div>
    <div class="blur bottom-right"></div>
</div>

<?php
    echo print_r($_POST);
?>
</body>
</html>

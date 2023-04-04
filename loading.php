<?php
    include "index.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Loading Page</title>
    <style>
        body {
            overflow-x: hidden;
            background-color: #D7ECFF;
            color: #D7ECFF;
        }
    </style>
</head>
<body>
    <div class="content" style="margin: 5%; text-align: center;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <img class="logoicon" style="object-position: center;" src="images_icons/docyouloading.png" width="500px">
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row" style="margin-top: 2%;">
            <div class="col-2"></div>
            <div class="col-8">
                <a href="login.php"><button type="submit" class="btn-light btn" style="border-radius: 50px !important; width: 250px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); height: 40px;">DocYou Login</button></a>
            </div>  
            <div class="col-2"></div>
        </div>
    
        <div class="row" style="margin-top: 2%;">
            <div class="col-3"></div>
            <div class="col-6">
                <a href="signupprototype.php">I don't have a DocYou User ID</a>
            </div>  
            <div class="col-3"></div>
        </div>
    </div>
</body>

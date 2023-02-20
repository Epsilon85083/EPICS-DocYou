<?php
    include "index.php";

    $userid = "";
    $password = "";
    $validation_error = "";


    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $usernamearray = array();
        $passwordarray = array();

        $db = connect();
        $specificQuery = $db->query("SELECT * FROM LOGIN");
        $serviceResult = $specificQuery->fetchAll(PDO::FETCH_ASSOC);

        for($i = 0; $i < sizeof($serviceResult); $i++){
            $username = $serviceResult[$i]["username"];
            $password = $serviceResult[$i]["password"];

            array_push($usernamearray, $username);
            array_push($passwordarray, $password);
        }

        $userid = $_POST['username'];
        $password = $_POST['password'];

        $moveToNext = FALSE;
        $usernameFound = FALSE;
        $passwordFound = FALSE;

        for($i = 0; $i < sizeof($usernamearray); $i++){
            if($usernamearray[$i] == $userid){
                echo "Rishik";
                $usernameFound = TRUE;
                for($j = 0; $j < sizeof($passwordarray); $j++){
                    if($passwordarray[$j] == $password){
                        $moveToNext = TRUE;
                        $passwordFound = TRUE;
                    }
                }
            }
        }

        if($moveToNext){
            header("Location: landing.php");
            exit;
        }

        if($usernameFound == FALSE){
            $validation_error .= "* Username not found. <br>";
        }

        if($passwordFound == FALSE){
            $validation_error .= "* Password incorrect. <br>";
        }
    }
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
    <title>Login</title>
    <style>
        body {
            overflow-x: hidden;
            background-color: #D7ECFF;
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

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="" method="POST">
                    <input name="username" placeholder=" Username:" type="text" style="width: 200px; margin-bottom: 5%; margin-top: 10%; border-radius: 10px !important; width: 250px; height: 40px;" value="<?php echo $userid; ?>">

                    <br>

                    <input name="password" placeholder=" Password:" type="text" style="width: 200px; margin-bottom: 3%; border-radius: 10px !important; width: 250px; height: 40px;" value="<?php echo $password; ?>">

                    <br>

                    <p style="margin-bottom: 3%;">
                        <span style="color:red;"><?= $validation_error;?></span>
                    </p>

                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-8">
                            <button type="submit" name="submit" style="border-radius: 50px !important; width: 100px; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); height: 40px; margin-bottom: 4% !important;">Sign In</button>
                            <br>
                            <a style="color: black;" href="signup.php">Need to Sign Up</a>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>

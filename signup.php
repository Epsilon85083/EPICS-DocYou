<?php
    include "index.php";
    $validation_error = "";
    $username_validation_error = "";
    $password_validation_error = "";
    $username_boolean = FALSE;
    $password_boolean = FALSE;
    $password_matching_boolean = FALSE;
    $username_number_boolean = FALSE;

    $firstname = "";
    $lastname = "";
    $hospitalname = "";
    $supervisorname = "";
    $hospitalprogram = "";
    $userid = "";
    $password = "";
    $passwordconfirmation = "";

    $result = (string) rand();
    $resultTwo = uniqid();
    $resultFinal = $result . $resultTwo;
    echo $result;
    echo "<br>";
    echo $resultTwo;
    echo "<br>";
    echo $resultFinal;

    $db = connect();

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $hospitalname =  $_POST["hospitalname"];
        $supervisorname = $_POST["supervisorname"];
        $hospitalprogram = $_POST["program"];
        $userid = $_POST["username"];
        $password = $_POST["password"];
        $passwordconfirmation = $_POST["confirmpassword"];

        if(strlen($passwordconfirmation) < 20 && strlen($password) < 20){
            $password_boolean = TRUE;
            $password_validation_error = "";
        }
        else{
            $password_validation_error .= "* The password must be less than 20 characters. <br>";
            $password_boolean = FALSE;
        }

        if(strlen($userid) > 7 && strlen($userid) < 13){
            $username_boolean = TRUE;
            $username_validation_error = "";
        }
        else{
            $username_boolean = FALSE;
            $username_validation_error .= "* The username must be greater than 7 characters and less than 13 characters. <br>";
        }

        /*
        if(!str_contains($userid, '1')){
            echo "hello";
        }
        else{
            echo "rishik";
        }
        */

        if(str_contains($userid, '1') || str_contains($userid, '2') || str_contains($userid, '3') || str_contains($userid, '4') || str_contains($userid, '5') || str_contains($userid, '6') || str_contains($userid, '7') || str_contains($userid, '8') || str_contains($userid, '9') || str_contains($userid, '0')){
            $username_number_boolean = TRUE;
            $username_validation_error = "";
        }
        else{
            $username_number_boolean = FALSE;
            $username_validation_error .= "* Username must contain a number. <br>";
        }

        if($password === $passwordconfirmation){
            $password_matching_boolean = TRUE;
            $password_validation_error .= "";
        }

        else{
            $password_matching_boolean = FALSE;
            $password_validation_error .= "* The passwords must match. <br>";
        }

        $checkIfUniqueTokenAlreadyExsists = TRUE;
        $specificQueryThree = $db->query("SELECT * FROM signup");
        $serviceResultThree = $specificQueryThree->fetchAll(PDO::FETCH_ASSOC);

        $uniqueTokenArray = array();
/*
        for($i = 0; $i < sizeof($serviceResultThree); $i++){
            $uniqueToken = $serviceResultThree[$i]["unique_token"];
            echo $uniqueToken;
            array_push($uniqueTokenArray, $uniqueToken);
        }

        while($checkIfUniqueTokenAlreadyExsists === TRUE){
            for($i = 0; $i < sizeof($uniqueTokenArray); $i++){
                if($uniqueTokenArray[$i] === $resultFinal){
                    $checkIfUniqueTokenAlreadyExsists = TRUE;
                    break;
                }
                else {
                    $checkIfUniqueTokenAlreadyExsists = FALSE;
                }
            }
        }*/

        if($password_boolean === TRUE && $username_boolean === TRUE && $password_matching_boolean === TRUE && $username_number_boolean === TRUE && !empty($firstname) && !empty($lastname) && !empty($hospitalname) && !empty($supervisorname) && !empty($hospitalprogram) && !empty($userid) && !empty($password) && !empty($passwordconfirmation) && $checkIfUniqueTokenAlreadyExsists === FALSE){
            $specificQuery = $db->query("INSERT INTO signup(first_name, last_name, hospital_name, supervisor_name, hospital_program, username, password, confirm_password, sign_up_completed) values('$firstname', '$lastname','$hospitalname','$supervisorname', '$hospitalprogram', '$userid', '$password', '$passwordconfirmation', 1)");
            $serviceResult = $specificQuery->fetchAll(PDO::FETCH_ASSOC);

            $specificQueryTwo = $db->query("INSERT INTO login(username, password, completedsignup) values('$userid', '$password', 1)");
            $serviceResultTwo = $specificQuery->fetchAll(PDO::FETCH_ASSOC);
            
            header("Location: login.php");
            exit;
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
    <title>Sign Up</title>
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
                <form method="POST" action="">
                    <label style="margin-bottom: 5%; margin-top: 15%;">First Name:&nbsp;&nbsp;</label>
                    <input name="firstname" type="text" style="width: 200px;" value="<?php echo $firstname; ?>">

                    <br>

                    <label style="margin-bottom: 5%;">Last Name:</label>
                    <input name="lastname" type="text" style="width: 200px;" value="<?php echo $lastname; ?>">

                    <br>

                    <label style="margin-bottom: 5%;">Hospital Name:</label>
                    <input name="hospitalname" type="text" list="hospitals" style="width: 200px;" value="<?php echo $hospitalname; ?>">
                    <datalist id="hospitals">
                        <option value="Phoenix Children's Hospital">
                        <option value="Mayo Clinic-Phoenix">
                        <option value="Banner-University Medical Center Phoenix">
                        <option value="St. Joseph's Hospital and Medical Center">
                        <option value="TMC Healthcare-Tucson">
                        <option value="Abrazo Arrowhead Campus">
                        <option value="Banner Boswell Medical Center">
                        <option value="Chandler Regional Medical Center">
                        <option value="HonorHealth Scottsdale Shea Medical Center">
                        <option value="Abrazo Central Campus">
                    </datalist>

                    <br>

                    <label style="margin-bottom: 5%;">Supervisor Name:</label>
                    <input name="supervisorname" list="theleaders" type="text" style="width: 200px;" value="<?php echo $supervisorname; ?>">
                    <datalist id="theleaders">
                        <option value="Julianna Diddle">
                        <option value="Adwith Malpe">
                        <option value="Jon Mcgreevy">
                    </datalist>

                    <br>

                    <label style="margin-bottom: 5%;">Program within Hospital:</label>
                    <input name="program" type="text" list="programs" style="width: 200px;" value="<?php echo $hospitalprogram; ?>">
                    <datalist id="programs">
                        <option value="Pediatric Care">
                        <option value="Emergancy Department">
                    </datalist>

                    <br>

                    <label style="margin-bottom: 5%;">Username:</label>
                    <input name="username" type="text" style="width: 200px;" value="<?php echo $userid; ?>">

                    <p style="margin-bottom: 5%;">
                        <span style="color:red;"><?= $username_validation_error;?></span>
                    </p>

                    <label style="margin-bottom: 5%;">Password:</label>
                    <input name="password" type="text" style="width: 200px;" value="<?php echo $password; ?>">

                    <br>

                    <label style="margin-bottom: 5%;">Confirm Password:</label>
                    <input name="confirmpassword" type="text" style="width: 200px;" value="<?php echo $passwordconfirmation; ?>">

                    <br>

                    <p style="margin-bottom: 5%;">
                        <span style="color:red;"><?= $password_validation_error;?></span>
                    </p>

                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>

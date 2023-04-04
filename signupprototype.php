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

        if(str_contains($userid, '1') || str_contains($userid, '2') || str_contains($userid, '3') || str_contains($userid, '4') || str_contains($userid, '5') || str_contains($userid, '6') || str_contains($userid, '7') || str_contains($userid, '8') || str_contains($userid, '9') || str_contains($userid, '0')){
            $username_number_boolean = TRUE;
            $username_validation_error = "";
        }
        else{
            echo "";
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
        echo $uniqueTokenArray[0];

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

        if($password_boolean === TRUE && $username_boolean === TRUE && $password_matching_boolean === TRUE && $username_number_boolean === TRUE && !empty($firstname) && !empty($lastname) && !empty($hospitalname) && !empty($supervisorname) && !empty($hospitalprogram) && !empty($userid) && !empty($password) && !empty($passwordconfirmation)){
            echo "entered";
            $specificQuery = $db->query("INSERT INTO signup(first_name, last_name, hospital_name, supervisor_name, hospital_program, username, password, confirm_password, sign_up_completed) values('$firstname', '$lastname','$hospitalname','$supervisorname', '$hospitalprogram', '$userid', '$password', '$passwordconfirmation', 1)");
            $serviceResult = $specificQuery->fetchAll(PDO::FETCH_ASSOC);

            $specificQueryTwo = $db->query("INSERT INTO login(username, password, completedsignup) values('$userid', '$password', 1)");
            $serviceResultTwo = $specificQueryTwo->fetchAll(PDO::FETCH_ASSOC);
            
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
    <script type="test/javascript" src="signupjs.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Sign Up</title>
    <style>
        body {
            overflow-x: hidden;
            background-color: #D7ECFF;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

        *, body {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            -moz-osx-font-smoothing: grayscale;
        }

        html, body {
            height: 100%;
            background-color: #D7ECFF;
        }


        .form-holder {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }

        .form-holder .form-content {
            position: relative;
            text-align: center;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 60px;
        }

        .form-content .form-items {
            border: 3px solid #000;
            padding: 40px;
            display: inline-block;
            width: 100%;
            min-width: 540px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            text-align: left;
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .form-content h3 {
            color: #000;
            text-align: left;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-content h3.form-title {
            margin-bottom: 30px;
        }

        .form-content p {
            color: #000;
            text-align: left;
            font-size: 17px;
            font-weight: 300;
            line-height: 20px;
            margin-bottom: 30px;
        }


        .form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
            color: #000;
        }

        .form-content input[type=text], .form-content input[type=password], .form-content input[type=email], .form-content select {
            width: 100%;
            padding: 9px 20px;
            text-align: left;
            border: 0;
            outline: 0;
            border-radius: 6px;
            background-color: #fff;
            font-size: 15px;
            font-weight: 300;
            color: #8D8D8D;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            margin-top: 16px;
        }


        .btn-primary{
            background-color: #2B65EC;
            outline: none;
            border: 0px;
            box-shadow: none;
        }

        .btn-primary:hover, .btn-primary:focus, .btn-primary:active{
            background-color: #;
            outline: none !important;
            border: none !important;
            box-shadow: none;
        }

        .form-content textarea {
            position: static !important;
            width: 100%;
            padding: 8px 20px;
            border-radius: 6px;
            text-align: left;
            background-color: #000;
            border: 0;
            font-size: 15px;
            font-weight: 300;
            color: #8D8D8D;
            outline: none;
            resize: none;
            height: 120px;
            -webkit-transition: none;
            transition: none;
            margin-bottom: 14px;
        }

        .form-content textarea:hover, .form-content textarea:focus {
            border: 0;
            background-color: #ebeff8;
            color: #8D8D8D;
        }

        .mv-up{
            margin-top: -9px !important;
            margin-bottom: 8px !important;
        }

        .invalid-feedback{
            color: #ff606e;
        }

        .valid-feedback{
        color: #2acc80;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <div class="form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Register Today</h3>
                            <p>Fill in the data below.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" name="firstname" type="text" placeholder="First Name" value="<?php echo $firstname; ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <input class="form-control" name="lastname" type="text" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" name="hospitalname" type="text" list="hospitals" placeholder="Hospital Name" value="<?php echo $hospitalname; ?>" required>
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
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" name="supervisorname" list="theleaders" type="text" placeholder="Supervisor Name" value="<?php echo $supervisorname; ?>" required>
                                    <datalist id="theleaders">
                                        <option value="Julianna Diddle">
                                        <option value="Adwith Malpe">
                                        <option value="Jon Mcgreevy">
                                    </datalist>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label class="mb-3 mr-1" for="gender">Program within Hospital: </label>

                                    <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>
                                    <label class="btn btn-sm btn-outline-secondary" for="male">Pediatric Care</label>

                                    <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>
                                    <label class="btn btn-sm btn-outline-secondary" for="female">Emergancy Department</label>

                                    <div class="valid-feedback mv-up">You selected a gender!</div>
                                    <div class="invalid-feedback mv-up">Please select a gender!</div>
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="program" placeholder="Program within Hospital" style = "margin-top: 1%;" value="<?php echo $hospitalprogram; ?>" required>
                                    <datalist id="programs">
                                        <option value="Pediatric Care">
                                        <option value="Emergancy Department">
                                    </datalist>
                                </div>
                                
                                <div class="col-md-12">
                                    <input class="form-control" name="username" type="text" placeholder="Username" value="<?php echo $userid; ?>" required>
                                </div>

                                <br>

                                <p style="margin-bottom: 5%;">
                                    <span style="color:red;"><?= $username_validation_error;?></span>
                                </p>

                                <div class="col-md-12">
                                    <input class="form-control" name="password" type="text" placeholder="Password" value="<?php echo $password; ?>" required>
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" name="confirmpassword" type="password" placeholder="Confirm Password" style="margin-bottom: 2%;" value="<?php echo $passwordconfirmation; ?>" required>
                                </div>

                                <p style="margin-bottom: 5%;">
                                    <span style="color:red;"><?= $password_validation_error;?></span>
                                </p>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="check" id="invalidCheck" required>
                                    <label class="form-check-label">I confirm that all data are correct</label>
                                    <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                                </div>

                                <div class="form-button mt-3">
                                    <button id="submit" type="submit" class="btn btn-primary" name="submit">Register</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
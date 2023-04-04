<?php
    session_start();
    $last_name_to_remember = $_SESSION["transfer_last_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="general.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="footer.css" rel="stylesheet" type="text/css"/>
    <link href="log_procedures.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="page">
    <div class="row" style="display: flex; justify-content: center;">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="circular-edges" style="border-style: solid; height: 5vw; border-radius: 20px; background-color: #6aa2d7; margin-top: 5%;">
                <h3 id="date" style="text-align: center; color: #FFF;"></h3>
                <h3 id="welcome-message" style="text-align: center; color: #FFF;"></h3>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="footer">
        <div class="row thewholerow">
            <div class="col-3">
            </div>
            <div class="col-2 menu_button align-self-center">
                <a href="history.html"><i class="bi bi-list-ul"></i></a>
            </div>
            <div class="col-3 menu_button align-self-center">
                <a href="log_procedures.html"><i class="bi bi-camera"></i></a>
            </div>
            <div class="col-2 menu_button align-self-center">
                <a href="progress.html"><i class="bi bi-clipboard-data"></i></a>
            </div>
        </div>
    </div>
</body>
<script>
    const button = document.querySelector('.menu_button');

    button.addEventListener('click', () => {
        button.classList.add('clicked');
    });

    n =  new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date").innerHTML = m + "/" + d + "/" + y;

    var php_var = "<?php echo $last_name_to_remember; ?>";

    welcomeMessage = "Welcome Dr. " + php_var + "!";
    document.getElementById("welcome-message").innerHTML = welcomeMessage;
</script>
</html>

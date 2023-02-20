<?php
    include "index.php";

    $db = connect();
    $specificQuery = $db->query("SELECT * FROM logintwo");
    $serviceResult = $specificQuery->fetchAll(PDO::FETCH_ASSOC);

    for($i = 0; $i < sizeof($serviceResult); $i++){
        $username = $serviceResult[$i]["username"];
        echo $username;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
   
</body>
</html>

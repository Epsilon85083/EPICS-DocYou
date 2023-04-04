<?php
    include "index.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="footer.css" rel="stylesheet" type="text/css"/>
    <link href="log_procedures.css" rel="stylesheet" type="text/css"/>
    <title>Loading Page</title>
    <style>
        body {
            overflow-x: hidden;
            background-color: #D7ECFF;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="content" style="text-align: center; margin-left: 20rem; margin-right: 20rem; margin-top: 5rem; margin-bottom: 15%;">
        <div class="row" >
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h1>Links</h1>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4"></div>
                            <div class="col-2" style="display: flex;">
                                <a href="#" style="color: #000;" style="align-items: center;"><h1><i class="bi bi-arrow-right-circle"></i></h1></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="card mx-auto" style="width: 15rem; margin-bottom: 3rem; margin-left: 2%; margin-right: 2%;">
                                    <div class="card-header">
                                        <img class="card-img-top" src="img/piconeresources.png" alt="Card image cap">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">ACGME Programs</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card mx-auto" style="width: 15rem; margin-bottom: 3rem; margin-left: 2%; margin-right: 2%;">
                                    <div class="card-header">
                                        <img class="card-img-top" src="img/pictworesources.png" alt="Card image cap">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Contact</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card mx-auto" style="width: 15rem; margin-bottom: 3rem; margin-left: 2%; margin-right: 2%;">
                                    <div class="card-header">
                                        <img class="card-img-top" src="img/picthreeresources.png" alt="Card image cap">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Training Playlist</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="card mx-auto" style="width: 15rem; margin-left: 2%; margin-right: 2%;">
                                    <div class="card-header">
                                        <img class="card-img-top" src="img/picfourresources.png" alt="Card image cap">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Accredition Trends</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card mx-auto" style="width: 15rem; margin-left: 2%; margin-right: 2%;">
                                    <div class="card-header">
                                        <img class="card-img-top" src="img/picfiveresources.png" alt="Card image cap">
                                    </div>    
                                    <div class="card-body">
                                        <h5 class="card-title">Learning</h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-11"></div>
                            <div class="col-1">
                                <a href="#" style="color: #000;"><h3><i class="bi bi-three-dots-vertical"></i></h3></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 5rem;">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h1>News</h1>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4"></div>
                            <div class="col-2">
                                <a href="#" style="color: #000;"><h1><i class="bi bi-arrow-right-circle"></i></h1></a>
                            </div>
                        </div>
                    </div> 
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12" style="text-align: left;">
                                        <img src="img/image26.png" width=500>
                                    </div>
                                    <div class="col-12" style="text-align: left;">
                                        <h3>Technology</h3>
                                        <p>There's an App for That: A Mobile Procedure Logging Application with QR Codes</p>
                                        <hr>
                                    </div>
                                    <div class="col-4">
                                        <img src="img/image29.png" width=80 style="margin-bottom: 5%;">
                                    </div>
                                    <div class="col-8" style="margin-bottom: 3%;">
                                        <h4>Animals</h4>
                                        <p>A Simulation Procedure Cirriculum Works for Cinncinatti Veternarian Rounding</p>
                                    </div>
                                    <hr>
                                    <div class="col-4">
                                        <img src="img/image30.png" width=80 style="margin-bottom: 5%;">
                                    </div>
                                    <div class="col-8" style="margin-bottom: 5%;">
                                        <h4>Cardiology</h4>
                                        <p>Automated Procedure Logs for Cardiology Fellows: A New Training Procedure Paradigm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
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
</script>
<script>
    let saveFile = () => {
        var supervisor = document.getElementById("supervisor-input");
        let data = "Supervisor: ", supervisor;
        console.log(data);
    }
</script>
</html>
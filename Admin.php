<?php 
session_start();

if (strlen($_SESSION['User'])<4  && $_SESSION['User'] !=="Daniels"){

        die(header ("Location: admin_"));
              }

 ?>


<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniels | Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-FormModal-Contact-Form-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/daniels.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Upload-with-Preview.css">

    
    <script src="assets/js/jquery.min.js"></script>
   
   



</head>

<body>
    <span id="action_" style="display:none;"></span>
    <span id="category_" style="display:none;"></span>
    <span id="serial_" style="display:none;"></span>
    <span id="status_" style="display:none;"></span>



   

    <div class="sticky-top" style="background-color:white; margin-top:40px;">
        <div class="container">
            <div class="row">
                <div id="add_entry" class="col-4 col-md-4 text-center"><i class="material-icons menu_icons" >add_box</i>
                    <p>Upload</p>
                </div>

                <div id="edit_entry" class="col-4 col-md-4 text-center"><i class="material-icons menu_icons" >edit</i>
                    <p>Edit</p>
                </div>
                <div id="delete_entry" class="col-4 col-md-4 text-center"><i class="material-icons menu_icons" >delete_forever</i>
                    <p>Delete</p>
                </div>
            </div>
        </div>
    </div>

    <div id="container_"></div>

    

    <!--script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Nifla_scripts.js"></script-->
     <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="assets/js/Nifla_scripts.js"></script>
</body>

</html>
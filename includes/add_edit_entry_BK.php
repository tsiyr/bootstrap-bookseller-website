
    
<?php 
session_start(); 

// require_once('db_info_inc.php');

 /*if (!$connect){
  die("check if database exists and try again");
  }
*/
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($_POST['action'] == "add_entry"){

        echo `<div class="login-clean" style="display:none;">
        <form method="post">
            <h2 class="sr-only">Upload Form</h2>
            <div class="illustration"><img class="rounded img-fluid" src="assets/img/3.jpg"></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input type="file" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button class="btn btn-primary btn-block btn" type="button">Upload Preview Image</button></div>
            </div>
            <div class="form-group"><input class="form-control" type="email" name="Title" placeholder="Title"></div>
            <div class="form-group"><textarea class="form-control form-control-lg" rows="4" wrap="hard" name="Description" required="" placeholder="Description"></textarea></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input type="file" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button class="btn btn-primary btn-block btn" type="button">Upload File</button></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" onclick="uploadEntry();">Submit Upload</button></div>
        </form>
    </div>`;

    }

    if($_POST['action'] == "edit_entry"){
        
    }

    if($_POST['action'] == "delete_entry"){
        
    }

       





        }









?>









    
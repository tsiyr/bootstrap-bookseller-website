
    
<?php 
session_start(); 

// require_once('db_info_inc.php');

 /*if (!$connect){
  die("check if database exists and try again");
  }
*/
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if($_POST['action'] == "add_entry"){

        echo '<div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Upload Form</h2>
            <div class="illustration"><img class="rounded img-fluid" src="assets/img/3.jpg"></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input type="file" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button class="btn btn-primary btn-block btn" type="button">Upload Preview Image</button></div>
            </div>
            <div class="form-group"><input class="form-control" type="email" name="Title" placeholder="Title"></div>
            <div class="form-group"><textarea class="form-control form-control-lg" wrap="hard" name="Description" required="" placeholder="Description" style="height:120px;"></textarea></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input type="file" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button class="btn btn-primary btn-block btn" type="button">Upload File</button></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Submit Upload</button></div>
        </form>
    </div>';

    }

    if($_POST['action'] == "edit_entry"){

        echo '<div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Upload Form</h2>
            <div class="illustration"><img class="rounded img-fluid" src="assets/img/3.jpg"></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input id="thumbnail_" type="file" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button class="btn btn-primary btn-block btn" type="button">Upload Preview Image</button></div>
            </div>
            <div class="form-group"><input id="title_" class="form-control" type="email" name="Title" placeholder="Title"></div>
            <div class="form-group"><textarea id="description_" class="form-control form-control-lg" wrap="hard" name="Description" required="" placeholder="Description" style="height:120px;"></textarea></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input id="file_" type="file" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button class="btn btn-primary btn-block btn" type="button"><span id="file_upload_text">Upload File</span></button></div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" onclick="UploadEntry();">Submit Upload</button></div>
        </form>
    </div>';
        
    }

    if($_POST['action'] == "delete_entry"){

        echo '<div>
        <div class="container" style="margin-top:20px;">
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
            <div class="row admin_list">
                <div class="col-3"><img class="rounded-circle img-fluid admin_list_tnail" src="assets/img/4.jpg" width="80%"></div>
                <div class="col">
                    <h3 class="admin_list_title">The vain marathon</h3>
                </div>
                <div class="col-2"><i class="material-icons admin_list_icon" style="font-size:3rem;">delete_forever</i></div>
            </div>
        </div>
    </div>';
    }

       
if($_POST['action'] == "add_entry" && ){

        }//end of POST


/*$brandName  =trim($_POST['brandName']);


 if($_POST['add'] == "mobile"){
  $stmt= $connect -> prepare ("INSERT INTO mobiledevices (Brand, ModelName, DeviceType, Screen, OS, Memory, Camera, Battery, NetworkType, SpecialFeature, Price, Discount_price, StockStatus, AutoID,DateInputed, Keywords) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $stmt -> bind_param ("ssssssssssiissis", $brandName, $modelName, $deviceType, $screenSize, $OS, $memorySize, $cameraMP, $battery, $networkCapacity, $special_feature, $selling_price, $discount_price, $stockStatus, $AutoID, $Dateinputed, $Keywords);
  //set parameters and execute
  } 

if($stmt -> execute()){

    if(mysqli_error($connect)){
      echo $stmt->error;
     //echo 'an error occured. pls try again';
          } else{
             echo "1".$AutoID; // i'd read that to mean "succesful"
          }
  } else{
    
     
         echo $stmt->error;
   // echo 'an error occured. pls try again';
     
  }


  //close connection.
  $stmt -> close();

*/




 //To upload a sense making image/file to the server 
   function upload($fileID, $type, $category, $serial){
      global $connect;
      //$error, $pic1info, $pic2info, $pic3info, $oldImage, $newImage, $pin;
     

     $target_dir="uploads/"; //directory where photos are to be stored on server hard-drive 
     $uploaded_file= $target_dir.basename($_FILES[$fileID] ["name"]); //original name of uploaded image
     $FileType= strtolower(pathinfo($uploaded_file,PATHINFO_EXTENSION)); //extracts image extension e. g Png, gif... you know

   

     $target_file= $target_dir.$fileID.$serial.".".$FileType; //the new name I'm giving to the uploaded photo. I can't shout : nokia2312112pic1.jpg for example
     $uploadOk=1;  //my validation police

     if($type == "image"){

        $check = getimagesize($_FILES[$fileID] ["tmp_name"]);  //To check if user attempts to upload one nonsense file that is not an image. They will meet me here.
     } else {
         $check = filesize($_FILES[$fileID] ["tmp_name"]);  //To check if user attempts to upload one nonsense file that is not an image. They will meet me here.
     }
    
     //list($width, $height) = getfilesize($_FILES[$fileID] ["tmp_name"]); //detect image dimensions
    
     
    
     
      if ($check ==false){
          echo "Invalid File";
          $uploadOk=0; }
          
      else {
            if($type == "image"){

                //if picture is larger than 600kb
            if($_FILES[$fileID] ["size"] > 600000){
              echo "Image should not be more than 600kb";
              $uploadOk=0; }
      
            if($FileType != "jpg" && $FileType !="png"
               && $FileType!="jpeg" && $FileType!="gif" && $FileType!="webp"){

              echo 'invalid format';
            /*echo 'Only picture files with : jpg, png, jpeg and gif are allowed</p>';*/
            $uploadOk=0; }

        } else { //if not image

                 //if file is larger than 3mb
            if($_FILES[$fileID] ["size"] > 3000000){
              echo "Image should not be more than 3mb";
              $uploadOk=0; }
      
            if($FileType != "pdf" && $FileType !="doc"
               && $FileType!="txt" && $FileType!="docx"){

              echo 'invalid format';
            /*echo 'Only picture files with : jpg, png, jpeg and gif are allowed</p>';*/
            $uploadOk=0; }

        }
           
          }//end of parent else
 
  
              if ($uploadOk==0){
                //echo "Please fix all pending issues and retry";
             }
            else{ 
                     $select = $connect->query("SELECT ".$fileID." FROM Products WHERE AutoID = '".$serial." ' ");
                     $row= $select -> fetch_assoc();
                     $oldFile = $row[$fileID]; //omit file extension as that could change
                     $newFile=$target_file;

                     $name = substr($oldFile, strlen("uploads/".$fileID.$serial), 1);

                     //echo $name;

             if($name == "."){
                $int = 1;
              }else{
                $int = abs( ((int)$name) - rand(2,9));
              } 
              
           if ( $oldFile == NULL){ 
                $target_file= $target_dir.$fileID.$serial."1.".$FileType; //the ne
                $newImage=$target_file;


                $update = "UPDATE Products SET ".$fileID." = '".$newFile."'  where serial  = '".$serial."'"; //update image path on Db 
                //update image path Db 
                $connect->query($update);
                $connect ->close();
            } //end of no old pic found

            else{ // if old pic found

                $newFile = $target_file;
                

              if(!unlink($oldFile)){
                echo "error unlinking file.";
              }
              
         ///  } 

              $target_file= $target_dir.$fileID.$serial.$int.".".$imageFileType; //the ne

              $newImage=$target_file;

              $update = "UPDATE Products SET ".$fileID." = '".$newFile."'  where pin  = '".$serial."'"; //update image path on Db 

              $connect->query($update);
              $connect ->close();
              
           }

         
             
       if (move_uploaded_file($_FILES[$fileID] ["tmp_name"] , $target_file)){
            //$_SESSION['profileId'];
            echo 'Successful!';

            //echo '<script> currentPic ="'.$target_file.'" </script>';
            
          }
            
      } //end of uploadOk not 0

    }//end of function


?>









   
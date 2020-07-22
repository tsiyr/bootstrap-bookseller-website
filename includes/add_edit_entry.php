<?php 
//session_start(); 

 require_once('db_info_inc.php');

if (!$connect){
  die("check if database exists and try again");
  }
  

  $serial = $src = $title =  $items ='';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if(isset($_POST['UI']) && $_POST['UI'] == "add_entry"){

       echo '<div class="login-clean">

        <script>
    var d = new Date();
    var date = d.getFullYear();
    date +="-"+(d.getMonth()+1);
    date +="-"+d.getDate();
    date+="-"+d.getTime();

    document.getElementById("serial_").innerHTML = date;
    </script>

        <form >
            <h2 class="sr-only">Upload Form</h2>
            <div class="illustration"><img id="preview_" class="rounded img-fluid" src="assets/img/preview.jpg"></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input type="file" id="thumbnail_" name="thumbnail_" accept="image/*" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;">
                <button id="thumbnail_btn" class="btn btn-primary btn-block btn" type="button" onclick="triggerUpload(\'thumbnail_\');"><span id="thumbnail_text" class="text">Upload Preview Image</span></button>
                </div>
            </div>
            <div id="thumbnail_progress_bar" class="upload-btn-wrapper progress_bar"><img src="assets/img/YVPG.gif" /></div>
            <div class="form-group">
            <input id="title_" class="form-control text" type="text" name="Title" placeholder="Title"></div>
            <div class="form-group">
            <textarea id="description_" class="form-control form-control-lg text" wrap="hard" name="Description" required="" placeholder="Description" style="height:120px;"></textarea></div>
            <div class="form-group">
                <div class="upload-btn-wrapper"><input type="file"  id="file_"  class="text"  accept="application/pdf" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button  class="btn btn-primary btn-block btn text" type="button"><span id="file_text" onclick="triggerUpload(\'file_\');">Upload File</span></button></div>
            </div>
            <div id="file_progress_bar" class="upload-btn-wrapper progress_bar"><img src="assets/img/YVPG.gif" /></div>
            <div class="form-group"><button id="add_entry_button" class="btn btn-primary btn-block text" onclick="uploadEntry();">Submit Upload</button></div>
        </form>
    </div>

<script>

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#preview_").attr("src", e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#thumbnail_").change(function(){
    readURL(this);
});

 </script>';   

    }

    if(isset($_POST['UI']) && $_POST['UI'] == "edit_entry"){
      $category = $_POST['category'];

        $select = $connect->query("SELECT * FROM publications WHERE category = '".$category." ' ");
                              
                              if ($select->num_rows == 0) {
                                //no entry exists with that serial
                                echo '<div class="text-center" style="color:red;margin-top:84px;"><h3>Oops! <br/> No existing entry <br/> in the<br/> '.$category.' category.</h3></div>';

                                } else {


                                      while($rows = $select -> fetch_assoc()) {

                                                $serial = $rows['serialID'];
                                                $src = str_replace('../', '', $rows['image']);
                                                $title = $rows['title'];
                                                
                                        $items .= '
                                                      <div class="row admin_list" onclick="edit_entry(\''.$serial.'\')">

                                                          <div class="col-3" style="padding: 5px;">
                                                          <img  class="rounded-circle img-fluid admin_list_tnail" src="'.$src.'" width="80%"></div>

                                                          <div class="col">
                                                              <h3 class="admin_list_title">'.$title.'</h3>
                                                          </div>

                                                          <div class="col-2" style="width: 25%;
                                                                  max-width: 25% !important;"><i class="material-icons admin_list_icon" >edit</i></div>
                                                                                                                        </div>
                                                      ';
                                          }

                                          echo '<div class="container" style="margin-top:20px;">'.$items.'</div>';
                          
                                }

        
        
    }

    if(isset($_POST['UI']) && $_POST['UI'] == "delete_entry"){

     $category = $_POST['category'];

        $select = $connect->query("SELECT * FROM publications WHERE category = '".$category." ' ");
                              
                              if ($select->num_rows == 0) {
                                //no entry exists with that serial
                                echo '<div class="text-center" style="color:red;margin-top:84px;"><h3>Oops! <br/> No existing entry <br/> in the<br/> '.$category.' category.</h3></div>';

                                } else {


                                      while($rows = $select -> fetch_assoc()) {

                                                $serial = $rows['serialID'];
                                                $src = str_replace('../', '', $rows['image']);
                                                $title = $rows['title'];
                                                
                                        $items .= '
                                                      <div class="row admin_list" onclick="delete_entry(\''.$serial.'\')">

                                                          <div class="col-3" style="padding: 5px;">
                                                          <img  class="rounded-circle img-fluid admin_list_tnail" src="'.$src.'" width="80%"></div>

                                                          <div class="col">
                                                              <h3 class="admin_list_title">'.$title.'</h3>
                                                          </div>

                                                          <div class="col-2" style="width: 25%;
                                                                  max-width: 25% !important;"><i class="material-icons admin_list_icon" >delete_forever</i></div></div>
                                                                                           ';
                                          }

                                          echo '<div class="container" style="margin-top:20px;">'.$items.'</div>';
                          
                                }
        
    }

       
if(isset($_POST['action']) && ($_POST['action'] == "add_entry" || $_POST['action'] == "edit_entry")){


  $action = $_POST['action'];
  //only used here, not sent to database
  $type = $_POST['type']; 
  $id = $_POST['fileID'];
  //$fileName = $_POST['fileName'];
  //$id = $_POST['id'];

  //echo 'gdfdgg'.$_FILES [$fileID]["name"]; passsed
  //die();


  $serial = $_POST['serial'];
  


  if($_POST['type'] == "image"){

      
      $title = $_POST['title'];
      $description = $_POST['description'];
      $category = $_POST['category']; //movieMagazine, Ebook, or media

      if($action == 'edit_entry'){

              //serial, title, description, category must have been entered already.
                                  $stmt= $connect -> prepare ("UPDATE publications SET title =?, description=? WHERE serialID  = ?");

                                  $stmt -> bind_param ("sss", $title, $description, $serial);
                                  //set parameters and execute

                                  if($stmt -> execute()){

                                    if(mysqli_error($connect)){
                                      echo $stmt->error;
                                     
                                     //echo 'an error occured. pls try again';
                                          } else{
                                            
                                             upload($id, $type, $serial, $connect);
                                          }
                                  } else{
    
                                        //echo $stmt->error; 
                                       echo 'an error occured. pls try again';
                                      }
      }//if edit_entry
      else {
                $select = $connect->query("SELECT serialID FROM publications WHERE serialID = '".$serial." ' ");
                              
                if ($select->num_rows == 0) {
                                //no entry exists with that serial

                       //first create an entry and insert the lite values
                          $stmt= $connect -> prepare ("INSERT INTO publications (serialID, title, description,category) VALUES (?,?,?,?)");

                           $stmt -> bind_param ("ssss", $serial, $title, $description,$category);
                        //set parameters and execute
                         

                         if($stmt -> execute()){

                                    if(mysqli_error($connect)){
                                      echo $stmt->error;
                                     
                                     //echo 'an error occured. pls try again';
                                          } else{
                                            
                                             upload($id, $type, $serial, $connect);
                                          }
                              } else{
                              
                                  //echo $stmt->error; 
                                 echo 'an error occured. pls try again'.$stmt->error;
                                }


                   } // end of if not serial exists
                                else {

                                    //serial, title, description, category must have been entered already.
                                  $stmt= $connect -> prepare ("UPDATE publications SET title =?, description=? WHERE serialID  = ?");

                                  $stmt -> bind_param ("sss", $title, $description, $serial);
                                  //set parameters and execute

                                  if($stmt -> execute()){

                                    if(mysqli_error($connect)){
                                      echo $stmt->error;
                                     
                                     //echo 'an error occured. pls try again';
                                          } else{
                                            
                                             upload($id, $type, $serial, $connect);
                                          }
                                  } else{
    
                                        //echo $stmt->error; 
                                       echo 'an error occured. pls try again';
                                      }
                                   

    }

  }// if not edit-entry
  }  //if image

   else {  //skip to file upload

                        //serial, title, description, category must have been entered already.

                             upload($id, $type, $serial, $connect);
                                }

  //close connection.
  //$stmt -> close();

  }


}


if(isset($_POST['action']) && $_POST['action'] == "edit_item_UI"){

  $id = $_POST['id'];


  $select = $connect->query("SELECT * FROM publications WHERE serialID = '".$id." ' ");
                              
                              if ($select->num_rows == 0) {
                                //no entry exists with that serial
                                echo '<div class="text-center" style="color:red;margin-top:84px;"><h3>Oops! <br/> /invalid item ID detected.</h3></div>';

                                } else {


                                      $row = $select -> fetch_assoc();

                                                //$serial = $rows['serialID'];
                                                $src = str_replace('../', '', $row['image']);
                                                $title = $row['title'];
                                                $description = $row['description'];

                                                
                                        $item_to_edit = '<div class="login-clean">
                                                          <span id="ID_to_edit" style="display:none;">'.$id.'</span>
                                                        <form >
                                                            <h2 class="sr-only">Upload Form</h2>
                                                            <div class="illustration"><img id="preview_" class="rounded img-fluid" src="'.$src.'"></div>
                                                            <div class="form-group">
                                                                <div class="upload-btn-wrapper"><input type="file" id="thumbnail_"  class="text" name="thumbnail_" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;">
                                                                <button id="thumbnail_btn" class="btn btn-primary btn-block btn text" type="button" onclick="triggerUpload(\'thumbnail_\');"><span id="thumbnail_text"  class="text">Upload Preview Image</span></button>
                                                                </div>
                                                            </div>
                                                            <div id="thumbnail_progress_bar" class="upload-btn-wrapper progress_bar"><img src="assets/img/YVPG.gif" /></div>
                                                            <div class="form-group">
                                                            <input id="title_" class="form-control text" type="text" name="Title" placeholder="Title" value="'.$title.'"></div>
                                                            <div class="form-group">
                                                            <textarea id="description_" class="form-control form-control-lg text" wrap="hard" name="Description" required="" placeholder="Description" style="height:120px;">'.$description.'</textarea></div>
                                                            <div class="form-group">
                                                                <div class="upload-btn-wrapper"><input type="file"  id="file_"   class="text" style="height:12px;margin-top:5%;width:90%;background-color:#ffffff;"><button  class="btn btn-primary btn-block btn text" type="button"><span id="file_text" onclick="triggerUpload(\'file_\');">Upload File</span></button></div>
                                                            </div>
                                                            <div id="file_progress_bar" class="upload-btn-wrapper progress_bar"><img src="assets/img/YVPG.gif" /></div>
                                                            <div class="form-group"><button id="add_entry_button" class="btn btn-primary btn-block text" onclick="uploadEntry();">Submit Upload</button></div>
                                                        </form>
                                                  </div> 


                                                    <script>

                                                      function readURL(input) {
                                                      if (input.files && input.files[0]) {
                                                          var reader = new FileReader();

                                                          reader.onload = function (e) {
                                                              $("#preview_").attr("src", e.target.result);
                                                          }

                                                          reader.readAsDataURL(input.files[0]);
                                                      }
                                                  }

                                                  $("#thumbnail_").change(function(){
                                                      readURL(this);
                                                  });

                                                   </script>

                                                  ';

                                                  echo $item_to_edit;


                                      }

}



if(isset($_POST['action']) && $_POST['action'] == "delete_item"){

  $id = $_POST['id'];


  $select = $connect->query("SELECT * FROM publications WHERE serialID = '".$id." ' ");
                              
                                      $row = $select -> fetch_assoc();

                                                //$serial = $rows['serialID'];
                                                $image_ =  $row['image'];
                                                $file_ = $row['file'];
                                               

                                if(unlink($file_)){

                                       if(unlink($image_)){

                                                 $delete_publication = $connect->query("DELETE FROM publications WHERE serialID = '".$id." ' ");
                              
                                                       if ($delete_publication) {
                                                  echo "deleted";
                                                            } else{
                                                              echo "error";
                                          
                                                                  }

                                          } else{ echo 'Image delete action failed'; }
                                  } else{ echo 'file delete action failed'; }
              


            

}


if(isset($_POST['action']) && isset($_POST['serial']) && $_POST['action'] == 'download' ){
    
    $serial = $_POST['serial'];
    
    $select = $connect->query("SELECT file FROM publications WHERE serialID = '".$serial." ' ");
                              
                                      $row = $select -> fetch_assoc();
                                     
                                      $file = str_replace('../', '', $row['file']);
                                      //$file = $row['file'];
                                      
                                       //header("Location: ".$file);
                                       
                                       /*$file = base_url(TRUE)."http://example.com/go.exe"; 

                                        header("Content-Description: File Transfer"); 
                                        header("Content-Type: application/octet-stream"); 
                                        header("Content-Disposition: attachment; filename=\"". basename($file) ."\""); 
                                        
                                        readfile ($file);
                                        exit(); */
                                       
                                       echo $file;
    
}





 //To upload a sense making image/file to the server 
   function upload($id, $type, $serial ,$connect){

     $target_dir="../uploads/"; //directory where photos are to be stored on server hard-drive 
     $uploaded_file= $target_dir.basename($_FILES[$id] ["name"]); //original name of uploaded image
     $FileType= strtolower(pathinfo($uploaded_file,PATHINFO_EXTENSION)); //extracts image extension e. g Png, gif... you know

      //echo " ";

     $target_file= $target_dir.$type.$serial.".".$FileType; //the new name I'm giving to the uploaded photo. I can't shout : nokia2312112pic1.jpg for example
     $uploadOk=1;  //my validation police

     if($type === "image"){

        $check = getimagesize($_FILES[$id] ["tmp_name"]);  //To check if user attempts to upload one nonsense file that is not an image. They will meet me here.
     } else {
         $check = $_FILES[$id] ["size"];  //To check if user attempts to upload one nonsense file that is not an image. They will meet me here.
         //echo $check;
         //die();

     }
    
     //list($width, $height) = getfilesize($_FILES[$fileID] ["tmp_name"]); //detect image dimensions
    
     
    
     
      if ($check ==false){
          echo "Invalid File";
          $uploadOk=0; }
          
      else {
            if($type == "image"){

                //if picture is larger than 600kb
            if($_FILES[$id] ["size"] > 600000){
              echo "Image should not be more than 600kb";
              $uploadOk=0; }
      
            if($FileType != "jpg" && $FileType !="png"
               && $FileType!="jpeg" && $FileType!="gif" && $FileType!="webp"){

              echo 'invalid format';
            /*echo 'Only picture files with : jpg, png, jpeg and gif are allowed</p>';*/
            $uploadOk=0; }

        } else { //if not image

            //echo 'file entry'; passed
            //die();

                 //if file is larger than 3mb
            if($_FILES[$id] ["size"] > 3000000){
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
                     $select = $connect->query("SELECT ".$type." FROM publications WHERE serialID = '".$serial." ' ");
                     $row= $select -> fetch_assoc();
                     $oldFile = $row[$type]; //omit file extension as that could change

                     //echo $oldFile;
                     //die();
                     $newFile=$target_file;

                     $name = substr($oldFile, strlen("../uploads/".$type.$serial), 1);

                     //echo $name;

             if($name == "."){
                $int = 1;
              }else{
                $int = abs( ((int)$name) - rand(2,9));
              } 
              
           if ( $oldFile == NULL){ 
                $target_file= $target_dir.$type.$serial."1.".$FileType; //the ne
                $newFile=$target_file;


                $update = "UPDATE publications SET ".$type." = '".$newFile."'  where serialID  = '".$serial."'"; //update image path on Db 
                //update image path Db 
                $connect->query($update);
                $connect ->close();
            } //end of no old pic found

            else{ // if old pic found

               // $newFile = $target_file;
                

              if(!unlink($oldFile)){
                echo "error unlinking file.";
              }
              
         ///  } 

              $target_file= $target_dir.$type.$serial.$int.".".$FileType; //the ne

              $newFile=$target_file;

              $update = "UPDATE publications SET ".$type." = '".$newFile."'  where serialID  = '".$serial."'"; //update image path on Db 

              $connect->query($update);
              $connect ->close();
              
           }

         
             
       if (move_uploaded_file($_FILES[$id] ["tmp_name"] , $target_file)){
            //$_SESSION['profileId'];
            echo 'Successful!';

            //echo '<script> currentPic ="'.$target_file.'" </script>';
            
          }
            
      } //end of uploadOk not 0

    }//end of function
    
    
    
    
    


?>
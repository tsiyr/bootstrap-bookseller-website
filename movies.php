<?php
session_start();

require_once('./includes/db_info_inc.php');

$items ="";

if (!$connect){
    die("Connection failed. check if database exists and try again". $db_connection -> connect_error);
         }

       

            $output=$productName=$price=$Specs="";

               //get page Number from url
            parse_str($_SERVER['QUERY_STRING'], $output);

            if (isset($output['category']) && strlen($output['category'])>3) {
            //$productId = $output['pid'];
            $category =  trim($output['category']);

             }else{
                die(header ("Location: index"));
      
             }

            if($category == 'MovieMagazine' ||$category == 'Ebook' || $category == 'Media'){

                    $select = $connect->query("SELECT * FROM publications WHERE category = '".$category." ' ");
                              
                              if ($select->num_rows == 0) {
                                //no entry exists with that serial
                                echo '<div class="text-center" style="color:red;margin-top:84px;"><h3>Oops! <br/> No existing entry <br/> in the<br/> '.$category.' category. <br/>Pls check back later.</h3></div>';

                                } else {


                                      while($rows = $select -> fetch_assoc()) {

                                                $serial = $rows['serialID'];
                                                $src = str_replace('../', '', $rows['image']);
                                                $title = $rows['title'];
                                                $description = $rows['description'];
                                                
                                        $items .= '
                                                      <div class="col-sm-6 col-md-3" >
                                                            <div class="card"><img class="rounded card-img-top w-100 d-block thumbnail_img" src="'.$src.'">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">'.$title.'</h4>
                                                                    <p class="card-text block-with-text">'.$description.'</p>

                                                                    <button class="btn btn-primary" type="button" style="border-color:#63c5da;background-color:#63c5da;" onclick="download(\''.$serial.'\')">Download<i class="icon ion-android-download" style="margin-left:12px;"></i></button></div>
                                                            </div>
                                                        </div>
                                                      ';
                                          }

                          
                                }

        
        

            } else {die(header ("Location: index"));}

            //sanitize id and category to curb sql injection
  ?>          

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniels</title>
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
</head>

<body>
    <div>
         <?php include_once('./includes/navbar.html'); ?>
    </div>


    <div id="thumbnails" style="margin-top:100px; margin-bottom:40px;">
        <div class="container">
            <div class="row">
                <?php echo $items; ?>
            </div>
        </div>
    </div>

    <div class="footer-dark">
        <?php include_once('./includes/footer.html'); ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/engine.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
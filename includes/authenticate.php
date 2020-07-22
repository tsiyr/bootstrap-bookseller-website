<?php
session_start();

$nav_button="";
require_once('db_info_inc.php');


if (!$connect){
    die("Connection failed. check if database exists and try again");
         }

        $codes="";    
           

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


      if($_POST['task'] == "authenticate"){

        $passCode = trim($_POST['passCode']);

        //expected passcode format:
        //1st initial of day e.g, "f" for friday
        //ist initial of month e.g "j" for july
        //year e.g 2019
        //then laplace_24
        //e.g fj2019laplace_24

        $day = strtolower(date("l")[0]);
        $month = strtolower(date("F")[0]);
        $year = strtolower(date("Y"));

        $pcode = $day.$month.$year."yap_124";

        if ($passCode==$pcode){

          $_SESSION['User'] = "Daniels";

          echo "pass"; //correct
        } else {echo $passCode." ".$pcode;  //wrong code
                }



      }

      //echo "hmm";


}//if verify


     

?>
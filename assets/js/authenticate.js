function passcode(){

  //detect current product category
  var passcode_ = $("#passcode_").val().trim();

  //alert(passcode_);

  if(passcode_.length < 4 || passcode_.length > 60){
    alert("invalid passcode detected \n 4 to 60 chars expected.");
  } 

  else {

    //alert(passcode_);

  
  var form_data = new FormData();
   form_data.append('passCode', passcode_);
   form_data.append('task', "authenticate" );

   $.ajax({
    url:"./includes/authenticate.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,

    beforeSend:function(){
    //alert(id+" "+infoId);  pass
     $("#proceed_btn").attr('disabled','disabled');
     $("#proceed_").text("Please wait...");
    }, 

    success:function(data)
    {

     $("#proceed_btn").removeAttr('disabled');
     $("#proceed_").text("Redirecting...");

     if(data ==="pass"){

      window.location.href = "./Admin.php";
    
        } else {

          $("#proceed_").text("Try Again");

        }

    }

   });


}//else

 }
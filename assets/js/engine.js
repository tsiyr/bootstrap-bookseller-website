
var num = 1;
var num2;

//change the movie mags thumbnail every z secs
setInterval( picture_anim, 2000);


function picture_anim(){
  
  num2 = generateRandomNumber(); //1-3
	
		while(num == num2){

			num2 = generateRandomNumber();
		}


		num = num2;

    		var image = $("#movie_mag_tnail_home");
    		image.fadeOut('slow', function () {
        	image.attr('src', './assets/img/'+num2+'_.jpg');
        	image.fadeIn('slow');
    		});
  
}


function generateRandomNumber(){

	 return Math.floor((Math.random() * 4) + 1); //e.g 3

}


function goto(category){
	window.location.href = "./publications.php?category="+category;
}


function  download_file(serial){
    
    //alert(serial);
       
       var form_data = new FormData();

                    	form_data.append('serial', serial);
                    	form_data.append('action', 'download');

                         $.ajax({

                          url:"includes/add_edit_entry.php",
                          type:"POST",
                          data: form_data,
                          contentType: false,
                          processData: false,

                          beforeSend:function(){

                          	/* $( "#container_" ).html(waitScreen);*/
                         
                          },   
                          success:function(data){
                              
                            //var fileURL = window.location.origin+data;
                            var fileURL = data;
                            
                            //alert(fileURL);

                          	window.open(fileURL, '_blank'); 
                          		
                         	//alert(window.location.origin+data);
                          }

                         }); //end of Ajax

       
    
    }

                            
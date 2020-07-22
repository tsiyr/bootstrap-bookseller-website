var output=status ='';
//had to bind the submit function to body cos
//form is not present when code is run, form is
//added dynamically
$("body").on('submit', 'form', function(e) {
    //alert('submit intercepted');
    e.preventDefault(e);
});


function triggerUpload(id){
		$('#'+id).trigger('click');
		
		$('#'+id).change(function() {
			var filename = $('#'+id).val().replace(/C:\\fakepath\\/i, '');
			var pivot = filename.lastIndexOf('.'); 
			//alert (filename.length-(pivot+1));
			if(filename.length>5){
				pivot_ = 5;
			}
			var prefix = filename.substr(0,pivot_)
			var suffix = filename.substr(pivot,((filename.length)-pivot));
			var abbreviatedFilename = prefix+"..."+suffix;
			$('#'+id+"text").text(abbreviatedFilename+' now in queue...');
			
   			 //alert(filename); passed
		});
		
}



var idleScreen = `<div id="idle-display" style="height:500px;" class="text-center"><img src="assets/img/idle.png" width="150px" style="margin-top: 120px; margin-left:auto; margin-right:auto;"></div>`;

var waitScreen = `<div id="wait-display" style="height:500px;" class="text-center">
<img src="assets/img/spinner.gif" width="70px" style="margin-top: 120px;">
</div>`;

$( "#container_" ).html(idleScreen);

var selectScreen =`<div id="select_block">
        <div class="container">
            <div class="row" style="height:100vh;">
                <div class="col-md-12 text-center" style="/*display:inline-block;*/">
                    <select id="categoryId" class="form-control-lg" name="category" style="height:70px;padding:20px;margin-right:auto;margin-left:auto;margin-top:20vh;" onchange="selectedoption()"><option value="" selected="">Pls Select a Category</option><option value="MovieMagazine" >Movie Magazine</option><option value="Ebook">EBooks</option><option value="Media">Media</option><option value="Stories">Stories</option></select></div>
            </div>
        </div>
    </div>`;


//menu buttons 
$( "#add_entry" ).click(function() {

	$( "#action_" ).text("add_entry");
  
  show_select_category_UI();

});

$( "#edit_entry" ).click(function() {

	$( "#action_" ).text("edit_entry");
  
  show_select_category_UI();

});

$( "#delete_entry" ).click(function() {

	$( "#action_" ).text("delete_entry");
  
  show_select_category_UI();

});
//last of menu buttons


function show_select_category_UI(){
	$( "#container_" ).html(selectScreen);
}


function selectedoption(){
  //tracks what btn was clicked
  var option = $("#categoryId").val();
  $("#category_").text(option);
  // alert("you selected: "+option+" ,in: "+action+"!"); passed

  $( "#container_" ).html(selectScreen);


  if(option.length>3){


		selected_UI();

  }//end of if


  }


  function selected_UI(){

  	var action = $("#action_").text();
  	var option = $("#category_").text();

 			 var form_data = new FormData();
                     form_data.append('UI', action);
                     form_data.append('category', option);
                    
                       $.ajax({
                        url:"includes/add_edit_entry.php",
                        method:"POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,

                        beforeSend:function(){
                        
                         $( "#container_" ).html(waitScreen);
                         
                        }, 

                        success:function(data)
                        {
                        	//alert(data);
                          $( "#container_" ).html(data);
                        }

                       });

  }



  function ajaxFileUpload(id){

 $("#status_").text("");

  var serial ='';

  var category = $("#category_").text();
  var action = $("#action_").text();

  if (action =='edit_entry'){
  	serial= $("#ID_to_edit").text();
  }else{
  	serial= $("#serial_").text();
  }

  //alert(category);
  var proceed = 0;

  //var infoId, f, currentPic; 

  //var _URL = window.URL || window.webkitURL;
 
  var file = document.getElementById(id).files[0];
  var name = document.getElementById(id).files[0].name;

  if(name.length < 2){
  	alert('pls select a file/image to proceed');
  	proceed = 0;
  }

  
            var ext = name.split('.').pop().toLowerCase();

           	if(id == "thumbnail_"){

           		 if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','webp']) == -1) 
			            {
			             proceed = 0;
			             alert("Invalid Image File");
			            }


           	} else { //if id is not an image i.e is a file
			           		 if(jQuery.inArray(ext, ['pdf','txt','doc','docx','xls']) == -1) 
						            {
						             proceed = 0;
						             alert("Invalid File Format");
						            }
           			}
           


            var fsize = file.size||file.fileSize;
            //x.includes = x contains!
           if(id.includes("thumbnail_")){

           		 if(fsize > 600000)
		              {//600kb
		                proceed = 0;
		               alert("Image File is "+(fsize/1000)+"kB large. < 600kb expected.");
		              }

             else{proceed = 1;}

           } else {

           	if(fsize > 2000000)
		              { //2mb
		                proceed = 0;
		               alert("File Size is "+(fsize/1000)+"kB large. < 600kb expected.");
		              }

             else{proceed = 1;}
           }


                  if(proceed == 1)
                        {
                          var form_data = new FormData();

                          // common to both instances
                          form_data.append('action', action);
                          form_data.append('serial', serial);
                          form_data.append('fileID', id); 
                           form_data.append(id, file);

                          //alert(name);

                          if(id.includes("thumbnail_")){

                          	var title= $("#title_").val().trim().replace('"', '');

  							var description= $("#description_").val().trim().replace('"', '');

                          	form_data.append('category', category);
                          	form_data.append('title', title);
                          	form_data.append('description', description);
                          	form_data.append('type', 'image'); 

                          } else {
                          	form_data.append('type', 'file'); 
                          }
                          

                         $.ajax({

                          url:"includes/add_edit_entry.php",
                          type:"POST",
                          data: form_data,
                          contentType: false,
                          processData: false,

                          beforeSend:function(){
                            $("#"+id+"progress_bar").css('display','block');
                          	$("#add_entry_button").attr('disable',true);
                          
                          if(id == "thumbnail_"){
                          	 $("#thumbnail_text").html("Uploading Image...");
                          } else {
                          	 $("#file_text").html("Uploading File...");
                          }
                          
                           /*$("#"+id+"_preview").attr("src", "assets/img/spinner.gif");*/
                          },   
                          success:function(data){
                              $("#"+id+"progress_bar").css('display','none');

                          		$("#status_").text(data.trim());
                          		if(id == 'thumbnail_'){
                          			checkStatus('file_');
                          		}else{checkStatus('after_file_upload_attempt');}
                          		
                          }

                         }); //end of Ajax

                        }  



           //return 'done';



     }; //end of function


  function uploadEntry(){
  var proceed = 1;
  

  //from form
  var title = $("#title_").val().trim();
  var description = $("#description_").val().trim();
  var image = $("#thumbnail_").val().trim();
  var file = $("#file_").val().trim();

  if(title.length < 5){
  	alert("Pls enter a valid Title");
  	proceed = 0;
  }

  if(description.length < 7){
  	alert("Pls enter a valid description");
  	proceed = 0;
  }

  if(file.length < 5){
  	alert("Pls select a file");
  	proceed = 0;
  }

  if(image.length < 5){
  	alert("Pls select an image");
  	proceed = 0;
  }

  if(proceed){

ajaxFileUpload("thumbnail_");


  }//proceed


}//function end

 
 function checkStatus(id){
 	status = $("#status_").text().trim();

 	if(id =="after_file_upload_attempt"){
 		if(status == "Successful!"){
 			$("#thumbnail_text").html("File Uploaded!");
 			alert('upload completed');
 			$( "#container_" ).html(idleScreen);
 		}else{$("#add_entry_button").attr('disable',false); alert('file upload failed'+status);}
 	} 
 	else{
 	 if(status == "Successful!"){
 	 	$("#thumbnail_text").html("Image Uploaded!");
 	 	//alert('image upload pass. begining file upload');
 	 	ajaxFileUpload(id);
 	 }else{$("#add_entry_button").attr('disable',false); alert('image upload failed'+status);}
 	}

 };


function edit_entry(id){

	var form_data = new FormData();

	form_data.append('id', id);
	form_data.append('action', 'edit_item_UI');
  

                         $.ajax({

                          url:"includes/add_edit_entry.php",
                          type:"POST",
                          data: form_data,
                          contentType: false,
                          processData: false,

                          beforeSend:function(){

                          	 $( "#container_" ).html(waitScreen);
                         
                          },   
                          success:function(data){

                          		$( "#container_" ).html(data);
                         
                          		
                          }

                         }); //end of Ajax

                        } 


function delete_entry(id){

	var form_data = new FormData();

	form_data.append('id', id);
	form_data.append('action', 'delete_item');
  

                         $.ajax({

                          url:"includes/add_edit_entry.php",
                          type:"POST",
                          data: form_data,
                          contentType: false,
                          processData: false,

                          beforeSend:function(){

                          	 $( "#container_" ).html(waitScreen);
                         
                          },   
                          success:function(data){

                          	$("#status_").text(data.trim());
                          	var status = $("#status_").text();
                          	 if(status =="deleted"){
                          		selected_UI();
                          	}else { alert("delete action failed. retry"+status); selected_UI();
                          }
                          		
                         	
                          }

                         }); //end of Ajax

                        } 
                        
                        
   
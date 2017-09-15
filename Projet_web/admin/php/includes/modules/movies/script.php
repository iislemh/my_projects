<script type="text/javascript" >
    $(function(){       
        $(".picturePoster").click(function() {
            $title = $("#selected .title span").html().toLowerCase().replace(/\s+/g, '_');
            $type = "Poster";
            
            console.log($title.toLowerCase());
            var btnUpload=$('.uploadPoster');
            var status=$('#status');
            new AjaxUpload(btnUpload, {
                action: 'php/uploads/upload-file.php',
                name: 'uploadfile',
                onSubmit: function(file, ext){    
                    if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                        // extension is not allowed 
                        status.text('Only JPG, PNG or GIF files are allowed');
                        return false;
                    }
                    
                    status.text('Uploading...');
                },
                data: {title: $title, type: $type},
                onComplete: function(file, response){
                    //On completion clear the status
                    status.text('');
                    //Add uploaded file to list
                    if(response==="success"){
                        alert("Success ! :)");
                    } else{
                        alert("Failure ! :(");
                    }
                }
            });
            
        });
        
        $(".pictureCover").click(function() {
            $title = $("#selected .title span").html().toLowerCase().replace(/\s+/g, '_');
            $type = "Cover";
            
            console.log($title.toLowerCase());
            var btnUpload=$('.uploadCover');
            var status=$('#status');
            new AjaxUpload(btnUpload, {
                action: 'php/uploads/upload-file.php',
                name: 'uploadfile',
                onSubmit: function(file, ext){    
                    if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                        // extension is not allowed 
                        status.text('Only JPG, PNG or GIF files are allowed');
                        return false;
                    }
                    
                    status.text('Uploading...');
                },
                data: {title: $title, type: $type},
                onComplete: function(file, response){
                    //On completion clear the status
                    status.text('');
                    //Add uploaded file to list
                    if(response==="success"){
                        alert("Success ! :)");
                    } else{
                        alert("Failure ! :(");
                    }
                }
            });
            
        });
        
    });
</script>
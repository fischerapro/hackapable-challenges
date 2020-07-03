<?php
$display = "";
if (isset($_POST['Upload'])) {

            
            $target_path = "uploads/";
            $target_path = $target_path . basename($_FILES['uploaded']['name']);
            $uploaded_name = $_FILES['uploaded']['name'];
            $uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
            $uploaded_size = $_FILES['uploaded']['size'];

            if (($uploaded_ext == "jpg" || $uploaded_ext == "JPG" || $uploaded_ext == "php" || $uploaded_ext == "jpeg" || $uploaded_ext == "JPEG") && ($uploaded_size < 100000)){


                if(!move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {
                    
                    $display.= '<div class="alert alert-danger" role="alert">';
                    $display.= 'Your image was not uploaded.';
                    $display.= '</div>';
                
                  } else {
                
                    $display.= '<div class="alert alert-success" role="alert">';
                    $display.= ' succesfully uploaded! <br /> link : ' . $target_path ;
                    $display.= '</div>';
                    
                    }
            }
            
            else{
                
                $display.= '<div class="alert alert-danger" role="alert">';
                $display.= 'Your image was not uploaded.';
                $display.= '</div>';

            }
        }

?> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>File Upload</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
  </head>
<body>
  <div class="login-form">
    <form enctype="multipart/form-data" action=""  method="POST">
<?php echo $display; ?>
         <h2 class="text-center">Image-Sharing.xyz</h2>       
          <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
            Choose an image to upload:
            <br />
            <input name="uploaded" type="file" /><br />
          </div>
              <div class="form-group">
                  <button type="submit" id="submit" name="Upload" value="Upload" class="btn btn-primary btn-block">Upload</button>
            </div>
            <div class="clearfix">
          </div>        
    </form>
  </div>
</body>
</html>
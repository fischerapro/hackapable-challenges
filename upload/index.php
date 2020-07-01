<?php
if (isset($_POST['Upload'])) {

            $target_path = "uploads/";
            $target_path = $target_path . basename($_FILES['uploaded']['name']);
            $uploaded_name = $_FILES['uploaded']['name'];
            $uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
            $uploaded_size = $_FILES['uploaded']['size'];

            if (($uploaded_ext == "jpg" || $uploaded_ext == "JPG" || $uploaded_ext == "php" || $uploaded_ext == "jpeg" || $uploaded_ext == "JPEG") && ($uploaded_size < 100000)){


                if(!move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {
                    
                    echo '<pre>';
                    echo 'Your image was not uploaded.';
                    echo '</pre>';
                
                  } else {
                
                    echo '<pre>';
                    echo $target_path . ' succesfully uploaded!';
                    echo '</pre>';
                    
                    }
            }
            
            else{
                
                echo '<pre>';
                echo 'Your image was not uploaded.';
                echo '</pre>';

            }
        }

?> 

<h1>Vulnerability: File Upload</h1>

    <div class="vulnerable_code_area">

        <form enctype="multipart/form-data" action="#" method="POST" />
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
            Choose an image to upload:
            <br />
            <input name="uploaded" type="file" /><br />
            <br />
            <input type="submit" name="Upload" value="Upload" />
        </form>

      
<?php
$files_zipear = $_FILES['archivo_zipear']['name'];
$tipoFile = $_FILES['archivo_zipear']['type'];

    $extension = end(explode(".", $_FILES['archivo_zipear']['name']));


    if(($tipoFile == "application/x-zip-compressed") && ($extension == "zip"))

        {

            if (move_uploaded_file($_FILES['archivo_zipear']['tmp_name'],"files/".$_FILES['archivo_zipear']['name']) )
                {
                    
                    $p = "EL archivo " . $_FILES['archivo_zipear']['name'] . " ha subido correctamente.";

                    echo "<script type=\"text/javascript\">alert(\"$p\");</script>"; 
                }
        
            else
                {

                    echo "<script type=\"text/javascript\">alert(\"No se pudo subir su archivo" . $files_zipear . "Error Processing Request\");</script>"; 
                    
                }
        }
    

    else
        {

            echo "<script type=\"text/javascript\">alert(\"Este archivo no es válido. Intenta de nuevo.\");</script>";

        }

?>



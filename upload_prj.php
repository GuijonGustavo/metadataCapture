<?php
    $files = $_FILES['archivo']['name'];
    $tipoFile = $_FILES['archivo']['type'];

    echo $tipoFile;

    $extension = end(explode(".", $_FILES['archivo']['name']));
 

    if(($tipoFile == "application/octet-stream") && ($extension == "prj"))
        {

            if (move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$_FILES['archivo']['name']) )
                {
                    $p = "EL archivo " . $_FILES['archivo']['name'] . " ha subido correctamente.";


                    echo "<script type=\"text/javascript\">alert(\"$p\");</script>"; 
                }
        
            else
                {

                    echo "<script type=\"text/javascript\">alert(\"No se pudo subir su archivo. Error Processing Request\");</script>"; 
                    
                }
        }
    

    else
        {

            echo "<script type=\"text/javascript\">alert(\"Este archivo no es válido\");</script>"; 
        }

?>



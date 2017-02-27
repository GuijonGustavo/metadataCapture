<?php
    $files_prj = $_FILES['archivo_prj']['name'];
    $tipoFile = $_FILES['archivo_prj']['type'];

    $extension = end(explode(".", $_FILES['archivo_prj']['name']));
 

    if(($tipoFile == "application/octet-stream") && ($extension == "prj"))
        {

            if (move_uploaded_file($_FILES['archivo_prj']['tmp_name'],"files/".$_FILES['archivo_prj']['name']) )
                {
                    $p = "EL archivo " . $_FILES['archivo_prj']['name'] . " ha subido correctamente.";


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



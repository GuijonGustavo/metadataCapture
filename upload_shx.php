<?php

    $files_shx = $_FILES['archivo_shx']['name'];
    $tipoFile = $_FILES['archivo_shx']['type'];

    $extension = end(explode(".", $_FILES['archivo_shx']['name']));
 

    if(($tipoFile == "application/x-esri-shape") && ($extension == "shx"))
        {

            if (move_uploaded_file($_FILES['archivo_shx']['tmp_name'],"files/".$_FILES['archivo_shx']['name']) )
                {
                    $p = "EL archivo " . $_FILES['archivo_shx']['name'] . " ha subido correctamente.";


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



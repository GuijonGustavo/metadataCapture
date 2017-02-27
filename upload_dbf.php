<?php

    $files_dbf = $_FILES['archivo_dbf']['name'];
    $tipoFile = $_FILES['archivo_dbf']['type'];

    $extension = end(explode(".", $_FILES['archivo_dbf']['name']));
 

    if(($tipoFile == "application/x-dbf") && ($extension == "dbf"))
        {

            if (move_uploaded_file($_FILES['archivo_dbf']['tmp_name'],"files/".$_FILES['archivo_dbf']['name']) )
                {
                    $p = "EL archivo " . $_FILES['archivo_dbf']['name'] . " ha subido correctamente.";


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



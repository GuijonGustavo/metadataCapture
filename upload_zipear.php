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

getcwd();
chdir("files");

                        $nombreSinExtension = reset(explode(".", $files_zipear));

$url_enviar='curl -u admin:vS9UI355#ea9 -H "Content-type: application/zip" -T ${TRAINING_ROOT}/var/www/html/metadataCapture/files/'. $files_zipear . ' http://ssig0.conabio.gob.mx:8080/geoserver/rest/workspaces/myworkspace/datastores/' . $nombreSinExtension . '/file.shp';

shell_exec($url_enviar);

$mover_zip='mv '.$files_zipear . ' basura/';

shell_exec($mover_zip);

echo "<script type=\"text/javascript\">alert(\"Se han enviado los archivos a la CONABIO\");</script>"; 

?>



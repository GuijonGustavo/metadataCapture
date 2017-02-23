<?php

//comprobamos que sea una petición ajax
//if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
//{





    $files = $_FILES['archivo']['name'];
    $tipoFile = $_FILES['archivo']['type'];

    $extension = end(explode(".", $_FILES['archivo']['name']));
 

    if(($tipoFile == "application/x-esri-shape") && ($extension == "shp"))
        {

            if (move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$_FILES['archivo']['name']) )
                {
                    echo "EL archivo " . $_FILES['archivo']['name'] . " ha subido correctamente<br>";
                }
        
            else
                {

                    echo "No se pudo subir su archivo. Error Processing Request";
                }
        }
    

    else
        {
            echo "Este archivo no es válido";
        }


//}
    
//Sección para hacer el ZIP

//$zip = new ZipArchive();

//$filename = 'test.zip';

//if($zip->open($filename,ZipArchive::CREATE)===true) {
//    $zip->addFile("files/*.*");
//    $zip->close();
//    echo 'Creado '.$filename;
//}
//else {
//    echo 'Error creando '.$filename;
//}

?>



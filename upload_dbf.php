<?php

//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
//if(isset($_POST["archivo"])){




    $files = $_FILES['archivo']['name'];
    $tipoFile = $_FILES['archivo']['type'];

    echo $tipoFile;

    $extension = end(explode(".", $_FILES['archivo']['name']));
 

    if(($tipoFile == "application/x-dbf") && ($extension == "dbf"))
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



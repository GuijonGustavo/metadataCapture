<?php
            
//Sección para hacer el ZIP


$zip = new ZipArchive();

$filename = 'files/test.zip';

if($zip->open($filename,ZipArchive::CREATE)===true)
    {
    
        $zip->addFile("files/todo.txt");
        $zip->addFile("files/nada.txt");
        $zip->close();
        echo "<script type=\"text/javascript\">alert(\"Creando el zip\");</script>"; 
    }
else
    {
        echo 'Error creando '.$filename;
    }

?>
<?php

if ($gestor = opendir('files/')) {
    while (false !== ($archivo = readdir($gestor))) {
        if (strpos($archivo, ".shp") !== false) {

            $nombrezip = reset(explode(".", $archivo));
            echo "$nombrezip";
        }
    }
    closedir($gestor);
}


/*
$zip = new ZipArchive();

$filename = 'files/test.zip';

if($zip->open($filename,ZipArchive::CREATE)===true)
    {
        $directory = "files";
        
        $zip->addPattern('/\.(shp)$/', $directory);
        
        $zip->close();
        
        echo "<script type=\"text/javascript\">alert(\"Creando el zip\");</script>"; 
    }
else
    {
        echo 'Error creando '.$filename;
    }
*/
?>
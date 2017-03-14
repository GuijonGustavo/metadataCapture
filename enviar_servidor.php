<?php

//Espa parte de código muestra la lista de archivo que hay en el directorio. Y muestra el nombre del archivo sin extensión.

getcwd();
chdir("files");

//echo "El directorio después del cambio de chdir: " . getcwd() . "<br>";

if ($gestor = opendir('.'))
    {
        while (false !== ($archivito = readdir($gestor)))
            {
                if (strpos($archivito, ".shp") !== false )
                    {
                        $archivoZipSHP = $archivito;
                        $nombrezip = reset(explode(".", $archivito));
                    }
                           
                if (strpos($archivito, ".shx") !== false )
                    {
                        $archivoZipSHX = $archivito;
                        $nombrezip = reset(explode(".", $archivito));
                    }
                           
                if (strpos($archivito, ".prj") !== false )
                    {

                        $archivoZipPRJ = $archivito;
                        $nombrezip = reset(explode(".", $archivito));
                    }
                          
                if (strpos($archivito, ".dbf") !== false )
                    {                    
                        $archivoZipDBF = $archivito;
                        $nombrezip = reset(explode(".", $archivito));
                    }
            }
        closedir($gestor);
    }

//Esto es para crear el nombre del zip
//echo "El primer nombre $nombrezip";

$nombreSinZip = $nombrezip;

$extensionZip = ".zip";

$nombrezip .= $extensionZip;

//echo "El directorio después del cambio de chdir: " . getcwd() . "<br>";
//Este otro es para hacer el zip

$zip = new ZipArchive();

//echo "Nombre del nombrezip:  " . $nombrezip . "<br>";
if($zip->open($nombrezip,ZipArchive::CREATE)===true)

    {

//        $zip->addPattern('/\.(shp)$/');
//        echo "Nombre de archivoSHP: " . $archivoZipSHP . "<br>";
        $zip->addFile($archivoZipSHP);
                $zip->addFile($archivoZipSHX);
                        $zip->addFile($archivoZipPRJ);
                                $zip->addFile($archivoZipDBF);
//        echo "exito" . "<br>";
        
        $zip->close();
        
        //      echo "<script type=\"text/javascript\">alert(\"Creando el zip\");</script>"; 
    }
else
    {
        echo 'Error creando '. $nombrezip . "<br>";
    }


$url_enviar='curl -u admin:vS9UI355#ea9 -H "Content-type: application/zip" -T ${TRAINING_ROOT}/var/www/html/metadataCapture/files/'. $nombrezip . ' http://ssig0.conabio.gob.mx:8080/geoserver/rest/workspaces/myworkspace/datastores/' . $nombreSinZip . '/file.shp';

shell_exec($url_enviar);

$mover_shp='mv '.$archivoZipSHP . ' basura/';
$mover_shx='mv '.$archivoZipSHX . ' basura/';
$mover_prj='mv '.$archivoZipPRJ . ' basura/';
$mover_dbf='mv '.$archivoZipDBF . ' basura/';
$mover_zip='mv '.$nombrezip . ' basura/';

//echo "este es el zip que se borrarra " . $borrar_zip . "<br>";

shell_exec($mover_shp);
shell_exec($mover_shx);
shell_exec($mover_prj);
shell_exec($mover_dbf);
shell_exec($mover_zip);

echo "<script type=\"text/javascript\">alert(\"Se han enviado los archivos a la CONABIO\");</script>"; 

//echo "<script>parent.window.location.reload(true);</script>"; Con este se recarga la página





?>
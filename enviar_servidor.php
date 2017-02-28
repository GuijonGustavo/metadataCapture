<?php

//Espa parte de código muestra la lista de archivo que hay en el directorio. Y muestra el nombre del archivo sin extensión.

getcwd();
chdir("files");

echo "El directorio después del cambio de chdir: " . getcwd() . "<br>";

if ($gestor = opendir('.'))
    {
        while (false !== ($archivoSHP = readdir($gestor)))
            {
                if (strpos($archivoSHP, ".shp") !== false)
                    {

            echo "Listado de archivos: " . $archivoSHP . "<br>";
            $archivoSSHHPP = $archivoSHP;
            
            $nombrezip = reset(explode(".", $archivoSHP));



                    }
            }
        closedir($gestor);
    }
echo "Listado de archivos: " . $archivoSSHHPP . "<br>";

//Esto es para crear el nombre del zip

$extensionZip = ".zip";

$nombrezip .= $extensionZip;

echo "El directorio después del cambio de chdir: " . getcwd() . "<br>";

//Este otro es para hacer el zip

$zip = new ZipArchive();

echo "Nombre del nombrezip:  " . $nombrezip . "<br>";
if($zip->open($nombrezip,ZipArchive::CREATE)===true)

    {

//        $zip->addPattern('/\.(shp)$/');
        echo "Nombre de archivoSHP: " . $archivoSSHHPP . "<br>";
        $zip->addFile($archivoSSHHPP);
        echo "exito";
        
        $zip->close();
        
        echo "<script type=\"text/javascript\">alert(\"Creando el zip\");</script>"; 
    }
else
    {
        echo 'Error creando '. $nombrezip;
    }

?>
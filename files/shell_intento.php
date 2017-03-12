<?php

$salida = shell_exec('curl -u admin:vS9UI355#ea9 -H "Content-type: application/zip" -T ${TRAINING_ROOT}/var/www/html/metadataCapture/files/panoncadcgw.zip http://ssig0.conabio.gob.mx:8080/geoserver/rest/workspaces/myworkspace/datastores/panoncadcgw/file.shp');
echo "<pre>$salida</pre>";

?>

<?php 

/*vars*/
$id = $_POST["id"];
$carpeta = '../../files-upload/' . $id . '/';
/*vars*/

$counter = 0;

if(is_dir($carpeta)){
    if($dir = opendir($carpeta)){
        while(($archivo = readdir($dir)) !== false){
        	if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                $counter++;
            }
        }

        closedir($dir);
    }
}

echo $counter;

?>
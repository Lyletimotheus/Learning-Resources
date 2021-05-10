<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $path = "classes/";
    $extension = ".class.php";
    $fileName = $path . $className . $extension;

    // Error Handling if we can't find the file we are trying to load
    if(!file_exists($fileName)){
        return false;
    }
    
    include_once $fileName;
}
?>
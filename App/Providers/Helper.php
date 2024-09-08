<?php

function directory_separator(string $folder, string $file_name)
{
    $path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$file_name;
    
    return $path;
}

function panel_index()
{
    Flight::render(directory_separator("Panel", "index.php"));
}
<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\FileFacade;

$filePath = __DIR__ . "/users.csv";

if (file_exists($filePath)) {
    $fileFacade = new FileFacade();
    $csvKeysLine = 0;
    $json = $fileFacade->convertCsvToJson($filePath, $csvKeysLine);
    
    echo $json;
} else {
    echo "The file doesn't exists";
}
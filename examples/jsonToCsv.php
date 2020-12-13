<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\Json;

$file =  __DIR__ . '/users.json';

if (file_exists($file)) {
    $fileAsString = file_get_contents($file);
    $jsonFile = json_decode($fileAsString, true);
    $json = new Json($jsonFile);
    
    $json->toCsv();
    
    $csvFile = __DIR__ . "/users.csv";

    $fileOpen = fopen($csvFile, "w");
    fwrite($fileOpen, $json->csv);

    echo "Result:\n{$json->csv}";
} else {
    echo "The file doesn't exists";
}
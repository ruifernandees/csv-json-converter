<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\Csv;

$file = __DIR__ . "/users.csv";

if (file_exists($file)) {

    $csv = new Csv(file($file));
    $csv->toJson();
    echo $csv->json;


} else {
    echo "The file doesn't exists";
}
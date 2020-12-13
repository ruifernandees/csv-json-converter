<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\Csv;

$file = __DIR__ . "/users.csv";

if (file_exists($file)) {

    $csv = new Csv(file($file));
    echo $csv->toJson();


} else {
    echo "The file doesn't exists";
}
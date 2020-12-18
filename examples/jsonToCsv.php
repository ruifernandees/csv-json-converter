<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\FileFacade;

$filePath =  __DIR__ . '/users.json';

if (file_exists($filePath)) {
    $fileFacade = new FileFacade();
    $csv = $fileFacade->convertJsonToCsv($filePath);
    
    echo "Result:\n{$csv}";
} else {
    echo "The file doesn't exists";
}
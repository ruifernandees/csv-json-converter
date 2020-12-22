<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvJson\FileFacade;

$filePath = __DIR__ . "/users.csv";

if (file_exists($filePath)) {
    $fileFacade = new FileFacade();

    /**
     * Is the line on the CSV file that the keys are (Like name, age and city)
     */
    $lineOfCsvKeysOnTheFile = 1;

    /**
     * -1 if you want to get all lines. 
     * If you want to limit, you can pass any number greater than zero
     */
    $limitOfLines = 1;

    /**
     * Is the position after the keys that 
     * you want to start the conversion: 0 is the first
     */
    $offset = 0;

    $json = $fileFacade->convertCsvToJson($filePath, $lineOfCsvKeysOnTheFile, $limitOfLines, $offset);
    
    echo $json;
} else {
    echo "The file doesn't exists";
}
<?php

namespace RuiF\CsvToJson;

/**
 * Class FileFacade
 * @package RuiF\CsvTojson
 */
class FileFacade
{
    /**
     * @param string $pathToFile
     * @param integer $csvKeysLine
     * @param integer $limitOfLines
     * @return string
     */
    public function convertCsvToJson(string $pathToFile, int $csvKeysLine, int $limitOfLines = -1): string
    {
        $csv = new Csv(file($pathToFile));

        $csv->toJson($csvKeysLine, $limitOfLines);

        return $csv->json;
    }

    /**
     * @param string $pathToFile
     * @return string
     */
    public function convertJsonToCsv(string $pathToFile): string
    {
        $fileAsString = file_get_contents($pathToFile);
        $jsonFile = json_decode($fileAsString, true);
        $json = new Json($jsonFile);
        
        $json->toCsv();

        return $json->csv;
    }
}
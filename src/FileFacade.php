<?php

namespace RuiF\CsvJson;

/**
 * Class FileFacade
 * @package RuiF\CsvJson
 */
class FileFacade
{
    /**
     * @param string $pathToFile
     * @param integer $csvKeysLine
     * @param integer $limitOfLines
     * @return string
     */
    public function convertCsvToJson(
        string $pathToFile,
        int $csvKeysLine,
        int $limitOfLines = -1,
        int $offset = 0
    ): string {
        $csv = new Csv(file($pathToFile));

        $csv->toJson($csvKeysLine, $limitOfLines, $offset);

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

<?php

namespace RuiF\CsvToJson;

/**
 * Class Csv
 * @package RuiF\CsvToJson
 */
class Csv
{
    /** @var array */
    private $rawCsv;

    /** @var string */
    public $json;

    /**
     * Csv constructor
     *
     * @param array $rawCsv
     */
    public function __construct(array $rawCsv)
    {
        $this->rawCsv = $rawCsv;    
    }

    /**
     * @return array
     */
    public function rawCsv(): array
    {
        return $this->rawCsv;
    }

    /**
     * Step by step:
     * 
     * $newArray is a bidimensional array that has arrays with the values of each CSV line
     * 
     * $transformToAssoc transforms the $newArray into the final array, with the CSV keys associated with its respective values
     * 
     * @param integer $csvKeysLine
     * @return Csv
     */
    public function toJson(int $csvKeysLine): Csv
    {
        $newArray = array_map(function ($item) {
            $stringWithoutLineBreak = str_replace("\n", "", $item);
            return explode(",", $stringWithoutLineBreak);
        }, $this->rawCsv);
        
        $transformToAssoc = function (
            $arrayToBeTransformed, 
            $csvValuesIterator, 
            $finalArray, 
            $csvKeysLine) use (
                &$transformToAssoc
            ) {

            if ($csvValuesIterator == count($arrayToBeTransformed)) {
                return $finalArray;
            }

            $finalArray[$csvValuesIterator - 1] = [];
            
            $csvKeysQuantity = count($arrayToBeTransformed[$csvKeysLine]);

            for ($csvKeysIterator = 0; $csvKeysIterator < $csvKeysQuantity; $csvKeysIterator++) {
                $currentCsvKey = $arrayToBeTransformed[$csvKeysLine][$csvKeysIterator];
                $finalArray[$csvValuesIterator - 1][$currentCsvKey] = $arrayToBeTransformed[$csvValuesIterator][$csvKeysIterator];
            }

            return $transformToAssoc($arrayToBeTransformed, $csvValuesIterator + 1, $finalArray, $csvKeysLine);
        };

        $finalArray = $transformToAssoc($newArray, $csvKeysLine + 1, [], $csvKeysLine);

        $this->json = json_encode($finalArray);

        return $this;
    }
}
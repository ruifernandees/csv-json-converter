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
     * @param integer $limitOfLines
     * @return Csv
     */
    public function toJson(int $csvKeysLine, int $limitOfLines = -1): Csv
    {
        if ($limitOfLines == -1) {
            $limitOfLines = count($this->rawCsv);
        }

        $newArray = [];
        foreach ($this->rawCsv as $index => $item) {
            if ($index == ($csvKeysLine + $limitOfLines)) {
                break;
            }

            if ($index >= $csvKeysLine - 1) {
                $stringWithoutLineBreak = str_replace("\n", "", $item);
                $newArray[] = explode(",", $stringWithoutLineBreak);
            }
        }

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

        $finalArray = $transformToAssoc($newArray, 1, [], 0);

        $this->json = json_encode($finalArray);

        return $this;
    }
}
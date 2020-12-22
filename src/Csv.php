<?php

namespace RuiF\CsvJson;

/**
 * Class Csv
 * @package RuiF\CsvJson
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
     * @param integer $csvKeysLine Is the line on the CSV file that the keys are (Like name, age and city)
     * @param integer $limitOfLines -1 if you want to get all lines. Other natural number if you want to limit
     * @param integer $offset is the position after the keys that you want to start the conversion: 0 is the first
     * @return Csv
     */
    public function toJson(
        int $csvKeysLine, 
        int $limitOfLines = -1, 
        int $offset = 0
    ): Csv {
        if ($limitOfLines == -1) {
            $limitOfLines = count($this->rawCsv);
        }   

        $csvKeysPositionArr = $csvKeysLine - 1;

        $realOffset = ($csvKeysPositionArr + $offset) + 1;

        $newArray = [];
        foreach ($this->rawCsv as $index => $item) {
            if ($index == ($realOffset + $limitOfLines)) {
                break;
            }

            if ($index == $csvKeysPositionArr || $index >= $realOffset) {
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
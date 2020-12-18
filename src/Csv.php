<?php

namespace RuiF\CsvToJson;

class Csv
{
    private $rawCsv;
    public $json;

    public function __construct(array $rawCsv)
    {
        $this->rawCsv = $rawCsv;    
    }

    public function rawCsv()
    {
        return $this->rawCsv;
    }

    public function toJson(int $csvKeysLine)
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
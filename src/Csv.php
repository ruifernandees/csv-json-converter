<?php

namespace RuiF\CsvToJson;

class Csv
{
    private $rawCsv;

    public function __construct(array $rawCsv)
    {
        $this->rawCsv = $rawCsv;    
    }

    public function rawCsv()
    {
        return $this->rawCsv;
    }

    public function toJson()
    {
        $newArray = [];
        foreach ($this->rawCsv as $item) {
            $stringWithoutLineBreak = str_replace("\n", "", $item);
            $newArray[] = explode(",", $stringWithoutLineBreak);
        }

        $finalArray = [];

        for ($iterator = 1; $iterator < count($newArray); $iterator++) {
            $finalArray[$iterator - 1] = [];
            for ($secIterator = 0; $secIterator < count($newArray[0]); $secIterator++) {
                $finalArray[$iterator - 1][$newArray[0][$secIterator]] = $newArray[$iterator][$secIterator];
            }
        }

        return json_encode($finalArray);
    }
}
<?php

namespace RuiF\CsvToJson;

class Json
{
    private $rawJson;
    public $csv;

    public function __construct(array $json)
    {
        $this->rawJson = $json;
    }

    public function rawJson()
    {
        return $this->rawJson;
    }

    public function toCsv()
    {
        $keys = array_keys($this->rawJson[0]);
        $firstLine = implode(",", $keys);

        $lines = [];
        foreach ($this->rawJson as $register) {
            $lines[] = implode(",", $register);
        }
        
        $this->csv = $firstLine . "\n" . implode("\n", $lines);

        return $this;
    }
}
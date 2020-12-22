<?php

namespace RuiF\CsvJson;

/**
 * Class Json
 * @package RuiF\CsvJson
 */
class Json
{
    /** @var array */
    private $rawJson;

    /** @var string */
    public $csv;

    /**
     * @param array $json
     */
    public function __construct(array $json)
    {
        $this->rawJson = $json;
    }

    /**
     * @return array
     */
    public function rawJson(): array
    {
        return $this->rawJson;
    }

    /**
     * @return Json
     */
    public function toCsv(): Json
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
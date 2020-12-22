<?php

namespace RuiF\CsvJson\Tests;

use PHPUnit\Framework\TestCase;
use RuiF\CsvToJson\Json;

class JsonTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanConvertJsonToCsv(): void
    {
        $pathToFile = __DIR__ . '/files/users.json';
        $fileAsString = file_get_contents($pathToFile);
        $jsonFile = json_decode($fileAsString, true);
        $json = new Json($jsonFile);
        
        $json->toCsv();

        $expectedCsv = "name,age,city\nRui,18,Maceió\nJosé,25,São Paulo";

        $this->assertEquals($expectedCsv, $json->csv);
    }
}
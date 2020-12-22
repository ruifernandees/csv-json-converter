<?php

namespace RuiF\CsvJsonTests;

use PHPUnit\Framework\TestCase;
use RuiF\CsvJson\FileFacade;

class FileFacadeTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanConvertCsvToJson(): void
    {
        $filePath = __DIR__ . '/files/users.csv';

        $lineOfCsvKeysOnTheFile = 1;

        $limitOfLines = 1;

        $offset = 0;

        $fileFacade = new FileFacade();
        $json = $fileFacade->convertCsvToJson(
            $filePath, 
            $lineOfCsvKeysOnTheFile, 
            $limitOfLines, 
            $offset
        );

        $expectedArray = [
            [
                "name" => "Rui",
                "age" => "18",
                "city" => "Maceió"
            ]
        ];

        $expected = json_encode($expectedArray);
        
        $this->assertEquals(
            $expected,
            $json
        );
    }

    /**
     * @return void
     */
    public function testCanConvertJsonToCsv(): void
    {
        $filePath =  __DIR__ . '/files/users.json';
        $fileFacade = new FileFacade();
        $csv = $fileFacade->convertJsonToCsv($filePath);
        
        $expected = "name,age,city\nRui,18,Maceió\nJosé,25,São Paulo";

        $this->assertEquals($expected, $csv);
    
    }
}
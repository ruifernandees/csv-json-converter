<?php

namespace RuiF\CsvJson\Tests;

use PHPUnit\Framework\TestCase;
use RuiF\CsvToJson\Csv;

class CsvTest extends TestCase
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

        $csv = new Csv(file($filePath));

        $csv->toJson($lineOfCsvKeysOnTheFile, $limitOfLines, $offset);

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
            $csv->json
        );
    }

    /**
     * @return void
     */
    public function testCanConvertCsvToJsonWithDefaultValues(): void
    {
        $filePath = __DIR__ . '/files/users.csv';

        $lineOfCsvKeysOnTheFile = 1;

        $csv = new Csv(file($filePath));

        $csv->toJson($lineOfCsvKeysOnTheFile);

        $expectedArray = [
            [
                "name" => "Rui",
                "age" => "18",
                "city" => "Maceió"
            ],
            [
                "name" => "José",
                "age" => "25",
                "city" => "São Paulo"
            ]
        ];
        
        $expected = json_encode($expectedArray);

        $this->assertEquals(
            $expected,
            $csv->json
        );
    }

    /**
     * @return void
     */
    public function testCanConvertCsvToJsonWithDifferentCsvKeysLine(): void
    {
        $filePath = __DIR__ . '/files/users2.csv';

        $lineOfCsvKeysOnTheFile = 3;

        $limitOfLines = 1;

        $offset = 0;

        $csv = new Csv(file($filePath));

        $csv->toJson($lineOfCsvKeysOnTheFile, $limitOfLines, $offset);

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
            $csv->json
        );
    }
}
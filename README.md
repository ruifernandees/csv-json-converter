# 🔁 CSV/JSON Converter
See the README in:
- [Português (Brasil)](https://github.com/ruifernandees/csv-json-converter/blob/main/README.pt-br.md)

## 📄 Description
<p>CSV/JSON Converter is a modern PHP component which abstracts the CSV to JSON and JSON to CSV conversion routine.</p>

## 💻 Usage
### CSV -> JSON
<p>This example is in examples/csvToJson.php</p>

Code:
```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\FileFacade;

$filePath = __DIR__ . "/users.csv";

if (file_exists($filePath)) {
    $fileFacade = new FileFacade();
    $csvKeysLine = 0;
    $json = $fileFacade->convertCsvToJson($filePath, $csvKeysLine);

    echo $json;
} else {
    echo "The file doesn't exists";
}
```

Input file (users.csv):
```csv
name,age,city
Rui,18,Maceió
José,25,São Paulo
```
<table>
    <tr>
        <th>name</th>
        <th>age</th>
        <th>city</th>
    </tr>
    <tr>
        <th>Rui</th>
        <th>18</th>
        <th>Maceió</th>
    </tr>
    <tr>
        <th>José</th>
        <th>25</th>
        <th>São Paulo</th>
    </tr>
</table>

Output: 
```json
[
    {
        "name": "Rui",
        "age": "18",
        "city": "Maceió"
    },
    {
        "name": "José",
        "age": "25",
        "city": "São Paulo"
    }
]
```

<p>You can save the JSON file with the following code:</p>

```php
$jsonFile = __DIR__ . "/users.json";

$fileOpen = fopen($jsonFile, "w");
fwrite($fileOpen, $json);
```

### JSON -> CSV
<p>This example is in examples/jsonToCsv.php</p>

Code:
```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\FileFacade;

$filePath =  __DIR__ . '/users.json';

if (file_exists($filePath)) {
    $fileFacade = new FileFacade();
    $csv = $fileFacade->convertJsonToCsv($filePath);
    
    echo "Result:\n{$csv}";
} else {
    echo "The file doesn't exists";
}
```

Input file (users.json):
```json
[
    {
        "name": "Rui",
        "age": "18",
        "city": "Maceió"
    },
    {
        "name": "José",
        "age": "25",
        "city": "São Paulo"
    }
]
```

Output:
```csv
name,age,city
Rui,18,Maceió
José,25,São Paulo
```

<table>
    <tr>
        <th>name</th>
        <th>age</th>
        <th>city</th>
    </tr>
    <tr>
        <th>Rui</th>
        <th>18</th>
        <th>Maceió</th>
    </tr>
    <tr>
        <th>José</th>
        <th>25</th>
        <th>São Paulo</th>
    </tr>
</table>

<p>You can save the CSV file with the following code:</p>

```php
$csvFile = __DIR__ . "/users.csv";

$fileOpen = fopen($csvFile, "w");
fwrite($fileOpen, $csv);
```

## Credits
- [Rui Fernandes](https://github.com/ruifernandees)

## License
The MIT License (MIT). Please see [License File](https://github.com/ruifernandees/csv-json-converter/blob/main/LICENSE) for more information
# 🔁 CSV/JSON Converter
## 📄 Description / Descrição
<p><b>English</b>: CSV/JSON Converter is a modern PHP component which abstracts the CSV to JSON and JSON to CSV conversion routine.</p>
<p><b>Português</b>: CSV/JSON Converter é um componente PHP moderno que abstrai a rotina de converter CSV para JSON e JSON para CSV.</p>

## 💻 Usage / Uso
### CSV -> JSON
<p><b>English</b>: This example is in examples/csvToJson.php</p>
<p><b>Português</b>: Este exemplo está em examples/csvToJson.php</p>

Code / Código:
```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\Csv;

$file = __DIR__ . "/users.csv";

if (file_exists($file)) {

    $csv = new Csv(file($file));
    $csv->toJson();
    echo $csv->json;


} else {
    echo "The file doesn't exists";
}
```

Input file / Arquivo de entrada (users.csv):
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

Output / Saída: 
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

### JSON -> CSV
<p><b>English</b>: This example is in examples/jsonToCsv.php</p>
<p><b>Português</b>: Este exemplo está em examples/jsonToCsv.php</p>

Code / Código:
```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\Json;

$file =  __DIR__ . '/users.json';

if (file_exists($file)) {
    $fileAsString = file_get_contents($file);
    $jsonFile = json_decode($fileAsString, true);
    $json = new Json($jsonFile);
    
    $json->toCsv();
    
    $csvFile = __DIR__ . "/users.csv";

    $fileOpen = fopen($csvFile, "w");
    fwrite($fileOpen, $json->csv);

    echo "Result:\n{$json->csv}";
} else {
    echo "The file doesn't exists";
}
```

Input file / Arquivo de entrada (users.json):
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

Output / Saída:
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

## Credits
- [Rui Fernandes](https://github.com/ruifernandees)

## License
The MIT License (MIT). Please see [License File](https://github.com/ruifernandees/csv-json-converter/blob/main/LICENSE) for more information
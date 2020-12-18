# 🔁 CSV/JSON Converter
## 📄 Descrição
<p>CSV/JSON Converter é um componente PHP moderno que abstrai a rotina de converter CSV para JSON e JSON para CSV.</p>

## 💻 Uso
### CSV -> JSON
<p>Este exemplo está em examples/csvToJson.php</p>

Código:
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
    echo "O arquivo não existe";
}
```

Arquivo de entrada (users.csv):
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

Saída: 
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

<p>Você pode salvar o arquivo JSON com o seguinte código:</p>

```php
$jsonFile = __DIR__ . "/users.json";

$fileOpen = fopen($jsonFile, "w");
fwrite($fileOpen, $json);
```

### JSON -> CSV
<p>Este exemplo está em examples/jsonToCsv.php</p>

Código:
```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RuiF\CsvToJson\FileFacade;

$filePath =  __DIR__ . '/users.json';

if (file_exists($filePath)) {
    $fileFacade = new FileFacade();
    $csv = $fileFacade->convertJsonToCsv($filePath);
    
    echo "Resultado:\n{$csv}";
} else {
    echo "O arquivo não existe";
}
```

Arquivo de entrada (users.json):
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

Saída:
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

<p>Você pode salvar o arquivo CSV com o seguinte código:</p>

```php
$csvFile = __DIR__ . "/users.csv";

$fileOpen = fopen($csvFile, "w");
fwrite($fileOpen, $csv);
```

## Créditos
- [Rui Fernandes](https://github.com/ruifernandees)

## Licença
The MIT License (MIT). Please see [License File](https://github.com/ruifernandees/csv-json-converter/blob/main/LICENSE) for more information
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

    /**
     * É a linha do aquivo CSV na qual as chaves estão (Como nome, idade e cidade)
     */
    $lineOfCsvKeysOnTheFile = 1;

    /**
     * -1 Se você quer que retorne todas as linhas do CSV no JSON. 
     * Se você quiser limitar, coloque um número maior que zero
     * (Veja os exemplos abaixo)
     */
    $limitOfLines = 1;

    /**
     * É a posição do elemento que você começar
     * quando fizer a conversão: 0 é a primeira posição
     * (Veja os exemplos abaixo)
     */
    $offset = 0;

    $json = $fileFacade->convertCsvToJson($filePath, $lineOfCsvKeysOnTheFile, $limitOfLines, $offset);
    
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

Saída (com limit 1 e offset 0): 
```json
[
    {
        "name": "Rui",
        "age": "18",
        "city": "Maceió"
    }
]
```

Saída (com limit 1 e offset 1): 
```json
[
    {
        "name": "José",
        "age": "25",
        "city": "São Paulo"
    }
]
```

Saída (com os valores padrão de limit e offset, de forma a pegar todos os elementos do CSV): 
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
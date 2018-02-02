# edeklaracje-countries
eDeklaracje - Countries Directory

## Installation

Use ***composer***

```bash
composer require webit/edeklaracje-countries ^1.0.0
```

## Usage

```php
<?php
$factory = new \Webit\EDeklaracje\Countries\DirectoryFactory();
$byCode = $factory->createByCode();

$country = $byCode->lookup('PL'); // returns Country

$byName = $factory->createByName();
$byName->lookup('Polska'); // returns Country
 
```

## Tests

```bash
docker-composer run --rm composer
docker-composer run --rm phpunit
```

<?php

require_once __DIR__ . '/vendor/autoload.php';

use MLL\Utils\CSVArray;

$cards = json_decode(file_get_contents('first-printings.json'));

$collection = [];
foreach ($cards as $card) {
    $collection []= [
        'Count' => 1,
        'Name' => $card->name,
        'Edition' => $card->set,
        'Collector Number' => $card->collector_number,
    ];
}

$csv = CSVArray::toCSV($collection, ',');
file_put_contents('moxfield-collection.csv', $csv);

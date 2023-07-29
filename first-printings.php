<?php

use GuzzleHttp\Client;

require_once __DIR__ . '/vendor/autoload.php';

$previousContents = file_get_contents('first-printings.json');
$cards = $previousContents ? json_decode($previousContents) : [];

function query(string $url): \stdClass {
    $client = new Client();
    $response = $client->get($url);
    $rawContents = $response->getBody()->getContents();
    return json_decode($rawContents);
}

// $nextPage = 'https://api.scryfall.com/cards/search?q=%28game%3Apaper%29+is%3Afirstprint';
$nextPage = 'https://api.scryfall.com/cards/search?format=json&include_extras=false&include_multilingual=false&include_variations=false&order=name&page=142&q=%28game%3Apaper%29+is%3Afirstprint&unique=cards';

while ($nextPage) {
    $response = query($nextPage);
    $cards = [...$cards, ...$response->data];
    $nextPage = $response?->next_page;
    echo count($cards) . " collected, next page: {$nextPage}\n";
    sleep(10);
    file_put_contents('first-printings.json', json_encode($cards, JSON_PRETTY_PRINT));
};

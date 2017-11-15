<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use iamgold\facebook\ads\credentials\Credential;
use iamgold\facebook\ads\accounts\AccountClient;

$config = require __DIR__ . '/config.php';

$credential = new Credential($config);

$client = new AccountClient($credential);

$result = $client->findCampaigns('1350479095046998', ['fields'=>'name,id']);

while($result->hasNext()) {
    $data = $result->getData();
    var_dump($data[0]);
    var_dump($result->paging);
    $result = $result->getNext();
    echo "\nNext\n";
}


<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use iamgold\facebook\ads\credentials\Credential;
use iamgold\facebook\ads\accounts\AccountClient;
use iamgold\facebook\ads\reports\ReportClient;

$config = require __DIR__ . '/config.php';

$credential = new Credential($config);

$reportClient = new ReportClient($credential);

// $result = $reportClient->createAccountReport('1350479095046998');

$result = $reportClient->read('144425212981642');

var_dump($result);
exit;

// $client = new AccountClient($credential);

// $result = $client->findCampaigns('1350479095046998', ['fields'=>'name,id']);

// while($result->hasNext()) {
//     $data = $result->getData();
//     var_dump($data[0]);
//     var_dump($result->paging);
//     $result = $result->getNext();
//     echo "\nNext\n";
// }

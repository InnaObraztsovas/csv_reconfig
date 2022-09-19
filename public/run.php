<?php

use Symfony\Component\Messenger\MessageBusInterface;

require_once dirname(__DIR__).'/vendor/autoload.php';

$c = new \App\Controller\CsvController();
$c->run();
<?php

namespace App\Message;
use App\CSVDataPersister;
use App\CSVDataProvider;
use App\CSVProcessor;
use App\PhoneDataProcessor;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CsvMessageHandler implements MessageHandlerInterface
{

    public function __invoke(CsvMessage $message)
    {
        $processor = new CSVProcessor(new PhoneDataProcessor(), new CSVDataProvider(), new CSVDataPersister());
        $processor->handle($message);
    }
}
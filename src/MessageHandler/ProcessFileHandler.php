<?php

namespace App\MessageHandler;
use App\CSVDataPersister;
use App\CSVDataProvider;
use App\CSVProcessor;
use App\Message\ProcessFile;
use App\PhoneDataProcessor;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ProcessFileHandler implements MessageHandlerInterface
{
    public function __invoke(ProcessFile $message)
    {
        $processor = new CSVProcessor(new PhoneDataProcessor(), new CSVDataProvider(), new CSVDataPersister());
        $processor->handle($message->filePath);
    }
}

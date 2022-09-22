<?php

namespace App\Message;

use App\FileHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CsvMessageHandler implements MessageHandlerInterface
{

    public function __invoke(CsvMessage $message)
    {
        FileHandler::handle($message->getCsv());
    }
}
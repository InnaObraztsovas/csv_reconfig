<?php

namespace App\Message;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CsvMessageHandler implements MessageHandlerInterface
{
    public function __invoke(CsvMessage $message)
    {
        echo 'hello';
        $csv = $message->getCsv();

    }
}
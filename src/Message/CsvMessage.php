<?php

namespace App\Message;

use App\FileInput;

class CsvMessage
{
    /**
     * @var string
     */
    private $csvContent;

    public function __construct(string $csvContent)
    {
        $this->csvContent = $csvContent;
    }

    public function getCsv()
    {
        return FileInput::read($this->csvContent);
    }
}
<?php

namespace App\Message;

use App\FileHandler;

class CsvMessage
{
    /**
     * @var string
     */
    private string $csvContent;

    public function __construct(string $csvContent)
    {
        $this->csvContent = $csvContent;
    }

    public function getCsv(): string
    {
        return $this->csvContent;
    }
}
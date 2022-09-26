<?php

namespace App\Message;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class CsvMessage
{
    /**
     * @var string
     */
    private string $csvContent;

    public function __construct(UploadedFile $csvContent)
    {
        $this->csvContent = $csvContent;
    }


    public function getFilePath(): string
    {
        return $this->csvContent;

    }
}
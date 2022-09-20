<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

class CsvFile
{
    #[Assert\File(
        maxSize: '1024k',
        mimeTypes: ['application/csv', 'application/x-pdf'],
        mimeTypesMessage: 'Please upload a valid CSV',
    )]
    protected File $csvFile;

    /**
     * @return mixed
     */
    public function getCsvFile() : File
    {
        return $this->csvFile;
    }

    /**
     * @param File|null $csvFile
     */
    public function setCsvFile(File $csvFile = null): void
    {
        $this->csvFile = $csvFile;
    }
}
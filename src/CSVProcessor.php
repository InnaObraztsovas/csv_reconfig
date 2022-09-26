<?php

namespace App;

use App\Message\CsvMessage;

class CSVProcessor
{
    public function __construct(private PhoneDataProcessor $processor, private CSVDataProvider $provider, private CSVDataPersister $persister)
    {
    }

    public function handle(CsvMessage $command): void
    {
        $fileHandle = fopen($command->getFilePath(), 'r');
        $this->provider->setFileHandle($fileHandle);
        $processedFilesIterator = $this->processRows($this->provider->getRowsIterator());
        $this->persister->persist($processedFilesIterator);
        fclose($fileHandle);
    }

    private function processRows(iterable $input): iterable
    {
        foreach ($input as $row) {
            yield $this->processor->processRow($row);
        }
    }
}
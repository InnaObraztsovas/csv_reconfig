<?php

namespace App;

class CSVProcessor
{
    public function __construct(private PhoneDataProcessor $processor, private CSVDataProvider $provider, private CSVDataPersister $persister)
    {
    }

    public function handle(string $filepath): void
    {
        $fileHandle = fopen($filepath, 'r');
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
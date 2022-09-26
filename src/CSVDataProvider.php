<?php

namespace App;

class CSVDataProvider implements DataProvider
{

    private $handle;

    public function setFileHandle($handle): void
    {
        $this->handle = $handle;
    }

    /**
     * @return mixed
     */
    public function getFileHandle()
    {
        return $this->handle;
    }


    public function getRowsIterator(): iterable
    {
        while (($row = fgetcsv($this->getFileHandle())) !== false) {
            yield $row;
        }
    }
}
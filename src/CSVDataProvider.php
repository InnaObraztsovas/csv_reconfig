<?php

namespace App;

use http\Encoding\Stream;
use phpDocumentor\Reflection\Types\Resource_;

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
    public function getFileHandle(): mixed
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
<?php

namespace App;

class CSVDataPersister implements DataPersister
{

    public function persist(iterable $iterator): void
    {
        $path = FilePath::path();
        $output = fopen($path, "w");
        foreach ($iterator as $fields) {
            fputcsv($output, $fields);
        }
    }
}
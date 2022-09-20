<?php

namespace App;

class FileInput
{

    public function __construct(public FileProcessing $processing)
    {
    }

    public static function read(string $filename): mixed
    {
        $processing = new FileProcessing();
        $row = 0;
        $dataCsv = [];
        $handle = fopen($filename, "r");
        $path = FilePath::path();
        $output = fopen($path, "w");

        if (!$handle) {
            return [];
        }

        while (($csvRes = fgetcsv($handle)) !== false) {
            $csvRes[1] = $processing->formatPhoneNumber($csvRes[1]);
            $dataCsv[$row] = $csvRes;
            foreach ($dataCsv as $fields) {
                fputcsv($output, $fields);
            }
            $row++;
            unset($dataCsv);
        }

        fclose($handle);
        return $path;
    }
}
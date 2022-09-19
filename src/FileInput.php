<?php

namespace App;

class FileInput
{
    public static function read(string $filename):array
    {
        $row = 0;
        $dataCsv = [];
        $handle = fopen($filename, "r");

        if (!$handle) {
            return [];
        }


        while (($csvRes = fgetcsv($handle)) !== false) {
            $dataCsv[$row] = $csvRes;
            $row++;
        }

        fclose($handle);
        return $dataCsv;
    }
}
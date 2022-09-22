<?php

namespace App;

class FileHandler
{

    public static function handle(string $filename): string
    {
        $row = 0;
        $dataCsv = [];
        $handle = fopen($filename, "r");
        $path = FilePath::path();

        if (!$handle) {
            return '';
        }

        while (($csvRes = fgetcsv($handle)) !== false) {
            $csvRes[1] = PhoneFormat::formatPhoneNumber($csvRes[1]);
            $dataCsv[$row] = $csvRes;
            SaveFile::save($dataCsv, $path);
            $row++;
        }

        fclose($handle);
        return $path;
    }
}
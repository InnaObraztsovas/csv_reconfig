<?php

namespace App;

class SaveFile
{

    public static function save(array $data, string $path): void
    {
        $output = fopen($path, "w");
        foreach ($data as $fields) {
            fputcsv($output, $fields);
        }
    }
}
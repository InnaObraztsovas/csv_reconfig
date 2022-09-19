<?php

namespace App;

class SaveFile
{
    const STORAGE_PATH = 'Data';

    public static function save(array $data, string $name = null): string
    {
        if (empty($name)) {
            $name = rand(555, 55555);
        }

        if (substr($name, -4, 2) != '.csv') {
            $name .= ".csv";
        }

        if (!is_dir(self::STORAGE_PATH)) {
            mkdir(self::STORAGE_PATH);
        }

        $path = self::STORAGE_PATH . '/' . $name;

        $fp = fopen($path, 'w');

        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);

        return $path;
    }
}
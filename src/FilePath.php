<?php

namespace App;

class FilePath
{
    const STORAGE_PATH = __DIR__.'/var';

    public static function path(string $name = null): string
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

      return self::STORAGE_PATH . '/' . $name;
    }
}
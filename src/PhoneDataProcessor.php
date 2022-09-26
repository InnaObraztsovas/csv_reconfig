<?php

namespace App;

class PhoneDataProcessor
{
    public function formatPhoneNumber(string $phone): string
    {
        return preg_replace(
            '/^\+(\d{2})(\d{3})(\d{3})(\d{2})(\d{2})$/',
            '+\1-(\2)-\3-\4-\5',
            $phone
        );
    }
    public function processRow(array $row): array
    {
        $row[1] = $this->formatPhoneNumber($row[1]);
        return $row;
    }
}
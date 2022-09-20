<?php

namespace App;

class FileProcessing
{
    public function formatPhoneNumber(string $phone): string
    {
        return preg_replace(
            '/^\+(\d{2})(\d{3})(\d{3})(\d{2})(\d{2})$/',
            '+\1-(\2)-\3-\4-\5',
            $phone
        );
    }

//    public function reconfig(array $data): array
//    {
//        foreach ($data as &$input) {
//            $input[1] = $this->formatPhoneNumber($input[1]);
//        }
//        return $data;
//    }
}
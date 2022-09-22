<?php

namespace App;

class PhoneFormat
{
    public static function formatPhoneNumber(string $phone): string
    {
        return preg_replace(
            '/^\+(\d{2})(\d{3})(\d{3})(\d{2})(\d{2})$/',
            '+\1-(\2)-\3-\4-\5',
            $phone
        );
    }
}
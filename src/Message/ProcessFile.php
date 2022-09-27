<?php

namespace App\Message;

final class ProcessFile
{
    public function __construct(
        public readonly string $filePath
    )
    {

    }
}

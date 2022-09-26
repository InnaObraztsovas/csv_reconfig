<?php

namespace App;

interface DataPersister
{
    public function persist(iterable $iterator): void;
}
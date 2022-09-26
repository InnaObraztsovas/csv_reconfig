<?php

namespace App;

interface DataProvider
{
    public function getRowsIterator(): iterable;
}

<?php

interface DatabaseExecuter
{
    public function excecuteDatabase(string $query): void;
}

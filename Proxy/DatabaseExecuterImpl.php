<?php

require_once 'interfaces/DatabaseExecuter.php';

class DatabaseExecuterImpl implements DatabaseExecuter
{

    public function excecuteDatabase(string $query): void
    {

        echo "Executing query: " . $query . "\n";
    }
}

<?php

require_once 'interfaces/DatabaseExecuter.php';
require_once 'DatabaseExecuterImpl.php';

class DatabaseExecuterProxy implements DatabaseExecuter
{
    public bool $ifadmin = false;
    public DatabaseExecuter $dbExecuter;

    public function __construct(string $name, String $password)
    {
        if ($name == 'admin' && $password == "admin") {
            $this->ifadmin = true;
            $this->dbExecuter = new DatabaseExecuterImpl();
        }
    }

    public function excecuteDatabase(string $query): void
    {
        if ($this->ifadmin) {
            $this->dbExecuter->excecuteDatabase($query);
        } else {
            if ($query == "DELETE") {
                echo "Delete not allowed for non admin" . "\n";
            } else {
                $this->dbExecuter->excecuteDatabase($query);
            }
        }
    }
}

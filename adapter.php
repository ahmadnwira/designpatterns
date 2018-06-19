<?php

/* develop for diffrent DB */


interface IDatabase
{
    public function getAll();
}


class SQL implements IDatabase
{

    public function getAll()
    {
        return "Do SQL query";
    }

}

interface INoSQL
{
    public function fetchAll();
}


class NoSQL implements INoSQL
{

    public function fetchAll()
    {
        return "Do NoSQL query";
    }
}

class NoSQLAdapter implements IDatabase
{
    private $nosqlCleint;

    public function __construct(INoSQL $nosqlCleint)
    {
        $this->nosqlCleint = $nosqlCleint;
    }

    public function getAll()
    {
        return $this->pdfTemplate->fetchAll();
    }
}

$db = new NoSQL();

$nosqlAdapter = new NoSQLAdapter($db);

echo $nosqlAdapter->getAll();
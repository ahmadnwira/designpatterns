<?php

interface Iparser
{
    public function getData();
}

class Parser implements Iparser
{
    private $result;
    public function __construct($raw)
    {
        $this->result = "after long computation " . $raw;
    }

    public function getData()
    {
        return $this->result;
    }
}

class ParserProxy implements Iparser
{
    private $parser;
    private $raw;
    public function __construct($raw)
    {
        $this->parser = null;
        $this->raw = $raw;
    }

    public function getData()
    {
        if(!$this->parser){
            $this->parser = new Parser($this->raw);
            return $this->parser->getData();
        }
        return "loading from proxy: " . $this->parser->getData();
    }
}

$praser = new ParserProxy("parse me");

echo $praser->getData() . "\n";

echo $praser->getData() . "\n";
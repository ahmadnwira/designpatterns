<?php
/**
* this is not a good idea generally but it can be useful
* for someting like DB connection
*/

class Singleton
{
    private function __construct(){}

    // prevent cloning of an instance of the class via the clone operator.
    private function __clone() {}

    // prevent unserializing of an instance of the class via the global function unserialize()
    private function __wakeup() {}

    public static function getInstance()
    {
        return new Singleton();
    }

    public function talk(){
        return 'singletons are not that bad!';
    }
}

// $s = new Singleton(); // this will fail
$s = Singleton::getInstance();
echo $s->talk() . "\n";

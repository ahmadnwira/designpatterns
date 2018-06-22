<?php
interface IBook
{
    public function getSummary();
}
class Book implements IBook
{
    private $summary;
    public function __construct($summary)
    {
        $this->summary = $summary;
    }
    public function getSummary(){
        return $this->summary;
    }
}

interface IAlbum
{
    public function getDescription();
}
class Album implements IAlbum
{
    private $description;
    public function __construct($description)
    {
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }
}

interface IResource
{
    public function snippit();
}

class AlbumResource implements IResource
{
    private $albumInstance;
    public function __construct($albumInstance)
    {
        $this->albumInstance = $albumInstance;
    }
    public function snippit(){
        return $this->albumInstance->getDescription();
    }
}

class BookResource implements IResource
{
    private $bookInstance;
    public function __construct($bookInstance)
    {
        $this->bookInstance = $bookInstance;
    }
    public function snippit(){
        return $this->bookInstance->getSummary();
    }
}


interface IDisplay
{
    public function show();
}

class CompactDisplay implements IDisplay
{
    public function __construct($resource)
    {
        $this->resource = $resource;
    }
    public function show()
    {
        return "compact " . $this->resource->snippit();
    }
}

class FullDisplay implements IDisplay
{
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function show()
    {
        return "Full view" . $this->resource->snippit() ;
    }
}

$bookResource = new BookResource(new Book('great book'));

$view = new CompactDisplay($bookResource);

echo $view->show() . "\n";
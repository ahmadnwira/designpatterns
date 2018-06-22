<?php

/* Facade */
interface IproductFacade
{
    public function name($id);

    public function category($id);

    public function ratings($id);
}

class ProductFacade
{
    public function name($id)
    {
        return 'query internal API for name';
    }

    public function category($id)
    {
        return 'query internal API for category';
    }

    public function ratings($id)
    {
        return 'query external API for users ratings';
    }
}

interface Iproduct
{
    /* assume you get prodcut name and category from your DB */
    public function getName($id);
    public function getCategory($id);
    public function getRatings($id); /* assume you get this frmo 3rd party */
}

class Product implements Iproduct
{
    private $productFacade;
    public function __construct($facade)
    {
        $this->productFacade = $facade;
    }
    public function getName($id)
    {
        return $this->productFacade->name($id);
    }

    public function getCategory($id)
    {
        $this->productFacade->category($id);
    }

    public function getRatings($id)
    {
        $this->productFacade->ratings($id);
    }
}
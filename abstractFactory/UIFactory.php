<?php
/**
* this more appropriate example assumes you have several button classes
* for the diffrent platforms and you want to groub them together accordingly
* so only android components are created together and so on.
*/

interface IUIFactory
{
    public static function createButton();
    public static function createTextArea();
}

class AndroidUIFactory
{
    public static function createButton(){
        return new AndroidButton();
    }

    public static function createTextArea(){
        return new AndroidTextArea();
    }
}

class IosUIFactory
{
    public static function createButton(){
        return new IosButton();
    }

    public static function createTextArea(){
        return new IosTextArea();
    }
}
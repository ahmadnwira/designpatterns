<?php

interface UI
{
    public function button();
    public function textArea();
}

class AndroidUI
{
    public function button(){
        return 'Android Button';
    }
    public function textArea(){
        return 'Android textArea';
    }
}

class IosUI
{
    public function button(){
        return 'IOS Button';
    }
    public function textArea(){
        return 'IOS textArea';
    }
}

interface IUIFactory
{
    public static function createAndroidUI();
    public static function createIosUI();
}

class UIFactory
{
    public static function createAndroidUI(){
        return new AndroidUI();
    }

    public static function createIosUI(){
        return new IosUI();
    }
}

/* if @android env */
$ui = UIFactory::createAndroidUI();
echo $ui->button() . "\n";

/* if @IOS env */
$ui = UIFactory::createIosUI();
echo $ui->button() . "\n";

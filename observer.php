<?php

class WeatherStation implements SplSubject
{
    private $observers;
    private $temperature;

    public function __construct(){
        $this->observers = new SplObjectStorage();
    }

    public function attach (SplObserver $observer){
        $this->observers->attach($observer);
    }

    public function detach (SplObserver $observer){
            $this->observers->detach($observer);
        }


        public function notify (){
            foreach($this->observers  as $observer){
                $observer->update();
            }
    }

    public function getTemperature(){
        return $this->temperature;
    }

    public function setTemperature($temp){
        $this->temperature = $temp;
        $this->notify();
    }
}

/* observer */

interface MyObservable{
    public function update();
}

class subscriber implements MyObservable
{
    private $observable;

    public function __construct(SplSubject $observable){
        $this->observable = $observable;
    }

    public function update() {
        echo "temprature update " . $observable->getTemperature() . "\n";
    }
}

$station = new WeatherStation();
$user = new subscriber($station);
$station->attach($user);
$station->setTemperature(25);
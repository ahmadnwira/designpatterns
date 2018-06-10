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
                $observer->update($this);
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

class subscriber implements SplObserver
{
    public function update(SplSubject $observable) {
        echo "temprature update " . $observable->getTemperature() . "\n";
    }
}

$station = new WeatherStation();
$user = new subscriber();
$station->attach($user);
$station->setTemperature(25);
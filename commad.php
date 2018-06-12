<?php

class LampReciver {
    public function setLampOn(){
        return 'lamp is on';
    }

    public function setLampOff(){
        return 'lamp is off';
    }
}

interface ICommand {
    public function execute();
    public function undo();
}

class LampCommand implements ICommand {
    private $lampReciver;
    public function __construct(LampReciver $lampReciver){
        $this->lampReciver = $lampReciver;
    }
    function execute() {
        return $this->lampReciver->setLampOn();
    }

    function undo() {
        return $this->lampReciver->setLampOff();
    }
}


/* invoker */
$input = fgets(STDIN);

if(trim($input) == 'on'){
    $command = new LampCommand(new LampReciver());
    echo $command->execute(). "\n";
}

if(trim($input) == 'off'){
    $command = new LampCommand(new LampReciver());
    echo $command->undo() . "\n";
}
/* more practical example is to use it for checkout system */
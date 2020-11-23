<?php

    class employee{
        public $idEmployee;
        public $name;
        public $phone;
        public $email;
        public $isActive;

        public function __construct($idEmployee,$name, $phone,$email,$isActive){
            $this->idEmployee = $idEmployee;
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->isActive = $isActive;
        }
    }
?>
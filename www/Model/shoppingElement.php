<?php
    

    class ShoppingElement{

        public $elementData = [];
        public $elementAmount = 0;
        public $elementTotalPrice = 0;

        public function __construct($newElement){
            $this->getElementData = $newElement;
        }
        public function createElement ($elementDT, $amount = 1){
            $this->elementData = $elementDT;
            $this->elementAmount = 1;
            /*if($amount <=0 || empty($amount) || $elementAmount<=0 || empty($elementAmount)){
                $this->elementAmount = 1;
            }*/
            $this->elementTotalPrice = $this->elementAmount * $this->elementData->precio;
        }

        public function increaseElementAmount($amount = 1){
            $this->elementAmount +=$amount;
            $this->elementTotalPrice = ($this->elementData->precio * $this->elementAmount);
        }

        public function setElementData($elementD){
            $this->elementData = $elementD;
        }
        public function setElementAmount($elementAm){
            $this->elementAmount = $elementAm;
        }
        public function setElementTotalPrice($totalPrice){
            $this->elementTotalPrice = $totalPrice;
        }
        public function getElementData(){
            return $this->elementData;
        }
        public function getElementAmount(){
            return $this->elementAmount;
        }
        public function getElementTotalPrice(){
            return $this->elementTotalPrice;
        }

    }
?>
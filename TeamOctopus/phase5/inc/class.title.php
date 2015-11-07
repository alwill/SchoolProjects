<?php
class Title{   
    var $id;
    var $title;
    var $rating;
    var $parentalGuide;
    var $plot;
    var $cast;
    var $netflix;
    var $prime;
    var $type;
    var $time;
    var $runtime;
    var $network;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
?>
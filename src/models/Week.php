<?php
require_once 'Day.php';

class Week {
    public $number;
    public $days;

    public function __construct($number, $days) {
        $this->number = $number;
        $this->days = $days;
    }
}
?>
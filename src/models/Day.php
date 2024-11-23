<?php

class Day {
    public $day;
    public $withBreak;
    public $morningStart;
    public $morningEnd;
    public $afternoonStart;
    public $afternoonEnd;
    public $isOpen;

    public function __construct($day, $withBreak, $morningStart, $morningEnd, $afternoonStart, $afternoonEnd, $isOpen) {
        $this->day = $day;
        $this->withBreak = $withBreak;
        $this->morningStart = $morningStart;
        $this->morningEnd = $morningEnd;
        $this->afternoonStart = $afternoonStart;
        $this->afternoonEnd = $afternoonEnd;
        $this->isOpen = $isOpen;
    }
}
?>
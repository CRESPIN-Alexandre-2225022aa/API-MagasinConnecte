<?php

class Day {
    public string $day;
    public bool $withBreak;
    public string $morningStart;
    public string $morningEnd;
    public string $afternoonStart;
    public string $afternoonEnd;
    public bool $isOpen;

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
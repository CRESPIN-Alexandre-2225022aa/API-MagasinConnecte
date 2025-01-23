<?php
require_once 'Week.php';

class Shop {
    public array $weeks;

    public function __construct(array $weeks) {
        $this->weeks = $weeks;
    }

    public function toArray(): array {
        return [
            'weeks' => array_map(fn($week) => $week->toArray(), $this->weeks)
        ];
    }
}
?>
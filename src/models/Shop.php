<?php
require_once 'Week.php';

class Shop {
    public int $id;
    public string $name;
    public string $description;
    public string $address;
    public $images;
    public string $social;
    public string $linkTree;
    public Week $currentWeek;
    public Week $nextWeek;

    public function __construct($id, $name, $description, $address, $images, $social, $linkTree, $currentWeek, $nextWeek) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->address = $address;
        $this->images = $images;
        $this->social = $social;
        $this->linkTree = $linkTree;
        $this->currentWeek = $currentWeek;
        $this->nextWeek = $nextWeek;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'images' => $this->images,
            'social' => $this->social,
            'linkTree' => $this->linkTree,
            'currentWeek' => $this->currentWeek,
            'nextWeek' => $this->nextWeek,
        ];
    }
}
?>
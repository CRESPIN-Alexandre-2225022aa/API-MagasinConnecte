<?php
require_once 'Week.php';

class Shop {
    public $id;
    public $name;
    public $description;
    public $address;
    public $images;
    public $social;
    public $linkTree;
    public $currentWeek;
    public $nextWeek;

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
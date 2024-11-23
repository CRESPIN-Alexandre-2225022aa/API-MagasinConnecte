<?php
class Event {
    public int $id;
    public string $title;
    public string $description;
    public string $images;
    public string $links;
    public string $date;
    public string $time;
    public string $location;

    public function __construct($id, $title, $description, $images, $links, $date, $time, $location) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->images = $images;
        $this->links = $links;
        $this->date = $date;
        $this->time = $time;
        $this->location = $location;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'images' => $this->images,
            'links' => $this->links,
            'date' => $this->date,
            'time' => $this->time,
            'location' => $this->location,
        ];
    }
}
?>
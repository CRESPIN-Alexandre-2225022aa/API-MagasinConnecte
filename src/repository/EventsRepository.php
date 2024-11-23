<?php
require_once '/home/api-magasinconnecte/www/src/models/Event.php';
require_once '/home/api-magasinconnecte/www/src/connector/JsonConnector.php';
class EventsRepository {
    private $connector;

    public function __construct() {
        $this->connector = new JsonConnector('/home/api-magasinconnecte/www/src/data/event.json');
    }

    public function getAllEvents() {
        return $this->connector->read();
    }

    public function addEvent($title,$description,$images,$links,$date,$time,$location): void {
        $events = $this->connector->read();
        $id = count($events) ? $events[count($events) - 1]['id'] + 1 : 1;
        $event = new Event($id, $title, $description, $images, $links, $date, $time, $location);
        $events[] = $event->toArray();
        $this->connector->write($events);
    }

    public function updateEvent($id, $title, $description, $images, $links, $date, $time, $location): void {
        $events = $this->connector->read();
        foreach ($events as &$e) {
            if ($e['id'] == $id) {
                $event = new Event($id, $title, $description, $images, $links, $date, $time, $location);
                $e = $event->toArray();
                break;
            }
        }
        $this->connector->write($events);
    }

    public function deleteEvent($id): void {
        $events = $this->connector->read();
        $filteredEvents = [];
        foreach ($events as $event) {
            if ($event['id'] != $id) {
                $filteredEvents[] = $event;
            }
        }
        $this->connector->write($filteredEvents);
    }
}
?>
<?php
class EventModel {
    private $events = [];

    public function createEvent($eventData) {
        $this->events[] = $eventData;
    }

    public function getEvents() {
        return $this->events;
    }
}
?>


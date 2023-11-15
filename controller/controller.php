<?php
class EventController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function createEvent($eventData) {
        $this->model->createEvent($eventData);
    }

    public function displayEvents() {
        $events = $this->model->getEvents();
        $this->view->displayEvents($events);
    }
}
?>

<?php
require_once 'model/model.php';
require_once 'view/view.php';
require_once 'controller/controller.php';
//require_once 'style.css';
$model = new EventModel();
$view = new EventView();
$controller = new EventController($model, $view);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventData = [
        'event_name' => $_POST['event_name'],
        'event_date' => $_POST['event_date'],
        'event_price' => $_POST['event_price'],
        'event_id' => $_POST['event_id'],
        'event_place' => $_POST['event_place'],
        'event_type' => $_POST['event_type'],
        'event_description' => $_POST['event_description'],
    ];

    $controller->createEvent($eventData);
}

$controller->displayEvents();
?>

<!-- Formulaire pour créer un nouvel événement -->
<form action="" method="post">
    <label for="event_name">Nom de l'événement:</label>
    <input type="text" id="event_name" name="event_name" required>

    <label for="event_date">Date de l'événement:</label>
    <input type="date" id="event_date" name="event_date" required>

    <label for="event_price">Prix de l'événement:</label>
    <input type="number" step="0.01" id="event_price" name="event_price" required>

    <label for="event_id">ID de l'événement:</label>
    <input type="text" id="event_id" name="event_id" required>

    <label for="event_place">Place de l'événement:</label>
    <input type="text" id="event_place" name="event_place" required>

    <label for="event_type">Type de l'événement:</label>
    <input type="text" id="event_type" name="event_type" required>

    <label for="event_description">Description de l'événement:</label>
    <textarea id="event_description" name="event_description" rows="4"></textarea>

    <input type="submit" value="Créer l'événement">
</form>

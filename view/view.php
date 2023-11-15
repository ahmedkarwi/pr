<?php
class EventView {
    public function displayEvents($events) {
        echo "<h2>Événements existants :</h2>";
        echo "<ul>";
        foreach ($events as $event) {
            echo "<li>";
            echo "Nom: " . $event['event_name'] . "<br>";
            echo "Date: " . $event['event_date'] . "<br>";
            echo "Prix: " . $event['event_price'] . "<br>";
            echo "ID: " . $event['event_id'] . "<br>";
            echo "Place: " . $event['event_place'] . "<br>";
            echo "Type: " . $event['event_type'] . "<br>";
            echo "Description: " . $event['event_description'];
            echo "</li><hr>";
        }
        echo "</ul>";
    }
}
?>

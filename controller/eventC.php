<?php

require '../config.php';

class eventC
{

    public function listevent()
    {
        $sql = "SELECT * FROM event";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteevent($event_id)
    {
        $sql = "DELETE FROM event WHERE event_id = :event_id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':event_id', $event_id, PDO::PARAM_INT); // Utilisez PDO::PARAM_INT pour s'assurer que c'est un entier
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    


    function addevent($event)
{
    $sql = "INSERT INTO event (nom, place, type, date, description, prix)  
            VALUES (:nom, :place, :type, :date, :description, :prix)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $event->getNom(),
            'place' => $event->getplace(),
            'type' => $event->gettype(),
            'date' => $event->getdate(),
            'description' => $event->getdescription(),
            'prix' => $event->getprix(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showevent($event_id)
    {
        $sql = "SELECT * FROM event WHERE event_id = :event_id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':event_id', $event_id, PDO::PARAM_INT);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    function updateevent($event, $event_id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE event SET 
    nom = :nom, 
    place = :place, 
    type = :type, 
    date = :date,
    description = :description,
    prix = :prix
WHERE event_id= :event_id'

            );
            
            $query->execute([
                'event_id' => $event_id,
                'nom' => $event->getNom(),
                'place' => $event->getplace(),
                'type' => $event->gettype(),
                'date' => $event->getdate(),
                'description' => $event->getdescription(),
                'prix' => $event->getprix(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
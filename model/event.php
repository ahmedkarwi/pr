<?php
class event
{
    private ?int $event_id = null;
    private ?string $nom	= null;
    private ?string $place = null;
    private ?string $type = null;
    private ?string $date = null;
    private ?string $description = null;
    private ?string $prix = null;
    public function __construct($event_id = null, $nom, $place, $type, $date, $description, $prix)
{
    $this->event_id = $event_id;
    $this->nom = $nom;
    $this->place = $place;
    $this->type = $type;
    $this->date = $date;
    $this->description = $description;
    $this->prix = $prix;
}



    public function getid()
    {
        return $this->event_id;
    }


    public function getnom()
    {
        return $this->nom;
    }

    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getplace()
    {
        
         return $this->place;
    }

    public function setplace($place)
    {
        $this->place = $place;

        return $this;
    }


    public function gettype()
    {
        return $this->type;
    }


    public function settype($type)
    {
        $this->type = $type;

        return $this;
    }


    public function getdate()
    {
        return $this->date;
    }


    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }


    public function getdescription()
    {
        return $this->description;
    }


    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
}
?>


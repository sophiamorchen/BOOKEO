<?php 
require 'Vehicule.php';

class Voiture extends Vehicule
{
    protected int $nombre_roues;
    protected int $nombre_portes;

    

    /**
     * Get the value of nombre_roues
     */ 
    public function getNombre_roues()
    {
        return $this->nombre_roues;
    }

    /**
     * Set the value of nombre_roues
     *
     * @return  self
     */ 
    public function setNombre_roues($nombre_roues)
    {
        $this->nombre_roues = $nombre_roues;

        return $this;
    }

    /**
     * Get the value of nombre_portes
     */ 
    public function getNombre_portes()
    {
        return $this->nombre_portes;
    }

    /**
     * Set the value of nombre_portes
     *
     * @return  self
     */ 
    public function setNombre_portes($nombre_portes)
    {
        $this->nombre_portes = $nombre_portes;

        return $this;
    }
}
$voiture1 = new Voiture('Ma voiture');
$voiture1->setNombre_portes('3');
$voiture1->setNombre_roues('4');
$voiture1->setColor('red');
$voiture1->setMarque('Toyota');
$voiture1->accelerer();
var_dump($voiture1);
?>
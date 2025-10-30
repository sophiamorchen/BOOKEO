<?php
require 'Vehicule.php';
class Bateau extends Vehicule
{
    protected int $nb_cabines;
    protected int $nb_voiles;

    /**
     * Get the value of nb_cabines
     */ 
    public function getNb_cabines()
    {
        return $this->nb_cabines;
    }

    /**
     * Set the value of nb_cabines
     *
     * @return  self
     */ 
    public function setNb_cabines($nb_cabines)
    {
        $this->nb_cabines = $nb_cabines;

        return $this;
    }

    /**
     * Get the value of nb_voiles
     */ 
    public function getNb_voiles()
    {
        return $this->nb_voiles;
    }

    /**
     * Set the value of nb_voiles
     *
     * @return  self
     */ 
    public function setNb_voiles($nb_voiles)
    {
        $this->nb_voiles = $nb_voiles;

        return $this;
    }
}
$bateau = new Bateau('Mon bateau');
$bateau->setColor('blue');
$bateau->setNb_cabines('2');
$bateau->setMarque('Voilia');
var_dump($bateau)


?>
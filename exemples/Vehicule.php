<?php
require 'Interfaces.php';
class Vehicule implements IVehicule
{
    protected string $marque;
    protected string $color;
    protected float $vitesse_max;
    public string $name;

    public function __construct(string $name){
        $this->name = $name;
    }
    public function accelerer() 
    {
        echo "Vous accelerez";
    }
    public function freiner() 
    {
        echo "Vous freinez !";
    }

    /**
     * Get the value of marque
     */ 
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of vitesse_max
     */ 
    public function getVitesse_max()
    {
        return $this->vitesse_max;
    }

    /**
     * Set the value of vitesse_max
     *
     * @return  self
     */ 
    public function setVitesse_max($vitesse_max)
    {
        $this->vitesse_max = $vitesse_max;

        return $this;
    }
}


?>
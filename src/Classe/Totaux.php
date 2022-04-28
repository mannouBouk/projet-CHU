<?php

namespace App\Classe;



class Totaux
{


    public $totale;


    function __construct($totale)
    {
        $this->totale = $totale;
    }

    public function getTotale()
    {

        return $this->totale;
    }
    public function setTotale($totale)
    {

        $this->totale = $totale;

        return $this;
    }
}

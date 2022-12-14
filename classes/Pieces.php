<?php

namespace App;

use Exception;

// mon code respecte le principe de substitution de Liskov 

// Création de la classe mere 
class Pieces
{
    public $position;
    public $grille;
    public $namePieces;

    public function __construct($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    // Affichage de la grille contenant les mouvements possible ainsi que le nom de la pièces
    public function show($position, $move)
    {
        try{
            if((int)substr($position, -1) > 0 && (int)substr($position, -1) < 9){
                $this->grille = new Grille($position, $move, $this->namePieces);
            }else{
                throw new Exception('Position non valide.');
            }
        }catch(Exception $e){
            echo "Veuillez mettre une position valide. \n";
        }
        
    }
}

/**
 *  principe ouvert/fermé (OC)
 */

interface PositionInterface {
    public function getPossibleLocation($position): array;
}
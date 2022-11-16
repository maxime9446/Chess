<?php

namespace App;

require_once 'Pieces.php';

class Pion extends Pieces implements PositionInterface
{
    // fonction permettant d'afficher toutes les déplacements possibles
    public function getPossibleLocation($position): array
    {
        // affichage emoji d'un pion
        $this->namePieces = " \u{265F}\u{FE0F} ";
        // Convertion d'un string en array
        $position = str_split($position);
        $width = $position[0];
        $height = $position[1];

        // condition permettant de savoir ou est le pion et savoir combien de déplacements peut il faire 
        if ($height != 2) {
            return [
                $width . ($height + 1) => $width . ($height + 1)
            ];
        } else {
            return [
                $width . ($height + 1) => $width . ($height + 1),
                $width . ($height + 2) => $width . ($height + 2)
            ];
        }
    }
}
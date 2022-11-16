<?php

namespace App;

require_once 'Pieces.php';

class Tour extends Pieces implements PositionInterface
{
    // fonction permettant d'afficher toutes les déplacements possibles
    public function getPossibleLocation($position): array
    {
        $this->namePieces = " \u{1F5FC} ";
        $position = str_split($position);
        $width = $position[0];
        $height = $position[1];
        $alphabetToNumber = [
            1 => 'A',
            2 => 'B',
            3 => 'C',
            4 => 'D',
            5 => 'E',
            6 => 'F',
            7 => 'G',
            8 => 'H',
        ];
        $numberToAlphabet = [
            'A' => 1,
            'B' => 2,
            'C' => 3,
            'D' => 4,
            'E' => 5,
            'F' => 6,
            'G' => 7,
            'H' => 8,
        ];

        $array = array();

        for ($i = 1; $i <= 8; $i++) {
            $posSup = $numberToAlphabet[$width] + $i;
            $posInf = $numberToAlphabet[$width] - $i;
                $arrayPosition = [
                    $width . $i => $width . $i,
                    $alphabetToNumber[$posSup] . $height => $alphabetToNumber[$posSup] . $height,
                    $alphabetToNumber[$posInf] . $height => $alphabetToNumber[$posInf] . $height,
                ];
                $array = array_merge($array, $arrayPosition);
        }

        return $array;
    }
}

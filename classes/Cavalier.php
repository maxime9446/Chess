<?php

namespace App; 

require_once 'Pieces.php';



class Cavalier extends Pieces implements PositionInterface
{
    // fonction permettant d'afficher toutes les déplacements possibles
    public function getPossibleLocation($position): array
    {
        $this->namePieces = " \u{1F3A0}";
        $position = str_split($position);
        $width = $position[0];
        $height = $position[1];
        // tableau en deux dimension permettant d'affecter des chiffres en lettres
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
        // tableau en deux dimension permettant d'affecter des lettres en chiffres
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

        return [
            $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height + 2) => $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height + 2),
            $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height + 2) => $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height + 2),
            $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height - 2) => $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height - 2),
            $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height - 2) => $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height - 2),
            $alphabetToNumber[($numberToAlphabet[$width] + 2)] . ($height + 1) => $alphabetToNumber[($numberToAlphabet[$width] + 2)] . ($height + 1),
            $alphabetToNumber[($numberToAlphabet[$width] - 2)] . ($height - 1) => $alphabetToNumber[($numberToAlphabet[$width] - 2)] . ($height - 1),
            $alphabetToNumber[($numberToAlphabet[$width] - 2)] . ($height + 1) => $alphabetToNumber[($numberToAlphabet[$width] - 2)] . ($height + 1),
            $alphabetToNumber[($numberToAlphabet[$width] + 2)] . ($height - 1) => $alphabetToNumber[($numberToAlphabet[$width] + 2)] . ($height - 1),
        ];
    }
}
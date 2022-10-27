<?php

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
        $this->grille = new Grille($position, $move, $this->namePieces);

    }
}

class Grille
{
    // création de la grille de jeu
    public function __construct($position, $possibleMove, $name)
    {
        // affichage de l'entête du jeu
        $alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        echo "  A  B  C  D  E  F  G  H" . PHP_EOL;
        $position = str_split($position);
        for ($i = 1; $i <= 8; $i++) {
            // affichage des abscisses du jeu
            echo $i;
            foreach ($alpha as $letter) {
                // condition permettant d'afficher tout les déplacements possibles selon l'axe des abscisses
                if ($position[1] == $i) {
                    if ($position[0] === $letter) {
                        // nom de la pièce
                        echo $name;
                    } elseif ($possibleMove[$letter . $i] ?? null) {
                        // affichage des mouvements possibles
                        echo ' X ';
                    } else {
                        // affichage de la grille
                        echo " - ";
                    }
                // condition permettant d'afficher tout les déplacements possibles selon l'axe des ordonnées 
                } elseif ($possibleMove[$letter . $i] ?? null) {
                    // affichage des mouvements possibles
                    echo ' X ';
                } else {
                    // affichage de la grille
                    echo " - ";
                }
            }
            echo PHP_EOL;
        }
    }
}

class Pion extends Pieces
{
    // fonction permettant d'afficher toutes les déplacements possibles
    public function getPossibleLocation($position)
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

class Cavalier extends Pieces
{
    public function getPossibleLocation($position)
    {
        $this->namePieces = " C ";
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

class Tour extends Pieces
{
    public function getPossibleLocation($position)
    {
        $this->namePieces = " T ";
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

        $array = [];

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

class Fou extends Pieces
{
    public function getPossibleLocation($position)
    {
        $this->namePieces = " F ";
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

        $array = [];

        for ($i = 1; $i <= 8; $i++) {
            $posSup = $numberToAlphabet[$width] + $i;
            $posInf = $numberToAlphabet[$width] - $i;
            $arrayPosition = [
                $alphabetToNumber[$posSup] . ($height + $i) => $alphabetToNumber[$posSup] . ($height + $i),
                $alphabetToNumber[$posInf] . ($height - $i) => $alphabetToNumber[$posInf] . ($height - $i),
                $alphabetToNumber[$posSup] . ($height - $i) => $alphabetToNumber[$posSup] . ($height - $i),
                $alphabetToNumber[$posInf] . ($height + $i) => $alphabetToNumber[$posInf] . ($height + $i),
            ];

            $array = array_merge($array, $arrayPosition);
        }

        return $array;
    }
}

class Reine extends Pieces
{
    public function getPossibleLocation($position)
    {
        $this->namePieces = " ^ ";
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

        $array = [];

        for ($i = 1; $i <= 8; $i++) {
            $posSup = $numberToAlphabet[$width] + $i;
            $posInf = $numberToAlphabet[$width] - $i;
            $arrayPosition = [
                $alphabetToNumber[$posSup] . ($height + $i) => $alphabetToNumber[$posSup] . ($height + $i),
                $alphabetToNumber[$posInf] . ($height - $i) => $alphabetToNumber[$posInf] . ($height - $i),
                $alphabetToNumber[$posSup] . ($height - $i) => $alphabetToNumber[$posSup] . ($height - $i),
                $alphabetToNumber[$posInf] . ($height + $i) => $alphabetToNumber[$posInf] . ($height + $i),
                $width . $i => $width . $i,
                $alphabetToNumber[$posSup] . $height => $alphabetToNumber[$posSup] . $height,
                $alphabetToNumber[$posInf] . $height => $alphabetToNumber[$posInf] . $height,
            ];

            $array = array_merge($array, $arrayPosition);
        }

        return $array;
    }
}

class Roi extends Pieces
{
    public function getPossibleLocation($position)
    {
        $this->namePieces = " R ";
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

        return [
            $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height + 1) => $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height + 1),
            $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height - 1) => $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height - 1),
            $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height - 1) => $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height - 1),
            $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height + 1) => $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height + 1),
            $alphabetToNumber[($numberToAlphabet[$width] + 1)] . $height => $alphabetToNumber[($numberToAlphabet[$width] + 1)] . $height,
            $alphabetToNumber[($numberToAlphabet[$width] - 1)] . $height => $alphabetToNumber[($numberToAlphabet[$width] - 1)] . $height,
            $alphabetToNumber[$numberToAlphabet[$width]] . ($height + 1) => $alphabetToNumber[($numberToAlphabet[$width] + 1)] . ($height + 1),
            $alphabetToNumber[$numberToAlphabet[$width]] . ($height - 1) => $alphabetToNumber[($numberToAlphabet[$width] - 1)] . ($height - 1),
        ];
    }
}

// Creation d'une pièce
$piece = new Pion('D5');
// permettant de séparer la lettre et le chiffre ('D' , 5)
$position = $piece->position;
// permettant de montrer les déplacements possibles de la pièce
$move = $piece->getPossibleLocation($position);
// affichage des mouvements possibles de la pièce
$piece->show($position, $move);

$piece = new Tour('D5');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Cavalier('D5');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Fou('D5');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Reine('D5');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Roi('D5');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);
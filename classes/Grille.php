<?php

namespace App;

class Grille
{
    // création de la grille de jeu
    public function __construct($position, $possibleMove, $name)
    {
        echo "\n \nSimulateur de déplacement jeu d'echec pour : " . $name ."\n\n" ;
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
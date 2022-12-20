<?php

namespace App;
require_once 'autoloader.php';


// Creation d'une pièce + test exception < 9
$piece = new Pion('A9');
// permettant de savoir où est la pièce
$position = $piece->position;
// permettant de montrer les déplacements possibles de la pièce
$move = $piece->getPossibleLocation($position);
// affichage des mouvements possibles de la pièce
$piece->show($position, $move);

// test exception >0
$piece = new Pion('A0');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Pion('A2');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);


$piece = new Tour('B4');
$position = $piece->position;
$move = @$piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Cavalier('E5');
$position = $piece->position;
$move = @$piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Fou('G4');
$position = $piece->position;
$move = @$piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Reine('B8');
$position = $piece->position;
$move = @$piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new Roi('C7');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);
<?php

spl_autoload_register(function($className){
    
    $className = str_replace("App", "classes", $className);
    $className = str_replace("\\", "/", $className);
    $className .= '.php';

    require_once $className;
});

// Creation d'une pièce
$piece = new App\Pion('A5');
// permettant de savoir où est la pièce
$position = $piece->position;
// permettant de montrer les déplacements possibles de la pièce
$move = $piece->getPossibleLocation($position);
// affichage des mouvements possibles de la pièce
$piece->show($position, $move);

$piece = new App\Tour('B2');
$position = $piece->position;
$move = @$piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new App\Cavalier('E5');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new App\Fou('G4');
$position = $piece->position;
$move = @$piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new App\Reine('B8');
$position = $piece->position;
$move = @$piece->getPossibleLocation($position);
$piece->show($position, $move);

$piece = new App\Roi('C7');
$position = $piece->position;
$move = $piece->getPossibleLocation($position);
$piece->show($position, $move);
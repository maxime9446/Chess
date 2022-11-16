Lors de ce projet, j'ai utilisé les 5 principes du SOLID :

S: j'ai séparé toutes mes classes en plusieurs ceux qui me permettent d'avoir un code plus clair, plus simple à maintenir.

O : J'ai créé une interface qui m'indique quelle méthode est la plus appelée.

L : les enfants (pion, cavalier, reine, ...) de la classe parent (Pieces) respectent exactement la même définition de la classe parent ceux qui 
permet d'eviter les bogues et de lire plus facilement le code.

I : je respecte ce principe car une interface avec une fonction a été crée pour tous les enfants ceux qui me permet de lire plus facilement le code.

D : je ne respecte pas ce principe car je n'est pas encore réussi à mettre en place le provider car j'ai un paramètre dans ma méthode.
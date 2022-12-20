# Simulateur de déplacement jeu d'echec
### Auteur : BECKER Maxime
### Version : 1.0

## Utilisation de la méthode SOLID

## Lors de ce projet, j'ai utilisé les 5 principes du SOLID :
### Single Responsability Principle
* S: j'ai séparé toutes mes classes en plusieurs ceux qui me permettent d'avoir un code plus clair, plus simple à maintenir.
### Open/Closed Principle
* O : J'ai créé une interface qui m'indique quelle méthode est la plus appelée.
### Liskov Substitution Principle
* L : les enfants (pion, cavalier, reine, ...) de la classe parent (Pieces) respectent exactement la même définition de la classe parent ceux qui 
permet d'eviter les bogues et de lire plus facilement le code.
### Interface Segregation Principle
* I : je respecte ce principe car une interface avec une fonction a été crée pour tous les enfants ceux qui me permet de lire plus facilement le code.
### Dependency Inversion Principle
* D : J'ai créé une interface 'PieceInterface' qui contient la fonction 'getPossibleLocation' qui certifie au programme qu'il va retrouver la méthode getPossibleLocation() dans chacune des classes.

## Fonctionnement

### Procédure à suivre

1. Allez sur la page [Chess](https://github.com/maxime9446/Chess)
2. Cliquez sur le bouton a droite **Clone**
3. Copiez le lien **SSH** ou **HTTPS**
   1. Si vous choisissez **SSH**, vous devez configurer votre clé SSH en suivant ce [tutoriel](https://docs.gitlab.com/ee/user/ssh.html) puis ce [tutoriel](https://www.troyweb.com/blog-list/a-hrefhttpstroywebsquarespacecomblog-listindexphp201306ssh-keys-and-ssh-agent-on-windowslinuxmacssh-keys-and-ssh-agent-on-windowslinuxmaca) pour éviter de taper votre phrase de passphrase à chaque fois.
   2. Si vous choisissez **HTTPS**, vous devrez entrer à chaque manipulation du GIT votre login et votre mot de passe.
4. Ouvrez un terminal dans lequel vous voulez que le code Echec se trouve
5. Ecrivez **git clone** avec l'url que vous avez récupéré à la place.
   1. `git clone` `git@github.com:maxime9446/Chess.git`
   2. `git clone` `https://github.com/maxime9446/Chess.git`
6. Puis `cd Echec/`
7. Taper dans votre terminal `php index.php`




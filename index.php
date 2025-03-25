<?php
require_once("Animal.php");
require_once("Mammifere.php");
require_once("Oiseau.php");

$peroquet = new Oiseau("gaetan", "Girafe", "50 cm");

$lion = new Mammifere("Gaetan", "éléphant", "bien poilu");




var_dump($lion->presenter());
var_dump($peroquet->presenter());

echo $lion->presenter();

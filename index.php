<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$titulaire1 = new Titulaire("FRANCOIS", "Jean", "1989-05-06", "PARIS");

$compte1 = new CompteBancaire("Livret A", 1987.56, "€", $titulaire1);
$compte2 = new CompteBancaire("Compte courant", 1546.8, "€", $titulaire1);
$compte3 = new CompteBancaire("Compte épargne", 9863.56, "€", $titulaire1);


echo $titulaire1->afficherInfosComptes();
$compte2->effectuerVirement(1546.8, $compte1);
echo $titulaire1->afficherInfosComptes();



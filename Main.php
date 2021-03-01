<?php

// Chargeur automatique pour inclure toutes les classes instanciées
function chargerClasse($classe) {
    require $classe . ".php";
}
// On ajoute la fonction chargerClasse() à la pile d'autoloads
spl_autoload_register('chargerClasse');

$article = new Post([
    'id' => 1,
    'title' => 'test',
    'content' => 'ceci est un test',
]);

$manager = new PostManager();
$manager->add($article);


?>
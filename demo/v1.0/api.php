<?php 
/**
 * FlipQuiz API
 * Lecture des données relatives aux Quiz.
 * Format d'url : api.php?t=TABLENAME&id=IDENTIFIANT
 * TABLENAME:   Paramètre $_GET['t']  = une clé du tableau stocké dans la variable $mapping ci-dessous.
 * IDENTIFIANT: Paramètre $_GET['id'] = l'identifiant de l'élément à rechercher. Si ce paramètre n'est pas fourni, toutes les données de la table sont récupérées. 
 */

require (dirname(__DIR__).'/Loader.php'); 

// Si le paramètre "t" n'est pas fourni, on affiche un message générique et on stoppe le script.
if(empty($_GET['t'])) {
    exit('Welcome !');
}

// Le paramètre d'url "t" correspond au nom virtuel de la table sur laquelle effectuer les requêtes (voir tableau $mapping ci-dessous).
$table = basename($_GET['t']);


// Chaque clé du tableau $mapping correspond au nom virtuel de la table et pointe sur le nom de la classe Modèle à instancier.
$mapping = [
    'quizzes'       => 'Models\\Quizzes', 
    'categories'    => 'Models\\Categories', 
    'questions'     => 'Models\\Questions'
];

// Contrôle si le nom fourni en paramètre d'url correspond à une clé du tableau $mapping.
// Si aucune correspondance n'est trouvée, on affiche un message générique et on stoppe le script.
if(!array_key_exists($table, $mapping)) {
    exit('Welcome Neo !'); 
}

// Récupération du modèle à instancier
$table = $mapping[$table];

// Allocation et initialisation du modèle
$model = new $table();


// Le paramètre d'url "id" correspond à l'identifiant de l'élément à rechercher dans la table. 
// Si ce paramètre n'est pas fourni, toutes les données de la table sont récupérées.
$id = $_GET['id'] ?? 0;

// Conversion de la valeur récupérée en nombre entier (int).
$id = intval($id);


if($id > 0) { // Si $id est un entier supérieur à 0, recherche de l'élément dans la table.
    $result = $model->get($id);
}
else { // Sinon, récupération de toutes les lignes de la table.
    $result = $model->getAll();
}

// Conversion du résultat en JSON.
$result = json_encode($result, JSON_PRETTY_PRINT);

// Met le script en pause pendant 5 secondes (pour simuler une réponse lente)
//sleep(5);

// Affiche le résultat et met fin au script.
exit($result);
<?php

// Connexion BDD -> PDO
require_once('config.php');
$pdo = new PDO ($dsn, $username, $passwd, [
   // Rapport Erreurs + Exceptions
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   // Récupération Défaut -> Tableau Associatif
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


// TRY & CATCH -> ALL -> Table : recipe
$error = null;
try{
   $query = $pdo->query('SELECT * FROM `recipe`'); // TRY -> Exécute la requête
   $data  = $query->fetchAll(); // Retourne ALL = tableau
}catch(PDOException $e){ // CATCH -> Exceptions PDO
   $error = $e->message();
}

//
$page = 'home';
$access = array('home');

if (isset($_GET['page'])){

   if (in_array($_GET['page'], $access))
   $page = $_GET['page'];
}

require('controllers/main.php');

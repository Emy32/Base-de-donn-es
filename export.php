<?php


 try
{
    /* on définie les options de la connexion */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    /* on réalise la connexion */
    $bdd = new PDO('mysql:dbname=gebd_toure;host=127.0.0.1', 'root', '', $pdo_options);
    /* on prépare la requête avec des marqueurs */
    $reponse = $bdd->prepare('SELECT img_id, img_type, img_blob FROM images WHERE img_id =:id');
    $reponse->bindValue(':id',(isset($_GET['img_id'])),PDO::PARAM_INT);
    $reponse->execute();
    $donnees = $reponse->fetch();
    /* on ferme la connexion */
    $reponse->closeCursor();
}
catch(EXCEPTION $e)
{  
    /* on affiche les erreur éventuelles en développement */
    die('Erreur : '.$e->getMessage());
}
header('Content-Type: images');
echo $donnees['img_nom'];
?>


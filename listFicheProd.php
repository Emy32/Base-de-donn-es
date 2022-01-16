<?php

require_once('./include/header.php');
require_once('./database/base.php');

$db=getDB();

$productId = $_GET['productId'];

$FicheProduit=get1produitCategorie($db,$productId);

      
$str = '<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';

$str .= '<tr>';

$str .='<th>Id</th>';
$str .='<th>Produits</th>';
$str .='<th>Prix unitaire</th>';
$str .='<th>Taux TVA</th>';
$str .='<th>Prix total</th>';
$str .='<th>Créer le</th>';
$str .='<th>Modifier le</th>';
$str .='<th>Categorie</th>';
$str .= '</tr>';
foreach ($FicheProduit as $index =>$item) {
$str .= '<tr>';
$str .= '<td>' . $item['Id'] . '</td>';
$str .= '<td>' . $item['nom'] . '</td>';
$str .= '<td>' . $item['prix_unitaire'] . '</td>';
$str .= '<td>' . $item['taux_tva'] . '</td>';
$str .= '<td>' . $item['prix_total'] . '</td>';
$str .= '<td>' . $item['created_at'] . '</td>';
$str .= '<td>' . $item['updated_at'] . '</td>';
$str .= '<td>' . $item['nom_categorie'] . '</td>';
$str .= '</tr>';
}
echo $str;

echo '</table>';





  


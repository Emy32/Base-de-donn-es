<a href='creeModiProd.php'><button type="button" class="btn btn-danger">CREER</button></a>
<a href='creeModiProd.php'><button type="button" class="btn btn-success">MODIFIER</button></a>
<?php

require_once('./include/header.php');
require_once('./database/base.php');

$db=getDB();


$produit =  getProduits($db);


  
  
$str = '<table class="table">';
$str .='<thead class="thead-dark">';

 
    $str .= '<tr>';
    $str .='<th scope="col">Produits</th>';
    $str .='<th scope="col">Prix unitaire</th>';
    $str .='<th scope="col">Taux TVA</th>';
    $str .='<th scope="col">Prix total</th>';
    $str .='<th scope="col">Créer le</th>';
    $str .='<th scope="col">Modifier </th>';
   
    $str .= '</tr>';
    foreach ($produit as $index =>$item) {
     
      $img_prod = '<img height = "50px" src ="image/  ">';
    $str .= '<tr>';
    $str .= '<td>' . $item['nom'] . '</td>';
    $str .= '<td>' . $item['prix_unitaire'] . '</td>';
    $str .= '<td>' . $item['taux_tva'] . '</td>';
    $str .= '<td>' . $item['prix_total'] . '</td>';
    $str .= '<td>' . $item['created_at'] . '</td>';
    $str .= '<td>' . $item['updated_at'] . '</td>';
    
    $str .= '</tr>';
    $str .='</thead>';
    $str .='</tbody>';
}
   echo $str;
  
echo '</table>';





  
  

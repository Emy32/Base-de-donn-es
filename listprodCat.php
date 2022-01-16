<a href='creeModCat.php'><button type="button" class="btn btn-danger">CREER</button></a>
<a href='creeModCat.php'><button type="button" class="btn btn-success">MODIFIER</button></a>

<?php
require_once('database/base.php');
require_once('./include/header.php');


$db =getDB();
$categorieId = $_GET['categorieId'];
  

$produitCat=getProduitfromCategorie($db,$categorieId);
$str = '<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';

    $str .= '<tr>';
  
    $str .='<th>Produits</th>';
    $str .='<th>Prix unitaire</th>';
    $str .='<th>Taux TVA</th>';
    $str .='<th>Prix total</th>';
    $str .='<th>Créer le</th>';
    $str .='<th>Modifier le</th>';
    $str .='<th>Categorie Id</th>';
    $str .='<th>Categorie Nom</th>';
    $str .= '</tr>';

    echo $str;


  foreach($produitCat as $index =>$item){
    $str = '<tr>';
   
    $str .= '<td>' . $item['nom'] . '</td>';
    $str .= '<td>' . $item['prix_unitaire'] . '</td>';
    $str .= '<td>' . $item['taux_tva'] . '</td>';
    $str .= '<td>' . $item['prix_total'] . '</td>';
    $str .= '<td>' . $item['created_at'] . '</td>';
    $str .= '<td>' . $item['updated_at'] . '</td>';
    $str .= '<td>' . $item['Categorie_id'] . '</td>';
    $str .= '<td>' . $item['nom_categorie'] . '</td>';

   $str .= '</tr>';
    
   echo $str;
  }
  

  echo '</table>';


    ?>
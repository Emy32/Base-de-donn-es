<?php

require_once('./include/header.php');
   require_once('./database/base.php');

   
   if(isset($_POST)){
    $str ='<form method="POST" action ="">';
    $str .= '<input type="num" placeholder="id" name="id"/>';
    $str .= '<input type="text" placeholder="Nom" name="nom"/>';
    $str .= '<input type="num" placeholder="prix_unitaire" name="prix_unitaire"/>';
    $str .= '<input type="num" placeholder="taux_tva" name="taux_tva"/>';
    $str .= '<input type="num" placeholder="prix_total" name="prix_total"/>';
    $str .= '<input type="datetime" placeholder="date de creation" name="created_at"/>';
    $str .= '<input type="datetime" placeholder="date de modifi." name="updated_at"/>';
    $str .= '<input type="num" placeholder="categorie_id" name="categorie_id"/>';
    $str .= '<input type="submit" name="bSubmit"/>';
    $str .= '</form>';
    
    echo $str;
    }

    function editForm($db,$categorieId){

      $db = getDB();
      $produitCat = getProduitfromCategorie($db, $categorieId);
      $str ='<form method="POST" action ="">';
      $str .= '<input type="num" placeholder="id" name="id"/>';
      $str .= '<input type="text" placeholder="Nom" name="nom"/>';
      $str .= '<input type="num" placeholder="prix_unitaire" name="prix_unitaire"/>';
      $str .= '<input type="num" placeholder="taux_tva" name="taux_tva"/>';
      $str .= '<input type="num" placeholder="prix_total" name="prix_total"/>';
      $str .= '<input type="datetime" placeholder="date de creation" name="created_at"/>';
      $str .= '<input type="datetime" placeholder="date de modifi." name="updated_at"/>';
      $str .= '<input type="submit" name="bSubmit"/>';
      $str .= '</form>';
      
      echo $str;
      }

      
  

  function save($db, $categorieId){
    $newProduitfromCategorie = [
        'nom' => strip_tags($_POST['nom']),
        'prix_unitaire' => strip_tags($_POST['prix_unitaire']),
        'taux_tva' => strip_tags($_POST['taux_tva']),
        'prix_total' => strip_tags($_POST['prix_total']),
        'created_at' => strip_tags($_POST['created_at']),
        'updated_at' => strip_tags($_POST['updated_at']),
        
    ];

   
    $db = getDb();

    saveProduit($db,  $newProduitfromCategorie);

    header('Location: /source/listprodCat.php');

 
  }

  function updateProdCategorie($db,$categorieId){
    $updatedProduitfromCategorie = [
      
        'nom' => strip_tags($_POST['nom']),
        'prix_unitaire' => strip_tags($_POST['prix_unitaire']),
        'taux_tva' => strip_tags($_POST['taux_tva']),
        'prix_total' => strip_tags($_POST['prix_total']),
        'created_at' => strip_tags($_POST['created_at']),
        'updated_at' => strip_tags($_POST['updated_at']),
        
    ];
    
    $db = getDb();
    
    updateProdCategorie($db,$categorieId);

    header('Location: /source/listprodCat.php');
    
    }
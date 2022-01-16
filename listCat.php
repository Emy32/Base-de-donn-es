<a href='creeModiProd.php'><button type="button" class="btn btn-danger">CREER</button></a>
<a href='creeModiProd.php'><button type="button" class="btn btn-success">MODIFIER</button></a>

<?php
require_once('database/base.php');
require_once('./include/header.php');

  $db =getDB();
  
  $categories = getCategories($db);
 ?>
 <center>
 <?php


  
    $str = '<table class="table is-bordered">';

    $str .= '<tr>';
    $str .='<th>Categories</th>';
    $str .='<th>creer le</th>';
    $str .='<th>Modifier le</th>';
    $str .= '</tr>';
    foreach ($categories as $index =>$item) {
        $str .= '<tr>';
      //  $str .= '<td>' . $item['id'] . '</td>';
        $str .= '<td>' . $item['nom'] . '</td>';
        $str .= '<td>' . $item['created_at'] . '</td>';
        $str .= '<td>' . $item['updated_at'] . '</td>';
       $str .= '</tr>';
    }
       echo $str;
   
    echo '</table>';
    
  ?>
  </center>
  <?php
    
  
    
    function createForm(){
    $str ='<form method="POST" action ="">';
    $str .= '<input type="text" placeholder="Nom" name="nom"/>';
    $str .= '<input type="date" placeholder="date de creation" name="created_at"/>';
    $str .= '<input type="date" placeholder="date de modifi." name="updated_at"/>';
    $str .= '<input type="submit" name="bSubmit"/>';
    $str .= '</form>';
    
    echo $str;
    }
  

    function editForm($id){

      $db = getDB();
      $categorie = getCategorie($db, $id);
      $str ='<form method="POST" action ="">';
      $str .= '<input type="text" placeholder="Nom" name="nom"/>';
      $str .= '<input type="date" placeholder="date de creation" name="created_at"/>';
      $str .= '<input type="date" placeholder="date de modifi." name="updated_at"/>';
      $str .= '<input type="submit" name="bSubmit"/>';
      $str .= '</form>';
      
      echo $str;
      }

  

function save()
{
    $newCtegorie = [
        'nom' => strip_tags($_POST['nom']),
        'created_at' => strip_tags($_POST['created_at']),
        'updated_at' => strip_tags($_POST['updated_at']),
        
    ];

    $db = getDb();

    saveCategorie($db, $newCtegorie);
    
    header('location:/index.php/categories');
   
  }

  
function update($id)
{
    $updatedCategorie = [
        'id' => $id,
        'nom' => strip_tags($_POST['nom']),
        'created_at' => strip_tags($_POST['create_at']),
        'updated_at' => strip_tags($_POST['updated_at']),
        
    ];

    $db = getDb();

    updateCategorie($db, $updatedCategorie);

    header('location:/index.php/categories');
   
  }


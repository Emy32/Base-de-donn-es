<?php
require_once('./include/header.php');
require_once('./database/base.php');
 



$parameters=explode('/', getcwd());
array_shift($parameters);

echo'<pre>';

/* Transformer une chaine de caractere en tableau*/

$accueil = empty($parameter[0]);
 if($accueil){
    print_r('page accueil');
 }else{
     /*print_r('autre page');*/
     /*url :/produits*/
     $dataType =$parameters[0];
     print_r($dataType);
     require_once('./'.$dataType.'.php');

     $siList =empty($parameters[1]);

     if($siList){
         /*Afficher la liste*/
         listAll();
         
     }else{
         $siCreate = $parameters[1]==='create';

         if($siCreate){
              
            if($_SERVER['REQUEST_METHOD']==='GET'){
                /*afficher le formulaire de creation*/
                createform();
            }

            if($_SERVER['REQUEST_METHOD']==='POST'){
                /*enregistre en base de données*/
                save();
            }
         
        }else{
            $siEdit = !empty($parameters[2]);

            if($siEdit){
                if($_SERVER['REQUEST_METHOD']==='GET'){
                    /*Afficher le formulaire d'edition*/

                    editForm($parameters[2]);
                }

                if($_SERVER['REQUEST_METHOD']==='POST'){
                    update($parameters[1]);
                }
            }else{
                /*Afficher les details de la categorie*/
                details($parameters[1]);
            }
        }
     }


 }



 $id = $_GET['id'] ?? null;

 //print_r(explode('/',$_SERVER['REQUEST_URI']));
  
 //Affichage des resultats

  /*echo '<table class="table">';

  foreach ($data as $index => $row) {
    $str = '<tr>';
    $str .= '<td>'.$row['id'].'</td>';
    $str .= '<td>'.$row['nom'].'</td>';
    $str .= '<td>'.$row['created_at'].'</td>';
    $str .= '<td>'.$row['updated_at'].'</td>';
    $str .='</tr>';
    echo $str;
}*/

?>

<nav>


	
<ul id="menu-deroulant">
           
        <li><a href=".\listCat.php">Catégories</a></li>

        <li><a href=".\listAllProd.php">Produits</a></li>
      
        <li><a href=".\listProdCat.php?categorieId=1">les produits d une categorie</a></li>
      
        <li><a href=".\listFicheProd.php?categorieId=1&id=163">Fiche produit </a></li>
    </ul>


</nav>



 

<?php
function getDB(){
   try {
        return new PDO('mysql:dbname=gebd_toure;host=127.0.0.1', 'root', '');
   } catch (Exception $e) {
       echo $e;
     
    }
   }
   

$db =getDB();

if(isset($_POST['valider'])){
   /*prepare la requete*/
   $req = $db -> prepare('insert into images (img_id,img_nom,img_taille,img_type,
   img_blob) values(?,?,?,?,?)');
   /*execute la requete*/
   $req -> execute(array($_FILES['images']['id'],$_FILES['images']['name'],$_FILES['images']['size'],
   $_FILES['images']['type'],file_get_contents($_FILES['images']['tmp_name'])));
}

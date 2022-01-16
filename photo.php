<?php

if(!empty($_FILES)){
    $img=$_FILES['img'];
    $ext = strtolower(substr($img['name'],-3));
    $allow_ext = array("jpg", "png", "gif");
    $id= uniqid('', true); 
    $direction= $id .'.'. $ext;
    if(in_array($ext,$allow_ext)){
    move_uploaded_file($img['tmp_name'],"image/".$img['name'].$direction);
}
else{
   $erreur = "votre fichier n est pas une image";
}
}



?>

<?php
 if(isset($erreur)){
    echo $erreur;
 }


?>
<!DOCTYPE html>
<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>

<form enctype="multipart/form-data" action="photo.php" method="POST">
<input type="file" name="img"/>
<input type="submit" name="envoyer"/>
</form>





<?php
  /** 
   * Ce fichier represente la vue pour afficher formulaire d'ajout d'un nouveau usager
  */
?>

<html>
  <head>
    <title>Add users</title>
  </head>
  <body>
  <h1>Add users</h1>
  <form action method="Post" action="index.php">
    user_inserted : <input name="user_inserted" type="text"></br>
    first_name : <input name="first_name" type="text"></br>
    last_name : <input name="last_name" type="text"></br>
    job_title : <input name="job_title" type="text"></br>
    email : <input name="email" type="email"></br>
    address_1 : <input name="address_1" type="text"></br>
    address_2 : <input name="address_2" type="text"></br>
    city : <input name="city" type="text"></br>
    postal_code : <input name="postal_code" type="text"></br>
    province : <input name="province" type="text"></br>
    country : <input name="country" type="text"></br>
    phone : <input name="phone" type="text"></br>
    password : <input name="password" type="text"></br>
    salt : <input name="salt" type="text"></br>
    date_of_birth : <input name="date_of_birth" type="date"></br>
    disable : <input name="disable" type="radio" value="1"> Oui
              <input type= "radio" name="disable" value="0"> Non</br>
    reset_password : <input name="reset_password" type="text"></br>
    role_id : <input name="role_id" type="text"></br>



    <input type="hidden" name="action" value="validateInsert"/>
    <input type="submit" value="Ajouter"/>
  </form>
  <a href="index.php">Return</a>
  </body>
</html> 

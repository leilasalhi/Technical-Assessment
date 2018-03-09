<?php
  /** 
   * Ce fichier represente la vue pour afficher formulaire de modification usagers
  */
?>
<html>
  <head>
    <title>Update users</title>
  </head>
  <body>
  <h1>Apdate users</h1>
  <form action method="Post" action="index.php">
  <?php
    while($rangee = mysqli_fetch_assoc($donnees))
    {
  ?>
    user_inserted : <input name="user_inserted" type="text" value="<?= $rangee['user_inserted'] ?>"></br>
    user_modified : <input name="user_modified" type="text" value="<?= $rangee['user_modified'] ?>"></br>
    first_name : <input name="first_name" type="text" value="<?= $rangee['first_name'] ?>"></br>
    last_name : <input name="last_name" type="text" value="<?= $rangee['last_name'] ?>"></br>
    job_title : <input name="job_title" type="text" value="<?= $rangee['job_title'] ?>"></br>
    email : <input name="email" type="email" value="<?= $rangee['email'] ?>"></br>
    address_1 : <input name="address_1" type="text" value="<?= $rangee['address_1'] ?>"></br>
    address_2 : <input name="address_2" type="text" value="<?= $rangee['address_2'] ?>"></br>
    city : <input name="city" type="text" value="<?= $rangee['city'] ?>"></br>
    postal_code : <input name="postal_code" type="text" value="<?= $rangee['postal_code'] ?>"></br>
    province : <input name="province" type="text" value="<?= $rangee['province'] ?>"></br>
    country : <input name="country" type="text" value="<?= $rangee['country'] ?>"></br>
    phone : <input name="phone" type="text" value="<?= $rangee['phone'] ?>"></br>
    password : <input name="password" type="text" value="<?= $rangee['password'] ?>"></br>
    salt : <input name="salt" type="text" value="<?= $rangee['salt'] ?>"></br>
    date_of_birth : <input name="date_of_birth" type="date" value="<?= $rangee['date_of_birth'] ?>"></br>
    disable : <input name="disable" type="radio" value="1"> Oui
              <input type= "radio" name="disable" value="0"> Non</br>
    reset_password : <input name="reset_password" type="text" value="<?= $rangee['reset_password'] ?>"></br>
    role_id : <input name="role_id" type="text" value="<?= $rangee['role_id'] ?>"></br>
    
    <?php
    echo "<a href='index.php?action=validateUpdate&idUser=" . $rangee["user_id"] . "'>Update user</a>";
     }?>
  </form>
  <a href="index.php">Return</a>
  </body>
</html> 

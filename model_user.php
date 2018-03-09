<?php
  /** nous retrouverons dans ce fichier TOUTES les requêtes SQL.
   * C'est aussi ici que nous retrouverons la connexion à la base de données ET les infos nécessaires
   * à celle-ci (username, hostname, password, nom de la base, etc..).
  */
  
  $connexion = connectDB();
  //connexion of data base
  function connectDB()
  {
    $c = mysqli_connect("localhost", "root", "root");
    
    if(!$c)
      die("Erreur de connexion : " . mysqli_connect_error());
    
    $selection = mysqli_select_db($c, "technical_assessment");
    
    if(!$selection)
    {
      die("La base de données n'existe pas.");
    }

    mysqli_query($c, "SET NAMES 'utf8'");
    return $c;
  }
  
  //get all users
  function GetAllUsers()
  {
    global $connexion;
    $requete = "SELECT user_id,first_name, last_name, email from users";
    $resultat = mysqli_query($connexion, $requete);
    return $resultat;
  }

  //insert user
  function insertUser($user_inserted, $user_modified, $first_name, $last_name, $job_title, $email, $address_1, $address_2, $city, 
                      $postal_code, $province, $country, $phone, $password, $salt, $date_of_birth, $disable, $reset_password, $role_id)
  {
    global $connexion;
    $requete = "INSERT INTO users(ts_inserted, user_inserted, td_modified, user_modified, first_name, last_name, job_title, email, address_1, address_2, city, 
    postal_code, province, country, phone, password, salt, date_of_birth, disable, reset_password, role_id) VALUES ('NOW()','" . $user_inserted . "', 'NOW()','" . $user_modified . "','"
    . $first_name . "','" . $last_name . "','" . $job_title . "','" . $email . "','" . $address_1 . "','" . $address_2 . "','" 
    . $city . "','" . $postal_code . "','" . $province . "','" . $country . "','" . $phone . "','" . $password . "' ,'" . $salt . 
    "','" . $date_of_birth . "','" . $disable . "','" . $reset_password . "','" . $role_id . "')";
    $resultat = mysqli_query($connexion, $requete);
  }

  //delete user
  function deleteUser($idUser)
  {
    global $connexion;
    $requete = "DELETE FROM users WHERE user_id = " . $idUser;
    $resultat = mysqli_query($connexion, $requete);
    
  }

  //get user by id
  function GetUserId($id)
  {
    global $connexion;
    $requete = "SELECT * from users WHERE user_id = " . $id;
    $resultat = mysqli_query($connexion, $requete);
    return $resultat;
  }

  //update users
  function updateUser($user_inserted, $user_modified, $first_name, $last_name, $job_title, $email, $address_1, $address_2, $city, 
                      $postal_code, $province, $country, $phone, $password, $salt, $date_of_birth, $disable, $reset_password, $role_id, $idUser)
    {
      global $connexion;
      $requete = "UPDATE users SET user_inserted = '" . $user_inserted . "', td_modified = 'NOW()', user_modified = '" . $user_modified . "',
      first_name = '" . $first_name . "',last_name = '" . $last_name . "', job_title = '" . $job_title . "', email = '" . $email . "', address_1 ='" . $address_1 . "', address_2 = '" . $address_2 . "', city = '" 
      . $city . "', postal_code = '" . $postal_code . "', province = '" . $province . "', country = '" . $country . "', phone ='" . $phone . "','" . $password . "' , salt = '" . $salt . 
      "', date_of_birth = '" . $date_of_birth . "', disable ='" . $disable . "', reset_password ='" . $reset_password . "', role_id = '" . $role_id . "' where user_id='". $idUser . "')";
      $resultat = mysqli_query($connexion, $requete);
    }  
?>
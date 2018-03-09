<?php
  /** 
   * nous retrouverons dans ce fichier TOUTES les actions faites dans notre site et qui permetent de manipuler la base de donnée
  */
  require_once("model_user.php");

  if(isset($_REQUEST["action"]))
    $action = $_REQUEST["action"];
  else
  {
    $action = "Accueil";
  }
  
  switch($action)
  {
    case "Accueil" :
      require_once("index.html");
      break;

    case "ListUsers" :
      $donnees=GetAllUsers();
      require_once("vues/user.html");
      break;
      
    case "addUser" :
      require_once("vues/formUser.php");
      break;

    case "validateInsert" :
      if(isset($_POST["user_inserted"]) && isset($_POST["user_modified"]) && isset($_POST["first_name"]) 
        && isset($_POST["last_name"]) &&isset($_POST["job_title"]) && isset($_POST["email"])
        && isset($_POST["address_1"]) && isset($_POST["address_2"]) && isset($_POST["city"]) 
        && isset($_POST["postal_code"]) && isset($_POST["province"]) && isset($_POST["country"]) 
        && isset($_POST["phone"]) && isset($_POST["password"]) && isset($_POST["salt"]) && 
        isset($_POST["date_of_birth"]) && isset($_POST["disable"]) && isset($_POST["reset_password"]) 
        && isset($_POST["role_id"])  ){
        if($_POST["job_title"]!="" && $_POST["salt"]!="" && $_POST["disable"]!=""){
          insertUser($_POST["user_inserted"],$_POST["user_modified"],$_POST["first_name"],$_POST["last_name"],
          $_POST["job_title"], $_POST["email"],$_POST["address_1"], $_POST["address_2"], $_POST["city"],
          $_POST["postal_code"], $_POST["province"], $_POST["country"],$_POST["phone"], $_POST["password"], $_POST["salt"],
          $_POST["date_of_birth"], $_POST["disable"], $_POST["reset_password"], $_POST["role_id"]);
          afficheListUsers();
        }
      }
      break;
      
    case "deleteUser" :
      if(!isset($_GET["idUser"]))
      {       

         afficheListUsers();
      }
      else
      {
        $donnees=deleteUser($_GET["idUser"]);
        afficheListUsers();
      } 
      break; 

    case "updateUser" :
      if(!isset($_GET["idUser"]))
      {       
        afficheListUsers();
      }
      else
      {
        $donnees=GetUserId($_GET["idUser"]);
        require_once("vues/formUserUpdate.php");
      }
      break; 

    case "validateUpdate" :
      if(isset($_POST["user_inserted"]) && isset($_POST["user_modified"]) && isset($_POST["first_name"]) 
      && isset($_POST["last_name"]) &&isset($_POST["job_title"]) && isset($_POST["email"])
      && isset($_POST["address_1"]) && isset($_POST["address_2"]) && isset($_POST["city"]) 
      && isset($_POST["postal_code"]) && isset($_POST["province"]) && isset($_POST["country"]) 
      && isset($_POST["phone"]) && isset($_POST["password"]) && isset($_POST["salt"]) && 
      isset($_POSTd["date_of_birth"]) && isset($_POST["disable"]) && isset($_POST["reset_password"]) 
      && isset($_POST["role_id"]))
      {
        if($_POST["job_title"]!="" && $_POST["salt"]!="" && $_POST["disable"]!="")
        {
          updateUser($_POST["user_inserted"],$_POST["user_modified"],$_POST["first_name"],$_POST["last_name"],
          $_POST["job_title"], $_POST["email"],$_POST["address_1"], $_POST["address_2"], $_POST["city"],
          $_POST["postal_code"], $_POST["province"], $_POST["country"],$_POST["phone"], $_POST["password"], $_POST["salt"],
          $_POST["date_of_birth"], $_POST["disable"], $_POST["reset_password"], $_POST["role_id"], $_POST["user_id"]);
          
          afficheListUsers();
        }
      }
      break; 
    
    default :
      afficheListUsers();
  }

  function afficheListUsers()
  {
    $donnees = GetAllUsers();     
    require_once("vues/user.html");
  }
?>
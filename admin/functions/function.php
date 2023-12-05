<?php session_start(); 

    require_once('../config.php');
   
  function get_header(){
  	require_once('includes/header.php');
  }

    function get_sidebar(){
  	require_once('includes/sidebar.php');
  }

      function get_footer(){
  	require_once('includes/footer.php');
  }

  function loggedID(){
    return $_SESSION['id'] ? true:false;
  }

  function needLogged(){
    $check=loggedID();
    if(!$check){
      header('location:login.php');
    }

  }

 ?>
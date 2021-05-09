<?php

    $connect=mysqli_connect("localhost:8889", "root", "root", "hopharm");
    if ( ! $connect ) {
      die ( "La connexion a échoué:" . mysqli_connect_error ( ) ) ;
    }else {
      echo "Connecté avec succès" ;
    }
    $select=mysqli_select_db($connect, "hopharm");
	  mysqli_query($connect, "SET NAMES UTF8") ;
?>

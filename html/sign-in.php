<!DOCTYPE html>
<html>
<head>
  <?php
  session_start();
  include('connexion_db/cnx.php');
    ?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Connexion</title>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/login.css" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-cyan login-page authentication">

  <?php
    if(isset($_POST['username'])){

      $LOGIN = addslashes($_POST["username"]) ;
      $MOTDEPASSE = addslashes($_POST["password"]) ;

      $reqTestExistEmail="select * from utilisateur where login='".$LOGIN."' and motdepasse='".$MOTDEPASSE."'";
      $queryTestExistEmail=mysqli_query($connect, $reqTestExistEmail);

  if(mysqli_num_rows($queryTestExistEmail)!=0){
    while($enregTestExistEmail=mysqli_fetch_array($queryTestExistEmail))
    {
      $IDUTILISATEUR 	= $enregTestExistEmail['login'];
      $MDPUTILISATEUR = $enregTestExistEmail['motdepasse'];
    }
      $_SESSION['User'] = $IDUTILISATEUR;
      $_SESSION['Password'] = $MDPUTILISATEUR;

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="index.php" </SCRIPT>';

  }else{
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?err=nocpt" </SCRIPT>';
  }
    }
    var_dump($_SESSION['Password']);
    //echo $_SESSION['User'];
  ?>
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span>Swift Hospital</span>Login <span class="msg">Sign in to start your session</span></h1>
        <div class="col-md-12">
            <form action="" method="POST">
              <?php if(isset($_GET['err'])){ ?>
								<?php if($_GET['err']=='nocpt'){ ?>
								<h1 class="h1 caption" style="color:red;    font-size: 17px;">Login ou mot de passe sont incorrecte ! &nbsp;</h1><br /><br />
								<?php } ?>
							<?php } ?>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div>
                    <div class="">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="Submit" class="btn btn-raised waves-effect g-bg-cyan">Se connecter</button>
                        <!--<a href="index.php" class="btn btn-raised waves-effect g-bg-cyan">SIGN IN</a>
                        <a href="sign-up.php" class="btn btn-raised waves-effect">SIGN UP</a>-->
                    </div>
                    <div class="text-center"> <a href="forgot-password.php">Forgot Password?</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="theme-bg"></div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>

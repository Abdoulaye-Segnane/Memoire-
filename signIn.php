

<?php
session_start();

  $serveur = "localhost" ;
    $log = "" ;
    $pass = "" ;

    $bdd = new PDO("mysql:host=$serveur;dbname=test", $log, $pass) ;

    if(isset($_POST['signIn'])){

        $signMail = htmlspecialchars($_POST['signMail']);
        $signPwd = sha1($_POST['signPwd']);

        if(!empty($signMail) AND !empty($signPwd)){
          $requsers = $bdd -> prepare("SELECT * FROM inscription WHERE mail = ? AND passwd = ?");
          $requsers->execute(array($signMail, $signPwd));
          $userexist = $requsers->rowCount();

          if ($userexist == 1) {
            
            $userinfo = $requsers->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['passwd'] = $userinfo['passwd'];
            header("Location: index.php?id=".$_SESSION['id']);

          }else{
            $erreur = "Adresse e-mail ou mot de passe incorrect !";
          }

        }else{
          $erreur = "Tous les champs doivent être complétés !";
        }

    }



?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Se connecter</title>
    <!-- Font Awesome -->
<script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    <style>
      .error {
        background: #f2dede;
        color: #a94442;
        padding: 15px;
        width: 95%;
        border-radius: 5px;
      }
    </style>
    </head>
    <body>

        <?php include "nav.php" ?>

        <section class="mt-5 py-5">
          <div class="container">
            <div class="row justify-content-md-center">
              <div class="col-lg">
                <h2 class="text-center">Se connecter</h2>
                <p class="text-center">Si vous n'avez pas encore de compte, veuillez-vous inscrire d'abord merci !</p>
                <form class="mt-4" method="POST">
                <div class="col-md-6 mx-auto d-block">
                  <label for="signMail" class="form-label">Adresse e-mail</label>
                  <input type="email" class="form-control" name="signMail" id="signMail" placeholder="Adresse e-mail">
                </div>
                <div class="col-md-6 mt-3 mx-auto d-block">
                  <label for="signPwd" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" name="signPwd" id="signPwd" placeholder="Mot de passe">
                  <div class="mt-5">
                    <span>Créer un compte ? <a href="signUp.php">S'inscrire</a></span>                
                    <input type="submit" name="signIn" class="btn btn-primary float-end" value="Se connecter">
                </div>
                <div class="mt-5">                  
                <?php if (isset($erreur)) { ?>
                  <p class="error"><?php echo $erreur ?></p>
                <?php } ?>
                </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </section>


        <?php include "footer.php" ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </body>
</html>
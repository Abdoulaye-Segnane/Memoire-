

<?php

  $serveur = "localhost" ;
    $log = "" ;
    $pass = "" ;

    $connexion = new PDO("mysql:host=$serveur;dbname=test", $log, $pass) ;

    if(isset($_POST['signUp'])){
        extract($_POST);


    
        if(!empty($signUpName) AND !empty($signUpLastName) AND !empty($signUpMail) AND !empty($signUpPwd) AND !empty($sexe) AND !empty($region) AND !empty($signUpDate)){
            $inscription = $connexion -> prepare("INSERT INTO inscription(prenom,nom,mail,passwd,genre,region,annee) VALUES(:prenom, :nom, :mail, :passwd, :genre, :region, :annee)");

            $inscription -> execute([
                
                'prenom' => htmlspecialchars($signUpName),
                'nom' => htmlspecialchars($signUpLastName),
                'mail' => htmlspecialchars($signUpMail),
                'passwd' => sha1($signUpPwd),
                'region' => htmlspecialchars($region),
                'genre' => htmlspecialchars($sexe),
                'annee' => htmlspecialchars($signUpDate)

            ]);

            

        }
        else{
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
    <title>S'inscrire</title>
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
            <div class="row">
              <div class="col-lg">
                <h2 class="text-center">S'inscrire</h2>
                <p class="text-center">Veuillez vous inscrire pour bien profiter du contenu !</p>
                <form method="POST" action="">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <div class="">
                          <label for="signUpName" class="form-label">Prénom</label>
                          <input type="text" class="form-control" name="signUpName" id="signUpName" placeholder="Votre Prénom">
                        </div>
                        <div class="mt-3">
                          <label for="signUpLastName" class="form-label">Nom</label>
                          <input type="text" class="form-control" name="signUpLastName" id="signUpLastName" placeholder="Votre Nom">
                        </div>
                        <div class="mt-3">
                          <label for="signUpMail" class="form-label">Adresse e-mail</label>
                          <input type="email" class="form-control" name="signUpMail" id="signUpMail" placeholder="Adresse e-mail">
                        </div>
                        <div class="mt-3">
                          <label for="signUpPwd" class="form-label">Mot de passe</label>
                          <input type="password" class="form-control" name="signUpPwd" id="signUpPwd" placeholder="Mot de passe">
                        </div>
                      </div>
                      <div class="col">
                        <div class="">
                          <p>Genre</p>
                          <div name="genre" class="d-flex justify-content-around">
                            <div class="w-23">
                                <label for="homme">Homme</label>&nbsp;&nbsp;
                                <input type="radio" name="sexe" id="homme" value="Homme">
                            </div>
                            <div class="w-23">
                                <label for="femme">Femme</label>&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="sexe" id="femme" value="Femme">
                            </div>
                            <div class="w-23">
                                <label for="other">other</label>&nbsp;&nbsp;
                                <input type="radio" name="sexe" id="other" value="Personnalisé">
                            </div>
                          </div>
                          <div class="mt-3">
                            <p>Région</p>
                            <div>
                              <select name="region" class="form-select form-select-md" aria-label=".form-select-md">
                                  <option selected>Dakar</option>
                                  <option value="Fatick">Fatick</option>
                                  <option value="Thiés">Thiés</option>
                                  <option value="Kaolack">Kaolack</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="mt-3">
                          <label for="signUpDate" class="form-label">Date de naissance</label>
                          <input type="date" class="form-control" name="signUpDate" id="signUpDate">
                        </div>
                        <div class="mt-5">
                          <span>J'ai déjà un compte ? <a href="signIn.php">Se connecter</a></span>                
                          <input type="submit" name="signUp" class="btn btn-primary float-end" value="S'inscrire">
                        </div>
                        <div class="mt-5">                  
                          <?php if (isset($erreur)) { ?>
                            <p class="error"><?php echo $erreur ?></p>
                          <?php } ?>
                        </div>
                      </div>
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
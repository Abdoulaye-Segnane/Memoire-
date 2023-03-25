<?php 

  $serveur = "localhost" ;
    $log = "" ;
    $pass = "" ;

    $connexion = new PDO("mysql:host=$serveur;dbname=test", $log, $pass) ;

    if(isset($_POST['formContact'])){
        extract($_POST);


    
        if(!empty($firstName) AND !empty($lastName) AND !empty($mail) AND !empty($msg)){
            $insere = $connexion -> prepare("INSERT INTO tableContact(prenom,nom,email,message) VALUES(:prenom, :nom, :email, :message)");

            $insere -> execute([
                
                'prenom' => $firstName,
                'nom' => $lastName,
                'email' => $mail,
                'message' => $msg

            ]);

            //echo "Valide !!!" ;

        }
        else{

            echo "Champs vides !" ;
        }
    }


    /*try{
        $connexion = new PDO("mysql:host=$serveur;dbname=test", $log, $pass) ;
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

         $insert = "INSERT INTO tableContact(prenom,nom,email,message) 
                   VALUES ('Mbaye', 'Gaye', 'mbaye122@hotmail.fr','slt...')" ;
         $connexion -> exec($insert) ;

        echo "C'est Parfait !" ;
       }

       catch(PDOException $e){

        echo 'Echec de la connexion ' .$e -> getMessage() ;
       }*/

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>SALOUM SERVICES-Projet de Memoire</title>
    <!-- Font Awesome -->
<script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <?php include "nav.php" ?>

        <main>
            <!--<section >
                <div class="row py-5 my-5" >
                    <div class="col">
                        <div class="bg-primary h-100 w-100 py-5 text-center"> 
                            <h4 class="fw-bold">Reservez Maintenant</h4>
                            <button type="button" class="btn btn-dark mt-5 ">Click & Collect</button>
                        </div>
                    </div>
                </div>
            </section>-->

            <div class="container">
      
        <div class="row">
            <br>
        <div class="col-6 mt-5">
            <h2 class="fw-bold">Nous contacter</h2>
            <p>Notre adresse postale est <br>
                17000 Keur Massar,<br>
                Dakar, Pikine<br>
                Téléphone : +221 77 190 36 21<br>
             </p>
        </div>
         <div class="col-6">  
            <form method="POST" id="formContact" class="row g-3 needs-validation">
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstName" id="validationCustom01" placeholder="Prénom">
                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Nom</label>
                  <input type="text" class="form-control" name="lastName" id="validationCustom02" placeholder="Nom">
                </div>
        
                <div class="col-md-6">
                  <label for="validationCustom03" class="form-label">Adress Mail</label>
                  <input type="text" class="form-control" name="mail" id="validationCustom03" placeholder="Adresse e-mail">
                </div>
                <div class="col-mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" placeholder="Message..." rows="3"></textarea>
                  </div>
                </div>
                <div>                	
                    <input type="submit" name="formContact" class="btn btn-primary" value="Envoyer">
                </div>
              </form></div>
            </div> 
          </div>

    <!--<br>   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="tn_IMG-20230222-WA0069.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="tn_IMG-20230223-WA0083.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="tn_IMG-20230223-WA0097.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <br>-->
          <section>
               <div class="text-center">CONTACTER-NOUS</div>
               <div class="text-center">Vous souhaitez nous poser une question, nous faire un feedback, ou tout simplement nous contacter ? <br>
                   Écrivez-nous à saloumservices@gmail.com ou appelez nous au +221 77 830 90 60 </div> 
          </section> <br>
        </main>


        <?php include "footer.php" ?>



    </body>
</html>
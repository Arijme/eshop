<?php 
session_start();
if (isset($_SESSION["email"]))
    header("location:/index.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $user['name'] = $_POST['nom'];
        $user['email'] = $_POST['email'];
        $user['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
        require_once('data.php');
        try{
            $req= $cnx->prepare("INSERT INTO `users` (`email`,`password`,`name`,`role`)".
            " VALUES(:email,:password,:name,'user');");
            $req->execute($user);
            header("location:login.php");
        }
        catch(PDOException $e){
            echo "erreur cnx";
            die();
        }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bg-custom {
            background-color: rgb(93, 154, 224);
        }

        .card {
            height: 525px;
        }

        img {
            max-width: 100%;
            height: 100%;
            max-height: 280px;
        }
    </style>
</head>

<body>
    <?php
    include "header.php"
    ?>
    <div class="container px-5 my-5">
        <form id="contactForm" method="post">
            <div class="form-floating mb-3">
                <input class="form-control" id="nom" name="nom" type="text" placeholder="Nom" data-sb-validations="required" />
                <label for="nom">Nom</label>
                <div class="invalid-feedback" data-sb-feedback="nom:required">Nom is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="emailAddress" name="email" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                <label for="emailAddress">Email Address</label>
                <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
            </div>
          
            <div class="form-floating mb-3">
                <input class="form-control" id="password" name="password" type="password" placeholder="password" data-sb-validations="required" />
                <label for="password">password</label>
                <div class="invalid-feedback" data-sb-feedback="password:required">password is required.</div>
            </div>
         
           
            <div class="d-grid">
                <button class="btn btn-primary btn-lg " id="submitButton" name="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
    
</body>
</html>
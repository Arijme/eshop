<?php
session_start();
$msg = "";

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    include_once('data.php');
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $req = $cnx->prepare("SELECT * FROM `users` where email= :email ");
    $req->execute(['email' => $email]);
    $user = $req->fetch();
    if ($user) {
        if (password_verify($pass, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] == 'admin')
                header("location:/admin");
            else
                header("location:/");
        }
    }
    $msg = "erreur email ou password incorrect";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body>

    <?php include('header.php') ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-7">
                <?php if ($msg)
                    echo "<div class='alert alert-danger'>$msg</div>";
                ?>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input required type="email" name="email" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-primary" type="submit">login</button>
                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION["email"]))
    header("location:/login.php");
if ($_SESSION['role'] != "admin")
    die("access denied");
include_once("../data.php");
$req = $cnx->query("SELECT products.id,products.title,products.brand,products.price".",category.nom FROM `products`,`category` where products.category_id=category.id ORDER BY products.id");
$products = $req->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
        <style>
            .update::after{
                content:'🖌' ;

            }
            .delete::after{
                content: '🗑';
            }
        </style>
</head>

<body>

    <?php include('../header.php') ?>

    <div class="container">
        <div class="row mt-5">
            <a href="ajout.php">ajout product</a>
            <table>
                <thead>
                    <tr>
                        <th>title</th>
                        <th>brand</th>
                        <th>categorie</th>
                        <th>price</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $p) { ?>
                        <tr>
                            <td>
                                <?= $p['title'] ?>
                            </td>
                            <td>
                                <?= $p['brand'] ?>
                            </td>
                            <td>
                                <?= $p['nom'] ?>
                            </td>
                            <td>
                                <?= $p['price'] ?>
                            </td>
                            <td>
                                <a href="update.php?id=<?=$p['id']?>" class="btn btn-primary btn-sm"><span class="update"></span></a>
                                <a href="delete.php?id=<?=$p['id']?>" class="btn btn-danger  btn-sm"><span class="delete"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
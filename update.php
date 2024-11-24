<?php
session_start();
if (!isset($_SESSION["email"]))
    header("location:/login.php");
if ($_SESSION['role'] != "admin")
    die("access denied");
if (isset($_GET['id']) and $_GET['id'] > 0)
    $id = $_GET['id'];
else
    header('location:index.php');
include_once("../data.php");
$req = $cnx->query("SELECT * FROM `category`");

$cat = $req->fetchAll();
$req = $cnx->prepare("SELECT * FROM `products`where `products`.`id`=:id");
$req->execute(['id'=>$id]);

$product = $req->fetch();
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $category_id = $_POST['category_id'];

    $req = $cnx->prepare("UPDATE `products` SET `title` = :title, `description` = :description , `price` = :price, `brand` = :brand,`category_id` = :cat_id WHERE `products`.`id`=:id;");
    try {
        $req->execute(['title' => $title, 'description' => $description, 'price' => $price, 'brand' => $brand, 'cat_id' => $category_id,'id'=>$id]);
        header("location:/admin/");
    } catch (PDOException $e) {
        
        $msg = "erreur de données form";
        $msg=$e-> getMessage();
    }
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

    <?php include('../header.php') ?>
    <?php if ($msg)
        echo "<div class='alert alert-danger' >$msg</div>";
    ?>
    <div class="container px-5 my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">titre</label>
                <input class="form-control" name="title" type="text" placeholder="titre"
                    data-sb-validations="required" value="<?= $product['title']?>"  />
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea class="form-control" name="description" placeholder="description" style="height: 10rem;"
                    data-sb-validations="required"><?=$product['description']?></textarea>

            </div>
            <div class="mb-3">
                <label class="form-label">brand</label>
                <input class="form-control" name="brand" type="text" placeholder="brand" value="<?= $product['brand']?>"  />
            </div>
            <div class="mb-3">
                <label class="form-label">categorie</label>
                <select class="form-select" name="category_id">
                    <?php foreach ($cat as $c)
                    if($product['$category_id']==$c['id'])
                        echo "<option value ='" . $c['id'] . "'>" . $c['nom'] . "</option>";
                    else echo "<option value='".$c['id']."'>".$c['nom']."</option>";
                    ?>
                </select>

            </div>
            <div class="mb-3">
                <label class="form-label">price</label>
                <input class="form-control" name="price" type="text" placeholder="price" value="<?= $product['price']?>"  />
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg " id="submitButton" type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>

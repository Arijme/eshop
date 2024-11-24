<?php
session_start();
include_once('data.php');

$critere=(isset($_GET['cat']))?$_GET['cat']:true;


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
  <?php  include('header.php');
  $req = $cnx->query("SELECT * FROM `products`");
  $products = $req->fetchAll();
  if ($products){
  $req = $cnx->query("SELECT * FROM `category`");
  $cat = $req->fetchAll();
  }
  else die("erreur connexion");
  
  ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-3">
                <ul class="list-group">
                <li class='list-group-item'><a href='index.php'>Tous</a></li>
                    <?php
                    foreach ($cat as $c)
                        echo "<li class='list-group-item'><a href='index.php?cat=".$c['id']."'>".$c['nom']."</a></li>";
                    ?>
                </ul>
            </div>
            <div class="col-9">
                <div class="row">
                    <?php
                    
                     foreach ($products as $p)
                        if ($p['category_id'] == $critere){
                    ?>
                    <div class="card col-md-2 m-2">
                        <img class="card-img-top" width="100" alt="Product 1" src="<?php echo $p['image'] ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $p['title'] ?>
                            </h5>
                            <p>
                                <span class='price text-primary'>
                                    <?php echo $p['price'] ?>
                                </span>
                            </p>
                            <a href="details.php?id=<?php echo $p['id'] ?>" class="btn btn-primary btn-sm add-to-cart" data-product-id="1">show</a>
                        </div>
                    </div>

                    <?php } ?>





                </div>
            </div>
        </div>
    </div>





</body>

</html>
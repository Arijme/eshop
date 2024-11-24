<?php 
include('data.php');
if (isset($_GET['id']) and $_GET['id']>0)
$id = $_GET['id'];
else header('location:index.php');
include_once('data.php');

$product = $products[$id-1];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        function addToCard(id){
            if(document.cookie)
            document.cookie+=","+id
        else document.cookie = "list ="+id

        }
    </script>
</head>
<body>
    <?php include('header.inc') ?>
    <div class="container">
		<div class="card">
			<div class="container-fluid">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img width="300" src="<?= $product['image'] ?>" /></div>
						
						</div>
						
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?= $product['title'] ?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p class="product-description"><?= $product['description'] ?></p>
						<h4 class="price">current price: <span><?= $product['price'] ?></span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						
						<div class="action">
							<button class="add-to-cart btn btn-default" onclick="addToCard(<?= $product['id'] ?>)" type="button">add to cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
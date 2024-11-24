<?php
include_once('data.php');
$list = explode(',',$_COOKIE['list']);
$p =[];
foreach($list as $l)
if ( array_key_exists($l,$p)) $p[$l]+=1;
else
$p[$l]=1;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>nom</th>
            <th>image</th>
            <th>prix U</th>
            <th>qte</th>
            <th>prix</th>
            </tr>
            
        </thead>
        <tbody>
            <?php
            $som = 0;
            foreach ($p as $id=>$qte){ 
            $som+= $products[$id-1]['price'];
            ?>
            <tr>
                <td><?= $products[$id-1]['title'] ?></td>
                <td><img width="50" src="<?= $products[$id-1]['images'][0] ?>" alt=""></td>
                <td><?= $products[$id-1]['price'] ?></td>
                <td><?= $qte ?></td>
                <td><?= $products[$id-1]['price']*$qte ?></td>
            </tr>


            <?php } 
            echo "<tr><th colspan='3'> total : $som </th></tr> "; ?>

            
            
        </tbody>
    </table>
    
</body>
</html>
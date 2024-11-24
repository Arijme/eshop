<?php
session_start();
if (!isset($_SESSION["email"]))
    header("location:/login.php");
if ($_SESSION['role'] != "admin")
    die("access denied");
if(isset ($_GET['id']) and $_GET['id']>0)
$id=$_GET['id'];
include_once("../data.php");
$req = $cnx->prepare("DELETE FROM products WHERE `products`.`id`=:id");
$req->execute(['id'=>$id]);
header("location:/admin/index.php");
<?php
session_start();

include ('../functions/product_functions.php');
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $productToEdit = getProductById($id,$_SESSION['products']);
    $_SESSION['productToEdit']=$productToEdit;


    header('Location: ../views/edit_product.php');
    exit;

    }
}
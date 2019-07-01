<?php

//include autoload file
require_once './src/autoload.php';


if(isset($_POST['action']) && $_POST['action'] === 'add') {

    $product = [];
    $product['id'] = $_POST['id'];
    $product['price'] = $_POST['price'];
    $product['qty'] = 1;


    if(isset($_SESSION['cart-products']) && !empty($_SESSION['cart-products'])) {

        if(isset($_SESSION['cart-products'][$product['id']])) {

            $_SESSION['cart-products'][$product['id']]['qty'] += $product['qty'];
            $_SESSION['cart-products'][$product['id']]['price'] = $_SESSION['cart-products'][$product['id']]['qty'] * $product['price'];
 
        } else {

            $_SESSION['cart-products'][$product['id']] = $product;
        }

    } else {

        $_SESSION['cart-products'][$product['id']] = $product;
    }

    exit;
}

if(isset($_POST['action']) && $_POST['action'] === 'remove') {

    $productID = $_POST['id'];

    if(isset($_SESSION['cart-products']) && !empty($_SESSION['cart-products'])) {

        unset($_SESSION['cart-products'][$productID]);
    }

    exit;
}

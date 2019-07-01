<?php

//include autoload file
require_once './src/autoload.php';

//Create template
$cartPage = new Template('./templates/cart.php');

//Load Data
$json = file_get_contents('./data/products.json');

//Decode Data
$data = json_decode($json, true);


if (isset($_SESSION['cart-products']) && !empty($_SESSION['cart-products'])) {

    $sessionProducts = $_SESSION['cart-products'];

    $cartProducts = [];
    foreach($data['games']  as $game) {

        if(!in_array($game['id'], array_keys($sessionProducts))) {
            continue;
        }

        $cartProducts[$game['id']]['title'] = $game['game-name'];
        $cartProducts[$game['id']]['image'] = $game['game-image-path'];
        $cartProducts[$game['id']]['qty'] = $sessionProducts[$game['id']]['qty'];
        $cartProducts[$game['id']]['price'] = $sessionProducts[$game['id']]['price'];
    }

    $totalItems = calculateTotalItems($cartProducts);

    $totalShipping = calculateShipping($totalItems, 5);
    $totalPrice = calculateTotalPrice($cartProducts);
    $specialPrice = calculateSpecialPrice($totalPrice, 10);
    if($specialPrice) {
        $finalPrice = calculateFinalPrice($specialPrice, $totalShipping);
    } else {
        $finalPrice = calculateFinalPrice($totalPrice, $totalShipping);
    }
   
} else {

    $cartProducts = [];

    $totalShipping = 0;
    $totalPrice = 0;
    $specialPrice = false;
    $finalPrice = 0;
}

//Add template variables
$cartPage->cartProducts = $cartProducts;

$cartPage->totalShipping = $totalShipping;
$cartPage->totalPrice = $totalPrice;
$cartPage->specialPrice = $specialPrice;
$cartPage->finalPrice = $finalPrice;


//Display template
echo $cartPage;

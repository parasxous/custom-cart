<?php

//include autoload file
require_once './src/autoload.php';

//Create template
$frontPage = new Template('./templates/front-page.php');

//Load Data
$json = file_get_contents('./data/products.json');

//Decode Data
$data = json_decode($json, true);

//Insert data to template
$frontPage->products = $data['games'];

if (isset($_SESSION['cart-products']) && !empty($_SESSION['cart-products'])) {

    $sessionProducts = $_SESSION['cart-products'];

    $cartProducts = [];
    foreach($data['games'] as $game) {

        if(!in_array($game['id'], array_keys($sessionProducts))) {
            continue;
        }

        $cartProducts[$game['id']]['title'] = $game['game-name'];
        $cartProducts[$game['id']]['image'] = $game['game-image-path'];
        $cartProducts[$game['id']]['qty'] = $sessionProducts[$game['id']]['qty'];
        $cartProducts[$game['id']]['price'] = $sessionProducts[$game['id']]['price'];
    }

    $frontPage->cartProducts = $cartProducts;
    $totalPrice = calculateTotalPrice($cartProducts);
    $totalItems = calculateTotalItems($cartProducts);
} else {

    $cartProducts = [];
    $totalPrice = 0;
    $totalItems = 0;
}

//Add template variables
$frontPage->cartProducts = $cartProducts;
$frontPage->totalPrice = $totalPrice;
$frontPage->totalItems = $totalItems;

//Display template
echo $frontPage;

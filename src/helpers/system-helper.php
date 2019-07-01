<?php


function formatPrice($price) {

    return number_format($price, 2, ',', '.');
}

//calculate price from mini cart products
function calculateTotalPrice($products) {

    $price = 0;

    foreach ($products as $product) {
        $price += $product['price'];
    };

    return $price;
}

//check if discount
function calculateSpecialPrice($totalPrice, $discountPercentage) {

    if($totalPrice >= 100) {

        return $totalPrice *= (1 - ($discountPercentage / 100));
    }

    return false;
}

//calculate total from mini cart products
function calculateTotalItems($products) {

    $items = 0;

    foreach ($products as $product) {
        $items += $product['qty'];
    };

    return $items;
}

//calculate shipping
function calculateShipping($items, $shipping) {

    return $items * $shipping;
}

//calcualte price with shipping
function calculateFinalPrice($totalPrice, $totalShipping) {

    return $totalPrice + $totalShipping;
}

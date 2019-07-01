<?php
/**
 * Created by PhpStorm.
 * User: parasxous
 * Date: 6/30/2019
 * Time: 8:13 PM
 */

//include autoload file
require_once './src/autoload.php';

//Create template
$checkoutPage = new Template('./templates/checkout-page.php');

if (isset($_SESSION['cart-products']) && !empty($_SESSION['cart-products'])) {
    echo $checkoutPage;
}else{
    header('Location:index.php');
    exit();
}
?>
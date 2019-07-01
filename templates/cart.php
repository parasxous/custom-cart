<?php include './includes/header.php'; ?>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartProducts as $key => $cartProduct) : ?>
                            <tr>
                                <td><img src="<?php echo $cartProduct['image']; ?>" alt="<?php echo $cartProduct['title']; ?>" /></td>
                                <td><?php echo $cartProduct['title'] ?></td>
                                <td>Quantity</td>
                                <td><?php echo $cartProduct['qty']; ?></td>
                                <td class="text-right"><?php echo formatPrice($cartProduct['price']); ?>&euro;</td>
                                <td class="text-right">
                                    <button class="btn btn-sm btn-danger button-delete" data-product-id="<?php echo $key; ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2">Sub-Total</td>
                            <td class="text-right"><?php echo formatPrice($totalPrice); ?>&euro;</td>
                        </tr>
                        <?php if ($specialPrice) : ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="2">Discount -10%</td>
                                <td class="text-right"><?php echo formatPrice($specialPrice); ?>&euro;</td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2">Shipping</td>
                            <td class="text-right"><?php echo formatPrice($totalShipping); ?>&euro;</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2"><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo formatPrice($finalPrice); ?>&euro;</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button onclick="location.href='index.php'" class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button onclick="location.href='checkout.php'" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include './includes/footer.php'; ?>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-12 main-section">
        <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger" name="quantity"><?php echo $totalItems; ?> </span>
            </button>
            <div class="dropdown-menu">
                <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger number"><?php echo $totalItems; ?></span>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total: <span class="text-info"><?php echo formatPrice($totalPrice) ?> </span></p>
                    </div>
                </div>
                <?php foreach ($cartProducts as $cartProduct) : ?>
                    <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="<?php echo BASE_URL . $cartProduct['image'] ?>">
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p> <?php echo $cartProduct['title'] ?></p>
                            <span class="price text-info"> <?php echo  formatPrice($cartProduct['price']) ?> &#8364; </span> <span class="count">Quantity <?php echo $cartProduct['qty']  ?> </span>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-sm-12 col-md-7 text-right">
                    <button onclick="location.href='cart-page.php'" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>

        </div>

    </div>
</div>
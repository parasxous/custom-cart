<?php include './includes/header.php'; ?>
<?php include './mini-cart.php'; ?>
<div class="row">
    <?php foreach ($products as $product) : ?>
        <div class="col-md-4">
            <div class="text-center">
                <img src="<?php echo $product['game-image-path'] ?>" alt="img-responsive">

                <h6><?php echo $product['game-name']; ?></h6>
                <h5><?php echo formatPrice($product['game-price']) ?> &#8364;</h5>
                <div class="row">
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-sm btn-info"><a href="<?php echo $product['game-trailer'] ?>" target="_blank">Watch trailer</a></button>
                        <button type="button" class=" btn btn-sm btn-primary button-add" data-product-id="<?php echo $product['id']; ?>" data-product-price="<?php echo $product['game-price']; ?>">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
<?php include './includes/footer.php'; ?>
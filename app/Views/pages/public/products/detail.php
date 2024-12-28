<?php $this->extend('layouts/app') ?>

<?php $this->section('content') ?>

<div class="container-xl">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="ratio ratio-1x1 bg-light">
                <img class="object-fit-contain" src="<?= site_url('/products/' . $product['image']) ?>" alt="">
            </div>
        </div>
        <div class="col-12 col-md-8">
            <h2 class="fw-bold"><?= $product['name'] ?></h2>
            <p class=""><?= $product['description'] ?></p>
            <form class="row" method="post" action="<?= site_url('carts/add-to-cart') ?>">
                <?php csrf_field(); ?>
                <input type="text" value="<?= $product['id'] ?>" hidden name="product_id">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary"><i class='bx bxs-cart-add'></i> Add To Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->endSection('content') ?>
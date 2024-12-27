<?php $this->extend('layouts/app') ?>

<?php $this->section('content') ?>

<div class="container-xxl bg-white">
    <div class="row">
        <?php foreach ($products as $key => $product) : ?>
            <a href="<?= site_url('/product/' . $product['slug']) ?>" class="col-3 p-4 text-decoration-none">
                <div class=" text-black">
                    <div class="ratio ratio-1x1 bg-light">
                        <img class="object-fit-contain" src="<?= site_url('/products/' . $product['image']) ?>" alt="">
                    </div>
                    <div class="item d-flex flex-column py-3">
                        <p class="fw-bolder mb-0"><?= $product['name'] ?></p>
                        <p class="fw-bolder text-secondary mb-0"><?= $product['category_name'] ?></p>
                        <p class="fw-bolder fs-5 pt-2 mb-0">Rp <?= number_format($product['price'], 2, ',', '.') ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php $this->endSection('content') ?>